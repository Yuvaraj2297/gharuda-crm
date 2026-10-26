<?php include 'header.php'; ?>

<?php
// Sample Employees Data matching HRMS master database
$employees = [
    1 => ['id' => 1, 'name' => 'Amelia Curr', 'empId' => 'EMP0001', 'dept' => 'Design', 'designation' => 'UI/UX Designer', 'joining' => '15 Jan 2024', 'present' => 26, 'absent' => 2, 'period' => 'May 2026', 'payDate' => '03/10/2023', 'basic' => 25000, 'hra' => 10000, 'da' => 5000, 'convey' => 3200, 'medical' => 2000, 'special' => 4800, 'pf' => 3000, 'esi' => 375, 'profTax' => 200, 'tds' => 2500],
    2 => ['id' => 2, 'name' => 'Daniel Martinez', 'empId' => 'EMP0002', 'dept' => 'Engineering', 'designation' => 'Senior Developer', 'joining' => '01 Mar 2023', 'present' => 28, 'absent' => 0, 'period' => 'May 2026', 'payDate' => '03/10/2023', 'basic' => 35000, 'hra' => 14000, 'da' => 7000, 'convey' => 3200, 'medical' => 2000, 'special' => 4800, 'pf' => 4200, 'esi' => 375, 'profTax' => 200, 'tds' => 3500],
    3 => ['id' => 3, 'name' => 'David Anderson', 'empId' => 'EMP0003', 'dept' => 'Engineering', 'designation' => 'Backend Developer', 'joining' => '10 Jun 2024', 'present' => 24, 'absent' => 4, 'period' => 'May 2026', 'payDate' => '03/10/2023', 'basic' => 30000, 'hra' => 12000, 'da' => 6000, 'convey' => 3200, 'medical' => 2000, 'special' => 4800, 'pf' => 3600, 'esi' => 375, 'profTax' => 200, 'tds' => 3000],
    4 => ['id' => 4, 'name' => 'Emily Clark', 'empId' => 'EMP0004', 'dept' => 'Finance', 'designation' => 'Accountant', 'joining' => '20 Sep 2023', 'present' => 27, 'absent' => 1, 'period' => 'May 2026', 'payDate' => '03/10/2023', 'basic' => 28000, 'hra' => 11200, 'da' => 5600, 'convey' => 3200, 'medical' => 2000, 'special' => 4800, 'pf' => 3360, 'esi' => 375, 'profTax' => 200, 'tds' => 2800],
    5 => ['id' => 5, 'name' => 'Sophia Johnson', 'empId' => 'EMP0005', 'dept' => 'Marketing', 'designation' => 'Marketing Lead', 'joining' => '05 Apr 2024', 'present' => 22, 'absent' => 6, 'period' => 'May 2026', 'payDate' => '03/10/2023', 'basic' => 26000, 'hra' => 10400, 'da' => 5200, 'convey' => 3200, 'medical' => 2000, 'special' => 4800, 'pf' => 3120, 'esi' => 375, 'profTax' => 200, 'tds' => 2600],
    6 => ['id' => 6, 'name' => 'Michael Brown', 'empId' => 'EMP0006', 'dept' => 'Design', 'designation' => 'Graphic Designer', 'joining' => '01 Jul 2025', 'present' => 25, 'absent' => 3, 'period' => 'May 2026', 'payDate' => '03/10/2023', 'basic' => 22000, 'hra' => 8800, 'da' => 4400, 'convey' => 3200, 'medical' => 2000, 'special' => 4800, 'pf' => 2640, 'esi' => 375, 'profTax' => 200, 'tds' => 2200],
    7 => ['id' => 7, 'name' => 'Olivia Wilson', 'empId' => 'EMP0007', 'dept' => 'Marketing', 'designation' => 'Content Writer', 'joining' => '12 Nov 2023', 'present' => 28, 'absent' => 0, 'period' => 'May 2026', 'payDate' => '03/10/2023', 'basic' => 24000, 'hra' => 9600, 'da' => 4800, 'convey' => 3200, 'medical' => 2000, 'special' => 4800, 'pf' => 2880, 'esi' => 375, 'profTax' => 200, 'tds' => 2400],
    8 => ['id' => 8, 'name' => 'James Taylor', 'empId' => 'EMP0008', 'dept' => 'Engineering', 'designation' => 'Frontend Developer', 'joining' => '01 Feb 2024', 'present' => 27, 'absent' => 1, 'period' => 'May 2026', 'payDate' => '03/10/2023', 'basic' => 32000, 'hra' => 12800, 'da' => 6400, 'convey' => 3200, 'medical' => 2000, 'special' => 4800, 'pf' => 3840, 'esi' => 375, 'profTax' => 200, 'tds' => 3200],
    9 => ['id' => 9, 'name' => 'Isabella Moore', 'empId' => 'EMP0009', 'dept' => 'Finance', 'designation' => 'Financial Analyst', 'joining' => '08 Aug 2023', 'present' => 23, 'absent' => 5, 'period' => 'May 2026', 'payDate' => '03/10/2023', 'basic' => 29000, 'hra' => 11600, 'da' => 5800, 'convey' => 3200, 'medical' => 2000, 'special' => 4800, 'pf' => 3480, 'esi' => 375, 'profTax' => 200, 'tds' => 2900],
    10 => ['id' => 10, 'name' => 'William Thomas', 'empId' => 'EMP0010', 'dept' => 'Design', 'designation' => 'Product Designer', 'joining' => '15 May 2024', 'present' => 28, 'absent' => 0, 'period' => 'May 2026', 'payDate' => '03/10/2023', 'basic' => 27000, 'hra' => 10800, 'da' => 5400, 'convey' => 3200, 'medical' => 2000, 'special' => 4800, 'pf' => 3240, 'esi' => 375, 'profTax' => 200, 'tds' => 2700],
    11 => ['id' => 11, 'name' => 'Mia Harris', 'empId' => 'EMP0011', 'dept' => 'HR', 'designation' => 'HR Manager', 'joining' => '01 Jan 2023', 'present' => 21, 'absent' => 7, 'period' => 'May 2026', 'payDate' => '03/10/2023', 'basic' => 30000, 'hra' => 12000, 'da' => 6000, 'convey' => 3200, 'medical' => 2000, 'special' => 4800, 'pf' => 3600, 'esi' => 375, 'profTax' => 200, 'tds' => 3000],
    12 => ['id' => 12, 'name' => 'Benjamin Martin', 'empId' => 'EMP0012', 'dept' => 'Engineering', 'designation' => 'DevOps Engineer', 'joining' => '10 Sep 2024', 'present' => 28, 'absent' => 0, 'period' => 'May 2026', 'payDate' => '03/10/2023', 'basic' => 33000, 'hra' => 13200, 'da' => 6600, 'convey' => 3200, 'medical' => 2000, 'special' => 4800, 'pf' => 3960, 'esi' => 375, 'profTax' => 200, 'tds' => 3300],
    13 => ['id' => 13, 'name' => 'Charlotte Lee', 'empId' => 'EMP0013', 'dept' => 'Finance', 'designation' => 'Payroll Specialist', 'joining' => '20 Mar 2024', 'present' => 25, 'absent' => 3, 'period' => 'May 2026', 'payDate' => '03/10/2023', 'basic' => 26000, 'hra' => 10400, 'da' => 5200, 'convey' => 3200, 'medical' => 2000, 'special' => 4800, 'pf' => 3120, 'esi' => 375, 'profTax' => 200, 'tds' => 2600],
    14 => ['id' => 14, 'name' => 'Henry Walker', 'empId' => 'EMP0014', 'dept' => 'Operations', 'designation' => 'Operations Manager', 'joining' => '05 Jul 2023', 'present' => 27, 'absent' => 1, 'period' => 'May 2026', 'payDate' => '03/10/2023', 'basic' => 31000, 'hra' => 12400, 'da' => 6200, 'convey' => 3200, 'medical' => 2000, 'special' => 4800, 'pf' => 3720, 'esi' => 375, 'profTax' => 200, 'tds' => 3100],
    15 => ['id' => 15, 'name' => 'Evelyn Hall', 'empId' => 'EMP0015', 'dept' => 'Marketing', 'designation' => 'SEO Specialist', 'joining' => '01 Nov 2025', 'present' => 26, 'absent' => 2, 'period' => 'May 2026', 'payDate' => '03/10/2023', 'basic' => 23000, 'hra' => 9200, 'da' => 4600, 'convey' => 3200, 'medical' => 2000, 'special' => 4800, 'pf' => 2760, 'esi' => 375, 'profTax' => 200, 'tds' => 2300],
];

