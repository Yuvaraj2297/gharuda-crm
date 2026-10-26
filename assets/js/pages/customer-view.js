/**
 * Gharuda CRM - Customer View Page Script
 * File: assets/js/pages/customer-view.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
/* footer.php (bootstrap) loads AFTER this block — bind on DOMContentLoaded */
              document.addEventListener('DOMContentLoaded', function() {
                function toast(msg) {
                  var t = document.createElement('div');
                  t.className = 'cv-toast';
                  t.innerHTML = '<i class="bi bi-check-circle-fill"></i> ' + msg;
                  document.body.appendChild(t);
                  setTimeout(function() {
                    t.classList.add('show');
                  }, 10);
                  setTimeout(function() {
                    t.classList.remove('show');
                    setTimeout(function() {
                      t.remove();
                    }, 350);
                  }, 2400);
                }

                /* Create New Estimate -> fullscreen modal */
                var estNewBtn = document.getElementById('cvEstNewBtn'),
                  estModal = document.getElementById('cvNewEstimateModal');
                if (estNewBtn && estModal) {
                  estNewBtn.addEventListener('click', function() {
                    if (typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(estModal).show();
                  });
                }

                /* Items: add row + amount calc + confirm (lock) / delete — invoice modal madhiri */
                var estAdd = document.getElementById('cvEstAddItem'),
                  estBody = document.getElementById('cvEstItemBody');

                function estBlankRow() {
                  var tr = document.createElement('tr');
                  tr.innerHTML = '<td><i class="bi bi-info-circle" style="color:#9ca3af;font-size:12px;"></i></td>' +
                    '<td><textarea class="form-control" placeholder="Description" rows="2"></textarea></td>' +
                    '<td><textarea class="form-control" placeholder="Long description" rows="2"></textarea></td>' +
                    '<td><input type="number" class="form-control" value="1" min="0"><div class="cv-inv-unit">Unit</div></td>' +
                    '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
                    '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
                    '<td><select class="form-select"><option selected>No Tax</option><option>GST 5%</option><option>GST 12%</option><option>GST 18%</option></select></td>' +
                    '<td><span class="cv-inv-amt">₹ 0.00</span></td>' +
                    '<td><button type="button" class="cv-inv-check" title="Confirm"><i class="bi bi-check-lg"></i></button></td>';
                  return tr;
                }

                /* Toolbar ➕ -> open Add New Item modal (invoice flow madhiri) */
                var estItemModal = document.getElementById('cvEstAddItemModal');
                if (estAdd && estItemModal && window.bootstrap) {
                  estAdd.addEventListener('click', function() {
                    bootstrap.Modal.getOrCreateInstance(estItemModal).show();
                  });
                }

                /* Stacked modal backdrop z-index fix (estimate + item modal) */
                ['#cvNewEstimateModal', '#cvEstAddItemModal'].forEach(function(id) {
                  var el = document.querySelector(id);
                  if (!el) return;
                  el.addEventListener('shown.bs.modal', function() {
                    var z = parseInt(getComputedStyle(el).zIndex, 10) || 1055;
                    var backdrops = document.querySelectorAll('.modal-backdrop');
                    var last = backdrops[backdrops.length - 1];
                    if (last) last.style.zIndex = (z - 1);
                  });
                });

                /* Add New Item submit -> validate + fill blank row in estimate items */
                var estItemSave = document.getElementById('cvEstItemSave');
                if (estItemSave && estItemModal && estBody) {
                  estItemSave.addEventListener('click', function() {
                    var desc = document.getElementById('estItDesc').value.trim(),
                      rate = document.getElementById('estItRateInr').value.trim();
                    if (!desc || !rate) {
                      toast('Description and Rate - INR are required');
                      return;
                    }
                    var tr = estBody.querySelector('tr:not(.cv-inv-row-locked)'),
                      madeNew = false;
                    if (!tr) {
                      tr = estBlankRow();
                      madeNew = true;
                    }
                    var tax = document.getElementById('estItTax1').value,
                      longDesc = document.getElementById('estItLongDesc').value.trim(),
                      unit = document.getElementById('estItUnit').value.trim();
                    tr.innerHTML = '<td><i class="bi bi-info-circle" style="color:#9ca3af;font-size:12px;"></i></td>' +
                      '<td><textarea class="form-control" placeholder="Description" rows="2"></textarea></td>' +
                      '<td><textarea class="form-control" placeholder="Long description" rows="2"></textarea></td>' +
                      '<td><input type="number" class="form-control" value="1" min="0"><div class="cv-inv-unit">' + (unit || 'Unit') + '</div></td>' +
                      '<td><input type="number" class="form-control" value="' + parseFloat(rate).toFixed(2) + '" step="0.01"></td>' +
                      '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
                      '<td><select class="form-select"><option ' + (tax === 'No Tax' ? 'selected' : '') + '>No Tax</option><option ' + (tax === 'GST 5%' ? 'selected' : '') + '>GST 5%</option><option ' + (tax === 'GST 12%' ? 'selected' : '') + '>GST 12%</option><option ' + (tax === 'GST 18%' ? 'selected' : '') + '>GST 18%</option></select></td>' +
                      '<td><span class="cv-inv-amt">₹ ' + parseFloat(rate).toFixed(2) + '</span></td>' +
                      '<td><button type="button" class="cv-inv-check" title="Confirm"><i class="bi bi-check-lg"></i></button></td>';
                    tr.querySelector('textarea').value = desc;
                    tr.cells[2].querySelector('textarea').value = longDesc;
                    if (madeNew) estBody.appendChild(tr);

                    // reset form + close
                    ['estItDesc', 'estItLongDesc', 'estItRateInr', 'estItHsn', 'estItRateUsd', 'estItUnit'].forEach(function(id) {
                      document.getElementById(id).value = '';
                    });
                    document.getElementById('estItTax1').value = 'No Tax';
                    document.getElementById('estItTax2').value = 'No Tax';
                    document.getElementById('estItGroup').value = '';
                    bootstrap.Modal.getOrCreateInstance(estItemModal).hide();
                    toast('Item "' + desc + '" added to estimate');
                  });
                }

                document.addEventListener('input', function(e) {
                  var t = e.target;
                  if (!t.closest || !t.closest('#cvEstItemBody')) return;
                  var row = t.closest('tr');
                  if (!row || row.classList.contains('cv-inv-row-locked')) return;
                  var qty = parseFloat(row.cells[3].querySelector('input').value) || 0,
                    rate = parseFloat(row.cells[4].querySelector('input').value) || 0;
                  row.querySelector('.cv-inv-amt').textContent = '₹ ' + (qty * rate).toFixed(2);
                });

                if (estBody) {
                  estBody.addEventListener('click', function(e) {
                    var check = e.target.closest('.cv-inv-check'),
                      del = e.target.closest('.cv-inv-row-del'),
                      row;
                    if (del) {
                      row = del.closest('tr');
                      if (row) row.remove();
                      if (estBody && !estBody.querySelector('tr')) estBody.appendChild(estBlankRow());
                      return;
                    }
                    if (!check) return;
                    row = check.closest('tr');
                    if (!row || row.classList.contains('cv-inv-row-locked')) return;
                    row.classList.add('cv-inv-row-locked');
                    row.querySelectorAll('input, select, textarea').forEach(function(el) {
                      el.setAttribute('readonly', 'readonly');
                      el.setAttribute('disabled', 'disabled');
                    });
                    check.className = 'cv-inv-row-del';
                    check.title = 'Delete item';
                    check.innerHTML = '<i class="bi bi-trash"></i>';
                    if (estAdd) estBody.appendChild(estBlankRow());
                  });
                }

                /* Submit -> success toast */
                var estSubmit = document.getElementById('cvEstSubmit');
                if (estSubmit && estModal) {
                  estSubmit.addEventListener('click', function() {
                    bootstrap.Modal.getOrCreateInstance(estModal).hide();
                    toast('Estimate EST-059 created successfully');
                  });
                }

                /* Zip Estimates -> modal */
                var estZipBtn = document.getElementById('cvEstZipBtn'),
                  estZipModal = document.getElementById('cvEstZipModal');
                if (estZipBtn && estZipModal) {
                  estZipBtn.addEventListener('click', function() {
                    if (typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(estZipModal).show();
                  });
                }

                /* Zip submit -> validate date range + toast */
                var estZipSubmit = document.getElementById('cvEstZipSubmit');
                if (estZipSubmit && estZipModal) {
                  estZipSubmit.addEventListener('click', function() {
                    var from = document.getElementById('cvEstZipFrom').value,
                      to = document.getElementById('cvEstZipTo').value;
                    if (from && to && from > to) {
                      toast('From Date cannot be after To Date');
                      return;
                    }
                    var statusEl = document.querySelector('input[name="cvEstZipStatus"]:checked'),
                      status = statusEl ? statusEl.value : 'All';
                    bootstrap.Modal.getOrCreateInstance(estZipModal).hide();
                    var msg = 'Preparing ZIP of ' + status.toLowerCase() + ' estimates';
                    if (from && to) msg += ' from ' + from + ' to ' + to;
                    toast(msg + '...');
                  });
                }
              });

/* ==========================================================================
   Script Block 2
   ========================================================================== */
/* footer.php (bootstrap + jQuery + select2) loads AFTER this block — bind on DOMContentLoaded */
              document.addEventListener('DOMContentLoaded', function() {
                var payBtn = document.getElementById('cvZipPaymentsBtn'),
                  payModal = document.getElementById('cvZipPaymentModal');

                /* Zip Payments button -> modal (select2 dropdownParent fix inside modal) */
                if (payBtn && payModal && window.bootstrap) {
                  payBtn.addEventListener('click', function() {
                    bootstrap.Modal.getOrCreateInstance(payModal).show();
                    if (typeof $ !== 'undefined' && $.fn.select2) {
                      var sel = jQuery('#cvZipPayBy');
                      if (sel.data('select2')) sel.select2('destroy');
                      sel.select2({
                        width: '100%',
                        dropdownParent: jQuery(payModal)
                      });
                    }
                  });
                }

                /* Submit -> validate date range + ZIP toast */
                var paySubmit = document.getElementById('cvZipPaySubmit');
                if (paySubmit && payModal) {
                  paySubmit.addEventListener('click', function() {
                    var by = document.getElementById('cvZipPayBy'),
                      from = document.getElementById('cvZipPayFrom').value,
                      to = document.getElementById('cvZipPayTo').value;
                    if (from && to && from > to) {
                      toast('From Date cannot be after To Date', false);
                      return;
                    }
                    bootstrap.Modal.getOrCreateInstance(payModal).hide();
                    var who = by && by.value ? by.value : 'all staff',
                      msg = 'Preparing ZIP of payments made by ' + who;
                    if (from && to) msg += ' from ' + from + ' to ' + to;
                    toast(msg + '...');
                  });
                }
              });

/* ==========================================================================
   Script Block 3
   ========================================================================== */
/* footer.php (bootstrap) loads AFTER this block — bind on DOMContentLoaded */
              document.addEventListener('DOMContentLoaded', function() {
                function toast(msg) {
                  var t = document.createElement('div');
                  t.className = 'cv-toast';
                  t.innerHTML = '<i class="bi bi-check-circle-fill"></i> ' + msg;
                  document.body.appendChild(t);
                  setTimeout(function() {
                    t.classList.add('show');
                  }, 10);
                  setTimeout(function() {
                    t.classList.remove('show');
                    setTimeout(function() {
                      t.remove();
                    }, 350);
                  }, 2400);
                }

                /* New Credit Note -> fullscreen modal */
                var cnNewBtn = document.getElementById('cvCnNewBtn'),
                  cnModal = document.getElementById('cvNewCreditNoteModal');
                if (cnNewBtn && cnModal) {
                  cnNewBtn.addEventListener('click', function() {
                    if (typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(cnModal).show();
                  });
                }

                /* Items: add row + amount calc + confirm (lock) / delete — invoice modal madhiri */
                var cnAdd = document.getElementById('cvCnAddItem'),
                  cnBody = document.getElementById('cvCnItemBody');

                function cnBlankRow() {
                  var tr = document.createElement('tr');
                  tr.innerHTML = '<td><i class="bi bi-info-circle" style="color:#9ca3af;font-size:12px;"></i></td>' +
                    '<td><textarea class="form-control" placeholder="Description" rows="2"></textarea></td>' +
                    '<td><textarea class="form-control" placeholder="Long description" rows="2"></textarea></td>' +
                    '<td><input type="number" class="form-control" value="1" min="0"><div class="cv-inv-unit">Unit</div></td>' +
                    '<td><input type="number" class="form-control" placeholder="Rate" step="0.01"></td>' +
                    '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
                    '<td><select class="form-select"><option selected>No Tax</option><option>GST 5%</option><option>GST 12%</option><option>GST 18%</option></select></td>' +
                    '<td><span class="cv-inv-amt">₹ 0.00</span></td>' +
                    '<td><button type="button" class="cv-inv-check" title="Confirm"><i class="bi bi-check-lg"></i></button></td>';
                  return tr;
                }

                /* Toolbar ➕ -> open Add New Item modal (#cvCnAddItemModal — estimates branch madhiri) */
                var cnItemModal = document.getElementById('cvCnAddItemModal');
                if (cnAdd && cnItemModal && window.bootstrap) {
                  cnAdd.addEventListener('click', function() {
                    bootstrap.Modal.getOrCreateInstance(cnItemModal).show();
                  });
                }

                /* Stacked modal backdrop z-index fix (credit note + item modal) */
                ['#cvNewCreditNoteModal', '#cvCnAddItemModal'].forEach(function(id) {
                  var el = document.querySelector(id);
                  if (!el) return;
                  el.addEventListener('shown.bs.modal', function() {
                    var z = parseInt(getComputedStyle(el).zIndex, 10) || 1055;
                    var backdrops = document.querySelectorAll('.modal-backdrop');
                    var last = backdrops[backdrops.length - 1];
                    if (last) last.style.zIndex = (z - 1);
                  });
                });

                /* Add New Item submit -> validate + fill blank row in credit note items */
                var cnItemSave = document.getElementById('cvCnItemSave');
                if (cnItemSave && cnItemModal && cnBody) {
                  cnItemSave.addEventListener('click', function() {
                    var desc = document.getElementById('cnItDesc').value.trim(),
                      rate = document.getElementById('cnItRateInr').value.trim();
                    if (!desc || !rate) {
                      toast('Description and Rate - INR are required');
                      return;
                    }
                    var tr = cnBody.querySelector('tr:not(.cv-inv-row-locked)'),
                      madeNew = false;
                    if (!tr) {
                      tr = cnBlankRow();
                      madeNew = true;
                    }
                    var tax = document.getElementById('cnItTax1').value,
                      longDesc = document.getElementById('cnItLongDesc').value.trim(),
                      unit = document.getElementById('cnItUnit').value.trim();
                    tr.innerHTML = '<td><i class="bi bi-info-circle" style="color:#9ca3af;font-size:12px;"></i></td>' +
                      '<td><textarea class="form-control" placeholder="Description" rows="2"></textarea></td>' +
                      '<td><textarea class="form-control" placeholder="Long description" rows="2"></textarea></td>' +
                      '<td><input type="number" class="form-control" value="1" min="0"><div class="cv-inv-unit">' + (unit || 'Unit') + '</div></td>' +
                      '<td><input type="number" class="form-control" value="' + parseFloat(rate).toFixed(2) + '" step="0.01"></td>' +
                      '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
                      '<td><select class="form-select"><option ' + (tax === 'No Tax' ? 'selected' : '') + '>No Tax</option><option ' + (tax === 'GST 5%' ? 'selected' : '') + '>GST 5%</option><option ' + (tax === 'GST 12%' ? 'selected' : '') + '>GST 12%</option><option ' + (tax === 'GST 18%' ? 'selected' : '') + '>GST 18%</option></select></td>' +
                      '<td><span class="cv-inv-amt">₹ ' + parseFloat(rate).toFixed(2) + '</span></td>' +
                      '<td><button type="button" class="cv-inv-check" title="Confirm"><i class="bi bi-check-lg"></i></button></td>';
                    tr.querySelector('textarea').value = desc;
                    tr.cells[2].querySelector('textarea').value = longDesc;
                    if (madeNew) cnBody.appendChild(tr);

                    // reset form + close
                    ['cnItDesc', 'cnItLongDesc', 'cnItRateInr', 'cnItHsn', 'cnItRateUsd', 'cnItUnit'].forEach(function(id) {
                      document.getElementById(id).value = '';
                    });
                    document.getElementById('cnItTax1').value = 'No Tax';
                    document.getElementById('cnItTax2').value = 'No Tax';
                    document.getElementById('cnItGroup').value = '';
                    bootstrap.Modal.getOrCreateInstance(cnItemModal).hide();
                    toast('Item "' + desc + '" added to credit note');
                  });
                }

                document.addEventListener('input', function(e) {
                  var t = e.target;
                  if (!t.closest || !t.closest('#cvCnItemBody')) return;
                  var row = t.closest('tr');
                  if (!row || row.classList.contains('cv-inv-row-locked')) return;
                  var qty = parseFloat(row.cells[3].querySelector('input').value) || 0,
                    rate = parseFloat(row.cells[4].querySelector('input').value) || 0;
                  row.querySelector('.cv-inv-amt').textContent = '₹ ' + (qty * rate).toFixed(2);
                });

                if (cnBody) {
                  cnBody.addEventListener('click', function(e) {
                    var check = e.target.closest('.cv-inv-check'),
                      del = e.target.closest('.cv-inv-row-del'),
                      row;
                    if (del) {
                      row = del.closest('tr');
                      if (row) row.remove();
                      if (cnBody && !cnBody.querySelector('tr')) cnBody.appendChild(cnBlankRow());
                      return;
                    }
                    if (!check) return;
                    row = check.closest('tr');
                    if (!row || row.classList.contains('cv-inv-row-locked')) return;
                    row.classList.add('cv-inv-row-locked');
                    row.querySelectorAll('input, select, textarea').forEach(function(el) {
                      el.setAttribute('readonly', 'readonly');
                      el.setAttribute('disabled', 'disabled');
                    });
                    check.className = 'cv-inv-row-del';
                    check.title = 'Delete item';
                    check.innerHTML = '<i class="bi bi-trash"></i>';
                    if (cnAdd) cnBody.appendChild(cnBlankRow());
                  });
                }

                /* Submit -> success toast + table row add (demo) */
                var cnSubmit = document.getElementById('cvCnSubmit');
                if (cnSubmit && cnModal) {
                  cnSubmit.addEventListener('click', function() {
                    bootstrap.Modal.getOrCreateInstance(cnModal).hide();
                    toast('Credit note CN-24 created successfully');
                  });
                }

                /* Zip Credit Notes -> modal */
                var cnZipBtn = document.getElementById('cvCnZipBtn'),
                  cnZipModal = document.getElementById('cvCnZipModal');
                if (cnZipBtn && cnZipModal) {
                  cnZipBtn.addEventListener('click', function() {
                    if (typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(cnZipModal).show();
                  });
                }

                /* Zip submit -> validate date range + toast */
                var cnZipSubmit = document.getElementById('cvCnZipSubmit');
                if (cnZipSubmit && cnZipModal) {
                  cnZipSubmit.addEventListener('click', function() {
                    var from = document.getElementById('cvCnZipFrom').value,
                      to = document.getElementById('cvCnZipTo').value;
                    if (from && to && from > to) {
                      toast('From Date cannot be after To Date');
                      return;
                    }
                    bootstrap.Modal.getOrCreateInstance(cnZipModal).hide();
                    var msg = 'Preparing ZIP of credit notes';
                    if (from && to) msg += ' from ' + from + ' to ' + to;
                    toast(msg + '...');
                  });
                }
              });

/* ==========================================================================
   Script Block 4
   ========================================================================== */
/* footer.php (bootstrap) loads AFTER this block — bind on DOMContentLoaded */
              document.addEventListener('DOMContentLoaded', function() {
                function toast(msg) {
                  var t = document.createElement('div');
                  t.className = 'cv-toast';
                  t.innerHTML = '<i class="bi bi-check-circle-fill"></i> ' + msg;
                  document.body.appendChild(t);
                  setTimeout(function() {
                    t.classList.add('show');
                  }, 10);
                  setTimeout(function() {
                    t.classList.remove('show');
                    setTimeout(function() {
                      t.remove();
                    }, 350);
                  }, 2400);
                }

                /* Create New Purchase Order -> fullscreen modal */
                var poNewBtn = document.getElementById('cvPoNewBtn'),
                  poModal = document.getElementById('cvNewPOModal');
                if (poNewBtn && poModal) {
                  poNewBtn.addEventListener('click', function() {
                    if (typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(poModal).show();
                  });
                }

                /* Items: add row + amount calc + confirm (lock) / delete — invoice modal madhiri */
                var poAdd = document.getElementById('cvPoAddItem'),
                  poBody = document.getElementById('cvPoItemBody');

                function poBlankRow() {
                  var tr = document.createElement('tr');
                  tr.innerHTML = '<td><i class="bi bi-info-circle" style="color:#9ca3af;font-size:12px;"></i></td>' +
                    '<td><textarea class="form-control" placeholder="Description" rows="2"></textarea></td>' +
                    '<td><textarea class="form-control" placeholder="Long description" rows="2"></textarea></td>' +
                    '<td><input type="number" class="form-control" value="1" min="0"><div class="cv-inv-unit">Unit</div></td>' +
                    '<td><input type="number" class="form-control" placeholder="Rate" step="0.01"></td>' +
                    '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
                    '<td><select class="form-select"><option selected>No Tax</option><option>GST 5%</option><option>GST 12%</option><option>GST 18%</option></select></td>' +
                    '<td><span class="cv-inv-amt">₹ 0.00</span></td>' +
                    '<td><button type="button" class="cv-inv-check" title="Confirm"><i class="bi bi-check-lg"></i></button></td>';
                  return tr;
                }

                /* Toolbar ➕ -> open Add New Item modal (#cvPoAddItemModal — estimates design) */
                var poItemModal = document.getElementById('cvPoAddItemModal');
                if (poAdd && poItemModal && window.bootstrap) {
                  poAdd.addEventListener('click', function() {
                    bootstrap.Modal.getOrCreateInstance(poItemModal).show();
                  });
                }

                /* Stacked modal backdrop z-index fix (PO + item modal) */
                ['#cvNewPOModal', '#cvPoAddItemModal'].forEach(function(id) {
                  var el = document.querySelector(id);
                  if (!el) return;
                  el.addEventListener('shown.bs.modal', function() {
                    var z = parseInt(getComputedStyle(el).zIndex, 10) || 1055;
                    var backdrops = document.querySelectorAll('.modal-backdrop');
                    var last = backdrops[backdrops.length - 1];
                    if (last) last.style.zIndex = (z - 1);
                  });
                });

                /* Add New Item submit -> validate + fill blank row in PO items */
                var poItemSave = document.getElementById('cvPoItemSave');
                if (poItemSave && poItemModal && poBody) {
                  poItemSave.addEventListener('click', function() {
                    var desc = document.getElementById('poItDesc').value.trim(),
                      rate = document.getElementById('poItRateInr').value.trim();
                    if (!desc || !rate) {
                      toast('Description and Rate - INR are required');
                      return;
                    }
                    var tr = poBody.querySelector('tr:not(.cv-inv-row-locked)'),
                      madeNew = false;
                    if (!tr) {
                      tr = poBlankRow();
                      madeNew = true;
                    }
                    var tax = document.getElementById('poItTax1').value,
                      longDesc = document.getElementById('poItLongDesc').value.trim(),
                      unit = document.getElementById('poItUnit').value.trim();
                    tr.innerHTML = '<td><i class="bi bi-info-circle" style="color:#9ca3af;font-size:12px;"></i></td>' +
                      '<td><textarea class="form-control" placeholder="Description" rows="2"></textarea></td>' +
                      '<td><textarea class="form-control" placeholder="Long description" rows="2"></textarea></td>' +
                      '<td><input type="number" class="form-control" value="1" min="0"><div class="cv-inv-unit">' + (unit || 'Unit') + '</div></td>' +
                      '<td><input type="number" class="form-control" value="' + parseFloat(rate).toFixed(2) + '" step="0.01"></td>' +
                      '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
                      '<td><select class="form-select"><option ' + (tax === 'No Tax' ? 'selected' : '') + '>No Tax</option><option ' + (tax === 'GST 5%' ? 'selected' : '') + '>GST 5%</option><option ' + (tax === 'GST 12%' ? 'selected' : '') + '>GST 12%</option><option ' + (tax === 'GST 18%' ? 'selected' : '') + '>GST 18%</option></select></td>' +
                      '<td><span class="cv-inv-amt">₹ ' + parseFloat(rate).toFixed(2) + '</span></td>' +
                      '<td><button type="button" class="cv-inv-check" title="Confirm"><i class="bi bi-check-lg"></i></button></td>';
                    tr.querySelector('textarea').value = desc;
                    tr.cells[2].querySelector('textarea').value = longDesc;
                    if (madeNew) poBody.appendChild(tr);

                    // reset form + close
                    ['poItDesc', 'poItLongDesc', 'poItRateInr', 'poItHsn', 'poItRateUsd', 'poItUnit'].forEach(function(id) {
                      document.getElementById(id).value = '';
                    });
                    document.getElementById('poItTax1').value = 'No Tax';
                    document.getElementById('poItTax2').value = 'No Tax';
                    document.getElementById('poItGroup').value = '';
                    bootstrap.Modal.getOrCreateInstance(poItemModal).hide();
                    toast('Item "' + desc + '" added to purchase order');
                  });
                }

                /* Items amount calc + confirm/delete — PO table */
                document.addEventListener('input', function(e) {
                  var t = e.target;
                  if (!t.closest || !t.closest('#cvPoItemBody')) return;
                  var row = t.closest('tr');
                  if (!row || row.classList.contains('cv-inv-row-locked')) return;
                  var qty = parseFloat(row.cells[3].querySelector('input').value) || 0,
                    rate = parseFloat(row.cells[4].querySelector('input').value) || 0;
                  row.querySelector('.cv-inv-amt').textContent = '₹ ' + (qty * rate).toFixed(2);
                });

                if (poBody) {
                  poBody.addEventListener('click', function(e) {
                    var check = e.target.closest('.cv-inv-check'),
                      del = e.target.closest('.cv-inv-row-del'),
                      row;
                    if (del) {
                      row = del.closest('tr');
                      if (row) row.remove();
                      if (poBody && !poBody.querySelector('tr')) poBody.appendChild(poBlankRow());
                      return;
                    }
                    if (!check) return;
                    row = check.closest('tr');
                    if (!row || row.classList.contains('cv-inv-row-locked')) return;
                    row.classList.add('cv-inv-row-locked');
                    row.querySelectorAll('input, select, textarea').forEach(function(el) {
                      el.setAttribute('readonly', 'readonly');
                      el.setAttribute('disabled', 'disabled');
                    });
                    check.className = 'cv-inv-row-del';
                    check.title = 'Delete item';
                    check.innerHTML = '<i class="bi bi-trash"></i>';
                    if (poAdd) poBody.appendChild(poBlankRow());
                  });
                }

                /* Submit -> success toast */
                var poSubmit = document.getElementById('cvPoSubmit');
                if (poSubmit && poModal) {
                  poSubmit.addEventListener('click', function() {
                    bootstrap.Modal.getOrCreateInstance(poModal).hide();
                    toast('Purchase order PO-163 created successfully');
                  });
                }

                /* Zip Purchase Orders -> modal */
                var poZipBtn = document.getElementById('cvPoZipBtn'),
                  poZipModal = document.getElementById('cvPoZipModal');
                if (poZipBtn && poZipModal) {
                  poZipBtn.addEventListener('click', function() {
                    if (typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(poZipModal).show();
                  });
                }

                /* Zip submit -> validate date range + toast */
                var poZipSubmit = document.getElementById('cvPoZipSubmit');
                if (poZipSubmit && poZipModal) {
                  poZipSubmit.addEventListener('click', function() {
                    var from = document.getElementById('cvPoZipFrom').value,
                      to = document.getElementById('cvPoZipTo').value;
                    if (from && to && from > to) {
                      toast('From Date cannot be after To Date');
                      return;
                    }
                    var statusEl = document.querySelector('input[name="cvPoZipStatus"]:checked'),
                      status = statusEl ? statusEl.value : 'All';
                    bootstrap.Modal.getOrCreateInstance(poZipModal).hide();
                    var msg = 'Preparing ZIP of ' + status.toLowerCase() + ' purchase orders';
                    if (from && to) msg += ' from ' + from + ' to ' + to;
                    toast(msg + '...');
                  });
                }
              });

/* ==========================================================================
   Script Block 5
   ========================================================================== */
/* footer.php (bootstrap) loads AFTER this block — bind on DOMContentLoaded */
              document.addEventListener('DOMContentLoaded', function() {
                function toast(msg) {
                  var t = document.createElement('div');
                  t.className = 'cv-toast';
                  t.innerHTML = '<i class="bi bi-check-circle-fill"></i> ' + msg;
                  document.body.appendChild(t);
                  setTimeout(function() {
                    t.classList.add('show');
                  }, 10);
                  setTimeout(function() {
                    t.classList.remove('show');
                    setTimeout(function() {
                      t.remove();
                    }, 350);
                  }, 2400);
                }

                /* New Subscription -> centered modal */
                var subNewBtn = document.getElementById('cvSubNewBtn'),
                  subModal = document.getElementById('cvNewSubModal');
                if (subNewBtn && subModal && window.bootstrap) {
                  subNewBtn.addEventListener('click', function() {
                    var nm = document.getElementById('subName');
                    if (nm) nm.value = '';
                    var ds = document.getElementById('subDesc');
                    if (ds) ds.value = '';
                    var pl = document.getElementById('subPlan');
                    if (pl) pl.value = '';
                    var qt = document.getElementById('subQty');
                    if (qt) qt.value = '1';
                    bootstrap.Modal.getOrCreateInstance(subModal).show();
                  });
                }

                /* Backdrop z-index fix for stacked modal */
                if (subModal) {
                  subModal.addEventListener('shown.bs.modal', function() {
                    var z = parseInt(getComputedStyle(subModal).zIndex, 10) || 1075;
                    var backdrops = document.querySelectorAll('.modal-backdrop');
                    var last = backdrops[backdrops.length - 1];
                    if (last) last.style.zIndex = (z - 1);
                  });
                }

                /* Submit -> validate required + success toast */
                var subSubmit = document.getElementById('cvSubSubmit');
                if (subSubmit && subModal) {
                  subSubmit.addEventListener('click', function() {
                    var name = document.getElementById('subName'),
                      plan = document.getElementById('subPlan');
                    var invalid = null;
                    [name, plan].forEach(function(el) {
                      if (!el) return;
                      var bad = !el.value.trim();
                      el.style.borderColor = bad ? '#dc2626' : '';
                      if (bad && !invalid) invalid = el;
                    });
                    if (invalid) {
                      toast('Subscription Name and Billing Plan are required');
                      invalid.focus();
                      return;
                    }
                    bootstrap.Modal.getOrCreateInstance(subModal).hide();
                    toast('Subscription "' + name.value.trim() + '" created successfully');
                  });
                  ['subName', 'subPlan'].forEach(function(id) {
                    var el = document.getElementById(id);
                    if (el) el.addEventListener('input', function() {
                      this.style.borderColor = '';
                    });
                  });
                }
              });

/* ==========================================================================
   Script Block 6
   ========================================================================== */
/* footer.php (bootstrap) loads AFTER this block — bind on DOMContentLoaded */
              document.addEventListener('DOMContentLoaded', function() {
                function toast(msg) {
                  var t = document.createElement('div');
                  t.className = 'cv-toast';
                  t.innerHTML = '<i class="bi bi-check-circle-fill"></i> ' + msg;
                  document.body.appendChild(t);
                  setTimeout(function() {
                    t.classList.add('show');
                  }, 10);
                  setTimeout(function() {
                    t.classList.remove('show');
                    setTimeout(function() {
                      t.remove();
                    }, 350);
                  }, 2400);
                }

                /* Record Expense -> fullscreen modal */
                var expNewBtn = document.getElementById('cvExpNewBtn'),
                  expModal = document.getElementById('cvNewExpenseModal');
                if (expNewBtn && expModal && window.bootstrap) {
                  expNewBtn.addEventListener('click', function() {
                    ['expName', 'expNote', 'expAmount', 'expRef'].forEach(function(id) {
                      var el = document.getElementById(id);
                      if (el) {
                        el.value = '';
                        el.style.borderColor = '';
                      }
                    });
                    ['expVendor', 'expCat', 'expSubCat', 'expPayMode'].forEach(function(id) {
                      var el = document.getElementById(id);
                      if (el) {
                        el.value = '';
                        el.style.borderColor = '';
                      }
                    });
                    var dt = document.getElementById('expDate');
                    if (dt) {
                      dt.value = '2026-09-23';
                      dt.style.borderColor = '';
                    }
                    var bb = document.getElementById('expBillable');
                    if (bb) bb.checked = false;
                    var fl = document.getElementById('expFile');
                    if (fl) fl.value = '';
                    bootstrap.Modal.getOrCreateInstance(expModal).show();
                  });
                }

                /* Category ➕ -> New Category modal */
                var catAdd = document.getElementById('expCatAdd'),
                  newCatModal = document.getElementById('cvNewCatModal');
                if (catAdd && newCatModal && window.bootstrap) {
                  catAdd.addEventListener('click', function() {
                    var nm = document.getElementById('newCatName'),
                      ds = document.getElementById('newCatDesc');
                    if (nm) {
                      nm.value = '';
                      nm.style.borderColor = '';
                    }
                    if (ds) ds.value = '';
                    bootstrap.Modal.getOrCreateInstance(newCatModal).show();
                  });
                }

                /* Stacked modal backdrop fix (expense fullscreen + category modal) */
                ['#cvNewExpenseModal', '#cvNewCatModal'].forEach(function(id) {
                  var el = document.querySelector(id);
                  if (!el) return;
                  el.addEventListener('shown.bs.modal', function() {
                    var z = parseInt(getComputedStyle(el).zIndex, 10) || 1055;
                    var backdrops = document.querySelectorAll('.modal-backdrop');
                    var last = backdrops[backdrops.length - 1];
                    if (last) last.style.zIndex = (z - 1);
                  });
                });

                /* Category name clear while typing */
                var newCatNameEl = document.getElementById('newCatName');
                if (newCatNameEl) newCatNameEl.addEventListener('input', function() {
                  this.style.borderColor = '';
                });

                /* New Category submit -> validate + add option to select + toast */
                var newCatSubmit = document.getElementById('newCatSubmit');
                if (newCatSubmit && newCatModal) {
                  newCatSubmit.addEventListener('click', function() {
                    var nm = document.getElementById('newCatName');
                    var name = nm.value.trim();
                    if (!name) {
                      nm.style.borderColor = '#dc2626';
                      toast('Category Name is required');
                      nm.focus();
                      return;
                    }
                    var sel = document.getElementById('expCat'),
                      exists = false;
                    if (sel) {
                      Array.prototype.forEach.call(sel.options, function(op) {
                        if (op.text === name) exists = true;
                      });
                      if (!exists) {
                        var op = document.createElement('option');
                        op.value = name;
                        op.text = name;
                        sel.appendChild(op);
                      }
                      sel.value = name;
                      sel.style.borderColor = '';
                    }
                    bootstrap.Modal.getOrCreateInstance(newCatModal).hide();
                    toast('Category "' + name + '" added');
                  });
                }

                /* Clear red border while typing */
                ['expCat', 'expDate', 'expAmount'].forEach(function(id) {
                  var el = document.getElementById(id);
                  if (el) el.addEventListener('input', function() {
                    this.style.borderColor = '';
                  });
                });

                /* Submit -> validate required + success toast */
                var expSubmit = document.getElementById('cvExpSubmit');
                if (expSubmit && expModal) {
                  expSubmit.addEventListener('click', function() {
                    var req = ['expCat', 'expDate', 'expAmount'],
                      invalid = null;
                    req.forEach(function(id) {
                      var el = document.getElementById(id);
                      if (!el) return;
                      var bad = !String(el.value).trim();
                      el.style.borderColor = bad ? '#dc2626' : '';
                      if (bad && !invalid) invalid = el;
                    });
                    if (invalid) {
                      toast('Expense Category, Date and Amount are required');
                      invalid.focus();
                      return;
                    }
                    var amt = document.getElementById('expAmount').value,
                      cat = document.getElementById('expCat').value;
                    bootstrap.Modal.getOrCreateInstance(expModal).hide();
                    toast('Expense of ₹ ' + amt + ' (' + cat + ') recorded successfully');
                  });
                }
              });

/* ==========================================================================
   Script Block 7
   ========================================================================== */
/* footer.php (bootstrap) loads AFTER this block — bind on DOMContentLoaded */
              document.addEventListener('DOMContentLoaded', function() {
                function toast(msg) {
                  var t = document.createElement('div');
                  t.className = 'cv-toast';
                  t.innerHTML = '<i class="bi bi-check-circle-fill"></i> ' + msg;
                  document.body.appendChild(t);
                  setTimeout(function() {
                    t.classList.add('show');
                  }, 10);
                  setTimeout(function() {
                    t.classList.remove('show');
                    setTimeout(function() {
                      t.remove();
                    }, 350);
                  }, 2400);
                }

                /* New contract -> modal */
                var conNewBtn = document.getElementById('cvConNewBtn'),
                  conModal = document.getElementById('cvNewContractModal');
                if (conNewBtn && conModal && window.bootstrap) {
                  conNewBtn.addEventListener('click', function() {
                    ['conSubject', 'conValue', 'conDesc'].forEach(function(id) {
                      var el = document.getElementById(id);
                      if (el) {
                        el.value = '';
                        el.style.borderColor = '';
                      }
                    });
                    var ty = document.getElementById('conType');
                    if (ty) ty.value = '';
                    var en = document.getElementById('conEnd');
                    if (en) en.value = '';
                    ['conTrash', 'conHide'].forEach(function(id) {
                      var el = document.getElementById(id);
                      if (el) el.checked = false;
                    });
                    bootstrap.Modal.getOrCreateInstance(conModal).show();
                  });
                }

                /* Backdrop z-index fix (stacked modal) */
                if (conModal) {
                  conModal.addEventListener('shown.bs.modal', function() {
                    var z = parseInt(getComputedStyle(conModal).zIndex, 10) || 1075;
                    var backdrops = document.querySelectorAll('.modal-backdrop');
                    var last = backdrops[backdrops.length - 1];
                    if (last) last.style.zIndex = (z - 1);
                  });
                }
                if (conTypeModal) {
                  conTypeModal.addEventListener('shown.bs.modal', function() {
                    var backdrops = document.querySelectorAll('.modal-backdrop');
                    var last = backdrops[backdrops.length - 1];
                    if (last) last.style.zIndex = 1084; /* below type modal 1085, above contract modal 1075 */
                  });
                }

                /* Contract type ➕ -> New contract type modal */
                var conTypeAdd = document.getElementById('conTypeAdd'),
                  conTypeModal = document.getElementById('cvConTypeModal');
                if (conTypeAdd && conTypeModal && window.bootstrap) {
                  conTypeAdd.addEventListener('click', function() {
                    var nm = document.getElementById('conTypeName');
                    if (nm) {
                      nm.value = '';
                      nm.style.borderColor = '';
                    }
                    bootstrap.Modal.getOrCreateInstance(conTypeModal).show();
                  });
                }

                /* Contract type name clear while typing */
                var conTypeNameEl = document.getElementById('conTypeName');
                if (conTypeNameEl) conTypeNameEl.addEventListener('input', function() {
                  this.style.borderColor = '';
                });

                /* New contract type submit -> validate + add option to select + toast */
                var conTypeSubmit = document.getElementById('conTypeSubmit');
                if (conTypeSubmit && conTypeModal) {
                  conTypeSubmit.addEventListener('click', function() {
                    var nm = document.getElementById('conTypeName'),
                      name = nm.value.trim();
                    if (!name) {
                      nm.style.borderColor = '#dc2626';
                      toast('Name is required');
                      nm.focus();
                      return;
                    }
                    var sel = document.getElementById('conType'),
                      exists = false;
                    if (sel) {
                      Array.prototype.forEach.call(sel.options, function(op) {
                        if (op.text === name) exists = true;
                      });
                      if (!exists) {
                        var op = document.createElement('option');
                        op.value = name;
                        op.text = name;
                        sel.appendChild(op);
                      }
                      sel.value = name;
                      sel.style.borderColor = '';
                    }
                    bootstrap.Modal.getOrCreateInstance(conTypeModal).hide();
                    toast('Contract type "' + name + '" added');
                  });
                }

                /* Clear red border while typing */
                ['conSubject'].forEach(function(id) {
                  var el = document.getElementById(id);
                  if (el) el.addEventListener('input', function() {
                    this.style.borderColor = '';
                  });
                });

                /* Submit -> validate required + success toast */
                var conSubmit = document.getElementById('cvConSubmit');
                if (conSubmit && conModal) {
                  conSubmit.addEventListener('click', function() {
                    var subj = document.getElementById('conSubject'),
                      start = document.getElementById('conStart'),
                      invalid = null;
                    [subj, start].forEach(function(el) {
                      if (!el) return;
                      var bad = !String(el.value).trim();
                      el.style.borderColor = bad ? '#dc2626' : '';
                      if (bad && !invalid) invalid = el;
                    });
                    if (invalid) {
                      toast('Subject and Start Date are required');
                      invalid.focus();
                      return;
                    }
                    bootstrap.Modal.getOrCreateInstance(conModal).hide();
                    toast('Contract "' + subj.value.trim() + '" created successfully');
                  });
                }
              });

/* ==========================================================================
   Script Block 8
   ========================================================================== */
/* footer.php (bootstrap) loads AFTER this block — bind on DOMContentLoaded */
              document.addEventListener('DOMContentLoaded', function() {
                function toast(msg, ok) {
                  var t = document.createElement('div');
                  t.className = 'cv-toast';
                  t.innerHTML = '<i class="bi ' + (ok === false ? 'bi-exclamation-circle-fill' : 'bi-check-circle-fill') + '"></i> ' + msg;
                  document.body.appendChild(t);
                  setTimeout(function() {
                    t.classList.add('show');
                  }, 10);
                  setTimeout(function() {
                    t.classList.remove('show');
                    setTimeout(function() {
                      t.remove();
                    }, 350);
                  }, 2400);
                }

                var prjBtn = document.getElementById('cvPrjNewBtn'),
                  prjModal = document.getElementById('cvNewProjectModal'),
                  pgBody = document.getElementById('cvBody-projects');
                if (!prjBtn || !prjModal || !pgBody) return;

                /* Tabs: Project / Project Settings */
                var prjTabs = prjModal.querySelectorAll('.cv-prj-tab'),
                  prjPanes = prjModal.querySelectorAll('.cv-prj-pane');
                prjTabs.forEach(function(tb) {
                  tb.addEventListener('click', function() {
                    prjTabs.forEach(function(x) {
                      x.classList.toggle('active', x === tb);
                    });
                    prjPanes.forEach(function(p) {
                      p.classList.toggle('active', p.dataset.prjpane === tb.dataset.prjtab);
                    });
                  });
                });

                /* Progress slider */
                var prjProg = document.getElementById('prjProg'),
                  prjProgVal = document.getElementById('prjProgVal');
                if (prjProg && prjProgVal) prjProg.addEventListener('input', function() {
                  prjProgVal.textContent = this.value + '%';
                });

                /* ---- Visible Tabs: chips + profile-dropdown select (lead.php status pattern) ---- */
                var tabsBox = document.getElementById('prjVisibleTabs'),
                  tabsMenu = document.getElementById('prjTabsMenu');
                if (tabsBox && tabsMenu) {
                  var ALL_TABS = ['Profit & Loss', 'Tasks', 'Timesheets', 'Milestones', 'Files', 'Discussions', 'Gantt', 'Tickets', 'Video Library', 'Contracts', 'Proposals', 'Estimates', 'Purchase Orders', 'Invoices', 'Subscriptions', 'Expenses', 'Credit Notes'];

                  function selectedTabs() {
                    return Array.prototype.map.call(tabsBox.querySelectorAll('.cv-tag-chip[data-tab]'), function(c) {
                      return c.getAttribute('data-tab').replace(/&amp;/g, '&');
                    });
                  }

                  function renderTabsMenu() {
                    var sel = selectedTabs(),
                      remaining = ALL_TABS.filter(function(t) {
                        return sel.indexOf(t) === -1;
                      }),
                      html = '';
                    remaining.forEach(function(t) {
                      html += '<li><a class="dropdown-item" href="#" data-tab="' + t.replace(/&/g, '&amp;') + '"><i class="bi bi-check-lg"></i>' + t.replace(/&/g, '&amp;') + '</a></li>';
                    });
                    if (!remaining.length) html = '<li><a class="dropdown-item empty" href="#">All tabs added</a></li>';
                    tabsMenu.innerHTML = html;
                  }

                  function makeChip(name) {
                    var chip = document.createElement('span');
                    chip.className = 'cv-tag-chip';
                    chip.setAttribute('data-tab', name);
                    chip.innerHTML = name.replace(/&/g, '&amp;') + '<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button>';
                    var dd = tabsBox.querySelector('.cv-prj-tabs-dd'),
                      menuWrap = dd.parentNode;
                    menuWrap.insertBefore(chip, dd);
                  }

                  renderTabsMenu();

                  /* chip ✕ -> remove */
                  tabsBox.addEventListener('click', function(e) {
                    var x = e.target.closest('.chip-x');
                    if (!x) return;
                    x.closest('.cv-tag-chip[data-tab]').remove();
                    renderTabsMenu();
                  });

                  /* dropdown item -> add chip back */
                  tabsMenu.addEventListener('click', function(e) {
                    var item = e.target.closest('.dropdown-item[data-tab]');
                    if (!item) return;
                    e.preventDefault();
                    makeChip(item.getAttribute('data-tab').replace(/&amp;/g, '&'));
                    /* close dropdown (same flow as lead status) */
                    var dd = item.closest('.dropdown');
                    if (dd && typeof bootstrap !== 'undefined') {
                      var ddBtn = dd.querySelector('[data-bs-toggle="dropdown"]');
                      if (ddBtn) bootstrap.Dropdown.getOrCreateInstance(ddBtn).hide();
                    }
                    renderTabsMenu();
                  });
                }

                var quill = null;

                function initQuill() {
                  if (quill || typeof Quill === 'undefined') return;
                  quill = new Quill('#cvPrjQuill', {
                    theme: 'snow',
                    placeholder: 'Write project description here...',
                    modules: {
                      toolbar: [
                        [{
                          font: ['verdana', 'sans-serif', 'serif', 'monospace']
                        }, {
                          size: ['small', false, 'large', 'huge']
                        }],
                        [{
                          color: []
                        }, {
                          background: []
                        }],
                        ['bold', 'italic', 'underline'],
                        [{
                          align: []
                        }],
                        ['image', 'link'],
                        [{
                          list: 'bullet'
                        }, {
                          list: 'ordered'
                        }],
                        ['clean']
                      ]
                    }
                  });
                }

                /* New Project -> open modal (fresh) */
                prjBtn.addEventListener('click', function() {
                  ['prjName', 'prjDeadlineLimit', 'prjTotalRate', 'prjHours', 'prjDeadline'].forEach(function(id) {
                    var el = document.getElementById(id);
                    if (el) {
                      el.value = '';
                      el.style.borderColor = '';
                    }
                  });
                  document.getElementById('prjStatus').value = 'In Progress';
                  document.getElementById('prjBilling').value = 'Fixed Rate';
                  if (prjProg) {
                    prjProg.value = 0;
                    prjProgVal.textContent = '0%';
                  }
                  prjTabs[0].click();
                  bootstrap.Modal.getOrCreateInstance(prjModal).show();
                  setTimeout(initQuill, 150);
                  setTimeout(function() {
                    if (quill) quill.root.innerHTML = '';
                  }, 200);
                });

                /* name clear red border while typing */
                document.getElementById('prjName').addEventListener('input', function() {
                  this.style.borderColor = '';
                });

                /* Submit -> validate + append row */
                document.getElementById('cvPrjSubmit').addEventListener('click', function() {
                  var name = document.getElementById('prjName'),
                    start = document.getElementById('prjStart'),
                    billing = document.getElementById('prjBilling'),
                    invalid = null;
                  [name, start, billing].forEach(function(el) {
                    if (!el) return;
                    var bad = !String(el.value).trim();
                    el.style.borderColor = bad ? '#dc2626' : '';
                    if (bad && !invalid) invalid = el;
                  });
                  if (invalid) {
                    toast('Project Name, Billing Type and Start Date are required', false);
                    invalid.focus();
                    return;
                  }
                  var esc = function(s) {
                      var dv = document.createElement('div');
                      dv.textContent = s;
                      return dv.innerHTML;
                    },
                    status = document.getElementById('prjStatus').value || 'In Progress',
                    members = document.getElementById('prjMembers').value || '—',
                    sd = start.value,
                    dl = document.getElementById('prjDeadline').value,
                    remaining = '—',
                    pct = prjProg ? prjProg.value : 0;
                  if (sd && dl) {
                    var diff = Math.ceil((new Date(dl) - new Date(sd)) / 86400000);
                    remaining = diff > 0 ? diff : 0;
                  }
                  var count = pgBody.querySelectorAll('tr').length,
                    next = count + 1;
                  var tr = pgBody.insertRow();
                  tr.className = 'cv-row';
                  tr.innerHTML = '<td>' + next + '</td>' +
                    '<td><a href="#" class="cv-link">' + esc(name.value.trim()) + '</a></td>' +
                    '<td>—</td>' +
                    '<td><div class="cv-prj-prog"><div class="cv-prj-bar"><span style="width:' + pct + '%;"></span></div><span class="cv-prj-pct">' + pct + '%</span></div></td>' +
                    '<td>' + (sd || '—') + '</td>' +
                    '<td>' + (dl || '—') + '</td>' +
                    '<td><span class="cv-prj-remain">' + remaining + '</span></td>' +
                    '<td><span class="d-inline-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="cv-avatar" alt=""><span>' + esc(members) + '</span></span></td>' +
                    '<td><span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>' + esc(status) + '</span></td>';
                  bootstrap.Modal.getOrCreateInstance(prjModal).hide();
                  if (window.refreshAttendanceTable) window.refreshAttendanceTable();
                  toast('Project "' + name.value.trim() + '" created successfully');
                });
              });

/* ==========================================================================
   Script Block 9
   ========================================================================== */
/* footer.php (bootstrap) loads AFTER this block — bind on DOMContentLoaded */
              document.addEventListener('DOMContentLoaded', function() {
                function toast(msg, ok) {
                  var t = document.createElement('div');
                  t.className = 'cv-toast';
                  t.innerHTML = '<i class="bi ' + (ok === false ? 'bi-exclamation-circle-fill' : 'bi-check-circle-fill') + '"></i> ' + msg;
                  document.body.appendChild(t);
                  setTimeout(function() {
                    t.classList.add('show');
                  }, 10);
                  setTimeout(function() {
                    t.classList.remove('show');
                    setTimeout(function() {
                      t.remove();
                    }, 350);
                  }, 2400);
                }

                var pgBody = document.getElementById('cvBody-tasks'),
                  tskBtn = document.getElementById('cvTskNewBtn'),
                  tskModal = document.getElementById('cvNewTaskModal');

                /* New Task -> open modal (fresh) */
                if (tskBtn && tskModal && window.bootstrap) {
                  tskBtn.addEventListener('click', function() {
                    ['tskSubject', 'tskDue', 'tskTags', 'tskDesc'].forEach(function(id) {
                      var el = document.getElementById(id);
                      if (el) {
                        el.value = '';
                        el.style.borderColor = '';
                      }
                    });
                    document.getElementById('tskRate').value = '0';
                    document.getElementById('tskStart').value = '2026-09-23';
                    document.getElementById('tskPriority').value = 'Medium';
                    document.getElementById('tskRepeat').value = '';
                    document.getElementById('tskRelated').value = 'Customer';
                    document.getElementById('tskAssignees').value = 'gharuda SOFTWARE';
                    document.getElementById('tskFollowers').value = '';
                    document.getElementById('tskChecklist').value = '';
                    document.getElementById('tskPublic').checked = false;
                    document.getElementById('tskBillable').checked = true;
                    document.getElementById('tskDep').checked = false;
                    var fi = document.getElementById('cvTskFileInput');
                    if (fi) fi.value = '';
                    pickedFiles = [];
                    if (fileList) fileList.innerHTML = '';
                    bootstrap.Modal.getOrCreateInstance(tskModal).show();
                  });
                }

                /* Backdrop z-index fix (stacked modal) */
                if (tskModal) {
                  tskModal.addEventListener('shown.bs.modal', function() {
                    var z = parseInt(getComputedStyle(tskModal).zIndex, 10) || 1075;
                    var backdrops = document.querySelectorAll('.modal-backdrop');
                    var last = backdrops[backdrops.length - 1];
                    if (last) last.style.zIndex = (z - 1);
                  });
                }

                /* required fields clear red border while typing */
                ['tskSubject', 'tskStart'].forEach(function(id) {
                  var el = document.getElementById(id);
                  if (el) el.addEventListener('input', function() {
                    this.style.borderColor = '';
                  });
                });

                /* Attach Files: drag & drop zone + file list */
                var dropZone = document.getElementById('cvTskDropZone'),
                  fileInput = document.getElementById('cvTskFileInput'),
                  fileList = document.getElementById('cvTskFileList');

                function fileIcon(f) {
                  var n = (f.name || '').toLowerCase();
                  if (f.type.indexOf('image/') === 0 || /\.(png|jpe?g|gif|webp|svg)$/.test(n)) return 'bi-file-earmark-image';
                  if (f.type === 'application/pdf' || n.indexOf('.pdf') !== -1) return 'bi-file-earmark-pdf';
                  if (/\.docx?$/.test(n)) return 'bi-file-earmark-word';
                  if (/\.xlsx?$/.test(n)) return 'bi-file-earmark-excel';
                  return 'bi-file-earmark';
                }

                function fmtSize(bytes) {
                  if (bytes >= 1048576) return (bytes / 1048576).toFixed(1) + ' MB';
                  if (bytes >= 1024) return (bytes / 1024).toFixed(1) + ' KB';
                  return bytes + ' B';
                }

                var pickedFiles = []; /* accumulated across multiple Browse/drop sessions */

                function redrawFileList() {
                  fileList.innerHTML = '';
                  pickedFiles.forEach(function(f, idx) {
                    var item = document.createElement('div');
                    item.className = 'cv-tsk-file-item';
                    item.innerHTML = '<i class="bi ' + fileIcon(f) + '"></i>' +
                      '<span class="nm"></span><span class="sz"></span>' +
                      '<button type="button" class="rm" title="Remove"><i class="bi bi-x-lg"></i></button>';
                    item.querySelector('.nm').textContent = f.name;
                    item.querySelector('.sz').textContent = fmtSize(f.size || 0);
                    item.querySelector('.rm').addEventListener('click', function() {
                      pickedFiles.splice(idx, 1);
                      redrawFileList();
                    });
                    fileList.appendChild(item);
                  });
                }

                function addFiles(list) {
                  var added = 0;
                  Array.prototype.forEach.call(list, function(f) {
                    /* skip duplicates (same name + size already picked) */
                    var dup = pickedFiles.some(function(p) {
                      return p.name === f.name && p.size === f.size;
                    });
                    if (dup) return;
                    pickedFiles.push(f);
                    added++;
                  });
                  redrawFileList();
                  if (added) toast(added + ' file(s) attached');
                }

                if (dropZone && fileInput) {
                  dropZone.addEventListener('click', function() {
                    fileInput.click();
                  });
                  dropZone.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    dropZone.classList.add('dragover');
                  });
                  dropZone.addEventListener('dragleave', function() {
                    dropZone.classList.remove('dragover');
                  });
                  dropZone.addEventListener('drop', function(e) {
                    e.preventDefault();
                    dropZone.classList.remove('dragover');
                    if (e.dataTransfer && e.dataTransfer.files.length) addFiles(e.dataTransfer.files);
                  });
                  fileInput.addEventListener('change', function() {
                    if (fileInput.files.length) addFiles(fileInput.files);
                    fileInput.value = '';
                  });
                }

                /* ---- Filter dropdown -> datatable external hook (wraps global search hook) ---- */
                var fStatus = document.getElementById('cvTskFStatus'),
                  fPriority = document.getElementById('cvTskFPriority'),
                  filterBtn = document.getElementById('cvTskFilterBtn');

                function refresh() {
                  if (window.refreshAttendanceTable) window.refreshAttendanceTable();
                }

                function syncFilterDot() {
                  if (!filterBtn) return;
                  var on = (fStatus && fStatus.value) || (fPriority && fPriority.value);
                  filterBtn.classList.toggle('filtered', !!on);
                }

                function installFilter() {
                  if (window.__tskFilterInstalled) return;
                  window.__tskFilterInstalled = true;
                  var base = window.attendanceRowMatches;
                  window.attendanceRowMatches = function(row) {
                    if (base && !base(row)) return false;
                    var st = fStatus && fStatus.value ? fStatus.value.toLowerCase() : '',
                      pr = fPriority && fPriority.value ? fPriority.value.toLowerCase() : '';
                    if (st && (!row.cells[2] || row.cells[2].textContent.trim().toLowerCase() !== st)) return false;
                    if (pr && (!row.cells[7] || row.cells[7].textContent.trim().toLowerCase() !== pr)) return false;
                    return true;
                  };
                }
                /* global search hook is set in a later DOMContentLoaded listener — wrap it after load */
                if (document.readyState === 'complete') installFilter();
                else window.addEventListener('load', installFilter);

                [fStatus, fPriority].forEach(function(sel) {
                  if (!sel) return;
                  sel.addEventListener('change', function() {
                    installFilter();
                    syncFilterDot();
                    refresh();
                  });
                });

                var fClear = document.getElementById('cvTskFClear');
                if (fClear) fClear.addEventListener('click', function() {
                  if (fStatus) fStatus.value = '';
                  if (fPriority) fPriority.value = '';
                  var searchEl = document.getElementById('cvSearch');
                  if (searchEl) {
                    searchEl.value = '';
                    searchEl.dispatchEvent(new Event('input'));
                  }
                  installFilter();
                  syncFilterDot();
                  refresh();
                  toast('Filters cleared');
                });

                /* Submit -> validate + append row */
                document.getElementById('cvTskSubmit').addEventListener('click', function() {
                  var subj = document.getElementById('tskSubject'),
                    start = document.getElementById('tskStart'),
                    invalid = null;
                  [subj, start].forEach(function(el) {
                    if (!el) return;
                    var bad = !String(el.value).trim();
                    el.style.borderColor = bad ? '#dc2626' : '';
                    if (bad && !invalid) invalid = el;
                  });
                  if (invalid) {
                    toast('Subject and Start Date are required', false);
                    invalid.focus();
                    return;
                  }
                  var esc = function(s) {
                      var dv = document.createElement('div');
                      dv.textContent = s;
                      return dv.innerHTML;
                    },
                    fmt = function(v) {
                      if (!v) return '—';
                      var p = v.split('-');
                      return p.length === 3 ? p[2] + '-' + p[1] + '-' + p[0] : v;
                    },
                    priority = document.getElementById('tskPriority').value || 'Medium',
                    pcls = /high|urgent/i.test(priority) ? 'bad' : (/medium/i.test(priority) ? 'wait' : 'ok'),
                    assignee = document.getElementById('tskAssignees').value || '—',
                    tags = document.getElementById('tskTags').value.trim(),
                    count = pgBody.querySelectorAll('tr').length,
                    next = count + 1;
                  var tr = pgBody.insertRow();
                  tr.className = 'cv-row';
                  tr.innerHTML = '<td><span style="color:var(--ink-500);font-weight:600;">' + next + '</span></td>' +
                    '<td><a href="#" class="cv-link">' + esc(subj.value.trim()) + '</a></td>' +
                    '<td><span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Not Started</span></td>' +
                    '<td>' + fmt(start.value) + '</td>' +
                    '<td>' + fmt(document.getElementById('tskDue').value) + '</td>' +
                    '<td>' + esc(assignee) + '</td>' +
                    '<td>' + (tags ? '<span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip">' + esc(tags) + '</span>' : '—') + '</td>' +
                    '<td><span class="cv-pill ' + pcls + '"><i class="bi bi-circle-fill" style="font-size:6px;"></i>' + esc(priority) + '</span></td>';
                  if (window.refreshAttendanceTable) window.refreshAttendanceTable();
                  bootstrap.Modal.getOrCreateInstance(tskModal).hide();
                  toast('Task "' + subj.value.trim() + '" created successfully');
                });
              });

/* ==========================================================================
   Script Block 10
   ========================================================================== */
/* footer.php (bootstrap) loads AFTER this block — bind on DOMContentLoaded */
              document.addEventListener('DOMContentLoaded', function() {
                function toast(msg, ok) {
                  var t = document.createElement('div');
                  t.className = 'cv-toast';
                  t.innerHTML = '<i class="bi ' + (ok === false ? 'bi-exclamation-circle-fill' : 'bi-check-circle-fill') + '"></i> ' + msg;
                  document.body.appendChild(t);
                  setTimeout(function() {
                    t.classList.add('show');
                  }, 10);
                  setTimeout(function() {
                    t.classList.remove('show');
                    setTimeout(function() {
                      t.remove();
                    }, 350);
                  }, 2400);
                }

                var pgBody = document.getElementById('cvBody-tickets'),
                  tktBtn = document.getElementById('cvTktNewBtn'),
                  tktModal = document.getElementById('cvNewTicketModal'),
                  quill = null;

                function initQuill() {
                  if (quill || typeof Quill === 'undefined') return;
                  quill = new Quill('#cvTktQuill', {
                    theme: 'snow',
                    placeholder: 'Describe the issue...',
                    modules: {
                      toolbar: [
                        [{
                          font: ['verdana', 'sans-serif', 'serif', 'monospace']
                        }, {
                          size: ['small', false, 'large', 'huge']
                        }],
                        [{
                          color: []
                        }, {
                          background: []
                        }],
                        ['bold', 'italic', 'underline'],
                        [{
                          align: []
                        }],
                        ['image', 'link'],
                        [{
                          list: 'bullet'
                        }, {
                          list: 'ordered'
                        }],
                        ['clean']
                      ]
                    }
                  });
                }

                /* New Ticket -> open modal (fresh) */
                if (tktBtn && tktModal && window.bootstrap) {
                  tktBtn.addEventListener('click', function() {
                    ['tktSubject', 'tktTags', 'tktCc'].forEach(function(id) {
                      var el = document.getElementById(id);
                      if (el) {
                        el.value = '';
                        el.style.borderColor = '';
                      }
                    });
                    document.getElementById('tktContact').value = 'Suresh s';
                    document.getElementById('tktAssign').value = 'gharuda SOFTWARE';
                    document.getElementById('tktFollower').value = 'gharuda SOFTWARE';
                    document.getElementById('tktPriority').value = 'Medium';
                    document.getElementById('tktDept').value = '';
                    document.getElementById('tktService').value = '';
                    document.getElementById('tktPredefined').value = '';
                    document.getElementById('tktKbLink').value = '';
                    var fl = document.getElementById('tktFileList');
                    if (fl) fl.innerHTML = '';
                    var fi = document.getElementById('tktFile');
                    if (fi) fi.value = '';
                    bootstrap.Modal.getOrCreateInstance(tktModal).show();
                    setTimeout(initQuill, 150);
                    setTimeout(function() {
                      if (quill) quill.root.innerHTML = '';
                    }, 200);
                  });
                }

                /* Backdrop z-index fix (stacked modal) */
                if (tktModal) {
                  tktModal.addEventListener('shown.bs.modal', function() {
                    var z = parseInt(getComputedStyle(tktModal).zIndex, 10) || 1055;
                    var backdrops = document.querySelectorAll('.modal-backdrop');
                    var last = backdrops[backdrops.length - 1];
                    if (last) last.style.zIndex = (z - 1);
                  });
                }

                /* Subject clear red border while typing */
                var tktSubjEl = document.getElementById('tktSubject');
                if (tktSubjEl) tktSubjEl.addEventListener('input', function() {
                  this.style.borderColor = '';
                });

                /* Contact select -> autofill name/email (readonly fields) */
                var contactData = {
                  'Suresh s': ['Suresh s', 'pm@GHARUDAtechnology.com'],
                  'Divya M': ['Divya M', 'divya@GHARUDAtechnology.com'],
                  'Karthik R': ['Karthik R', 'karthik@GHARUDAtechnology.com']
                };
                var tktContact = document.getElementById('tktContact');
                if (tktContact) tktContact.addEventListener('change', function() {
                  var d = contactData[this.value] || ['', ''];
                  document.getElementById('tktName').value = d[0];
                  document.getElementById('tktEmail').value = d[1];
                });

                /* Predefined reply -> insert into Quill */
                var preDefReplies = {
                  'Thank you — we are looking into it': '<p>Thank you for reaching out. We are looking into your issue and will get back to you shortly.</p>',
                  'Issue resolved — closing ticket': '<p>Your issue has been resolved. This ticket is now being closed. Feel free to reopen if you need anything else.</p>'
                };
                var tktPre = document.getElementById('tktPredefined');
                if (tktPre) tktPre.addEventListener('change', function() {
                  if (this.value && preDefReplies[this.value] && quill) {
                    quill.root.innerHTML = preDefReplies[this.value];
                  }
                });

                /* Knowledge base link -> insert link into Quill */
                var tktKb = document.getElementById('tktKbLink');
                if (tktKb) tktKb.addEventListener('change', function() {
                  if (this.value && quill) {
                    var url = 'https://kb.GHARUDAtechnology.com/' + this.value.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');
                    quill.focus();
                    quill.updateContents(quill.getSelection(true) || {
                      index: quill.getLength(),
                      length: 0
                    }, [{
                      insert: this.value,
                      attributes: {
                        link: url
                      }
                    }, {
                      insert: '\n'
                    }]);
                  }
                  this.value = '';
                });

                /* ➕ -> add another attachment file input row */
                var tktFileAdd = document.getElementById('tktFileAdd'),
                  tktFileList = document.getElementById('tktFileList');
                if (tktFileAdd && tktFileList) {
                  tktFileAdd.addEventListener('click', function() {
                    var fi = document.getElementById('tktFile');
                    if (fi && fi.files && fi.files.length) {
                      Array.prototype.forEach.call(fi.files, function(f) {
                        var row = document.createElement('div');
                        row.className = 'cv-tkt-file-row';
                        row.innerHTML = '<i class="bi bi-paperclip"></i><span class="nm"></span>' +
                          '<button type="button" class="rm" title="Remove"><i class="bi bi-x-lg"></i></button>';
                        row.querySelector('.nm').textContent = f.name;
                        row.querySelector('.rm').addEventListener('click', function() {
                          row.remove();
                        });
                        tktFileList.appendChild(row);
                      });
                      fi.value = '';
                    } else {
                      fi.click();
                    }
                  });
                  /* picking files directly also lists them */
                  document.getElementById('tktFile').addEventListener('change', function() {
                    if (this.files.length) tktFileAdd.click();
                  });
                }

                /* Service ➕ -> New Service modal */
                var svcAdd = document.getElementById('tktServiceAdd'),
                  svcModal = document.getElementById('cvNewServiceModal');
                if (svcAdd && svcModal && window.bootstrap) {
                  svcAdd.addEventListener('click', function() {
                    var nm = document.getElementById('svcName');
                    if (nm) {
                      nm.value = '';
                      nm.style.borderColor = '';
                    }
                    bootstrap.Modal.getOrCreateInstance(svcModal).show();
                  });
                }

                /* Backdrop z-index fix (stacked: service modal above ticket modal) */
                if (svcModal) {
                  svcModal.addEventListener('shown.bs.modal', function() {
                    var backdrops = document.querySelectorAll('.modal-backdrop');
                    var last = backdrops[backdrops.length - 1];
                    if (last) last.style.zIndex = 1064; /* below service modal 1065, above ticket modal 1055 */
                  });
                }

                /* Service name clear red border while typing */
                var svcNameEl = document.getElementById('svcName');
                if (svcNameEl) svcNameEl.addEventListener('input', function() {
                  this.style.borderColor = '';
                });

                /* New Service submit -> validate + add option to Service select + toast */
                var svcSubmit = document.getElementById('svcSubmit');
                if (svcSubmit && svcModal) {
                  svcSubmit.addEventListener('click', function() {
                    var nm = document.getElementById('svcName'),
                      name = nm.value.trim();
                    if (!name) {
                      nm.style.borderColor = '#dc2626';
                      toast('Service Name is required', false);
                      nm.focus();
                      return;
                    }
                    var sel = document.getElementById('tktService'),
                      exists = false;
                    if (sel) {
                      Array.prototype.forEach.call(sel.options, function(op) {
                        if (op.text === name) exists = true;
                      });
                      if (!exists) {
                        var op = document.createElement('option');
                        op.value = name;
                        op.text = name;
                        sel.appendChild(op);
                      }
                      sel.value = name;
                    }
                    bootstrap.Modal.getOrCreateInstance(svcModal).hide();
                    toast('Service "' + name + '" added');
                  });
                }

                /* Open Ticket -> validate + append row */
                document.getElementById('cvTktSubmit').addEventListener('click', function() {
                  var subj = document.getElementById('tktSubject'),
                    invalid = null;
                  var bad = !String(subj.value).trim();
                  subj.style.borderColor = bad ? '#dc2626' : '';
                  if (bad) {
                    toast('Subject is required', false);
                    subj.focus();
                    return;
                  }
                  var esc = function(s) {
                      var dv = document.createElement('div');
                      dv.textContent = s;
                      return dv.innerHTML;
                    },
                    now = new Date(),
                    pad = function(n) {
                      return String(n).padStart(2, '0');
                    },
                    created = pad(now.getDate()) + '-' + pad(now.getMonth() + 1) + '-' + now.getFullYear(),
                    lastReply = created + ' ' + pad(now.getHours()) + ':' + pad(now.getMinutes()),
                    priority = document.getElementById('tktPriority').value || 'Medium',
                    pcls = /high|urgent/i.test(priority) ? 'bad' : (/medium/i.test(priority) ? 'wait' : 'ok'),
                    dept = document.getElementById('tktDept').value || '—',
                    service = document.getElementById('tktService').value || '—',
                    contact = document.getElementById('tktContact').value || '—',
                    tags = document.getElementById('tktTags').value.trim(),
                    count = pgBody.querySelectorAll('tr').length,
                    next = count + 1043;
                  var tr = pgBody.insertRow();
                  tr.className = 'cv-row';
                  tr.innerHTML = '<td><span style="color:var(--ink-500);font-weight:600;">#' + next + '</span></td>' +
                    '<td><a href="#" class="cv-link">' + esc(subj.value.trim()) + '</a></td>' +
                    '<td>' + (tags ? '<span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip">' + esc(tags) + '</span>' : '—') + '</td>' +
                    '<td>' + esc(dept) + '</td>' +
                    '<td>' + esc(service) + '</td>' +
                    '<td>' + esc(contact) + '</td>' +
                    '<td><span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Open</span></td>' +
                    '<td><span class="cv-pill ' + pcls + '"><i class="bi bi-circle-fill" style="font-size:6px;"></i>' + esc(priority) + '</span></td>' +
                    '<td>' + lastReply + '</td>' +
                    '<td>' + created + '</td>';
                  if (window.refreshAttendanceTable) window.refreshAttendanceTable();
                  bootstrap.Modal.getOrCreateInstance(tktModal).hide();
                  toast('Ticket #' + next + ' opened successfully');
                });
              });

/* ==========================================================================
   Script Block 11
   ========================================================================== */
/* footer.php (bootstrap) loads AFTER this block — bind on DOMContentLoaded */
              document.addEventListener('DOMContentLoaded', function() {
                function toast(msg, ok) {
                  var t = document.createElement('div');
                  t.className = 'cv-toast';
                  t.innerHTML = '<i class="bi ' + (ok === false ? 'bi-exclamation-circle-fill' : 'bi-check-circle-fill') + '"></i> ' + msg;
                  document.body.appendChild(t);
                  setTimeout(function() {
                    t.classList.add('show');
                  }, 10);
                  setTimeout(function() {
                    t.classList.remove('show');
                    setTimeout(function() {
                      t.remove();
                    }, 350);
                  }, 2400);
                }

                var sendBtn = document.getElementById('cvSendEmailBtn'),
                  emModal = document.getElementById('cvComposeEmailModal'),
                  pgBody = document.getElementById('cvBody-email_log');
                if (!sendBtn || !emModal || !pgBody) return;

                var quill = null;

                function initQuill() {
                  if (quill || typeof Quill === 'undefined') return;
                  quill = new Quill('#cvEmQuill', {
                    theme: 'snow',
                    placeholder: 'Write your email here...',
                    modules: {
                      toolbar: [
                        [{
                          font: ['verdana', 'sans-serif', 'serif', 'monospace']
                        }, {
                          size: ['small', false, 'large', 'huge']
                        }],
                        [{
                          color: []
                        }, {
                          background: []
                        }],
                        ['bold', 'italic', 'underline'],
                        [{
                          align: []
                        }],
                        ['image', 'link'],
                        [{
                          list: 'bullet'
                        }, {
                          list: 'ordered'
                        }],
                        ['clean']
                      ]
                    }
                  });
                }

                /* Templates -> prefill subject + body */
                var TEMPLATES = {
                  welcome: {
                    subject: 'Welcome aboard',
                    body: '<p>Dear Customer,</p><p>Welcome aboard! We are excited to have you with us. Please feel free to reach out for any assistance.</p><p>Regards,<br>GHARUDA SOFTWARE TECHNOLOGY</p>'
                  },
                  quote: {
                    subject: 'Quotation follow-up',
                    body: '<p>Dear Customer,</p><p>Following up on the quotation shared with you. Kindly review and let us know your feedback.</p><p>Regards,<br>GHARUDA SOFTWARE TECHNOLOGY</p>'
                  },
                  invoice: {
                    subject: 'Invoice reminder',
                    body: '<p>Dear Customer,</p><p>This is a gentle reminder regarding your pending invoice. Please arrange the payment at the earliest.</p><p>Regards,<br>GHARUDA SOFTWARE TECHNOLOGY</p>'
                  }
                };
                document.getElementById('cvEmTemplate').addEventListener('change', function() {
                  var tpl = TEMPLATES[this.value];
                  if (!tpl) return;
                  document.getElementById('cvEmSubject').value = tpl.subject;
                  document.getElementById('cvEmSubject').style.borderColor = '';
                  initQuill();
                  if (quill) quill.root.innerHTML = tpl.body;
                });

                /* Attachment ➕ -> add row (✕ removes) */
                var attachList = document.getElementById('cvEmAttachList');
                attachList.addEventListener('click', function(e) {
                  var add = e.target.closest('.cv-em-add-file'),
                    rem = e.target.closest('.cv-em-remove-file');
                  if (rem) {
                    rem.closest('.cv-em-attach-row').remove();
                    return;
                  }
                  if (!add) return;
                  var row = document.createElement('div');
                  row.className = 'cv-em-attach-row';
                  row.innerHTML = '<input type="file" class="form-control cv-em-file"><button type="button" class="cv-em-remove-file" title="Remove" aria-label="Remove attachment"><i class="bi bi-x-lg"></i></button>';
                  attachList.insertBefore(row, add.closest('.cv-em-attach-row').nextSibling);
                });

                /* reset attachments to single row */
                function resetAttach() {
                  var rows = attachList.querySelectorAll('.cv-em-attach-row');
                  rows.forEach(function(r, i) {
                    if (i > 0) r.remove();
                  });
                  var first = attachList.querySelector('.cv-em-file');
                  if (first) first.value = '';
                }

                /* Send Email -> open modal (fresh) */
                sendBtn.addEventListener('click', function() {
                  document.getElementById('cvEmSubject').value = '';
                  document.getElementById('cvEmSubject').style.borderColor = '';
                  document.getElementById('cvEmCc').value = '';
                  document.getElementById('cvEmTemplate').value = '';
                  resetAttach();
                  bootstrap.Modal.getOrCreateInstance(emModal).show();
                  setTimeout(initQuill, 150);
                  setTimeout(function() {
                    if (quill) quill.root.innerHTML = '';
                  }, 200);
                });

                /* subject clear red border while typing */
                document.getElementById('cvEmSubject').addEventListener('input', function() {
                  this.style.borderColor = '';
                });

                /* send -> validate + append log row */
                document.getElementById('cvEmSend').addEventListener('click', function() {
                  var subj = document.getElementById('cvEmSubject'),
                    to = document.getElementById('cvEmTo');
                  if (!subj.value.trim()) {
                    subj.style.borderColor = '#dc2626';
                    toast('Email Subject is required', false);
                    subj.focus();
                    return;
                  }
                  var d = new Date(),
                    p = function(n) {
                      return String(n).padStart(2, '0');
                    },
                    when = p(d.getDate()) + '-' + p(d.getMonth() + 1) + '-' + d.getFullYear() + ' ' + p(d.getHours()) + ':' + p(d.getMinutes()) + ':' + p(d.getSeconds()),
                    esc = function(s) {
                      var dv = document.createElement('div');
                      dv.textContent = s;
                      return dv.innerHTML;
                    },
                    count = pgBody.querySelectorAll('tr').length,
                    nextId = 228 + count + 1;
                  var tr = pgBody.insertRow();
                  tr.className = 'cv-row';
                  tr.innerHTML = '<td>' + nextId + '</td><td>Admin</td><td>' + esc(subj.value.trim()) + '</td><td>' + when + '</td><td><span class="el-status">Success</span></td><td>—</td>';
                  bootstrap.Modal.getOrCreateInstance(emModal).hide();
                  if (window.refreshAttendanceTable) window.refreshAttendanceTable();
                  toast('Email sent to ' + to.value);
                });
              });

/* ==========================================================================
   Script Block 12
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
              var latEl = document.getElementById('cvMapLat'),
                lngEl = document.getElementById('cvMapLng'),
                preview = document.getElementById('cvMapPreview'),
                errEl = document.getElementById('cvMapErr'),
                wrap = preview.parentNode;

              function coords() {
                return {
                  lat: latEl.value.trim(),
                  lng: lngEl.value.trim()
                };
              }

              function valid(c) {
                return c.lat !== '' && c.lng !== '';
              }

              [latEl, lngEl].forEach(function(el) {
                el.addEventListener('input', function() {
                  if (valid(coords())) errEl.hidden = true;
                  if (el.value.trim()) el.style.borderColor = '';
                });
              });

              function markInvalid() {
                [latEl, lngEl].forEach(function(el) {
                  if (!el.value.trim()) el.style.borderColor = '#e5484d';
                });
                errEl.hidden = false;
                (!latEl.value.trim() ? latEl : lngEl).focus();
              }

              document.getElementById('cvMapSubmit').addEventListener('click', function() {
                var c = coords();
                if (!valid(c)) return markInvalid();

                var iframe = document.createElement('iframe');
                iframe.src = 'https://maps.google.com/maps?q=' + encodeURIComponent(c.lat + ',' + c.lng) + '&z=15&output=embed';
                iframe.loading = 'lazy';
                iframe.setAttribute('referrerpolicy', 'no-referrer-when-downgrade');
                iframe.setAttribute('title', 'Customer map preview');
                wrap.replaceChild(iframe, preview);
                preview = iframe;
              });

              document.getElementById('cvMapOpen').addEventListener('click', function() {
                var c = coords();
                if (!valid(c)) return markInvalid();
                window.open('https://www.google.com/maps/search/?api=1&query=' + encodeURIComponent(c.lat + ',' + c.lng), '_blank');
              });
            });

/* ==========================================================================
   Script Block 13
   ========================================================================== */
/* footer.php (bootstrap) loads AFTER this block — bind on DOMContentLoaded */
              document.addEventListener('DOMContentLoaded', function() {
                function toast(msg, ok) {
                  var t = document.createElement('div');
                  t.className = 'cv-toast';
                  t.innerHTML = '<i class="bi ' + (ok === false ? 'bi-exclamation-circle-fill' : 'bi-check-circle-fill') + '"></i> ' + msg;
                  document.body.appendChild(t);
                  setTimeout(function() {
                    t.classList.add('show');
                  }, 10);
                  setTimeout(function() {
                    t.classList.remove('show');
                    setTimeout(function() {
                      t.remove();
                    }, 350);
                  }, 2400);
                }

                var pgBody = document.getElementById('cvBody-files'),
                  dropZone = document.getElementById('cvFlDropZone'),
                  fileInput = document.getElementById('cvFlFileInput');

                function fileIconCls(name) {
                  var n = (name || '').toLowerCase();
                  if (/\.(png|jpe?g|gif|webp|svg)$/.test(n)) return 'bi-file-earmark-image';
                  if (n.indexOf('.pdf') !== -1) return 'bi-file-earmark-pdf';
                  if (/\.docx?$/.test(n)) return 'bi-file-earmark-word';
                  if (/\.xlsx?$/.test(n)) return 'bi-file-earmark-excel';
                  return 'bi-file-earmark';
                }

                function nowStamp() {
                  var d = new Date(),
                    p = function(n) {
                      return String(n).padStart(2, '0');
                    };
                  return p(d.getDate()) + '-' + p(d.getMonth() + 1) + '-' + d.getFullYear() + ' ' + p(d.getHours()) + ':' + p(d.getMinutes()) + ':' + p(d.getSeconds());
                }

                /* Uploaded file -> direct table row append (files branch only) */
                function addFilesToTable(list) {
                  Array.prototype.forEach.call(list, function(f) {
                    var tr = pgBody.insertRow();
                    tr.className = 'cv-row';
                    tr.innerHTML = '<td><a href="#" class="cv-fl-file-link"><i class="bi ' + fileIconCls(f.name) + '"></i><span class="fnm"></span></a></td>' +
                      '<td><div class="form-check form-switch m-0 cv-fl-switch cv-fl-switch-live" style="width:fit-content;" data-tip="Show/hide this file in Customers area"><input class="form-check-input" type="checkbox" role="switch"></div><div class="cv-fl-share-row" style="display:none;"><span class="txt"></span><button type="button" class="cv-fl-share-edit" title="Edit sharing"><i class="bi bi-pencil-square"></i></button></div></td>' +
                      '<td>' + nowStamp() + '</td>' +
                      '<td><button type="button" class="cv-fl-mail-btn cv-fl-send" title="Send via email"><i class="bi bi-envelope"></i></button>' +
                      '<button type="button" class="cv-fl-mail-btn cv-fl-del" title="Delete" style="color:#dc2626;"><i class="bi bi-trash"></i></button></td>';
                    tr.querySelector('.fnm').textContent = f.name;
                  });
                  if (window.refreshAttendanceTable) window.refreshAttendanceTable();
                  toast(list.length + ' file(s) uploaded successfully');
                }

                if (dropZone && fileInput) {
                  dropZone.addEventListener('click', function() {
                    fileInput.click();
                  });
                  dropZone.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    dropZone.classList.add('dragover');
                  });
                  dropZone.addEventListener('dragleave', function() {
                    dropZone.classList.remove('dragover');
                  });
                  dropZone.addEventListener('drop', function(e) {
                    e.preventDefault();
                    dropZone.classList.remove('dragover');
                    if (e.dataTransfer && e.dataTransfer.files.length) addFilesToTable(e.dataTransfer.files);
                  });
                  fileInput.addEventListener('change', function() {
                    if (fileInput.files.length) addFilesToTable(fileInput.files);
                    fileInput.value = '';
                  });
                }

                /* Options column: mail -> Send File modal, trash -> remove row */
                var sfModal = document.getElementById('cvSendFileModal');

                function openSendFile() {
                  ['sfSubject', 'sfEmail', 'sfMessage'].forEach(function(id) {
                    var el = document.getElementById(id);
                    if (el) {
                      el.value = '';
                      el.style.borderColor = '';
                    }
                  });
                  bootstrap.Modal.getOrCreateInstance(sfModal).show();
                }

                if (sfModal) {
                  sfModal.addEventListener('shown.bs.modal', function() {
                    var backdrops = document.querySelectorAll('.modal-backdrop');
                    var last = backdrops[backdrops.length - 1];
                    if (last) last.style.zIndex = 1074; /* below send file modal 1075 */
                  });
                }

                ['sfSubject', 'sfEmail'].forEach(function(id) {
                  var el = document.getElementById(id);
                  if (el) el.addEventListener('input', function() {
                    this.style.borderColor = '';
                  });
                });

                var sfSubmit = document.getElementById('sfSubmit');
                if (sfSubmit && sfModal) {
                  sfSubmit.addEventListener('click', function() {
                    var subj = document.getElementById('sfSubject'),
                      email = document.getElementById('sfEmail'),
                      invalid = null;
                    [subj, email].forEach(function(el) {
                      var bad = !String(el.value).trim();
                      el.style.borderColor = bad ? '#dc2626' : '';
                      if (bad && !invalid) invalid = el;
                    });
                    if (invalid) {
                      toast('Email Subject and Email Address are required', false);
                      invalid.focus();
                      return;
                    }
                    bootstrap.Modal.getOrCreateInstance(sfModal).hide();
                    toast('File sent to ' + email.value.trim());
                  });
                }

                pgBody.addEventListener('click', function(e) {
                  var del = e.target.closest('.cv-fl-del');
                  if (del) {
                    del.closest('tr').remove();
                    if (window.refreshAttendanceTable) window.refreshAttendanceTable();
                    toast('File deleted');
                    return;
                  }
                  var mb = e.target.closest('.cv-fl-mail-btn');
                  if (mb && sfModal && window.bootstrap) openSendFile();
                });

                /* Switch: whole pill clickable; custom fixed-position tooltip on hover */
                var flTip = document.createElement('div');
                flTip.className = 'cv-fl-tip';
                document.body.appendChild(flTip);

                pgBody.addEventListener('mouseover', function(e) {
                  var wrap = e.target.closest('.cv-fl-switch');
                  if (!wrap) return;
                  flTip.textContent = wrap.getAttribute('data-tip');
                  flTip.classList.add('show');
                  var r = wrap.getBoundingClientRect(),
                    tw = flTip.offsetWidth,
                    th = flTip.offsetHeight,
                    left = Math.max(8, Math.min(r.left + r.width / 2 - tw / 2, window.innerWidth - tw - 8)),
                    top = r.top - th - 8;
                  if (top < 8) top = r.bottom + 8; /* flip below if not enough room above */
                  flTip.style.left = left + 'px';
                  flTip.style.top = top + 'px';
                });
                pgBody.addEventListener('mouseout', function(e) {
                  if (e.target.closest('.cv-fl-switch')) flTip.classList.remove('show');
                });

                /* Switch: disabled row -> tooltip hide mattum; live (uploaded) row -> toggle */
                pgBody.addEventListener('click', function(e) {
                  var wrap = e.target.closest('.cv-fl-switch');
                  if (wrap) {
                    flTip.classList.remove('show');
                    if (!wrap.classList.contains('cv-fl-switch-live')) return; /* dummy row: disabled */
                    if (e.target.classList.contains('form-check-input')) return; /* native toggle -> change event handles the rest */
                    var cb = wrap.querySelector('input[type="checkbox"]');
                    if (cb) {
                      cb.checked = !cb.checked;
                      cb.dispatchEvent(new Event('change', {
                        bubbles: true
                      }));
                    }
                    return;
                  }
                  /* share edit icon -> Share File With modal */
                  var ed = e.target.closest('.cv-fl-share-edit');
                  if (ed && window.bootstrap) {
                    var shfModal = document.getElementById('cvShareFileModal');
                    var cur = ed.closest('td').querySelector('.cv-fl-share-row .txt').textContent.replace('This file is shared with: ', '');
                    var sel = document.getElementById('shfContact');
                    if (sel) {
                      var has = Array.prototype.some.call(sel.options, function(op) {
                        return op.text === cur;
                      });
                      if (has) sel.value = cur;
                    }
                    shfModal._shareEditBtn = ed;
                    bootstrap.Modal.getOrCreateInstance(shfModal).show();
                  }
                });

                /* Switch change -> update share row (works for both native + custom toggle) */
                pgBody.addEventListener('change', function(e) {
                  var cb = e.target;
                  if (!cb.matches('.cv-fl-switch-live input[type="checkbox"]')) return;
                  var wrap = cb.closest('.cv-fl-switch');
                  setShareState(wrap, cb.checked ? 'Suresh s' : '');
                  toast(cb.checked ? 'File visible in customers area' : 'File hidden from customers area');
                });

                /* Share row text helper */
                function setShareState(switchWrap, contact) {
                  var row = switchWrap.parentNode.querySelector('.cv-fl-share-row'),
                    txt = row ? row.querySelector('.txt') : null;
                  if (!row || !txt) return;
                  if (contact) {
                    txt.textContent = 'This file is shared with: ' + contact;
                    row.style.display = 'flex';
                  } else {
                    txt.textContent = '';
                    row.style.display = 'none';
                  }
                }

                /* Share File With Confirm -> update share text */
                var shfModalEl = document.getElementById('cvShareFileModal');
                if (shfModalEl) {
                  shfModalEl.addEventListener('shown.bs.modal', function() {
                    var backdrops = document.querySelectorAll('.modal-backdrop');
                    var last = backdrops[backdrops.length - 1];
                    if (last) last.style.zIndex = 1074;
                  });
                  var shfConfirm = document.getElementById('shfConfirm');
                  if (shfConfirm) shfConfirm.addEventListener('click', function() {
                    var sel = document.getElementById('shfContact'),
                      btn = shfModalEl._shareEditBtn;
                    if (btn) {
                      var wrap = btn.closest('td').querySelector('.cv-fl-switch');
                      setShareState(wrap, sel ? sel.value : '');
                    }
                    bootstrap.Modal.getOrCreateInstance(shfModalEl).hide();
                    toast('File shared with ' + (sel ? sel.value : ''));
                  });
                }
              });

/* ==========================================================================
   Script Block 14
   ========================================================================== */
document.querySelectorAll(".js-new-dummy").forEach(function(b) {
    b.addEventListener("click", function() {
      alert("Demo only — form not connected yet");
    });
  });

/* ==========================================================================
   Script Block 15
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
    var root = document.getElementById('cvProfile');
    if (!root) return;

    function toastMsg(msg, ok) {
      var t = document.createElement('div');
      t.className = 'cv-toast';
      t.innerHTML = '<i class="bi ' + (ok === false ? 'bi-exclamation-circle-fill' : 'bi-check-circle-fill') + '"></i> ' + msg;
      document.body.appendChild(t);
      setTimeout(function() {
        t.classList.add('show');
      }, 10);
      setTimeout(function() {
        t.classList.remove('show');
        setTimeout(function() {
          t.remove();
        }, 350);
      }, 2600);
    }

    var hasS2 = window.jQuery && jQuery.fn.select2;
    if (hasS2) jQuery('#cvProfile .cv-select').select2({
      width: '100%'
    });

    function setVal(id, v) {
      var el = document.getElementById(id);
      el.value = v;
      if (hasS2 && el.tagName === 'SELECT') jQuery(el).trigger('change');
    }

    function getVal(id) {
      return document.getElementById(id).value;
    }

    document.getElementById('cvSameAsInfo').addEventListener('click', function() {
      setVal('bStreet', getVal('dAddress'));
      setVal('bCountry', getVal('dCountry'));
      setVal('bState', getVal('dState'));
      setVal('bCity', getVal('dCity'));
      setVal('bZip', getVal('dZip'));
      toastMsg('Billing address copied from customer info');
    });
    document.getElementById('cvCopyBilling').addEventListener('click', function() {
      setVal('sStreet', getVal('bStreet'));
      setVal('sCountry', getVal('bCountry'));
      setVal('sState', getVal('bState'));
      setVal('sCity', getVal('bCity'));
      setVal('sZip', getVal('bZip'));
      toastMsg('Shipping address copied from billing');
    });
    root.querySelectorAll('.js-demo').forEach(function(b) {
      b.addEventListener('click', function() {
        toastMsg('Demo only — not connected yet');
      });
    });

    function flag(id, bad) {
      var el = document.getElementById(id),
        err = el.closest('.cv-field').querySelector('.cv-err');
      el.classList.toggle('cv-invalid', bad);
      if (err) err.hidden = !bad;
    }
    document.getElementById('cvSubmit').addEventListener('click', function() {
      var noCompany = !getVal('dCompany').trim(),
        noProf = !getVal('cProfession');
      flag('dCompany', noCompany);
      flag('cProfession', noProf);
      if (noCompany || noProf) {
        bootstrap.Tab.getOrCreateInstance(root.querySelector('#cvSubBtn-details')).show();
        toastMsg('Please fill the required fields', false);
        return;
      }
      toastMsg('Customer details saved (demo)');
    });
  });

/* ==========================================================================
   Script Block 16
   ========================================================================== */
/* Customer Admins / Purchase Order: table itself is driven by the datatable class (auto-master-table.js).
       This block only adds the Assign Admin modal, Submit toast and the empty-state fallback. */
  document.addEventListener('DOMContentLoaded', function() {
    var body = document.getElementById('cvBody-admins'),
      fallback = document.getElementById('cvEmptyFallback');
    if (!body) return;

    function toastMsg(msg, ok) {
      var t = document.createElement('div');
      t.className = 'cv-toast';
      t.innerHTML = '<i class="bi ' + (ok === false ? 'bi-exclamation-circle-fill' : 'bi-check-circle-fill') + '"></i> ' + msg;
      document.body.appendChild(t);
      setTimeout(function() {
        t.classList.add('show');
      }, 10);
      setTimeout(function() {
        t.classList.remove('show');
        setTimeout(function() {
          t.remove();
        }, 350);
      }, 2600);
    }

    function syncEmpty() {
      var real = Array.from(body.rows).filter(function(r) {
        return !r.classList.contains('no-record-row') && r.style.display !== 'none';
      });
      if (fallback) fallback.hidden = real.length > 0 || !!body.querySelector('.no-record-row');
    }

    function refresh() {
      if (window.refreshAttendanceTable) window.refreshAttendanceTable();
      setTimeout(syncEmpty, 0);
    }
    ['cvSearch'].forEach(function(id) {
      var el = document.getElementById(id);
      if (el) el.addEventListener('input', function() {
        setTimeout(syncEmpty, 0);
      });
    });
    var size = document.getElementById('showEntries');
    if (size) size.addEventListener('change', function() {
      setTimeout(syncEmpty, 0);
    });
    var refreshBtn = document.getElementById('cvRefresh');
    if (refreshBtn) refreshBtn.addEventListener('click', function() {
      setTimeout(syncEmpty, 0);
    });
    setTimeout(syncEmpty, 50);

    // ---- Assign Admin ----
    var modal = document.getElementById('cvAssignModal');
    if (!modal) return;
    var sel = document.getElementById('cvAssignSelect'),
      hasS2 = window.jQuery && jQuery.fn.select2;
    if (hasS2) jQuery(sel).select2({
      width: '100%',
      dropdownParent: jQuery(modal)
    });

    function closeModal() {
      modal.classList.remove('show');
      sel.value = '';
      if (hasS2) jQuery(sel).trigger('change');
      document.getElementById('cvAssignError').hidden = true;
    }
    document.getElementById('cvAssignAdminBtn').addEventListener('click', function() {
      modal.classList.add('show');
    });
    document.getElementById('cvAssignClose').addEventListener('click', closeModal);
    document.getElementById('cvAssignCancel').addEventListener('click', closeModal);
    modal.addEventListener('click', function(e) {
      if (e.target === modal) closeModal();
    });
    document.getElementById('cvAssignSubmit').addEventListener('click', function() {
      var staff = sel.value;
      if (!staff) {
        document.getElementById('cvAssignError').hidden = false;
        return;
      }
      var dupe = Array.from(body.rows).some(function(r) {
        return r.cells[0] && r.cells[0].textContent.trim() === staff;
      });
      if (dupe) {
        toastMsg(staff + ' is already assigned', false);
        return;
      }
      var d = new Date(),
        p = function(n) {
          return String(n).padStart(2, '0');
        };
      var tr = body.insertRow();
      tr.className = 'cv-row';
      tr.innerHTML = '<td></td><td>' + p(d.getDate()) + '-' + p(d.getMonth() + 1) + '-' + d.getFullYear() + ' ' + p(d.getHours()) + ':' + p(d.getMinutes()) + '</td>' +
        '<td><button type="button" class="cv-icon-btn" title="Remove"><i class="bi bi-trash"></i></button></td>';
      tr.cells[0].textContent = staff;
      closeModal();
      refresh();
      toastMsg('Admin assigned');
    });
    body.addEventListener('click', function(e) {
      var btn = e.target.closest('.cv-icon-btn');
      if (!btn) return;
      btn.closest('tr').remove();
      refresh();
      toastMsg('Admin removed');
    });
  });

/* ==========================================================================
   Script Block 17
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById('cvContactModal'),
      openBtn = document.getElementById('cvNewContactBtn'),
      body = document.getElementById('cvBody-contacts');
    if (!modal || !openBtn || !body) return;

    function $(id) {
      return document.getElementById(id);
    }

    function toastMsg(msg, ok) {
      var t = document.createElement('div');
      t.className = 'cv-toast';
      t.innerHTML = '<i class="bi ' + (ok === false ? 'bi-exclamation-circle-fill' : 'bi-check-circle-fill') + '"></i> ' + msg;
      document.body.appendChild(t);
      setTimeout(function() {
        t.classList.add('show');
      }, 10);
      setTimeout(function() {
        t.classList.remove('show');
        setTimeout(function() {
          t.remove();
        }, 350);
      }, 2600);
    }

    var fields = ['ctFirst', 'ctLast', 'ctEmail', 'ctPassword'];

    function setError(id, msg) {
      var el = $(id),
        err = el.closest('.cv-field').querySelector('.cv-err');
      el.classList.toggle('cv-invalid', !!msg);
      el.closest('.cv-pass-wrap') && el.closest('.cv-pass-wrap').classList.toggle('cv-invalid-wrap', !!msg);
      if (err) {
        err.hidden = !msg;
        if (msg) err.textContent = msg;
      }
      return !msg;
    }

    function existingEmails() {
      return Array.from(body.rows).map(function(r) {
        return r.cells[1] ? r.cells[1].textContent.trim().toLowerCase() : '';
      }).filter(Boolean);
    }

    function checkEmail() {
      var v = $('ctEmail').value.trim().toLowerCase();
      if (!v) return setError('ctEmail', 'Email is required.');
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v)) return setError('ctEmail', 'Enter a valid email address.');
      if (existingEmails().indexOf(v) > -1) return setError('ctEmail', 'Email already exists');
      return setError('ctEmail', '');
    }

    function checkPassword() {
      // Not needed when a "set password" email is sent instead
      if ($('ctSetPwd').checked) return setError('ctPassword', '');
      return setError('ctPassword', $('ctPassword').value ? '' : 'Password is required.');
    }

    function resetForm() {
      ['ctImage', 'ctFirst', 'ctLast', 'ctRole', 'ctPassword'].forEach(function(id) {
        $(id).value = '';
      });
      $('ctEmail').value = '';
      $('ctPhone').value = '+91 ';
      $('ctDirection').value = '';
      $('ctPassword').type = 'password';
      $('ctTogglePass').querySelector('i').className = 'bi bi-eye-fill';
      ['ctPrimary', 'ctNoWelcome', 'ctSetPwd'].forEach(function(id) {
        $(id).checked = false;
      });
      modal.querySelectorAll('.ct-perm, .ct-notif').forEach(function(c) {
        c.checked = true;
      });
      var ap = $('ctAllPerms'),
        an = $('ctAllNotifs');
      if (ap) ap.checked = true;
      if (an) an.checked = true;
      var pv = $('ctAvatarPreview');
      if (pv) pv.innerHTML = '<i class="bi bi-person-fill"></i>';
      updateStrength();
      fields.forEach(function(id) {
        setError(id, '');
      });
      modal.querySelector('.cv-contact-body').scrollTop = 0;
    }

    function openModal() {
      resetForm();
      modal.classList.add('show');
      setTimeout(function() {
        $('ctFirst').focus();
      }, 50);
    }

    function closeModal() {
      modal.classList.remove('show');
    }

    openBtn.addEventListener('click', openModal);
    $('cvContactClose').addEventListener('click', closeModal);
    $('cvContactCancel').addEventListener('click', closeModal);
    modal.addEventListener('click', function(e) {
      if (e.target === modal) closeModal();
    });
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && modal.classList.contains('show')) closeModal();
    });

    // Live validation
    $('ctEmail').addEventListener('input', checkEmail);
    $('ctEmail').addEventListener('blur', checkEmail);
    $('ctFirst').addEventListener('input', function() {
      setError('ctFirst', this.value.trim() ? '' : 'First name is required.');
    });
    $('ctLast').addEventListener('input', function() {
      setError('ctLast', this.value.trim() ? '' : 'Last name is required.');
    });
    $('ctPassword').addEventListener('input', checkPassword);
    $('ctSetPwd').addEventListener('change', checkPassword);

    // Password strength meter
    function updateStrength() {
      var v = $('ctPassword').value || '';
      var score = 0;
      if (v.length >= 8) score++;
      if (/[A-Z]/.test(v) && /[a-z]/.test(v)) score++;
      if (/\d/.test(v)) score++;
      if (/[^A-Za-z0-9]/.test(v)) score++;
      if (!v) score = -1;
      var meter = $('ctPassMeter'),
        hint = $('ctPassHint');
      if (!meter || !hint) return;
      var levels = [
        ['18%', 's-weak', 'Weak password'],
        ['45%', 's-med', 'Medium password — add numbers or symbols'],
        ['70%', 's-strong', 'Strong password'],
        ['100%', 's-strong', 'Very strong password']
      ];
      if (score < 0) {
        meter.style.width = '0';
        hint.className = 'cv-pass-hint';
        hint.textContent = 'Password strength — type to see strength';
      } else {
        var lv = levels[Math.max(0, Math.min(score - 1, levels.length - 1))];
        meter.style.width = lv[0];
        meter.style.background = score <= 1 ? '#dc3545' : (score === 2 ? '#d97706' : 'var(--primary)');
        hint.className = 'cv-pass-hint ' + lv[1];
        hint.textContent = lv[2];
      }
    }
    $('ctPassword').addEventListener('input', updateStrength);

    // Avatar live preview
    $('ctImage').addEventListener('change', function() {
      var f = this.files && this.files[0],
        pv = $('ctAvatarPreview');
      if (!pv) return;
      if (f) {
        pv.innerHTML = '<img alt="Preview">';
        pv.querySelector('img').src = URL.createObjectURL(f);
      } else {
        pv.innerHTML = '<i class="bi bi-person-fill"></i>';
      }
    });

    // Toggle all permissions / notifications
    function bindToggleAll(allId, rowSel) {
      var all = $(allId);
      if (!all) return;
      all.addEventListener('change', function() {
        modal.querySelectorAll(rowSel).forEach(function(c) {
          c.checked = all.checked;
        });
      });
    }
    bindToggleAll('ctAllPerms', '.ct-perm');
    bindToggleAll('ctAllNotifs', '.ct-notif');

    // Keep "toggle all" checkbox in sync when a single switch changes
    ['ct-perm', 'ct-notif'].forEach(function(sel) {
      modal.addEventListener('change', function(e) {
        if (!e.target.classList.contains(sel)) return;
        var all = $(sel === 'ct-perm' ? 'ctAllPerms' : 'ctAllNotifs');
        if (!all) return;
        var rows = Array.from(modal.querySelectorAll('.' + sel));
        all.checked = rows.every(function(c) {
          return c.checked;
        });
      });
    });

    // Reset button
    var resetBtn = $('cvContactReset');
    if (resetBtn) resetBtn.addEventListener('click', function() {
      resetForm();
      toastMsg('Form reset');
    });

    // Password: show / hide + generate
    $('ctTogglePass').addEventListener('click', function() {
      var input = $('ctPassword'),
        show = input.type === 'password';
      input.type = show ? 'text' : 'password';
      this.querySelector('i').className = show ? 'bi bi-eye-slash-fill' : 'bi bi-eye-fill';
      this.setAttribute('aria-label', show ? 'Hide password' : 'Show password');
    });
    $('ctGenPass').addEventListener('click', function() {
      var chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz23456789!@#$%',
        out = '',
        buf = new Uint32Array(14);
      (window.crypto || window.msCrypto).getRandomValues(buf);
      for (var i = 0; i < buf.length; i++) out += chars[buf[i] % chars.length];
      $('ctPassword').value = out;
      $('ctPassword').type = 'text';
      $('ctTogglePass').querySelector('i').className = 'bi bi-eye-slash-fill';
      checkPassword();
      updateStrength();
    });

    // Submit
    $('cvContactSubmit').addEventListener('click', function() {
      var okFirst = setError('ctFirst', $('ctFirst').value.trim() ? '' : 'First name is required.'),
        okLast = setError('ctLast', $('ctLast').value.trim() ? '' : 'Last name is required.'),
        okEmail = checkEmail(),
        okPass = checkPassword();
      if (!(okFirst && okLast && okEmail && okPass)) {
        var firstBad = modal.querySelector('.cv-invalid');
        if (firstBad) firstBad.focus();
        return;
      }

      var name = ($('ctFirst').value.trim() + ' ' + $('ctLast').value.trim()),
        email = $('ctEmail').value.trim(),
        role = $('ctRole').value.trim() || '—',
        phoneRaw = $('ctPhone').value.trim(),
        phone = phoneRaw === '+91' ? '' : phoneRaw,
        file = $('ctImage').files && $('ctImage').files[0],
        img = file ? URL.createObjectURL(file) : './assets/img/profile-1.jpg';

      var tr = body.insertRow();
      tr.className = 'cv-row';
      tr.innerHTML =
        '<td><span class="d-inline-flex align-items-center gap-2"><img class="cv-avatar" alt=""><a href="#" class="cv-link"></a></span></td>' +
        '<td><a class="cv-link"></a></td>' +
        '<td></td>' +
        '<td>' + (phone ? '<a class="cv-link"></a>' : '') + '</td>' +
        '<td><label class="cust-switch"><input type="checkbox" checked aria-label="Active"><span class="slider"></span></label></td>' +
        '<td>—</td>';
      tr.querySelector('img').src = img;
      tr.cells[0].querySelector('a').textContent = name;
      var mail = tr.cells[1].querySelector('a');
      mail.textContent = email;
      mail.setAttribute('href', 'mailto:' + email);
      tr.cells[2].textContent = role;
      if (phone) {
        var tel = tr.cells[3].querySelector('a');
        tel.textContent = phone;
        tel.setAttribute('href', 'tel:' + phone.replace(/\s+/g, ''));
      }

      // Sidebar "Contacts" badge count
      var link = document.querySelector('.cv-side a[data-tab="contacts"]');
      if (link) {
        var badge = link.querySelector('.cv-badge');
        if (!badge) {
          badge = document.createElement('span');
          badge.className = 'cv-badge';
          badge.textContent = '0';
          link.appendChild(badge);
        }
        badge.textContent = (parseInt(badge.textContent, 10) || 0) + 1;
      }

      closeModal();
      if (window.refreshAttendanceTable) window.refreshAttendanceTable();
      toastMsg('Contact "' + name + '" added successfully');
    });
  });

/* ==========================================================================
   Script Block 18
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById('cvNoteModal'),
      openBtn = document.getElementById('cvNewNoteBtn'),
      body = document.getElementById('cvBody-notes');
    if (!modal || !openBtn || !body) return;

    function $(id) {
      return document.getElementById(id);
    }

    function toastMsg(msg, ok) {
      var t = document.createElement('div');
      t.className = 'cv-toast';
      t.innerHTML = '<i class="bi ' + (ok === false ? 'bi-exclamation-circle-fill' : 'bi-check-circle-fill') + '"></i> ' + msg;
      document.body.appendChild(t);
      setTimeout(function() {
        t.classList.add('show');
      }, 10);
      setTimeout(function() {
        t.classList.remove('show');
        setTimeout(function() {
          t.remove();
        }, 350);
      }, 2600);
    }

    function openModal() {
      $('cvNoteDesc').value = '';
      $('cvNoteDesc').classList.remove('cv-invalid');
      $('cvNoteErr').hidden = true;
      modal.classList.add('show');
      setTimeout(function() {
        $('cvNoteDesc').focus();
      }, 50);
    }

    function closeModal() {
      modal.classList.remove('show');
    }

    openBtn.addEventListener('click', openModal);
    $('cvNoteClose').addEventListener('click', closeModal);
    $('cvNoteCancel').addEventListener('click', closeModal);
    modal.addEventListener('click', function(e) {
      if (e.target === modal) closeModal();
    });
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && modal.classList.contains('show')) closeModal();
    });

    // Clear error while typing
    $('cvNoteDesc').addEventListener('input', function() {
      if (this.value.trim()) {
        this.classList.remove('cv-invalid');
        $('cvNoteErr').hidden = true;
      }
    });

    // Ctrl + Enter shortcut
    $('cvNoteDesc').addEventListener('keydown', function(e) {
      if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') $('cvNoteSubmit').click();
    });

    // Submit
    $('cvNoteSubmit').addEventListener('click', function() {
      var desc = $('cvNoteDesc').value.trim();
      if (!desc) {
        $('cvNoteDesc').classList.add('cv-invalid');
        $('cvNoteErr').hidden = false;
        $('cvNoteDesc').focus();
        return;
      }
      var d = new Date(),
        p = function(n) {
          return (n < 10 ? '0' : '') + n;
        },
        when = p(d.getDate()) + '-' + p(d.getMonth() + 1) + '-' + d.getFullYear() + ' ' + p(d.getHours()) + ':' + p(d.getMinutes());

      var tr = body.insertRow();
      tr.className = 'cv-row';
      tr.innerHTML = '<td></td><td>Admin</td><td>' + when + '</td>';
      tr.cells[0].textContent = desc;

      // Sidebar "Notes" badge count
      var link = document.querySelector('.cv-side a[data-tab="notes"]');
      if (link) {
        var badge = link.querySelector('.cv-badge');
        if (!badge) {
          badge = document.createElement('span');
          badge.className = 'cv-badge';
          badge.textContent = '0';
          link.appendChild(badge);
        }
        badge.textContent = (parseInt(badge.textContent, 10) || 0) + 1;
      }

      closeModal();
      if (window.refreshAttendanceTable) window.refreshAttendanceTable();
      toastMsg('Note added successfully');
    });
  });

/* ==========================================================================
   Script Block 19
   ========================================================================== */
/* footer.php loads bootstrap after this block — bind on DOMContentLoaded */
  document.addEventListener('DOMContentLoaded', function() {
    /* New Proposal button -> open modal */
    var npBtn = document.getElementById('cvNewProposalBtn');
    if (npBtn) {
      npBtn.addEventListener('click', function() {
        var npModal = document.getElementById('newProposalModal');
        if (npModal && typeof bootstrap !== 'undefined') {
          bootstrap.Modal.getOrCreateInstance(npModal).show();
        }
      });
    }

    /* Proposal tags chip input */
    var chipsWrap = document.getElementById('npTagsChips');
    var input = document.getElementById('npTagsInput');
    var hidden = document.getElementById('np_tags');
    var wrap = document.getElementById('npTagsWrap');
    if (chipsWrap && input && hidden) {
      var tags = [];

      function syncHidden() {
        hidden.value = tags.join(',');
      }

      function addTag(text) {
        var val = text.trim().replace(/,/g, '');
        if (!val || tags.indexOf(val) !== -1) return;
        tags.push(val);
        var chip = document.createElement('span');
        chip.className = 'nl-tag-chip';
        chip.innerHTML = val + '<button type="button" class="nl-tag-x" title="Remove">&times;</button>';
        chipsWrap.appendChild(chip);
        chip.querySelector('.nl-tag-x').addEventListener('click', function() {
          var idx = tags.indexOf(val);
          if (idx !== -1) tags.splice(idx, 1);
          chip.remove();
          syncHidden();
        });
        syncHidden();
      }
      input.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ',') {
          e.preventDefault();
          addTag(input.value);
          input.value = '';
        }
        if (e.key === 'Backspace' && !input.value && tags.length) {
          var last = chipsWrap.lastElementChild;
          if (last) last.querySelector('.nl-tag-x').click();
        }
      });
      input.addEventListener('blur', function() {
        if (input.value.trim()) {
          addTag(input.value);
          input.value = '';
        }
      });
      if (wrap) wrap.addEventListener('click', function() {
        input.focus();
      });
    }

    /* Add / remove item row */
    var addBtn = document.getElementById('npAddItemBtn');
    var itemBody = document.getElementById('npItemBody');
    var addSelect = document.getElementById('npAddItemSelect');
    if (addBtn && itemBody) {
      addBtn.addEventListener('click', function() {
        var tr = document.createElement('tr');
        tr.innerHTML = '<td><i class="bi bi-info-circle" style="color:#9ca3af;font-size:12px;"></i></td>' +
          '<td><textarea class="form-control" placeholder="Description" rows="2"></textarea></td>' +
          '<td><textarea class="form-control" placeholder="Long description" rows="2"></textarea></td>' +
          '<td><input type="number" class="form-control" value="1" min="0"><div style="font-size:10px;color:#9ca3af;margin-top:2px;">Unit</div></td>' +
          '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
          '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
          '<td><select class="form-select"><option selected>No Tax</option><option>GST 5%</option><option>GST 12%</option><option>GST 18%</option></select></td>' +
          '<td><span style="font-weight:700;color:#111827;">₹ 0.00</span></td>' +
          '<td><button type="button" class="np-check-btn np-remove-item" title="Remove"><i class="bi bi-trash"></i></button></td>';
        itemBody.appendChild(tr);
        if (addSelect) addSelect.value = '';
      });
      itemBody.addEventListener('click', function(e) {
        var btn = e.target.closest('.np-remove-item');
        if (btn) btn.closest('tr').remove();
      });
    }
  });

