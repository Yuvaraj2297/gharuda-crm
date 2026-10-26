/**
 * Gharuda CRM - Ui Library Page Script
 * File: assets/js/pages/ui-library.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
function copySnippet(id) {
        var el = document.getElementById(id);
        if (!el) return;
        var text = el.innerText || el.textContent;
        navigator.clipboard.writeText(text).then(function() {
            triggerToast('Bootstrap code copied to clipboard!');
        }).catch(function() {
            triggerToast('Code copied!');
        });
    }

    function triggerToast(message) {
        var toastEl = document.getElementById('toastAlert');
        var toastBody = document.getElementById('toastBodyText');
        if (toastBody && message) toastBody.textContent = message;
        if (toastEl && window.bootstrap) {
            var toast = new bootstrap.Toast(toastEl, { delay: 2500 });
            toast.show();
        }
    }

    function toggleAllCode() {
        var collapses = document.querySelectorAll('.collapse[id^="code-"]');
        var anyOpen = Array.from(collapses).some(function(c) { return c.classList.contains('show'); });
        collapses.forEach(function(c) {
            var bsCollapse = bootstrap.Collapse.getOrCreateInstance(c, { toggle: false });
            if (anyOpen) {
                bsCollapse.hide();
            } else {
                bsCollapse.show();
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        var toastBtn = document.getElementById('btnTriggerToast');
        if (toastBtn) {
            toastBtn.addEventListener('click', function() {
                triggerToast('Pure Bootstrap 5 live toast notification triggered!');
            });
        }

        var checkAll = document.getElementById('checkAllDemo');
        if (checkAll) {
            checkAll.addEventListener('change', function() {
                var cbs = document.querySelectorAll('#sec-tables tbody input[type="checkbox"]');
                cbs.forEach(function(cb) { cb.checked = checkAll.checked; });
            });
        }
    });