$empId = isset($_GET['id']) ? intval($_GET['id']) : (isset($_GET['emp_id']) ? intval($_GET['emp_id']) : 1);
$emp = isset($employees[$empId]) ? $employees[$empId] : $employees[1];

// Allow period override from URL
if (isset($_GET['period']) && !empty($_GET['period'])) {
    $emp['period'] = htmlspecialchars($_GET['period']);
}

// Allow numeric overrides from URL if passed from manual generation
if (isset($_GET['basic'])) $emp['basic'] = floatval($_GET['basic']);
if (isset($_GET['hra'])) $emp['hra'] = floatval($_GET['hra']);
if (isset($_GET['da'])) $emp['da'] = floatval($_GET['da']);
if (isset($_GET['convey'])) $emp['convey'] = floatval($_GET['convey']);
if (isset($_GET['medical'])) $emp['medical'] = floatval($_GET['medical']);
if (isset($_GET['special'])) $emp['special'] = floatval($_GET['special']);
if (isset($_GET['pf'])) $emp['pf'] = floatval($_GET['pf']);
if (isset($_GET['esi'])) $emp['esi'] = floatval($_GET['esi']);
if (isset($_GET['profTax'])) $emp['profTax'] = floatval($_GET['profTax']);
if (isset($_GET['tds'])) $emp['tds'] = floatval($_GET['tds']);
if (isset($_GET['present'])) $emp['present'] = intval($_GET['present']);
if (isset($_GET['absent'])) $emp['absent'] = intval($_GET['absent']);