/* ==========================================================================
   Script Block 20
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
    var modalEl = document.getElementById('apmContactModal'),
      body = document.getElementById('cvBody-appointments');
    if (!modalEl || !body) return;

    function $id(id) {
      return document.getElementById(id);
    }

    function toastMsg(msg, ok) {
      var t = document.createElement('div');
      t.className = 'cv-toast';
      t.innerHTML = '<i class="bi ' + (ok === false ? 'bi-exclamation-circle-fill' : 'bi-calendar-check-fill') + '"></i> ' + msg;
      document.body.appendChild(t);
      setTimeout(function() {
        t.classList.add('show');
      }, 10);
      setTimeout(function() {
        t.classList.remove('show');
        setTimeout(function() {
          t.remove();
        }, 350);
      }, 2600);
    }

    /* Customer context (PHP la irundhu) */
    var custName = "GG COMPANY",
      custEmail = "kaviyarasu@ghratechnology.com",
      custPhone = "9677063368";

    /* Related select -> conditional blocks (Lead / External / Internal Contact) */
    var relSel = $id('apmCtRelated'),
      relBlocks = {
        Lead: $id('apmRelLeadBlock'),
        External: $id('apmRelExternalBlock'),
        Contact: $id('apmRelInternalBlock')
      };

    function toggleRelBlocks() {
      Object.keys(relBlocks).forEach(function(k) {
        if (relBlocks[k]) relBlocks[k].style.display = (relSel.value === k) ? '' : 'none';
      });
    }
    relSel.addEventListener('change', toggleRelBlocks);

    /* Quill notes editor — lazy init on first open */
    var ctQuill = null;

    function initCtQuill() {
      if (ctQuill || typeof Quill === 'undefined') return;
      ctQuill = new Quill('#apmCtQuill', {
        theme: 'snow',
        placeholder: 'Write appointment notes here...',
        modules: {
          toolbar: [
            [{
              font: ['verdana', 'sans-serif', 'serif', 'monospace']
            }, {
              size: ['small', false, 'large', 'huge']
            }],
            ['bold', 'italic', 'underline'],
            [{
              align: []
            }],
            [{
              list: 'bullet'
            }, {
              list: 'ordered'
            }],
            ['link'],
            ['clean']
          ]
        }
      });
    }

    function nowLocal() {
      var d = new Date(),
        p = function(n) {
          return (n < 10 ? '0' : '') + n;
        };
      return d.getFullYear() + '-' + p(d.getMonth() + 1) + '-' + p(d.getDate()) + 'T' + p(d.getHours()) + ':' + p(d.getMinutes());
    }

    /* "2026-09-29T15:30" -> "29-09-2026" / "03:30 PM" (table format) */
    function fmtDate(v) {
      var d = v.split('T')[0].split('-');
      return d[2] + '-' + d[1] + '-' + d[0];
    }

    function fmtTime(v) {
      var parts = (v.split('T')[1] || '00:00').split(':'),
        hh = parseInt(parts[0], 10),
        ap = hh >= 12 ? 'PM' : 'AM',
        h12 = hh % 12;
      if (h12 === 0) h12 = 12;
      return (h12 < 10 ? '0' : '') + h12 + ':' + parts[1] + ' ' + ap;
    }

    /* Open -> customer details prefill + defaults */
    modalEl.addEventListener('shown.bs.modal', function() {
      initCtQuill();
      relSel.value = 'External';
      toggleRelBlocks();
      if (!$id('apmCtSubject').value) $id('apmCtSubject').value = 'Appointment with ' + custName;
      $id('apmRelExtName').value = custName;
      $id('apmRelExtEmail').value = custEmail;
      $id('apmRelExtPhone').value = custPhone;
      if (!$id('apmCtDateTime').value) $id('apmCtDateTime').value = nowLocal();

      /* Leads select2 inside modal: destroy + re-init with dropdownParent */
      if (typeof $ !== 'undefined' && $.fn.select2) {
        $('#apmRelLead').each(function() {
          if ($(this).data('select2')) $(this).select2('destroy');
          $(this).select2({
            width: '100%',
            dropdownParent: $(modalEl)
          });
        });
      }
    });

    /* SMS / Email tick -> reminder value blocks (appointments.php flow) */
    var smsChk = $id('apmCtSms'),
      smsBlock = $id('apmSmsReminderBlock');
    smsChk.addEventListener('change', function() {
      smsBlock.style.display = smsChk.checked ? '' : 'none';
      if (smsChk.checked) $id('apmSmsReminderValue').focus();
    });
    var emailChk = $id('apmCtEmail'),
      emailBlock = $id('apmEmailReminderBlock');
    emailChk.addEventListener('change', function() {
      emailBlock.style.display = emailChk.checked ? '' : 'none';
      if (emailChk.checked) $id('apmEmailReminderValue').focus();
    });

    /* Close -> reset form for next open */
    modalEl.addEventListener('hidden.bs.modal', function() {
      modalEl.querySelectorAll('input, textarea, select').forEach(function(el) {
        if (el.type !== 'checkbox') el.value = '';
      });
      relSel.value = 'External';
      toggleRelBlocks();
      if (typeof $ !== 'undefined' && $.fn.select2) $('#apmRelLead').val(null).trigger('change');
      smsChk.checked = false;
      smsBlock.style.display = 'none';
      emailChk.checked = false;
      emailBlock.style.display = 'none';
      if (ctQuill) ctQuill.root.innerHTML = '';
      [$id('apmCtSubject'), $id('apmCtDateTime')].forEach(function(el) {
        el.classList.remove('cv-invalid');
      });
    });

    /* Clear red border while typing */
    $id('apmCtSubject').addEventListener('input', function() {
      this.classList.remove('cv-invalid');
    });
    $id('apmCtDateTime').addEventListener('change', function() {
      this.classList.remove('cv-invalid');
    });

    /* Submit -> validate + append row to Appointments table (important fields only) */
    $id('apmCtSubmit').addEventListener('click', function() {
      var subj = $id('apmCtSubject'),
        dt = $id('apmCtDateTime'),
        ok = true;
      if (!subj.value.trim()) {
        subj.classList.add('cv-invalid');
        ok = false;
      }
      if (!dt.value) {
        dt.classList.add('cv-invalid');
        ok = false;
      }
      if (!ok) {
        toastMsg('Subject and Date / Time are required', false);
        (!subj.value.trim() ? subj : dt).focus();
        return;
      }

      var tr = body.insertRow();
      tr.className = 'cv-row';
      tr.innerHTML = '<td></td><td></td><td></td><td></td><td>' +
        '<span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Pending</span></td>';
      tr.cells[0].textContent = subj.value.trim();
      tr.cells[1].textContent = fmtDate(dt.value);
      tr.cells[2].textContent = fmtTime(dt.value);
      tr.cells[3].textContent = $id('apmCtAttendees').value || '—';

      /* Sidebar "Appointments" badge count */
      var link = document.querySelector('.cv-side a[data-tab="appointments"]');
      if (link) {
        var badge = link.querySelector('.cv-badge');
        if (!badge) {
          badge = document.createElement('span');
          badge.className = 'cv-badge';
          badge.textContent = '0';
          link.appendChild(badge);
        }
        badge.textContent = (parseInt(badge.textContent, 10) || 0) + 1;
      }

      bootstrap.Modal.getOrCreateInstance(modalEl).hide();
      if (window.refreshAttendanceTable) window.refreshAttendanceTable();
      toastMsg('Appointment saved for ' + custName);
    });
  });

