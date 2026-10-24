<?php
// Get the current page filename to dynamically highlight the active nav link
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gharuda HR | Dashboard</title>
  <link rel="icon" href="./assets/img/logo-icon.png" />

  <!-- Bootstrap 5 -->
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"> -->
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Sora:wght@600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/bootstrap.css">
  <link rel="stylesheet" href="./assets/icon/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="./assets/icon/materialdesignicon/css/materialdesignicons.min.css">
  <!-- <link rel="stylesheet" href="./assets/css/app.css"> -->
  <style>
    :root {
      /* ===== Brand palette ===== */
      --primary: #16a34a;
      --primary2: #013376;
      --primary2-light: #dbe3e9;
      /* Gharuda green */
      --primary-dark: #0f7a38;
      --primary-light: #e6f7ec;
      --primary-lightTwo: #d0eddb;
      --primary-soft: #eafaf1;

      --accent-blue: #3b82f6;
      --accent-blue-soft: #eaf1ff;

      --accent-amber: #f59e0b;
      --accent-amber-soft: #fef6e0;

      --accent-red: #ef4444;
      --danger: #ef4444;
      --danger-light: #fdecec;
      --accent-red-soft: #fdeaea;

      --accent-violet: #8b5cf6;
      --accent-violet-soft: #f2ecfe;

      --accent-pink: #ec4899;
      --accent-pink-soft: #fdeef5;

      --ink-900: #16202b;
      --ink-700: #3a4652;
      --ink-500: #6b7684;
      --ink-300: #a6afb8;

      --bg-app: #f4f7f6;
      --bg-card: #ffffff;
      --border-soft: #eaeef0;
      --white: #fff;

      --radius-lg: 18px;
      --radius-md: 14px;
      --radius-sm: 10px;
      --shadow-card: 0 1px 2px rgba(20, 30, 25, .04), 0 8px 24px -12px rgba(20, 30, 25, .08);

      --table-th: #e8edf3;
      --table-black: #00000;
      --table-hover: #f9f9f9;


      /* gradiant color  */
      --grad-primary: linear-gradient(135deg, #077702 0%, #0ca308 100%) !important;


    }

    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Manrope', sans-serif;
      background: var(--bg-app);
      color: var(--ink-900);
      font-size: 14px;
    }

    h1,
    h2,
    h3,
    .font-display {
      font-family: 'Sora', sans-serif;
    }

    /* ===== Layout ===== */
    .app-shell {
      display: flex;
      min-height: 100vh;
    }

    /* ===== Sidebar =====
   Desktop default: collapsed icon-rail (--sb-collapsed).
   body.sb-open -> expands to full width (--sb-expanded) and reveals text/labels.
   Mobile (<992px): off-canvas drawer, toggled with .sb-open on <body>.

   Structure:
   .sidebar (flex column, fixed height, does NOT scroll itself)
     .brand           -> fixed at top
     .sidebar-scroll   -> only this middle section scrolls
     .sidebar-footer   -> fixed at bottom (user profile)

   NOTE: text/label visibility is driven ONLY by `body.sb-open` (or the
   mobile off-canvas override below) — NOT by `.sb-pinned` — so the
   icon-rail (collapsed) state stays clean with no clipped/overflowing text.
*/
    :root {
      --sb-collapsed: 70px;
      --sb-expanded: 260px;
    }

    .sidebar {
      width: var(--sb-collapsed);
      flex-shrink: 0;
      background: var(--bg-card);
      border-right: 1px solid var(--border-soft);
      padding: 22px 12px;
      position: sticky;
      top: 0;
      height: 100vh;
      display: flex;
      flex-direction: column;
      overflow: hidden;
      transition: width .22s ease;
      z-index: 1000;
      padding-top: 18px;
      padding-bottom: 10px;
      /* padding-right: 5px !important; */
    }

    /* stay collapsed-width on hover/pinned — only body.sb-open expands the rail */
    .sidebar:hover,
    .sidebar.sb-pinned {
      width: var(--sb-collapsed);
    }


    body.sb-open .sidebar {
      width: var(--sb-expanded);
    }


    body.sb-open .sidebar .nav-label {
      opacity: 1;
    }

    .sidebar .nav-label .viewContent {
      display: none !important;

    }

    .sb-open .sidebar .nav-label .viewContent {
      display: flex !important;

    }

    .sidebar .nav-label .iconView {
      display: flex !important;
      /* display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 12px;
    border-radius: var(--radius-sm);
    color: var(--ink-700);
    font-weight: 600;
    font-size: 13.5px;
    text-decoration: none;
    margin-bottom: 2px;
    transition: background .15s;
    white-space: nowrap;
    overflow: hidden; */
    }

    .sb-open .sidebar .nav-label .iconView {
      display: none !important;

    }

    body.sb-open .sidebar .nav-link-custom span {
      opacity: 1;
    }

    body .sidebar .brand .smallView {
      display: none;
    }

    body.sb-open .main-area .topbar .bigView {
      display: none;
    }

    body.sb-open .sidebar .brand .smallView {
      display: flex;
    }

    body .main-area .topbar .bigView {
      display: flex;
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 10px;
      justify-content: space-between;
      font-family: 'Sora', sans-serif;
      font-weight: 800;
      font-size: 1.15rem;
      color: var(--primary-dark);
      padding: 0px 8px 22px 4px;
      white-space: nowrap;
      flex-shrink: 0;
    }

    body.sb-open .sidebar .brand {
      padding: 0px 0px 22px 4px;
    }

    /* body .sidebar .brand {
    padding: 0px 0px 22px 4px;
} */

    body.sb-open .sidebar {
      padding-right: 18px !important;
    }

    .brand-mark {
      min-width: 38px;
      height: 38px;
      /* border-radius: 10px;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 18px;
    flex-shrink: 0; */
    }

    @media (max-width:991px) {
      .logo-990View {
        display: block !important;
        min-width: 38px;
        height: 38px;
      }

    }

    .nav-logotext {
      display: none;
      width: 130px;
      height: 40px;
      /* margin-top: 5px; */
    }

    body.sb-open .sidebar .nav-logotext {
      display: block;
    }

    /* ===== Sidebar scrollable middle section ===== */
    .sidebar-scroll {
      flex: 1 1 auto;
      min-height: 0;
      /* required so a flex child can actually shrink & scroll */
      overflow-y: auto;
      overflow-x: hidden;
      /* reserve the scrollbar's space always, so it never shifts content on hover */
      scrollbar-gutter: stable;
    }

    /* width stays fixed at all times - only the thumb's color changes on hover.
   (toggling width 0px -> 4px on hover is what was causing the padding/shift) */
    .sidebar-scroll::-webkit-scrollbar {
      width: 0px;
      height: 8px;
    }

    .sidebar-scroll::-webkit-scrollbar-track {
      background: transparent;
    }

    .sidebar-scroll::-webkit-scrollbar-thumb {
      background: transparent;
      border-radius: 10px;
      border: 2px solid transparent;
      background-clip: padding-box;
    }

    .sidebar-scroll:hover::-webkit-scrollbar-thumb {
      background: var(--primary-lightTwo);
      border-radius: 10px;
      border: 2px solid transparent;
      background-clip: padding-box;
    }

    .nav-label {
      font-size: 11px;
      font-weight: 700;
      letter-spacing: .08em;
      color: var(--ink-300);
      text-transform: uppercase;
      padding: 14px 12px 6px;
      white-space: nowrap;
      /* opacity: 0; */
      transition: opacity .15s ease;
    }


    /* .sidebar.sb-pinned .nav-label {
    opacity: 1;
} */

    /* nav-label as a clickable toggle button (Core HR / Management) */
    .sb-open .sidebar .nav-label-toggle {
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 100%;
      background: none;
      border: none;
      cursor: pointer;
      font-family: inherit;
      text-align: left;
    }

    body:not(.sb-open) .nav-label-toggle {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 12px;
      padding: 10px 12px;
      border-radius: var(--radius-sm);
      /* color: var(--ink-700); */
      font-weight: 600;
      /* font-size: 13.5px; */
      text-decoration: none;
      margin-bottom: 2px;
      transition: background .15s;
      white-space: nowrap;
      overflow: hidden;
      background-color: #fff;
      border: 0;
      width: 45px;
      height: 45px;
    }

    body:not(.sb-open) .nav-label-toggle i {
      font-size: 17px;
      width: 20px;
      text-align: center;
      color: var(--ink-500);
      flex-shrink: 0;
    }

    body:not(.sb-open) .nav-label-toggle:hover {
      background: var(--bg-app);
      color: var(--ink-900);
    }


    .nav-label-caret {
      font-size: 10px;
      color: var(--ink-300);
      flex-shrink: 0;
      transition: transform .2s ease;
    }

    .nav-group.collapsed .nav-label-caret {
      transform: rotate(-90deg);
    }

    /* highlight the group-label that holds the currently open/active page */
    body:not(.sb-open) .nav-label-toggle.active-group {
      background: var(--primary-light) !important;
      color: var(--primary-dark) !important;
    }

    .nav-label-toggle.active-group .nav-label-caret {
      color: var(--primary-dark);
    }

    /* collapsible links container: grid-rows trick animates height without JS measuring.
   Only the group holding the active page stays open by default (see footer.php JS);
   every other group's links are fully hidden (0fr) until its label is clicked. */
    .nav-group-links {
      display: grid;
      grid-template-rows: 1fr;
      transition: grid-template-rows .25s ease;
    }

    .nav-group-links-inner {
      overflow: hidden;
    }

    .nav-group.collapsed .nav-group-links {
      grid-template-rows: 0fr;
    }

    .nav-link-custom {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 10px 12px;
      border-radius: var(--radius-sm);
      color: var(--ink-700);
      font-weight: 600;
      font-size: 13.5px;
      text-decoration: none;
      margin-bottom: 2px;
      transition: background .15s;
      white-space: nowrap;
      overflow: hidden;
    }

    .nav-link-custom i {
      font-size: 17px;
      width: 20px;
      text-align: center;
      color: var(--ink-500);
      flex-shrink: 0;
    }

    .nav-link-custom span {
      opacity: 0;
      transition: opacity .15s ease;
    }

    .nav-link-custom:hover {
      background: var(--bg-app);
      color: var(--ink-900);
    }

    .nav-link-custom.active {
      background: var(--primary-light);
      color: var(--primary-dark);
    }

    .nav-link-custom.active i {
      color: var(--primary-dark);
    }

    /* ===== Collapsed sidebar: hover flyout dropdown ===== */
    /*
   .nav-group-hover wraps the nav-label-toggle button.
   When the sidebar is collapsed (no body.sb-open) and user hovers
   over the group label, .nav-flyout slides in from the right of the
   icon rail as a floating panel.
   When the sidebar is expanded (body.sb-open), the flyout is fully
   hidden — the normal collapsible nav-group-links takes over.
*/
    .nav-group-hover {
      position: relative;
    }

    .nav-flyout {
      display: none;
      /* hidden by default — shown via .flyout-open class added by JS */
      position: fixed;
      background: var(--bg-card);
      border: 1px solid var(--border-soft);
      border-radius: var(--radius-md);
      box-shadow: 0 8px 32px -8px rgba(20, 30, 25, .18), 0 2px 8px rgba(20, 30, 25, .06);
      padding: 8px;
      min-width: 200px;
      z-index: 2000;
      pointer-events: none;
    }

    /* flyout nav-links: span always visible inside the flyout */
    .nav-flyout .nav-link-custom {
      overflow: visible;
    }

    .nav-flyout .nav-link-custom span {
      opacity: 1 !important;
    }

    .nav-flyout-title {
      font-size: 10.5px;
      font-weight: 700;
      letter-spacing: .08em;
      text-transform: uppercase;
      color: var(--ink-300);
      padding: 4px 12px 8px;
      white-space: nowrap;
      border-bottom: 1px solid var(--border-soft);
      margin-bottom: 4px;
    }

    /* Show flyout via JS-added .flyout-open class (collapsed state only).
   Pure CSS :hover can't be used here because .nav-flyout is position:fixed —
   the mouse leaving .nav-group-hover would immediately hide it. */
    body:not(.sb-open) .nav-flyout.flyout-open {
      display: block;
      pointer-events: auto;
    }

    /* In expanded state, never show the flyout */
    body.sb-open .nav-flyout {
      display: none !important;
    }

    /* ===== Sidebar footer (user profile, moved here from topbar) ===== */
    .sidebar-footer {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 14px 8px 4px;
      margin-top: 6px;
      border-top: 1px solid var(--border-soft);
      white-space: nowrap;
      overflow: hidden;
      flex-shrink: 0;
      /* never scrolls, always pinned to bottom of sidebar */
    }

    .sidebar-footer .avatar-sm {
      flex-shrink: 0;
    }

    .sidebar-footer-text {
      opacity: 0;
      min-width: 0;
      transition: opacity .15s ease;
    }

    body.sb-open .sidebar .sidebar-footer-text {
      opacity: 1;
    }

    .sidebar-footer-name {
      font-weight: 700;
      font-size: 13px;
      color: var(--ink-900);
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .sidebar-footer-role {
      font-size: 11.5px;
      color: var(--ink-500);
    }

    /* backdrop for mobile drawer */
    .sb-backdrop {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(15, 25, 20, .42);
      z-index: 999;
    }

    /* ===== Main ===== */
    .main-area {
      flex: 1;
      min-width: 0;
    }

    .sb-toggle-btn {
      width: 38px;
      height: 38px;
      border-radius: 10px;
      border: 1px solid var(--border-soft);
      background: var(--bg-card);
      color: var(--ink-700);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      font-size: 16px;
    }

    .sb-toggle-btn:hover {
      background: var(--bg-app);
    }

    /* ===== Responsive: mobile off-canvas ===== */
    @media (max-width: 991px) {
      .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        width: 260px;
        transform: translateX(-100%);
        box-shadow: 0 0 0 rgba(0, 0, 0, 0);
        transition: transform .25s ease;
      }

      .sidebar .nav-label,
      .sidebar .nav-link-custom span,
      .sidebar .sidebar-footer-text {
        opacity: 1;
      }

      body.sb-open .sidebar {
        transform: translateX(0);
        box-shadow: 16px 0 40px -20px rgba(0, 0, 0, .35);
      }

      body.sb-open .sb-backdrop {
        display: block;
      }
    }

    @media (min-width: 992px) {
      .sb-mobile-only {
        display: none !important;
      }
    }

    .topbar {
      display: flex;
      align-items: center;
      gap: 18px;
      padding: 16px 20px;
      background: var(--bg-card);
      border-bottom: 1px solid var(--border-soft);
      position: sticky;
      top: 0;
      z-index: 10;
    }

    @media (max-width:500px) {
      .topbar {
        gap: 10px;
      }
    }

    .topbar .crumb {
      font-weight: 700;
      color: var(--ink-900);
      white-space: nowrap;
    }

    @media (max-width:426px) {
      .topbar .crumb {
        display: none;
      }
    }

    .search-box {
      flex: 1;
      max-width: 420px;
      background: var(--bg-app);
      border-radius: 999px;
      padding: 9px 16px;
      display: flex;
      align-items: center;
      gap: 10px;
      color: var(--ink-500);
      border: 1px solid var(--border-soft);
    }

    @media (max-width: 768px) {
      .search-box {
        display: none;
      }

      .btn-quick {
        margin-left: auto;
      }
    }

    .search-box input {
      border: 0;
      background: transparent;
      outline: none;
      width: 100%;
      font-size: 13.5px;
    }

    .btn-quick {
      width: 38px;
      height: 38px;
      background: var(--primary-light);
      color: var(--primary-dark);
      border: none;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      border-radius: 999px;
      /* padding: 9px 18px; */
      font-size: 13.5px;
      white-space: nowrap;
    }

    .icon-pill {
      width: 38px;
      height: 38px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      background: var(--bg-app);
      color: var(--ink-700);
      position: relative;
      flex-shrink: 0;
    }

    .badge-dot {
      position: absolute;
      top: -2px;
      right: -2px;
      background: var(--accent-red);
      color: #fff;
      font-size: 10px;
      font-weight: 700;
      width: 17px;
      height: 17px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 2px solid var(--bg-card);
    }

    .avatar-sm {
      width: 38px;
      height: 38px;
      border-radius: 50%;
      object-fit: cover;
    }

    .content-pad {
      padding: 26px 32px 60px;
    }

    @media (max-width:991px) {
      .content-pad {
        padding: 15px;
      }
    }

    /* ===== Cards ===== */
    .card-custom {
      background: var(--bg-card);
      border: 1px solid var(--border-soft);
      border-radius: var(--radius-lg);
      box-shadow: var(--shadow-card);
      padding: 20px 22px;
      height: 100%;
    }

    .card-head {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      margin-bottom: 16px;
    }

    .card-title {
      font-weight: 700;
      font-size: 15.5px;
      color: var(--ink-900);
      margin: 0;
    }

    .card-sub {
      font-size: 12.5px;
      color: var(--ink-500);
      margin-top: 2px;
    }

    .icon-chip {
      width: 38px;
      height: 38px;
      border-radius: 11px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 17px;
      flex-shrink: 0;
    }

    /* ===== Stat strip ===== */
    .stat-card {
      background: var(--bg-card);
      border: 1px solid var(--border-soft);
      border-radius: var(--radius-md);
      padding: 16px 18px;
      height: 100%;
      cursor: pointer;
    }

    .stat-card .label {
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-size: 12.5px !important;
      color: var(--ink-500);
      font-weight: 600;
      margin-bottom: 10px;
    }

    .stat-card .value {
      font-family: 'Sora', sans-serif;
      font-weight: 700;
      font-size: 1.7rem;
      color: var(--ink-900);
    }

    .stat-card .delta {
      font-size: 12px;
      font-weight: 600;
      margin-top: 4px;
    }

    .stat-icon {
      width: 30px;
      height: 30px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 14px;
      transition: all 0.25s ease;
    }

    /* Stat Card Themes */
    /* Blue */
    .stat-theme-blue .stat-icon {
      color: var(--accent-blue);
      background: var(--accent-blue-soft);
    }

    .stat-theme-blue:hover {
      background: var(--accent-blue-soft);
      border-color: var(--accent-blue-soft);
    }

    .stat-theme-blue:hover .stat-icon {
      background: #fff;
    }

    /* Primary */
    .stat-theme-primary .stat-icon {
      color: var(--primary-dark);
      background: var(--primary-soft);
    }

    .stat-theme-primary:hover {
      background: var(--primary-soft);
      border-color: var(--primary-soft);
    }

    .stat-theme-primary:hover .stat-icon {
      background: #fff;
    }

    /* Amber */
    .stat-theme-amber .stat-icon {
      color: var(--accent-amber);
      background: var(--accent-amber-soft);
    }

    .stat-theme-amber:hover {
      background: var(--accent-amber-soft);
      border-color: var(--accent-amber-soft);
    }

    .stat-theme-amber:hover .stat-icon {
      background: #fff;
    }

    /* Violet */
    .stat-theme-violet .stat-icon {
      color: var(--accent-violet);
      background: var(--accent-violet-soft);
    }

    .stat-theme-violet:hover {
      background: var(--accent-violet-soft);
      border-color: var(--accent-violet-soft);
    }

    .stat-theme-violet:hover .stat-icon {
      background: #fff;
    }

    /* Red */
    .stat-theme-red .stat-icon {
      color: var(--accent-red);
      background: var(--accent-red-soft);
    }

    .stat-theme-red:hover {
      background: var(--accent-red-soft);
      border-color: var(--accent-red-soft);
    }

    .stat-theme-red:hover .stat-icon {
      background: #fff;
    }

    /* Neutral Text */
    .text-neutral {
      color: var(--ink-500);
    }

    .text-up {
      color: var(--primary);
    }

    .text-down {
      color: var(--accent-red);
    }

    /* ===== Buttons ===== */
    .btn-approve {
      background: var(--primary);
      border: none;
      color: #fff;
      font-weight: 700;
      font-size: 12.5px;
      padding: 6px 16px;
      border-radius: 8px;
    }

    .btn-approve:hover {
      background: var(--primary-dark);
      color: #fff;
    }

    .btn-reject {
      background: #fff;
      border: 1px solid var(--border-soft);
      color: var(--ink-700);
      font-weight: 700;
      font-size: 12.5px;
      padding: 6px 16px;
      border-radius: 8px;
    }

    .btn-reject:hover {
      background: var(--bg-app);
    }

    /* ===== Person rows ===== */
    .person-row {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 12px 0;
      border-bottom: 1px solid var(--border-soft);
    }

    .person-row:last-child {
      border-bottom: none;
      padding-bottom: 0;
    }

    .person-row .avatar-sm {
      width: 42px;
      height: 42px;
    }

    .person-name {
      font-weight: 700;
      font-size: 13.5px;
      color: var(--ink-900);
    }

    .person-meta {
      font-size: 12px;
      color: var(--ink-500);
    }

    .person-meta a,
    .link-strong {
      color: var(--primary-dark);
      font-weight: 600;
      text-decoration: none;
    }

    /* ===== Progress bars ===== */
    .thin-progress {
      height: 8px;
      border-radius: 999px;
      background: var(--bg-app);
      overflow: hidden;
    }

    .thin-progress>div {
      height: 100%;
      border-radius: 999px;
    }

    /* Approval breakdown rows */
    .approval-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 12px 14px;
      border-radius: 10px;
      margin-bottom: 8px;
      font-weight: 600;
      font-size: 13px;
    }

    .approval-row .dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      display: inline-block;
      margin-right: 8px;
    }

    /* Legend rows for goals/dept */
    .legend-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 9px 0;
      font-size: 13px;
      font-weight: 600;
    }

    .legend-row .dot {
      width: 9px;
      height: 9px;
      border-radius: 50%;
      display: inline-block;
      margin-right: 8px;
    }




































    /* ===== Card header polish ===== */
    .js-report-table .card-head {
      flex-wrap: wrap;
      gap: 12px;
    }

    /* ===== Toolbar ===== */
    .report-toolbar {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      align-items: center;
      margin-bottom: 18px;
      padding-bottom: 16px;
      border-bottom: 1px solid var(--border-soft);
    }

    .report-toolbar .btn-group .btn {
      font-weight: 600;
      font-size: 13px;
    }

    .report-search {
      display: flex;
      align-items: center;
      gap: 8px;
      background: var(--bg-app);
      border: 1px solid var(--border-soft);
      border-radius: 999px;
      padding: 8px 14px;
      flex: 1;
      min-width: 180px;
      max-width: 320px;
      margin-left: auto;
    }

    .report-search i {
      color: var(--ink-500);
      font-size: 15px;
    }

    .report-search input {
      border: 0;
      background: transparent;
      outline: none;
      width: 100%;
      font-size: 13.5px;
      color: var(--ink-900);
    }

    .report-date-btn {
      width: 40px;
      height: 40px;
      border-radius: 10px;
      border: 1px solid var(--border-soft);
      background: var(--bg-card);
      color: var(--ink-700);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .report-date-btn:hover {
      background: var(--primary-soft);
      color: var(--primary-dark);
      border-color: var(--primary-soft);
    }

    @media (max-width: 576px) {
      .report-toolbar {
        flex-direction: column;
        align-items: stretch;
      }

      .report-search {
        max-width: none;
        margin-left: 0;
        order: 3;
      }

      .report-toolbar .btn-group {
        width: 100%;
      }

      .report-toolbar .btn-group .btn {
        flex: 1;
      }
    }

    /* ===== Pagination footer polish ===== */
    .report-footer {
      flex-wrap: wrap;
      gap: 14px;
      padding-top: 16px;
      border-top: 1px solid var(--border-soft);
    }

    .report-footer .form-select {
      border-radius: 8px;
      font-weight: 600;
    }

    #pgList .page-link {
      border: none;
      background: transparent;
      color: var(--ink-700);
      font-weight: 600;
      font-size: 13px;
      border-radius: 8px;
      margin: 0 2px;
      width: 34px;
      height: 34px;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0;
    }

    #pgList .page-link:hover {
      background: var(--primary-soft);
      color: var(--primary-dark);
    }

    #pgList .page-item.active .page-link {
      background: var(--primary);
      color: #fff;
    }

    #pgList .page-item.disabled .page-link {
      color: var(--ink-300);
      background: transparent;
    }

    @media (max-width: 576px) {
      .report-footer {
        justify-content: center;
        text-align: center;
      }
    }


    .btn-group {
      border-radius: 50px;
      border: 1px solid var(--border-soft);
    }

    .btn-group .view {
      padding: 5px 15px;
      border-radius: inherit;
      background-color: var(--primary-light);
      color: var(--primary);
    }

    .btn-group .edit {
      padding: 5px 15px;
      border-radius: inherit;
      background-color: var(--primary2-light);
      color: var(--primary2);
    }

    .btn-group .danger {
      padding: 5px 15px;
      border-radius: inherit;
      background-color: var(--danger-light);
      color: var(--danger);
    }

    .btn-group .view:hover {
      color: var(--bg-card);
      background-color: var(--primary);
    }

    .btn-group .edit:hover {
      color: var(--bg-card);
      background-color: var(--primary2);
    }

    .btn-group .danger:hover {
      color: var(--bg-card);
      background-color: var(--danger);
    }






































    /* ===== Offcanvas — Column Visibility (modern theme) ===== */
    #ocR {
      width: 340px;
      border-left: none;
      box-shadow: -8px 0 30px rgba(17, 24, 39, .12);
    }

    #ocR .offcanvas-header {
      padding: 18px 20px;
      border-bottom: 1px solid #EEF0FA;
      align-items: flex-start;
    }

    .offcanvas {
      border-radius: 10px;
      height: calc(100% - 20px);
      top: 10px !important;
      right: 10px !important;
    }

    #ocR .oc-header-icon {
      width: 38px;
      height: 38px;
      border-radius: 10px;
      background: var(--primary-soft, #EEF1FF);
      color: var(--primary, #4F46E5);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.15rem;
      flex-shrink: 0;
    }

    #ocR .offcanvas-title {
      font-size: 1rem;
      font-weight: 700;
      color: #1F2937;
    }

    #ocR .oc-subtitle {
      font-size: .78rem;
      color: #9CA3AF;
      margin-top: 2px;
    }

    #ocR .btn-close {
      box-shadow: none;
      opacity: .5;
    }

    #ocR .btn-close:hover {
      opacity: 1;
    }

    #ocR .column-toggle-body {
      padding: 16px 16px 8px;
    }

    /* individual column row */
    #ocR .column-toggle-body .row {
      margin: 0 0 8px 0 !important;
    }

    #ocR .column-toggle-body .col-12 {
      background: #FAFBFF;
      border: 1.5px solid #EEF0FA !important;
      border-radius: 12px !important;
      padding: 10px 14px !important;
      transition: border-color .15s ease, background-color .15s ease;
    }

    #ocR .column-toggle-body .col-12:hover {
      border-color: var(--primary-lightTwo, #C7CDF9);
      background: #FFFFFF;
    }

    #ocR .form-check-label {
      font-size: .88rem;
      color: #374151;
      font-weight: 600;
      margin: 0;
    }

    /* switch styling */
    #ocR .form-check-input {
      width: 38px;
      height: 20px;
      cursor: pointer;
      border-color: #D8DAEE;
    }

    #ocR .form-check-input:checked {
      background-color: var(--primary, #4F46E5);
      border-color: var(--primary, #4F46E5);
    }

    #ocR .form-check-input:focus {
      box-shadow: 0 0 0 3px var(--primary-light, #E0E4FF);
    }

    /* footer */
    #ocR .oc-footer {
      display: flex;
      gap: 10px;
      padding: 14px 16px;
      border-top: 1px solid #EEF0FA;
    }

    #ocR .oc-footer .btn {
      flex: 1;
      border-radius: 10px;
      font-size: .82rem;
      font-weight: 600;
    }




    /* ===== Day timeline (checkin/break/lunch/checkout) ===== */
    .day-timeline {
      padding: 18px 6px 4px;
    }

    .tl-track {
      position: relative;
      height: 4px;
      background: var(--bg-app);
      border-radius: 999px;
      margin: 0 22px 0;
    }

    .tl-fill {
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      background: var(--primary);
      border-radius: 999px;
      transition: width .3s ease;
    }

    .tl-points {
      display: flex;
      justify-content: space-between;
      margin-top: -14px;
    }

    .tl-point {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      position: relative;
    }

    .tl-dot {
      width: 28px;
      height: 28px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      font-size: 13px;
      box-shadow: 0 0 0 4px var(--bg-card);
      margin-bottom: 8px;
    }

    .tl-point:not(.done):not(.active) .tl-dot {
      color: var(--ink-500);
      background: var(--bg-app) !important;
      border: 1px solid var(--border-soft);
    }

    .tl-point.active .tl-dot {
      box-shadow: 0 0 0 4px var(--bg-card), 0 0 0 6px var(--accent-blue-soft);
    }

    .tl-label {
      font-weight: 700;
      font-size: 13px;
      color: var(--ink-900);
    }

    .tl-time {
      font-size: 11.5px;
      color: var(--ink-500);
      margin-top: 2px;
      white-space: nowrap;
    }

    @media (max-width: 576px) {
      .tl-label {
        font-size: 11.5px;
      }

      .tl-time {
        font-size: 10px;
      }
    }




















    /* button block  start */

    .btn {
      font-weight: 600;
      border-radius: 10px;
      padding: .55rem 1.1rem;
      font-size: .85rem;
      transition: all .15s;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: .35rem;
      border: 0;
    }

    .btn-primary {
      background: var(--grad-primary);
      color: #fff;
      box-shadow: 0 6px 18px var(--primary-light);
    }

    .btn-primary:hover,
    .btn-primary:focus {
      background: var(--grad-primary);
      color: #fff;
      box-shadow: 0 10px 25px var(--primary-lightTwo);
      transform: translateY(-1px);
    }

    /* button block  end */
  </style>

