<?php include 'header.php'; ?>

<style>
    /* ===== Page ===== */
    .as-page {
        padding: 18px 22px 28px;
        max-width: 1500px;
        margin: 0 auto;
    }

    /* ===== Title row ===== */
    .as-title-row {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 2px 2px 16px;
        flex-wrap: wrap;
    }

    .as-title-row h5 {
        font-size: 17px;
        font-weight: 800;
        color: #111827;
        margin: 0;
        letter-spacing: -.01em;
    }

    /* ===== Filter card (From / To + funnel) ===== */
    .as-filter-card {
        background: #fff;
        border: 1px solid #eef0f2;
        border-radius: 14px;
        box-shadow: 0 1px 2px rgba(17, 24, 39, .04);
        padding: 16px 18px;
        margin-bottom: 18px;
        display: flex;
        align-items: center;
        gap: 18px;
        flex-wrap: wrap;
    }

    .as-filter-card .as-field {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .as-filter-card label {
        font-size: 12px;
        font-weight: 800;
        color: #374151;
        margin: 0;
    }

    .as-filter-card .form-control {
        font-size: 13px;
        border-radius: 10px;
        min-width: 190px;
        border-color: #e5e7eb;
    }

    .as-filter-card .form-control:focus {
        border-color: #86efac;
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .1);
    }

    .as-filter-btn {
        font-size: 13px;
        font-weight: 800;
        border-radius: 10px;
        padding: 9px 16px;
        background: linear-gradient(135deg, #16a34a, #15803d);
        border: none;
        box-shadow: 0 2px 6px rgba(22, 163, 74, .3);
        color: #fff;
        margin-left: auto;
    }

    .as-filter-btn:hover {
        background: linear-gradient(135deg, #15803d, #166534);
        color: #fff;
    }

    /* ===== Meetings table card ===== */
    .as-list-card {
        padding: 0;
        border: none;
        border-radius: 14px;
        box-shadow: 0 1px 2px rgba(17, 24, 39, .05), 0 4px 14px rgba(17, 24, 39, .04);
        overflow: hidden;
    }

    /* Status pill */
    .as-badge {
        display: inline-block;
        font-size: 10.5px;
        font-weight: 800;
        border-radius: 999px;
        padding: 4px 12px;
    }

    .as-badge.b-blue   { background: #dbeafe; color: #1d4ed8; }
    .as-badge.b-green  { background: #dcfce7; color: #15803d; }
    .as-badge.b-amber  { background: #fef3c7; color: #b45309; }
    .as-badge.b-red    { background: #fee2e2; color: #b91c1c; }
    .as-badge.b-grey   { background: #f3f4f6; color: #6b7280; }

    /* Customer/Lead chip */
    .as-cl-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 11px;
        font-weight: 800;
        border-radius: 999px;
        padding: 4px 12px;
    }

    .as-cl-chip.customer { background: #ede9fe; color: #6d28d9; }
    .as-cl-chip.lead     { background: var(--primary-soft); color: var(--primary-dark); }

    /* Zoom meeting link */
    .as-zoom-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: var(--primary);
        font-weight: 700;
        font-size: 12px;
        text-decoration: none;
        max-width: 230px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        vertical-align: middle;
    }

    .as-zoom-link:hover {
        text-decoration: underline;
        color: var(--primary-dark);
    }

    .as-zoom-link i {
        flex-shrink: 0;
    }
</style>

<div class="as-page">

    <!-- Title row -->
    <div class="as-title-row">
        <h5><i class="bi bi-calendar2-week me-2" style="color:#0ca308;"></i>Appointment Schedule</h5>
    </div>

    <!-- From / To filters -->
    <div class="as-filter-card">
        <div class="as-field">
            <label>From Date</label>
            <input type="date" class="form-control" id="asFromDate">
        </div>
        <div class="as-field">
            <label>To Date</label>
            <input type="date" class="form-control" id="asToDate">
        </div>
        <button type="button" class="btn as-filter-btn" id="asFilterBtn" title="Apply date filter">
            <i class="bi bi-funnel-fill me-1"></i>Filter
        </button>
    </div>

    <!-- Meetings table (toolbar auto-created by master-table.js) -->
    <div class="card-custom as-list-card">
        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 mb-0" id="meetingsTable">
                <thead>
                    <tr>
                        <th class="text-nowrap">S.No</th>
                        <th class="text-nowrap">Customer Name</th>
                        <th class="text-nowrap">Customer Email</th>
                        <th class="text-nowrap">Staff Name</th>
                        <th class="text-nowrap">Customer/Lead</th>
                        <th class="text-nowrap">Zoom Meeting</th>
                        <th class="text-nowrap">Status</th>
                        <th class="text-nowrap">Remark</th>
                    </tr>
                </thead>
                <tbody id="meetingsTbody">
                    <!-- Rows injected by master-table.js -->
                </tbody>
            </table>
        </div>
        <!-- Footer (showing + pagination auto-created by master-table.js) -->
    </div>

</div>

<script src="./assets/js/pages/appointment-schedule.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>