/* ==========================================================================
   Script Block 21
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
    var body = document.getElementById('cvBody-invoices');
    if (!body) return;

    function toast(msg) {
      var t = document.createElement('div');
      t.className = 'cv-toast';
      t.innerHTML = '<i class="bi bi-check-circle-fill"></i> ' + msg;
      document.body.appendChild(t);
      setTimeout(function() {
        t.classList.add('show');
      }, 10);
      setTimeout(function() {
        t.classList.remove('show');
        setTimeout(function() {
          t.remove();
        }, 350);
      }, 2400);
    }

    // Create New Invoice modal (Bootstrap)
    var invModalEl = document.getElementById('cvNewInvoiceModal');
    var newBtn = document.getElementById('cvNewInvoiceBtn');
    if (newBtn && invModalEl && window.bootstrap) {
      newBtn.addEventListener('click', function() {
        bootstrap.Modal.getOrCreateInstance(invModalEl).show();
      });
    }

    // Zip Invoices modal
    var zipBtn = document.getElementById('cvZipInvoicesBtn'),
      zipModalEl = document.getElementById('cvZipModal');
    if (zipBtn && zipModalEl && window.bootstrap) {
      zipBtn.addEventListener('click', function() {
        bootstrap.Modal.getOrCreateInstance(zipModalEl).show();
      });
    }
    var zipSubmit = document.getElementById('cvZipSubmit');
    if (zipSubmit && zipModalEl) {
      zipSubmit.addEventListener('click', function() {
        var status = document.querySelector('input[name="cvZipStatus"]:checked'),
          st = status ? status.value : 'All',
          from = document.getElementById('cvZipFrom').value,
          to = document.getElementById('cvZipTo').value;
        if (from && to && from > to) {
          toast('From Date cannot be after To Date', false);
          return;
        }
        bootstrap.Modal.getOrCreateInstance(zipModalEl).hide();
        var msg = 'Preparing ZIP of ' + st + ' invoices';
        if (from && to) msg += ' from ' + from + ' to ' + to;
        toast(msg + '...');
      });
    }

    // Tags chip input (invoice modal)
    var tagsWrap = invModalEl ? invModalEl.querySelector('.nl-tags-wrap') : null;
    if (tagsWrap) {
      var tagsChips = tagsWrap.querySelector('.nl-tags-chips'),
        tagsInput = tagsWrap.querySelector('.nl-tags-input');
      tagsWrap.addEventListener('click', function() {
        tagsInput.focus();
      });
      tagsInput.addEventListener('keydown', function(e) {
        if (e.key !== 'Enter' && e.key !== ',') return;
        e.preventDefault();
        var v = tagsInput.value.trim().replace(/,$/, '');
        if (!v) return;
        var chip = document.createElement('span');
        chip.className = 'nl-tag-chip';
        chip.innerHTML = v + ' <button type="button" class="nl-tag-x" title="Remove">✕</button>';
        tagsChips.appendChild(chip);
        tagsInput.value = '';
      });
      tagsChips.addEventListener('click', function(e) {
        var x = e.target.closest('.nl-tag-x');
        if (x) x.closest('.nl-tag-chip').remove();
      });
    }

    // Add item row (toolbar ➕ button -> opens Add New Item modal)
    var addBtn = document.getElementById('cvInvAddItem'),
      itemModalEl = document.getElementById('cvAddItemModal');
    if (addBtn && itemModalEl && window.bootstrap) {
      addBtn.addEventListener('click', function() {
        bootstrap.Modal.getOrCreateInstance(itemModalEl).show();
      });
    }

    // Stacked modal backdrop z-index fix (same as lead.php)
    ['#cvAddItemModal'].forEach(function(id) {
      var el = document.querySelector(id);
      if (!el) return;
      el.addEventListener('shown.bs.modal', function() {
        var z = parseInt(getComputedStyle(el).zIndex, 10) || 1075;
        var backdrops = document.querySelectorAll('.modal-backdrop');
        var last = backdrops[backdrops.length - 1];
        if (last) last.style.zIndex = (z - 1);
      });
    });

    // Item amount calc (qty * rate, row level — only unconfirmed rows)
    document.addEventListener('input', function(e) {
      var t = e.target;
      if (!t.closest || !t.closest('#cvInvItemBody')) return;
      var row = t.closest('tr');
      if (!row || row.classList.contains('cv-inv-row-locked')) return;
      var qty = parseFloat(row.cells[3].querySelector('input').value) || 0,
        rate = parseFloat(row.cells[4].querySelector('input').value) || 0;
      row.querySelector('.cv-inv-amt').textContent = '₹ ' + (qty * rate).toFixed(2);
    });

    // Confirm row — freeze inputs, replace tick with delete icon, auto-add new blank row
    var itemBody = document.getElementById('cvInvItemBody');
    if (itemBody) itemBody.addEventListener('click', function(e) {
      var check = e.target.closest('.cv-inv-check'),
        del = e.target.closest('.cv-inv-row-del');
      var row;
      if (del) {
        row = del.closest('tr');
        if (row) {
          row.remove();
          // Keep at least one editable row
          if (!itemBody.querySelector('tr')) addBlankItemRow();
        }
        return;
      }
      if (!check) return;
      row = check.closest('tr');
      if (!row || row.classList.contains('cv-inv-row-locked')) return;
      row.classList.add('cv-inv-row-locked');
      row.querySelectorAll('input, select, textarea').forEach(function(el) {
        el.setAttribute('readonly', 'readonly');
        el.setAttribute('disabled', 'disabled');
      });
      check.className = 'cv-inv-row-del';
      check.title = 'Delete item';
      check.setAttribute('aria-label', 'Delete item');
      check.innerHTML = '<i class="bi bi-trash"></i>';
      addBlankItemRow();
    });

    // Add New Item modal — save -> fill the blank row in items table
    var itemSaveBtn = document.getElementById('cvItemSave');
    if (itemSaveBtn && itemModalEl) {
      itemSaveBtn.addEventListener('click', function() {
        var desc = document.getElementById('cvItDesc').value.trim(),
          rate = document.getElementById('cvItRateInr').value.trim();
        if (!desc || !rate) {
          toast('Description and Rate - INR are required');
          return;
        }
        var tbody = document.getElementById('cvInvItemBody');
        if (tbody) {
          var tr = tbody.querySelector('tr:not(.cv-inv-row-locked)'),
            madeNew = false;
          if (!tr) {
            tr = document.createElement('tr');
            madeNew = true;
          }
          var tax = document.getElementById('cvItTax1').value,
            longDesc = document.getElementById('cvItLongDesc').value.trim();
          tr.innerHTML = '<td><i class="bi bi-info-circle" style="color:#9ca3af;font-size:12px;"></i></td>' +
            '<td><textarea class="form-control" placeholder="Description" rows="2"></textarea></td>' +
            '<td><textarea class="form-control" placeholder="Long description" rows="2"></textarea></td>' +
            '<td><input type="number" class="form-control" value="1" min="0"><div class="cv-inv-unit">' + (document.getElementById('cvItUnit').value.trim() || 'Unit') + '</div></td>' +
            '<td><input type="number" class="form-control" value="' + parseFloat(rate).toFixed(2) + '" step="0.01"></td>' +
            '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
            '<td><select class="form-select"><option ' + (tax === 'No Tax' ? 'selected' : '') + '>No Tax</option><option ' + (tax === 'GST 5%' ? 'selected' : '') + '>GST 5%</option><option ' + (tax === 'GST 12%' ? 'selected' : '') + '>GST 12%</option><option ' + (tax === 'GST 18%' ? 'selected' : '') + '>GST 18%</option></select></td>' +
            '<td><span class="cv-inv-amt">₹ ' + parseFloat(rate).toFixed(2) + '</span></td>' +
            '<td><button type="button" class="cv-inv-check" title="Confirm"><i class="bi bi-check-lg"></i></button></td>';
          tr.querySelector('textarea').value = desc;
          tr.cells[2].querySelector('textarea').value = longDesc;
          if (madeNew) tbody.appendChild(tr);
        }
        // reset form + close
        ['cvItDesc', 'cvItLongDesc', 'cvItRateInr', 'cvItHsn', 'cvItRateUsd', 'cvItUnit'].forEach(function(id) {
          document.getElementById(id).value = '';
        });
        document.getElementById('cvItTax1').value = 'No Tax';
        document.getElementById('cvItGroup').value = '';
        bootstrap.Modal.getOrCreateInstance(itemModalEl).hide();
        toast('Item "' + desc + '" added to invoice');
      });
    }

    function addBlankItemRow() {
      var tbody = document.getElementById('cvInvItemBody');
      if (!tbody) return;
      var tr = document.createElement('tr');
      tr.innerHTML = '<td><i class="bi bi-info-circle" style="color:#9ca3af;font-size:12px;"></i></td>' +
        '<td><textarea class="form-control" placeholder="Description" rows="2"></textarea></td>' +
        '<td><textarea class="form-control" placeholder="Long description" rows="2"></textarea></td>' +
        '<td><input type="number" class="form-control" value="1" min="0"></td>' +
        '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
        '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
        '<td><select class="form-select"><option selected>No Tax</option><option>GST 5%</option><option>GST 12%</option><option>GST 18%</option></select></td>' +
        '<td><span class="cv-inv-amt">₹ 0.00</span></td>' +
        '<td><button type="button" class="cv-inv-check" title="Confirm"><i class="bi bi-check-lg"></i></button></td>';
      tbody.appendChild(tr);
    }

    // Submit — add invoice row
    var submitBtn = document.getElementById('cvInvSubmit');
    if (submitBtn) submitBtn.addEventListener('click', function() {
      var d = new Date(),
        p = function(n) {
          return (n < 10 ? '0' : '') + n;
        },
        today = p(d.getDate()) + '-' + p(d.getMonth() + 1) + '-' + d.getFullYear(),
        due = new Date(d.getTime() + 86400000),
        dueStr = p(due.getDate()) + '-' + p(due.getMonth() + 1) + '-' + due.getFullYear(),
        num = 'INV-000' + (120 + body.rows.length),
        tr = body.insertRow();
      tr.className = 'cv-row';
      tr.innerHTML = '<td><a href="#" class="cv-link">' + num + '</a></td>' +
        '<td>₹ 0.00</td><td>₹ 0</td><td>' + today + '</td>' +
        '<td>GHARUDA SOFTWARE</td><td>—</td><td>—</td><td>' + dueStr + '</td>' +
        '<td><span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Draft</span></td>';
      if (invModalEl && window.bootstrap) bootstrap.Modal.getOrCreateInstance(invModalEl).hide();
      if (window.refreshAttendanceTable) window.refreshAttendanceTable();
      toast('Invoice ' + num + ' created successfully');
    });
  });

/* ==========================================================================
   Script Block 22
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
    var doc = document.getElementById('cvStmtDoc');
    if (!doc) return;

    function toast(msg) {
      var t = document.createElement('div');
      t.className = 'cv-toast';
      t.innerHTML = '<i class="bi bi-check-circle-fill"></i> ' + msg;
      document.body.appendChild(t);
      setTimeout(function() {
        t.classList.add('show');
      }, 10);
      setTimeout(function() {
        t.classList.remove('show');
        setTimeout(function() {
          t.remove();
        }, 350);
      }, 2400);
    }

    var PRINT_CSS = 'body{font-family:Arial,Helvetica,sans-serif;padding:26px;color:#111827}' +
      '.cv-stmt-head{display:flex;justify-content:space-between;border-bottom:1px dashed #d1d5db;padding-bottom:14px;margin-bottom:18px}' +
      '.cv-stmt-brand{display:flex;gap:12px;align-items:center}' +
      '.cv-stmt-logo{width:48px;height:48px;border-radius:12px;background:#16a34a;color:#fff;font-weight:800;font-size:18px;display:flex;align-items:center;justify-content:center}' +
      '.cv-stmt-co-name{font-weight:800;font-size:14px;margin-bottom:4px}' +
      '.cv-stmt-co-addr{font-size:11.5px;line-height:1.6;color:#4b5563}' +
      '.cv-stmt-meta{border:1px solid #e5e7eb;border-radius:10px;padding:10px 14px;font-size:12px}' +
      '.cv-stmt-doc-type{font-weight:800;color:#0f7a38;font-size:11px;text-transform:uppercase;margin-bottom:8px}' +
      '.cv-stmt-meta-row{display:flex;justify-content:space-between;gap:16px;padding:2px 0}' +
      '.cv-stmt-meta-row span{color:#6b7280}' +
      '.cv-stmt-title{font-size:18px;font-weight:800;margin:16px 0}' +
      '.cv-stmt-parties{display:flex;gap:14px;margin-bottom:18px}' +
      '.cv-stmt-to{flex:1.6}' +
      '.cv-stmt-to-label{font-size:11px;font-weight:800;text-transform:uppercase;color:#6b7280;margin-bottom:6px}' +
      '.cv-stmt-to-box{border:1px solid #e5e7eb;border-radius:10px;padding:12px 14px;font-size:12.5px;display:flex;gap:10px}' +
      '.cv-stmt-to-ava{width:36px;height:36px;border-radius:9px;background:#eafaf1;color:#0f7a38;font-weight:800;display:flex;align-items:center;justify-content:center}' +
      '.cv-stmt-to-name{font-weight:800;margin-bottom:3px}' +
      '.cv-stmt-to-line{color:#4b5563;line-height:1.7}' +
      '.cv-stmt-due{flex:1;border:1px solid #d9f2e4;border-radius:10px;padding:14px;background:#f4fdf8}' +
      '.cv-stmt-due .k{font-size:10px;font-weight:800;text-transform:uppercase;color:#0f7a38;margin-bottom:4px}' +
      '.cv-stmt-due .v{font-size:22px;font-weight:800}' +
      '.cv-stmt-due .d{font-size:11px;color:#6b7280;margin-top:4px}' +
      '.cv-stmt-kpis{display:flex;gap:10px;margin-bottom:18px}' +
      '.cv-stmt-kpi{border:1px solid #e5e7eb;border-radius:10px;padding:8px 12px;font-size:12px;display:flex;gap:8px;align-items:center}' +
      '.cv-stmt-kpi .k{font-size:10px;text-transform:uppercase;color:#6b7280;margin-bottom:2px}' +
      '.cv-stmt-kpi .v{font-weight:800;font-size:14px}' +
      'table{border-collapse:collapse;width:100%;font-size:12.5px}' +
      'th,td{border:1px solid #e5e7eb;padding:8px 10px;text-align:left}' +
      'th{background:#f3f4f6}' +
      '.cv-stmt-total td{font-weight:800;background:#f9fafb;border-top:2px solid #16a34a}';

    function printDoc() {
      var w = window.open('', '_blank', 'width=900,height=650');
      if (!w) {
        toast('Please allow pop-ups to print');
        return;
      }
      var head = doc.querySelector('.cv-stmt-head').outerHTML,
        parties = doc.querySelector('.cv-stmt-parties').outerHTML,
        kpis = doc.querySelector('.cv-stmt-kpis').outerHTML,
        tbl = doc.querySelector('.table-responsive').outerHTML;
      w.document.write('<html><head><title>Customer Statement</title><style>' + PRINT_CSS +
        '</style></head><body>' + head +
        '<div class="cv-stmt-title">' + doc.querySelector('.cv-stmt-title').textContent + '</div>' +
        parties + kpis + tbl + '</body></html>');
      w.document.close();
      w.focus();
      w.print();
    }

    function exportPdf() {
      var head = doc.querySelector('.cv-stmt-head').outerHTML,
        parties = doc.querySelector('.cv-stmt-parties').outerHTML,
        kpis = doc.querySelector('.cv-stmt-kpis').outerHTML,
        tbl = doc.querySelector('.table-responsive').outerHTML,
        w = window.open('', '_blank', 'width=900,height=650');
      if (!w) {
        toast('Please allow pop-ups to export');
        return;
      }
      w.document.write('<html><head><title>Customer Statement</title></head><body>' + head +
        '<div class="cv-stmt-title">' + doc.querySelector('.cv-stmt-title').textContent + '</div>' +
        parties + kpis + tbl + '</body></html>');
      w.document.close();
      toast('Statement ready — use the browser Print → Save as PDF');
    }

    document.querySelector('.js-stmt-print').addEventListener('click', function() {
      printDoc();
      toast('Opening print view...');
    });
    document.querySelector('.js-stmt-pdf').addEventListener('click', exportPdf);
    document.querySelector('.js-stmt-email').addEventListener('click', function() {
      toast('Statement sent to kaviyarasu@ghratechnology.com by email');
    });
    document.querySelector('.js-stmt-wa').addEventListener('click', function() {
      toast('Statement sent via WhatsApp to 9677063368');
    });

    // Table view button -> open details modal
    var stmtModal = document.getElementById('cvStmtModal');

    function openStmtModal(tr) {
      if (!stmtModal) return;
      var d = tr.dataset;
      document.getElementById('sdDate').textContent = d.date || '—';
      document.getElementById('sdRef').textContent = d.ref || '—';
      document.getElementById('sdType').textContent = d.type || '—';
      document.getElementById('sdMode').textContent = d.mode || '—';
      document.getElementById('sdDebit').textContent = d.debit || '—';
      document.getElementById('sdCredit').textContent = d.credit || '—';
      document.getElementById('sdBal').textContent = d.balance || '—';
      document.getElementById('sdDesc').textContent = d.desc || '—';
      document.getElementById('sdNotes').textContent = d.notes || '—';
      stmtModal.classList.add('show');
    }

    function bindStmtView() {
      doc.querySelectorAll('.cv-stmt-view').forEach(function(btn) {
        if (btn.dataset.bound) return;
        btn.dataset.bound = '1';
        btn.addEventListener('click', function() {
          var tr = btn.closest('tr');
          if (tr && tr.dataset.date) openStmtModal(tr);
        });
      });
    }
    bindStmtView();

    function closeStmtModal() {
      if (stmtModal) stmtModal.classList.remove('show');
    }
    ['cvStmtClose', 'cvStmtCancel'].forEach(function(id) {
      var el = document.getElementById(id);
      if (el) el.addEventListener('click', closeStmtModal);
    });
    if (stmtModal) stmtModal.addEventListener('click', function(e) {
      if (e.target === stmtModal) closeStmtModal();
    });
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && stmtModal && stmtModal.classList.contains('show')) closeStmtModal();
    });
  });

/* ==========================================================================
   Script Block 23
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
    var modalEl = document.getElementById('cvNewCallLogModal'),
      openBtn = document.getElementById('cvNewCallLogBtn'),
      body = document.getElementById('cvBody-call_logs');
    if (!modalEl || !openBtn || !body) return;

    function $(id) {
      return document.getElementById(id);
    }

    function toastMsg(msg, ok) {
      var t = document.createElement('div');
      t.className = 'cv-toast';
      t.innerHTML = '<i class="bi ' + (ok === false ? 'bi-exclamation-circle-fill' : 'bi-telephone-fill') + '"></i> ' + msg;
      document.body.appendChild(t);
      setTimeout(function() {
        t.classList.add('show');
      }, 10);
      setTimeout(function() {
        t.classList.remove('show');
        setTimeout(function() {
          t.remove();
        }, 350);
      }, 2600);
    }

    function esc(s) {
      var dv = document.createElement('div');
      dv.textContent = s;
      return dv.innerHTML;
    }

    var modal = bootstrap.Modal.getOrCreateInstance(modalEl),
      startEl = $('clStart'),
      endEl = $('clEnd'),
      durEl = $('clDuration');

    /* ---- Default start/end to now when modal opens fresh ---- */
    function nowLocal() {
      var d = new Date(),
        p = function(n) {
          return (n < 10 ? '0' : '') + n;
        };
      return d.getFullYear() + '-' + p(d.getMonth() + 1) + '-' + p(d.getDate()) + 'T' + p(d.getHours()) + ':' + p(d.getMinutes());
    }

    function fmtDT(v) {
      // "2026-09-24T14:48" -> "24-09-2026 14:48"
      if (!v) return '—';
      var parts = v.split('T'),
        d = parts[0].split('-');
      return d[2] + '-' + d[1] + '-' + d[0] + ' ' + (parts[1] || '00:00');
    }

    /* ---- Duration auto-calc ---- */
    function calcDuration() {
      if (!startEl.value || !endEl.value) {
        durEl.value = '';
        return;
      }
      var ms = new Date(endEl.value) - new Date(startEl.value);
      if (isNaN(ms) || ms < 0) {
        durEl.value = '';
        durEl.placeholder = 'End time must be after start time';
        return;
      }
      durEl.placeholder = 'Auto-calculated from start & end time';
      var totalSec = Math.floor(ms / 1000),
        h = Math.floor(totalSec / 3600),
        m = Math.floor((totalSec % 3600) / 60),
        s = totalSec % 60,
        p = function(n) {
          return (n < 10 ? '0' : '') + n;
        };
      durEl.value = (h ? p(h) + ':' : '') + p(m) + ':' + p(s);
    }

    startEl.addEventListener('change', calcDuration);
    endEl.addEventListener('change', calcDuration);

    modalEl.addEventListener('shown.bs.modal', function() {
      if (!startEl.value) startEl.value = nowLocal();
      if (!endEl.value) endEl.value = nowLocal();
      calcDuration();
    });

    /* ---- Clear errors while typing ---- */
    [$('clType'), $('clCaller'), $('clContact'), $('clPurpose'), $('clSummary')].forEach(function(el) {
      el.addEventListener(el.tagName === 'SELECT' ? 'change' : 'input', function() {
        if (String(this.value).trim()) {
          this.classList.remove('cv-invalid');
          var err = $(this.id + 'Err');
          if (err) err.hidden = true;
        }
      });
    });

    /* ---- Submit ---- */
    $('clSubmit').addEventListener('click', function() {
      var ok = true,
        first = null;

      function check(input, errId) {
        if (!String(input.value).trim()) {
          input.classList.add('cv-invalid');
          $(errId).hidden = false;
          if (!first) first = input;
          ok = false;
        }
      }
      check($('clType'), 'clTypeErr');
      check($('clCaller'), 'clCallerErr');
      check($('clContact'), 'clContactErr');
      check($('clPurpose'), 'clPurposeErr');
      check($('clSummary'), 'clSummaryErr');
      if (!ok) {
        toastMsg('Please fill the required fields', false);
        if (first) first.focus();
        return;
      }

      function radio(name) {
        var el = modalEl.querySelector('input[name="' + name + '"]:checked');
        return el ? el.value : 'No';
      }

      var type = $('clType').value,
        icon = type === 'Incoming' ? 'bi-telephone-inbound-fill' : (type === 'Missed' ? 'bi-telephone-missed-fill' : 'bi-telephone-outbound-fill'),
        cls = type.toLowerCase();

      var tr = body.insertRow();
      tr.className = 'cv-row';
      tr.innerHTML =
        '<td><span class="cv-cl-type"><i class="bi ' + icon + ' ' + esc(cls) + '"></i>' + esc(type) + '</span></td>' +
        '<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>';
      tr.cells[1].textContent = $('clPurpose').value.trim();
      tr.cells[2].textContent = $('clCaller').value.trim();
      tr.cells[3].textContent = $('clContact').value.trim();
      tr.cells[4].textContent = startEl.value ? fmtDT(startEl.value) : '—';
      tr.cells[5].textContent = endEl.value ? fmtDT(endEl.value) : '—';
      tr.cells[6].textContent = durEl.value || '—';
      tr.cells[7].innerHTML = '<span class="' + (radio('clFollowup') === 'Yes' ? 'cv-cl-yes' : 'cv-cl-no') + '">' + radio('clFollowup') + '</span>';
      tr.cells[8].innerHTML = '<span class="' + (radio('clImportant') === 'Yes' ? 'cv-cl-yes' : 'cv-cl-no') + '">' + radio('clImportant') + '</span>';
      tr.cells[9].innerHTML = '<span class="' + (radio('clCompleted') === 'Yes' ? 'cv-cl-yes' : 'cv-cl-no') + '">' + radio('clCompleted') + '</span>';

      // Sidebar "Call Logs" badge count
      var link = document.querySelector('.cv-side a[data-tab="call_logs"]');
      if (link) {
        var badge = link.querySelector('.cv-badge');
        if (!badge) {
          badge = document.createElement('span');
          badge.className = 'cv-badge';
          badge.textContent = '0';
          link.appendChild(badge);
        }
        badge.textContent = (parseInt(badge.textContent, 10) || 0) + 1;
      }

      modal.hide();
      if (window.refreshAttendanceTable) window.refreshAttendanceTable();
      toastMsg('Call log saved for ' + $('clContact').value.trim());

      /* Reset form for next open */
      $('clType').value = '';
      $('clCallType').value = '';
      $('clCaller').value = '';
      $('clContact').value = '';
      $('clPurpose').value = '';
      $('clSummary').value = '';
      startEl.value = nowLocal();
      endEl.value = nowLocal();
      calcDuration();
      $('clStaff').value = '';
      modalEl.querySelector('input[name="clFollowup"][value="No"]').checked = true;
      modalEl.querySelector('input[name="clCompleted"][value="No"]').checked = true;
      modalEl.querySelector('input[name="clImportant"][value="No"]').checked = true;
      ['clType', 'clCaller', 'clContact', 'clPurpose', 'clSummary'].forEach(function(id) {
        $(id).classList.remove('cv-invalid');
      });
      ['clTypeErr', 'clCallerErr', 'clContactErr', 'clPurposeErr', 'clSummaryErr'].forEach(function(id) {
        $(id).hidden = true;
      });
    });
  });

