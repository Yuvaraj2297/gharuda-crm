<?php
/**
 * Centralised navigation configuration for Gharuda CRM.
 *
 * Each entry is an associative array with the following keys:
 *   - label   : Text shown in the UI
 *   - icon    : (optional) Bootstrap‑Icons class for the entry
 *   - url     : Target URL or a collapse anchor (e.g. "#leadsSubmenu")
 *   - visible : (optional) bool or callback to control visibility/permissions
 *   - children: (optional) array of sub‑menu items with the same structure
 */
return [
    [
        "label"   => "Dashboard",
        "icon"    => "bi bi-house",
        "url"     => "dashboard.php",
    ],
    [
        "label"   => "Leads",
        "icon"    => "bi bi-people",
        "url"     => "#leadsSubmenu",
        "children"=> [
            ["label" => "All Leads",               "url" => "lead.php"],
            ["label" => "Lead Dashboard",          "url" => "lead-dashboard.php"],
            ["label" => "Lead Sources",            "url" => "lead-source-report.php"],
            ["label" => "Lead Map",                "url" => "lead-map.php"],
            ["label" => "Lead Filter",             "url" => "lead-filter.php"],
            ["label" => "Lead Reports",            "url" => "lead-report.php"],
        ],
    ],
    [
        "label"   => "Deals",
        "icon"    => "bi bi-briefcase",
        "url"     => "#dealsSubmenu",
        "children"=> [
            ["label" => "All Deals",               "url" => "deals.php"],
            ["label" => "Quotations",              "url" => "quotations.php"],
            ["label" => "Create Quotation",        "url" => "quotation-create.php"],
            ["label" => "Sales Orders",            "url" => "sales-orders.php"],
            ["label" => "Create Sales Order",      "url" => "sales-order-create.php"],
        ],
    ],
    [
        "label"   => "Projects",
        "icon"    => "bi bi-kanban",
        "url"     => "#projectsSubmenu",
        "children"=> [
            ["label" => "Project List",            "url" => "projects-list.php"],
            ["label" => "Create Project",          "url" => "project-create.php"],
            ["label" => "Project Dashboard",       "url" => "project-dashboard.php"],
            ["label" => "Project Types",           "url" => "project-types-master.php"],
            ["label" => "Project Reports",         "url" => "projects-report.php"],
            ["label" => "Daily Task Report",       "url" => "projectwise-daily-task-report.php"],
        ],
    ],
    [
        "label"   => "Appointments",
        "icon"    => "bi bi-calendar-event",
        "url"     => "appointments.php",
    ],
    [
        "label"   => "Support",
        "icon"    => "bi bi-life-preserver",
        "url"     => "#supportSubmenu",
        "children"=> [
            ["label" => "Create Ticket",           "url" => "support-create-ticket.php"],
            ["label" => "Ticket List",             "url" => "support-tickets.php"],
        ],
    ],
    [
        "label"   => "Inventory",
        "icon"    => "bi bi-box-seam",
        "url"     => "inventory.php",
    ],
    [
        "label"   => "Finance",
        "icon"    => "bi bi-currency-dollar",
        "url"     => "#financeSubmenu",
        "children"=> [
            ["label" => "Invoices",                "url" => "invoices.php"],
            ["label" => "Create Invoice",          "url" => "invoice-create.php"],
            ["label" => "Payments",                "url" => "payments.php"],
            ["label" => "Purchase Orders",         "url" => "purchase-orders.php"],
            ["label" => "Create Purchase Order",   "url" => "purchase-order-create.php"],
        ],
    ],
    [
        "label"   => "CRM Settings",
        "icon"    => "bi bi-gear",
        "url"     => "settings.php",
    ],
    [
        "label"   => "Geography",
        "icon"    => "bi bi-globe",
        "url"     => "#geoSubmenu",
        "children"=> [
            ["label" => "Country",                 "url" => "country.php"],
            ["label" => "State",                   "url" => "state.php"],
            ["label" => "District",                "url" => "district.php"],
            ["label" => "Currency Master",         "url" => "currency-master.php"],
            ["label" => "Brand Master",            "url" => "brand-master.php"],
            ["label" => "Brand Target",            "url" => "brand-target.php"],
        ],
    ],
    [
        "label"   => "Reports",
        "icon"    => "bi bi-bar-chart",
        "url"     => "#reportsSubmenu",
        "children"=> [
            ["label" => "Summary Report",          "url" => "summary-report.php"],
            ["label" => "Employee Lead Report",    "url" => "employee-lead-report.php"],
            ["label" => "Employee Revenue Report", "url" => "employee-revenue-report.php"],
            ["label" => "Ticket Reports",          "url" => "ticket-reports.php"],
            ["label" => "Task Reports",            "url" => "task-overview.php"],
        ],
    ],
    [
        "label"   => "Admin",
        "icon"    => "bi bi-shield-lock",
        "url"     => "#adminSubmenu",
        "children"=> [
            ["label" => "Roles",                   "url" => "role.php"],
            ["label" => "Staff",                   "url" => "staff.php"],
            ["label" => "Vendors",                 "url" => "vendors.php"],
        ],
    ],
];
?>
