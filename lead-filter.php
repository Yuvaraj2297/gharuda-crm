<?php include 'header.php'; ?>

<style>
    /* ===== Page ===== */
    .lf-page {
        padding: 18px 22px 28px;
        max-width: 1560px;
        margin: 0 auto;
    }

    .lf-title-row {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 2px 2px 16px;
    }

    .lf-title-row h5 {
        font-size: 17px;
        font-weight: 800;
        color: #111827;
        margin: 0;
        letter-spacing: -.01em;
    }

    /* ===== Filters card ===== */
    .lf-filters-card {
        background: #fff;
        border: 1px solid #eef0f2;
        border-radius: 14px;
        box-shadow: 0 1px 2px rgba(17, 24, 39, .05), 0 4px 14px rgba(17, 24, 39, .04);
        padding: 18px 20px 14px;
        margin-bottom: 18px;
    }

    .lf-filters-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
        padding-bottom: 14px;
        margin-bottom: 16px;
        border-bottom: 1px solid #f1f3f5;
    }

    .lf-filters-head h6 {
        font-size: 14.5px;
        font-weight: 800;
        color: #111827;
        margin: 0;
    }

    .lf-filters-head .btn {
        font-size: 12.5px;
        font-weight: 800;
        border-radius: 9px;
        padding: 7px 18px;
    }

    .lf-filters-grid {
        display: grid;
        grid-template-columns: repeat(6, minmax(0, 1fr));
        gap: 14px 16px;
    }

    .lf-field label {
        display: block;
        font-size: 12px;
        font-weight: 800;
        color: #374151;
        margin-bottom: 6px;
    }

    .lf-field .form-select,
    .lf-field .form-control {
        font-size: 12.5px;
        border-radius: 9px;
        border-color: #e5e7eb;
        color: #6b7280;
        font-weight: 600;
        padding: 7px 12px;
        width: 100%;
    }

    .lf-field .form-select:focus,
    .lf-field .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px var(--primary-soft);
        color: #111827;
    }

    /* template row */
    .lf-template-row {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #f8faf9;
        border: 1px dashed #e2e8e4;
        border-radius: 10px;
        padding: 10px 14px;
        margin-top: 16px;
    }

    .lf-template-row input[type="radio"] {
        width: 16px;
        height: 16px;
        accent-color: var(--primary);
        flex-shrink: 0;
        cursor: pointer;
    }

    .lf-template-row span {
        font-size: 12.5px;
        font-weight: 600;
        color: #9ca3af;
    }

    .lf-template-row input.lf-tpl-input {
        border: none;
        background: transparent;
        font-size: 12.5px;
        font-weight: 700;
        color: #111827;
        flex: 1;
        outline: none;
        padding: 2px 4px;
    }

    .lf-template-row input.lf-tpl-input::placeholder {
        color: #c3cbd3;
    }

    @media (max-width: 1200px) {
        .lf-filters-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (max-width: 700px) {
        .lf-filters-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    /* ===== Table card extras ===== */
    .lf-period-note {
        font-size: 12px;
        font-weight: 600;
        color: #6b7280;
        padding: 0 3px 8px;
    }

    /* Name link */
    .lf-name-link {
        color: var(--primary);
        font-weight: 700;
        font-size: 12.5px;
        text-decoration: none;
    }

    .lf-name-link:hover {
        text-decoration: underline;
        color: var(--primary-dark);
    }

    /* Status pills */
    .lf-status-pill {
        display: inline-block;
        font-size: 10.5px;
        font-weight: 800;
        border-radius: 999px;
        padding: 3px 13px;
        border: 1.5px solid;
    }

    .lf-status-pill.lead { color: #16a34a; border-color: #86efac; background: #f0fdf4; }
    .lf-status-pill.new  { color: #0891b2; border-color: #67e8f9; background: #ecfeff; }
    .lf-status-pill.quotation { color: #7c3aed; border-color: #c4b5fd; background: #f5f3ff; }
    .lf-status-pill.followup  { color: #b45309; border-color: #fcd34d; background: #fffbeb; }

    /* Assigned avatar */
    .lf-avatar {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: #7b1fa2;
        color: #fff;
        font-size: 9px;
        font-weight: 800;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: default;
    }

    /* Tags */
    .lf-tag {
        display: inline-block;
        font-size: 10px;
        font-weight: 800;
        border-radius: 6px;
        padding: 3px 9px;
        background: var(--primary-soft);
        color: var(--primary-dark);
        margin-right: 4px;
    }
</style>

<div class="lf-page">

    <!-- Title row -->
    <div class="lf-title-row">
        <h5><i class="bi bi-funnel me-2" style="color:var(--primary);"></i>Lead Filters</h5>
    </div>

    <!-- ===== Filters card ===== -->
    <div class="lf-filters-card">
        <div class="lf-filters-head">
            <h6><i class="bi bi-sliders me-2" style="color:var(--primary);"></i>Lead Filters</h6>
            <div class="d-flex align-items-center gap-2">
                <button type="button" class="btn btn-primary" id="lfNewBtn"><i class="bi bi-plus-lg me-1"></i>New</button>
                <button type="button" class="btn btn-primary" id="lfApplyBtn" style="background:var(--primary);border-color:var(--primary);"><i class="bi bi-funnel me-1"></i>Filter</button>
                <button type="button" class="btn btn-outline-secondary" title="Filter templates"><i class="bi bi-list-ul"></i></button>
            </div>
        </div>

        <div class="lf-filters-grid">
            <div class="lf-field">
                <label>Staff Members</label>
                <select class="form-select" id="lfStaff">
                    <option selected>All Staff Members</option>
                    <option>GHRAUDA SOFTWARE</option>
                    <option>Harish D.</option>
                    <option>Divya A.</option>
                    <option>Priya S.</option>
                </select>
            </div>
            <div class="lf-field">
                <label>Lead Status</label>
                <select class="form-select" id="lfStatus">
                    <option selected>All</option>
                    <option>Lead</option>
                    <option>Quotation</option>
                    <option>Followup</option>
                    <option>Qualified</option>
                    <option>New</option>
                    <option>Customer</option>
                </select>
            </div>
            <div class="lf-field">
                <label>Lead Source</label>
                <select class="form-select" id="lfSource">
                    <option selected>All</option>
                    <option>Indiamart</option>
                    <option>Google</option>
                    <option>Direct</option>
                    <option>Website Form</option>
                    <option>Referral</option>
                </select>
            </div>
            <div class="lf-field">
                <label>Country</label>
                <select class="form-select" id="lfCountry">
                    <option selected>All</option>
                    <option>India</option>
                    <option>USA</option>
                    <option>UK</option>
                    <option>UAE</option>
                </select>
            </div>
            <div class="lf-field">
                <label>Tags</label>
                <select class="form-select" id="lfTags">
                    <option selected>All</option>
                    <option>Hot</option>
                    <option>Warm</option>
                    <option>Cold</option>
                </select>
            </div>
            <div class="lf-field">
                <label>Lead Type</label>
                <select class="form-select" id="lfType">
                    <option selected>Non selected</option>
                    <option>Customer</option>
                    <option>Lead</option>
                </select>
            </div>
            <div class="lf-field">
                <label>Hide Export Columns</label>
                <select class="form-select" id="lfHideCols">
                    <option selected>Nothing selected</option>
                    <option>Email</option>
                    <option>Phone</option>
                    <option>Profession</option>
                    <option>Public</option>
                </select>
            </div>
            <div class="lf-field">
                <label>Filter By Date</label>
                <select class="form-select" id="lfDateBy">
                    <option selected>Created Date</option>
                    <option>Last Contact</option>
                    <option>Next Follow up</option>
                </select>
            </div>
            <div class="lf-field">
                <label>Period</label>
                <select class="form-select" id="lfPeriod">
                    <option selected>this month</option>
                    <option>today</option>
                    <option>this week</option>
                    <option>last month</option>
                    <option>this year</option>
                </select>
            </div>
        </div>

        <!-- Save as Filter Template -->
        <div class="lf-template-row">
            <input type="radio" id="lfTplRadio" name="lfTpl">
            <span id="lfTplText">Save as Filter Template (Add Filter Name here)</span>
            <input type="text" class="lf-tpl-input" id="lfTplInput" placeholder="" style="display:none;">
        </div>
    </div>

    <!-- ===== Table (MasterTable flow) ===== -->
    <div class="card-custom lf-list-card" style="padding:0;border:none;border-radius:14px;box-shadow:0 1px 2px rgba(17,24,39,.05),0 4px 14px rgba(17,24,39,.04);overflow:hidden;">
        <div class="table-responsive">
            <table class="table-modern w-100 mb-0" id="leadFilterTable">
                <thead>
                    <tr>
                        <th class="text-nowrap">S.No</th>
                        <th class="text-nowrap">#</th>
                        <th class="text-nowrap">Name</th>
                        <th class="text-nowrap">Company</th>
                        <th class="text-nowrap">Email</th>
                        <th class="text-nowrap">Phone</th>
                        <th class="text-nowrap">Country</th>
                        <th class="text-nowrap">Profession</th>
                        <th class="text-nowrap">Status</th>
                        <th class="text-nowrap">Source</th>
                        <th class="text-nowrap">Created Date</th>
                        <th class="text-nowrap">Last Contact</th>
                        <th class="text-nowrap">Public</th>
                        <th class="text-nowrap">Assigned</th>
                        <th class="text-nowrap">Tags</th>
                    </tr>
                </thead>
                <tbody id="leadFilterTbody">
                    <!-- Rows injected by master-table.js -->
                </tbody>
            </table>
        </div>
    </div>

</div>

<script src="./assets/js/pages/lead-filter.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>
