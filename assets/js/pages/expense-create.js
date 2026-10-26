/**
 * Gharuda CRM - Expense Create Page Script
 * File: assets/js/pages/expense-create.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
$(document).ready(function() {
    if ($.fn.select2) {
        $('.select2').select2({
            width: '100%',
            dropdownParent: $('body')
        });
    }

    // Tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // File input label update
    $('#receiptFile').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        if (fileName) {
            $('#fileLabel').html('<i class="bi bi-check-circle-fill text-success me-1"></i> Attached: <strong>' + fileName + '</strong>');
        }
    });
});

function saveNewCategory() {
    var catVal = $('#newCategoryInput').val().trim();
    if (catVal) {
        var newOption = new Option(catVal, catVal, true, true);
        $('#expenseCategory').append(newOption).trigger('change');
        $('#addCategoryModal').modal('hide');
        $('#newCategoryInput').val('');
    } else {
        alert('Please enter a category name');
    }
}

function simulateParsePilotScan() {
    $('#scanProgress').removeClass('d-none');
    setTimeout(function() {
        $('#scanProgress').addClass('d-none');
        $('#parsePilotModal').modal('hide');

        // Auto fill form with sample scanned receipt data
        $('#expenseName').val('Amazon Office Ergonomic Chairs & Desk Supplies');
        $('#expenseCategory').val('Hardware & Electronics').trigger('change');
        $('#expenseAmount').val('14850.00');
        $('#vendorSelect').val('Amazon Business').trigger('change');
        $('#expenseDate').val('2026-10-01');
        $('#refNumber').val('INV-AMZ-2026-8841');
        $('#paymentMode').val('Credit Card').trigger('change');
        $('#tax1Select').val('GST 18%').trigger('change');
        $('#expenseNote').val('Scanned via ParsePilot AI: 2x Ergonomic Office Chairs for Engineering team.');

        alert('✨ ParsePilot Scan Complete!\nVendor: Amazon Business\nAmount: ₹14,850.00\nTax: GST 18%\nInvoice: INV-AMZ-2026-8841');
    }, 1200);
}