$gross = $emp['basic'] + $emp['hra'] + $emp['da'] + $emp['convey'] + $emp['medical'] + $emp['special'];
$deductions = $emp['pf'] + $emp['esi'] + $emp['profTax'] + $emp['tds'];
$netPay = $gross - $deductions;

// Number to words converter
function numToWordsIndian($num) {
    $a = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine',
          'Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen',
          'Seventeen', 'Eighteen', 'Nineteen'];
    $b = ['', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];
    
    $num = floor($num);
    if ($num == 0) return 'Zero';
    
    $t = function($n) use (&$t, $a, $b) {
        if ($n === 0) return '';
        if ($n < 20) return $a[$n] . ' ';
        if ($n < 100) return $b[intval($n / 10)] . ' ' . ($n % 10 ? $a[$n % 10] . ' ' : '');
        return $a[intval($n / 100)] . ' Hundred ' . ($n % 100 ? $t($n % 100) : '');
    };
    
    $cr = intval($num / 10000000); $num %= 10000000;
    $lac = intval($num / 100000);  $num %= 100000;
    $th = intval($num / 1000);     $num %= 1000;
    
    $res = '';
    if ($cr)  $res .= $t($cr) . 'Crore ';
    if ($lac) $res .= $t($lac) . 'Lakh ';
    if ($th)  $res .= $t($th) . 'Thousand ';
    if ($num) $res .= $t($num);
    return trim($res);
}

$inWords = numToWordsIndian($netPay);
$action = isset($_GET['action']) ? $_GET['action'] : '';
?>