</head>

<body>

  <div class="app-shell">

    <!-- ============ SIDEBAR ============ -->
    <aside class="sidebar">
      <div class="brand">
        <div class="d-flex justify-content-between gap-2">
          <div class="brand-mark">
            <img src="./assets/img/logo-icon.png" alt="" class="w-100 h-100">
          </div>
          <span class="nav-logotext">
            <img src="./assets/img/logo-text.png" alt="" class="w-100 h-100">
          </span>
        </div>
        <button class="sb-toggle-btn sbToggle smallView" aria-label="Toggle sidebar">
          <i class="mdi mdi-menu-open"></i>
        </button>
      </div>

      <!-- scrollable nav area (only this part scrolls) -->
      <div class="sidebar-scroll">
        <div class="nav-group-links mt-3">
          <div class="nav-group-links-inner">
            <a class="nav-link-custom <?= ($currentPage == 'dashboard.php' || $currentPage == 'index.php' || $currentPage == '') ? 'active' : '' ?>" href="dashboard.php"><i class="bi bi-grid-1x2-fill"></i> <span>Dashboard</span></a>
          </div>
        </div>
        <div class="nav-group">
          <div class="nav-group-hover">
            <button type="button" class="nav-label nav-label-toggle">
              <div class="d-flex justify-content-between gap-2 align-items-center w-100 viewContent">
                <span>Ui Elements</span>
                <i class="bi bi-chevron-down nav-label-caret"></i>
              </div>
              <div class="iconView"><i class="bi bi-database"></i></div>
            </button>
            <!-- Flyout shown on hover when sidebar is collapsed -->
            <div class="nav-flyout">
              <div class="nav-flyout-title">UI Elements</div>
              <a class="nav-link-custom <?= ($currentPage == 'table.php') ? 'active' : '' ?>" href="table.php"><i class="bi bi-people"></i> <span>Table Block</span></a>
              <a class="nav-link-custom <?= ($currentPage == 'date.php') ? 'active' : '' ?>" href="date.php"><i class="bi bi-people"></i> <span>Date Picker</span></a>
              <a class="nav-link-custom <?= ($currentPage == 'date.php') ? 'active' : '' ?>" href="buttons.php"><i class="bi bi-diagram-3"></i> <span>Button Block</span></a>
              <a class="nav-link-custom" href="#"><i class="bi bi-calendar-check"></i> <span>Attendance</span></a>
              <a class="nav-link-custom" href="#"><i class="bi bi-calendar-week"></i> <span>Leave Management</span></a>
              <a class="nav-link-custom" href="#"><i class="bi bi-person-plus"></i> <span>Recruitment</span></a>
              <a class="nav-link-custom" href="#"><i class="bi bi-file-earmark-text"></i> <span>Contracts</span></a>
              <a class="nav-link-custom" href="#"><i class="bi bi-award"></i> <span>Performance</span></a>
            </div>
          </div>
          <div class="nav-group-links">
            <div class="nav-group-links-inner">
              <a class="nav-link-custom <?= ($currentPage == 'table.php') ? 'active' : '' ?>" href="table.php"><i class="bi bi-people"></i> <span>Table Block</span></a>
              <a class="nav-link-custom <?= ($currentPage == 'date.php') ? 'active' : '' ?>" href="date.php"><i class="bi bi-people"></i> <span>Date Picker</span></a>
              <a class="nav-link-custom <?= ($currentPage == 'date.php') ? 'active' : '' ?>" href="buttons.php"><i class="bi bi-diagram-3"></i> <span>Button Block</span></a>
              <a class="nav-link-custom" href="#"><i class="bi bi-calendar-check"></i> <span>Attendance</span></a>
              <a class="nav-link-custom" href="#"><i class="bi bi-calendar-week"></i> <span>Leave Management</span></a>
              <a class="nav-link-custom" href="#"><i class="bi bi-person-plus"></i> <span>Recruitment</span></a>
              <a class="nav-link-custom" href="#"><i class="bi bi-file-earmark-text"></i> <span>Contracts</span></a>
              <a class="nav-link-custom" href="#"><i class="bi bi-award"></i> <span>Performance</span></a>
            </div>
          </div>
        </div>

        <!-- <div class="nav-group collapsed">
          <button type="button" class="nav-label nav-label-toggle">
            <span>Management</span>
            <i class="bi bi-chevron-down nav-label-caret"></i>
          </button>
          <div class="nav-group-links">
            <div class="nav-group-links-inner">
              <a class="nav-link-custom" href="#"><i class="bi bi-credit-card"></i> <span>Payroll</span></a>
              <a class="nav-link-custom" href="#"><i class="bi bi-cash-coin"></i> <span>Loans</span></a>
              <a class="nav-link-custom" href="#"><i class="bi bi-clock-history"></i> <span>Shifts</span></a>
              <a class="nav-link-custom" href="#"><i class="bi bi-wallet2"></i> <span>Salary Management</span></a>
              <a class="nav-link-custom" href="#"><i class="bi bi-bar-chart-line"></i> <span>Reports</span></a>
              <a class="nav-link-custom" href="#"><i class="bi bi-bell"></i> <span>Notifications</span></a>
              <a class="nav-link-custom" href="#"><i class="bi bi-gear"></i> <span>Settings</span></a>
            </div>
          </div>
        </div> -->
      </div>

      <!-- fixed footer at bottom of sidebar: moved here from topbar, never scrolls -->
      <div class="sidebar-footer">
        <img src="./assets/img/profile-1.jpg" class="avatar-sm" alt="user">
        <div class="sidebar-footer-text">
          <div class="sidebar-footer-name">Sarah Mitchell</div>
          <div class="sidebar-footer-role">HR Admin</div>
        </div>
      </div>
    </aside>

    <!-- backdrop for mobile drawer -->
    <div class="sb-backdrop" id="sbBackdrop"></div>

    <!-- ============ MAIN ============ -->
    <div class="main-area">

      <!-- Topbar -->
      <div class="topbar">
        <div class="logo-990View d-none">
          <img src="./assets/img/logo-icon.png" alt="" class="w-100 h-100">
        </div>
        <button class="sb-toggle-btn sbToggle bigView" aria-label="Toggle sidebar">
          <i class="bi bi-list"></i>
        </button>
        <div class="crumb">Dashboard</div>
        <div class="search-box ms-auto">
          <i class="bi bi-search"></i>
          <input type="text" placeholder="Search for employees, logs, files...">
        </div>
        <button class="btn-quick"><i class="mdi mdi-clock-check-outline"></i></button>
        <div class="icon-pill"><i class="bi bi-question-circle"></i></div>
        <div class="icon-pill"><i class="bi bi-bell"></i><span class="badge-dot">5</span></div>
      </div>

      <div class="content-pad">