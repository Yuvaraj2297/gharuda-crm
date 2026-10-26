/**
 * Gharuda CRM - Lead Source Report Page Script
 * File: assets/js/pages/lead-source-report.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener("DOMContentLoaded", function () {
        // View tabs: Overview / All Sources (Hide & Show via JavaScript)
        var tabBtns = document.querySelectorAll("#lsrTabs .lsr-tab");
        var panels = document.querySelectorAll(".lsr-panel");

        tabBtns.forEach(function (tab) {
            tab.addEventListener("click", function (e) {
                e.preventDefault();
                tabBtns.forEach(function (t) { t.classList.remove("active"); });
                tab.classList.add("active");

                var targetTab = tab.getAttribute("data-tab");
                panels.forEach(function (p) {
                    if (p.id === "lsrPanel-" + targetTab) {
                        p.classList.add("active");
                        p.style.display = "block";
                    } else {
                        p.classList.remove("active");
                        p.style.display = "none";
                    }
                });
            });
        });

        // Filter search / clear client-side handling
        var filterForm = document.querySelector(".filters-card");
        var fromInput = document.getElementById("lsrFrom");
        var toInput = document.getElementById("lsrTo");
        var dateRangeLabel = document.querySelector(".lsr-date-range");
        var heroDateSub = document.querySelector(".lsr-hero-sub");

        if (filterForm) {
            filterForm.addEventListener("submit", function (e) {
                e.preventDefault();
                var fromVal = fromInput ? fromInput.value.trim() : "";
                var toVal = toInput ? toInput.value.trim() : "";
                var label = (fromVal && toVal && fromVal !== toVal) ? (fromVal + " to " + toVal) : (fromVal || toVal || "17-10-2026");
                if (dateRangeLabel) {
                    dateRangeLabel.innerHTML = '<i class="bi bi-calendar3 me-1"></i>Date: ' + label;
                }
                if (heroDateSub) {
                    heroDateSub.innerHTML = '<i class="bi bi-calendar3 me-1"></i>' + label + ' · combined result';
                }
            });
        }

        var clearBtn = document.getElementById("lsrClear");
        if (clearBtn) {
            clearBtn.addEventListener("click", function (e) {
                e.preventDefault();
                var today = "17-10-2026";
                if (fromInput) fromInput.value = today;
                if (toInput) toInput.value = today;
                if (dateRangeLabel) {
                    dateRangeLabel.innerHTML = '<i class="bi bi-calendar3 me-1"></i>Date: ' + today;
                }
                if (heroDateSub) {
                    heroDateSub.innerHTML = '<i class="bi bi-calendar3 me-1"></i>' + today + ' · combined result';
                }
            });
        }
    });
