<?php
$defaultModules = [
    // 1. HR Management
    ['id' => 1,  'group' => 'HR Management', 'module' => 'Organization',        'name' => 'Department Directory',          'caps' => ['view_own', 'view_global', 'create', 'edit', 'delete']],
    ['id' => 2,  'group' => 'HR Management', 'module' => 'Organization',        'name' => 'Employee Tree',                 'caps' => ['view_own', 'view_global']],
    ['id' => 3,  'group' => 'HR Management', 'module' => 'Organization',        'name' => 'Policy',                        'caps' => ['view_own', 'view_global', 'create', 'edit', 'delete']],
    ['id' => 4,  'group' => 'HR Management', 'module' => 'Organization',        'name' => 'Calendar',                      'caps' => ['view_own', 'view_global', 'create', 'edit', 'delete']],

    ['id' => 5,  'group' => 'HR Management', 'module' => 'Employee Creation',   'name' => 'Employee Create',               'caps' => ['view_global', 'create', 'edit', 'delete']],
    ['id' => 6,  'group' => 'HR Management', 'module' => 'Employee Creation',   'name' => 'Pending',                       'caps' => ['view_global', 'edit']],
    ['id' => 7,  'group' => 'HR Management', 'module' => 'Employee Creation',   'name' => 'In Progress',                   'caps' => ['view_global', 'edit']],

    ['id' => 8,  'group' => 'HR Management', 'module' => 'Employee',            'name' => 'Employee Report',               'caps' => ['view_own', 'view_global', 'create', 'edit', 'delete']],
    ['id' => 9,  'group' => 'HR Management', 'module' => 'Employee',            'name' => 'Employee Insurance',            'caps' => ['view_own', 'view_global', 'create', 'edit', 'delete']],

    ['id' => 10, 'group' => 'HR Management', 'module' => 'Shift',               'name' => 'Manage Shift',                  'caps' => ['view_global', 'create', 'edit', 'delete']],
    ['id' => 11, 'group' => 'HR Management', 'module' => 'Shift',               'name' => 'Create Shift',                  'caps' => ['view_global', 'create', 'edit', 'delete']],
    ['id' => 12, 'group' => 'HR Management', 'module' => 'Shift',               'name' => 'Shift Schedule',                'caps' => ['view_own', 'view_global', 'create', 'edit', 'delete']],
    ['id' => 13, 'group' => 'HR Management', 'module' => 'Shift',               'name' => 'Shift Change Requests',         'caps' => ['view_own', 'view_global', 'create', 'edit', 'delete']],

    ['id' => 14, 'group' => 'HR Management', 'module' => 'Loan & Advances',     'name' => 'Salary Advance & Loans',        'caps' => ['view_own', 'view_global', 'create', 'edit', 'delete']],
    ['id' => 15, 'group' => 'HR Management', 'module' => 'Loan & Advances',     'name' => 'Advance & Loan Policies',       'caps' => ['view_global', 'create', 'edit', 'delete']],
    ['id' => 16, 'group' => 'HR Management', 'module' => 'Loan & Advances',     'name' => 'Salary Deduction Ledger',       'caps' => ['view_global']],

    ['id' => 17, 'group' => 'HR Management', 'module' => 'Payroll Management',  'name' => 'Attendance Adjustment',         'caps' => ['view_global', 'create', 'edit', 'delete']],
    ['id' => 18, 'group' => 'HR Management', 'module' => 'Payroll Management',  'name' => 'Salary Structure',              'caps' => ['view_global', 'create', 'edit', 'delete']],
    ['id' => 19, 'group' => 'HR Management', 'module' => 'Payroll Management',  'name' => 'Payroll Processing',            'caps' => ['view_global', 'create', 'edit', 'delete']],
    ['id' => 20, 'group' => 'HR Management', 'module' => 'Payroll Management',  'name' => 'Payslip',                       'caps' => ['view_own', 'view_global']],

    // 2. Timesheet & Leave
    ['id' => 21, 'group' => 'Timesheet & Leave', 'module' => 'Attendance',      'name' => 'Attendance Report',             'caps' => ['view_own', 'view_global', 'create', 'edit', 'delete']],
    ['id' => 22, 'group' => 'Timesheet & Leave', 'module' => 'Attendance',      'name' => 'Punch In Reports',              'caps' => ['view_own', 'view_global', 'create', 'edit', 'delete']],
    ['id' => 23, 'group' => 'Timesheet & Leave', 'module' => 'Attendance',      'name' => 'Over-time',                     'caps' => ['view_own', 'view_global', 'create', 'edit', 'delete']],

    ['id' => 24, 'group' => 'Timesheet & Leave', 'module' => 'Leave',           'name' => 'Leave and Holiday',             'caps' => ['view_own', 'view_global', 'create', 'edit', 'delete']],
    ['id' => 25, 'group' => 'Timesheet & Leave', 'module' => 'Leave',           'name' => 'Leave Report',                  'caps' => ['view_own', 'view_global']],
    ['id' => 26, 'group' => 'Timesheet & Leave', 'module' => 'Leave',           'name' => 'Permission Request',            'caps' => ['view_own', 'view_global', 'create', 'edit', 'delete']],

    // 3. HR Record
    ['id' => 27, 'group' => 'HR Record',        'module' => 'Recruitment',      'name' => 'Job Openings',                  'caps' => ['view_global', 'create', 'edit', 'delete']],
    ['id' => 28, 'group' => 'HR Record',        'module' => 'Recruitment',      'name' => 'Social & Web Applications',     'caps' => ['view_global', 'create', 'edit', 'delete']],
    ['id' => 29, 'group' => 'HR Record',        'module' => 'Recruitment',      'name' => 'TL Evaluations & Scores',       'caps' => ['view_global', 'create', 'edit', 'delete']],
    ['id' => 30, 'group' => 'HR Record',        'module' => 'Recruitment',      'name' => 'Candidate Pipeline',            'caps' => ['view_global', 'create', 'edit', 'delete']],
    ['id' => 31, 'group' => 'HR Record',        'module' => 'Recruitment',      'name' => 'Offer Letters',                 'caps' => ['view_global', 'create', 'edit', 'delete']],
    ['id' => 32, 'group' => 'HR Record',        'module' => 'Recruitment',      'name' => 'Recruitment Reports',           'caps' => ['view_global']],

    ['id' => 33, 'group' => 'HR Record',        'module' => 'Onboarding',       'name' => 'Joining Pipeline',              'caps' => ['view_global', 'create', 'edit', 'delete']],
    ['id' => 34, 'group' => 'HR Record',        'module' => 'Onboarding',       'name' => 'Document Verification',         'caps' => ['view_global', 'create', 'edit', 'delete']],
    ['id' => 35, 'group' => 'HR Record',        'module' => 'Onboarding',       'name' => 'Checklists',                    'caps' => ['view_global', 'create', 'edit', 'delete']],
    ['id' => 36, 'group' => 'HR Record',        'module' => 'Onboarding',       'name' => 'Asset Provisioning',            'caps' => ['view_global', 'create', 'edit', 'delete']],
    ['id' => 37, 'group' => 'HR Record',        'module' => 'Onboarding',       'name' => 'Induction & Orientation',       'caps' => ['view_global', 'create', 'edit', 'delete']],

    ['id' => 38, 'group' => 'HR Record',        'module' => 'Performance',      'name' => 'Appraisal Reviews',             'caps' => ['view_own', 'view_global', 'create', 'edit', 'delete']],
    ['id' => 39, 'group' => 'HR Record',        'module' => 'Performance',      'name' => '360° Feedback',                 'caps' => ['view_own', 'view_global', 'create', 'edit', 'delete']],
    ['id' => 40, 'group' => 'HR Record',        'module' => 'Performance',      'name' => 'Performance Reports',           'caps' => ['view_global']]
];