/* ==========================================================================
   Script Block 24
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById('cvAddrModal'),
      openBtn = document.getElementById('cvAddAddrBtn'),
      body = document.getElementById('cvBody-shipping');
    if (!modal || !openBtn || !body) return;

    function $(id) {
      return document.getElementById(id);
    }

    function toastMsg(msg, ok) {
      var t = document.createElement('div');
      t.className = 'cv-toast';
      t.innerHTML = '<i class="bi ' + (ok === false ? 'bi-exclamation-circle-fill' : 'bi-check-circle-fill') + '"></i> ' + msg;
      document.body.appendChild(t);
      setTimeout(function() {
        t.classList.add('show');
      }, 10);
      setTimeout(function() {
        t.classList.remove('show');
        setTimeout(function() {
          t.remove();
        }, 350);
      }, 2600);
    }

    var reqFields = ['adOutlet', 'adStreet'],
      editingRow = null;

    function resetAddrForm() {
      ['adOutlet', 'adStreet', 'adZip', 'adLat', 'adLng', 'adEmail'].forEach(function(id) {
        $(id).value = '';
      });
      $('adPhone').value = '+91 ';
      $('adCountry').value = 'India';
      ['adState', 'adCity', 'adArea'].forEach(function(id) {
        $(id).value = '';
      });
      reqFields.forEach(function(id) {
        $(id).classList.remove('cv-invalid');
      });
      modal.querySelector('.cv-note-body').scrollTop = 0;
    }

    function openModal() {
      resetAddrForm();
      editingRow = null;
      $('cvAddrTitle').textContent = 'Add address';
      modal.classList.add('show');
      setTimeout(function() {
        $('adOutlet').focus();
      }, 50);
    }

    function closeModal() {
      modal.classList.remove('show');
    }

    openBtn.addEventListener('click', openModal);
    $('cvAddrClose').addEventListener('click', closeModal);
    $('cvAddrCancel').addEventListener('click', closeModal);
    modal.addEventListener('click', function(e) {
      if (e.target === modal) closeModal();
    });
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && modal.classList.contains('show')) closeModal();
    });

    // Clear error while typing
    reqFields.forEach(function(id) {
      $(id).addEventListener('input', function() {
        if (this.value.trim()) this.classList.remove('cv-invalid');
      });
    });

    // Submit — add address row
    $('cvAddrSubmit').addEventListener('click', function() {
      var ok = true;
      reqFields.forEach(function(id) {
        var el = $(id);
        if (!el.value.trim()) {
          el.classList.add('cv-invalid');
          ok = false;
        }
      });
      if (!ok) {
        toastMsg('Outlet Name and Street are required', false);
        return;
      }
      var d = new Date(),
        p = function(n) {
          return (n < 10 ? '0' : '') + n;
        },
        when = p(d.getDate()) + '-' + p(d.getMonth() + 1) + '-' + d.getFullYear() + ' ' + p(d.getHours()) + ':' + p(d.getMinutes()),
        esc = function(s) {
          var div = document.createElement('div');
          div.textContent = s;
          return div.innerHTML;
        },
        email = $('adEmail').value.trim(),
        phoneRaw = $('adPhone').value.trim(),
        phone = phoneRaw === '+91' ? '' : esc(phoneRaw),
        emailCell = email ? '<a class="cv-link" href="mailto:' + esc(email) + '">' + esc(email) + '</a>' : '—',
        phoneCell = phone ? '<a class="cv-link" href="tel:' + esc(phone.replace(/\s+/g, '')) + '">' + esc(phone) + '</a>' : '—';

      var tr = editingRow || body.insertRow();
      tr.className = 'cv-row';
      if (!editingRow) tr.innerHTML = '<td></td>';

      var cells = [
        esc($('adOutlet').value.trim()),
        esc($('adArea').value || '—'),
        esc($('adStreet').value.trim()),
        esc($('adCity').value || '—'),
        esc($('adZip').value.trim() || '—'),
        esc($('adState').value || '—'),
        esc($('adLat').value.trim() || '—'),
        esc($('adLng').value.trim() || '—'),
        emailCell,
        phoneCell,
        when
      ];
      cells.forEach(function(val, i) {
        var cell = tr.cells[i + 1];
        if (!cell) {
          cell = tr.insertCell(i + 1);
        }
        cell.innerHTML = val;
      });

      var actCell = tr.cells[12];
      if (!actCell) {
        actCell = tr.insertCell(12);
        actCell.innerHTML = '<div class="d-flex gap-1">' +
          '<button type="button" class="cv-addr-edit" title="Edit address" aria-label="Edit address"><i class="bi bi-pencil-fill"></i></button>' +
          '<button type="button" class="cv-addr-del" title="Delete address" aria-label="Delete address"><i class="bi bi-trash"></i></button>' +
          '</div>';
      }

      renumber();
      closeModal();
      if (window.refreshAttendanceTable) window.refreshAttendanceTable();
      toastMsg(editingRow ? 'Address updated successfully' : 'Address added successfully');
      editingRow = null;
    });

    // Serial number + delete
    function renumber() {
      Array.from(body.rows).forEach(function(r, i) {
        if (r.cells[0]) r.cells[0].textContent = i + 1;
      });
    }

    body.addEventListener('click', function(e) {
      var del = e.target.closest('.cv-addr-del'),
        edit = e.target.closest('.cv-addr-edit');
      if (del) {
        del.closest('tr').remove();
        renumber();
        if (window.refreshAttendanceTable) window.refreshAttendanceTable();
        toastMsg('Address removed');
        return;
      }
      if (!edit) return;
      var row = edit.closest('tr'),
        c = row.cells;
      $('adOutlet').value = c[1].textContent === '—' ? '' : c[1].textContent;
      $('adArea').value = c[2].textContent === '—' ? '' : c[2].textContent;
      $('adStreet').value = c[3].textContent === '—' ? '' : c[3].textContent;
      $('adCity').value = c[4].textContent === '—' ? '' : c[4].textContent;
      $('adZip').value = c[5].textContent === '—' ? '' : c[5].textContent;
      $('adState').value = c[6].textContent === '—' ? '' : c[6].textContent;
      $('adLat').value = c[7].textContent === '—' ? '' : c[7].textContent;
      $('adLng').value = c[8].textContent === '—' ? '' : c[8].textContent;
      var emailTxt = c[9].querySelector('a') ? c[9].querySelector('a').textContent : '';
      $('adEmail').value = emailTxt;
      var phoneTxt = c[10].querySelector('a') ? c[10].querySelector('a').textContent : '+91 ';
      $('adPhone').value = phoneTxt.indexOf('+91') === 0 ? phoneTxt : '+91 ' + phoneTxt;
      editingRow = row;
      $('cvAddrTitle').textContent = 'Edit address';
      modal.classList.add('show');
      setTimeout(function() {
        $('adOutlet').focus();
      }, 50);
    });
  });

/* ==========================================================================
   Script Block 25
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById('cvVaultModal'),
      openBtn = document.getElementById('cvNewVaultBtn'),
      body = document.getElementById('cvBody-vault');
    if (!modal || !openBtn || !body) return;

    function $(id) {
      return document.getElementById(id);
    }

    function toastMsg(msg, ok) {
      var t = document.createElement('div');
      t.className = 'cv-toast';
      t.innerHTML = '<i class="bi ' + (ok === false ? 'bi-exclamation-circle-fill' : 'bi-shield-lock-fill') + '"></i> ' + msg;
      document.body.appendChild(t);
      setTimeout(function() {
        t.classList.add('show');
      }, 10);
      setTimeout(function() {
        t.classList.remove('show');
        setTimeout(function() {
          t.remove();
        }, 350);
      }, 2600);
    }

    var passInput = $('cvPass'),
      passBar = $('cvPassBar'),
      passHint = $('cvPassHint'),
      passToggle = $('cvPassToggle'),
      passGen = $('cvPassGen');

    function esc(s) {
      var dv = document.createElement('div');
      dv.textContent = s;
      return dv.innerHTML;
    }

    /* ---- Password show / hide ---- */
    passToggle.addEventListener('click', function() {
      var show = passInput.type === 'password';
      passInput.type = show ? 'text' : 'password';
      this.innerHTML = '<i class="bi ' + (show ? 'bi-eye-slash' : 'bi-eye') + '"></i>';
      this.setAttribute('aria-label', show ? 'Hide password' : 'Show password');
      passInput.focus();
    });

    /* ---- Password strength ---- */
    function passScore(v) {
      var s = 0;
      if (v.length >= 8) s++;
      if (/[A-Z]/.test(v) && /[a-z]/.test(v)) s++;
      if (/\d/.test(v)) s++;
      if (/[^A-Za-z0-9]/.test(v)) s++;
      if (v.length >= 12 && s >= 3) s++;
      return s; // 0..5
    }

    function renderStrength() {
      var v = passInput.value,
        s = passScore(v),
        pct = [0, 20, 40, 60, 85, 100][s],
        cls = s <= 1 ? '#dc3545' : (s <= 3 ? '#d97706' : 'var(--primary)'),
        lbl = v ? (s <= 1 ? 'Weak password' : (s <= 3 ? 'Medium password' : 'Strong password')) : 'Use 8+ characters with letters, numbers & symbols.';
      passBar.style.width = pct + '%';
      passBar.style.background = cls;
      passHint.textContent = lbl;
      passHint.className = 'cv-pass-hint ' + (v ? (s <= 1 ? 's-weak' : (s <= 3 ? 's-med' : 's-strong')) : '');
    }

    passInput.addEventListener('input', function() {
      renderStrength();
      if (this.value.trim()) {
        this.classList.remove('cv-invalid');
        $('cvPassErr').hidden = true;
      }
    });

    /* ---- Generate strong password ---- */
    passGen.addEventListener('click', function() {
      var chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789!@#$%&*?',
        out = '';
      var rnd = new Uint32Array(16);
      (window.crypto || window.msCrypto).getRandomValues(rnd);
      for (var i = 0; i < 16; i++) out += chars[rnd[i] % chars.length];
      passInput.value = out;
      passInput.type = 'text';
      passToggle.innerHTML = '<i class="bi bi-eye-slash"></i>';
      renderStrength();
      toastMsg('Strong password generated');
    });

    /* ---- Clear errors while typing ---- */
    [$('cvServer'), $('cvUser')].forEach(function(el) {
      el.addEventListener('input', function() {
        if (this.value.trim()) {
          this.classList.remove('cv-invalid');
          $(this.id + 'Err').hidden = true;
        }
      });
    });

    function openModal() {
      $('cvServer').value = '';
      $('cvPort').value = '';
      $('cvUser').value = '';
      passInput.value = '';
      passInput.type = 'password';
      passToggle.innerHTML = '<i class="bi bi-eye"></i>';
      renderStrength();
      $('cvDesc').value = '';
      var def = modal.querySelector('input[name="cvVisibility"][value="staff"]');
      if (def) def.checked = true;
      $('cvShareProjects').checked = false;
      [$('cvServer'), $('cvUser'), passInput].forEach(function(el) {
        el.classList.remove('cv-invalid');
      });
      ['cvServerErr', 'cvUserErr', 'cvPassErr'].forEach(function(id) {
        $(id).hidden = true;
      });
      modal.classList.add('show');
      setTimeout(function() {
        $('cvServer').focus();
      }, 50);
    }

    function closeModal() {
      modal.classList.remove('show');
    }

    openBtn.addEventListener('click', openModal);
    $('cvVaultClose').addEventListener('click', closeModal);
    $('cvVaultCancel').addEventListener('click', closeModal);
    modal.addEventListener('click', function(e) {
      if (e.target === modal) closeModal();
    });
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && modal.classList.contains('show')) closeModal();
    });

    /* ---- Submit ---- */
    $('cvVaultSubmit').addEventListener('click', function() {
      var ok = true,
        first = null;

      function check(input, errId) {
        if (!input.value.trim()) {
          input.classList.add('cv-invalid');
          $(errId).hidden = false;
          if (!first) first = input;
          ok = false;
        }
      }
      check($('cvServer'), 'cvServerErr');
      check($('cvUser'), 'cvUserErr');
      check(passInput, 'cvPassErr');
      if (!ok) {
        toastMsg('Please fill the required fields', false);
        if (first) first.focus();
        return;
      }

      var tr = body.insertRow();
      tr.className = 'cv-row';
      tr.innerHTML = '<td></td><td></td><td></td><td></td>';
      tr.cells[0].textContent = $('cvServer').value.trim();
      tr.cells[1].textContent = $('cvPort').value.trim() || '—';
      tr.cells[2].textContent = $('cvUser').value.trim();
      tr.cells[3].textContent = $('cvDesc').value.trim() || '—';

      // Sidebar "Vault" badge count
      var link = document.querySelector('.cv-side a[data-tab="vault"]');
      if (link) {
        var badge = link.querySelector('.cv-badge');
        if (!badge) {
          badge = document.createElement('span');
          badge.className = 'cv-badge';
          badge.textContent = '0';
          link.appendChild(badge);
        }
        badge.textContent = (parseInt(badge.textContent, 10) || 0) + 1;
      }

      closeModal();
      if (window.refreshAttendanceTable) window.refreshAttendanceTable();
      toastMsg('Vault entry saved for ' + $('cvServer').value.trim());
    });
  });

