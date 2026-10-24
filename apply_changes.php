<?php
$filePath = __DIR__ . '/customer-view.php';
$content = file_get_contents($filePath);
// Normalize line endings to \n for consistent replacement
$isCrlf = (strpos($content, "\r\n") !== false);
$content = str_replace("\r\n", "\n", $content);

// 1. Sidebar tab links: replace href="customer-view.php?id=..." with data-bs-toggle="tab"
$targetSidebar = '                    <?php foreach ($keys as $key): $t = $tabs[$key]; ?>
                        <a href="customer-view.php?id=<?= $id ?>&tab=<?= $key ?>" class="<?= $key === $tabKey ? \'active\' : \'\' ?>" <?= $key === $tabKey ? \'aria-current="page"\' : \'\' ?>>
                            <i class="bi <?= $t[1] ?>"></i><?= h($t[0]) ?>
                            <?php if ($t[2]): ?><span class="cv-badge"><?= $t[2] ?></span><?php endif; ?>
                        </a>
                    <?php endforeach; ?>';

$replaceSidebar = '                    <?php foreach ($keys as $key): $t = $tabs[$key]; ?>
                        <a href="javascript:void(0)" class="cv-tab-link <?= $key === $tabKey ? \'active\' : \'\' ?>" data-bs-toggle="tab" data-bs-target="#tab-<?= $key ?>" role="tab" aria-controls="tab-<?= $key ?>" aria-selected="<?= $key === $tabKey ? \'true\' : \'false\' ?>" data-tab-label="<?= h($t[0]) ?>" data-tab-key="<?= $key ?>">
                            <i class="bi <?= $t[1] ?>"></i><?= h($t[0]) ?>
                            <?php if ($t[2]): ?><span class="cv-badge"><?= $t[2] ?></span><?php endif; ?>
                        </a>
                    <?php endforeach; ?>';

if (strpos($content, $targetSidebar) === false) {
    die("Error: Target sidebar not found!\n");
}
$content = str_replace($targetSidebar, $replaceSidebar, $content);

// 2. Add id="cvBreadcrumbTab" to breadcrumb span
$targetBreadcrumb = '<span class="fw-bold text-dark"><?= h($tabLabel) ?></span>';
$replaceBreadcrumb = '<span class="fw-bold text-dark" id="cvBreadcrumbTab"><?= h($tabLabel) ?></span>';
$content = str_replace($targetBreadcrumb, $replaceBreadcrumb, $content);