$capLabels = [
    'view_own' => 'View(Own)',
    'view_global' => 'View(Global)',
    'create' => 'Create',
    'edit' => 'Edit',
    'delete' => 'Delete'
];

include 'header.php';
?>

 

<style>
    .pm-cap-chip {
        display: inline-block;
        font-size: 11px;
        font-weight: 600;
        color: var(--ink-700);
        background: var(--primary-soft, #e8f7ea);
        border-radius: 999px;
        padding: 2px 10px;
        margin: 1px 2px 1px 0;
        white-space: nowrap;
    }
</style>

<div class="card-custom p-0" id="permissionModuleTableWrap">
    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-chip">
                <i class="bi bi-shield-lock"></i>
            </div>
            <div>
                <h3 class="card-title mb-0">Permission Modules</h3>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#creationModal">
            <i class="mdi mdi-plus"></i>
        </button>
    </div>

    <!-- Table (toolbar auto-created by datatable class) -->
    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 datatable" id="permissionModuleTable">
            <thead>
                <tr>
                    <th style="width: 70px;">S.No</th>
                    <th>Group</th>
                    <th>Module</th>
                    <th>Submodule</th>
                    <th>Capabilities</th>
                    <th style="width: 100px;">Action</th>
                </tr>
            </thead>
            <tbody id="pmTbody">
                <?php foreach ($defaultModules as $i => $mod): ?>
                <tr data-id="<?= $mod['id'] ?>" data-group="<?= htmlspecialchars($mod['group']) ?>" data-module="<?= htmlspecialchars($mod['module']) ?>" data-name="<?= htmlspecialchars($mod['name']) ?>" data-caps='<?= json_encode($mod['caps']) ?>'>
                    <td><?= $i + 1 ?></td>
                    <td class="pm-group"><span class="fw-semibold text-primary"><?= htmlspecialchars($mod['group']) ?></span></td>
                    <td class="pm-module"><span class="fw-medium"><?= htmlspecialchars($mod['module'] ?: '—') ?></span></td>
                    <td class="pm-name"><?= htmlspecialchars($mod['name']) ?></td>
                    <td class="pm-caps">
                        <?php foreach ($mod['caps'] as $c): ?>
                            <span class="pm-cap-chip"><?= $capLabels[$c] ?? $c ?></span>
                        <?php endforeach; ?>
                    </td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="<?= $mod['id'] ?>" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="<?= $mod['id'] ?>" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<!-- Creation Modal -->
<div class="modal fade" id="creationModal" tabindex="-1" aria-labelledby="creationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="creationModalLabel">Module Creation</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form id="creationForm" onsubmit="return false;">
                    <div class="mb-3">
                        <label class="form-label" for="create_pm_group">Group</label>
                        <input type="text" class="form-control" id="create_pm_group" placeholder="e.g. HR Management" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="create_pm_module">Module</label>
                        <input type="text" class="form-control" id="create_pm_module" placeholder="e.g. Organization" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="create_pm_name">Submodule Name</label>
                        <input type="text" class="form-control" id="create_pm_name" placeholder="e.g. Department Directory" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Capabilities</label>
                        <div class="d-flex flex-wrap gap-3">
                            <label class="ne-check"><input type="checkbox" class="pm-cap" value="view_own"> View(Own)</label>
                            <label class="ne-check"><input type="checkbox" class="pm-cap" value="view_global"> View(Global)</label>
                            <label class="ne-check"><input type="checkbox" class="pm-cap" value="create"> Create</label>
                            <label class="ne-check"><input type="checkbox" class="pm-cap" value="edit"> Edit</label>
                            <label class="ne-check"><input type="checkbox" class="pm-cap" value="delete"> Delete</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnCreateSave">
                    <i class="mdi mdi-content-save me-1"></i> Save
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Module</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form id="editForm" onsubmit="return false;">
                    <input type="hidden" id="edit_pm_id">
                    <div class="mb-3">
                        <label class="form-label" for="edit_pm_group">Group</label>
                        <input type="text" class="form-control" id="edit_pm_group" placeholder="e.g. HR Management" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit_pm_module">Module</label>
                        <input type="text" class="form-control" id="edit_pm_module" placeholder="e.g. Organization" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit_pm_name">Submodule Name</label>
                        <input type="text" class="form-control" id="edit_pm_name" placeholder="e.g. Department Directory" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Capabilities</label>
                        <div class="d-flex flex-wrap gap-3">
                            <label class="ne-check"><input type="checkbox" class="pm-cap-edit" value="view_own"> View(Own)</label>
                            <label class="ne-check"><input type="checkbox" class="pm-cap-edit" value="view_global"> View(Global)</label>
                            <label class="ne-check"><input type="checkbox" class="pm-cap-edit" value="create"> Create</label>
                            <label class="ne-check"><input type="checkbox" class="pm-cap-edit" value="edit"> Edit</label>
                            <label class="ne-check"><input type="checkbox" class="pm-cap-edit" value="delete"> Delete</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnEditSave">
                    <i class="mdi mdi-content-save me-1"></i> Save
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script src="./assets/js/pages/permission-modules.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>