/* ==========================================================================
   Script Block 26
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById('cvReminderModal'),
      openBtn = document.getElementById('cvNewReminderBtn'),
      body = document.getElementById('cvBody-reminders');
    if (!modal || !openBtn || !body) return;

    function $(id) {
      return document.getElementById(id);
    }

    function toastMsg(msg, ok) {
      var t = document.createElement('div');
      t.className = 'cv-toast';
      t.innerHTML = '<i class="bi ' + (ok === false ? 'bi-exclamation-circle-fill' : 'bi-bell-fill') + '"></i> ' + msg;
      document.body.appendChild(t);
      setTimeout(function() {
        t.classList.add('show');
      }, 10);
      setTimeout(function() {
        t.classList.remove('show');
        setTimeout(function() {
          t.remove();
        }, 350);
      }, 2600);
    }

    /* ---- Clear errors while typing ---- */
    [$('cvRemDate'), $('cvRemDesc')].forEach(function(el) {
      el.addEventListener('input', function() {
        if (this.value.trim()) {
          this.classList.remove('cv-invalid');
          $(this.id + 'Err').hidden = true;
        }
      });
    });
    $('cvRemStaff').addEventListener('change', function() {
      if (this.value) {
        this.classList.remove('cv-invalid');
        $('cvRemStaffErr').hidden = true;
      }
    });

    function openModal() {
      $('cvRemDate').value = '';
      $('cvRemTime').value = '';
      $('cvRemStaff').value = '';
      $('cvRemDesc').value = '';
      $('cvRemEmail').checked = false;
      [$('cvRemDate'), $('cvRemStaff'), $('cvRemDesc')].forEach(function(el) {
        el.classList.remove('cv-invalid');
      });
      ['cvRemDateErr', 'cvRemStaffErr', 'cvRemDescErr'].forEach(function(id) {
        $(id).hidden = true;
      });
      modal.classList.add('show');
      setTimeout(function() {
        $('cvRemDate').focus();
      }, 50);
    }

    function closeModal() {
      modal.classList.remove('show');
    }

    openBtn.addEventListener('click', openModal);
    $('cvReminderClose').addEventListener('click', closeModal);
    $('cvReminderCancel').addEventListener('click', closeModal);
    modal.addEventListener('click', function(e) {
      if (e.target === modal) closeModal();
    });
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && modal.classList.contains('show')) closeModal();
    });

    /* ---- Ctrl + Enter shortcut ---- */
    $('cvRemDesc').addEventListener('keydown', function(e) {
      if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') $('cvReminderSubmit').click();
    });

    /* ---- Submit ---- */
    $('cvReminderSubmit').addEventListener('click', function() {
      var ok = true,
        first = null;

      function check(input, errId) {
        if (!input.value.trim()) {
          input.classList.add('cv-invalid');
          $(errId).hidden = false;
          if (!first) first = input;
          ok = false;
        }
      }
      check($('cvRemDate'), 'cvRemDateErr');
      check($('cvRemStaff'), 'cvRemStaffErr');
      check($('cvRemDesc'), 'cvRemDescErr');
      if (!ok) {
        toastMsg('Please fill the required fields', false);
        if (first) first.focus();
        return;
      }

      var d = $('cvRemDate').value,
        time = $('cvRemTime').value,
        when = d;
      if (time) when += ' ' + time;
      if ($('cvRemEmail').checked) when += ' + Email';

      var tr = body.insertRow();
      tr.className = 'cv-row';
      tr.innerHTML = '<td></td><td></td><td></td><td>No</td>';
      tr.cells[0].textContent = $('cvRemDesc').value.trim();
      tr.cells[1].textContent = when;
      tr.cells[2].textContent = $('cvRemStaff').value;

      // Sidebar "Reminders" badge count
      var link = document.querySelector('.cv-side a[data-tab="reminders"]');
      if (link) {
        var badge = link.querySelector('.cv-badge');
        if (!badge) {
          badge = document.createElement('span');
          badge.className = 'cv-badge';
          badge.textContent = '0';
          link.appendChild(badge);
        }
        badge.textContent = (parseInt(badge.textContent, 10) || 0) + 1;
      }

      closeModal();
      if (window.refreshAttendanceTable) window.refreshAttendanceTable();
      toastMsg('Reminder set for ' + $('cvRemStaff').value);
    });
  });