// 3. Right content opening and Profile tab pane
$targetProfileStart = '        <!-- Right content -->
        <section class="pt-2">
            <div class="cv-title"><?= h($tabLabel) ?></div>

            <?php if ($tabKey === \'profile\'): ?>';

$replaceProfileStart = '        <!-- Right content -->
        <section class="pt-2">
            <div class="tab-content" id="cvTabContent">
                <!-- Profile Tab -->
                <div class="tab-pane fade <?= $tabKey === \'profile\' ? \'show active\' : \'\' ?>" id="tab-profile" role="tabpanel" aria-labelledby="tablink-profile">
                    <div class="cv-title">Profile</div>';

if (strpos($content, $targetProfileStart) === false) {
    die("Error: Target profile start not found!\n");
}
$content = str_replace($targetProfileStart, $replaceProfileStart, $content);

// 4. In Profile tab: make subtabs static buttons
$targetSubtabs = '<div class="cv-subtabs" aria-label="Profile sections">
                        <?php foreach ($subTabs as $k => $lbl):
                            $isFormTab = in_array($k, [\'details\', \'billing\'], true);
                            $cls = \'cv-subtab\' . ($k === $sub ? \' active\' : \'\');
                            if ($formMode && $isFormTab): ?>
                                <button type="button" class="<?= $cls ?>" data-sub="<?= $k ?>"><?= h($lbl) ?></button>
                            <?php else: ?>
                                <a class="<?= $cls ?>" href="customer-view.php?id=<?= $id ?>&tab=profile&sub=<?= $k ?>"><?= h($lbl) ?></a>
                        <?php endif;
                        endforeach; ?>
                    </div>';

$replaceSubtabs = '<div class="cv-subtabs" aria-label="Profile sections">
                        <button type="button" class="cv-subtab active" data-sub="details">Customer Details</button>
                        <button type="button" class="cv-subtab" data-sub="billing">Billing & Shipping</button>
                        <button type="button" class="cv-subtab" data-sub="admins">Customer Admins</button>
                        <button type="button" class="cv-subtab" data-sub="po">Purchase Order</button>
                    </div>';

if (strpos($content, $targetSubtabs) === false) {
    die("Error: Target subtabs not found!\n");
}
$content = str_replace($targetSubtabs, $replaceSubtabs, $content);

// 5. In Profile tab: render all 4 panes (details, billing, admins, po) statically
$targetProfilePanes = '                    <!-- Billing & Shipping -->
                    <div class="cv-pane <?= $sub === \'billing\' ? \'active\' : \'\' ?>" data-pane="billing">
                        <div class="cv-grid-2 cv-bill-grid">
                            <div>
                                <div class="cv-addr-head"><span>Billing Address</span><button type="button" class="cv-textlink" id="cvSameAsInfo">Same as Customer Info</button></div>
                                <div class="cv-field"><label class="form-label cv-required" for="bStreet">Street</label><textarea class="form-control" id="bStreet" rows="4"><?= h($sampleAddress) ?></textarea></div>
                                <div class="cv-field"><label class="form-label" for="bCountry">Country</label>
                                    <select class="form-select cv-select" id="bCountry"><option value="">Non selected</option><?php foreach ($countries as $c): ?><option <?= $c === \'India\' ? \'selected\' : \'\' ?>><?= h($c) ?></option><?php endforeach; ?></select>
                                </div>
                                <div class="cv-field"><label class="form-label" for="bState">State</label>
                                    <select class="form-select cv-select" id="bState"><option value="">Nothing selected</option><?php foreach ($states as $s): ?><option><?= h($s) ?></option><?php endforeach; ?></select>
                                </div>
                                <div class="cv-field"><label class="form-label" for="bCity">City</label>
                                    <select class="form-select cv-select" id="bCity"><option value="">Nothing selected</option><?php foreach ($cities as $c): ?><option <?= $c === \'Chennai\' ? \'selected\' : \'\' ?>><?= h($c) ?></option><?php endforeach; ?></select>
                                </div>
                                <div class="cv-field mb-0"><label class="form-label" for="bZip">Zip Code</label><input class="form-control" id="bZip" value="600006"></div>
                            </div>
                            <div>
                                <div class="cv-addr-head"><span><i class="bi bi-question-circle me-1"></i>Shipping Address</span><button type="button" class="cv-textlink" id="cvCopyBilling">Copy Billing Address</button></div>
                                <div class="cv-field"><label class="form-label cv-required" for="sStreet">Street</label><textarea class="form-control" id="sStreet" rows="4"></textarea></div>
                                <div class="cv-field"><label class="form-label" for="sCountry">Country</label>
                                    <select class="form-select cv-select" id="sCountry"><option value="">Non selected</option><?php foreach ($countries as $c): ?><option><?= h($c) ?></option><?php endforeach; ?></select>
                                </div>
                                <div class="cv-field"><label class="form-label" for="sState">State</label>
                                    <select class="form-select cv-select" id="sState"><option value="">Nothing selected</option><?php foreach ($states as $s): ?><option><?= h($s) ?></option><?php endforeach; ?></select>
                                </div>
                                <div class="cv-field"><label class="form-label" for="sCity">City</label>
                                    <select class="form-select cv-select" id="sCity"><option value="">Nothing selected</option><?php foreach ($cities as $c): ?><option><?= h($c) ?></option><?php endforeach; ?></select>
                                </div>
                                <div class="cv-field mb-0"><label class="form-label" for="sZip">Zip Code</label><input class="form-control" id="sZip"></div>
                            </div>
                        </div>
                    </div>

                    <?php else:
                        $isAdmins = $sub === \'admins\';
                        $tblHeaders = $isAdmins ? [\'Staff Member\', \'Date Assigned\', \'Options\'] : [\'Purchase order\', \'PO Value\', \'Tax Value\', \'PO Value Including Tax\', \'Order date\'];
                    ?>
                        <!-- Same table flow as every other tab (tabel.js: #pgBody, #showEntries, #pgList, Columns, Export) -->
                        <div class="cv-pane active">
                            <?php if ($isAdmins): ?>
                                <button type="button" class="btn btn-primary mb-3" id="cvAssignAdminBtn">Assign Admin</button>
                            <?php endif; ?>

                            <div class="js-report-table cv-report" data-export-name="<?= $isAdmins ? \'customer-admins\' : \'purchase-orders\' ?>">

                                <div class="table-responsive table-modern-wrap overflow-auto column-border">
                                    <table class="table-modern w-100 datatable" data-table-name="<?= $isAdmins ? \'Customer Admins\' : \'Purchase Orders\' ?>">
                                        <thead>
                                            <tr><?php foreach ($tblHeaders as $hd): ?><th><?= h($hd) ?></th><?php endforeach; ?></tr>
                                        </thead>
                                        <tbody id="pgBody">
                                            <?php if ($isAdmins): ?>
                                                <tr>
                                                    <td><span class="d-inline-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="cv-avatar" alt=""><span>Karthik R</span></span></td>
                                                    <td>16-09-2026 11:53</td>
                                                    <td><button type="button" class="btn btn-sm danger cv-icon-btn" title="Remove admin"><i class="mdi mdi-delete"></i></button></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="d-inline-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="cv-avatar" alt=""><span>Divya M</span></span></td>
                                                    <td>16-09-2026 11:53</td>
                                                    <td><button type="button" class="btn btn-sm danger cv-icon-btn" title="Remove admin"><i class="mdi mdi-delete"></i></button></td>
                                                </tr>
                                            <?php else: ?>
                                                <tr>
                                                    <td><a href="#" class="cv-link">PO-2026-001</a></td>
                                                    <td>₹ 45,000</td>
                                                    <td>₹ 8,100</td>
                                                    <td>₹ 53,100</td>
                                                    <td>16-09-2026</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#" class="cv-link">PO-2026-002</a></td>
                                                    <td>₹ 32,000</td>
                                                    <td>₹ 5,760</td>
                                                    <td>₹ 37,760</td>
                                                    <td>05-09-2026</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                        </div>
                    <?php endif; ?>

                    <?php if ($formMode || $sub === \'po\'): ?>
                        <div class="cv-form-foot" id="cvFormFoot"><button type="button" class="btn btn-primary" id="cvSubmit">Submit</button></div>
                    <?php endif; ?>
                </div>

                <?php if ($sub === \'admins\'): ?>
                    <!-- Assign Admin modal (same modal pattern as Leave Report) -->
                    <div class="leave-reject-modal" id="cvAssignModal" role="dialog" aria-modal="true" aria-labelledby="cvAssignTitle">
                        <div class="leave-reject-dialog">
                            <div class="leave-reject-head">
                                <h3 id="cvAssignTitle">Assign Admin</h3><button type="button" class="modal-close" id="cvAssignClose" aria-label="Close">&times;</button>
                            </div>
                            <div class="leave-reject-body">
                                <select class="form-select" id="cvAssignSelect" aria-label="Staff member">
                                    <option value="">Non selected</option>
                                    <?php foreach ($staffList as $s): ?><option><?= h($s) ?></option><?php endforeach; ?>
                                </select>
                                <div class="text-danger small mt-2" id="cvAssignError" hidden>Select a staff member.</div>
                            </div>
                            <div class="leave-reject-foot pt-3"><button type="button" class="btn btn-reject" id="cvAssignCancel">Close</button><button type="button" class="btn btn-primary" id="cvAssignSubmit">Submit</button></div>
                        </div>
                    </div>
                <?php endif; ?>';

$replaceProfilePanes = '                    <!-- Billing & Shipping -->
                    <div class="cv-pane" data-pane="billing">
                        <div class="cv-grid-2 cv-bill-grid">
                            <div>
                                <div class="cv-addr-head"><span>Billing Address</span><button type="button" class="cv-textlink" id="cvSameAsInfo">Same as Customer Info</button></div>
                                <div class="cv-field"><label class="form-label cv-required" for="bStreet">Street</label><textarea class="form-control" id="bStreet" rows="4"><?= h($sampleAddress) ?></textarea></div>
                                <div class="cv-field"><label class="form-label" for="bCountry">Country</label>
                                    <select class="form-select cv-select" id="bCountry"><option value="">Non selected</option><?php foreach ($countries as $c): ?><option <?= $c === \'India\' ? \'selected\' : \'\' ?>><?= h($c) ?></option><?php endforeach; ?></select>
                                </div>
                                <div class="cv-field"><label class="form-label" for="bState">State</label>
                                    <select class="form-select cv-select" id="bState"><option value="">Nothing selected</option><?php foreach ($states as $s): ?><option><?= h($s) ?></option><?php endforeach; ?></select>
                                </div>
                                <div class="cv-field"><label class="form-label" for="bCity">City</label>
                                    <select class="form-select cv-select" id="bCity"><option value="">Nothing selected</option><?php foreach ($cities as $c): ?><option <?= $c === \'Chennai\' ? \'selected\' : \'\' ?>><?= h($c) ?></option><?php endforeach; ?></select>
                                </div>
                                <div class="cv-field mb-0"><label class="form-label" for="bZip">Zip Code</label><input class="form-control" id="bZip" value="600006"></div>
                            </div>
                            <div>
                                <div class="cv-addr-head"><span><i class="bi bi-question-circle me-1"></i>Shipping Address</span><button type="button" class="cv-textlink" id="cvCopyBilling">Copy Billing Address</button></div>
                                <div class="cv-field"><label class="form-label cv-required" for="sStreet">Street</label><textarea class="form-control" id="sStreet" rows="4"></textarea></div>
                                <div class="cv-field"><label class="form-label" for="sCountry">Country</label>
                                    <select class="form-select cv-select" id="sCountry"><option value="">Non selected</option><?php foreach ($countries as $c): ?><option><?= h($c) ?></option><?php endforeach; ?></select>
                                </div>
                                <div class="cv-field"><label class="form-label" for="sState">State</label>
                                    <select class="form-select cv-select" id="sState"><option value="">Nothing selected</option><?php foreach ($states as $s): ?><option><?= h($s) ?></option><?php endforeach; ?></select>
                                </div>
                                <div class="cv-field"><label class="form-label" for="sCity">City</label>
                                    <select class="form-select cv-select" id="sCity"><option value="">Nothing selected</option><?php foreach ($cities as $c): ?><option><?= h($c) ?></option><?php endforeach; ?></select>
                                </div>
                                <div class="cv-field mb-0"><label class="form-label" for="sZip">Zip Code</label><input class="form-control" id="sZip"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Admins -->
                    <div class="cv-pane" data-pane="admins">
                        <button type="button" class="btn btn-primary mb-3" id="cvAssignAdminBtn">Assign Admin</button>
                        <div class="js-report-table cv-report" data-export-name="customer-admins">
                            <div class="table-responsive table-modern-wrap overflow-auto column-border">
                                <table class="table-modern w-100 datatable" data-table-name="Customer Admins">
                                    <thead>
                                        <tr><th>Staff Member</th><th>Date Assigned</th><th>Options</th></tr>
                                    </thead>
                                    <tbody id="adminTableBody">
                                        <tr>
                                            <td><span class="d-inline-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="cv-avatar" alt=""><span>Karthik R</span></span></td>
                                            <td>16-09-2026 11:53</td>
                                            <td><button type="button" class="btn btn-sm danger cv-icon-btn" title="Remove admin"><i class="mdi mdi-delete"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td><span class="d-inline-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="cv-avatar" alt=""><span>Divya M</span></span></td>
                                            <td>16-09-2026 11:53</td>
                                            <td><button type="button" class="btn btn-sm danger cv-icon-btn" title="Remove admin"><i class="mdi mdi-delete"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Purchase Orders -->
                    <div class="cv-pane" data-pane="po">
                        <div class="js-report-table cv-report" data-export-name="purchase-orders">
                            <div class="table-responsive table-modern-wrap overflow-auto column-border">
                                <table class="table-modern w-100 datatable" data-table-name="Purchase Orders">
                                    <thead>
                                        <tr><th>Purchase order</th><th>PO Value</th><th>Tax Value</th><th>PO Value Including Tax</th><th>Order date</th></tr>
                                    </thead>
                                    <tbody id="poTableBody">
                                        <tr>
                                            <td><a href="#" class="cv-link">PO-2026-001</a></td>
                                            <td>₹ 45,000</td>
                                            <td>₹ 8,100</td>
                                            <td>₹ 53,100</td>
                                            <td>16-09-2026</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="cv-link">PO-2026-002</a></td>
                                            <td>₹ 32,000</td>
                                            <td>₹ 5,760</td>
                                            <td>₹ 37,760</td>
                                            <td>05-09-2026</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="cv-form-foot" id="cvFormFoot"><button type="button" class="btn btn-primary" id="cvSubmit">Submit</button></div>
                </div>

                <!-- Assign Admin modal -->
                <div class="leave-reject-modal" id="cvAssignModal" role="dialog" aria-modal="true" aria-labelledby="cvAssignTitle">
                    <div class="leave-reject-dialog">
                        <div class="leave-reject-head">
                            <h3 id="cvAssignTitle">Assign Admin</h3><button type="button" class="modal-close" id="cvAssignClose" aria-label="Close">&times;</button>
                        </div>
                        <div class="leave-reject-body">
                            <select class="form-select" id="cvAssignSelect" aria-label="Staff member">
                                <option value="">Non selected</option>
                                <?php foreach ($staffList as $s): ?><option><?= h($s) ?></option><?php endforeach; ?>
                            </select>
                            <div class="text-danger small mt-2" id="cvAssignError" hidden>Select a staff member.</div>
                        </div>
                        <div class="leave-reject-foot pt-3"><button type="button" class="btn btn-reject" id="cvAssignCancel">Close</button><button type="button" class="btn btn-primary" id="cvAssignSubmit">Submit</button></div>
                    </div>
                </div>
            </div><!-- /#tab-profile -->';

if (strpos($content, $targetProfilePanes) === false) {
    die("Error: Target profile panes not found!\n");
}
$content = str_replace($targetProfilePanes, $replaceProfilePanes, $content);

// 6. Convert custom tab elseif blocks to tab panes
$transitions = [
    '<?php elseif ($tabKey === \'shipping\'): ?>' => '<!-- Shipping Address Tab -->
                <div class="tab-pane fade <?= $tabKey === \'shipping\' ? \'show active\' : \'\' ?>" id="tab-shipping" role="tabpanel" aria-labelledby="tablink-shipping">
                    <div class="cv-title">View Shipping Address</div>',

    '<?php elseif ($tabKey === \'invoices\'): ?>' => '</div><!-- /#tab-shipping -->

                <!-- Invoices Tab -->
                <div class="tab-pane fade <?= $tabKey === \'invoices\' ? \'show active\' : \'\' ?>" id="tab-invoices" role="tabpanel" aria-labelledby="tablink-invoices">
                    <div class="cv-title">Invoices</div>',

    '<?php elseif ($tabKey === \'statement\'): ?>' => '</div><!-- /#tab-invoices -->

                <!-- Statement Tab -->
                <div class="tab-pane fade <?= $tabKey === \'statement\' ? \'show active\' : \'\' ?>" id="tab-statement" role="tabpanel" aria-labelledby="tablink-statement">
                    <div class="cv-title">Statement</div>',

    '<?php elseif ($tabKey === \'map\'): ?>' => '</div><!-- /#tab-statement -->

                <!-- Map Tab -->
                <div class="tab-pane fade <?= $tabKey === \'map\' ? \'show active\' : \'\' ?>" id="tab-map" role="tabpanel" aria-labelledby="tablink-map">
                    <div class="cv-title">Map</div>',

    '<?php elseif ($tabKey === \'credit_notes\'): ?>' => '</div><!-- /#tab-map -->

                <!-- Credit Notes Tab -->
                <div class="tab-pane fade <?= $tabKey === \'credit_notes\' ? \'show active\' : \'\' ?>" id="tab-credit_notes" role="tabpanel" aria-labelledby="tablink-credit_notes">
                    <div class="cv-title">Credit Notes</div>',

    '<?php elseif ($tabKey === \'estimates\'): ?>' => '</div><!-- /#tab-credit_notes -->

                <!-- Estimates Tab -->
                <div class="tab-pane fade <?= $tabKey === \'estimates\' ? \'show active\' : \'\' ?>" id="tab-estimates" role="tabpanel" aria-labelledby="tablink-estimates">
                    <div class="cv-title">Estimates</div>',

    '<?php elseif ($tabKey === \'purchase_orders\'): ?>' => '</div><!-- /#tab-estimates -->

                <!-- Purchase Orders Tab -->
                <div class="tab-pane fade <?= $tabKey === \'purchase_orders\' ? \'show active\' : \'\' ?>" id="tab-purchase_orders" role="tabpanel" aria-labelledby="tablink-purchase_orders">
                    <div class="cv-title">Purchase Orders</div>',

    '<?php elseif ($tabKey === \'subscriptions\'): ?>' => '</div><!-- /#tab-purchase_orders -->

                <!-- Subscriptions Tab -->
                <div class="tab-pane fade <?= $tabKey === \'subscriptions\' ? \'show active\' : \'\' ?>" id="tab-subscriptions" role="tabpanel" aria-labelledby="tablink-subscriptions">
                    <div class="cv-title">Subscriptions</div>',

    '<?php elseif ($tabKey === \'projects\'): ?>' => '</div><!-- /#tab-subscriptions -->

                <!-- Projects Tab -->
                <div class="tab-pane fade <?= $tabKey === \'projects\' ? \'show active\' : \'\' ?>" id="tab-projects" role="tabpanel" aria-labelledby="tablink-projects">
                    <div class="cv-title">Projects</div>',

    '<?php elseif ($tabKey === \'tasks\'): ?>' => '</div><!-- /#tab-projects -->

                <!-- Tasks Tab -->
                <div class="tab-pane fade <?= $tabKey === \'tasks\' ? \'show active\' : \'\' ?>" id="tab-tasks" role="tabpanel" aria-labelledby="tablink-tasks">
                    <div class="cv-title">Tasks</div>',

    '<?php elseif ($tabKey === \'tickets\'): ?>' => '</div><!-- /#tab-tasks -->

                <!-- Tickets Tab -->
                <div class="tab-pane fade <?= $tabKey === \'tickets\' ? \'show active\' : \'\' ?>" id="tab-tickets" role="tabpanel" aria-labelledby="tablink-tickets">
                    <div class="cv-title">Support Tickets</div>',

    '<?php elseif ($tabKey === \'files\'): ?>' => '</div><!-- /#tab-tickets -->

                <!-- Files Tab -->
                <div class="tab-pane fade <?= $tabKey === \'files\' ? \'show active\' : \'\' ?>" id="tab-files" role="tabpanel" aria-labelledby="tablink-files">
                    <div class="cv-title">Files</div>',

    '<?php elseif ($tabKey === \'expenses\'): ?>' => '</div><!-- /#tab-files -->

                <!-- Expenses Tab -->
                <div class="tab-pane fade <?= $tabKey === \'expenses\' ? \'show active\' : \'\' ?>" id="tab-expenses" role="tabpanel" aria-labelledby="tablink-expenses">
                    <div class="cv-title">Expenses</div>',

    '<?php elseif ($tabKey === \'contracts\'): ?>' => '</div><!-- /#tab-expenses -->

                <!-- Contracts Tab -->
                <div class="tab-pane fade <?= $tabKey === \'contracts\' ? \'show active\' : \'\' ?>" id="tab-contracts" role="tabpanel" aria-labelledby="tablink-contracts">
                    <div class="cv-title">Contracts</div>',

    '<?php elseif ($tabKey === \'payments\'): ?>' => '</div><!-- /#tab-contracts -->

                <!-- Payments Tab -->
                <div class="tab-pane fade <?= $tabKey === \'payments\' ? \'show active\' : \'\' ?>" id="tab-payments" role="tabpanel" aria-labelledby="tablink-payments">
                    <div class="cv-title">Payments</div>',

    '<?php elseif ($tabKey === \'email_log\'): ?>' => '</div><!-- /#tab-payments -->

                <!-- Email Log Tab -->
                <div class="tab-pane fade <?= $tabKey === \'email_log\' ? \'show active\' : \'\' ?>" id="tab-email_log" role="tabpanel" aria-labelledby="tablink-email_log">
                    <div class="cv-title">Email Log</div>',

    '<?php elseif ($tabKey === \'activity_log\'): ?>' => '</div><!-- /#tab-email_log -->

                <!-- Activity Log Tab -->
                <div class="tab-pane fade <?= $tabKey === \'activity_log\' ? \'show active\' : \'\' ?>" id="tab-activity_log" role="tabpanel" aria-labelledby="tablink-activity_log">
                    <div class="cv-title">Activity Log</div>',
];

foreach ($transitions as $from => $to) {
    if (strpos($content, $from) === false) {
        die("Error: Transition '$from' not found!\n");
    }
    $content = str_replace($from, $to, $content);
}

// 7. Replace the else block (lines 8522-8561) with generic tab panes
$targetElseBlock = '            <?php else: ?>
                <!-- Table tab: same markup that tabel.js drives on Leave Report -->
                <div class="card-custom js-report-table p-0" data-export-name="<?= h($tabKey) ?>">
                    <?php if ($newLabel): ?>
                        <div class="p-3 pb-0"><button type="button" class="btn btn-primary <?= in_array($tabKey, [\'contacts\', \'notes\', \'proposals\', \'vault\', \'reminders\', \'call_logs\', \'appointments\']) ? \'\' : \'js-new-dummy\' ?>" <?= $tabKey === \'contacts\' ? \'id="cvNewContactBtn"\' : ($tabKey === \'notes\' ? \'id="cvNewNoteBtn\' : ($tabKey === \'proposals\' ? \'id="cvNewProposalBtn"\' : ($tabKey === \'vault\' ? \'id="cvNewVaultBtn"\' : ($tabKey === \'reminders\' ? \'id="cvNewReminderBtn"\' : ($tabKey === \'call_logs\' ? \'id="cvNewCallLogBtn" data-bs-toggle="modal" data-bs-target="#cvNewCallLogModal"\' : ($tabKey === \'appointments\' ? \'id="cvNewApptBtn" data-bs-toggle="modal" data-bs-target="#apmContactModal"\' : \'\')))))) ?>><i class="bi bi-plus-lg me-1"></i><?= h($newLabel) ?></button></div>
                    <?php endif; ?>

                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" data-table-name="<?= h($tabLabel) ?>">
                            <thead>
                                <tr><?php foreach ($headers as $hd): ?><th><?= h($hd) ?></th><?php endforeach; ?></tr>
                            </thead>
                            <tbody id="pgBody">
                                <?php foreach ($tabRows as $row): ?>
                                    <tr class="cv-row">
                                        <?php foreach ($row as $i => $cell):
                                            $hd = $headers[$i];
                                        ?>
                                            <td>
                                                <?php if ($hd === \'Full Name\'): ?>
                                                    <span class="d-inline-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="cv-avatar" alt=""><a href="#" class="cv-link"><?= h($cell) ?></a></span>
                                                <?php elseif ($hd === \'Email\'): ?>
                                                    <a href="mailto:<?= h($cell) ?>" class="cv-link"><?= h($cell) ?></a>
                                                <?php elseif ($hd === \'Phone\' && $cell): ?>
                                                    <a href="tel:<?= h($cell) ?>" class="cv-link"><?= h($cell) ?></a>
                                                <?php elseif ($hd === \'Active\'): ?>
                                                    <label class="cust-switch"><input type="checkbox" <?= $cell ? \'checked\' : \'\' ?> aria-label="Active"><span class="slider"></span></label>
                                                <?php elseif ($hd === \'Status\'): ?>
                                                    <?= pill($cell) ?>
                                                <?php else: ?>
                                                    <?= h($cell) ?>
                                                <?php endif; ?>
                                            </td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
            <?php endif; ?>';

// Let's do regex or fuzzy match on else block to avoid whitespace mismatches
$elsePattern = '/<\?php else: \?>.*?<!-- Table tab: same markup that tabel\.js drives on Leave Report -->.*?<\?php endif; \?>/s';
if (!preg_match($elsePattern, $content)) {
    die("Error: Target else block pattern not found!\n");
}

$replaceElseBlock = '</div><!-- /#tab-activity_log -->

                <!-- Generic Tabs: Contacts, Notes, Proposals, Vault, Reminders, Call Logs, Appointments -->
                <?php 
                $genericTabKeys = [\'contacts\', \'notes\', \'proposals\', \'vault\', \'reminders\', \'call_logs\', \'appointments\'];
                foreach ($genericTabKeys as $gKey): 
                    $gData = $tabs[$gKey];
                    $gLabel = $gData[0];
                    $gNew = $gData[3];
                    $gHeaders = $gData[4];
                    $gRows = $gData[5];
                    $gActive = ($tabKey === $gKey);
                ?>
                <div class="tab-pane fade <?= $gActive ? \'show active\' : \'\' ?>" id="tab-<?= $gKey ?>" role="tabpanel" aria-labelledby="tablink-<?= $gKey ?>">
                    <div class="cv-title"><?= h($gLabel) ?></div>
                    <div class="card-custom js-report-table p-0" data-export-name="<?= h($gKey) ?>">
                        <?php if ($gNew): ?>
                            <div class="p-3 pb-0">
                                <button type="button" class="btn btn-primary" <?= $gKey === \'contacts\' ? \'id="cvNewContactBtn"\' : ($gKey === \'notes\' ? \'id="cvNewNoteBtn"\' : ($gKey === \'proposals\' ? \'id="cvNewProposalBtn"\' : ($gKey === \'vault\' ? \'id="cvNewVaultBtn"\' : ($gKey === \'reminders\' ? \'id="cvNewReminderBtn"\' : ($gKey === \'call_logs\' ? \'id="cvNewCallLogBtn" data-bs-toggle="modal" data-bs-target="#cvNewCallLogModal"\' : ($gKey === \'appointments\' ? \'id="cvNewApptBtn" data-bs-toggle="modal" data-bs-target="#apmContactModal"\' : \'\')))))) ?>><i class="bi bi-plus-lg me-1"></i><?= h($gNew) ?></button>
                            </div>
                        <?php endif; ?>

                        <div class="table-responsive table-modern-wrap overflow-auto column-border">
                            <table class="table-modern w-100 datatable" data-table-name="<?= h($gLabel) ?>">
                                <thead>
                                    <tr><?php foreach ($gHeaders as $hd): ?><th><?= h($hd) ?></th><?php endforeach; ?></tr>
                                </thead>
                                <tbody id="<?= $gKey ?>TableBody">
                                    <?php foreach ($gRows as $row): ?>
                                        <tr class="cv-row">
                                            <?php foreach ($row as $i => $cell):
                                                $hd = $gHeaders[$i];
                                            ?>
                                                <td>
                                                    <?php if ($hd === \'Full Name\'): ?>
                                                        <span class="d-inline-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="cv-avatar" alt=""><a href="#" class="cv-link"><?= h($cell) ?></a></span>
                                                    <?php elseif ($hd === \'Email\'): ?>
                                                        <a href="mailto:<?= h($cell) ?>" class="cv-link"><?= h($cell) ?></a>
                                                    <?php elseif ($hd === \'Phone\' && $cell): ?>
                                                        <a href="tel:<?= h($cell) ?>" class="cv-link"><?= h($cell) ?></a>
                                                    <?php elseif ($hd === \'Active\'): ?>
                                                        <label class="cust-switch"><input type="checkbox" <?= $cell ? \'checked\' : \'\' ?> aria-label="Active"><span class="slider"></span></label>
                                                    <?php elseif ($hd === \'Status\'): ?>
                                                        <?= pill($cell) ?>
                                                    <?php elseif ($hd === \'Proposal #\'): ?>
                                                        <a href="#" class="cv-link"><?= h($cell) ?></a>
                                                    <?php else: ?>
                                                        <?= h($cell) ?>
                                                    <?php endif; ?>
                                                </td>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div><!-- /#cvTabContent -->';

$content = preg_replace($elsePattern, $replaceElseBlock, $content, 1);

// 8. Remove modal conditionals (contacts, notes, vault, reminders, appointments, call_logs, proposals)
$modalConditions = [
    "<?php if (\$tabKey === 'contacts'): ?>" => "<!-- Contacts Modal -->",
    "<?php if (\$tabKey === 'notes'): ?>" => "<!-- Notes Modal -->",
    "<?php if (\$tabKey === 'vault'): ?>" => "<!-- Vault Modal -->",
    "<?php if (\$tabKey === 'reminders'): ?>" => "<!-- Reminders Modal -->",
    "<?php if (\$tabKey === 'appointments'): ?>" => "<!-- Appointments Modal -->",
    "<?php if (\$tabKey === 'call_logs'): ?>" => "<!-- Call Logs Modal -->",
    "<?php if (\$tabKey === 'proposals'): ?>" => "<!-- Proposals Modal -->",
];
foreach ($modalConditions as $from => $to) {
    $content = str_replace($from, $to, $content);
}

// Remove closing endif tags for those modals before </main>
$content = preg_replace('/(<\/div>\s*<\/div>\s*)<\?php endif; \?>(\s*<!-- (?:Notes|Vault|Reminders|Appointments|Call Logs) Modal -->)/s', '$1$2', $content);
$content = preg_replace('/(<\/div>\s*<\/div>\s*<\/div>\s*)<\?php endif; \?>(\s*<\/main>)/s', '$1$2', $content);
$content = preg_replace('/(<\/script>\s*)<\?php endif; \?>(\s*<script>\s*document\.querySelectorAll\("\.js-new-dummy"\))/s', '$1$2', $content);

// 9. Remove conditionals on scripts after footer.php
$scriptConditions = [
    "<?php if (\$tabKey === 'statement'): ?>" => "<!-- Statement Script -->",
    "<?php if (\$tabKey === 'invoices'): ?>" => "<!-- Invoices Script -->",
    "<?php if (\$tabKey === 'profile' && \$formMode): ?>" => "<!-- Profile Form Script -->",
    "<?php if (\$tabKey === 'profile' && !\$formMode): ?>" => "<!-- Profile Admins Script -->",
    "<?php if (\$tabKey === 'contacts'): ?>" => "<!-- Contacts Script -->",
    "<?php if (\$tabKey === 'notes'): ?>" => "<!-- Notes Script -->",
    "<?php if (\$tabKey === 'vault'): ?>" => "<!-- Vault Script -->",
    "<?php if (\$tabKey === 'reminders'): ?>" => "<!-- Reminders Script -->",
    "<?php if (\$tabKey === 'appointments'): ?>" => "<!-- Appointments Script -->",
    "<?php if (\$tabKey === 'call_logs'): ?>" => "<!-- Call Logs Script -->",
    "<?php if (\$tabKey === 'shipping'): ?>" => "<!-- Shipping Script -->",
];
foreach ($scriptConditions as $from => $to) {
    $content = str_replace($from, $to, $content);
}

// Remove trailing <?php endif; ?> after </script> blocks after footer.php
$content = preg_replace('/(<\/script>\s*)<\?php endif; \?>/s', '$1', $content);

// 10. Update table body targets for notes, contacts, vault, reminders, appointments, call_logs, shipping
$tbodyUpdates = [
    "body = document.getElementById('pgBody');\n        if (!modal || !openBtn || !body) return;\n\n        function $(id) {\n            return document.getElementById(id);\n        }\n\n        function toastMsg(msg, ok) {\n            var t = document.createElement('div');\n            t.className = 'cv-toast';\n            t.innerHTML = '<i class=\"bi ' + (ok === false ? 'bi-exclamation-circle-fill' : 'bi-check-circle-fill') + '\"></i> ' + msg;\n            document.body.appendChild(t);\n            setTimeout(function() {\n                t.classList.add('show');\n            }, 10);\n            setTimeout(function() {\n                t.classList.remove('show');\n            }, 350);\n        }\n\n        function openModal() {\n            $('cvNoteDesc').value = '';" 
    => "body = document.querySelector('#tab-notes tbody') || document.getElementById('notesTableBody');\n        if (!modal || !openBtn || !body) return;\n\n        function $(id) {\n            return document.getElementById(id);\n        }\n\n        function toastMsg(msg, ok) {\n            var t = document.createElement('div');\n            t.className = 'cv-toast';\n            t.innerHTML = '<i class=\"bi ' + (ok === false ? 'bi-exclamation-circle-fill' : 'bi-check-circle-fill') + '\"></i> ' + msg;\n            document.body.appendChild(t);\n            setTimeout(function() {\n                t.classList.add('show');\n            }, 10);\n            setTimeout(function() {\n                t.classList.remove('show');\n            }, 350);\n        }\n\n        function openModal() {\n            $('cvNoteDesc').value = '';",
    
    "link = document.querySelector('.cv-side a[href*=\"tab=notes\"]');" => "link = document.querySelector('.cv-side a[data-bs-target=\"#tab-notes\"]');",
];
foreach ($tbodyUpdates as $from => $to) {
    if (strpos($content, $from) !== false) {
        $content = str_replace($from, $to, $content);
    }
}

// 11. Add client-side tab switching script before closing body/at end
$tabSwitchingScript = '
<script>
document.addEventListener("DOMContentLoaded", function() {
    var tabLinks = document.querySelectorAll(".cv-side a[data-bs-toggle=\"tab\"]");
    var breadcrumbTab = document.getElementById("cvBreadcrumbTab");
    
    tabLinks.forEach(function(link) {
        link.addEventListener("click", function(e) {
            e.preventDefault(); // Do not alter the URL or reload!
            var tabLabel = this.getAttribute("data-tab-label");
            if (breadcrumbTab && tabLabel) {
                breadcrumbTab.textContent = tabLabel;
            }
        });

        link.addEventListener("shown.bs.tab", function() {
            var targetSelector = this.getAttribute("data-bs-target") || this.getAttribute("href");
            var pane = document.querySelector(targetSelector);
            if (pane) {
                var tables = pane.querySelectorAll("table.datatable, table.data-table, table.table-modern");
                tables.forEach(function(table) {
                    if (table.autoTable && typeof table.autoTable.refresh === "function") {
                        table.autoTable.refresh();
                    } else if (window.AutoMasterTable) {
                        window.AutoMasterTable.init(table);
                    }
                });
            }
        });
    });

    // Profile sub-tabs switching (Details, Billing, Admins, PO)
    var profileSubtabs = document.querySelectorAll(".cv-subtabs .cv-subtab");
    var profilePanes = document.querySelectorAll("#cvProfile .cv-pane");
    profileSubtabs.forEach(function(btn) {
        btn.addEventListener("click", function() {
            var sub = this.getAttribute("data-sub");
            profileSubtabs.forEach(function(b) { b.classList.remove("active"); });
            this.classList.add("active");
            profilePanes.forEach(function(p) {
                if (p.getAttribute("data-pane") === sub) {
                    p.classList.add("active");
                    var tbl = p.querySelector("table.datatable");
                    if (tbl && tbl.autoTable) tbl.autoTable.refresh();
                } else {
                    p.classList.remove("active");
                }
            });
        });
    });
});
</script>
';
$content .= $tabSwitchingScript;

// Restore CRLF if needed
if ($isCrlf) {
    $content = str_replace("\n", "\r\n", $content);
}

file_put_contents($filePath, $content);
echo "Successfully applied changes to customer-view.php!\n";