<style>
    /* Standalone Payslip View Styles matching user wireframe 1:1 */
    .payslip-page-wrapper {
        padding: 20px 0 40px;
    }
    
    .payslip-top-bar {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 14px 20px;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
    }

    .btn-payslip-print {
        background: #ffffff;
        border: 1px solid #cbd5e1;
        color: #475569;
        font-weight: 700;
        padding: 9px 24px;
        border-radius: 10px;
        font-size: 13.5px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s ease;
    }

    .btn-payslip-print:hover {
        background: #f1f5f9;
        color: #0f172a;
        border-color: #94a3b8;
    }

    .btn-payslip-download {
        background: #0d7a42;
        border: 1px solid #0d7a42;
        color: #ffffff;
        font-weight: 700;
        padding: 9px 24px;
        border-radius: 10px;
        font-size: 13.5px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s ease;
        box-shadow: 0 4px 12px rgba(13, 122, 66, 0.2);
    }

    .btn-payslip-download:hover {
        background: #0b6737;
        color: #ffffff;
        border-color: #0b6737;
    }

    .payslip-sheet-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        max-width: 960px;
        margin: 0 auto;
    }

    .payslip-header-bar {
        padding: 24px 28px;
        background: #ffffff;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .company-logo-mark {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        background: #e8f7ea;
        color: #0d7a42;
        font-size: 24px;
        font-weight: 800;
        display: grid;
        place-items: center;
        flex-shrink: 0;
    }

    .company-title {
        font-size: 16px;
        font-weight: 800;
        color: #0f172a;
        letter-spacing: 0.3px;
        line-height: 1.2;
    }

    .company-sub {
        font-size: 11.5px;
        color: #64748b;
        margin-top: 3px;
    }

    .header-month-label {
        font-size: 12px;
        color: #64748b;
        font-weight: 600;
        text-align: right;
    }

    .header-month-val {
        font-size: 22px;
        font-weight: 900;
        color: #0f172a;
        margin-top: 2px;
    }

    .payslip-summary-grid {
        padding: 24px 28px;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        align-items: stretch;
        justify-content: space-between;
        gap: 24px;
    }

    .summary-left-fields {
        flex: 1;
    }

    .summary-sec-title {
        font-size: 12.5px;
        font-weight: 800;
        color: #0f172a;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        margin-bottom: 16px;
    }

    .field-pair-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px 24px;
    }

    .field-item label {
        display: block;
        font-size: 12px;
        color: #64748b;
        font-weight: 600;
        margin-bottom: 4px;
    }

    .field-item span {
        display: block;
        font-size: 13.5px;
        font-weight: 800;
        color: #0f172a;
    }

    .summary-net-card {
        background: #f2fbf4;
        border: 1px solid #d7ebdc;
        border-radius: 14px;
        padding: 18px 22px;
        min-width: 250px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .net-amount-display {
        font-size: 26px;
        font-weight: 900;
        color: #0d7a42;
        text-align: right;
        line-height: 1.1;
    }

    .net-amount-sub {
        font-size: 12px;
        color: #64748b;
        font-weight: 600;
        text-align: right;
        margin-top: 4px;
        margin-bottom: 12px;
    }

    .days-summary-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 10px;
        border-top: 1px solid #dceee0;
        font-size: 13px;
        font-weight: 700;
        color: #334155;
    }

    .days-summary-row strong {
        color: #0f172a;
        font-weight: 800;
    }

    .earnings-deductions-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        border-bottom: 1px solid #e2e8f0;
    }

    .col-table-section {
        border-right: 1px solid #e2e8f0;
    }

    .col-table-section:last-child {
        border-right: none;
    }

    .table-head-title {
        background: #f8fafc;
        padding: 14px 24px;
        font-size: 13px;
        font-weight: 800;
        color: #0f172a;
        letter-spacing: 0.5px;
        border-bottom: 1px solid #e2e8f0;
    }

    .table-row-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 24px;
        border-bottom: 1px solid #f1f5f9;
        font-size: 13px;
    }

    .table-row-item span {
        color: #475569;
        font-weight: 600;
    }

    .table-row-item strong {
        color: #0f172a;
        font-weight: 800;
    }

    .table-row-total {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 24px;
        background: #fafafa;
        border-top: 1px solid #e2e8f0;
        font-size: 13.5px;
        font-weight: 800;
    }

    .table-row-total span {
        color: #0f172a;
    }

    .table-row-total strong {
        color: #0d7a42;
        font-size: 14.5px;
    }

    .total-net-banner {
        background: #e8f7ea;
        padding: 18px 28px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid #d7ebdc;
    }

    .total-net-banner label {
        font-size: 13.5px;
        font-weight: 800;
        color: #0d7a42;
        letter-spacing: 0.5px;
        margin: 0;
    }

    .total-net-banner val {
        font-size: 26px;
        font-weight: 900;
        color: #0d7a42;
    }

    .words-section {
        padding: 16px 28px;
        border-bottom: 1px solid #e2e8f0;
        font-size: 13px;
        color: #475569;
        font-weight: 500;
    }

    .words-section strong {
        color: #0f172a;
        font-weight: 700;
    }

    .footer-note {
        padding: 16px 28px 22px;
        text-align: center;
        font-size: 12px;
        color: #94a3b8;
        font-style: italic;
    }

    /* Print styles */
    @media print {
        header, sidebar, nav, .breadcrumb-nav, .payslip-top-bar, footer, .btn, .main-header, .sidebar-wrapper {
            display: none !important;
        }

        body {
            background: #ffffff !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        .payslip-page-wrapper {
            padding: 0 !important;
        }

        .payslip-sheet-card {
            border: none !important;
            box-shadow: none !important;
            max-width: 100% !important;
            width: 100% !important;
        }
    }
