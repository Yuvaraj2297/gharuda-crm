<?php include 'header.php'; ?>

<style>
    /* ===== Organization Directory ===== */
    .org-wrap {
        display: flex;
        align-items: flex-start;
        gap: 18px;
    }

    /* ---- Left: Department list ---- */
    .org-dept-panel {
        width: 260px;
        flex-shrink: 0;
        background: var(--bg-card);
        border: 1px solid var(--border-soft);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-card);
        padding: 16px;
        position: sticky;
        top: 86px;
    }

    .org-dept-search {
        position: relative;
        margin-bottom: 14px;
    }

    .org-dept-search input {
        width: 100%;
        border: 1px solid var(--border-soft);
        background: var(--input-bg);
        border-radius: var(--radius-sm);
        padding: 9px 34px 9px 12px;
        font-size: 13.5px;
        color: var(--ink-900);
        outline: none;
        transition: border-color .15s ease;
    }

    .org-dept-search input:focus {
        border-color: var(--primary);
    }

    .org-dept-search i.bi-search {
        position: absolute;
        left: auto;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--ink-300);
        font-size: 13px;
        pointer-events: none;
    }

    .org-dept-list {
        display: flex;
        flex-direction: column;
        gap: 2px;
        max-height: calc(100vh - 260px);
        overflow-y: auto;
    }

    .org-dept-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
        padding: 10px 12px;
        border-radius: var(--radius-sm);
        font-size: 13.5px;
        font-weight: 600;
        color: var(--ink-700);
        cursor: pointer;
        border: 1px solid transparent;
        transition: background .15s ease, color .15s ease;
    }

    .org-dept-item:hover {
        background: var(--input-bg);
    }

    .org-dept-item.active {
        background: var(--primary-soft);
        color: var(--primary-dark);
    }

    .org-dept-item .org-dept-count {
        font-size: 11.5px;
        font-weight: 700;
        color: var(--ink-500);
        background: var(--input-bg);
        border-radius: 20px;
        padding: 2px 8px;
        min-width: 22px;
        text-align: center;
    }

    .org-dept-item.active .org-dept-count {
        color: var(--primary-dark);
        background: var(--white);
    }

    /* ---- Right: header bar + card grid ---- */
    .org-content {
        flex: 1;
        min-width: 0;
    }

    .org-content-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: var(--bg-card);
        border: 1px solid var(--border-soft);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-card);
        padding: 16px 22px;
        margin-bottom: 18px;
    }

    .org-content-head h3 {
        font-weight: 700;
        font-size: 16px;
        color: var(--ink-900);
        margin: 0;
    }

    .org-content-head .org-member-count {
        font-size: 13px;
        font-weight: 600;
        color: var(--ink-500);
        text-align: right;
    }

    .org-content-head .org-member-count strong {
        display: block;
        font-size: 16px;
        color: var(--ink-900);
    }

    .org-card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
        gap: 16px;
    }

    .org-emp-card {
        --status-color: var(--ink-300);
        --status-soft: var(--input-bg);
        position: relative;
        display: flex;
        flex-direction: column;
        height: 100%;
        background: var(--bg-card);
        border: 1px solid var(--border-soft);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-card);
        overflow: hidden;
        text-align: center;
        transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
    }

    .org-emp-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 4px 10px rgba(20, 30, 25, .06), 0 18px 34px -14px rgba(20, 30, 25, .16);
        border-color: var(--border-soft);
    }

    .org-emp-card.is-in {
        --status-color: var(--primary-dark);
        --status-soft: var(--primary-soft);
    }

    .org-emp-card.is-out {
        --status-color: var(--accent-blue);
        --status-soft: var(--accent-blue-soft);
    }

    .org-emp-card.is-pending {
        --status-color: var(--accent-red);
        --status-soft: var(--accent-red-soft);
    }

    .org-emp-card-top {
        position: relative;
        padding: 22px 16px 40px;
        background: linear-gradient(180deg, var(--status-soft) 0%, var(--bg-card) 100%);
    }

    .org-emp-actions {
        position: absolute;
        top: 12px;
        right: 12px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 6px;
        z-index: 2;
    }

    .org-emp-actions button {
        width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--white);
        border: 1px solid var(--border-soft);
        border-radius: 50%;
        padding: 0;
        font-size: 13px;
        color: var(--ink-300);
        cursor: pointer;
        box-shadow: 0 2px 6px rgba(20, 30, 25, .07);
        transition: color .15s ease, transform .15s ease, border-color .15s ease;
    }

    .org-emp-actions button:hover {
        transform: scale(1.08);
    }

    .org-emp-actions .org-fav-btn.active {
        color: var(--accent-amber);
        border-color: var(--accent-amber-soft);
        background: var(--accent-amber-soft);
    }

    .org-emp-actions .org-call-btn:hover {
        color: var(--primary);
        border-color: var(--primary-light);
    }

    .org-emp-photo-wrap {
        position: relative;
        width: 78px;
        height: 78px;
        margin: 0 auto;
    }

    .org-emp-photo {
        width: 78px;
        height: 78px;
        border-radius: 50%;
        object-fit: cover;
        display: block;
        background: var(--input-bg);
        border: 3px solid var(--bg-card);
        box-shadow: 0 0 0 3px var(--status-soft);
    }

    .org-emp-status-dot {
        position: absolute;
        bottom: 2px;
        right: 2px;
        width: 15px;
        height: 15px;
        border-radius: 50%;
        background: var(--status-color);
        border: 3px solid var(--bg-card);
    }

    .org-emp-card-body {
        flex: 1;
        display: flex;
        flex-direction: column;
        padding: 0 18px 18px;
        margin-top: -24px;
    }

    .org-emp-id {
        display: inline-block;
        align-self: center;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .02em;
        color: var(--ink-500);
        background: var(--input-bg);
        border-radius: 20px;
        padding: 2px 10px;
        margin-bottom: 8px;
    }

    .org-emp-name {
        font-size: 15px;
        font-weight: 700;
        color: var(--ink-900);
        line-height: 1.3;
    }

    .org-emp-role {
        font-size: 12.5px;
        font-weight: 600;
        color: var(--ink-700);
        margin-top: 3px;
    }

    .org-emp-dept {
        font-size: 12px;
        color: var(--ink-500);
        margin-top: 1px;
    }

    .org-emp-email {
        font-size: 12px;
        color: var(--ink-500);
        margin-top: 8px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .org-emp-divider {
        border-top: 1px dashed var(--border-soft);
        margin: 14px 0 12px;
    }

    .org-emp-status {
        display: inline-flex;
        align-self: center;
        align-items: center;
        gap: 6px;
        font-size: 11.5px;
        font-weight: 700;
        color: var(--status-color);
        background: var(--status-soft);
        border-radius: 20px;
        padding: 5px 12px;
        margin-top: auto;
    }

    .org-emp-status::before {
        content: "";
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: currentColor;
    }

    @media (max-width: 900px) {
        .org-wrap {
            flex-direction: column;
        }

        .org-dept-panel {
            width: 100%;
            position: static;
        }

        .org-dept-list {
            max-height: 260px;
        }
    }
</style>

<div class="org-wrap">

    <!-- Department list -->
    <aside class="org-dept-panel">
        <div class="org-dept-search">
            <input type="text" placeholder="Search Department" autocomplete="off">
            <i class="bi bi-search"></i>
        </div>

        <div class="org-dept-list">
            <div class="org-dept-item active">
                <span>HR</span>
                <span class="org-dept-count">3</span>
            </div>
            <div class="org-dept-item">
                <span>IT</span>
                <span class="org-dept-count">4</span>
            </div>
            <div class="org-dept-item">
                <span>Management</span>
                <span class="org-dept-count">5</span>
            </div>
            <div class="org-dept-item">
                <span>Marketing</span>
                <span class="org-dept-count">2</span>
            </div>
        </div>
    </aside>

    <!-- Employees of selected department -->
    <section class="org-content">
        <div class="org-content-head">
            <h3>HR</h3>
            <div class="org-member-count">
                <strong>3</strong>
                Members
            </div>
        </div>

        <div class="org-card-grid">

            <!-- Priya Sharma -->
            <div class="org-emp-card is-in">
                <div class="org-emp-card-top">
                    <div class="org-emp-photo-wrap">
                        <img class="org-emp-photo" src="./assets/img/profile-2.jpg" alt="Priya Sharma">
                        <span class="org-emp-status-dot" title="In"></span>
                    </div>
                </div>
                <div class="org-emp-card-body">
                    <span class="org-emp-id">S5</span>
                    <div class="org-emp-name">Priya Sharma</div>
                    <div class="org-emp-role">HR Manager</div>
                    <div class="org-emp-dept">HR</div>
                    <div class="org-emp-email" title="priyasharma@zylker.com">priyasharma@zylker.com</div>
                    <div class="org-emp-divider"></div>
                    <span class="org-emp-status">In</span>
                </div>
            </div>

            <!-- Arjun Nair -->
            <div class="org-emp-card is-out">
                <div class="org-emp-card-top">
                    <div class="org-emp-photo-wrap">
                        <img class="org-emp-photo" src="./assets/img/profile-3.jpg" alt="Arjun Nair">
                        <span class="org-emp-status-dot" title="Out"></span>
                    </div>
                </div>
                <div class="org-emp-card-body">
                    <span class="org-emp-id">S6</span>
                    <div class="org-emp-name">Arjun Nair</div>
                    <div class="org-emp-role">HR Executive</div>
                    <div class="org-emp-dept">HR</div>
                    <div class="org-emp-email" title="arjunnair@zylker.com">arjunnair@zylker.com</div>
                    <div class="org-emp-divider"></div>
                    <span class="org-emp-status">Out</span>
                </div>
            </div>

            <!-- Hazel Carter -->
            <div class="org-emp-card is-pending">
                <div class="org-emp-card-top">
                    <div class="org-emp-photo-wrap">
                        <img class="org-emp-photo" src="./assets/img/profile-4.jpg" alt="Hazel Carter">
                        <span class="org-emp-status-dot" title="Yet to check-in"></span>
                    </div>
                </div>
                <div class="org-emp-card-body">
                    <span class="org-emp-id">S7</span>
                    <div class="org-emp-name">Hazel Carter</div>
                    <div class="org-emp-role">Assistant Manager</div>
                    <div class="org-emp-dept">HR</div>
                    <div class="org-emp-email" title="hazelcarter@zylker.com">hazelcarter@zylker.com</div>
                    <div class="org-emp-divider"></div>
                    <span class="org-emp-status">Yet to check-in</span>
                </div>
            </div>

        </div>
    </section>

</div>

<script>
    document.querySelectorAll('.org-dept-item').forEach(function (item) {
        item.addEventListener('click', function () {
            document.querySelectorAll('.org-dept-item').forEach(function (i) {
                i.classList.remove('active');
            });
            item.classList.add('active');
        });
    });
</script>

<?php include 'footer.php'; ?>