<!DOCTYPE html>
<html lang="en" data-bs-theme="light">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login | Gharuda</title>

    <link rel="icon" href="./assets/images/logo-icon.png" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;family=Plus+Jakarta+Sans:wght@500;600;700;800;900&amp;family=JetBrains+Mono:wght@400;600&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/icon/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./assets/icon/materialdesignicon/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./assets/css/app.css">
    <link rel="stylesheet" href="./assets/css/select2.css">

    <style>
        :root {
            /* Brand palette */
            /* --gh-primary: #013477 !important; */
            --gh-primary: #077702 !important;
            --gh-primary-rgb: 1, 52, 119 !important;
            --gh-primary-2: #0a5fb0 !important;
            /* lighter navy, gradient end */
            --gh-accent: #077702 !important;
            /* green accent */
            --gh-accent-rgb: 7, 119, 2 !important;
            --gh-pink: #f43f5e;
            --gh-orange: #fb923c;

            --gh-success: #14b8a6;
            --gh-success-rgb: 20, 184, 166;
            --gh-info: #0ea5e9;
            --gh-info-rgb: 14, 165, 233;
            --gh-warning: #f59e0b;
            --gh-warning-rgb: 245, 158, 11;
            --gh-danger: #f43f5e;
            --gh-danger-rgb: 244, 63, 94;

            /* Surfaces - LIGHT */
            --gh-bg: #f4f5fb;
            --gh-bg-pattern: radial-gradient(circle at 1px 1px, rgba(1, 52, 119, .06) 1px, transparent 0) !important;
            --gh-body: #3a3f5a;
            --gh-heading: #1a1d35;
            --gh-muted: #7a83a3;
            --gh-border: #e6e9f4;
            --gh-border-soft: #eef0f8;
            --gh-card: #ffffff;
            --gh-card-2: #fbfbff;
            /* nested surface */
            --gh-hover: #f7f7f7;
            --gh-input-bg: #f7f8fd;
            --gh-input-border: #e2e5f2;

            /* Sidebar */
            --gh-sidebar-bg: #15172b;
            --gh-sidebar-bg-2: #1d1f3d;
            --gh-sidebar-color: #b3b8d8;
            --gh-sidebar-active: #ffffff;
            --gh-sidebar-active-bg: rgba(255, 255, 255, .08);
            --gh-sidebar-caption: #6b7090;

            /* Topbar */
            --gh-topbar-bg: rgba(255, 255, 255, .78);
            --gh-topbar-border: rgba(230, 233, 244, .6);

            /* Layout sizes */
            --gh-topbar-h: 76px;
            --gh-sidebar-w: 270px;
            --gh-sidebar-w-mini: 80px;
            --gh-radius: 14px;
            --gh-radius-sm: 10px;
            --gh-radius-lg: 22px;

            /* Shadows */
            --gh-shadow-xs: 0 2px 6px rgba(26, 29, 53, .04);
            --gh-shadow-sm: 0 4px 14px rgba(26, 29, 53, .06);
            --gh-shadow: 0 10px 30px rgba(26, 29, 53, .08);
            --gh-shadow-lg: 0 22px 50px rgba(26, 29, 53, .14);
            --gh-glow: 0 0 0 6px rgba(var(--gh-primary-rgb), .18);

            /* Gradient bank rebuilt from the two brand colors */
            /* --gh-grad-primary: linear-gradient(135deg, #013477 0%, #0a5fb0 100%) !important; */
            --gh-grad-primary: linear-gradient(135deg, #077702 0%, #0ca308 100%) !important;
            --gh-grad-accent: linear-gradient(135deg, #077702 0%, #013477 100%) !important;
            --gh-grad-mint: linear-gradient(135deg, #0a8f2d 0%, #077702 100%) !important;
        }


        /* DARK theme overrides */
        [data-bs-theme="dark"] {
            --gh-bg: #0a0c1c;
            --gh-bg-pattern: radial-gradient(circle at 1px 1px, rgba(139, 92, 246, .10) 1px, transparent 0);
            --gh-body: #c4cae0;
            --gh-heading: #f1f3fc;
            --gh-muted: #7e85a8;
            --gh-border: #1f2241;
            --gh-border-soft: #181a35;
            --gh-card: #14172e;
            --gh-card-2: #181b36;
            --gh-hover: #1c1f3d;
            --gh-input-bg: #181b36;
            --gh-input-border: #262a52;

            --gh-sidebar-bg: #0d0f22;
            --gh-sidebar-bg-2: #14162d;
            --gh-sidebar-color: #a4abce;
            --gh-sidebar-caption: #595f80;

            --gh-topbar-bg: rgba(20, 23, 46, .78);
            --gh-topbar-border: rgba(31, 34, 65, .6);

            --gh-shadow-xs: 0 2px 6px rgba(0, 0, 0, .20);
            --gh-shadow-sm: 0 4px 14px rgba(0, 0, 0, .30);
            --gh-shadow: 0 10px 30px rgba(0, 0, 0, .40);
            --gh-shadow-lg: 0 22px 50px rgba(0, 0, 0, .55);
        }

        /* Bootstrap override hooks */
        [data-bs-theme] {
            --bs-primary: var(--gh-primary);
            --bs-primary-rgb: var(--gh-primary-rgb);
            --bs-success: var(--gh-success);
            --bs-info: var(--gh-info);
            --bs-warning: var(--gh-warning);
            --bs-danger: var(--gh-danger);
            --bs-body-bg: var(--gh-bg);
            --bs-body-color: var(--gh-body);
            --bs-border-color: var(--gh-border);
            --bs-border-radius: var(--gh-radius-sm);
            --bs-border-radius-sm: 8px;
            --bs-border-radius-lg: var(--gh-radius);
            --bs-link-color: var(--gh-primary);
            --bs-link-hover-color: var(--gh-primary-2);
        }

        /* ============== Base ============== */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
            font-size: 0.875rem;
            line-height: 1.55;
            color: var(--gh-body);
            background-color: #f7f7f7;
            background-image: var(--gh-bg-pattern);
            background-size: 28px 28px;
            margin: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Hide page vertical scrollbar (keep scrolling functional) */
        html,
        body {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        html::-webkit-scrollbar,
        body::-webkit-scrollbar {
            width: 0;
            height: 0;
            display: none;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .h1,
        .h2,
        .h3,
        .h4,
        .h5,
        .h6 {
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
            font-weight: 700;
            color: var(--gh-heading);
            letter-spacing: -0.02em;
        }

        a {
            color: var(--gh-primary);
            text-decoration: none;
            transition: color .15s;
        }

        a:hover {
            color: var(--gh-primary-2);
        }

        .text-muted {
            color: var(--gh-muted) !important;
        }

        hr {
            border-color: var(--gh-border);
            opacity: 1;
        }

        ::selection {
            background: rgba(var(--gh-primary-rgb), .25);
            color: var(--gh-heading);
        }

        /* ============== Layout shell ============== */
        .app {
            min-height: 100vh;
            overflow-x: hidden;
        }

        .topbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: var(--gh-topbar-h);
            background: var(--gh-topbar-bg);
            border-bottom: 1px solid var(--gh-topbar-border);
            backdrop-filter: saturate(140%) blur(14px);
            -webkit-backdrop-filter: saturate(140%) blur(14px);
            z-index: 1030;
            display: flex;
            align-items: center;
            transition: background .25s, border-color .25s;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: var(--gh-sidebar-w);
            background: #fff;
            z-index: 1040;
            display: flex;
            flex-direction: column;
            transition: width .3s cubic-bezier(.4, .0, .2, 1), transform .3s cubic-bezier(.4, .0, .2, 1);
            overflow: hidden;
            border-right: 1px solid var(--gh-border);
        }

        /* .sidebar::after {
  content: ""; position: absolute; inset: 0;
  background: radial-gradient(120% 60% at 0% 0%, rgba(139,92,246,.12), transparent 60%),
              radial-gradient(120% 60% at 100% 100%, rgba(34,211,238,.06), transparent 60%);
  pointer-events: none;
} */
        .content {
            margin-left: var(--gh-sidebar-w);
            padding-top: var(--gh-topbar-h);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: margin-left .3s cubic-bezier(.4, .0, .2, 1);
        }

        .page {
            flex: 1;
            padding: 1.75rem;
        }

        @media (max-width:426px) {
            .page {
                padding: 15px;
            }
        }

        .app-footer {
            border-top: 1px solid var(--gh-border);
            padding: 1rem 1.75rem;
            font-size: .8125rem;
            color: var(--gh-muted);
            background: var(--gh-card);
        }

        /* Sidebar collapsed */
        body.sidebar-mini .sidebar {
            width: var(--gh-sidebar-w-mini);
        }

        body.sidebar-mini .content {
            margin-left: var(--gh-sidebar-w-mini);
        }

        body.sidebar-mini .brand-text,
        body.sidebar-mini .sidebar .menu-text,
        body.sidebar-mini .sidebar .menu-arrow,
        body.sidebar-mini .sidebar .menu-badge,
        body.sidebar-mini .sidebar .menu-caption,
        body.sidebar-mini .sidebar .sidebar-promo {
            display: none !important;
        }

        body.sidebar-mini .menu>li>a {
            justify-content: center;
            padding-left: 0;
            padding-right: 0;
        }

        body.sidebar-mini .submenu {
            display: none;
        }

        body.sidebar-mini .sidebar-header {
            display: none;
        }

        body .sidebar-header.sidebar-header-mini {
            display: none;
        }

        body.sidebar-mini .sidebar-header.sidebar-header-mini {
            height: 65px;
            width: 65px;
            display: flex;
            padding: 0;
            padding-top: 5px;
            margin-left: 6px;
        }

        body.sidebar-mini .sidebar-header.sidebar-header-mini .brand {
            padding: 10px;
        }

        /* Mini sidebar flyout — positioned via JS to escape parent overflow */
        .submenu.flyout-open {
            display: block !important;
            min-width: 230px !important;
            max-height: none !important;
            padding: .5rem 0 !important;
            margin: 0 !important;
            background: var(--gh-card) !important;
            border: 1px solid var(--gh-border) !important;
            border-radius: var(--gh-radius) !important;
            box-shadow: var(--gh-shadow-lg) !important;
            z-index: 1060 !important;
            overflow: visible !important;
            animation: flyoutIn .18s ease;
        }

        @keyframes flyoutIn {
            from {
                opacity: 0;
                transform: translateX(-6px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* RTL: flyout slides in from the right side */
        [dir="rtl"] .submenu.flyout-open {
            animation-name: flyoutInRtl;
        }

        @keyframes flyoutInRtl {
            from {
                opacity: 0;
                transform: translateX(6px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .submenu.flyout-open li {
            padding: 0;
        }

        .submenu.flyout-open a {
            padding: .55rem 1rem .55rem 1rem !important;
            color: var(--gh-body) !important;
            font-size: .82rem !important;
            font-weight: 500 !important;
            opacity: 1 !important;
            background: transparent !important;
            display: block !important;
        }

        .submenu.flyout-open a::before {
            display: none !important;
        }

        .submenu.flyout-open a:hover {
            background: var(--gh-hover) !important;
            color: var(--gh-primary) !important;
        }

        .submenu.flyout-open a.active {
            background: rgba(var(--gh-primary-rgb), .08) !important;
            color: var(--gh-primary) !important;
            font-weight: 600 !important;
        }

        .submenu.flyout-open::before {
            /* parent label header */
            content: attr(data-flyout-title);
            display: block;
            padding: .55rem 1rem .65rem;
            font-weight: 700;
            font-size: .78rem;
            color: var(--gh-heading);
            text-transform: uppercase;
            letter-spacing: .04em;
            border-bottom: 1px solid var(--gh-border-soft);
            margin: -.5rem 0 .35rem;
        }

        /* Items WITHOUT a submenu in mini mode — show small dark tooltip on hover */
        .menu-tooltip {
            position: fixed;
            background: var(--gh-heading);
            color: var(--gh-card);
            padding: .4rem .75rem;
            font-size: .76rem;
            font-weight: 600;
            border-radius: 8px;
            white-space: nowrap;
            z-index: 1060;
            box-shadow: var(--gh-shadow);
            pointer-events: none;
            animation: flyoutIn .15s ease;
        }

        body.sidebar-mini .brand {
            justify-content: center;
            padding: 0;
        }

        /* Horizontal layout */
        body.layout-horizontal .sidebar {
            display: none;
        }

        body.layout-horizontal .content {
            margin-left: 0;
            padding-top: calc(var(--gh-topbar-h) + 54px);
        }

        body.layout-horizontal .page {
            width: 100%;
            padding: 2rem 2.5rem;
        }

        /* Hide sidebar toggle in horizontal layout — there's no sidebar to toggle */
        body.layout-horizontal [data-toggle="sidebar"] {
            display: none;
        }

        body.layout-horizontal .app-footer {
            max-width: 1480px;
            margin: 0 auto;
            width: 100%;
            padding-left: 2.5rem;
            padding-right: 2.5rem;
            background: transparent;
            border-top: 0;
        }

        @media (max-width: 767.98px) {

            body.layout-horizontal .page,
            body.layout-horizontal .app-footer {
                padding-left: 1.25rem;
                padding-right: 1.25rem;
            }
        }

        body.layout-horizontal .topbar-brandzone {
            width: auto;
            padding-right: 1.5rem;
            border-right: 0;
        }

        body.layout-horizontal .h-nav {
            position: fixed;
            top: var(--gh-topbar-h);
            left: 0;
            right: 0;
            height: 54px;
            background: var(--gh-card);
            border-bottom: 1px solid var(--gh-border);
            z-index: 1020;
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
            gap: .15rem;
            flex-wrap: wrap;
            box-shadow: 0 2px 8px rgba(15, 23, 42, .02);
        }

        body:not(.layout-horizontal) .h-nav {
            display: none !important;
        }

        .h-nav-dd {
            position: static;
        }

        .h-nav-item {
            padding: .55rem 1rem;
            color: var(--gh-body);
            font-weight: 600;
            font-size: .85rem;
            border-radius: 10px;
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            border: 0;
            background: transparent;
            cursor: pointer;
            transition: all .15s ease;
            text-decoration: none;
        }

        .h-nav-item:hover {
            background: var(--gh-hover);
            color: var(--gh-primary);
        }

        .h-nav-item.active,
        .h-nav-item.show {
            background: var(--gh-grad-primary);
            color: #fff;
            box-shadow: 0 6px 16px rgba(var(--gh-primary-rgb), .3);
        }

        .h-nav-item.active:hover,
        .h-nav-item.show:hover {
            color: #fff;
        }

        .h-nav-item.dropdown-toggle::after {
            margin-left: .15rem;
            vertical-align: 0;
            border-top-color: currentColor;
            transition: transform .25s ease;
        }

        .h-nav-item.show::after {
            transform: rotate(180deg);
        }

        /* Horizontal nav dropdowns: hover-to-open, smooth slide-down, CSS-only (no Popper flash) */
        .h-nav .h-nav-dd {
            position: relative;
        }

        .h-nav .h-nav-dd .dropdown-menu {
            display: block !important;
            /* always rendered so transitions fire */
            position: absolute !important;
            top: 100% !important;
            left: 0 !important;
            right: auto !important;
            bottom: auto !important;
            margin: 0 !important;
            margin-top: .55rem !important;
            min-width: 230px;
            padding: .5rem;
            border: 1px solid var(--gh-border);
            border-radius: var(--gh-radius);
            box-shadow: var(--gh-shadow-lg);
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transform: translateY(10px) scale(.98);
            transform-origin: top center;
            transition: opacity .22s ease, transform .22s ease, visibility 0s linear .22s;
            animation: none;
            /* kill any prior keyframe animation */
        }

        .h-nav .h-nav-dd:hover>.dropdown-menu,
        .h-nav .h-nav-dd:focus-within>.dropdown-menu {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
            transform: translateY(0) scale(1);
            transition: opacity .22s ease, transform .22s ease, visibility 0s linear 0s;
        }

        /* Invisible bridge between trigger and dropdown — keeps hover stable across the gap */
        .h-nav .h-nav-dd .dropdown-menu::before {
            content: '';
            position: absolute;
            top: -12px;
            left: 0;
            right: 0;
            height: 12px;
            background: transparent;
        }

        /* Trigger button active state while hovered */
        .h-nav .h-nav-dd:hover>.h-nav-item,
        .h-nav .h-nav-dd:focus-within>.h-nav-item {
            background: var(--gh-grad-primary);
            color: #fff;
            box-shadow: 0 6px 16px rgba(var(--gh-primary-rgb), .3);
        }

        .h-nav .h-nav-dd:hover>.h-nav-item::after,
        .h-nav .h-nav-dd:focus-within>.h-nav-item::after {
            transform: rotate(180deg);
            border-top-color: #fff;
        }

        /* Last few dropdowns flip to right-aligned to avoid overflow */
        .h-nav .h-nav-dd:nth-last-of-type(-n+2)>.dropdown-menu:not(.h-nav-mega) {
            left: auto !important;
            right: 0 !important;
        }

        .h-nav .dropdown-item {
            padding: .55rem .75rem;
            font-size: .82rem;
            font-weight: 500;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: .55rem;
            color: var(--gh-body);
        }

        .h-nav .dropdown-item:hover,
        .h-nav .dropdown-item:focus {
            background: var(--gh-hover);
            color: var(--gh-primary);
        }

        .h-nav .dropdown-item.active,
        .h-nav .dropdown-item:active {
            background: var(--gh-grad-primary);
            color: #fff;
        }

        .h-nav .dropdown-item i {
            font-size: 1.05rem;
            opacity: .85;
            width: 20px;
            text-align: center;
        }

        .h-nav .dropdown-header {
            padding: .65rem .75rem .35rem;
            font-size: .68rem;
            font-weight: 800;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--gh-muted);
        }

        .h-nav .dropdown-divider {
            margin: .35rem 0;
            border-color: var(--gh-border-soft);
        }

        /* Mega menu (multi-column) variant — centered under trigger */
        .h-nav .h-nav-mega {
            min-width: 620px !important;
            left: 50% !important;
            right: auto !important;
            transform: translate(-50%, 10px) scale(.98) !important;
            transform-origin: top center !important;
        }

        .h-nav .h-nav-dd:hover>.h-nav-mega,
        .h-nav .h-nav-dd:focus-within>.h-nav-mega {
            transform: translate(-50%, 0) scale(1) !important;
        }

        .h-nav-mega .mega-col {
            padding: .35rem;
        }

        .h-nav-mega .mega-feature {
            background: linear-gradient(135deg, rgba(var(--gh-primary-rgb), .08), rgba(34, 211, 238, .06));
            border-radius: 12px;
            padding: 1.1rem;
            height: 100%;
        }

        .h-nav-mega .mega-feature h6 {
            font-size: .9rem;
            margin: 0 0 .35rem 0;
            color: var(--gh-heading);
        }

        .h-nav-mega .mega-feature p {
            font-size: .76rem;
            color: var(--gh-muted);
            margin: 0 0 .65rem 0;
        }

        @media (max-width: 991.98px) {
            .h-nav-mega {
                min-width: 280px !important;
                left: 0 !important;
                transform: none !important;
            }
        }

        /* ====================================================================
   BOXED LAYOUT — entire template centered as a card on a contrast bg
   ==================================================================== */
        body.layout-boxed {
            background: #d8dbe8;
            background-image: var(--gh-bg-pattern);
            background-size: 28px 28px;
        }

        [data-bs-theme="dark"] body.layout-boxed {
            background: #05071a;
            background-image: radial-gradient(circle at 1px 1px, rgba(139, 92, 246, .10) 1px, transparent 0);
        }

        body.layout-boxed .app {
            max-width: 1480px;
            margin: 0 auto;
            background: var(--gh-bg);
            background-image: var(--gh-bg-pattern);
            background-size: 28px 28px;
            min-height: 100vh;
            position: relative;
            box-shadow: 0 0 80px rgba(15, 23, 42, .18), 0 16px 40px rgba(15, 23, 42, .10);
        }

        /* Constrain fixed topbar and sidebar to within the boxed area */
        @media (min-width: 1481px) {
            body.layout-boxed .topbar {
                left: calc(50vw - 740px) !important;
                right: calc(50vw - 740px) !important;
            }

            body.layout-boxed .sidebar {
                left: calc(50vw - 740px) !important;
            }
        }

        /* Mobile sidebar drawer still works inside the boxed area */
        @media (max-width: 991.98px) {
            body.layout-boxed .sidebar {
                left: 0 !important;
            }
        }

        /* Mobile sidebar */
        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .content {
                margin-left: 0 !important;
            }

            body.sidebar-open .sidebar {
                transform: translateX(0);
            }

            body.sidebar-open .backdrop {
                display: block;
            }

            .topbar-brandzone {
                width: auto !important;
            }
        }

        .backdrop {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(10, 12, 28, .55);
            z-index: 1035;
            backdrop-filter: blur(2px);
        }

        /* ============== Brand ============== */
        .brand {
            display: inline-flex;
            align-items: center;
            gap: .65rem;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            color: #fff;
            font-size: 1.35rem;
            letter-spacing: -.02em;
            text-decoration: none;
            height: 100%;
            width: 100%;
            padding-right: 10px;
            /* background-color: #fff; */
            /* border-radius: 50px;
  border-top-left-radius: 0px;
  border-bottom-left-radius: 0px;
  box-shadow: 1px 3px 8px rgb(183 183 183 / 54%); */
        }

        .topbar .brand {
            color: var(--gh-heading);
        }

        .brand-mark {
            width: 38px;
            height: 38px;
            border-radius: 11px;
            background: var(--gh-grad-primary);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 800;
            font-size: 1.05rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(91, 61, 240, .4);
        }

        .brand-mark::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, transparent 0%, rgba(255, 255, 255, .25) 50%, transparent 100%);
        }

        .brand-mark::after {
            content: "";
            position: absolute;
            right: -8px;
            top: -8px;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: var(--gh-accent);
        }

        /* ============== Topbar ============== */
        .topbar-brandzone {
            width: var(--gh-sidebar-w);
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
            height: 100%;
            transition: width .3s cubic-bezier(.4, .0, .2, 1);
        }

        body.sidebar-mini .topbar-brandzone {
            width: var(--gh-sidebar-w-mini);
            padding: 0;
            justify-content: center;
        }

        .topbar-inner {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 15px;
            gap: 1rem;
        }

        .topbar-left,
        .topbar-right {
            display: flex;
            align-items: center;
            gap: .35rem;
        }

        .icon-btn {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: transparent;
            border: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--gh-body);
            position: relative;
            transition: background .15s, color .15s, transform .12s;
            cursor: pointer;
        }

        .icon-btn:hover {
            background: var(--gh-hover);
            color: var(--gh-primary);
        }

        .icon-btn:active {
            transform: scale(.94);
        }

        .icon-btn i {
            font-size: 1.3rem;
        }

        .icon-btn .badge-dot {
            position: absolute;
            top: 10px;
            right: 11px;
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: var(--gh-danger);
            box-shadow: 0 0 0 3px var(--gh-card);
            /* animation: pulse 2s infinite; */
        }

        .icon-btn .badge-num {
            position: absolute;
            top: 6px;
            right: 5px;
            min-width: 18px;
            height: 18px;
            padding: 0 5px;
            background: var(--gh-grad-warm);
            color: #fff;
            font-size: .65rem;
            font-weight: 800;
            line-height: 18px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 0 2px var(--gh-card);
        }

        @keyframes pulse {

            0%,
            100% {
                box-shadow: 0 0 0 3px var(--gh-card);
            }

            50% {
                box-shadow: 0 0 0 3px var(--gh-card), 0 0 0 6px rgba(244, 63, 94, .4);
            }
        }

        .topbar-search {
            position: relative;
            max-width: 340px;
            flex: 1;
        }

        .topbar-search input {
            width: 100%;
            height: 42px;
            padding: 0 1rem 0 2.6rem;
            background: var(--gh-input-bg);
            border: 1px solid transparent;
            border-radius: 12px;
            color: var(--gh-body);
            font-size: .85rem;
            transition: all .15s;
        }

        .topbar-search input:focus {
            outline: none;
            border-color: var(--gh-primary);
            background: var(--gh-card);
            box-shadow: var(--gh-glow);
        }

        .topbar-search>i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gh-muted);
            font-size: 1.1rem;
        }

        .topbar-search kbd {
            position: absolute;
            right: .65rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: .65rem;
            background: var(--gh-border-soft);
            color: var(--gh-muted);
            padding: .15rem .4rem;
            border-radius: 4px;
            font-family: 'JetBrains Mono', monospace;
        }

        @media (max-width: 767.98px) {
            .topbar-search {
                display: none;
            }
        }

        .user-menu-btn {
            width: auto;
            padding: 5px 10px 5px 5px;
            gap: .55rem;
        }

        .user-menu-btn .user-info {
            line-height: 1.15;
            text-align: left;
        }

        .user-menu-btn .user-info small {
            color: var(--gh-muted);
            font-size: .7rem;
            font-weight: 500;
        }

        .user-menu-btn .user-info strong {
            font-size: .82rem;
            color: var(--gh-heading);
            display: block;
            font-weight: 700;
        }

        @media (max-width: 575.98px) {
            .user-menu-btn .user-info {
                display: none;
            }
        }

        /* Avatars */
        .avatar,
        .avatar-sm,
        .avatar-lg,
        .avatar-xl,
        .avatar-xxl {
            border-radius: 50%;
            object-fit: cover;
            display: inline-block;
        }

        .avatar {
            width: 38px;
            height: 38px;
        }

        .avatar-sm {
            width: 30px;
            height: 30px;
        }

        .avatar-lg {
            width: 56px;
            height: 56px;
        }

        .avatar-xl {
            width: 96px;
            height: 96px;
        }

        .avatar-xxl {
            width: 128px;
            height: 128px;
        }

        .avatar-square {
            border-radius: 10px;
        }

        .avatar-init {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: #fff;
        }

        .avatar-group {
            display: inline-flex;
        }

        .avatar-group>* {
            margin-left: -10px;
            border: 2.5px solid var(--gh-card);
            transition: transform .15s;
        }

        .avatar-group>*:first-child {
            margin-left: 0;
        }

        .avatar-group>*:hover {
            transform: translateY(-3px);
            z-index: 2;
        }

        .status-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
        }

        .status-online {
            background: var(--gh-success);
            box-shadow: 0 0 0 3px rgba(20, 184, 166, .25);
        }

        .status-busy {
            background: var(--gh-danger);
        }

        .status-away {
            background: var(--gh-warning);
        }

        .status-offline {
            background: var(--gh-muted);
        }

        .has-status {
            position: relative;
        }

        .has-status .status-dot {
            position: absolute;
            bottom: 0;
            right: 0;
            border: 2px solid var(--gh-card);
        }

        /* ============== Dropdowns ============== */
        .dropdown-menu {
            border: 1px solid var(--gh-border);
            background: var(--gh-card);
            color: var(--gh-body);
            border-radius: var(--gh-radius);
            box-shadow: var(--gh-shadow-lg);
            padding: .5rem;
            min-width: 240px;
        }

        .dropdown-item {
            color: var(--gh-body);
            border-radius: 8px;
            padding: .55rem .75rem;
            font-size: .85rem;
        }

        .dropdown-item:hover,
        .dropdown-item:focus {
            background: var(--gh-hover);
            color: var(--gh-primary);
        }

        .dropdown-item.text-danger:hover {
            background: rgba(244, 63, 94, .1);
            color: var(--gh-danger);
        }

        .dropdown-divider {
            border-color: var(--gh-border);
            margin: .35rem 0;
        }

        .dropdown-header {
            color: var(--gh-muted);
            font-size: .68rem;
            text-transform: uppercase;
            letter-spacing: .08em;
            font-weight: 800;
            padding: .4rem .75rem;
        }

        .dropdown-wide {
            min-width: 360px;
        }

        .notif-list {
            max-height: 360px;
            overflow: auto;
        }

        .notif-item {
            display: flex;
            gap: .75rem;
            padding: .65rem;
            border-radius: 10px;
        }

        .notif-item:hover {
            background: var(--gh-hover);
        }

        .notif-ic {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 1.05rem;
        }

        .notif-meta {
            font-size: .8rem;
            line-height: 1.35;
            flex: 1;
            min-width: 0;
        }

        .notif-meta small {
            color: var(--gh-muted);
            font-size: .7rem;
        }

        .apps-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: .35rem;
        }

        .apps-grid a {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: .4rem;
            padding: .95rem .5rem;
            border-radius: 12px;
            color: var(--gh-body);
            text-align: center;
            font-size: .75rem;
            font-weight: 500;
            text-decoration: none;
            transition: all .15s;
        }

        .apps-grid a:hover {
            background: var(--gh-hover);
            color: var(--gh-primary);
            transform: translateY(-2px);
        }

        .apps-grid a i {
            font-size: 1.5rem;
        }

        /* ============== Sidebar menu ============== */
        .sidebar-header {
            height: var(--gh-topbar-h);
            /* padding: 0 1.5rem; */
            padding: 10px;
            margin-left: 0;
            display: flex;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .sidebar-inner {
            flex: 1;
            overflow-y: auto;
            padding: 1.25rem 0 1rem;
            padding-top: 0;
            position: relative;
            z-index: 1;
        }

        .sidebar-inner::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-inner::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, .08);
            border-radius: 4px;
        }

        .menu,
        .submenu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu-caption {
            padding: 1.25rem 1.5rem .4rem;
            font-size: .68rem;
            text-transform: uppercase;
            letter-spacing: .12em;
            color: var(--gh-sidebar-caption);
            font-weight: 800;
        }

        .menu>li {
            /* padding: 0 .75rem; */
            margin-bottom: 2px;
        }

        .largeView {
            display: none;
        }

        .sidebar-mini .app .topbar .topbar-inner .topbar-left .largeView {
            display: block !important;
        }

        .menu>li>a {
            display: flex;
            align-items: center;
            gap: .85rem;
            padding: .65rem .85rem;
            color: #707595;
            font-size: .85rem;
            font-weight: 500;
            text-decoration: none;
            position: relative;
            /* border-radius: 12px; */
            transition: all .2s;
        }

        .menu>li>a.active::before {
            background: rgb(7 119 1 / 10%);
            opacity: 1;
        }

        .menu>li>a.active i {
            color: var(--gh-primary);
        }

        .menu>li>a>i {
            font-size: 1.25rem;
            flex-shrink: 0;
            width: 22px;
            text-align: center;
            opacity: .85;
        }

        .menu>li>a:hover {
            background: rgba(255, 255, 255, .05);
        }

        .menu>li>a:hover>i {
            opacity: 1;
        }

        .menu-arrow {
            margin-left: auto;
            transition: transform .25s;
            font-size: .9rem;
            opacity: .7;
        }

        .menu>li.open>a .menu-arrow {
            transform: rotate(90deg);
            opacity: 1;
        }

        .menu>li.active>a {
            background: var(--gh-grad-primary);
            color: #fff;
            font-weight: 600;
            box-shadow: 0 8px 20px rgba(91, 61, 240, .4);
        }

        .menu>li.active>a>i {
            opacity: 1;
        }

        .menu>li.active>a::after {
            content: "";
            position: absolute;
            right: -.75rem;
            top: 50%;
            transform: translateY(-50%);
            width: 5px;
            height: 30px;
            border-radius: 5px 0 0 5px;
            background: var(--gh-accent);
            box-shadow: 0 0 12px var(--gh-accent);
        }

        .menu-badge {
            margin-left: auto;
            padding: .18rem .5rem;
            font-size: .65rem;
            font-weight: 800;
            border-radius: 6px;
            background: var(--gh-grad-warm);
            color: #fff;
            text-transform: uppercase;
            letter-spacing: .04em;
        }

        .menu-badge.bg-success {
            background: var(--gh-grad-cool);
        }

        .menu-badge.bg-info {
            background: var(--gh-grad-accent);
        }

        /* Submenu base — display:block always, control visibility via max-height (slide animation) */
        .submenu {
            padding-left: 0;
            max-height: 0;
            overflow: hidden;
            transition: max-height .3s ease, padding .3s ease;
            padding-top: 0;
            display: block;
            /* always rendered so transitions work */
            visibility: visible;
        }

        /* Open only via click (.open) in expanded vertical mode — no hover */
        .menu>li.open>.submenu {
            max-height: 1200px;
            padding-top: .3rem;
        }

        .menu>li.open>a .menu-arrow {
            transform: rotate(90deg);
        }

        /* Ensure no ancestor clips the inline submenu */
        .sidebar .menu,
        .sidebar .menu>li {
            overflow: visible;
        }

        .submenu li {
            padding: 0;
        }

        .submenu a {
            display: block;
            padding: .45rem .85rem .45rem 3rem;
            font-size: .8rem;
            color: var(--gh-sidebar-color);
            text-decoration: none;
            border-radius: 10px;
            position: relative;
            opacity: .85;
            transition: all .15s;
        }

        .submenu a::before {
            content: "";
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .25);
            position: absolute;
            left: 2.05rem;
            top: 50%;
            transform: translateY(-50%);
            transition: all .15s;
        }

        .submenu a:hover {
            opacity: 1;
            background: rgba(255, 255, 255, .05);
        }

        .submenu a:hover::before {
            background: var(--gh-accent);
            box-shadow: 0 0 8px var(--gh-accent);
        }

        .submenu a.active {
            color: #fff;
            font-weight: 600;
            opacity: 1;
            background: rgba(255, 255, 255, .06);
        }

        .submenu a.active::before {
            background: var(--gh-accent);
            box-shadow: 0 0 8px var(--gh-accent);
        }

        .sidebar-promo {
            margin: 1rem .75rem;
            padding: 1.25rem;
            border-radius: var(--gh-radius);
            background: linear-gradient(140deg, rgba(91, 61, 240, .4) 0%, rgba(34, 211, 238, .25) 100%);
            border: 1px solid rgba(255, 255, 255, .08);
            text-align: center;
            color: #fff;
            position: relative;
            overflow: hidden;
        }

        .sidebar-promo::before {
            content: "";
            position: absolute;
            top: -40px;
            right: -40px;
            width: 110px;
            height: 110px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .08);
        }

        .sidebar-promo h6 {
            color: #fff;
            font-size: .95rem;
            margin-bottom: .35rem;
            position: relative;
        }

        .sidebar-promo p {
            font-size: .75rem;
            opacity: .8;
            margin-bottom: .85rem;
            position: relative;
        }

        .sidebar-promo .btn {
            position: relative;
            font-weight: 600;
        }

        /* ============== Page header ============== */
        .page-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .page-head h1 {
            font-size: 1.45rem;
            margin: 0 0 .25rem;
            font-weight: 800;
        }

        .page-head .lead-sub {
            color: var(--gh-muted);
            font-size: .85rem;
            margin: 0;
        }

        .page-head .breadcrumb {
            margin: 0;
            font-size: .78rem;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            color: var(--gh-muted);
            content: "›";
        }

        .breadcrumb-item a {
            color: var(--gh-muted);
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: var(--gh-primary);
            font-weight: 600;
        }

        /* ============== Cards ============== */
        .card {
            background: var(--gh-card);
            border: 1px solid var(--gh-border);
            border-radius: var(--gh-radius);
            box-shadow: var(--gh-shadow-xs);
            color: var(--gh-body);
            position: relative;
        }

        .card-header {
            background: transparent;
            border-bottom: 1px solid var(--gh-border-soft);
            padding: 1.1rem 1.35rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: .75rem;
        }

        .card-header h5,
        .card-header h6,
        .card-header .card-title {
            margin: 0;
            font-size: 1rem;
            font-weight: 700;
        }

        .card-body>.card-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: .35rem;
            color: var(--gh-heading);
        }

        .card-body>.card-subtitle {
            font-size: .8rem;
            font-weight: 500;
            color: var(--gh-muted);
            margin-top: 0;
        }

        .card-body .card-text {
            font-size: .87rem;
            line-height: 1.55;
            color: var(--gh-body);
        }

        .card-body .card-link {
            font-size: .82rem;
            font-weight: 600;
            margin-right: .85rem;
        }

        .card-header .small-sub {
            color: var(--gh-muted);
            font-size: .76rem;
            margin: .15rem 0 0;
        }

        .card-body {
            padding: 1.35rem;
        }

        /* ---- Chart containers fill their card body width ---- */
        .card-body>[id^="apex"],
        .card-body>[id^="ec"],
        .card-body>[id^="dash"],
        .card-body>[id^="live"],
        .card-body>[id^="cmp"],
        .card-body>[id^="ms"],
        .card-body>[id^="cjs"],
        .card-body>[id^="goal"],
        .card-body>[id^="kpi"],
        .card-body>[id^="sales"],
        .card-body>[id^="routes"],
        .card-body>[id^="hm"],
        .card-body>[id^="sp"],
        .card-body>[id^="srv"],
        .card-body>[id^="tkr"],
        .card-body>[id^="varL"],
        .card-body>[id^="varA"],
        .card-body>[id^="varB"],
        .card-body>[id^="act"],
        .card-body>[id^="lb"],
        .card-body>[id^="worldMap"],
        .card-body>[id^="liveMap"],
        .card-body>[id^="salesMap"],
        .card-body>[id^="routesMap"],
        .card-body>canvas {
            width: 100% !important;
            max-width: 100%;
        }

        .card-body {
            overflow-x: hidden;
        }

        .card-body .apexcharts-canvas svg,
        .card-body .apexcharts-canvas {
            max-width: 100% !important;
        }

        /* RTL: invert visual flow of chart canvas (Apex/Chart.js/ECharts content stays same coords,
   but mirror the canvas so axes/legends read right-to-left as a visual quick-fix) */
        [dir="rtl"] .card-body .apexcharts-toolbar {
            left: 0 !important;
            right: auto !important;
        }

        [dir="rtl"] .card-body .apexcharts-legend {
            direction: rtl;
        }

        [dir="rtl"] .card-body .apexcharts-tooltip {
            direction: rtl;
            text-align: right;
        }

        .card-footer {
            background: transparent;
            border-top: 1px solid var(--gh-border-soft);
            padding: .9rem 1.35rem;
        }

        /* Card with accent ribbon */
        .card-ribbon {
            overflow: hidden;
        }

        .card-ribbon::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gh-grad-primary);
        }

        .card-ribbon.ribbon-cool::before {
            background: var(--gh-grad-cool);
        }

        .card-ribbon.ribbon-warm::before {
            background: var(--gh-grad-warm);
        }

        .card-ribbon.ribbon-mint::before {
            background: var(--gh-grad-mint);
        }

        .card-ribbon.ribbon-rose::before {
            background: var(--gh-grad-rose);
        }

        .card-ribbon.ribbon-amber::before {
            background: var(--gh-grad-amber);
        }

        /* Solid gradient card */
        .card-solid {
            border: 0;
            color: #fff;
            background: var(--gh-grad-primary);
            box-shadow: 0 16px 40px rgba(91, 61, 240, .35);
        }

        .card-solid.solid-cool {
            background: var(--gh-grad-cool);
            box-shadow: 0 16px 40px rgba(14, 165, 233, .3);
        }

        .card-solid.solid-warm {
            background: var(--gh-grad-warm);
            box-shadow: 0 16px 40px rgba(244, 63, 94, .3);
        }

        .card-solid.solid-mint {
            background: var(--gh-grad-mint);
            box-shadow: 0 16px 40px rgba(20, 184, 166, .3);
        }

        .card-solid.solid-amber {
            background: var(--gh-grad-amber);
            box-shadow: 0 16px 40px rgba(245, 158, 11, .3);
        }

        .card-solid h1,
        .card-solid h2,
        .card-solid h3,
        .card-solid h4,
        .card-solid h5,
        .card-solid h6 {
            color: #fff;
        }

        .card-solid .card-header {
            border-color: rgba(255, 255, 255, .18);
        }

        .card-solid .text-muted {
            color: rgba(255, 255, 255, .75) !important;
        }

        .card-solid::after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .08);
            transform: translate(40%, -40%);
            pointer-events: none;
        }

        /* Stat tile - unique block */
        .stat-tile {
            padding: 1.35rem;
            position: relative;
            overflow: hidden;
        }

        .stat-icon-wrap {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: var(--gh-grad-primary);
            color: #fff;
            font-size: 1.4rem;
            flex-shrink: 0;
            /* box-shadow: 0 10px 24px rgba(91,61,240,.35); */
        }

        .stat-icon-wrap.cool {
            background: var(--gh-grad-cool);
        }

        .stat-icon-wrap.warm {
            background: var(--gh-grad-warm);
        }

        .stat-icon-wrap.mint {
            background: var(--gh-grad-mint);
        }

        .stat-icon-wrap.amber {
            background: var(--gh-grad-amber);
        }

        .stat-icon-wrap.rose {
            background: var(--gh-grad-rose);
            box-shadow: 0 10px 24px rgba(244, 63, 94, .3);
        }

        .stat-tile .stat-label {
            color: var(--gh-muted);
            font-size: .78rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .06em;
            margin-bottom: .35rem;
        }

        .stat-tile .stat-value {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--gh-primary);
            font-family: 'Plus Jakarta Sans', sans-serif;
            line-height: 1.05;
            letter-spacing: -0.02em;
        }

        .stat-tile .stat-delta {
            display: inline-flex;
            align-items: center;
            gap: .25rem;
            font-size: .75rem;
            font-weight: 700;
            padding: .2rem .5rem;
            border-radius: 8px;
        }

        .stat-tile .stat-delta.up {
            background: rgba(20, 184, 166, .12);
            color: var(--gh-success);
        }

        .stat-tile .stat-delta.down {
            background: rgba(244, 63, 94, .12);
            color: var(--gh-danger);
        }

        .stat-tile .stat-extra {
            font-size: .73rem;
            color: var(--gh-muted);
            margin-left: .5rem;
        }

        .stat-tile .stat-corner {
            position: absolute;
            bottom: -25px;
            right: -25px;
            width: 110px;
            height: 110px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(91, 61, 240, .06), transparent);
            pointer-events: none;
        }

        /* Hero metric card (one big number) */
        .hero-metric {
            padding: 1.5rem 1.75rem;
            position: relative;
            overflow: hidden;
            background: var(--gh-grad-primary);
            color: #fff;
            border-radius: var(--gh-radius-lg);
            /* box-shadow: 0 20px 50px rgba(91,61,240,.4); */
        }

        .hero-metric::before {
            content: "";
            position: absolute;
            top: -50%;
            right: -10%;
            width: 80%;
            height: 200%;
            background: radial-gradient(circle, rgba(34, 211, 238, .3) 0%, transparent 60%);
        }

        @media (max-width:577px) {
            .hero-metric::before {
                width: 200% !important;
            }
        }


        .hero-metric .hero-label {
            font-size: .8rem;
            text-transform: uppercase;
            letter-spacing: .08em;
            font-weight: 600;
            opacity: .85;
            position: relative;
        }

        .hero-metric .hero-value {
            font-size: 3rem;
            font-weight: 800;
            line-height: 1.1;
            font-family: 'Plus Jakarta Sans', sans-serif;
            position: relative;
        }

        .hero-metric .hero-desc {
            font-size: .85rem;
            opacity: .85;
            position: relative;
        }

        /* ============== Buttons ============== */
        .btn {
            font-weight: 600;
            border-radius: 10px;
            padding: .55rem 1.1rem;
            font-size: .85rem;
            transition: all .15s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0;
        }

        .btn-sm {
            padding: .4rem .8rem;
            font-size: .78rem;
            border-radius: 8px;
        }

        .btn-lg {
            padding: .75rem 1.4rem;
            font-size: .95rem;
            border-radius: 12px;
        }

        .btn:active {
            transform: scale(.97);
        }

        .btn-primary {
            background: var(--gh-grad-primary);
            border: 0;
            color: #fff;
            /* box-shadow: 0 6px 18px rgba(91,61,240,.35); */
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background: var(--gh-grad-primary);
            color: #fff;
            transform: translateY(-1px);
        }

        .btn-accent {
            background: var(--gh-grad-accent);
            color: #fff;
            border: 0;
            box-shadow: 0 6px 18px rgba(34, 211, 238, .35);
        }

        .btn-warm {
            background: var(--gh-grad-warm);
            color: #fff;
            border: 0;
            box-shadow: 0 6px 18px rgba(244, 63, 94, .3);
        }

        .btn-mint {
            background: var(--gh-grad-mint);
            color: #fff;
            border: 0;
            box-shadow: 0 6px 18px rgba(20, 184, 166, .3);
        }

        .btn-light {
            background: var(--gh-card);
            color: var(--gh-heading);
            border: 1px solid var(--gh-border);
        }

        .btn-light:hover {
            background: var(--gh-hover);
            border-color: var(--gh-border);
            color: var(--gh-primary);
        }

        .btn-soft-primary {
            background: #e6f1e5;
            color: var(--gh-primary);
            border: 0;
        }

        .btn-soft-primary:hover {
            background: var(--gh-primary);
            color: #fff;
        }

        .btn-soft-success {
            background: rgba(20, 184, 166, .1);
            color: var(--gh-success);
            border: 0;
        }

        .btn-soft-success:hover {
            background: var(--gh-success);
            color: #fff;
        }

        .btn-soft-info {
            background: rgba(14, 165, 233, .1);
            color: var(--gh-info);
            border: 0;
        }

        .btn-soft-info:hover {
            background: var(--gh-info);
            color: #fff;
        }

        .btn-soft-warning {
            background: rgba(245, 158, 11, .12);
            color: var(--gh-warning);
            border: 0;
        }

        .btn-soft-warning:hover {
            background: var(--gh-warning);
            color: #fff;
        }

        .btn-soft-danger {
            background: rgba(244, 63, 94, .1);
            color: var(--gh-danger);
            border: 0;
        }

        .btn-soft-danger:hover {
            background: var(--gh-danger);
            color: #fff;
        }

        .btn-soft-secondary {
            background: var(--gh-hover);
            color: var(--gh-body);
            border: 0;
        }

        .btn-soft-secondary:hover {
            background: var(--gh-border);
            color: var(--gh-heading);
        }

        .btn-outline-primary {
            color: var(--gh-primary);
            border: 1.5px solid var(--gh-primary);
            background: transparent;
        }

        .btn-outline-primary:hover {
            background: var(--gh-primary);
            color: #fff;
        }

        .btn-icon {
            width: 40px;
            height: 40px;
            padding: 0;
        }

        .btn-icon i {
            font-size: 1.05rem;
        }

        .btn-icon.btn-sm {
            width: 34px;
            height: 34px;
        }

        /* ============== Badges ============== */
        .badge {
            padding: .35em .65em;
            font-weight: 700;
            font-size: .68rem;
            border-radius: 6px;
            letter-spacing: .02em;
            line-height: inherit;
        }

        .badge.bg-primary {
            background: var(--gh-primary) !important;
        }

        .badge-soft-primary {
            background: #e6f1e5;
            color: var(--gh-primary);
        }

        .badge-soft-success {
            background: rgba(20, 184, 166, .12);
            color: var(--gh-success);
        }

        .badge-soft-info {
            background: rgba(14, 165, 233, .12);
            color: var(--gh-info);
        }

        .badge-soft-warning {
            background: rgba(245, 158, 11, .14);
            color: var(--gh-warning);
        }

        .badge-soft-danger {
            background: rgba(244, 63, 94, .12);
            color: var(--gh-danger);
        }

        .badge-soft-secondary {
            background: var(--gh-hover);
            color: var(--gh-body);
        }

        .badge-gradient {
            background: var(--gh-grad-primary);
            color: #fff;
        }

        /* ============== Forms ============== */
        .form-control,
        .form-select {
            background: var(--gh-input-bg);
            border: 1px solid var(--gh-input-border);
            color: var(--gh-body);
            padding: .6rem .85rem;
            font-size: .85rem;
            border-radius: 10px;
            transition: all .15s;
        }

        .form-control:focus,
        .form-select:focus {
            background: var(--gh-card);
            color: var(--gh-body);
            border-color: var(--gh-primary);
            box-shadow: var(--gh-glow);
        }

        .form-control::placeholder {
            color: var(--gh-muted);
        }

        .form-label {
            font-size: .8rem;
            font-weight: 600;
            margin-bottom: .4rem;
            color: var(--gh-heading);
        }

        .input-group-text {
            background: var(--gh-input-bg);
            border: 1px solid var(--gh-input-border);
            color: var(--gh-muted);
            font-size: .85rem;
            border-radius: 10px;
        }

        .form-check-input {
            background-color: var(--gh-input-bg);
            border-color: var(--gh-input-border);
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: var(--gh-primary);
            border-color: var(--gh-primary);
        }

        .form-check-input:focus {
            box-shadow: var(--gh-glow);
        }

        .form-switch .form-check-input {
            width: 2.4em;
            height: 1.3em;
        }

        /* ============== Tables ============== */
        .table {
            color: var(--gh-body);
            --bs-table-bg: transparent;
            vertical-align: middle;
            font-size: 13px;
        }

        .table> :not(caption)>*>* {
            padding: .9rem 1.1rem;
            border-bottom-color: var(--gh-border-soft);
        }

        .table>thead th {
            font-weight: 700;
            font-size: .72rem;
            text-transform: uppercase;
            letter-spacing: .06em;
            /* color: var(--gh-muted); */
            background: transparent;
            border-bottom: 1px solid var(--gh-border);
            padding-top: 1rem;
            padding-bottom: 1rem;
            background: color-mix(in srgb, var(--gh-primary) 5%, transparent);
        }

        .table-hover>tbody>tr {
            transition: background .12s;
        }

        .table-hover>tbody>tr:hover>* {
            background: var(--gh-hover);
            --bs-table-accent-bg: transparent;
        }

        .table-borderless> :not(caption)>*>* {
            border: 0;
        }

        /* ============== Tabs ============== */
        .nav-tabs {
            border-bottom: 1px solid var(--gh-border);
            gap: .25rem;
        }

        .nav-tabs .nav-link {
            color: var(--gh-body);
            border: 0;
            padding: .7rem 1.1rem;
            font-weight: 600;
            font-size: .85rem;
            border-bottom: 2px solid transparent;
            border-radius: 0;
        }

        .nav-tabs .nav-link:hover {
            color: var(--gh-primary);
            border-color: transparent;
        }

        .nav-tabs .nav-link.active {
            color: var(--gh-primary);
            background: transparent;
            border-bottom-color: var(--gh-primary);
        }

        .nav-pills {
            gap: .35rem;
        }

        .nav-pills .nav-link {
            color: var(--gh-body);
            padding: .55rem 1rem;
            border-radius: 10px;
            font-size: .85rem;
            font-weight: 600;
        }

        .nav-pills .nav-link.active {
            background: var(--gh-grad-primary);
            color: #fff;
        }

        .nav-pills .nav-link:hover:not(.active) {
            background: var(--gh-hover);
            color: var(--gh-primary);
        }

        /* ============== Modal/Offcanvas ============== */
        .modal-content {
            background: var(--gh-card);
            border: 1px solid var(--gh-border);
            border-radius: var(--gh-radius);
            color: var(--gh-body);
            box-shadow: var(--gh-shadow-lg);
        }

        .modal-header,
        .modal-footer {
            border-color: var(--gh-border);
        }

        .modal-header {
            padding: 1.25rem 1.5rem;
        }

        .modal-body {
            background: #f8f9fc;
            padding: 1.5rem;
        }

        .offcanvas {
            background: var(--gh-card);
            border-color: var(--gh-border);
            color: var(--gh-body);
        }

        .offcanvas-header {
            border-bottom: 1px solid var(--gh-border);
            padding: 1.25rem 1.5rem;
        }

        /* ============== Progress ============== */
        .progress {
            background: var(--gh-hover);
            border-radius: 12px;
            height: 8px;
            overflow: hidden;
        }

        .progress-bar {
            background: var(--gh-grad-primary);
            border-radius: inherit;
        }

        .progress-bar.bg-success {
            background: var(--gh-grad-mint) !important;
        }

        .progress-bar.bg-warning {
            background: var(--gh-grad-amber) !important;
        }

        .progress-bar.bg-danger {
            background: var(--gh-grad-warm) !important;
        }

        .progress-bar.bg-info {
            background: var(--gh-grad-cool) !important;
        }

        .progress-sm {
            height: 5px;
        }

        .progress-lg {
            height: 16px;
            font-size: .7rem;
            font-weight: 700;
        }

        .progress-xl {
            height: 22px;
            font-size: .75rem;
            font-weight: 700;
        }

        /* ============== Alerts ============== */
        .alert {
            border-radius: var(--gh-radius-sm);
            border: 1px solid transparent;
            padding: .9rem 1.1rem;
            font-size: .85rem;
            display: flex;
            align-items: flex-start;
            gap: .65rem;
        }

        .alert-primary {
            background: rgba(91, 61, 240, .08);
            color: var(--gh-primary);
            border-color: rgba(91, 61, 240, .18);
        }

        .alert-success {
            background: rgba(20, 184, 166, .08);
            color: var(--gh-success);
            border-color: rgba(20, 184, 166, .18);
        }

        .alert-info {
            background: rgba(14, 165, 233, .08);
            color: var(--gh-info);
            border-color: rgba(14, 165, 233, .18);
        }

        .alert-warning {
            background: rgba(245, 158, 11, .08);
            color: var(--gh-warning);
            border-color: rgba(245, 158, 11, .18);
        }

        .alert-danger {
            background: rgba(244, 63, 94, .08);
            color: var(--gh-danger);
            border-color: rgba(244, 63, 94, .18);
        }

        /* ============== Customizer ============== */
        .cz-section {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--gh-border-soft);
        }

        .cz-section h6 {
            font-size: .72rem;
            font-weight: 800;
            margin-bottom: .85rem;
            color: var(--gh-heading);
            text-transform: uppercase;
            letter-spacing: .08em;
        }

        .cz-swatches {
            display: grid;
            grid-template-columns: repeat(8, 1fr);
            gap: .5rem;
        }

        .cz-swatch {
            aspect-ratio: 1;
            border-radius: 10px;
            cursor: pointer;
            border: 2.5px solid transparent;
            position: relative;
            transition: transform .15s;
        }

        .cz-swatch:hover {
            transform: scale(1.08);
        }

        .cz-swatch.active {
            border-color: var(--gh-heading);
        }

        .cz-swatch.active::after {
            content: "✓";
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: .85rem;
            font-weight: 800;
        }

        .cz-layout-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: .65rem;
        }

        .cz-layout-opt {
            padding: 1rem;
            border-radius: 12px;
            border: 2px solid var(--gh-border);
            background: var(--gh-card);
            text-align: center;
            cursor: pointer;
            font-size: .78rem;
            font-weight: 600;
            color: var(--gh-body);
            transition: all .15s;
        }

        .cz-layout-opt:hover {
            border-color: var(--gh-primary);
        }

        .cz-layout-opt.active {
            border-color: var(--gh-primary);
            background: rgba(91, 61, 240, .06);
            color: var(--gh-primary);
        }

        .cz-layout-opt i {
            font-size: 1.5rem;
            display: block;
            margin-bottom: .35rem;
            opacity: .9;
        }

        .cz-segment {
            display: flex;
            gap: .25rem;
            padding: .25rem;
            background: var(--gh-hover);
            border-radius: 10px;
        }

        .cz-segment label {
            flex: 1;
            text-align: center;
            padding: .5rem;
            border-radius: 8px;
            cursor: pointer;
            font-size: .78rem;
            font-weight: 600;
        }

        .cz-segment input {
            display: none;
        }

        .cz-segment input:checked+span {
            background: var(--gh-card);
            color: var(--gh-primary);
            display: block;
            padding: .5rem;
            border-radius: 8px;
            box-shadow: var(--gh-shadow-xs);
            margin: -.5rem;
        }

        /* ============== Misc ============== */
        .text-primary {
            color: var(--gh-primary) !important;
        }

        /* .text-success { color: var(--gh-success) !important; } */
        .text-info {
            color: var(--gh-info) !important;
        }

        .text-warning {
            color: var(--gh-warning) !important;
        }

        .text-danger {
            color: var(--gh-danger) !important;
        }

        .text-gradient {
            background: var(--gh-grad-primary);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .bg-primary {
            background: var(--gh-primary) !important;
        }

        .bg-success {
            background: var(--gh-success) !important;
        }

        .bg-info {
            background: var(--gh-info) !important;
        }

        .bg-warning {
            background: var(--gh-warning) !important;
        }

        .bg-danger {
            background: var(--gh-danger) !important;
        }

        .bg-primary-soft {
            background: #e6f1e5 !important;
            color: var(--gh-primary) !important;
        }

        .bg-success-soft {
            background: rgba(20, 184, 166, .12) !important;
            color: var(--gh-success) !important;
        }

        .bg-info-soft {
            background: rgba(14, 165, 233, .12) !important;
            color: var(--gh-info) !important;
        }

        .bg-warning-soft {
            background: rgba(245, 158, 11, .14) !important;
            color: var(--gh-warning) !important;
        }

        .bg-danger-soft {
            background: rgba(244, 63, 94, .12) !important;
            color: var(--gh-danger) !important;
        }

        .rounded-pill {
            border-radius: 99px !important;
        }

        .rounded-tile {
            border-radius: var(--gh-radius) !important;
        }

        .rounded-tile-lg {
            border-radius: var(--gh-radius-lg) !important;
        }

        .fw-extrabold {
            font-weight: 800 !important;
        }

        .font-display {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .font-mono {
            font-family: 'JetBrains Mono', 'Courier New', monospace;
        }

        /* Apex chart text colors */
        .apexcharts-text,
        .apexcharts-legend-text {
            fill: var(--gh-body) !important;
            color: var(--gh-body) !important;
        }

        .apexcharts-tooltip {
            background: var(--gh-card) !important;
            border: 1px solid var(--gh-border) !important;
            color: var(--gh-body) !important;
            box-shadow: var(--gh-shadow-lg) !important;
            border-radius: 12px !important;
        }

        .apexcharts-tooltip-title {
            background: var(--gh-hover) !important;
            border-bottom-color: var(--gh-border) !important;
            font-weight: 700 !important;
        }

        .apexcharts-xaxistooltip,
        .apexcharts-yaxistooltip {
            background: var(--gh-card) !important;
            border-color: var(--gh-border) !important;
            color: var(--gh-body) !important;
            border-radius: 6px !important;
        }

        .apexcharts-gridline {
            stroke: var(--gh-border-soft) !important;
        }

        .apexcharts-menu {
            background: var(--gh-card) !important;
            border-color: var(--gh-border) !important;
        }

        .apexcharts-menu-item:hover {
            background: var(--gh-hover) !important;
        }

        /* Timeline */
        .timeline {
            position: relative;
            padding-left: 1.85rem;
        }

        .timeline::before {
            content: "";
            position: absolute;
            top: 8px;
            bottom: 8px;
            left: calc(1.85rem - 1.5rem + 8px - 1px);
            /* timeline-padding - item-offset + circle-radius - line-half */
            width: 2px;
            background: var(--gh-border);
            border-radius: 2px;
        }

        .timeline-item {
            position: relative;
            padding-bottom: 1.5rem;
        }

        .timeline-item:last-child {
            padding-bottom: 0;
        }

        .timeline-item::before {
            content: "";
            position: absolute;
            left: -1.5rem;
            top: .3rem;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: var(--gh-card);
            border: 3px solid var(--gh-primary);
            box-shadow: 0 0 0 4px #e6f1e5;
        }

        .timeline-item.success::before {
            border-color: var(--gh-success);
            box-shadow: 0 0 0 4px rgba(20, 184, 166, .12);
        }

        .timeline-item.warning::before {
            border-color: var(--gh-warning);
            box-shadow: 0 0 0 4px rgba(245, 158, 11, .12);
        }

        .timeline-item.danger::before {
            border-color: var(--gh-danger);
            box-shadow: 0 0 0 4px rgba(244, 63, 94, .12);
        }

        .timeline-item .tl-time {
            font-size: .7rem;
            color: var(--gh-muted);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .04em;
        }

        .timeline-item .tl-title {
            font-weight: 700;
            color: var(--gh-heading);
            font-size: .9rem;
            margin: .15rem 0;
        }

        .timeline-item .tl-text {
            font-size: .82rem;
            color: var(--gh-muted);
        }

        /* Activity list */
        .activity-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .activity-list li {
            display: flex;
            gap: .85rem;
            padding: .85rem 0;
            border-bottom: 1px dashed var(--gh-border-soft);
        }

        .activity-list li:last-child {
            border-bottom: 0;
        }

        .activity-list .a-ic {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            flex-shrink: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        .activity-list .a-meta {
            font-size: .85rem;
            line-height: 1.4;
            width: 100%;
        }

        .activity-list .a-meta .badge {
            padding: .35em .65em;
            font-weight: 700;
            font-size: .68rem;
            border-radius: 6px;
            letter-spacing: .02em;
            line-height: inherit;
            color: rgba(var(--bs-dark-rgb), var(--bs-text-opacity)) !important;
            background-color: #f8f9fa !important;
        }

        .activity-list .a-meta small {
            color: var(--gh-muted);
            font-size: .72rem;
            display: block;
            margin-top: .15rem;
        }

        /* Kanban */
        .kanban {
            display: flex;
            gap: 1rem;
            overflow-x: auto;
            padding-bottom: 1rem;
        }

        .kanban-col {
            flex: 0 0 290px;
        }

        .kanban-col-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: .25rem .35rem .85rem;
            font-weight: 700;
            color: var(--gh-heading);
            font-size: .85rem;
            text-transform: uppercase;
            letter-spacing: .04em;
        }

        .kanban-col-head .col-count {
            background: var(--gh-hover);
            padding: .1rem .5rem;
            border-radius: 8px;
            font-size: .7rem;
        }

        .kanban-col-body {
            background: var(--gh-card-2);
            border-radius: var(--gh-radius);
            padding: .85rem;
            min-height: 200px;
            border: 1px dashed var(--gh-border);
        }

        .kanban-card {
            background: var(--gh-card);
            padding: .85rem 1rem;
            border-radius: 12px;
            margin-bottom: .65rem;
            box-shadow: var(--gh-shadow-xs);
            cursor: grab;
            border: 1px solid var(--gh-border-soft);
            transition: transform .15s, box-shadow .15s;
        }

        .kanban-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--gh-shadow-sm);
        }

        .kanban-card h6 {
            font-size: .87rem;
            margin-bottom: .35rem;
        }

        .kanban-card p {
            font-size: .76rem;
            color: var(--gh-muted);
            margin: 0 0 .65rem 0;
        }

        .kanban-card .label-strip {
            width: 32px;
            height: 4px;
            border-radius: 2px;
            background: var(--gh-primary);
            margin-bottom: .55rem;
        }

        .kanban-card .label-strip.label-cool {
            background: var(--gh-grad-cool);
        }

        .kanban-card .label-strip.label-warm {
            background: var(--gh-grad-warm);
        }

        .kanban-card .label-strip.label-mint {
            background: var(--gh-grad-mint);
        }

        .kanban-card .label-strip.label-amber {
            background: var(--gh-grad-amber);
        }

        /* Email app */
        .mail-shell {
            display: grid;
            grid-template-columns: 240px 380px 1fr;
            gap: 1rem;
            min-height: 70vh;
        }

        @media (max-width: 1199.98px) {
            .mail-shell {
                grid-template-columns: 240px 1fr;
            }

            .mail-content-pane {
                display: none;
            }
        }

        @media (max-width: 767.98px) {
            .mail-shell {
                grid-template-columns: 1fr;
            }

            .mail-list-pane {
                display: none;
            }
        }

        .mail-folders {
            padding: 1rem;
        }

        .mail-folder {
            display: flex;
            align-items: center;
            gap: .75rem;
            padding: .6rem .85rem;
            color: var(--gh-body);
            text-decoration: none;
            border-radius: 10px;
            font-size: .85rem;
            font-weight: 500;
        }

        .mail-folder i {
            font-size: 1.15rem;
            opacity: .85;
        }

        .mail-folder:hover {
            background: var(--gh-hover);
            color: var(--gh-primary);
        }

        .mail-folder.active {
            background: #e6f1e5;
            color: var(--gh-primary);
            font-weight: 600;
        }

        .mail-folder .count {
            margin-left: auto;
            font-size: .72rem;
        }

        .mail-item {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid var(--gh-border-soft);
            cursor: pointer;
        }

        .mail-item:hover {
            background: var(--gh-hover);
        }

        .mail-item.unread {
            background: rgba(91, 61, 240, .04);
        }

        .mail-item.active {
            background: rgba(91, 61, 240, .08);
            border-left: 3px solid var(--gh-primary);
            padding-left: calc(1.25rem - 3px);
        }

        .mail-item .mi-from {
            font-weight: 700;
            color: var(--gh-heading);
            font-size: .82rem;
        }

        .mail-item .mi-subj {
            font-size: .82rem;
            color: var(--gh-body);
            margin: .15rem 0;
            font-weight: 500;
        }

        .mail-item .mi-prev {
            font-size: .75rem;
            color: var(--gh-muted);
        }

        .mail-item .mi-time {
            font-size: .7rem;
            color: var(--gh-muted);
        }

        /* Chat */
        .chat-shell {
            display: grid;
            grid-template-columns: 320px 1fr;
            min-height: 75vh;
            border-radius: var(--gh-radius);
            overflow: hidden;
            background: var(--gh-card);
            border: 1px solid var(--gh-border);
        }

        @media (max-width: 767.98px) {
            .chat-shell {
                grid-template-columns: 1fr;
            }
        }

        .chat-list-pane {
            border-right: 1px solid var(--gh-border);
            display: flex;
            flex-direction: column;
        }

        .chat-conv {
            display: flex;
            flex-direction: column;
        }

        .chat-head {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid var(--gh-border);
            display: flex;
            align-items: center;
            gap: .75rem;
        }

        .chat-msgs {
            flex: 1;
            padding: 1.25rem;
            overflow-y: auto;
        }

        .chat-input {
            padding: .85rem 1rem;
            border-top: 1px solid var(--gh-border);
            display: flex;
            gap: .5rem;
            align-items: center;
        }

        .chat-input input {
            flex: 1;
            background: var(--gh-input-bg);
            border: 0;
            border-radius: 99px;
            padding: .7rem 1.15rem;
            color: var(--gh-body);
        }

        .chat-input input:focus {
            outline: none;
            box-shadow: var(--gh-glow);
            background: var(--gh-card);
        }

        .bubble {
            max-width: 70%;
            padding: .7rem 1rem;
            border-radius: 18px;
            margin-bottom: .55rem;
            font-size: .85rem;
            line-height: 1.45;
        }

        .bubble-in {
            background: var(--gh-hover);
            color: var(--gh-body);
            border-bottom-left-radius: 4px;
        }

        .bubble-out {
            background: var(--gh-grad-primary);
            color: #fff;
            border-bottom-right-radius: 4px;
            margin-left: auto;
            box-shadow: 0 6px 16px rgba(91, 61, 240, .3);
        }

        .bubble-time {
            display: block;
            font-size: .68rem;
            opacity: .7;
            margin-top: .25rem;
        }

        .chat-conv-item {
            display: flex;
            gap: .75rem;
            padding: .9rem 1rem;
            cursor: pointer;
            align-items: center;
            border-bottom: 1px solid var(--gh-border-soft);
        }

        .chat-conv-item:hover {
            background: var(--gh-hover);
        }

        .chat-conv-item.active {
            background: rgba(91, 61, 240, .08);
        }

        .chat-conv-item .ccm-name {
            font-weight: 700;
            font-size: .85rem;
            color: var(--gh-heading);
        }

        .chat-conv-item .ccm-last {
            font-size: .76rem;
            color: var(--gh-muted);
        }

        .chat-conv-item .ccm-time {
            font-size: .68rem;
            color: var(--gh-muted);
        }

        /* Auth */
        .auth-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            position: relative;
            overflow: hidden;
        }

        .auth-page::before {
            content: "";
            position: absolute;
            inset: 0;
            pointer-events: none;
            /* background: var(--gh-grad-primary); */
            /* background-image: url(../images/backgroundimage.jpg); */
        }

        .backgroundimageblock {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
        }

        .backgroundimageblock img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .auth-card {
            width: 100%;
            max-width: 460px;
            background: var(--gh-card);
            border-radius: var(--gh-radius-lg);
            box-shadow: var(--gh-shadow-lg);
            padding: 2.5rem;
            position: relative;
            border: 1px solid var(--gh-border);
        }

        @media (max-width:426px) {
            .auth-card {
                padding: 20px;
            }
        }

        .auth-brand {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .65rem;
            margin-bottom: 1.75rem;
        }

        .auth-cover {
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 100vh;
        }

        .auth-cover .auth-cover-side {
            background: var(--gh-grad-primary);
            color: #fff;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .auth-cover .auth-cover-side::before {
            content: "";
            position: absolute;
            bottom: -100px;
            right: -100px;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .07);
        }

        .auth-cover .auth-cover-side::after {
            content: "";
            position: absolute;
            top: -60px;
            left: -60px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(34, 211, 238, .18);
        }

        .auth-cover .auth-form-side {
            padding: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--gh-bg);
        }

        .auth-cover .auth-card {
            box-shadow: none;
            padding: 0;
            max-width: 420px;
            background: transparent;
            border: 0;
        }

        @media (max-width: 991.98px) {
            .auth-cover {
                grid-template-columns: 1fr;
            }

            .auth-cover .auth-cover-side {
                display: none;
            }
        }

        .divider {
            display: flex;
            align-items: center;
            gap: .85rem;
            margin: 1.25rem 0;
            color: var(--gh-muted);
            font-size: .75rem;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: var(--gh-border);
        }

        .social-btn {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            border: 1px solid var(--gh-border);
            background: var(--gh-card);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            transition: all .15s;
            color: var(--gh-body);
        }

        .social-btn:hover {
            border-color: var(--gh-primary);
            color: var(--gh-primary);
            transform: translateY(-2px);
        }

        /* Error pages */
        .err-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        .err-page::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 30% 40%, #e6f1e5, transparent 50%),
                radial-gradient(circle at 70% 60%, rgba(34, 211, 238, .08), transparent 50%);
        }

        .err-code {
            font-size: 9rem;
            font-weight: 900;
            line-height: 1;
            background: var(--gh-grad-primary);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            font-family: 'Plus Jakarta Sans', sans-serif;
            letter-spacing: -.04em;
            position: relative;
        }

        /* Pricing */
        .pricing-card {
            padding: 2rem;
            text-align: center;
            position: relative;
            transition: all .3s cubic-bezier(.4, 0, .2, 1);
        }

        .pricing-card:not(.featured):hover {
            transform: translateY(-8px);
            box-shadow: 0 24px 50px rgba(15, 23, 42, .12);
            border-color: rgba(var(--gh-primary-rgb), .35);
        }

        .pricing-card.featured {
            background: var(--gh-grad-primary);
            color: #fff;
            border-color: transparent;
            transform: scale(1.04);
            z-index: 2;
            box-shadow: 0 24px 50px rgba(91, 61, 240, .4);
        }

        .pricing-card.featured:hover {
            transform: scale(1.04) translateY(-6px);
            box-shadow: 0 32px 60px rgba(91, 61, 240, .5);
        }

        .pricing-card.featured h4,
        .pricing-card.featured .pricing-price {
            color: #fff;
        }

        .pricing-card.featured .pricing-features li {
            color: rgba(255, 255, 255, .92);
            border-color: rgba(255, 255, 255, .18);
        }

        .pricing-card.featured .pricing-features li i {
            color: var(--gh-accent);
        }

        .pricing-card.featured .btn {
            background: #fff;
            color: var(--gh-primary);
            box-shadow: 0 6px 18px rgba(0, 0, 0, .15);
        }

        .pricing-price {
            font-size: 2.8rem;
            font-weight: 800;
            color: var(--gh-heading);
            font-family: 'Plus Jakarta Sans', sans-serif;
            line-height: 1;
        }

        .pricing-price small {
            font-size: .9rem;
            font-weight: 500;
            color: var(--gh-muted);
        }

        .pricing-features {
            list-style: none;
            padding: 0;
            margin: 1.5rem 0;
            text-align: left;
        }

        .pricing-features li {
            padding: .65rem 0;
            border-bottom: 1px dashed var(--gh-border);
            display: flex;
            align-items: center;
            gap: .5rem;
            font-size: .85rem;
        }

        .pricing-features li i {
            color: var(--gh-success);
        }

        /* Calendar */
        .fc {
            font-family: 'Inter', sans-serif;
        }

        .fc .fc-toolbar-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--gh-heading);
        }

        .fc .fc-button {
            background: var(--gh-hover) !important;
            border: 0 !important;
            color: var(--gh-body) !important;
            font-size: .8rem !important;
            font-weight: 600 !important;
            border-radius: 8px !important;
            padding: .4rem .75rem !important;
        }

        .fc .fc-button-primary:not(:disabled).fc-button-active {
            background: var(--gh-primary) !important;
            color: #fff !important;
        }

        .fc .fc-daygrid-day-number,
        .fc .fc-col-header-cell-cushion {
            color: var(--gh-body);
        }

        .fc .fc-day-today {
            background: rgba(91, 61, 240, .06) !important;
        }

        .fc-event {
            border-radius: 6px !important;
            border: 0 !important;
            padding: 2px 6px !important;
            font-size: .72rem !important;
            font-weight: 600 !important;
        }

        /* File mgr */
        .file-card {
            padding: 1.2rem;
            text-align: center;
            border-radius: var(--gh-radius);
            background: var(--gh-card);
            border: 1px solid var(--gh-border);
            transition: all .15s;
            cursor: pointer;
        }

        .file-card:hover {
            border-color: var(--gh-primary);
            box-shadow: var(--gh-shadow-sm);
            transform: translateY(-2px);
        }

        .file-card i {
            font-size: 2.5rem;
        }

        .file-card .f-name {
            font-size: .85rem;
            font-weight: 600;
            margin-top: .65rem;
            color: var(--gh-heading);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .file-card .f-size {
            font-size: .72rem;
            color: var(--gh-muted);
        }

        .folder-card .fl-ic {
            background: #e6f1e5;
            color: var(--gh-primary);
            width: 56px;
            height: 56px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
        }

        /* Invoice */
        .invoice-paper {
            padding: 2.5rem;
        }

        .invoice-num {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
        }

        /* Wallet card */
        .wallet-card {
            background: var(--gh-grad-primary);
            color: #fff;
            border-radius: 18px;
            padding: 1.5rem;
            min-height: 200px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(91, 61, 240, .35);
        }

        .wallet-card .w-chip {
            width: 38px;
            height: 28px;
            background: linear-gradient(135deg, #fde68a, #fbbf24);
            border-radius: 5px;
            position: relative;
        }

        .wallet-card .w-num {
            font-family: 'JetBrains Mono', monospace;
            letter-spacing: 3px;
            font-size: 1.15rem;
        }

        .wallet-card::before {
            content: "";
            position: absolute;
            right: -60px;
            bottom: -60px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .1);
        }

        .wallet-card::after {
            content: "";
            position: absolute;
            right: -20px;
            top: -40px;
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background: rgba(34, 211, 238, .18);
        }

        /* Decorative geometric blob (for hero areas) */
        .blob {
            position: absolute;
            pointer-events: none;
            background: radial-gradient(circle, var(--gh-primary) 0%, transparent 70%);
            opacity: .14;
            filter: blur(40px);
            border-radius: 50%;
        }

        /* RTL */
        /* Keep the page scrollbar on the visual right edge in RTL
   (browsers default it to the left under dir=rtl, which makes the page look
   like it has extra left padding). Force html LTR for scrollbar placement,
   but keep body and all descendants flowing RTL. */
        html[dir="rtl"] {
            direction: ltr;
        }

        html[dir="rtl"] body {
            direction: rtl;
            text-align: right;
        }

        [dir="rtl"] .sidebar {
            left: auto;
            right: 0;
        }

        [dir="rtl"] .content {
            margin-left: 0;
            margin-right: var(--gh-sidebar-w);
        }

        [dir="rtl"] body.sidebar-mini .content {
            margin-right: var(--gh-sidebar-w-mini);
        }

        [dir="rtl"] .menu>li.active>a::after {
            right: auto;
            left: -.75rem;
            border-radius: 0 5px 5px 0;
        }

        [dir="rtl"] .submenu a {
            padding-right: 3rem;
            padding-left: .85rem;
        }

        [dir="rtl"] .submenu a::before {
            left: auto;
            right: 2.05rem;
        }

        [dir="rtl"] .topbar-search input {
            padding: 0 2.6rem 0 1rem;
        }

        [dir="rtl"] .topbar-search>i {
            left: auto;
            right: 1rem;
        }

        [dir="rtl"] .menu-arrow {
            transform: rotate(180deg);
        }

        [dir="rtl"] .menu>li.open>a .menu-arrow {
            transform: rotate(90deg);
        }

        [dir="rtl"] .ms-auto {
            margin-left: 0 !important;
            margin-right: auto !important;
        }

        @media (max-width: 991.98px) {
            [dir="rtl"] .sidebar {
                transform: translateX(100%);
            }

            [dir="rtl"] body.sidebar-open .sidebar {
                transform: translateX(0);
            }
        }

        /* ====================================================================
   ==================================================================== */
        .pagination {
            --bs-pagination-color: var(--gh-body);
            --bs-pagination-bg: transparent;
            --bs-pagination-border-color: transparent;
            --bs-pagination-hover-color: var(--gh-primary);
            --bs-pagination-hover-bg: var(--gh-hover);
            --bs-pagination-hover-border-color: transparent;
            --bs-pagination-focus-color: var(--gh-primary);
            --bs-pagination-focus-bg: var(--gh-hover);
            --bs-pagination-focus-box-shadow: 0 0 0 4px rgba(var(--gh-primary-rgb), .12);
            --bs-pagination-active-color: #fff;
            --bs-pagination-active-bg: var(--gh-primary);
            --bs-pagination-active-border-color: var(--gh-primary);
            --bs-pagination-disabled-color: var(--gh-muted);
            --bs-pagination-disabled-bg: transparent;
            --bs-pagination-disabled-border-color: transparent;
            --bs-pagination-border-radius: 10px;
            --bs-pagination-padding-x: .75rem;
            --bs-pagination-padding-y: .5rem;
            --bs-pagination-font-size: .82rem;
            gap: .25rem;
        }

        .pagination .page-link {
            border: 0;
            min-width: 38px;
            height: 38px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            border-radius: 10px;
            transition: all .15s ease;
            color: var(--gh-body);
        }

        .pagination .page-link:hover {
            color: var(--gh-primary);
            background: var(--gh-hover);
            transform: translateY(-1px);
        }

        .pagination .page-item.active .page-link {
            background: var(--gh-grad-primary);
            border: 0;
            color: #fff;
            box-shadow: 0 6px 16px rgba(var(--gh-primary-rgb), .35);
            transform: translateY(-1px);
        }

        .pagination .page-item.disabled .page-link {
            color: var(--gh-muted);
            background: transparent;
            opacity: .5;
        }

        .pagination .page-item:first-child .page-link,
        .pagination .page-item:last-child .page-link {
            font-size: 1.1rem;
            font-weight: 700;
        }

        /* Pagination sizes */
        .pagination-sm .page-link {
            min-width: 30px;
            height: 30px;
            font-size: .75rem;
            border-radius: 8px;
        }

        .pagination-lg .page-link {
            min-width: 48px;
            height: 48px;
            font-size: .95rem;
            border-radius: 12px;
        }

        /* Rounded pill pagination variant */
        .pagination.pagination-pill .page-link {
            border-radius: 99px;
        }

        /* ====================================================================
   ==================================================================== */
        .accordion {
            --bs-accordion-color: var(--gh-body);
            --bs-accordion-bg: transparent;
            --bs-accordion-border-color: var(--gh-border);
            --bs-accordion-border-radius: var(--gh-radius);
            --bs-accordion-inner-border-radius: var(--gh-radius);
            --bs-accordion-btn-color: var(--gh-heading);
            --bs-accordion-btn-bg: var(--gh-card);
            --bs-accordion-btn-padding-y: 1rem;
            --bs-accordion-btn-padding-x: 1.25rem;
            --bs-accordion-btn-focus-border-color: var(--gh-primary);
            --bs-accordion-btn-focus-box-shadow: 0 0 0 4px rgba(var(--gh-primary-rgb), .12);
            --bs-accordion-body-padding-x: 1.25rem;
            --bs-accordion-body-padding-y: 1.1rem;
            --bs-accordion-active-color: var(--gh-primary);
            --bs-accordion-active-bg: rgba(var(--gh-primary-rgb), .04);
            display: flex;
            flex-direction: column;
            gap: .65rem;
        }

        .accordion-item {
            background: var(--gh-card);
            border: 1px solid var(--gh-border) !important;
            border-radius: var(--gh-radius) !important;
            overflow: hidden;
            box-shadow: var(--gh-shadow-xs);
            transition: all .2s ease;
        }

        .accordion-item:has(.accordion-button:not(.collapsed)) {
            border-color: rgba(var(--gh-primary-rgb), .25) !important;
            box-shadow: 0 8px 24px rgba(var(--gh-primary-rgb), .08);
        }

        .accordion-item:first-of-type,
        .accordion-item:last-of-type {
            border-radius: var(--gh-radius) !important;
        }

        .accordion-item:first-of-type .accordion-button {
            border-top-left-radius: var(--gh-radius);
            border-top-right-radius: var(--gh-radius);
        }

        .accordion-item:last-of-type .accordion-button.collapsed {
            border-bottom-left-radius: var(--gh-radius);
            border-bottom-right-radius: var(--gh-radius);
        }

        .accordion-button {
            font-weight: 600;
            font-size: .9rem;
            color: var(--gh-heading);
            background: var(--gh-card);
            padding: 1.1rem 1.35rem;
            border: 0;
            transition: all .2s ease;
            gap: .85rem;
            position: relative;
        }

        .accordion-button:hover {
            background: var(--gh-hover);
            color: var(--gh-primary);
        }

        .accordion-button:not(.collapsed) {
            background: var(--gh-card);
            color: var(--gh-primary);
            box-shadow: none;
            font-weight: 700;
        }

        .accordion-button:not(.collapsed)::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: var(--gh-grad-primary);
            border-radius: 0 3px 3px 0;
        }

        .accordion-button:focus {
            box-shadow: 0 0 0 4px rgba(var(--gh-primary-rgb), .12);
            border-color: transparent;
            z-index: 3;
        }

        /* Replace default caret with a custom plus/minus circle */
        .accordion-button::after {
            background-image: none;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: var(--gh-hover);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            position: relative;
            transition: all .25s ease;
            flex-shrink: 0;
        }

        .accordion-button::after {
            /* plus icon (horizontal) */
            background-image: linear-gradient(currentColor, currentColor), linear-gradient(currentColor, currentColor);
            background-position: center;
            background-repeat: no-repeat;
            background-size: 12px 2px, 2px 12px;
            color: var(--gh-muted);
        }

        .accordion-button:not(.collapsed)::after {
            background-color: transparent;
            background-image:
                linear-gradient(#fff, #fff),
                var(--gh-grad-primary);
            background-position: center, center;
            background-repeat: no-repeat, no-repeat;
            background-size: 12px 2px, 100% 100%;
            transform: none;
            color: #fff;
            box-shadow: 0 4px 10px rgba(var(--gh-primary-rgb), .35);
        }

        .accordion-body {
            padding: 1rem 1.35rem 1.35rem;
            color: var(--gh-body);
            font-size: .87rem;
            line-height: 1.6;
            border-top: 1px solid var(--gh-border-soft);
        }

        /* Flush variant - no borders/shadows between items */
        .accordion-flush {
            gap: 0;
            border-radius: var(--gh-radius);
            overflow: hidden;
            border: 1px solid var(--gh-border);
        }

        .accordion-flush .accordion-item {
            border-radius: 0 !important;
            border-left: 0 !important;
            border-right: 0 !important;
            border-top: 0 !important;
            border-bottom: 1px solid var(--gh-border-soft) !important;
            box-shadow: none;
            background: transparent;
        }

        .accordion-flush .accordion-item:last-of-type {
            border-bottom: 0 !important;
        }

        .accordion-flush .accordion-item:has(.accordion-button:not(.collapsed)) {
            box-shadow: none;
        }

        .accordion-flush .accordion-button {
            background: transparent;
        }

        .accordion-flush .accordion-button:not(.collapsed)::before {
            display: none;
        }

        /* ====================================================================
   ==================================================================== */
        .popover {
            --bs-popover-bg: var(--gh-card);
            --bs-popover-border-color: var(--gh-border);
            --bs-popover-border-radius: var(--gh-radius);
            --bs-popover-inner-border-radius: var(--gh-radius);
            --bs-popover-header-bg: var(--gh-card);
            --bs-popover-header-color: var(--gh-heading);
            --bs-popover-body-color: var(--gh-body);
            --bs-popover-arrow-border: var(--gh-border);
            --bs-popover-max-width: 320px;
            --bs-popover-font-size: .85rem;
            border: 1px solid var(--gh-border) !important;
            box-shadow: var(--gh-shadow-lg);
            border-radius: var(--gh-radius) !important;
        }

        .popover-header {
            padding: .75rem 1rem;
            font-weight: 700;
            font-size: .85rem;
            border-bottom: 1px solid var(--gh-border-soft);
            background: linear-gradient(135deg, rgba(var(--gh-primary-rgb), .06), rgba(34, 211, 238, .06));
            border-radius: var(--gh-radius) var(--gh-radius) 0 0;
        }

        .popover-header::before {
            display: none;
            /* remove Bootstrap's default arrow bg */
        }

        .popover-body {
            padding: .85rem 1rem;
            color: var(--gh-body);
            line-height: 1.55;
        }

        .popover .popover-arrow::before,
        .popover .popover-arrow::after {
            border-color: transparent;
        }

        /* Color variants (apply class to .popover via JS or via data-bs-custom-class) */
        .popover.popover-primary {
            border-color: var(--gh-primary) !important;
        }

        .popover.popover-primary .popover-header {
            background: var(--gh-primary);
            color: #fff;
            border-bottom-color: rgba(255, 255, 255, .2);
        }

        .popover.popover-success {
            border-color: var(--gh-success) !important;
        }

        .popover.popover-success .popover-header {
            background: var(--gh-success);
            color: #fff;
            border-bottom-color: rgba(255, 255, 255, .2);
        }

        .popover.popover-warning {
            border-color: var(--gh-warning) !important;
        }

        .popover.popover-warning .popover-header {
            background: var(--gh-warning);
            color: #fff;
            border-bottom-color: rgba(255, 255, 255, .2);
        }

        .popover.popover-danger {
            border-color: var(--gh-danger) !important;
        }

        .popover.popover-danger .popover-header {
            background: var(--gh-danger);
            color: #fff;
            border-bottom-color: rgba(255, 255, 255, .2);
        }

        .popover.popover-dark {
            border-color: #0f172a !important;
            background: #0f172a;
        }

        .popover.popover-dark .popover-header {
            background: #0f172a;
            color: #fff;
            border-bottom-color: rgba(255, 255, 255, .1);
        }

        .popover.popover-dark .popover-body {
            color: #cbd5e1;
        }

        /* Wider popover variant */
        .popover.popover-wide {
            max-width: 380px !important;
        }

        /* ====================================================================
   ==================================================================== */
        .tooltip {
            --bs-tooltip-bg: var(--gh-heading);
            --bs-tooltip-color: var(--gh-card);
            --bs-tooltip-padding-x: .65rem;
            --bs-tooltip-padding-y: .4rem;
            --bs-tooltip-font-size: .75rem;
            --bs-tooltip-border-radius: 8px;
            --bs-tooltip-max-width: 220px;
        }

        .tooltip-inner {
            font-weight: 600;
            letter-spacing: .01em;
            box-shadow: var(--gh-shadow);
        }

        /* Color variants via data-bs-custom-class */
        .tooltip.tt-primary {
            --bs-tooltip-bg: var(--gh-primary);
            --bs-tooltip-color: #fff;
        }

        .tooltip.tt-success {
            --bs-tooltip-bg: var(--gh-success);
            --bs-tooltip-color: #fff;
        }

        .tooltip.tt-info {
            --bs-tooltip-bg: var(--gh-info);
            --bs-tooltip-color: #fff;
        }

        .tooltip.tt-warning {
            --bs-tooltip-bg: var(--gh-warning);
            --bs-tooltip-color: #fff;
        }

        .tooltip.tt-danger {
            --bs-tooltip-bg: var(--gh-danger);
            --bs-tooltip-color: #fff;
        }

        .tooltip.tt-light {
            --bs-tooltip-bg: var(--gh-card);
            --bs-tooltip-color: var(--gh-heading);
        }

        .tooltip.tt-light .tooltip-inner {
            border: 1px solid var(--gh-border);
        }

        .tooltip.tt-gradient .tooltip-inner {
            background: var(--gh-grad-primary);
            color: #fff;
        }

        /* Larger tooltip for rich content */
        .tooltip.tt-wide {
            --bs-tooltip-max-width: 320px;
        }

        .tooltip.tt-wide .tooltip-inner {
            padding: .75rem 1rem;
            line-height: 1.5;
        }

        /* ====================================================================
   UNIQUE SIDEBAR ENHANCEMENTS — distinctive visual identity
   ==================================================================== */

        /* Floating gradient orbs in the sidebar background (animated) */
        .sidebar>.sidebar-orb {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            filter: blur(28px);
            opacity: .55;
        }

        /* .sidebar::before {
  content: ''; position: absolute; top: 8%; right: -50px;
  width: 160px; height: 160px; border-radius: 50%;
  background: radial-gradient(circle, rgba(34,211,238,.4), transparent 70%);
  filter: blur(22px); pointer-events: none;
  animation: orbFloat 9s ease-in-out infinite; z-index: 0;
} */
        /* .sidebar > .sidebar-inner::before {
  content: ''; position: absolute; bottom: 18%; left: -60px;
  width: 180px; height: 180px; border-radius: 50%;
  background: radial-gradient(circle, rgba(91,61,240,.35), transparent 70%);
  filter: blur(28px); pointer-events: none;
  animation: orbFloat 11s ease-in-out infinite reverse; z-index: 0;
} */
        /* @keyframes orbFloat {
  0%, 100% { transform: translateY(0) scale(1); opacity: .55; }
  50% { transform: translateY(-30px) scale(1.15); opacity: .8; }
} */

        /* Sidebar header: subtle bottom shimmer line */
        .sidebar-header {
            position: relative;
            z-index: 1;
        }

        /* .sidebar-header::after {
  content: ''; position: absolute; bottom: 0; left: 1.25rem; right: 1.25rem;
  height: 1px;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,.08) 20%, rgba(34,211,238,.45) 50%, rgba(255,255,255,.08) 80%, transparent);
} */

        /* Menu captions: dot, label, then gradient line — flex-based, no overlap */
        .menu-caption {
            padding: 1.25rem 1.5rem .4rem 1.5rem;
            display: flex;
            align-items: center;
            gap: .6rem;
        }

        .menu-caption::before {
            content: '';
            display: block;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--gh-accent);
            box-shadow: 0 0 5px rgba(34, 211, 238, .7);
            flex-shrink: 0;
            align-self: center;
        }

        .menu-caption::after {
            content: '';
            flex: 1;
            height: 1.5px;
            background: linear-gradient(90deg, #01347729, transparent);
        }

        /* Menu items: layered visual depth + magnetic hover */
        .menu>li>a {
            position: relative;
            overflow: hidden;
            transition: all .25s cubic-bezier(.4, 0, .2, 1);
        }

        .menu>li>a::before {
            content: '';
            position: absolute;
            inset: 0;
            /* background: radial-gradient(circle at 20% 50%, rgba(34, 211, 238, .12), transparent 65%); */
            background: rgb(7 119 1 / 10%);
            opacity: 0;
            transition: opacity .3s ease;
            pointer-events: none;
        }

        .menu>li>a:hover::before {
            opacity: 1;
        }

        .menu>li>a:hover>i {
            filter: drop-shadow(0 0 6px rgba(34, 211, 238, .6));
            color: var(--gh-accent);
        }

        .menu>li>a>i {
            transition: filter .2s ease, color .2s ease;
        }

        /* Active state: gradient pill with sparkle accent */
        .menu>li.active>a {
            position: relative;
            background: var(--gh-grad-primary);
        }

        .menu>li.active>a::after {
            /* small diamond accent sitting just outside the right edge of the pill */
            content: '';
            position: absolute;
            right: -.65rem;
            top: 50%;
            width: 10px;
            height: 10px;
            background: var(--gh-accent);
            transform: translateY(-50%) rotate(45deg);
            box-shadow: 0 0 8px var(--gh-accent);
            border-radius: 2px;
        }

        .menu>li.active>a::before {
            background: linear-gradient(135deg, transparent 30%, rgba(255, 255, 255, .08) 50%, transparent 70%);
            opacity: 1;
            animation: sweepShine 3s ease-in-out infinite;
        }

        @keyframes sweepShine {

            0%,
            100% {
                transform: translateX(-100%);
            }

            50% {
                transform: translateX(100%);
            }
        }

        /* Submenu: vertical gradient connector line — passes through center of dots */
        .submenu {
            position: relative;
        }

        .menu>li.open>.submenu::before,
        .menu>li.hover-open>.submenu::before,
        .menu>li:hover>.submenu::before {
            content: '';
            position: absolute;
            left: calc(2.05rem + 2px);
            /* dot.left (2.05) + dot.half (3px) - line.half (1px) */
            top: 1rem;
            bottom: 1rem;
            width: 2px;
            background: linear-gradient(180deg, var(--gh-accent), rgba(34, 211, 238, .15));
            border-radius: 2px;
            opacity: .5;
            pointer-events: none;
            z-index: 0;
        }

        /* Make sure dots sit ON TOP of the line so they appear as connectors, not next to it */
        .submenu a {
            z-index: 1;
        }

        .submenu a::before {
            z-index: 2;
        }

        .submenu a {
            transition: all .2s ease;
        }

        .submenu a:hover {
            transform: translateX(3px);
        }

        /* RTL: flip the connector line to the right side so dots stay centered on it */
        [dir="rtl"] .menu>li.open>.submenu::before,
        [dir="rtl"] .menu>li.hover-open>.submenu::before,
        [dir="rtl"] .menu>li:hover>.submenu::before {
            left: auto;
            right: calc(2.05rem + 2px);
        }

        /* RTL: hover slide should move away from the line (to the left) */
        [dir="rtl"] .submenu a:hover {
            transform: translateX(-3px);
        }

        .submenu a.active {
            background: rgba(34, 211, 238, .08) !important;
            color: var(--gh-accent) !important;
            font-weight: 700;
        }

        .submenu a.active::before {
            background: var(--gh-accent) !important;
            box-shadow: 0 0 6px var(--gh-accent) !important;
            width: 7px !important;
            height: 7px !important;
        }

        /* Promo card: animated conic gradient sweep */
        .sidebar-promo {
            background: linear-gradient(140deg, rgba(91, 61, 240, .45) 0%, rgba(139, 92, 246, .35) 40%, rgba(34, 211, 238, .3) 100%);
            border: 1px solid rgba(255, 255, 255, .1);
            position: relative;
        }

        .sidebar-promo::after {
            content: '';
            position: absolute;
            inset: -1px;
            border-radius: var(--gh-radius);
            background: conic-gradient(from var(--shine-angle, 0deg), transparent, rgba(34, 211, 238, .4), transparent 30%);
            -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
            mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            padding: 1px;
            animation: spinShine 6s linear infinite;
            pointer-events: none;
        }

        @keyframes spinShine {
            to {
                --shine-angle: 360deg;
            }
        }

        @property --shine-angle {
            syntax: '<angle>';
            initial-value: 0deg;
            inherits: false;
        }

        /* ====================================================================
   UNIQUE TOPBAR ENHANCEMENTS
   ==================================================================== */

        /* Bottom gradient accent line */
        /* .topbar::after {
  content: ''; position: absolute; left: 0; right: 0; bottom: -1px;
  height: 1px;
  background: linear-gradient(90deg, transparent, rgba(91,61,240,.4) 30%, rgba(34,211,238,.4) 70%, transparent);
  z-index: 2;
} */

        /* Icon button: hover lift + gradient glow + rotating accent */
        .icon-btn {
            overflow: hidden;
            transition: all .2s cubic-bezier(.4, 0, .2, 1);
        }

        .icon-btn::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            /* background: radial-gradient(circle, rgba(91,61,240,.18), transparent 70%); */
            opacity: 0;
            transition: opacity .25s ease;
            pointer-events: none;
        }

        .icon-btn:hover {
            transform: translateY(-2px);
            /* box-shadow: 0 6px 16px rgba(91,61,240,.18); */
        }

        .icon-btn:hover::before {
            opacity: 1;
        }

        .icon-btn:hover>i {
            filter: drop-shadow(0 0 4px rgba(91, 61, 240, .5));
        }

        /* Notification badge: pill shape with smooth pulse */
        .icon-btn .badge-num {
            min-width: 22px;
            height: 16px;
            padding: 0 6px;
            border-radius: 8px;
            font-size: .62rem;
            line-height: 16px;
            background: var(--gh-grad-warm);
            /* box-shadow: 0 0 0 2px var(--gh-card), 0 4px 10px rgba(244,63,94,.5); */
            /* animation: badgePulse 2.2s ease-in-out infinite; */
        }

        @keyframes badgePulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
                box-shadow: 0 0 0 2px var(--gh-card), 0 6px 16px rgba(244, 63, 94, .7);
            }
        }

        /* Search input: gradient border on focus, animated shimmer */
        .topbar-search input {
            transition: all .25s ease;
        }

        .topbar-search input:focus {
            background: var(--gh-card);
            border-color: transparent;
            box-shadow: 0 0 0 2px var(--gh-primary), 0 0 0 6px rgba(var(--gh-primary-rgb), .12), 0 8px 24px rgba(91, 61, 240, .15);
        }

        .topbar-search::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 12px;
            pointer-events: none;
            opacity: 0;
            transition: opacity .3s ease;
            background: linear-gradient(90deg, transparent, rgba(34, 211, 238, .15), transparent);
            background-size: 200% 100%;
        }

        .topbar-search:focus-within::after {
            opacity: 1;
            animation: searchShimmer 2.5s linear infinite;
        }

        @keyframes searchShimmer {
            0% {
                background-position: -200% 0;
            }

            100% {
                background-position: 200% 0;
            }
        }

        /* User menu avatar: gradient ring */
        .user-menu-btn .avatar {
            position: relative;
            outline: 2px solid transparent;
            outline-offset: 2px;
            background:
                linear-gradient(var(--gh-card), var(--gh-card)) padding-box,
                var(--gh-grad-primary) border-box;
            border: 2px solid transparent;
            /* box-shadow: 0 0 12px rgba(91,61,240,.25); */
            transition: all .25s ease;
        }

        .user-menu-btn:hover .avatar {
            transform: scale(1.05);
            /* box-shadow: 0 0 0 3px rgba(91,61,240,.25), 0 6px 18px rgba(91,61,240,.4); */
        }

        .user-menu-btn {
            position: relative;
        }

        .user-menu-btn::after {
            /* small live status dot on avatar (LTR: bottom-right corner of left avatar) */
            content: '';
            position: absolute;
            bottom: 5px;
            left: 38px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--gh-success);
            border: 2px solid var(--gh-card);
            /* box-shadow: 0 0 8px rgba(20,184,166,.6); */
            /* animation: badgePulse 2.5s ease-in-out infinite; */
        }

        /* RTL: avatar moves to the right side of the button, so mirror the dot */
        [dir="rtl"] .user-menu-btn::after {
            left: auto;
            right: 38px;
        }

        /* Brand mark: subtle glow on hover */
        .brand:hover .brand-mark {
            transform: rotate(-8deg) scale(1.1);
            box-shadow: 0 10px 30px rgba(91, 61, 240, .55), 0 0 24px rgba(34, 211, 238, .4);
        }

        .brand-mark {
            transition: all .3s cubic-bezier(.4, 0, .2, 1);
        }

        /* Topbar background subtle blur strength bump */
        .topbar {
            backdrop-filter: saturate(180%) blur(20px);
            -webkit-backdrop-filter: saturate(180%) blur(20px);
        }

        /* ==========================================================================
   EXTRACTED UTILITIES & PAGE COMPONENT STYLES
   Replaces inline style="..." attributes and inline <style> blocks
   ========================================================================== */

        /* ---- Common dimension utilities ---- */
        .gh-w-360 {
            width: 360px;
        }

        .gh-w-420 {
            width: 420px;
        }

        .gh-w-200 {
            width: 200px;
        }

        .gh-w-140 {
            width: 140px;
        }

        .gh-w-120 {
            width: 120px;
        }

        .gh-w-100 {
            width: 100px;
        }

        .gh-w-80 {
            width: 80px;
        }

        .gh-w-60 {
            width: 60px;
        }

        .gh-w-auto {
            width: auto;
        }

        .gh-min-h-300 {
            min-height: 300px;
        }

        .gh-min-h-340 {
            min-height: 340px;
        }

        .gh-min-h-360 {
            min-height: 360px;
        }

        .gh-min-h-380 {
            min-height: 380px;
        }

        .gh-min-h-440 {
            min-height: 440px;
        }

        .gh-min-h-100 {
            min-height: 100px;
        }

        .gh-min-h-60 {
            min-height: 60px;
        }

        .gh-min-h-48 {
            min-height: 48px;
        }

        .gh-h-30 {
            height: 30px;
        }

        .gh-h-32 {
            height: 32px;
        }

        .gh-h-36 {
            height: 36px;
        }

        .gh-h-50 {
            height: 50px;
        }

        .gh-h-80 {
            height: 80px;
        }

        .gh-h-240 {
            height: 240px;
        }

        .gh-h-300 {
            height: 300px;
        }

        .gh-h-320 {
            height: 320px;
        }

        .gh-h-340 {
            height: 340px;
        }

        .gh-h-380 {
            height: 380px;
        }

        .gh-h-440 {
            height: 440px;
        }

        .gh-size-8 {
            width: 8px;
            height: 8px;
        }

        .gh-size-14 {
            width: 14px;
            height: 14px;
        }

        .gh-size-16 {
            width: 16px;
            height: 16px;
        }

        .gh-size-24 {
            width: 24px;
            height: 24px;
        }

        .gh-size-32 {
            width: 32px;
            height: 32px;
        }

        .gh-size-36 {
            width: 36px;
            height: 36px;
        }

        .gh-size-44 {
            width: 44px;
            height: 44px;
        }

        .gh-size-46 {
            width: 46px;
            height: 46px;
        }

        .gh-size-48 {
            width: 48px;
            height: 48px;
        }

        .gh-size-50 {
            width: 50px;
            height: 50px;
        }

        .gh-size-60 {
            width: 60px;
            height: 60px;
        }

        .gh-size-64 {
            width: 64px;
            height: 64px;
        }

        .gh-size-120 {
            width: 120px;
            height: 120px;
        }

        /* ---- Common positioning ---- */
        .gh-pos-rel {
            position: relative;
            border-radius: 10px;
            background-color: #ffffff2b;
            text-align: center;
        }


        @media (max-width:576px) {
            .gh-pos-rel .border-end {
                border-right: 0 !important;
                padding-bottom: 10px;
                margin-bottom: 10px;
                border-bottom: var(--bs-border-width) var(--bs-border-style) var(--bs-border-color) !important;
            }

            .custom-borderchange .border-end {
                border-right: 0 !important;
                padding-bottom: 10px;
                margin-bottom: 10px;
                border-bottom: var(--bs-border-width) var(--bs-border-style) var(--bs-border-color) !important;
            }
        }


        .gh-overflow-hidden {
            position: relative;
            overflow: hidden;
        }

        .gh-cursor-pointer {
            cursor: pointer;
        }

        .gh-cursor-text {
            cursor: text;
        }

        .gh-d-none {
            display: none;
        }

        /* ---- Common typography sizes ---- */
        .gh-fs-60 {
            font-size: .6rem;
        }

        .gh-fs-65 {
            font-size: .65rem;
        }

        .gh-fs-70 {
            font-size: .7rem;
        }

        .gh-fs-72 {
            font-size: .72rem;
            letter-spacing: .08em;
        }

        .gh-fs-85 {
            font-size: .85rem;
        }

        .gh-fs-11 {
            font-size: 1.1rem;
        }

        .gh-fs-14 {
            font-size: 1.4rem;
        }

        .gh-fs-15 {
            font-size: 1.5rem;
        }

        .gh-fs-16 {
            font-size: 1.6rem;
        }

        .gh-fs-18 {
            font-size: 1.8rem;
        }

        .gh-fs-2 {
            font-size: 2rem;
        }

        .gh-fs-3 {
            font-size: 3rem;
        }

        .gh-fs-4 {
            font-size: 4rem;
        }

        .gh-letter-wide {
            font-size: .7rem;
            letter-spacing: .08em;
        }

        .gh-uppercase {
            text-transform: uppercase;
        }

        /* ---- Font family ---- */
        .font-mono {
            font-family: 'JetBrains Mono', monospace;
        }

        .letter-spacing {
            letter-spacing: 3px;
        }

        /* ---- Background utilities ---- */
        .gh-bg-hover {
            background: var(--gh-hover);
        }

        .gh-bg-overlay-dark {
            background: rgba(0, 0, 0, .55);
            color: #fff;
        }

        .gh-bg-tint-primary {
            background: rgba(91, 61, 240, .04);
        }

        .gh-bg-tint-primary-2 {
            background: rgba(91, 61, 240, .08);
        }

        /* ---- Color utilities ---- */
        .gh-c-primary-var {
            color: var(--gh-primary);
        }

        .gh-c-orange {
            color: #fb923c;
        }

        .gh-c-rose {
            color: #f43f5e;
        }

        .gh-c-violet {
            color: #8b5cf6;
        }

        .gh-c-cyan {
            color: #22d3ee;
        }

        .gh-c-amber {
            color: #fbbf24;
        }

        /* ---- Image overlay (used for gallery / cards) ---- */
        .gh-overlay-tr {
            position: absolute;
            top: .65rem;
            right: .65rem;
        }

        .gh-overlay-bl {
            position: absolute;
            bottom: .65rem;
            left: .65rem;
            right: .65rem;
            display: flex;
            justify-content: space-between;
        }

        .gh-overlay-tag {
            background: rgba(0, 0, 0, .55);
            color: #fff;
        }

        /* ---- Avatar status dots ---- */
        .gh-avatar-status-corner {
            position: absolute;
            bottom: 6px;
            right: 6px;
            width: 14px;
            height: 14px;
            border: 3px solid var(--gh-card);
            border-radius: 50%;
        }

        .gh-avatar-status-center {
            position: absolute;
            bottom: -28px;
            left: 50%;
            transform: translateX(-50%);
            border: 3px solid var(--gh-card);
        }

        /* ---- Customizer offcanvas ---- */
        .gh-customizer-wide {
            width: 360px;
        }

        .cz-span-full {
            grid-column: 1 / -1;
        }

        .cz-swatch[data-color="#5b3df0"] {
            background: #5b3df0;
        }

        .cz-swatch[data-color="#0ea5e9"] {
            background: #0ea5e9;
        }

        .cz-swatch[data-color="#14b8a6"] {
            background: #14b8a6;
        }

        .cz-swatch[data-color="#22c55e"] {
            background: #22c55e;
        }

        .cz-swatch[data-color="#f59e0b"] {
            background: #f59e0b;
        }

        .cz-swatch[data-color="#f43f5e"] {
            background: #f43f5e;
        }

        .cz-swatch[data-color="#ec4899"] {
            background: #ec4899;
        }

        .cz-swatch[data-color="#8b5cf6"] {
            background: #8b5cf6;
        }

        /* ---- Icon library tile (icons-mdi/remix/feather) ---- */
        .icon-tile-cell {
            display: flex;
            align-items: center;
            gap: .5rem;
            padding: .5rem;
            border-radius: 8px;
            background: var(--gh-hover);
        }

        .icon-tile-i {
            font-size: 1.4rem;
            color: var(--gh-primary);
        }

        .icon-tile-name {
            font-size: .85rem;
        }

        /* ---- Status / pulse dots ---- */
        .dot-pulse {
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #94a3b8;
            margin-right: 4px;
            vertical-align: middle;
        }

        .dot-pulse.live {
            background: #22c55e;
            animation: dotPulseAnim 1.4s infinite;
        }

        @keyframes dotPulseAnim {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(34, 197, 94, .6);
            }

            50% {
                box-shadow: 0 0 0 8px rgba(34, 197, 94, 0);
            }
        }

        /* ---- Universal icon animations ---- */
        .gh-spin,
        .mdi-spin,
        .rx-spin,
        .ftr-spin {
            animation: nyIconRot 1.4s linear infinite;
        }

        @keyframes nyIconRot {
            to {
                transform: rotate(360deg);
            }
        }

        .anim-shake,
        .rx-shake,
        .ftr-shake {
            animation: nyShake 1s ease-in-out infinite;
        }

        @keyframes nyShake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-3px) rotate(-8deg);
            }

            75% {
                transform: translateX(3px) rotate(8deg);
            }
        }

        .anim-pulse,
        .rx-pulse,
        .ftr-pulse {
            animation: nyIPulse 1.2s ease-in-out infinite;
        }

        @keyframes nyIPulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.15);
            }
        }

        .anim-bounce,
        .rx-bounce,
        .ftr-bounce {
            animation: nyIBounce 1s ease-in-out infinite;
        }

        @keyframes nyIBounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-12px);
            }
        }

        .anim-rotate,
        .rx-rotate,
        .ftr-rotate {
            animation: nyIconRot 3s linear infinite;
        }

        .anim-blink,
        .rx-blink,
        .ftr-blink {
            animation: nyBlink 1s steps(2) infinite;
        }

        @keyframes nyBlink {
            50% {
                opacity: .2;
            }
        }

        .anim-float,
        .rx-float,
        .ftr-float {
            animation: nyIFloat 3s ease-in-out infinite;
        }

        @keyframes nyIFloat {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        .anim-glow,
        .rx-glow,
        .ftr-glow {
            animation: nyIGlow 1.6s ease-in-out infinite;
        }

        @keyframes nyIGlow {

            0%,
            100% {
                filter: drop-shadow(0 0 4px currentColor);
            }

            50% {
                filter: drop-shadow(0 0 16px currentColor);
            }
        }

        /* ---- Icon explorer cards (icons-mdi/remix/feather) ---- */
        .ix-card,
        .rx-card,
        .fx-card {
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 12px;
            border-radius: 10px;
            background: var(--bs-light-bg-subtle);
            position: relative;
            transition: .2s;
            text-align: center;
            min-height: 100px;
        }

        .fx-card {
            padding: 14px 8px;
        }

        .ix-card:hover,
        .rx-card:hover,
        .fx-card:hover {
            background: var(--bs-primary-bg-subtle);
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(91, 61, 240, .15);
        }

        .ix-card .ix-fav {
            position: absolute;
            top: 4px;
            right: 4px;
            font-size: .85rem;
            opacity: .3;
            cursor: pointer;
            transition: .2s;
        }

        .ix-card:hover .ix-fav {
            opacity: 1;
        }

        .ix-card .ix-fav.active {
            opacity: 1;
            color: #f59e0b;
        }

        .ix-card .ix-name,
        .rx-card .rx-name,
        .fx-card .fx-name {
            font-size: .7rem;
            font-family: 'JetBrains Mono', monospace;
            color: var(--bs-secondary-color);
            margin-top: 6px;
            line-height: 1.1;
            word-break: break-all;
        }

        /* ---- Form-advanced page components ---- */
        .gh-img-radio {
            cursor: pointer;
            display: block;
        }

        .gh-img-radio-card {
            border: 2px solid var(--bs-border-color);
            border-radius: 12px;
            padding: 8px;
            transition: .2s;
            text-align: center;
        }

        .gh-img-radio-card:hover {
            border-color: var(--bs-primary);
        }

        .gh-img-radio input:checked+.gh-img-radio-card {
            border-color: var(--bs-primary);
            box-shadow: 0 6px 18px rgba(91, 61, 240, .2);
            transform: translateY(-2px);
        }

        .gh-img-radio-preview {
            height: 60px;
            border-radius: 8px;
        }

        .gh-qty-stepper {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .qs-val {
            appearance: textfield;
            -moz-appearance: textfield;
        }

        .qs-val::-webkit-outer-spin-button,
        .qs-val::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .gh-star-half {
            display: flex;
            gap: 2px;
            cursor: pointer;
        }

        .gh-star-half .hs-star {
            font-size: 1rem;
            color: var(--bs-warning);
            position: relative;
        }

        .tg-pill.active {
            color: #fff !important;
        }

        .tg-pill[data-cat="frontend"].active {
            background: var(--bs-primary);
            border-color: var(--bs-primary);
        }

        .tg-pill[data-cat="backend"].active {
            background: var(--bs-success);
            border-color: var(--bs-success);
        }

        .tg-pill[data-cat="database"].active {
            background: var(--bs-warning);
            border-color: var(--bs-warning);
        }

        #dzZone.dragover {
            border-color: var(--bs-primary) !important;
            background: var(--bs-primary-bg-subtle);
        }

        .lk-opt {
            flex: 1;
            text-align: center;
            cursor: pointer;
            padding: 6px 4px;
            border-radius: 8px;
            transition: .2s;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .lk-opt:hover {
            background: var(--bs-primary-bg-subtle);
        }

        .lk-opt input {
            margin-bottom: 4px;
        }

        .lk-opt span {
            font-size: .65rem;
            color: var(--bs-secondary-color);
            line-height: 1.1;
        }

        .lk-opt input:checked+span {
            color: var(--bs-primary);
            font-weight: 600;
        }

        /* ---- Form-datepicker components ---- */
        .tpAmpm.active {
            background: var(--bs-primary);
            color: #fff;
        }

        .evDay.active {
            background: var(--bs-primary);
            color: #fff;
            border-color: var(--bs-primary);
        }

        #evRepeat .active {
            background: var(--bs-primary);
            color: #fff;
            border-color: var(--bs-primary);
        }

        .dateChip.active,
        .slotBtn.active {
            background: var(--bs-primary) !important;
            color: #fff !important;
            border-color: var(--bs-primary) !important;
        }

        /* ---- Form-editor components ---- */
        .mdViewPane {
            display: none;
        }

        #mdPanels.split .mdEditPane,
        #mdPanels.split .mdViewPane {
            display: block;
            width: 50%;
        }

        #mdPanels.view .mdEditPane {
            display: none;
        }

        #mdPanels.view .mdViewPane {
            display: block;
            width: 100%;
        }

        #mdPanels.edit .mdEditPane {
            display: block;
            width: 100%;
        }

        #mdOutput h1,
        #mdOutput h2,
        #mdOutput h3 {
            font-weight: 700;
            margin-top: 1em;
        }

        #mdOutput code {
            background: #e6f1e5;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: 'JetBrains Mono', monospace;
            font-size: .85em;
        }

        #mdOutput pre {
            background: #0f172a;
            color: #e2e8f0;
            padding: 12px;
            border-radius: 8px;
            overflow: auto;
        }

        #mdOutput pre code {
            background: transparent;
            color: inherit;
            padding: 0;
        }

        #mdOutput blockquote {
            border-left: 3px solid var(--bs-primary);
            padding-left: 1rem;
            color: var(--bs-secondary-color);
            margin: 1em 0;
        }

        #mdOutput ul,
        #mdOutput ol {
            padding-left: 1.5em;
        }

        #mdOutput hr {
            margin: 1.5em 0;
        }

        .cmt-item {
            padding: .5rem;
            border-radius: 8px;
            background: var(--bs-light-bg-subtle);
            margin-bottom: .5rem;
        }

        .cmt-item .mention {
            background: var(--bs-primary-bg-subtle);
            color: var(--bs-primary);
            padding: 0 4px;
            border-radius: 4px;
            font-weight: 600;
        }

        .tok-keyword {
            color: #c084fc;
        }

        .tok-string {
            color: #86efac;
        }

        .tok-number {
            color: #fbbf24;
        }

        .tok-comment {
            color: #64748b;
            font-style: italic;
        }

        .tok-fn {
            color: #60a5fa;
        }

        [data-placeholder]:empty:before {
            content: attr(data-placeholder);
            color: var(--bs-secondary-color);
            font-style: italic;
        }

        /* ---- Form-file-upload components ---- */
        .progress-sm {
            height: 6px;
        }

        /* ---- Form-masks components ---- */
        .otp:focus {
            border-color: var(--bs-primary);
            box-shadow: 0 0 0 .15rem rgba(91, 61, 240, .25);
        }

        /* ---- Form-repeater components ---- */
        .dr-row {
            display: flex;
            gap: .5rem;
            padding: .6rem;
            border: 1px solid var(--bs-border-color);
            border-radius: 8px;
            background: var(--bs-body-bg);
            align-items: center;
            transition: .15s;
        }

        .dr-row.dragging {
            opacity: .4;
            transform: rotate(1deg);
        }

        .dr-row.drag-over {
            border-color: var(--bs-primary);
            border-style: dashed;
        }

        .dr-handle {
            cursor: grab;
            color: var(--bs-secondary);
        }

        .dr-handle:active {
            cursor: grabbing;
        }

        .dr-row.collapsed .dr-details {
            display: none;
        }

        .tpl-card {
            transition: .2s;
        }

        .tpl-card:hover {
            border-color: var(--bs-primary) !important;
            background: var(--bs-primary-bg-subtle);
        }

        /* ---- Form-wizard components ---- */
        .ob2-step {
            cursor: pointer;
            transition: .2s;
        }

        .ob2-step.active {
            background: var(--bs-primary-bg-subtle);
        }

        .ob2-step.done div:first-child {
            background: var(--bs-success) !important;
            color: #fff !important;
        }

        .ob2-card {
            display: block;
            cursor: pointer;
            text-align: center;
            padding: 1rem;
            border: 2px solid var(--bs-border-color);
            border-radius: 12px;
            transition: .2s;
        }

        .ob2-card:hover {
            border-color: var(--bs-primary);
        }

        .ob2-card input {
            display: none;
        }

        .ob2-card input:checked+div {
            color: var(--bs-primary);
        }

        .ob2-card:has(input:checked) {
            border-color: var(--bs-primary);
            background: var(--bs-primary-bg-subtle);
        }

        .cs-step {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
            position: relative;
        }

        .cs-dot {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--bs-light);
            color: var(--bs-secondary);
            font-weight: 700;
            font-size: .85rem;
        }

        .cs-label {
            font-size: .7rem;
            font-weight: 600;
            color: var(--bs-secondary);
        }

        .cs-step.active .cs-dot {
            background: var(--bs-primary);
            color: #fff;
        }

        .cs-step.active .cs-label {
            color: var(--bs-primary);
        }

        .cs-step.done .cs-dot {
            background: var(--bs-success);
            color: #fff;
        }

        .cs-line {
            flex-grow: 1;
            height: 2px;
            background: var(--bs-border-color);
            margin-top: 14px;
        }

        .cs-line.done {
            background: var(--bs-success);
        }

        /* ---- Tables-basic components ---- */
        .exp-row {
            cursor: pointer;
        }

        .exp-row.expanded .exp-icon {
            transform: rotate(90deg);
        }

        .exp-icon {
            transition: transform .2s;
        }

        .sortable.asc i {
            transform: rotate(0) !important;
        }

        .sortable.asc i::before {
            content: '\F0146';
        }

        .sortable.desc i::before {
            content: '\F0140';
        }

        .sortable.asc i,
        .sortable.desc i {
            color: var(--bs-primary) !important;
        }

        .hm-cell {
            font-weight: 600;
            font-size: .8rem;
            font-variant-numeric: tabular-nums;
        }

        /* ---- Tables-datatable components ---- */
        .tf-tag.active {
            background: var(--bs-primary) !important;
            color: #fff !important;
        }

        .col-hidden {
            display: none !important;
        }

        .grp-header td {
            background: var(--bs-primary-bg-subtle);
            font-weight: 700;
            cursor: pointer;
        }

        /* ---- Tables-editable components ---- */
        .ce-cell {
            cursor: pointer;
            padding: 8px;
            border-radius: 6px;
            transition: background .15s;
        }

        .ce-cell:hover {
            background: var(--bs-primary-bg-subtle);
        }

        .ce-cell.editing {
            padding: 0;
            background: transparent;
        }

        .ce-cell input,
        .ce-cell select {
            border: 2px solid var(--bs-primary);
            border-radius: 6px;
            padding: 6px 10px;
            width: 100%;
            outline: none;
        }

        .ce-cell input.invalid {
            border-color: var(--bs-danger);
        }

        .ss-cell {
            padding: 4px;
            min-width: 80px;
        }

        .ss-cell input {
            border: 0;
            background: transparent;
            width: 100%;
            outline: none;
            padding: 4px 6px;
        }

        .ss-cell.active {
            background: var(--bs-primary-bg-subtle);
            outline: 2px solid var(--bs-primary);
        }

        .wf-status {
            padding: 4px 10px;
            border-radius: 14px;
            font-weight: 600;
            font-size: .75rem;
            cursor: pointer;
            border: 0;
            outline: none;
        }

        /* ---- Tables-responsive components ---- */
        .rc-handle {
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
            width: 6px;
            cursor: col-resize;
            background: transparent;
            user-select: none;
        }

        .rc-handle:hover {
            background: var(--bs-primary);
            opacity: .5;
        }

        #stickyTable td:first-child,
        #stickyTable th:first-child {
            position: sticky;
            left: 0;
            background: var(--bs-body-bg);
            z-index: 1;
            box-shadow: 2px 0 4px rgba(0, 0, 0, .05);
        }

        #stickyTable thead th:first-child {
            background: var(--bs-light);
        }

        .md-item {
            padding: .75rem;
            border-bottom: 1px solid var(--bs-border-color);
            cursor: pointer;
            transition: .15s;
        }

        .md-item:hover {
            background: var(--bs-primary-bg-subtle);
        }

        .md-item.active {
            background: var(--bs-primary-bg-subtle);
            border-left: 3px solid var(--bs-primary);
        }

        .cc-hide {
            display: none !important;
        }

        /* ---- Charts extras ---- */
        #msFilters .btn:not(.active) {
            opacity: .4;
        }

        .ticker-row {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            border-bottom: 1px solid var(--bs-border-color);
            cursor: pointer;
            transition: .15s;
        }

        .ticker-row:hover {
            background: var(--bs-primary-bg-subtle);
        }

        .ticker-row:last-child {
            border-bottom: 0;
        }

        .ticker-sym {
            font-weight: 700;
            width: 60px;
            font-family: 'JetBrains Mono', monospace;
            font-size: .85rem;
        }

        .css-bar {
            display: flex;
            align-items: end;
            gap: 2px;
            height: 30px;
        }

        .css-bar span {
            flex: 1;
            border-radius: 2px 2px 0 0;
            transition: .2s;
        }

        .spark-cell {
            width: 120px;
            height: 36px;
        }

        /* ---- Maps-vector overrides ---- */
        .jvm-tooltip {
            background: #0f172a !important;
            border-radius: 6px;
            padding: 6px 10px;
            font-size: .8rem;
            font-family: 'Inter', sans-serif;
        }

        .jvm-marker {
            cursor: pointer;
        }

        /* ---- Range slider colored progress ---- */
        .range-fill {
            -webkit-appearance: none;
            appearance: none;
            height: 8px;
            border-radius: 99px;
            background: var(--gh-hover);
            outline: none;
        }

        /* ---- Email page list/scroll ---- */
        .mail-list-pane {
            display: flex;
            flex-direction: column;
        }

        .mail-list-scroll {
            flex: 1;
            overflow-y: auto;
        }


        /* ---- Additional extracted utilities (pass 2) ---- */
        .gh-overlay-tl {
            position: absolute;
            top: .65rem;
            left: .65rem;
        }

        .gh-op-7 {
            opacity: .7;
        }

        .gh-op-85 {
            opacity: .85;
        }

        .gh-op-9 {
            opacity: .9;
        }

        .gh-fs-78 {
            font-size: .78rem;
        }

        .gh-fs-90 {
            font-size: .9rem;
        }

        .gh-fs-12 {
            font-size: 1.2rem;
        }

        .gh-pre-line {
            white-space: pre-line;
        }

        .gh-w-16 {
            width: 16px;
        }

        .gh-w-32 {
            width: 32px;
        }

        .gh-w-48 {
            width: 48px;
        }

        .gh-mt-30 {
            margin-top: 30px;
        }

        .gh-h-prog {
            height: .55rem;
        }

        .gh-min-h-160 {
            min-height: 160px;
        }

        .gh-min-h-200 {
            min-height: 200px;
        }

        .gh-min-h-240 {
            min-height: 240px;
        }

        .gh-min-h-400 {
            min-height: 400px;
        }

        .gh-min-h-500 {
            min-height: 500px;
        }

        .gh-cursor-grab {
            cursor: grab;
        }

        .gh-ls-08 {
            letter-spacing: .08em;
        }

        .gh-rounded-circle {
            border-radius: 50%;
        }


        /* ---- Additional extracted utilities (pass 3) ---- */
        .gh-cursor-help {
            cursor: help;
        }

        .gh-fs-105 {
            font-size: 1.05rem;
        }

        .gh-cover-160 {
            width: 100%;
            height: 160px;
            border-radius: 14px;
        }

        .gh-otp-cell {
            width: 48px;
            height: 56px;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .gh-otp-cell-sm {
            width: 48px;
            height: 56px;
            font-size: 1.4rem;
        }

        .gh-otp-cell-md {
            width: 48px;
            height: 56px;
            font-size: 1.5rem;
        }

        .gh-otp-cell-lg {
            width: 50px;
            height: 60px;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .gh-feat-ic {
            width: 44px;
            height: 44px;
            flex-shrink: 0;
        }

        .gh-w-40 {
            width: 40px;
        }

        .gh-w-50 {
            width: 50px;
        }

        .gh-w-130 {
            width: 130px;
        }

        .gh-w-160 {
            width: 160px;
        }

        .gh-w-180 {
            width: 180px;
        }

        .gh-w-240 {
            width: 240px;
        }

        .gh-w-260 {
            width: 260px;
        }

        .gh-min-w-120 {
            min-width: 120px;
        }

        .gh-min-w-140 {
            min-width: 140px;
        }

        .gh-min-w-160 {
            min-width: 160px;
        }

        .gh-min-w-180 {
            min-width: 180px;
        }

        .gh-min-w-200 {
            min-width: 200px;
        }

        .gh-min-w-240 {
            min-width: 240px;
        }

        .gh-z-10 {
            z-index: 10;
        }

        .gh-z-20 {
            z-index: 20;
        }

        .gh-scroll-200 {
            max-height: 200px;
            overflow-y: auto;
        }

        .gh-scroll-240 {
            max-height: 240px;
            overflow-y: auto;
        }

        .gh-scroll-260 {
            max-height: 260px;
            overflow-y: auto;
        }

        .gh-scroll-280 {
            max-height: 280px;
            overflow-y: auto;
        }

        .gh-scroll-300 {
            max-height: 300px;
            overflow-y: auto;
        }

        .gh-scroll-340 {
            max-height: 340px;
            overflow-y: auto;
        }

        .gh-scroll-400 {
            max-height: 400px;
            overflow-y: auto;
        }

        .gh-scroll-500 {
            max-height: 500px;
            overflow-y: auto;
        }


        /* ---- Additional extracted utilities (pass 4) ---- */
        .gh-label-cap {
            opacity: .85;
            font-size: .7rem;
            text-transform: uppercase;
            letter-spacing: .08em;
        }

        .gh-btn-glass {
            background: rgba(255, 255, 255, .15);
            color: #fff;
            border: 0;
        }

        .gh-input-glass {
            color: rgba(255, 255, 255, .92);
            border-color: rgba(255, 255, 255, .08);
        }

        .gh-display-h {
            font-family: 'Plus Jakarta Sans';
            font-weight: 800;
            font-size: 1.4rem;
            color: var(--gh-heading);
        }

        .gh-z-rel-1 {
            position: relative;
            z-index: 1;
        }

        .gh-tile-glass {
            background: rgba(255, 255, 255, .12);
            padding: .5rem;
            border-radius: 10px;
        }

        .gh-spark-h {
            height: 50px;
            margin-top: .5rem;
        }

        .gh-h-90 {
            height: 90px;
        }

        .gh-h-120 {
            height: 120px;
        }

        .gh-h-180 {
            height: 180px;
        }

        .gh-h-200 {
            height: 200px;
        }

        .gh-h-220 {
            height: 220px;
        }

        .gh-fs-22 {
            font-size: 2.2rem;
        }

        .gh-fs-25 {
            font-size: 2.5rem;
        }

        .gh-num-cell {
            font-size: 1.5rem;
            min-width: 32px;
        }

        .gh-num-display {
            font-size: 1.4rem;
            font-family: 'Plus Jakarta Sans';
            letter-spacing: -.02em;
        }

        .gh-circle-60 {
            width: 60px;
            height: 60px;
            font-size: 1.8rem;
        }

        .gh-tile-52 {
            width: 52px;
            height: 52px;
            border-radius: 12px;
        }

        .gh-tile-42 {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: var(--gh-hover);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }

        .gh-size-32-fs {
            width: 32px;
            height: 32px;
            flex-shrink: 0;
        }

        .gh-lh-1 {
            line-height: 1;
        }

        .gh-lh-11 {
            line-height: 1.1;
        }

        .gh-lh-16 {
            line-height: 1.6;
        }


        /* ---- Additional extracted utilities (pass 5) ---- */
        /* Percentage widths (mock data / progress) */
        .w-p-0 {
            width: 0%;
        }

        .w-p-2 {
            width: 2%;
        }

        .w-p-8 {
            width: 8%;
        }

        .w-p-14 {
            width: 14%;
        }

        .w-p-18 {
            width: 18%;
        }

        .w-p-22 {
            width: 22%;
        }

        .w-p-25 {
            width: 25%;
        }

        .w-p-42 {
            width: 42%;
        }

        .w-p-55 {
            width: 55%;
        }

        .w-p-60 {
            width: 60%;
        }

        .w-p-64 {
            width: 64%;
        }

        .w-p-68 {
            width: 68%;
        }

        .w-p-75 {
            width: 75%;
        }

        .w-p-78 {
            width: 78%;
        }

        .w-p-92 {
            width: 92%;
        }

        .w-p-100 {
            width: 100%;
        }

        /* Object fit */
        .gh-obj-cover {
            object-fit: cover;
        }

        /* Min widths */
        .gh-min-w-50 {
            min-width: 50px;
        }

        .gh-min-w-60 {
            min-width: 60px;
        }

        .gh-min-w-48-tr {
            min-width: 48px;
            text-align: right;
        }

        .gh-w-64-tr {
            width: 64px;
            text-align: right;
        }

        /* Small heights */
        .gh-h-half {
            height: .5rem;
        }

        .gh-h-prog2 {
            height: .6rem;
        }

        .gh-h-12 {
            height: 1.2rem;
        }

        .gh-h-16 {
            height: 1.6rem;
        }

        .gh-h-4 {
            height: 4px;
        }

        .gh-h-40 {
            height: 40px;
        }

        .gh-track-4 {
            height: 4px;
            border-radius: 2px;
            background: var(--gh-hover);
        }

        /* Common font sizes */
        .gh-fs-13 {
            font-size: 1.3rem;
        }

        .gh-fs-115 {
            font-size: 1.15rem;
        }

        .gh-fs-62 {
            font-size: .62rem;
        }

        .gh-fs-35 {
            font-size: 3.5rem;
        }

        /* Specific colors */
        .gh-c-google-red {
            color: #ea4335;
        }

        .gh-c-slate-300 {
            color: #cbd5e1;
        }

        .gh-c-slate-200 {
            color: #e2e8f0;
        }

        /* Glass / overlay backgrounds (used on auth pages) */
        .gh-bg-glass-20 {
            background: rgba(255, 255, 255, .2);
        }

        .gh-btn-glass-light {
            background: rgba(255, 255, 255, .1);
            color: #fff;
            border: 0;
        }

        .gh-tile-glass-light {
            background: rgba(255, 255, 255, .1);
            border-radius: 8px;
            padding: .5rem;
        }

        .gh-tile-glass-12 {
            background: rgba(255, 255, 255, .12);
            padding: .4rem .2rem;
            border-radius: 8px;
        }

        .gh-bg-hover-body {
            background: var(--gh-hover);
            color: var(--gh-body);
        }

        /* Composite shapes */
        .gh-pill-64-22 {
            width: 64px;
            height: 22px;
            border-radius: 6px;
        }

        .gh-pill-50-20 {
            width: 50px;
            height: 20px;
            border-radius: 8px;
        }

        .gh-pill-64-30 {
            width: 64px;
            height: 30px;
            border-radius: 99px;
        }

        .gh-tile-52-r14 {
            width: 52px;
            height: 52px;
            border-radius: 14px;
        }

        .gh-tile-30 {
            width: 30px;
            height: 30px;
            border-radius: 8px;
        }

        .gh-img-42 {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            object-fit: cover;
        }

        .gh-img-44 {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            object-fit: cover;
        }

        .gh-img-160 {
            width: 160px;
            height: 160px;
            object-fit: cover;
            display: block;
        }

        .gh-img-260 {
            height: 260px;
            object-fit: cover;
        }

        .gh-size-42 {
            width: 42px;
            height: 42px;
        }

        .gh-size-38-fs {
            width: 38px;
            height: 38px;
            font-size: .95rem;
        }

        .gh-w-54 {
            width: 54px;
        }

        .gh-w-12 {
            width: 12px;
        }

        .gh-w-90 {
            width: 90px;
        }

        /* Max-widths */
        .gh-mw-none {
            max-width: none;
        }

        .gh-mw-560-center {
            max-width: 560px;
            margin: 0 auto;
        }

        .gh-mw-540-rel {
            max-width: 540px;
            position: relative;
        }

        .gh-mw-240 {
            max-width: 240px;
        }

        .gh-mh-200 {
            max-height: 200px;
        }

        /* Positioning */
        .gh-top-90 {
            top: 90px;
        }

        .gh-rel-iblock {
            position: relative;
            display: inline-block;
        }

        .gh-overlay-gradient {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 40%, rgba(0, 0, 0, .7));
        }

        /* Opacity */
        .gh-op-5 {
            opacity: .5;
        }

        .gh-op-6 {
            opacity: .6;
        }

        .gh-op-8-fs-65 {
            opacity: .8;
            font-size: .65rem;
        }

        .gh-op-8-fs-62 {
            opacity: .8;
            font-size: .62rem;
        }

        .gh-strike-60 {
            text-decoration: line-through;
            opacity: .6;
        }

        /* Letter spacing combos */
        .gh-ls-fs-68 {
            letter-spacing: .06em;
            font-size: .68rem;
        }

        .gh-ls-fs-66 {
            letter-spacing: .06em;
            font-size: .66rem;
        }

        /* Display sizes */
        .gh-display-25 {
            font-size: 2.5rem;
            font-family: 'Plus Jakarta Sans';
        }

        .gh-display-22 {
            font-size: 2.2rem;
            font-weight: 800;
            line-height: 1;
        }

        /* Labels */
        .gh-label-muted {
            font-size: .78rem;
            text-transform: uppercase;
            letter-spacing: .06em;
            color: var(--gh-muted);
        }

        /* Wizard / circle */
        .gh-mini-140 {
            min-height: 140px;
            background: var(--gh-hover);
            border-radius: 10px;
            padding: .5rem;
        }

        .gh-wiz-circle {
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            background: var(--gh-hover);
            color: var(--gh-muted);
            border: 2px solid var(--gh-border);
        }

        .gh-circle-100 {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: var(--gh-card);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        /* Icon tiles (gradient soft) */
        .gh-tile-48-primary {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            flex-shrink: 0;
            background: #e6f1e5;
            color: var(--gh-primary);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }

        .gh-tile-42-primary {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: var(--gh-primary-soft);
            color: var(--gh-primary);
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .gh-tile-48 {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            flex-shrink: 0;
        }

        /* Dual-range slider overlay (form-advanced) */
        .gh-slider-overlay {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            width: 100%;
            pointer-events: none;
            background: transparent;
            -webkit-appearance: none;
            height: 40px;
            z-index: 2;
        }


        /* ---- Additional extracted utilities (pass 6) ---- */
        /* More percentage widths */
        .w-p-6 {
            width: 6%;
        }

        .w-p-10 {
            width: 10%;
        }

        .w-p-15 {
            width: 15%;
        }

        .w-p-20 {
            width: 20%;
        }

        .w-p-35 {
            width: 35%;
        }

        .w-p-40 {
            width: 40%;
        }

        .w-p-45 {
            width: 45%;
        }

        .w-p-50 {
            width: 50%;
        }

        .w-p-58 {
            width: 58%;
        }

        .w-p-71 {
            width: 71%;
        }

        .w-p-77 {
            width: 77%;
        }

        .w-p-82 {
            width: 82%;
        }

        .w-p-88 {
            width: 88%;
        }

        .w-p-96 {
            width: 96%;
        }

        .w-p-42-white {
            width: 42%;
            background: #fff;
        }

        /* Hover link soft */
        .gh-link-soft {
            color: #cbd5e1;
            transition: color .15s;
        }

        .gh-link-soft:hover {
            color: #fff;
        }

        /* Status/icon tile colored variants */
        .gh-tile-48-warning {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            flex-shrink: 0;
            background: rgba(245, 158, 11, .12);
            color: var(--gh-warning);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }

        .gh-tile-48-info {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            flex-shrink: 0;
            background: rgba(14, 165, 233, .12);
            color: var(--gh-info);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }

        .gh-tile-38-warning {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            background: rgba(245, 158, 11, .14);
            color: var(--gh-warning);
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .gh-tile-38-danger {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            background: rgba(244, 63, 94, .12);
            color: var(--gh-danger);
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .gh-tile-38-success {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            background: rgba(20, 184, 166, .12);
            color: var(--gh-success);
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        /* Status backgrounds */
        .gh-bg-warning-w {
            background: var(--gh-warning);
            color: #fff;
        }

        .gh-bg-success-w {
            background: var(--gh-success);
            color: #fff;
        }

        .gh-bg-danger-w {
            background: var(--gh-danger);
            color: #fff;
        }

        .gh-bg-warning {
            background: var(--gh-warning);
        }

        .gh-bg-success {
            background: var(--gh-success);
        }

        .gh-bg-primary {
            background: var(--gh-primary);
        }

        .gh-bg-black {
            background: #000;
        }

        .gh-btn-amber-grad {
            background: linear-gradient(135deg, #fbbf24, #f97316);
            color: #000;
            border: 0;
        }

        /* Wizard line / accents */
        .gh-wiz-line {
            flex: 0 0 60px;
            height: 2px;
            margin-top: 22px;
            background: var(--gh-border);
        }

        .gh-bt-primary {
            border-top: 4px solid var(--gh-primary);
        }

        /* Z-index */
        .gh-z-1 {
            z-index: 1;
        }

        .gh-z-2 {
            z-index: 2;
        }

        /* Position presets */
        .gh-pos-tr-1 {
            position: absolute;
            top: 1rem;
            right: 1rem;
        }

        .gh-table-fixed {
            table-layout: fixed;
        }

        /* Sizes */
        .gh-size-56 {
            width: 56px;
            height: 56px;
        }

        .gh-pill-80 {
            width: 80px;
            height: 32px;
            border-radius: 99px;
        }

        .gh-rect-120 {
            width: 120px;
            height: 38px;
            border-radius: 10px;
        }

        .gh-rect-42 {
            width: 100%;
            height: 42px;
            border-radius: 10px;
        }

        .gh-progress-100 {
            width: 100px;
            height: .6rem;
            margin: 0;
        }

        .gh-cell-40 {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .gh-img-40 {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            object-fit: cover;
        }

        .gh-circle-50 {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--gh-card);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .gh-circle-110 {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            background: var(--gh-card);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .gh-w-60-tc {
            width: 60px;
            text-align: center;
        }

        /* Font sizes */
        .gh-fs-15-cell {
            font-size: 1.5rem;
            width: 32px;
            text-align: center;
        }

        .gh-fs-145 {
            font-size: 1.45rem;
        }

        .gh-fs-125 {
            font-size: 1.25rem;
        }

        .gh-fs-70-ls {
            font-size: .7rem;
            letter-spacing: .06em;
        }

        .gh-fs-50 {
            font-size: .5rem;
        }

        /* Decorative blobs (auth/dashboard backgrounds) */
        .gh-blob-tl-180 {
            position: absolute;
            top: -60px;
            left: -60px;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .08);
        }

        .gh-blob-tr-180 {
            position: absolute;
            top: -50px;
            right: -50px;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .1);
        }

        .gh-blob-br-200 {
            position: absolute;
            bottom: -80px;
            right: -80px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .06);
        }

        .gh-blob-tr-140 {
            position: absolute;
            top: -40px;
            right: -40px;
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: radial-gradient(circle, #e6f1e5, transparent 70%);
        }

        /* Strip gradients (top of cards) */
        .gh-strip-amber-rose {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #f59e0b, #f43f5e);
        }

        .gh-strip-gold {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #fbbf24, #f97316, #fbbf24);
        }

        /* Range track base */
        .gh-range-track {
            position: absolute;
            left: 0;
            right: 0;
            top: 18px;
            height: 4px;
            background: var(--bs-border-color);
            border-radius: 2px;
        }

        /* Cover image caption */
        .gh-cover-caption {
            bottom: 2rem;
            left: 2rem;
            right: auto;
            max-width: 60%;
        }

        /* Pulse dot accent */
        .gh-dot-pulse-rose {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #f43f5e;
            animation: badgePulse 1.5s ease-in-out infinite;
        }


        /* ---- Additional extracted utilities (pass 7) ---- */
        /* Border-top accents */
        .gh-bt-warning {
            border-top: 4px solid var(--gh-warning);
        }

        .gh-bt-success {
            border-top: 4px solid var(--gh-success);
        }

        .gh-bt-info {
            border-top: 4px solid var(--gh-info);
        }

        /* Background tints */
        .gh-bg-info-w {
            background: var(--gh-info);
            color: #fff;
        }

        .gh-bg-hover-body-tr {
            background: var(--gh-hover);
            color: var(--gh-body);
            transition: all .2s;
        }

        .gh-bg-hover-noborder {
            background: var(--gh-hover);
            border: 0;
        }

        .gh-bg-primary-12 {
            background: #e6f1e5;
            color: var(--gh-primary);
        }

        .gh-badge-glass-15 {
            background: rgba(255, 255, 255, .15);
            font-size: .75rem;
            font-weight: 700;
        }

        .gh-badge-amber-18 {
            background: rgba(251, 191, 36, .18);
            color: #fbbf24;
            font-weight: 800;
        }

        .gh-badge-rose-12 {
            background: rgba(244, 63, 94, .12);
            font-size: .68rem;
            font-weight: 800;
            letter-spacing: .06em;
        }

        /* Borders */
        .gh-border {
            border: 1px solid var(--gh-border);
        }

        .gh-border-glass-3 {
            border: 3px solid rgba(255, 255, 255, .4);
        }

        .gh-bc-slate-800 {
            border-color: #1e293b;
        }

        /* Font sizes */
        .gh-fs-5 {
            font-size: 5rem;
        }

        .gh-fs-24-lh {
            font-size: 2.4rem;
            line-height: 1.15;
        }

        .gh-fs-24-amber {
            font-size: 2.4rem;
            color: #fbbf24;
        }

        .gh-fs-18-op85 {
            font-size: 1.8rem;
            opacity: .85;
        }

        .gh-fs-18-op7 {
            font-size: 1.8rem;
            opacity: .7;
        }

        .gh-fs-18-self {
            font-size: 1.8rem;
            align-self: center;
        }

        .gh-fs-16-lh {
            font-size: 1.6rem;
            line-height: 1;
        }

        .gh-fs-15-clk {
            font-size: 1.5rem;
            cursor: pointer;
        }

        .gh-fs-12-op85 {
            font-size: 1.2rem;
            opacity: .85;
        }

        .gh-fs-80 {
            font-size: .8rem;
        }

        .gh-fs-55 {
            font-size: .55rem;
        }

        .gh-display-2 {
            font-size: 2rem;
            font-weight: 800;
            line-height: 1.1;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .gh-display-h-white {
            font-family: 'Plus Jakarta Sans';
            font-weight: 800;
            font-size: 1.4rem;
            color: #fff;
        }

        /* Misc */
        .gh-pe-none {
            pointer-events: none;
        }

        .gh-input-bare-120 {
            outline: none;
            background: transparent;
            min-width: 120px;
        }

        .gh-min-w-280 {
            min-width: 280px;
        }

        .gh-tag-input {
            min-height: 48px;
            cursor: text;
        }

        .gh-min-h-320 {
            min-height: 320px;
        }

        .gh-min-h-280 {
            min-height: 280px;
        }

        .gh-mw-420 {
            max-width: 420px;
        }

        .gh-mw-260 {
            max-width: 260px;
        }

        .gh-mw-100-mh-75 {
            max-width: 100%;
            max-height: 75vh;
        }

        .gh-mt-60 {
            margin-top: 60px;
        }

        .gh-card-banner {
            height: 60px;
            background: linear-gradient(135deg, #5b3df033, #5b3df011);
            border-radius: 14px 14px 0 0;
            margin: -1.35rem -1.35rem 0;
            position: relative;
        }

        .gh-search-42 {
            height: 42px;
            padding-left: 2.6rem;
        }

        .gh-search-36 {
            height: 36px;
            padding-left: 2.4rem;
        }

        .gh-map-320 {
            height: 320px;
            border-radius: 12px;
            background: var(--bs-light-bg-subtle);
        }

        .gh-h-30vh {
            height: 30vh;
        }

        .gh-h-240 {
            height: 240px;
        }

        .gh-invert {
            filter: invert(1);
        }

        .gh-d-none-imp {
            display: none !important;
        }


        /* ==========================================================================
   AUTO-EXTRACTED REMAINING INLINE STYLES (one class per unique style)
   ========================================================================== */

        .sx-796deb17 {
            --bs-pagination-active-bg: var(--gh-danger);
            --bs-pagination-active-border-color: var(--gh-danger);
        }

        .sx-0f52d8d9 {
            --bs-pagination-active-bg: var(--gh-success);
            --bs-pagination-active-border-color: var(--gh-success);
        }

        .sx-e111242c {
            --bs-pagination-active-bg: var(--gh-warning);
            --bs-pagination-active-border-color: var(--gh-warning);
        }

        .sx-54c4de87 {
            --bs-pagination-color: #cbd5e1;
            --bs-pagination-hover-color: #fff;
            --bs-pagination-hover-bg: rgba(255, 255, 255, .08);
            --bs-pagination-active-bg: #fbbf24;
            --bs-pagination-active-border-color: #fbbf24;
        }

        .sx-2344d62e {
            aspect-ratio: 1;
            cursor: pointer;
        }

        .sx-d7c4f9a5 {
            background: #000;
            border: 0;
        }

        .sx-200df320 {
            background: #000;
            position: relative;
            border-radius: 14px;
            overflow: hidden;
        }

        .sx-e2e29a0a {
            background: #0a66c2;
            color: #fff;
            padding: 1rem .5rem;
            border-radius: 14px;
            border: 0;
        }

        .sx-e73ac141 {
            background: #0f172a;
            border-color: #1e293b;
            color: #fff;
            min-width: 240px;
        }

        .sx-fc717d9d {
            background: #0f172a;
            color: #e2e8f0;
            min-height: 240px;
            font-size: .85rem;
            line-height: 1.6;
            overflow: auto;
        }

        .sx-d4e03f35 {
            background: #0f172a;
            color: #fff;
        }

        .sx-2ed51582 {
            background: #0f172a;
            color: #fff;
            border: 0;
        }

        .sx-aa9a4adb {
            background: #0f172a;
            color: #fff;
            border: 0;
            position: relative;
            overflow: hidden;
        }

        .sx-3ca93d50 {
            background: #0f172a;
            color: #fff;
            border: 0;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .sx-be07d5c3 {
            background: #14b8a6;
        }

        .sx-86b6058d {
            background: #14b8a6;
            color: #fff;
        }

        .sx-cb2ff00d {
            background: #1877f2;
            color: #fff;
            padding: 1rem .5rem;
            border-radius: 14px;
            border: 0;
        }

        .sx-26d1208e {
            background: #1da1f2;
            color: #fff;
            padding: 1rem .5rem;
            border-radius: 14px;
            border: 0;
        }

        .sx-f5a731a3 {
            background: #22d3ee;
        }

        .sx-cbfa2b3a {
            background: #22d3ee;
            color: #fff;
        }

        .sx-8593d7bf {
            background: #25d366;
            color: #fff;
            padding: 1rem .5rem;
            border-radius: 14px;
            border: 0;
        }

        .sx-8234ae76 {
            background: #475569;
            color: #fff;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: .85rem;
        }

        .sx-988be308 {
            background: #5b3df0;
        }

        .sx-0f10bd70 {
            background: #5b3df0;
            color: #fff;
        }

        .sx-72be4b4b {
            background: #94a3b8;
        }

        .sx-a8d2bb57 {
            background: #94a3b8;
            color: #fff;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: .85rem;
        }

        .sx-c1345e8a {
            background: #cbd5e1;
        }

        .sx-76f9108e {
            background: #d97706;
            color: #fff;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: .85rem;
        }

        .sx-6c43c613 {
            background: #f43f5e;
        }

        .sx-8f77cf3c {
            background: #f43f5e;
            color: #fff;
        }

        .sx-a76e943b {
            background: #f59e0b;
        }

        .sx-cd7ad4d9 {
            background: #f59e0b;
            color: #fff;
        }

        .sx-fc997705 {
            background: #fbbf24;
            color: #000;
            border: 0;
        }

        .sx-a35c5ebe {
            background: #fbbf24;
            color: #000;
            font-weight: 800;
        }

        .sx-c377311c {
            background: #fbbf24;
            color: #fff;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: .85rem;
        }

        .sx-2db5349b {
            background: #fff;
            color: #0f172a;
            border: 0;
            width: 48px;
            height: 48px;
        }

        .sx-8a61a095 {
            background: #fff;
            color: var(--gh-primary);
            box-shadow: 0 10px 24px rgba(0, 0, 0, .18);
            position: relative;
            border: 0;
        }

        .sx-78560e4d {
            background: #fff;
            color: var(--gh-primary);
            font-weight: 700;
        }

        .sx-92051b9a {
            background: linear-gradient(135deg, #0ea5e9, #3b82f6);
        }

        .sx-e143c8e9 {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            color: #fff;
        }

        .sx-a8ba5c55 {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            color: #fff;
            border: 0;
            position: relative;
            overflow: hidden;
        }

        .sx-11000bf8 {
            background: linear-gradient(135deg, #14b8a6 0%, #0ea5e9 50%, #5b3df0 100%);
            color: #fff;
            border: 0;
            position: relative;
            overflow: hidden;
        }

        .sx-fa89f8ac {
            background: linear-gradient(135deg, #1877f2, #0d5fc4);
            color: #fff;
            border: 0;
        }

        .sx-49fba60c {
            background: linear-gradient(135deg, #1da1f2, #0084d4);
            color: #fff;
            border: 0;
        }

        .sx-8676dc2d {
            background: linear-gradient(135deg, #1e293b, #0f172a);
            color: #fff;
            border: 0;
        }

        .sx-1f84a665 {
            background: linear-gradient(135deg, #22c55e, #14b8a6);
        }

        .sx-4505e860 {
            background: linear-gradient(135deg, #5b3df0 0%, #22d3ee 100%);
        }

        .sx-b5db83d7 {
            background: linear-gradient(135deg, #5b3df0 0%, #8b5cf6 50%, #22d3ee 100%);
            color: #fff;
            border: 0;
            position: relative;
            overflow: hidden;
        }

        .sx-535417fd {
            background: linear-gradient(135deg, #5b3df0 0%, #8b5cf6 50%, #f43f5e 100%);
        }

        .sx-88d93bec {
            background: linear-gradient(135deg, #5b3df0, #22d3ee);
        }

        .sx-db41cffc {
            background: linear-gradient(135deg, #5b3df0, #22d3ee);
            min-height: 200px;
            box-shadow: 0 14px 30px rgba(91, 61, 240, .3);
        }

        .sx-f63948df {
            background: linear-gradient(135deg, #5b3df0, #8b5cf6);
            color: #fff;
            border: 0;
            position: relative;
            overflow: hidden;
        }

        .sx-1fddc217 {
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
        }

        .sx-2af99bad {
            background: linear-gradient(135deg, #e1306c, #c13584);
            color: #fff;
            border: 0;
        }

        .sx-0d587cb3 {
            background: linear-gradient(135deg, #f1f5f9 0%, #cbd5e1 100%);
        }

        .sx-b4c13aaa {
            background: linear-gradient(135deg, #f59e0b 0%, #f43f5e 100%);
        }

        .sx-b9d87eb0 {
            background: linear-gradient(135deg, #f59e0b, #f43f5e);
        }

        .sx-833b74f5 {
            background: linear-gradient(135deg, #fb7185, #f43f5e);
        }

        .sx-9231ea14 {
            background: linear-gradient(135deg, #fbbf24, #f97316);
            color: #0f172a;
            border: 0;
            box-shadow: 0 10px 24px rgba(251, 191, 36, .3);
        }

        .sx-bf49e2ed {
            background: linear-gradient(135deg, #fbbf24, #fb923c);
            color: #fff;
            border: 0;
        }

        .sx-61bc6d08 {
            background: linear-gradient(135deg, #ff0000, #c4302b);
            color: #fff;
            border: 0;
        }

        .sx-670d0c23 {
            background: linear-gradient(135deg, rgba(20, 184, 166, .06), rgba(14, 165, 233, .08));
            border: 1px solid rgba(20, 184, 166, .15);
        }

        .sx-caf6e56e {
            background: linear-gradient(135deg, rgba(91, 61, 240, .06), rgba(34, 211, 238, .06));
            border: 0;
        }

        .sx-fd0ed0ad {
            background: linear-gradient(135deg, rgba(91, 61, 240, .06), rgba(34, 211, 238, .06));
            margin: -.5rem -.5rem .5rem;
        }

        .sx-78fa1c86 {
            background: linear-gradient(135deg, rgba(91, 61, 240, .08), rgba(34, 211, 238, .08));
        }

        .sx-7a3e70a9 {
            background: linear-gradient(90deg, #0ea5e9, #fbbf24, #f43f5e);
            border-radius: 99px;
        }

        .sx-a1d7d5d3 {
            background: linear-gradient(90deg, #fbbf24, #f97316);
            color: #0f172a;
            font-weight: 800;
            font-size: .7rem;
            letter-spacing: .06em;
            padding: .4rem .85rem;
            box-shadow: 0 6px 16px rgba(251, 191, 36, .4);
        }

        .sx-8bac3083 {
            background: linear-gradient(90deg, rgba(91, 61, 240, .04), rgba(34, 211, 238, .04));
        }

        .sx-8ed2e0dc {
            background: linear-gradient(transparent, rgba(0, 0, 0, .7));
        }

        .sx-41809dbc {
            background: radial-gradient(circle at 30% 40%, rgba(91, 61, 240, .06), transparent 60%), radial-gradient(circle at 70% 60%, rgba(34, 211, 238, .06), transparent 60%);
        }

        .sx-4353ff19 {
            background: radial-gradient(circle at top, rgba(20, 184, 166, .12), transparent 60%);
        }

        .sx-3040b8ae {
            background: rgba(0, 0, 0, .7);
        }

        .sx-cd67bc3b {
            background: rgba(14, 165, 233, .12);
            color: var(--gh-info);
        }

        .sx-964d0379 {
            background: rgba(20, 184, 166, .08);
            color: var(--gh-success);
            font-size: .82rem;
        }

        .sx-ca7699f5 {
            background: rgba(20, 184, 166, .12);
            color: var(--gh-success);
        }

        .sx-dded6639 {
            background: rgba(20, 184, 166, .14);
            border: 0;
            border-radius: 14px;
            padding: .85rem;
        }

        .sx-a89acc48 {
            background: rgba(20, 184, 166, .15);
        }

        .sx-d92e395c {
            background: rgba(244, 63, 94, .1);
            border: 0;
            border-radius: 14px;
            padding: .85rem;
        }

        .sx-6e354a09 {
            background: rgba(244, 63, 94, .12);
            color: #f43f5e;
        }

        .sx-5b34d2c9 {
            background: rgba(244, 63, 94, .12);
            color: var(--gh-danger);
        }

        .sx-4abe544f {
            background: rgba(245, 158, 11, .12);
            color: #f59e0b;
        }

        .sx-8b84951e {
            background: rgba(245, 158, 11, .12);
            color: var(--gh-warning);
        }

        .sx-854151b8 {
            background: rgba(245, 158, 11, .14);
            border: 0;
            border-radius: 14px;
            padding: .85rem;
        }

        .sx-68f945b4 {
            background: rgba(245, 158, 11, .14);
            font-size: .68rem;
            font-weight: 800;
        }

        .sx-4df214d1 {
            background: rgba(245, 158, 11, .14);
            font-size: .68rem;
            font-weight: 800;
            letter-spacing: .06em;
        }

        .sx-442f36ad {
            background: rgba(251, 191, 36, .18);
            color: #fbbf24;
            font-weight: 800;
            font-size: .7rem;
            letter-spacing: .06em;
            border: 1px solid rgba(251, 191, 36, .3);
        }

        .sx-9de67268 {
            background: rgba(255, 255, 255, .18);
            color: #fff;
            border: 0;
        }

        .sx-47c4e39e {
            background: rgba(255, 255, 255, .2);
            border: 0;
            color: #fff;
            font-weight: 600;
        }

        .sx-bdc1d9f6 {
            background: rgba(255, 255, 255, .2);
            border: 0;
            color: #fff;
            font-weight: 600;
            width: auto;
        }

        .sx-5d0117e2 {
            background: rgba(255, 255, 255, .2);
            color: #fff;
        }

        .sx-348053af {
            background: rgba(255, 255, 255, .2);
            color: #fff;
            font-weight: 700;
        }

        .sx-9590a691 {
            background: rgba(255, 255, 255, .2);
            font-size: .68rem;
            font-weight: 800;
        }

        .sx-e91565fd {
            background: rgba(255, 255, 255, .2);
            font-size: .68rem;
            font-weight: 800;
            letter-spacing: .06em;
        }

        .sx-617d8870 {
            background: rgba(255, 255, 255, .25);
            height: 6px;
        }

        .sx-425b32ad {
            background: rgba(255, 255, 255, .9);
            color: #000;
            border: 0;
            width: 56px;
            height: 56px;
            border-radius: 50%;
        }

        .sx-7d135967 {
            background: rgba(34, 211, 238, .12);
            color: #22d3ee;
        }

        .sx-daac1408 {
            background: rgba(91, 61, 240, .08);
            font-weight: 800;
            color: var(--gh-primary);
        }

        .sx-f6dea1e4 {
            background: #e6f1e5;
            border: 0;
            border-radius: 14px;
            padding: .85rem;
        }

        .sx-1c669228 {
            background: #e6f1e5;
            color: var(--gh-primary);
        }

        .sx-59f225b6 {
            background: transparent;
            border: 1px solid var(--gh-danger);
            color: var(--gh-danger);
        }

        .sx-fb066ac4 {
            background: transparent;
            border: 1px solid var(--gh-primary);
            color: var(--gh-primary);
        }

        .sx-40db40b9 {
            background: transparent;
            border: 1px solid var(--gh-success);
            color: var(--gh-success);
        }

        .sx-50d96b6c {
            background: transparent;
            color: transparent;
            caret-color: #fff;
            font-size: .85rem;
            line-height: 1.6;
            resize: none;
            outline: none;
        }

        .sx-f8760591 {
            background: transparent;
            color: var(--gh-body);
        }

        .sx-e85ecfb8 {
            background: var(--bs-body-bg);
        }

        .sx-d8158852 {
            background: var(--bs-light);
        }

        .sx-57348080 {
            background: var(--bs-light);
            text-align: center;
            font-weight: 600;
        }

        .sx-3a78925f {
            background: var(--bs-primary-bg-subtle);
        }

        .sx-75cc121d {
            background: var(--gh-danger);
        }

        .sx-d8b2d8d8 {
            background: var(--gh-grad-cool);
        }

        .sx-d35a01e4 {
            background: var(--gh-grad-mint);
            width: 28px;
            height: 28px;
            font-size: .85rem;
            border-radius: 8px;
        }

        .sx-46c67879 {
            background: var(--gh-grad-primary) !important;
        }

        .sx-70446ce0 {
            background: var(--gh-grad-primary);
            color: #fff;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .sx-f86a897c {
            background: var(--gh-grad-primary);
            color: #fff;
            border: 0;
        }

        .sx-a02be84d {
            background: var(--gh-hover);
            color: var(--gh-muted);
            box-shadow: none;
        }

        .sx-a768243c {
            background: var(--gh-hover);
            padding: 1.25rem;
            border-radius: 0 0 0 14px;
        }

        .sx-cbb87c2c {
            background: var(--gh-hover);
            padding: 1.5rem;
            border-radius: 14px 0 0 14px;
        }

        .sx-f346fc37 {
            background: var(--gh-info);
        }

        .sx-678d722a {
            background: var(--gh-primary);
            color: #fff;
            border: 0;
        }

        .sx-ef55d6f8 {
            background: var(--gh-success);
            color: #fff;
            border: 0;
        }

        .sx-4582b40b {
            border-color: rgba(255, 255, 255, .18);
        }

        .sx-edff7786 {
            border-color: rgba(255, 255, 255, .2);
        }

        .sx-a5e1d70b {
            border-left: 3px solid var(--gh-danger);
            padding-left: .75rem;
            flex: 1;
        }

        .sx-ea4d715e {
            border-left: 3px solid var(--gh-primary);
            padding-left: .75rem;
            flex: 1;
        }

        .sx-36849a6c {
            border-left: 3px solid var(--gh-success);
            padding-left: .75rem;
            flex: 1;
        }

        .sx-8b56bbc2 {
            border-left: 3px solid var(--gh-warning);
            padding-left: .75rem;
            flex: 1;
        }

        .sx-65eff076 {
            border: 0;
            background: transparent;
            padding-left: 0;
        }

        .sx-4ece67d7 {
            border: 0;
            font-size: 1.6rem;
            font-weight: 700;
        }

        .sx-df5fcca3 {
            border: 1.5px solid var(--gh-danger);
            color: var(--gh-danger);
            background: transparent;
        }

        .sx-1a095df6 {
            border: 1.5px solid var(--gh-info);
            color: var(--gh-info);
            background: transparent;
        }

        .sx-9d0b6d14 {
            border: 1.5px solid var(--gh-success);
            color: var(--gh-success);
            background: transparent;
        }

        .sx-81302769 {
            border: 1.5px solid var(--gh-warning);
            color: var(--gh-warning);
            background: transparent;
        }

        .sx-39eb0f4e {
            border: 2px dashed var(--bs-border-color);
            cursor: pointer;
            transition: .2s;
        }

        .sx-4cddebb0 {
            border: 2px dashed var(--bs-border-color);
            transition: .2s;
        }

        .sx-d1e695c4 {
            border: 2px dashed var(--gh-border);
            border-radius: 14px;
            padding: 3rem 1rem;
            text-align: center;
            background: var(--gh-hover);
            cursor: pointer;
            transition: all .2s;
        }

        .sx-e4d29a27 {
            border: 3px solid rgba(251, 191, 36, .5);
        }

        .sx-860f414a {
            border: 4px dashed var(--gh-primary);
        }

        .sx-4e454fec {
            border: 4px solid var(--gh-card);
        }

        .sx-b6975228 {
            border: 4px solid var(--gh-success);
            box-shadow: 0 0 0 4px rgba(20, 184, 166, .2);
        }

        .sx-fecd5fdf {
            border: 5px solid var(--gh-card);
            box-shadow: var(--gh-shadow-sm);
        }

        .sx-226f0f59 {
            color: #1877f2;
        }

        .sx-bc9dc2e8 {
            color: #cbd5e1;
            font-size: .7rem;
            margin-top: 2px;
        }

        .sx-b2f1bf96 {
            color: rgba(255, 255, 255, .6);
        }

        .sx-0af32eca {
            color: rgba(255, 255, 255, .7);
        }

        .sx-a3569fb1 {
            color: rgba(255, 255, 255, .75);
        }

        .sx-a4c1be69 {
            cursor: pointer;
            user-select: none;
        }

        .sx-00d0b7dc {
            cursor: text;
            min-height: 24px;
        }

        .sx-4081ab25 {
            display: flex;
            align-items: flex-end;
            gap: .4rem;
            height: 160px;
        }

        .sx-16cc484e {
            display: inline-flex;
        }

        .sx-aea914c2 {
            display: none;
            max-height: 160px;
            overflow: auto;
            font-size: .75rem;
        }

        .sx-bc5d6802 {
            display: none;
            max-height: 240px;
            background: #000;
        }

        .sx-844fb427 {
            display: none;
            opacity: .9;
        }

        .sx-2c845812 {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            z-index: 10;
            max-height: 240px;
            overflow-y: auto;
        }

        .sx-5f20c1e8 {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            z-index: 10;
            max-height: 260px;
            overflow-y: auto;
        }

        .sx-8fda5694 {
            display: none;
            z-index: 20;
            max-height: 200px;
            overflow-y: auto;
            min-width: 240px;
        }

        .sx-1bb41444 {
            display: none;
            z-index: 20;
            min-width: 240px;
            max-height: 280px;
            overflow-y: auto;
        }

        .sx-d26a9463 {
            filter: brightness(1.4) contrast(1.1);
        }

        .sx-a4e50d39 {
            filter: hue-rotate(80deg) saturate(150%);
        }

        .sx-06c1404e {
            filter: sepia(80%);
        }

        .sx-55c7621d {
            flex: 0 0 50px;
            height: 2px;
            background: var(--gh-border);
            margin-top: 20px;
        }

        .sx-88d6bfa5 {
            flex: 0 0 50px;
            height: 2px;
            background: var(--gh-primary);
            margin-top: 20px;
        }

        .sx-db6e44c2 {
            flex: 1;
            height: 45%;
        }

        .sx-5eb097a5 {
            flex: 1;
            height: 55%;
        }

        .sx-8bf49351 {
            flex: 1;
            height: 60%;
        }

        .sx-9951daf1 {
            flex: 1;
            height: 65%;
        }

        .sx-046e1d6e {
            flex: 1;
            height: 70%;
        }

        .sx-a193e6ec {
            flex: 1;
            height: 75%;
        }

        .sx-252c900b {
            flex: 1;
            height: 85%;
        }

        .sx-c9cf1c1a {
            flex: 1;
            height: 90%;
        }

        .sx-6e74602f {
            flex: 1;
            overflow-y: auto;
            max-height: 65vh;
        }

        .sx-640fb1f6 {
            font-size: .75rem;
        }

        .sx-07d861d5 {
            font-size: .75rem;
            max-height: 120px;
            overflow: auto;
        }

        .sx-2e6b7426 {
            font-size: .78rem;
            letter-spacing: .08em;
        }

        .sx-c64ca98f {
            font-size: .78rem;
            text-transform: uppercase;
            letter-spacing: .06em;
            color: var(--gh-success);
        }

        .sx-0de4e77b {
            font-size: .82rem;
        }

        .sx-8b32b0f6 {
            font-size: .85rem;
            padding: .5rem .85rem;
        }

        .sx-f8930d7c {
            font-size: .8rem;
            text-transform: uppercase;
            letter-spacing: .06em;
            color: var(--gh-muted);
        }

        .sx-9e8d8ad2 {
            font-size: 1.1rem;
            opacity: .8;
        }

        .sx-81f1eb39 {
            font-size: 1.5rem;
            color: #fbbf24;
        }

        .sx-a3862bf6 {
            font-size: 1.5rem;
            opacity: .85;
        }

        .sx-fbae1a89 {
            font-size: 1.8rem;
            letter-spacing: .25rem;
            cursor: pointer;
        }

        .sx-342031af {
            font-size: 1.8rem;
            opacity: .95;
        }

        .sx-fd91441e {
            font-size: 1rem;
        }

        .sx-85377011 {
            font-size: 1rem;
            line-height: 1.7;
        }

        .sx-05d077f7 {
            font-size: 1rem;
            opacity: .85;
        }

        .sx-c881c176 {
            font-size: 2.2rem;
            font-weight: 800;
            line-height: 1.1;
            font-family: 'Plus Jakarta Sans';
        }

        .sx-4ef0b9bd {
            font-size: 2.4rem;
        }

        .sx-6f075203 {
            font-size: 2.4rem;
            font-weight: 800;
            line-height: 1.1;
        }

        .sx-3fea4a7a {
            font-size: 2.4rem;
            line-height: 1;
        }

        .sx-e20126d4 {
            font-size: 2.5rem;
            cursor: pointer;
        }

        .sx-77757af2 {
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1.1;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .sx-c50fee8e {
            font-size: 2.5rem;
            margin-left: 4px;
        }

        .sx-4aa0de57 {
            font-size: 2rem;
            color: #fbbf24;
        }

        .sx-9180f393 {
            font-size: 2rem;
            color: var(--gh-primary);
        }

        .sx-9737b7e3 {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .sx-f52084cd {
            font-size: 3.5rem;
            line-height: 1;
        }

        .sx-116171ab {
            font-size: 3rem;
            color: #fff;
        }

        .sx-c16329cb {
            font-size: 3rem;
            color: var(--gh-primary);
        }

        .sx-3c6b844d {
            font-size: 3rem;
            font-weight: 800;
            line-height: 1;
        }

        .sx-da0036f4 {
            font-size: 3rem;
            font-weight: 800;
            line-height: 1;
            font-family: 'Plus Jakarta Sans';
        }

        .sx-b89c10b6 {
            font-size: 3rem;
            font-weight: 800;
            line-height: 1;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .sx-23208a71 {
            font-size: 3rem;
            opacity: .85;
        }

        .sx-0b449daa {
            font-size: 4rem;
            opacity: .3;
        }

        .sx-0eb69605 {
            font-size: 4rem;
            opacity: .75;
        }

        .sx-8d868518 {
            font-size: 4rem;
            opacity: .85;
        }

        .sx-83e4487b {
            font-weight: 700;
        }

        .sx-53ebd905 {
            font-weight: 700;
            color: #fff;
        }

        .sx-e98e59a1 {
            height: 100px;
        }

        .sx-7acd0bba {
            height: 140px;
            background: linear-gradient(135deg, #5b3df0, #8b5cf6, #22d3ee);
            position: relative;
        }

        .sx-949a3873 {
            height: 18px;
        }

        .sx-3b36a7e4 {
            height: 30px;
        }

        .sx-7167f81a {
            height: 36px;
            border-radius: 10px;
            overflow: hidden;
        }

        .sx-665ae22a {
            height: 380px;
            border-radius: 12px;
            background: var(--bs-light-bg-subtle);
        }

        .sx-b1854ddb {
            height: 38px;
            padding-left: 2.4rem;
        }

        .sx-4804843b {
            height: 40px;
            padding-left: 2.4rem;
        }

        .sx-9870dfaa {
            height: 440px;
            border-radius: 12px;
            background: var(--bs-light-bg-subtle);
        }

        .sx-e335b5cb {
            height: 48px;
            padding-left: 2.6rem;
            font-size: 1rem;
        }

        .sx-f1da5eb6 {
            height: 4px;
            background: rgba(255, 255, 255, .18);
        }

        .sx-2eba01f9 {
            height: 4px;
            border-radius: 2px;
            background: #0ea5e9;
            margin-bottom: .65rem;
        }

        .sx-0c92ed4b {
            height: 4px;
            border-radius: 2px;
            background: #14b8a6;
            margin-bottom: .65rem;
        }

        .sx-1ad5089b {
            height: 4px;
            border-radius: 2px;
            background: #5b3df0;
            margin-bottom: .65rem;
        }

        .sx-b9535556 {
            height: 4px;
            border-radius: 2px;
            background: #cbd5e1;
            margin-bottom: .65rem;
        }

        .sx-8828a880 {
            height: 4px;
            border-radius: 2px;
            background: #f59e0b;
            margin-bottom: .65rem;
        }

        .sx-95147e89 {
            height: 500px;
            border-radius: 0 0 14px 14px;
        }

        .sx-31a7aa5a {
            height: 50px;
            padding-left: 2.8rem;
            font-size: 1.05rem;
        }

        .sx-932ae956 {
            height: 60px;
            background: linear-gradient(135deg, #06b6d433, #06b6d411);
            border-radius: 14px 14px 0 0;
            margin: -1.35rem -1.35rem 0;
            position: relative;
        }

        .sx-bc5cd1b5 {
            height: 60px;
            background: linear-gradient(135deg, #0ea5e933, #0ea5e911);
            border-radius: 14px 14px 0 0;
            margin: -1.35rem -1.35rem 0;
            position: relative;
        }

        .sx-f97a8aca {
            height: 60px;
            background: linear-gradient(135deg, #14b8a633, #14b8a611);
            border-radius: 14px 14px 0 0;
            margin: -1.35rem -1.35rem 0;
            position: relative;
        }

        .sx-37f53acf {
            height: 60px;
            background: linear-gradient(135deg, #22d3ee33, #22d3ee11);
            border-radius: 14px 14px 0 0;
            margin: -1.35rem -1.35rem 0;
            position: relative;
        }

        .sx-e4d60f5e {
            height: 60px;
            background: linear-gradient(135deg, #8b5cf633, #8b5cf611);
            border-radius: 14px 14px 0 0;
            margin: -1.35rem -1.35rem 0;
            position: relative;
        }

        .sx-2a558eec {
            height: 60px;
            background: linear-gradient(135deg, #a855f733, #a855f711);
            border-radius: 14px 14px 0 0;
            margin: -1.35rem -1.35rem 0;
            position: relative;
        }

        .sx-7ec630bf {
            height: 60px;
            background: linear-gradient(135deg, #ec489933, #ec489911);
            border-radius: 14px 14px 0 0;
            margin: -1.35rem -1.35rem 0;
            position: relative;
        }

        .sx-dc9a0a50 {
            height: 60px;
            background: linear-gradient(135deg, #f43f5e33, #f43f5e11);
            border-radius: 14px 14px 0 0;
            margin: -1.35rem -1.35rem 0;
            position: relative;
        }

        .sx-798ffc28 {
            height: 60px;
            background: linear-gradient(135deg, #f59e0b33, #f59e0b11);
            border-radius: 14px 14px 0 0;
            margin: -1.35rem -1.35rem 0;
            position: relative;
        }

        .sx-c3bcc354 {
            height: 60px;
            background: linear-gradient(135deg, #fb923c33, #fb923c11);
            border-radius: 14px 14px 0 0;
            margin: -1.35rem -1.35rem 0;
            position: relative;
        }

        .sx-339f805b {
            height: 6px;
        }

        .sx-998af9d7 {
            height: 80px;
        }

        .sx-0502ecdf {
            height: 80px;
            background: linear-gradient(135deg, #5b3df0, #22d3ee);
        }

        .sx-aff919f4 {
            height: 80px;
            margin-top: 1rem;
            position: relative;
        }

        .sx-364b7878 {
            height: 90px;
            width: 100%;
            object-fit: cover;
        }

        .sx-0c8b7b96 {
            left: 50%;
        }

        .sx-55180b4c {
            margin-top: -40px;
            position: relative;
        }

        .sx-7e02b2cf {
            margin-top: -60px;
            position: relative;
        }

        .sx-f2f7be23 {
            max-height: 240px;
            overflow: auto;
        }

        .sx-16418fd1 {
            max-height: 340px;
            overflow-y: auto;
            position: relative;
        }

        .sx-c2920b4e {
            max-height: 400px;
        }

        .sx-5b414081 {
            max-height: 80px;
            overflow-y: auto;
            font-size: .8rem;
        }

        .sx-2adef0bb {
            max-height: 80vh;
        }

        .sx-ff65788c {
            max-width: 100px;
        }

        .sx-bc21563f {
            max-width: 150px;
        }

        .sx-3831ac5f {
            max-width: 200px;
        }

        .sx-284b8423 {
            max-width: 340px;
        }

        .sx-757df271 {
            max-width: 380px;
        }

        .sx-e5bdc370 {
            max-width: 520px;
        }

        .sx-d80f5e63 {
            max-width: 560px;
        }

        .sx-9712494b {
            max-width: 640px;
            position: relative;
        }

        .sx-d031234f {
            max-width: 680px;
        }

        .sx-bb37be3a {
            max-width: 720px;
            margin: 0 auto;
        }

        .sx-c23110ae {
            max-width: 800px;
        }

        .sx-2941d9c0 {
            max-width: 80px;
        }

        .sx-e0c9b27a {
            max-width: 90px;
        }

        .sx-c551887b {
            min-height: 1.2em;
        }

        .sx-2fcf3e1a {
            min-height: 230px;
        }

        .sx-fb1142f9 {
            min-height: 260px;
        }

        .sx-281cc327 {
            min-height: 380px;
            overflow-y: auto;
        }

        .sx-f68866c5 {
            min-height: 380px;
            resize: none;
        }

        .sx-6374b802 {
            min-height: 400px;
            font-size: 1rem;
            line-height: 1.7;
        }

        .sx-921a266c {
            min-height: 410px;
        }

        .sx-b1a63776 {
            min-height: 46px;
        }

        .sx-1328f068 {
            min-height: 60px;
            max-height: 200px;
            overflow-y: auto;
        }

        .sx-0b554244 {
            min-width: 100px;
        }

        .sx-4569e1e3 {
            min-width: 100px;
            background: var(--bs-primary-bg-subtle);
        }

        .sx-6686b386 {
            min-width: 260px;
        }

        .sx-743f1458 {
            min-width: 340px;
        }

        .sx-ba9be340 {
            min-width: 640px;
            padding: 1rem;
        }

        .sx-ec46ce82 {
            min-width: 90px;
        }

        .sx-3c633b8d {
            opacity: .7;
            color: #fff;
        }

        .sx-62f51076 {
            opacity: .8;
        }

        .sx-909eb0f2 {
            opacity: .9;
            position: relative;
        }

        .sx-df74e8d8 {
            overflow-x: auto;
        }

        .sx-439c1d76 {
            overflow: hidden;
            border-radius: 14px;
        }

        .sx-f5a4ed9e {
            overflow: hidden;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .sx-03d05a12 {
            padding: .25rem .55rem;
            font-size: .7rem;
        }

        .sx-e4fad357 {
            position: absolute;
            bottom: -2px;
            right: -2px;
            background: #fbbf24;
            color: #000;
            font-size: .65rem;
            font-weight: 800;
            padding: .15rem .4rem;
            border-radius: 99px;
            border: 2px solid var(--gh-card);
        }

        .sx-ae9f7175 {
            position: absolute;
            bottom: -2px;
            right: -2px;
            background: var(--gh-danger);
            color: #fff;
            font-size: .65rem;
            font-weight: 800;
            min-width: 18px;
            height: 18px;
            border-radius: 50%;
            border: 2px solid var(--gh-card);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sx-8ba8fd03 {
            position: absolute;
            bottom: -2px;
            right: -2px;
            width: 22px;
            height: 22px;
            background: #fbbf24;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #fff;
            color: #000;
            font-size: .6rem;
            font-weight: 800;
        }

        .sx-64cb0a22 {
            position: absolute;
            bottom: -2px;
            right: -2px;
            width: 24px;
            height: 24px;
            background: #fbbf24;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #000;
            font-size: .6rem;
            font-weight: 800;
            border: 2px solid #0f172a;
        }

        .sx-9445e483 {
            position: absolute;
            bottom: -4px;
            right: -4px;
            width: 24px;
            height: 24px;
            background: #9ca3af;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .7rem;
            font-weight: 800;
            border: 2px solid var(--gh-card);
        }

        .sx-12f2d222 {
            position: absolute;
            bottom: -4px;
            right: -4px;
            width: 24px;
            height: 24px;
            background: #d97706;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .7rem;
            font-weight: 800;
            border: 2px solid var(--gh-card);
        }

        .sx-77529120 {
            position: absolute;
            bottom: -4px;
            right: -4px;
            width: 24px;
            height: 24px;
            background: var(--gh-grad-warm);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .7rem;
            font-weight: 800;
            border: 2px solid var(--gh-card);
        }

        .sx-1352ac4d {
            position: absolute;
            bottom: -60px;
            left: -60px;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(34, 211, 238, .15), transparent 70%);
        }

        .sx-8e24eec3 {
            position: absolute;
            bottom: -60px;
            left: -60px;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(91, 61, 240, .15), transparent 70%);
        }

        .sx-667cb1c3 {
            position: absolute;
            bottom: -80px;
            right: -80px;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(34, 211, 238, .18);
        }

        .sx-a3eade86 {
            position: absolute;
            bottom: -90px;
            left: -90px;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(34, 211, 238, .18);
        }

        .sx-cf3f8566 {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(91, 61, 240, .65), rgba(34, 211, 238, .4));
        }

        .sx-7298dbba {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, .35);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sx-ce07c6f7 {
            position: absolute;
            right: -50px;
            bottom: -50px;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, .08);
            border-radius: 50%;
        }

        .sx-91c10dba {
            position: absolute;
            top: -2px;
            right: -2px;
            width: 10px;
            height: 10px;
            background: var(--gh-danger);
            border-radius: 50%;
            border: 2px solid var(--gh-card);
        }

        .sx-785d4196 {
            position: absolute;
            top: -30px;
            right: -30px;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(91, 61, 240, .06), transparent 70%);
        }

        .sx-b79da432 {
            position: absolute;
            top: -40px;
            right: -40px;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(251, 191, 36, .2), transparent 70%);
        }

        .sx-d19ab973 {
            position: absolute;
            top: -4px;
            right: -4px;
            font-size: .6rem;
        }

        .sx-48f77656 {
            position: absolute;
            top: -50px;
            right: -50px;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(251, 191, 36, .2), transparent 70%);
        }

        .sx-ea9f62e3 {
            position: absolute;
            top: -50px;
            right: -50px;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(91, 61, 240, .18), transparent 70%);
        }

        .sx-27c8dc89 {
            position: absolute;
            top: -60px;
            left: -60px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .08);
        }

        .sx-e5df3e53 {
            position: absolute;
            top: -70px;
            right: -70px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .1);
        }

        .sx-76ec86cb {
            position: absolute;
            top: .85rem;
            right: .85rem;
        }

        .sx-b0ebb5df {
            position: absolute;
            top: .85rem;
            right: .85rem;
            z-index: 2;
        }

        .sx-4f8c427b {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #fbbf24, #f97316);
        }

        .sx-9aaa9852 {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #fbbf24, #fff, #fbbf24);
        }

        .sx-9994cbf3 {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 2;
            background: linear-gradient(180deg, rgba(0, 0, 0, .5), transparent);
        }

        .sx-c6e3d0c8 {
            position: absolute;
            top: 18px;
            height: 4px;
            background: var(--bs-primary);
            border-radius: 2px;
            left: 10%;
            right: 30%;
        }

        .sx-1286fe82 {
            position: absolute;
            top: 18px;
            height: 4px;
            background: var(--bs-warning);
            border-radius: 2px;
            left: 20%;
            right: 10%;
        }

        .sx-1546ef56 {
            position: absolute;
            top: 1rem;
            right: 1rem;
            z-index: 2;
        }

        .sx-8802b95a {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 4.5rem;
            color: #fff;
            opacity: .9;
        }

        .sx-ac6fcf5c {
            position: relative;
            height: 120px;
        }

        .sx-13d4b1f7 {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, rgba(91, 61, 240, .05), rgba(34, 211, 238, .06));
        }

        .sx-b2b13a05 {
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .sx-b3875ea3 {
            position: relative;
            padding: 1.75rem 2rem;
        }

        .sx-5ab34d77 {
            position: sticky;
            bottom: -1rem;
            background: var(--gh-card);
            padding: .85rem 0;
            border-top: 1px solid var(--gh-border);
            margin: 1rem -1.35rem -1.35rem;
            padding-left: 1.35rem;
            padding-right: 1.35rem;
        }

        .sx-b09e6da8 {
            position: sticky;
            top: 0;
            z-index: 1;
        }

        .sx-750c6ce8 {
            resize: none;
            overflow: hidden;
        }

        .sx-8b03d498 {
            table-layout: fixed;
            width: 100%;
        }

        .sx-d09fdbdf {
            text-decoration: underline dotted;
            cursor: help;
        }

        .sx-065c2b4c {
            top: -8px;
            right: -4px;
            width: 24px;
            height: 24px;
            padding: 0;
            line-height: 1;
        }

        .sx-ef384102 {
            top: .65rem;
            left: .65rem;
            background: rgba(244, 63, 94, .95);
            color: #fff;
        }

        .sx-79e58058 {
            top: .65rem;
            right: .65rem;
            background: rgba(0, 0, 0, .65);
            color: #fff;
        }

        .sx-734a158d {
            top: 100%;
            display: none;
            z-index: 10;
            max-height: 240px;
            overflow-y: auto;
        }

        .sx-690e92cb {
            top: 1rem;
            right: 1rem;
        }

        .sx-2ca57345 {
            transform: rotate(-4deg);
        }

        .sx-5ea263ca {
            transform: rotate(3deg);
        }

        .sx-f162d097 {
            width: 1%;
        }

        .sx-d659c4cf {
            width: 10%;
            background: var(--gh-grad-warm);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: .78rem;
            font-weight: 700;
        }

        .sx-6fd8c27f {
            width: 100%;
            height: .6rem;
        }

        .sx-fc4f3d10 {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .sx-11f550cc {
            width: 100%;
            height: 180px;
            border-radius: 14px;
        }

        .sx-1cf8e183 {
            width: 100%;
            height: 500px;
            border: 0;
            border-radius: 0 0 14px 14px;
        }

        .sx-3c54d4fa {
            width: 100%;
            height: 90px;
            border-radius: 10px;
        }

        .sx-6910ad66 {
            width: 100px;
            height: .6rem;
            border-radius: 4px;
        }

        .sx-ca328bb9 {
            width: 100px;
            height: 30px;
            border-radius: 8px;
        }

        .sx-b3a9e581 {
            width: 100px;
            height: 32px;
        }

        .sx-7c032f0b {
            width: 12%;
        }

        .sx-6569c716 {
            width: 120px;
            height: .6rem;
            margin: 0;
        }

        .sx-b2df2df5 {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: conic-gradient(var(--gh-primary) 0% 68%, var(--gh-hover) 68% 100%);
            margin: 0 auto;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .sx-2c838514 {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid var(--bs-primary);
        }

        .sx-ac260bb1 {
            width: 120px;
            height: 18px;
            border-radius: 14px;
            background: rgba(91, 61, 240, .18);
        }

        .sx-04605b5b {
            width: 120px;
            height: 36px;
            border-radius: 8px;
        }

        .sx-211889e2 {
            width: 12px;
            height: 12px;
            background: #4338ca;
            border-radius: 2px;
        }

        .sx-c88eba0e {
            width: 12px;
            height: 12px;
            background: var(--gh-primary);
            border-radius: 2px;
        }

        .sx-20c29614 {
            width: 12px;
            height: 12px;
            background: #a5b4fc;
            border-radius: 2px;
        }

        .sx-d030618e {
            width: 12px;
            height: 12px;
            background: #e0e7ff;
            border-radius: 2px;
        }

        .sx-470ead61 {
            width: 130px;
            height: .6rem;
            margin: 0;
        }

        .sx-6bbe8018 {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background: conic-gradient(var(--gh-danger) 0% 18%, var(--gh-hover) 18% 100%);
            margin: 0 auto;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .sx-a67f40ae {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background: conic-gradient(var(--gh-primary) 0% 78%, var(--gh-hover) 78% 100%);
            margin: 0 auto;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .sx-dcc1b2e9 {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background: conic-gradient(var(--gh-success) 0% 92%, var(--gh-hover) 92% 100%);
            margin: 0 auto;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .sx-1a7d1fef {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background: conic-gradient(var(--gh-warning) 0% 42%, var(--gh-hover) 42% 100%);
            margin: 0 auto;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .sx-abb22f49 {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background: var(--gh-card);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .sx-fd24f08b {
            width: 140px;
            height: .6rem;
            margin: 0;
        }

        .sx-dcd2c410 {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: conic-gradient(var(--gh-primary) 0% 68%, var(--gh-hover) 68% 100%);
            margin: 0 auto;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .sx-bb71c13e {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: conic-gradient(var(--gh-primary) 0% 78%, var(--gh-hover) 78% 100%);
            margin: 0 auto;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .sx-6a38f9cc {
            width: 140px;
            height: 1rem;
            border-radius: 6px;
        }

        .sx-df4effc5 {
            width: 140px;
            height: 30px;
            border-radius: 99px;
        }

        .sx-3a4c8495 {
            width: 14px;
            height: 14px;
            background: #5b21b6;
            border-radius: 2px;
        }

        .sx-5db6663b {
            width: 14px;
            height: 14px;
            background: #7c3aed;
            border-radius: 2px;
        }

        .sx-51cb30ea {
            width: 14px;
            height: 14px;
            background: #a78bfa;
            border-radius: 2px;
        }

        .sx-9a5d6f23 {
            width: 14px;
            height: 14px;
            background: #ddd6fe;
            border-radius: 2px;
        }

        .sx-737760ee {
            width: 14px;
            height: 14px;
            border: 2px solid #fff;
        }

        .sx-c393a7fc {
            width: 150px;
            height: 18px;
            border-radius: 14px;
        }

        .sx-be99ae25 {
            width: 16%;
        }

        .sx-b75d3903 {
            width: 160px;
            height: 160px;
        }

        .sx-38e37de4 {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: conic-gradient(var(--gh-primary) 0% 78%, var(--gh-hover) 78% 100%);
            margin: 0 auto;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .sx-f5c56c19 {
            width: 18%;
            background: var(--gh-grad-mint);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: .78rem;
            font-weight: 700;
        }

        .sx-a8cff936 {
            width: 180px;
            height: 18px;
            border-radius: 14px 14px 4px 14px;
            background: rgba(91, 61, 240, .18);
            margin-bottom: .35rem;
        }

        .sx-be72dffd {
            width: 180px;
            height: 32px;
        }

        .sx-d41f8b9d {
            width: 20%;
            height: .6rem;
        }

        .sx-a29b2232 {
            width: 20px;
        }

        .sx-0add6cc8 {
            width: 20px;
            height: 20px;
            background: #5B3DF0;
            border-radius: 4px;
            border: 1px solid var(--bs-border-color);
        }

        .sx-cf2450f1 {
            width: 220px;
            height: 18px;
            border-radius: 14px 14px 14px 4px;
            margin-bottom: .35rem;
        }

        .sx-c36b2672 {
            width: 24%;
        }

        .sx-316b3d0b {
            width: 24%;
            background: var(--gh-grad-cool);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: .78rem;
            font-weight: 700;
        }

        .sx-026cc124 {
            width: 24px;
            height: 24px;
            line-height: 1;
        }

        .sx-28e5a32f {
            width: 24px;
            height: 24px;
            object-fit: cover;
        }

        .sx-061f07a9 {
            width: 250px;
            height: 18px;
            border-radius: 14px 14px 14px 4px;
        }

        .sx-baae3c1d {
            width: 26%;
        }

        .sx-6f687733 {
            width: 27%;
        }

        .sx-6070c201 {
            width: 28%;
        }

        .sx-cbb6cf41 {
            width: 30%;
            height: .6rem;
        }

        .sx-342efe44 {
            width: 30px;
        }

        .sx-f451bb36 {
            width: 32%;
        }

        .sx-ea3c4956 {
            width: 32px;
            height: 24px;
            font-size: .9rem;
            line-height: 1;
        }

        .sx-8c59c7d4 {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #0f172a, #475569);
            border: 0;
        }

        .sx-ee79d304 {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #22c55e, #14b8a6);
            border: 0;
        }

        .sx-afe726fa {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #5b3df0, #22d3ee);
            border: 0;
        }

        .sx-ab3a14e6 {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #ec4899, #8b5cf6);
            border: 0;
        }

        .sx-da44e7b4 {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #f59e0b, #f43f5e);
            border: 0;
        }

        .sx-5244eab7 {
            width: 32px;
            height: 32px;
            object-fit: cover;
        }

        .sx-5f8af3ed {
            width: 34%;
        }

        .sx-ae1c2125 {
            width: 35%;
            height: .6rem;
        }

        .sx-ff33fafb {
            width: 36.5%;
        }

        .sx-dcc5c7a6 {
            width: 36px;
            height: 36px;
            background: #14b8a6;
            border: 0;
        }

        .sx-5d71ab50 {
            width: 36px;
            height: 36px;
            background: #22c55e;
            border: 0;
        }

        .sx-cd49fa7c {
            width: 36px;
            height: 36px;
            background: #22d3ee;
            border: 0;
        }

        .sx-b4cd045c {
            width: 36px;
            height: 36px;
            background: #5b3df0;
            border: 0;
        }

        .sx-ef195fae {
            width: 36px;
            height: 36px;
            background: #8b5cf6;
            border: 0;
        }

        .sx-ca98d4e4 {
            width: 36px;
            height: 36px;
            background: #ec4899;
            border: 0;
        }

        .sx-12ad0e51 {
            width: 36px;
            height: 36px;
            background: #f43f5e;
            border: 0;
        }

        .sx-a5875be3 {
            width: 36px;
            height: 36px;
            background: #f59e0b;
            border: 0;
        }

        .sx-17167377 {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: var(--gh-grad-amber);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
        }

        .sx-0ffe6ad4 {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: var(--gh-grad-cool);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
        }

        .sx-cf4fc3e6 {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: var(--gh-grad-mint);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
        }

        .sx-97851f04 {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: var(--gh-grad-primary);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
        }

        .sx-ed8671b6 {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: var(--gh-grad-warm);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
        }

        .sx-b8695696 {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #0ea5e9;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sx-0504d7ab {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #14b8a6;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sx-a35588b4 {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #5b3df0;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sx-97555786 {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #f7931a;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sx-0fa57a96 {
            width: 36px;
            height: 36px;
            font-size: 1rem;
        }

        .sx-fd8d1eb9 {
            width: 36px;
            text-align: center;
            background: var(--bs-light);
        }

        .sx-342b3712 {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: linear-gradient(135deg, #14b8a6, #22d3ee);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 800;
            font-size: .75rem;
        }

        .sx-f7c31029 {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: linear-gradient(135deg, #1976d2, #42a5f5);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 800;
            font-size: .75rem;
        }

        .sx-13e4ebf3 {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            background: rgba(14, 165, 233, .12);
            color: var(--gh-info);
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .sx-f4ffca92 {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            background: #e6f1e5;
            color: var(--gh-primary);
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .sx-059da94a {
            width: 4%;
        }

        .sx-71ac3c1f {
            width: 40%;
            height: .7rem;
        }

        .sx-daa9f782 {
            width: 40%;
            height: .85rem;
        }

        .sx-2f82134d {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            border: 2px solid var(--gh-border);
            color: var(--gh-muted);
        }

        .sx-26ea25b2 {
            width: 40px;
            text-align: right;
        }

        .sx-9df0727a {
            width: 420px;
        }

        .sx-97b5b0bf {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: linear-gradient(135deg, #14b8a6, #22d3ee);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 800;
            font-size: .8rem;
        }

        .sx-29ea7592 {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: linear-gradient(135deg, #1976d2, #42a5f5);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 800;
            font-size: .8rem;
        }

        .sx-826f30be {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: linear-gradient(135deg, #f97316, #fbbf24);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 800;
            font-size: .8rem;
        }

        .sx-41dd0882 {
            width: 44%;
        }

        .sx-bc9fe67d {
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            background: var(--gh-grad-primary);
            color: #fff;
        }

        .sx-bc4e4fb4 {
            width: 46px;
            height: 46px;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .sx-7f422400 {
            width: 48%;
        }

        .sx-af8e6116 {
            width: 48%;
            background: var(--gh-grad-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: .78rem;
            font-weight: 700;
        }

        .sx-beb95f6a {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #000000;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sx-2cbfa3e2 {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #0052cc;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sx-d3c09d1c {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #0f9d58;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sx-e16ae980 {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #181717;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sx-6bcbab42 {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #4a154b;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sx-31a774c2 {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #5e6ad2;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sx-7a446d48 {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #635bff;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sx-fed3c7ca {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #a259ff;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sx-2bb248f7 {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #ff4f00;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sx-6eb02a2b {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            flex-shrink: 0;
            background: rgba(244, 63, 94, .12);
            color: var(--gh-danger);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }

        .sx-0aad7a66 {
            width: 5%;
        }

        .sx-cf8c9649 {
            width: 50%;
            height: .55rem;
            border-radius: 4px;
        }

        .sx-50afc565 {
            width: 50px;
            height: .6rem;
            margin: 0;
        }

        .sx-68c4f6d8 {
            width: 52px;
            height: 52px;
        }

        .sx-8f0c90ee {
            width: 55%;
            height: .55rem;
        }

        .sx-5ec75fef {
            width: 55%;
            height: .6rem;
        }

        .sx-8f7f6c86 {
            width: 56%;
        }

        .sx-7779967f {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            background: rgba(251, 191, 36, .15);
            color: #fbbf24;
            border: 1px solid rgba(251, 191, 36, .3);
        }

        .sx-3f4bcd8d {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            background: rgba(255, 255, 255, .18);
            color: #fbbf24;
        }

        .sx-4034e875 {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            background: var(--gh-grad-primary);
            color: #fff;
            box-shadow: 0 10px 24px rgba(91, 61, 240, .35);
        }

        .sx-49963499 {
            width: 60px;
            height: .55rem;
            border-radius: 4px;
        }

        .sx-1c33d2d1 {
            width: 60px;
            height: .6rem;
            margin: 0;
        }

        .sx-00e79a12 {
            width: 62%;
        }

        .sx-bd8f3d6d {
            width: 64px;
            height: 64px;
            background: #fff;
            box-shadow: 0 8px 20px rgba(91, 61, 240, .3);
        }

        .sx-87dd21d4 {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, #22c55e, #14b8a6);
            box-shadow: 0 6px 16px rgba(20, 184, 166, .4);
        }

        .sx-59e47bd0 {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, #5b3df0, #22d3ee);
        }

        .sx-27cfd914 {
            width: 64px;
            height: 64px;
            background: #e6f1e5;
            border: 2px dashed #5b3df0;
        }

        .sx-0d69fd11 {
            width: 64px;
            height: 64px;
            border-radius: 14px;
        }

        .sx-e4734844 {
            width: 64px;
            height: 64px;
            border-radius: 18px;
            background: rgba(251, 191, 36, .12);
            border: 1px solid rgba(251, 191, 36, .3);
            position: relative;
        }

        .sx-b9307cbb {
            width: 64px;
            height: 64px;
            border-radius: 18px;
            background: rgba(91, 61, 240, .08);
            position: relative;
        }

        .sx-c0bc45ea {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: conic-gradient(#f59e0b 0% 35%, var(--gh-hover) 35% 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sx-aae1e73b {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: conic-gradient(#f59e0b 0% 35%, var(--gh-hover) 35% 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sx-5d083264 {
            width: 64px;
            height: 64px;
            font-size: 2rem;
        }

        .sx-0c1d3864 {
            width: 65%;
        }

        .sx-ed8a0861 {
            width: 65%;
            height: .6rem;
        }

        .sx-0b823724 {
            width: 65px;
            height: .6rem;
            margin: 0;
        }

        .sx-b274ba78 {
            width: 66%;
        }

        .sx-dcc94a3b {
            width: 69%;
        }

        .sx-5d372b7a {
            width: 7%;
        }

        .sx-337dc0f8 {
            width: 70%;
        }

        .sx-9a26e2f6 {
            width: 70px;
            height: .6rem;
            margin: 0;
        }

        .sx-93e37d42 {
            width: 72%;
        }

        .sx-71ca5a46 {
            width: 72px;
            height: 72px;
        }

        .sx-46438eb3 {
            width: 72px;
            height: 72px;
            border-radius: 20px;
            background: rgba(255, 255, 255, .18);
            position: relative;
            box-shadow: 0 12px 28px rgba(0, 0, 0, .15);
        }

        .sx-7e23cbd2 {
            width: 73%;
        }

        .sx-a37a7279 {
            width: 75px;
            height: .6rem;
            margin: 0;
        }

        .sx-ad669e1e {
            width: 80%;
        }

        .sx-ad4b41f2 {
            width: 80px;
            height: .6rem;
            margin: 0;
        }

        .sx-7e9ec261 {
            width: 80px;
            height: 30px;
        }

        .sx-127d763d {
            width: 80px;
            height: 64px;
            border-radius: 12px;
            background: #5b3df0;
            box-shadow: 0 6px 16px rgba(0, 0, 0, .1);
        }

        .sx-ff1e5b08 {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, .95);
            color: #000;
            border-radius: 50%;
            box-shadow: 0 12px 32px rgba(0, 0, 0, .4);
        }

        .sx-f581addf {
            width: 80px;
            height: 80px;
            border-radius: 14px;
            object-fit: cover;
        }

        .sx-09dbd276 {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            background: rgba(255, 255, 255, .18);
            box-shadow: 0 12px 28px rgba(0, 0, 0, .2);
        }

        .sx-85886783 {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: var(--gh-grad-mint);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 12px 32px rgba(20, 184, 166, .4);
            animation: badgePulse 1.5s ease-in-out infinite;
        }

        .sx-5df0d80d {
            width: 83%;
        }

        .sx-a0dccf86 {
            width: 85%;
        }

        .sx-493883c8 {
            width: 87%;
        }

        .sx-5c2630cc {
            width: 88%;
            height: .6rem;
        }

        .sx-170a0aca {
            width: 88px;
            height: 88px;
            font-size: 2.5rem;
        }

        .sx-92baf31e {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #22d3ee;
            display: inline-block;
        }

        .sx-a20531d7 {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--gh-primary);
            display: inline-block;
        }

        .sx-057353ea {
            width: 90%;
        }

        .sx-c8bfe477 {
            width: 90%;
            height: 1.5rem;
            border-radius: 6px;
        }

        .sx-be5041d7 {
            width: 90px;
            height: .6rem;
            margin: 0;
        }

        .sx-8255f4fb {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: var(--gh-card);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .sx-9b197579 {
            width: 94%;
        }

        .sx-90cf8f2a {
            width: 95%;
        }

        .sx-c05a0600 {
            z-index: 10;
            max-width: 240px;
        }

        /* AUTO-EXTRACTED BACKGROUND-IMAGE STYLES */

        .sx-bg-5a08ede0 {
            background: url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?w=1200&amp;h=675&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sx-bg-77f5cca7 {
            height: 100%;
            background: url('https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=300&amp;h=300&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            border-radius: 14px 0 0 14px;
            min-height: 170px;
        }

        .sx-bg-5c0ce6eb {
            height: 100%;
            background: url('https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=300&amp;h=300&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            border-radius: 14px 0 0 14px;
            min-height: 170px;
        }

        .sx-bg-33460a59 {
            height: 120px;
            background: url('https://images.unsplash.com/photo-1426604966848-d7adac402bff?w=600&amp;h=240&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            border-radius: 14px 14px 0 0;
        }

        .sx-bg-5d63f505 {
            height: 120px;
            background: url('https://images.unsplash.com/photo-1432405972618-c60b0225b8f9?w=600&amp;h=240&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            border-radius: 14px 14px 0 0;
        }

        .sx-bg-106726cf {
            height: 120px;
            background: url('https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=600&amp;h=240&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            border-radius: 14px 14px 0 0;
        }

        .sx-bg-b3ccf55f {
            height: 120px;
            background: url('https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?w=600&amp;h=240&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            border-radius: 14px 14px 0 0;
        }

        .sx-bg-64644a52 {
            height: 120px;
            background: url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?w=600&amp;h=240&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            border-radius: 14px 14px 0 0;
        }

        .sx-bg-bfd42556 {
            height: 120px;
            background: url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600&amp;h=240&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            border-radius: 14px 14px 0 0;
        }

        .sx-bg-e9829e89 {
            height: 140px;
            border-radius: 14px;
            background: url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?w=600&amp;h=300&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            position: relative;
            margin-bottom: 1rem;
        }

        .sx-bg-3b4b620f {
            height: 180px;
            background: url('https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=400&amp;h=360&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            position: relative;
        }

        .sx-bg-32ea853e {
            height: 180px;
            background: url('https://images.unsplash.com/photo-1502920917128-1aa500764cbd?w=400&amp;h=360&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            position: relative;
        }

        .sx-bg-2a9583aa {
            height: 180px;
            background: url('https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400&amp;h=360&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            position: relative;
        }

        .sx-bg-d4831d6e {
            height: 180px;
            background: url('https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=400&amp;h=360&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            position: relative;
        }

        .sx-bg-2b609b5a {
            height: 220px;
            background: url('https://images.unsplash.com/photo-1419242902214-272b3f66ee7a?w=600&amp;h=440&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            position: relative;
        }

        .sx-bg-bc7e92c4 {
            height: 220px;
            background: url('https://images.unsplash.com/photo-1426604966848-d7adac402bff?w=600&amp;h=440&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            position: relative;
        }

        .sx-bg-d4fa60ed {
            height: 220px;
            background: url('https://images.unsplash.com/photo-1432405972618-c60b0225b8f9?w=600&amp;h=440&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            position: relative;
        }

        .sx-bg-a02bc7b5 {
            height: 220px;
            background: url('https://images.unsplash.com/photo-1465146344425-f00d5f5c8f07?w=600&amp;h=440&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            position: relative;
        }

        .sx-bg-c494663f {
            height: 220px;
            background: url('https://images.unsplash.com/photo-1467810563316-b5476525c0f9?w=600&amp;h=440&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            position: relative;
        }

        .sx-bg-67a794d6 {
            height: 220px;
            background: url('https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=600&amp;h=440&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            position: relative;
        }

        .sx-bg-3680f55b {
            height: 220px;
            background: url('https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?w=600&amp;h=440&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            position: relative;
        }

        .sx-bg-a6d630c1 {
            height: 220px;
            background: url('https://images.unsplash.com/photo-1470770841072-f978cf4d019e?w=600&amp;h=440&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            position: relative;
        }

        .sx-bg-4085eefa {
            height: 220px;
            background: url('https://images.unsplash.com/photo-1493612276216-ee3925520721?w=600&amp;h=440&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            position: relative;
        }

        .sx-bg-06b69175 {
            height: 220px;
            background: url('https://images.unsplash.com/photo-1497436072909-60f360e1d4b1?w=600&amp;h=440&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            position: relative;
        }

        .sx-bg-f3fe7d9a {
            height: 220px;
            background: url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?w=600&amp;h=440&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            position: relative;
        }

        .sx-bg-89967cd6 {
            height: 220px;
            background: url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600&amp;h=440&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            position: relative;
        }

        .sx-bg-2999e987 {
            height: 220px;
            background: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=600&amp;h=440&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            position: relative;
        }

        .sx-bg-8782e6e4 {
            height: 220px;
            background: url('https://images.unsplash.com/photo-1518495973542-4542c06a5843?w=600&amp;h=440&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            position: relative;
        }

        .sx-bg-e939af8b {
            height: 220px;
            background: url('https://images.unsplash.com/photo-1518791841217-8f162f1e1131?w=600&amp;h=440&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            position: relative;
        }

        .sx-bg-24b9c1e3 {
            height: 220px;
            background: url('https://images.unsplash.com/photo-1518837695005-2083093ee35b?w=1600&amp;h=500&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            position: relative;
        }

        .sx-bg-dbef7d1c {
            height: 220px;
            background: url('https://images.unsplash.com/photo-1518837695005-2083093ee35b?w=600&amp;h=440&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            position: relative;
        }

        .sx-bg-792cd402 {
            height: 420px;
            background: url('https://images.unsplash.com/photo-1426604966848-d7adac402bff?w=1600&amp;h=600&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            position: relative;
        }

        .sx-bg-c3d47d67 {
            height: 420px;
            background: url('https://images.unsplash.com/photo-1493612276216-ee3925520721?w=1600&amp;h=600&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            position: relative;
        }

        .sx-bg-e96ed7b2 {
            height: 420px;
            background: url('https://images.unsplash.com/photo-1518791841217-8f162f1e1131?w=1600&amp;h=600&amp;fit=crop&amp;auto=format&amp;q=80') center/cover no-repeat;
            position: relative;
        }

        /* ==========================================================================
   COMPREHENSIVE RTL SUPPORT
   Applies when html[dir="rtl"] is set by the customizer.
   Works in tandem with bootstrap.rtl.min.css (swapped in by app.js).
   ========================================================================== */

        /* ---- Customizer label active state (LTR/RTL/mode chooser fix) ---- */
        .cz-layout-opt:has(input[type="radio"]:checked) {
            border-color: var(--gh-primary);
            background: rgba(91, 61, 240, .06);
            color: var(--gh-primary);
        }

        .cz-layout-opt input[type="radio"] {
            display: none;
        }

        .cz-swatch.active {
            box-shadow: 0 0 0 3px var(--gh-card), 0 0 0 5px var(--gh-primary);
            transform: scale(1.1);
        }

        /* ============================================================
   RTL: Layout shell (sidebar, topbar, content)
   ============================================================ */
        /* Topbar padding adjusted later only for vertical/mini/boxed where brandzone is hidden */
        [dir="rtl"] .sidebar {
            left: auto;
            right: 0;
            transform: translateX(0);
            border-right: 0;
            border-left: 1px solid var(--gh-border);
        }

        [dir="rtl"] .content {
            margin-left: 0;
            margin-right: var(--gh-sidebar-w);
        }

        [dir="rtl"] body.sidebar-mini .content {
            margin-right: var(--gh-sidebar-w-mini);
            margin-left: 0;
        }

        [dir="rtl"] body.layout-horizontal .content,
        [dir="rtl"] body.layout-horizontal main.page {
            margin-right: 0;
        }

        [dir="rtl"] body.layout-boxed .topbar {
            left: auto;
            right: calc(50vw - 740px);
        }

        [dir="rtl"] body.layout-boxed .sidebar {
            left: auto;
            right: calc(50vw - 740px);
        }

        @media (max-width: 991.98px) {
            [dir="rtl"] .sidebar {
                transform: translateX(100%);
            }

            [dir="rtl"] body.sidebar-open .sidebar {
                transform: translateX(0);
            }
        }

        /* ============================================================
   RTL: Sidebar menu
   ============================================================ */
        [dir="rtl"] .menu>li>a {
            padding-right: 1rem;
            padding-left: 1rem;
        }

        [dir="rtl"] .menu>li>a>i:first-child {
            margin-right: 0;
            margin-left: .8rem;
        }

        /* Mini sidebar in RTL: center icons, kill icon margins, kill paddings */
        [dir="rtl"] body.sidebar-mini .menu>li>a {
            padding-left: 0;
            padding-right: 0;
            justify-content: center;
        }

        [dir="rtl"] body.sidebar-mini .menu>li>a>i:first-child {
            margin-left: 0;
            margin-right: 0;
        }

        [dir="rtl"] .menu .menu-arrow {
            margin-left: 0;
            margin-right: auto;
            transform: rotate(180deg);
        }

        [dir="rtl"] .menu>li.open>a .menu-arrow {
            transform: rotate(90deg);
        }

        [dir="rtl"] .menu .menu-badge {
            margin-left: 0;
            margin-right: auto;
        }

        [dir="rtl"] .menu>li.active>a::after {
            right: auto;
            left: -.75rem;
            border-radius: 0 5px 5px 0;
        }

        [dir="rtl"] .submenu a {
            padding-right: 3rem;
            padding-left: .85rem;
            text-align: right;
        }

        [dir="rtl"] .submenu a::before {
            left: auto;
            right: 2.05rem;
        }

        [dir="rtl"] .menu-caption {
            padding-right: 1rem;
            padding-left: .5rem;
        }

        [dir="rtl"] .sidebar-promo {
            text-align: right;
        }

        /* Mini sidebar flyout positioning in RTL is handled by app.js (uses right offset) */

        /* ============================================================
   RTL: Topbar
   ============================================================ */
        [dir="rtl"] .topbar-search {
            margin-right: 0;
            margin-left: auto;
        }

        [dir="rtl"] .topbar-search>i {
            left: auto;
            right: 1rem;
        }

        [dir="rtl"] .topbar-search input {
            padding: 0 2.6rem 0 1rem;
        }

        [dir="rtl"] .topbar-search kbd {
            right: auto;
            left: .75rem;
        }

        /* Do NOT force flex-direction in RTL — natural RTL flow already reverses children */

        /* RTL vertical/mini/boxed: hide topbar brandzone (sidebar's own brand is shown) */
        /* Reserve right space equal to sidebar width so topbar-inner doesn't go under the sidebar */
        [dir="rtl"] body:not(.layout-horizontal) .topbar-brandzone {
            display: none;
        }

        [dir="rtl"] body:not(.layout-horizontal) .topbar {
            padding-right: var(--gh-sidebar-w);
        }

        [dir="rtl"] body.sidebar-mini .topbar {
            padding-right: var(--gh-sidebar-w-mini);
        }

        [dir="rtl"] body.layout-boxed .topbar {
            padding-right: var(--gh-sidebar-w);
        }

        [dir="rtl"] body:not(.layout-horizontal) .topbar-inner {
            padding-right: 0;
            padding-left: 1.5rem;
        }

        [dir="rtl"] .badge-num {
            left: auto;
            right: auto;
            transform: translate(-30%, -30%);
        }

        [dir="rtl"] .badge-dot {
            left: auto;
            right: 8px;
        }

        [dir="rtl"] .user-menu-btn {
            padding: 5px 5px 5px 10px;
        }

        [dir="rtl"] .user-menu-btn .user-info {
            text-align: right;
        }

        [dir="rtl"] .user-info strong,
        [dir="rtl"] .user-info small {
            text-align: right;
        }

        /* ============================================================
   RTL: Dropdowns / notifications / messages
   ============================================================ */
        /* bootstrap.rtl.min.css handles dropdown-menu-end positioning natively */
        [dir="rtl"] .dropdown-menu {
            text-align: right;
        }

        /* Do NOT row-reverse — dir="rtl" already flips flex children naturally */
        [dir="rtl"] .notif-item .notif-meta {
            text-align: right;
        }

        [dir="rtl"] .apps-grid a {
            text-align: center;
        }

        [dir="rtl"] .dropdown-item i.me-2 {
            margin-right: 0 !important;
            margin-left: .5rem !important;
        }

        /* Horizontal nav dropdowns */
        /* RTL horizontal nav: keep all items on one line WITHOUT clipping dropdowns
   - flex-wrap: nowrap forces one row
   - overflow stays visible so dropdowns aren't clipped
   - regular dropdowns anchor to their .h-nav-dd (position:relative)
   - mega-menu keeps Bootstrap's .position-static so it spans the full nav */
        [dir="rtl"] .h-nav {
            flex-wrap: nowrap;
            overflow: visible;
            gap: .1rem;
        }

        [dir="rtl"] .h-nav-item {
            padding: .55rem .7rem;
            flex-shrink: 0;
            white-space: nowrap;
        }

        [dir="rtl"] .h-nav-dd:not(.position-static) {
            flex-shrink: 0;
            position: relative;
        }

        [dir="rtl"] .h-nav-dd:not(.position-static)>.dropdown-menu {
            text-align: right;
            left: auto !important;
            right: 0 !important;
        }

        [dir="rtl"] .h-nav-mega {
            text-align: right;
        }

        [dir="rtl"] .h-nav-mega .mega-col {
            text-align: right;
        }

        /* If items don't fit on very narrow viewports, allow horizontal page scroll instead of dropdown clipping */
        [dir="rtl"] body.layout-horizontal {
            overflow-x: auto;
        }

        /* Bootstrap helper flips are handled by bootstrap.rtl.min.css — no override needed */

        /* ============================================================
   RTL: Cards / lists / tables
   ============================================================ */
        [dir="rtl"] .card-header,
        [dir="rtl"] .card-body,
        [dir="rtl"] .card-footer {
            text-align: right;
        }

        [dir="rtl"] .list-group-item {
            text-align: right;
        }

        [dir="rtl"] table {
            text-align: right;
        }

        [dir="rtl"] table thead th {
            text-align: right;
        }

        [dir="rtl"] table .text-end {
            text-align: left !important;
        }

        [dir="rtl"] table .text-start {
            text-align: right !important;
        }

        /* ============================================================
   RTL: Form components
   ============================================================ */
        [dir="rtl"] .form-check {
            padding-left: 0;
            padding-right: 1.5em;
        }

        [dir="rtl"] .form-check .form-check-input {
            margin-left: 0;
            margin-right: -1.5em;
            float: right;
        }

        [dir="rtl"] .form-switch {
            padding-left: 0;
            padding-right: 2.5em;
        }

        [dir="rtl"] .form-switch .form-check-input {
            margin-left: 0;
            margin-right: -2.5em;
        }

        [dir="rtl"] .input-group> :not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.invalid-tooltip) {
            margin-left: 0;
            margin-right: -1px;
        }

        [dir="rtl"] .input-group>.form-control:not(:last-child),
        [dir="rtl"] .input-group>.form-select:not(:last-child) {
            border-top-right-radius: .375rem;
            border-bottom-right-radius: .375rem;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        [dir="rtl"] .input-group>.form-control:not(:first-child),
        [dir="rtl"] .input-group>.form-select:not(:first-child) {
            border-top-left-radius: .375rem;
            border-bottom-left-radius: .375rem;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        [dir="rtl"] .input-group>.input-group-text:first-child {
            border-radius: 0 .375rem .375rem 0;
        }

        [dir="rtl"] .input-group>.input-group-text:last-child {
            border-radius: .375rem 0 0 .375rem;
        }

        /* ============================================================
   RTL: Misc components (breadcrumb / pagination / progress / close)
   ============================================================ */
        [dir="rtl"] .breadcrumb {
            padding-right: 0;
        }

        [dir="rtl"] .breadcrumb-item+.breadcrumb-item {
            padding-left: 0;
            padding-right: .5rem;
        }

        [dir="rtl"] .breadcrumb-item+.breadcrumb-item::before {
            padding-right: 0;
            padding-left: .5rem;
            float: right;
            content: "/";
        }

        [dir="rtl"] .pagination {
            padding-right: 0;
        }

        [dir="rtl"] .page-item:first-child .page-link {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            border-top-right-radius: .375rem;
            border-bottom-right-radius: .375rem;
        }

        [dir="rtl"] .page-item:last-child .page-link {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            border-top-left-radius: .375rem;
            border-bottom-left-radius: .375rem;
        }

        [dir="rtl"] .page-link i.mdi-chevron-left,
        [dir="rtl"] .page-link i.mdi-chevron-right {
            transform: scaleX(-1);
        }

        [dir="rtl"] .btn-close {
            margin: 0 auto 0 0;
        }

        [dir="rtl"] .modal-header .btn-close {
            margin: -.5rem auto -.5rem -.5rem;
        }

        [dir="rtl"] .progress {
            direction: ltr;
        }

        [dir="rtl"] .alert-dismissible {
            padding-right: 1rem;
            padding-left: 3rem;
        }

        [dir="rtl"] .alert-dismissible .btn-close {
            right: auto;
            left: 0;
        }

        /* ============================================================
   RTL: Icons (only flip directional icons, not all)
   ============================================================ */
        [dir="rtl"] .mdi-chevron-left:not(.no-flip)::before {
            content: "\F0142";
        }

        /* chevron-right glyph */
        [dir="rtl"] .mdi-chevron-right:not(.no-flip)::before {
            content: "\F0141";
        }

        /* chevron-left glyph */
        [dir="rtl"] .mdi-arrow-left:not(.no-flip)::before {
            content: "\F0054";
        }

        [dir="rtl"] .mdi-arrow-right:not(.no-flip)::before {
            content: "\F0055";
        }

        [dir="rtl"] .mdi-arrow-right-thin:not(.no-flip)::before {
            content: "\F19B6";
        }

        [dir="rtl"] .mdi-arrow-left-thin:not(.no-flip)::before {
            content: "\F19B4";
        }

        /* ============================================================
   RTL: App-specific extracted utility classes
   ============================================================ */
        [dir="rtl"] .gh-overlay-tr {
            right: auto;
            left: .65rem;
        }

        [dir="rtl"] .gh-overlay-tl {
            left: auto;
            right: .65rem;
        }

        [dir="rtl"] .gh-overlay-bl {
            left: .65rem;
            right: .65rem;
        }

        [dir="rtl"] .gh-avatar-status-corner {
            right: auto;
            left: 6px;
        }

        [dir="rtl"] .gh-pos-tr-1 {
            right: auto;
            left: 1rem;
        }

        [dir="rtl"] .gh-blob-tl-180 {
            left: auto;
            right: -60px;
        }

        [dir="rtl"] .gh-blob-tr-180 {
            right: auto;
            left: -50px;
        }

        [dir="rtl"] .gh-blob-br-200 {
            right: auto;
            left: -80px;
        }

        [dir="rtl"] .gh-blob-tr-140 {
            right: auto;
            left: -40px;
        }

        /* Customizer offcanvas in RTL: bootstrap.rtl handles position flip; we just adjust border */
        [dir="rtl"] .offcanvas-end {
            border-left: 0;
            border-right: 1px solid var(--gh-border);
        }

        /* ============================================================
   RTL: Email / Chat / Kanban / Calendar app layouts
   ============================================================ */
        [dir="rtl"] .mail-sidebar {
            border-right: 0;
            border-left: 1px solid var(--gh-border);
        }

        [dir="rtl"] .mail-list {
            border-right: 0;
            border-left: 1px solid var(--gh-border);
        }

        [dir="rtl"] .chat-sidebar {
            border-right: 0;
            border-left: 1px solid var(--gh-border);
        }

        [dir="rtl"] .chat-bubble.me {
            margin-left: 0;
            margin-right: auto;
            border-radius: 14px 14px 0 14px;
        }

        [dir="rtl"] .chat-bubble.them {
            margin-right: 0;
            margin-left: auto;
            border-radius: 14px 14px 14px 0;
        }

        /* ============================================================
   RTL: Kbd / search input keyboard shortcut hint position
   ============================================================ */
        [dir="rtl"] kbd {
            direction: ltr;
            display: inline-block;
        }

        .required-star {
            color: #ef1e1e;
        }






        /* date picker  */

        :root {
            --brand-grad: linear-gradient(135deg, #013477 0%, #0a5fb0 100%);
            --brand-deep: #013477;
            --brand-mid: #0a5fb0;
            --accent: #f5a524;
            --ink: #0e1b2c;
            --muted: #7d8aa0;
            --line: #dfe4ec;
            --surface: #ffffff;
            --bg: #eef1f6;
        }


        /* =====================================
       FORM
    ===================================== */



        /* =====================================
       DATE PICKER
    ===================================== */

        .date-picker {
            position: relative;
        }

        .date-input {
            /* width: 100%;
        height: 48px;
        padding: 0 46px 0 16px;
        border: 1.5px solid var(--line);
        border-radius: 10px;
        background: var(--surface);
        color: var(--ink);
        font-size: 15px;
        font-weight: 500;
        outline: none;
        transition: 0.2s ease;
        box-shadow: 0 1px 2px rgba(1,52,119,0.04); */
        }

        /* .date-input:hover { border-color: #b7c3d6; } */

        .date-input:focus {
            /* border-color: var(--brand-mid);
        box-shadow: 0 0 0 4px rgba(10,95,176,0.14); */
        }

        /* .date-input::placeholder { color: #a7b1c2; } */

        .calendar-icon {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            background: var(--gh-grad-primary);
            cursor: pointer;
            user-select: none;
            transition: 0.2s ease;
        }

        .calendar-icon:hover {
            filter: brightness(1.08);
        }

        /* =====================================
       CALENDAR DROPDOWN
    ===================================== */

        .calendar-dropdown {
            display: none;
            position: absolute;
            top: calc(100% + 5px);
            left: 0;
            width: 300px;
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: 10px;
            box-shadow: 0 20px 45px rgba(1, 52, 119, 0.18);
            overflow: hidden;
            z-index: 1000;
            outline: 5px solid #e5eaf1;
        }

        .date-picker.right-0 .calendar-dropdown {
            right: 0;
            left: unset;
        }

        .calendar-dropdown.show {
            display: block;
        }

        /* =====================================
       CALENDAR HEADER (gradient band)
    ===================================== */

        .calendar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 5px;
            background: var(--gh-grad-primary);
        }

        .month-year-wrapper {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* =====================================
       CUSTOM SELECT
    ===================================== */

        .custom-select {
            position: relative;
        }

        .month-input,
        .year-input {
            height: 25px;
            padding: 0 26px 0 10px;
            border: 1px solid rgba(255, 255, 255, 0.35);
            border-radius: 7px;
            background: rgba(255, 255, 255, 0.14);
            color: #fff;
            outline: none;
            font-size: 12px;
            font-weight: 700;
            transition: 0.2s ease;
        }

        .month-input::placeholder,
        .year-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .month-input {
            width: 112px;
        }

        .year-input {
            width: 70px;
        }

        .month-input:focus,
        .year-input:focus {
            border-color: #fff;
            background: rgba(255, 255, 255, 0.22);
        }

        .select-arrow {
            position: absolute;
            right: 9px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 8px;
            color: rgba(255, 255, 255, 0.85);
            pointer-events: none;
        }

        /* =====================================
       MONTH / YEAR OPTIONS DROPDOWN
    ===================================== */

        .options-dropdown {
            display: none;
            position: absolute;
            top: calc(100% + 6px);
            left: 0;
            width: 100%;
            max-height: 180px;
            overflow-y: auto;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 8px;
            box-shadow: 0 10px 24px rgba(1, 52, 119, 0.2);
            z-index: 2000;
        }

        .options-dropdown.show {
            display: block;
        }

        .option {
            padding: 8px 12px;
            font-size: 13px;
            color: var(--ink);
            cursor: pointer;
            transition: 0.15s ease;
        }

        .option:hover {
            background: #eef3fb;
        }

        .option.active {
            background: var(--gh-grad-primary);
            color: #fff;
            font-weight: 600;
        }

        /* =====================================
       PREVIOUS / NEXT BUTTON
    ===================================== */

        .navigation {
            display: flex;
            gap: 6px;
        }

        .nav-btn {
            width: 30px;
            height: 30px;
            border: 1px solid rgba(255, 255, 255, 0.35);
            border-radius: 7px;
            background: rgba(255, 255, 255, 0.14);
            color: #fff;
            font-size: 16px;
            line-height: 1;
            cursor: pointer;
            transition: 0.15s ease;
        }

        .nav-btn:hover {
            background: rgba(255, 255, 255, 0.26);
        }

        /* =====================================
       WEEK DAYS
    ===================================== */

        .weekdays {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            text-align: center;
            padding: 5px;
            background-color: #e5eaf1;
        }

        .weekday {
            padding: 6px 0;
            color: var(--muted);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.03em;
        }

        /* =====================================
       DAYS
    ===================================== */

        .days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            padding: 5px;
        }

        .day {
            height: 30px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 2px;
            border-radius: 8px;
            color: var(--ink);
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: 0.15s ease;
        }

        .day:hover {
            background: #e7edf8;
        }

        .day.other-month {
            color: #c3cad6;
        }

        .day.other-month:hover {
            background: #f2f4f8;
            color: #97a1b2;
        }

        .day.today {
            border: 1.5px solid var(--brand-mid);
            color: var(--brand-mid);
            font-weight: 700;
        }

        .day.selected {
            background: var(--gh-grad-primary);
            color: #fff;
            font-weight: 700;
            box-shadow: 0 4px 10px rgba(1, 52, 119, 0.35);
        }

        .day.selected:hover {
            filter: brightness(1.06);
        }

        /* =====================================
       FOOTER
    ===================================== */

        .calendar-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px;
            border-top: 1px solid var(--line);
            background: #f7f9fc;
        }

        .footer-btn {
            border: 0;
            background: transparent;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            padding: 6px 10px;
            border-radius: 6px;
            transition: 0.15s ease;
        }

        .today-btn {
            color: var(--brand-mid);
        }

        .today-btn:hover {
            background: rgba(10, 95, 176, 0.1);
        }

        .clear-btn {
            color: var(--muted);
        }

        .clear-btn:hover {
            background: #eceff4;
            color: #55617a;
        }

        /* =====================================
       SCROLLBAR
    ===================================== */

        .options-dropdown::-webkit-scrollbar {
            width: 5px;
        }

        .options-dropdown::-webkit-scrollbar-thumb {
            background: #c3cddc;
            border-radius: 10px;
        }

        /* =====================================
       RESPONSIVE
    ===================================== */

        @media (max-width: 480px) {
            .calendar-dropdown {
                width: 100%;
            }
        }



        /* =====================================
           FORM
        ===================================== */



        /* =====================================
           TIME PICKER
        ===================================== */

        .time-picker {
            position: relative;
        }

        /* =====================================
           INPUT
        ===================================== */

        .time-input {
            /* width: 100%;

  height: 42px;

  padding: 0 12px;

  border: 1px solid #d9dee3;

  border-radius: 6px;

  background: #fff;

  color: #333;

  font-size: 14px;

  outline: none;

  transition: 0.2s; */
        }

        .time-input:hover {
            /* border-color: #bfc4ca; */
        }

        .time-input:focus {
            /* border-color: var(--gh-primary); */

            /* box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.08); */
        }

        .time-input::placeholder {
            /* color: #999; */
        }

        /* =====================================
           TIME DROPDOWN
           
           JS controls display.
        ===================================== */

        .time-dropdown {
            position: absolute;

            top: calc(100% + 6px);

            left: 0;

            width: 320px;

            padding: 10px;

            background: #fff;

            border: 1px solid #e1e4e8;

            border-radius: 9px;

            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);

            z-index: 1000;
            outline: 5px solid #e5eaf1;
        }

        /* =====================================
           HEADER
        ===================================== */

        .time-header {
            display: flex;

            align-items: center;

            justify-content: center;

            margin-bottom: 14px;

            font-size: 14px;

            font-weight: 600;

            color: #333;
        }

        /* =====================================
           TIME SELECT AREA
        ===================================== */

        .time-select-wrapper {
            display: flex;

            align-items: center;

            justify-content: center;

            gap: 8px;
        }

        .time-select {
            position: relative;
        }

        .time-select .select-arrow {
            color: #777;
        }

        /* =====================================
           SELECT INPUT
        ===================================== */

        .hour-input,
        .minute-input,
        .ampm-input {
            height: 38px;

            padding: 0 28px 0 10px;

            border: 1px solid #d9dee3;

            border-radius: 6px;

            background: #fff;

            color: #333;

            font-size: 14px;

            font-weight: 600;

            outline: none;

            cursor: pointer;
        }

        .hour-input {
            width: 75px;
        }

        .minute-input {
            width: 75px;
        }

        .ampm-input {
            width: 85px;
        }

        .hour-input:focus,
        .minute-input:focus,
        .ampm-input:focus {
            border-color: var(--gh-primary);

            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.08);
        }

        /* =====================================
           ARROW
        ===================================== */

        .select-arrow {
            position: absolute;

            right: 9px;

            top: 50%;

            transform: translateY(-50%);

            font-size: 9px;

            color: #fff;

            pointer-events: none;
        }

        /* =====================================
           OPTIONS
        ===================================== */

        .options-dropdown {
            display: none;

            position: absolute;

            top: calc(100% + 4px);

            left: 0;

            width: 100%;

            max-height: 180px;

            overflow-y: auto;

            background: #fff;

            border: 1px solid #ddd;

            border-radius: 6px;

            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.12);

            z-index: 2000;
        }

        .option {
            padding: 9px 10px;

            font-size: 13px;

            color: #333;

            cursor: pointer;

            transition: 0.15s;
        }

        .option:hover {
            background: #e5eaf1;
        }

        .option.active {
            background: var(--gh-primary);

            color: #fff;
        }

        /* =====================================
           COLON
        ===================================== */

        .time-colon {
            font-size: 18px;

            font-weight: 600;

            color: #555;

            margin-top: -2px;
        }

        /* =====================================
           FOOTER
        ===================================== */

        .time-footer {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-top: 10px;

            padding-top: 10px;

            border-top: 1px solid #eee;
        }

        .footer-btn {
            border: 0;

            background: transparent;

            font-size: 13px;

            cursor: pointer;
        }

        .now-btn {
            color: var(--gh-primary);

            font-weight: 500;
        }

        .clear-btn {
            color: #777;
        }

        /* =====================================
           SCROLLBAR
        ===================================== */

        .options-dropdown::-webkit-scrollbar {
            width: 5px;
        }

        .options-dropdown::-webkit-scrollbar-thumb {
            background: #ccc;

            border-radius: 10px;
        }

        /* =====================================
           MOBILE
        ===================================== */

        @media (max-width: 480px) {
            .time-dropdown {
                width: 100%;
            }

            .time-select-wrapper {
                gap: 5px;
            }
        }


        .ci-modal {
            border: none;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 25px 60px -15px rgba(30, 41, 59, .35);
        }

        .ci-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.25rem 1.5rem;
        }

        .ci-header-left {
            display: flex;
            align-items: center;
            gap: .85rem;
        }

        .ci-header-icon {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--gh-grad-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            flex-shrink: 0;
            color: #fff;
        }

        .ci-header-icon-out {
            background: linear-gradient(135deg, #ef4444, #f59e0b);
        }

        .ci-header-icon-tea {
            background: linear-gradient(135deg, #b45309, #f59e0b);
        }

        .ci-header-icon-lunch {
            background: linear-gradient(135deg, #0891b2, #06b6d4);
        }

        select.ci-input {
            padding-left: 2.25rem !important;
            /* appearance: auto; */
        }

        .ci-title {
            margin: 0;
            font-weight: 700;
            letter-spacing: .2px;
        }

        .ci-subtitle {
            font-size: .78rem;
            opacity: .85;
        }

        .ci-body {
            background: #f8f9fc;
            padding: 1.5rem;
        }

        .ci-profile {
            display: flex;
            align-items: center;
            gap: .85rem;
            background: #fff;
            border: 1px solid #eef0f6;
            border-radius: .75rem;
            padding: .75rem 1rem;
            box-shadow: 0 2px 8px rgba(30, 41, 59, .04);
        }

        .ci-avatar {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--gh-primary);
        }

        .ci-profile-info h6 {
            margin: 0;
            font-weight: 700;
        }

        .ci-badge {
            display: inline-block;
            margin-top: 2px;
            font-size: .72rem;
            font-weight: 600;
            color: var(--gh-primary);
            background: #eef0ff;
            padding: .1rem .5rem;
            border-radius: .35rem;
        }

        .ci-live-dot {
            margin-left: auto;
            font-size: .72rem;
            font-weight: 600;
            color: #16a34a;
            display: flex;
            align-items: center;
            gap: .3rem;
        }

        .ci-live-dot .mdi-circle {
            font-size: .5rem;
            animation: ciPulse 1.4s ease-in-out infinite;
        }

        @keyframes ciPulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: .25;
            }
        }

        .ci-field {
            position: relative;
            display: flex;
            align-items: center;
        }

        .ci-field>i {
            position: absolute;
            left: .75rem;
            color: #94a3b8;
            font-size: 1rem;
            pointer-events: none;
        }

        .ci-input {
            padding-left: 2.25rem !important;
            background: #f1f3f9 !important;
            border: 1px solid #e5e8f2 !important;
            font-weight: 500;
            color: #1e293b;
        }

        .ci-field-location .ci-spinner {
            position: absolute;
            right: .75rem;
            color: var(--gh-primary);
        }

        .form-label-manual {
            justify-content: flex-start;
            gap: .5rem;
        }

        .ci-textarea {
            border: 1.5px dashed #c7d2fe !important;
            background: #fbfbff !important;
        }

        .ci-textarea:focus {
            border-style: solid !important;
            border-color: var(--gh-primary) !important;
            box-shadow: 0 0 0 .2rem rgba(99, 102, 241, .15) !important;
        }

        .ci-footer {
            background: #f8f9fc;
            border-top: 1px solid #eef0f6;
        }

        #checkInOutBtn.disabled {
            pointer-events: none;
            opacity: .5;
        }
    </style>

</head>

<body>
    <div class="backgroundimageblock">
        <img src="./assets/img/backgroundimage.jpg" alt="">
    </div>
    <div class="auth-page">
        <div class="auth-card">
            <a href="index.html" class="auth-brand">
                <img src="./assets/img/logo-icon.png" alt="" style="height: 60px;">
                <img src="./assets/img/logo-text.png" alt="" style="width: 200px;margin-top: 15px;">
            </a>
            <h4 class="text-center mb-1 fw-bold">Welcome</h4>
            <p class="text-muted text-center mb-4">Login in to your account</p>
            <form>
                <div class="mb-3"><label class="form-label">Username</label><input type="email" class="form-control"
                        placeholder="Enter username"></div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between"><label class="form-label">Password</label></div><input type="password"
                        class="form-control" placeholder="Enter password">
                </div>
                <a href="dashboard.php" class="btn btn-primary w-100 mb-3"><i class="mdi mdi-login me-1"></i>Login</a>

            </form>
        </div>
    </div>


    <script src="./cdn.jsdelivr.net/cdn.jsdelivr.net/npm/jquery%403.7.1/dist/jquery.min.js"></script>
    <script src="./cdn.jsdelivr.net/cdn.jsdelivr.net/npm/bootstrap%405.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/app.js"></script>

</body>


</html>