</style>

<div class="container-fluid payslip-page-wrapper">
    <!-- Breadcrumbs -->
    <div class="d-flex align-items-center justify-content-between mb-3 d-print-none">
        <div>
            <h1 class="font-display fw-bold mb-1 page-title">View Payslip</h1>
            <nav class="d-flex align-items-center gap-2 text-neutral breadcrumb-nav" style="font-size:13px;">
                <i class="bi bi-cash-stack fs-6"></i><span>Payroll Management</span>
                <i class="bi bi-chevron-right"></i><a href="payslip.php" class="text-decoration-none text-muted">Payslips</a>
                <i class="bi bi-chevron-right"></i><span class="fw-bold text-dark"><?php echo htmlspecialchars($emp['name']); ?></span>
            </nav>
        </div>
        <a href="payslip.php" class="btn btn-outline-secondary rounded-3 btn-sm fw-semibold">
            <i class="bi bi-arrow-left me-1"></i>Back to Payslips
        </a>
    </div>

    <!-- Top Bar with Print & Download Action Buttons -->
    <div class="payslip-top-bar d-print-none">
        <div class="d-flex align-items-center gap-2">
            <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill">
                <i class="bi bi-check-circle me-1"></i> Payslip Generated
            </span>
            <span class="text-muted ms-2" style="font-size:13px;">
                Generated for <strong><?php echo htmlspecialchars($emp['name']); ?></strong> (<?php echo htmlspecialchars($emp['empId']); ?>)
            </span>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button type="button" class="btn-payslip-print" onclick="window.print()">
                <i class="bi bi-printer"></i> Print
            </button>
            <button type="button" class="btn-payslip-download" onclick="triggerDownload()">
                <i class="bi bi-download"></i> Download PDF
            </button>
        </div>
    </div>

    <!-- Main Payslip Sheet -->
    <div class="payslip-sheet-card" id="printablePayslip">
        <!-- Header -->
        <div class="payslip-header-bar">
            <div class="d-flex align-items-center gap-3">
                <div class="company-logo-mark">G</div>
                <div>
                    <div class="company-title">GHARUDA INFOTECH PVT LTD</div>
                    <div class="company-sub">3rd Floor Kathalbari, Darbhanga 846004 India</div>
                </div>
            </div>
            <div>
                <div class="header-month-label">Payslip for the Month</div>
                <div class="header-month-val"><?php echo htmlspecialchars($emp['period']); ?></div>
            </div>
        </div>

        <!-- Employee Summary & Net Pay -->
        <div class="payslip-summary-grid">
            <div class="summary-left-fields">
                <div class="summary-sec-title">EMPLOYEE SUMMARY</div>
                <div class="field-pair-grid">
                    <div class="field-item">
                        <label>Employee Name</label>
                        <span><?php echo htmlspecialchars($emp['name']); ?></span>
                    </div>
                    <div class="field-item">
                        <label>Employee ID</label>
                        <span><?php echo htmlspecialchars($emp['empId']); ?></span>
                    </div>
                    <div class="field-item">
                        <label>Pay Period</label>
                        <span><?php echo htmlspecialchars($emp['period']); ?></span>
                    </div>
                    <div class="field-item">
                        <label>Pay Date</label>
                        <span><?php echo htmlspecialchars($emp['payDate']); ?></span>
                    </div>
                </div>
            </div>
            <div class="summary-net-card">
                <div>
                    <div class="net-amount-display">&#8377;<?php echo number_format($netPay); ?></div>
                    <div class="net-amount-sub">Employee Net Pay</div>
                </div>
                <div>
                    <div class="days-summary-row">
                        <span>Paid Days</span>
                        <strong><?php echo intval($emp['present']); ?></strong>
                    </div>
                    <div class="days-summary-row mb-0 pb-0 border-0">
                        <span>LOP Days</span>
                        <strong><?php echo intval($emp['absent']); ?></strong>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings & Deductions Grid -->
        <div class="earnings-deductions-grid">
            <!-- Left: EARNINGS -->
            <div class="col-table-section">
                <div class="table-head-title">EARNINGS</div>
                <div class="table-row-item">
                    <span>Basic</span>
                    <strong>&#8377;<?php echo number_format($emp['basic']); ?></strong>
                </div>
                <div class="table-row-item">
                    <span>House Rent Allowance</span>
                    <strong>&#8377;<?php echo number_format($emp['hra']); ?></strong>
                </div>
                <div class="table-row-item">
                    <span>Dearness Allowance</span>
                    <strong>&#8377;<?php echo number_format($emp['da']); ?></strong>
                </div>
                <div class="table-row-item">
                    <span>Conveyance</span>
                    <strong>&#8377;<?php echo number_format($emp['convey']); ?></strong>
                </div>
                <div class="table-row-item">
                    <span>Medical Allowance</span>
                    <strong>&#8377;<?php echo number_format($emp['medical']); ?></strong>
                </div>
                <div class="table-row-item">
                    <span>Special Allowance</span>
                    <strong>&#8377;<?php echo number_format($emp['special']); ?></strong>
                </div>
                <div class="table-row-total">
                    <span>Gross Earning</span>
                    <strong>&#8377;<?php echo number_format($gross); ?></strong>
                </div>
            </div>

            <!-- Right: DEDUCTIONS -->
            <div class="col-table-section">
                <div class="table-head-title">DEDUCTIONS</div>
                <div class="table-row-item">
                    <span>Income Tax</span>
                    <strong>&#8377;<?php echo number_format($emp['tds']); ?></strong>
                </div>
                <div class="table-row-item">
                    <span>Provident Fund</span>
                    <strong>&#8377;<?php echo number_format($emp['pf']); ?></strong>
                </div>
                <div class="table-row-item">
                    <span>ESI</span>
                    <strong>&#8377;<?php echo number_format($emp['esi']); ?></strong>
                </div>
                <div class="table-row-item">
                    <span>Professional Tax</span>
                    <strong>&#8377;<?php echo number_format($emp['profTax']); ?></strong>
                </div>
                <div class="table-row-total">
                    <span>Total Deductions</span>
                    <strong>&#8377;<?php echo number_format($deductions); ?></strong>
                </div>
            </div>
        </div>

        <!-- Total Net Payable Banner -->
        <div class="total-net-banner">
            <label>TOTAL NET PAYABLE</label>
            <val>&#8377;<?php echo number_format($netPay); ?></val>
        </div>

        <!-- Amount in Words -->
        <div class="words-section">
            Amount in Words: <strong>Indian Rupee <?php echo htmlspecialchars($inWords); ?> Only</strong>
        </div>

        <!-- Footer -->
        <div class="footer-note">
            This is a system-generated payslip, hence the signature is not required.
        </div>
    </div>
</div>

<?php if ($action === 'download' || $action === 'print'): ?>
<script>window.PAYSLIP_AUTO_PRINT = true;</script>
<?php endif; ?>
<script src="./assets/js/pages/payslip-view.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>