/* ==========================================================================
   Script Block 27
   ========================================================================== */
/* ---------------------------------------------------------------
       Pure JavaScript Client-Side Tab Switching (display: block / none)
       NO URL changes, NO hash, NO query parameters, NO page reloads!
       --------------------------------------------------------------- */
  (function() {
    var DEFAULT_TAB = 'contacts';
    var LABELS = {
      "profile": "Profile",
      "contacts": "Contacts",
      "notes": "Notes",
      "proposals": "Proposals",
      "estimates": "Estimates",
      "appointments": "Appointments",
      "invoices": "Invoices",
      "payments": "Payments",
      "statement": "Statement",
      "credit_notes": "Credit Notes",
      "purchase_orders": "Purchase Orders",
      "subscriptions": "Subscriptions",
      "expenses": "Expenses",
      "contracts": "Contracts",
      "projects": "Projects",
      "tasks": "Tasks",
      "tickets": "Support Tickets",
      "email_log": "Email Log",
      "call_logs": "Call Logs",
      "shipping": "View Shipping Address",
      "map": "Map",
      "files": "Files",
      "vault": "Vault",
      "reminders": "Reminders",
      "activity_log": "Activity Log"
    };

    var side = document.getElementById('cvSide');
    var crumb = document.getElementById('cvCrumbTab');
    var profile = document.getElementById('cvProfile');
    var foot = document.getElementById('cvFormFoot');

    // Immediately clean any existing query string (?id=46...) or hash from the URL bar without reloading
    if (window.location.search || window.location.hash) {
      try {
        window.history.replaceState(null, '', window.location.pathname);
      } catch (e) {}
    }

    function activateTab(tabKey) {
      if (!tabKey) tabKey = DEFAULT_TAB;

      // 1. Update sidebar links
      var sideLinks = side ? side.querySelectorAll('.cv-side-link') : [];
      var activeLink = null;
      sideLinks.forEach(function(link) {
        if (link.getAttribute('data-tab') === tabKey) {
          link.classList.add('active');
          link.setAttribute('aria-selected', 'true');
          activeLink = link;
        } else {
          link.classList.remove('active');
          link.setAttribute('aria-selected', 'false');
        }
      });

      // 2. Update breadcrumb
      if (crumb) {
        crumb.textContent = LABELS[tabKey] || (activeLink ? activeLink.textContent.trim() : '');
      }

      // 3. Switch main tab panes using display: block and display: none
      var panes = document.querySelectorAll('#cvTabContent > .tab-pane');
      var targetId = 'cvTab-' + tabKey;
      var activePane = null;

      panes.forEach(function(pane) {
        if (pane.id === targetId) {
          pane.style.display = 'block';
          pane.classList.add('show', 'active');
          activePane = pane;
        } else {
          pane.style.display = 'none';
          pane.classList.remove('show', 'active');
        }
      });

      // 4. Refresh datatables in the newly visible pane
      if (activePane) {
        var tables = activePane.querySelectorAll('table.datatable');
        tables.forEach(function(table) {
          if (table.autoTable && typeof table.autoTable.refresh === 'function') {
            table.autoTable.refresh();
          }
        });
      }
    }

    // Sidebar click handler (pure client-side display toggle, no URL change)
    if (side) {
      side.addEventListener('click', function(e) {
        var link = e.target.closest('.cv-side-link');
        if (!link) return;
        e.preventDefault();
        e.stopPropagation();

        var key = link.getAttribute('data-tab');
        if (key) {
          activateTab(key);
        }
      });
    }

    // Profile sub-tabs switching (Customer Details, Billing & Shipping, Customer Admins, Purchase Order)
    function activateSubTab(subKey) {
      if (!profile) return;
      var subBtns = profile.querySelectorAll('.cv-subtab');
      var subPanes = profile.querySelectorAll('.tab-content > .tab-pane');

      subBtns.forEach(function(btn) {
        if (btn.getAttribute('data-sub') === subKey) {
          btn.classList.add('active');
          btn.setAttribute('aria-selected', 'true');
        } else {
          btn.classList.remove('active');
          btn.setAttribute('aria-selected', 'false');
        }
      });

      var activeSubPane = null;
      subPanes.forEach(function(pane) {
        if (pane.getAttribute('data-pane') === subKey || pane.id === 'cvSub-' + subKey) {
          pane.style.display = 'block';
          pane.classList.add('show', 'active');
          activeSubPane = pane;
        } else {
          pane.style.display = 'none';
          pane.classList.remove('show', 'active');
        }
      });

      // Toggle submit button footer (show only for details & billing)
      if (foot) {
        foot.style.display = (subKey === 'details' || subKey === 'billing') ? '' : 'none';
      }

      if (activeSubPane) {
        var tables = activeSubPane.querySelectorAll('table.datatable');
        tables.forEach(function(table) {
          if (table.autoTable && typeof table.autoTable.refresh === 'function') {
            table.autoTable.refresh();
          }
        });
      }
    }

    if (profile) {
      profile.addEventListener('click', function(e) {
        var btn = e.target.closest('.cv-subtab');
        if (!btn) return;
        e.preventDefault();
        e.stopPropagation();

        var sub = btn.getAttribute('data-sub');
        if (sub) {
          activateSubTab(sub);
        }
      });
    }

    // Initial setup on page load: show default tab (Contacts)
    activateTab(DEFAULT_TAB);
    activateSubTab('details');
  })();

  /* every row added/removed from JS re-paginates through the datatable plugin */
  window.refreshAttendanceTable = function() {
    document.querySelectorAll('table.datatable').forEach(function(t) {
      if (t.autoTable) t.autoTable.refresh();
    });
  };
