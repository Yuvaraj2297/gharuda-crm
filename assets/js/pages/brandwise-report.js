/**
 * Gharuda CRM - Brandwise Report Page Script
 * File: assets/js/pages/brandwise-report.js
 * Handles: Tab switching (Pure JS show/hide), Chart.js v4 rendering,
 *          Range toggles, and report interactions.
 */

(function () {
    'use strict';

    /* ==========================================================================
       Chart.js Initialization & Charts Storage
       ========================================================================== */
    var bwrCharts = {};

    function initCharts() {
        if (typeof Chart === 'undefined') return;

        Chart.defaults.font.family = getComputedStyle(document.body).fontFamily;
        Chart.defaults.color = '#6b7684';
        Chart.defaults.plugins.legend.labels.boxWidth = 10;
        Chart.defaults.plugins.legend.labels.usePointStyle = true;

        var GREEN   = '#16a34a',
            GREEN_D = '#0f7a38',
            GREEN_L = '#86efac';
        var AMBER   = '#f59e0b',
            VIOLET  = '#8b5cf6';

        var tooltipStyle = {
            backgroundColor: '#16202b',
            padding: 10,
            cornerRadius: 9,
            titleFont: { weight: '700', size: 12 },
            bodyFont: { size: 12 },
            displayColors: true,
            boxPadding: 4
        };

        function grad(ctx, area, c1, c2) {
            if (!area) return c1;
            var g = ctx.createLinearGradient(0, area.top, 0, area.bottom);
            g.addColorStop(0, c1);
            g.addColorStop(1, c2);
            return g;
        }

        /* ---- Overview: Monthly revenue trend ---- */
        var revEl = document.getElementById('bwrRevChart');
        if (revEl) {
            var revTrendData = [0, 120000, 280000, 152000, 48000, 204000, 0, 2000, 8000, 0, 0, 0];
            bwrCharts.rev = new Chart(revEl, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Revenue',
                        data: revTrendData,
                        borderColor: GREEN,
                        backgroundColor: function (c) {
                            return grad(c.chart.ctx, c.chart.chartArea, 'rgba(22,163,74,.28)', 'rgba(22,163,74,.02)');
                        },
                        fill: true,
                        tension: 0.4,
                        pointRadius: 0,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: GREEN_D,
                        pointHoverBorderColor: '#fff',
                        pointHoverBorderWidth: 2,
                        borderWidth: 2.5
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    interaction: { mode: 'index', intersect: false },
                    plugins: {
                        legend: { display: false },
                        tooltip: tooltipStyle
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { color: 'rgba(20,20,43,.05)' },
                            ticks: {
                                callback: function (v) {
                                    return v >= 1000 ? (v / 1000) + 'k' : v;
                                }
                            }
                        },
                        x: {
                            grid: { display: false }
                        }
                    }
                }
            });
        }

        /* ---- Overview: Target gauge ---- */
        var targetEl = document.getElementById('bwrTargetChart');
        if (targetEl) {
            bwrCharts.target = new Chart(targetEl, {
                type: 'doughnut',
                data: {
                    labels: ['Achieved', 'Remaining'],
                    datasets: [{
                        data: [68, 32],
                        backgroundColor: [GREEN, '#e8ecef'],
                        borderWidth: 0,
                        borderRadius: 10
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    cutout: '76%',
                    rotation: -90,
                    circumference: 180,
                    plugins: {
                        legend: { display: false },
                        tooltip: { enabled: false }
                    }
                }
            });
        }

        /* ---- Overview: Customer insights ---- */
        var custEl = document.getElementById('bwrCustChart');
        if (custEl) {
            bwrCharts.cust = new Chart(custEl, {
                type: 'doughnut',
                data: {
                    labels: ['New Customers', 'Repeat Customers'],
                    datasets: [{
                        data: [72, 28],
                        backgroundColor: [AMBER, VIOLET],
                        hoverOffset: 6,
                        borderWidth: 2,
                        borderColor: '#fff'
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    cutout: '64%',
                    plugins: {
                        legend: { display: false },
                        tooltip: tooltipStyle
                    }
                }
            });
        }

        /* ---- Leads: by date ---- */
        var leadsDateEl = document.getElementById('bwrLeadsDateChart');
        if (leadsDateEl) {
            var dateLabels = [];
            for (var d = 1; d <= 30; d++) dateLabels.push(d < 10 ? '0' + d : '' + d);
            var leadsByDateData = [4, 7, 6, 9, 8, 5, 3, 6, 8, 7, 10, 12, 9, 6, 8, 11, 9, 7, 12, 16, 10, 8, 9, 7, 6, 9, 11, 14, 87, 12];
            bwrCharts.leadsDate = new Chart(leadsDateEl, {
                type: 'line',
                data: {
                    labels: dateLabels,
                    datasets: [{
                        label: 'Leads',
                        data: leadsByDateData,
                        borderColor: GREEN,
                        backgroundColor: function (c) {
                            return grad(c.chart.ctx, c.chart.chartArea, 'rgba(22,163,74,.26)', 'rgba(22,163,74,.02)');
                        },
                        fill: true,
                        tension: 0.38,
                        pointRadius: 0,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: GREEN_D,
                        pointHoverBorderColor: '#fff',
                        pointHoverBorderWidth: 2,
                        borderWidth: 2.5
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    interaction: { mode: 'index', intersect: false },
                    plugins: {
                        legend: { display: false },
                        tooltip: tooltipStyle
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { color: 'rgba(20,20,43,.05)' }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { maxTicksLimit: 15 }
                        }
                    }
                }
            });
        }

        /* ---- Leads: by source ---- */
        var leadsSourceEl = document.getElementById('bwrLeadsSourceChart');
        if (leadsSourceEl) {
            var srcSorted = [
                ['Indiamart', 122],
                ['Direct', 12],
                ['Website', 9],
                ['Text', 8],
                ['Insta', 6],
                ['Exhibition', 5],
                ['Facebook', 5],
                ['LinkedIn', 4],
                ['Google', 4],
                ['Email', 3],
                ['Telegram', 3],
                ['Consultant/Referral', 2]
            ];
            var srcMax = srcSorted.length ? srcSorted[0][1] : 0;
            bwrCharts.leadsSource = new Chart(leadsSourceEl, {
                type: 'bar',
                data: {
                    labels: srcSorted.map(function (r) { return r[0]; }),
                    datasets: [{
                        label: 'Leads',
                        data: srcSorted.map(function (r) { return r[1]; }),
                        backgroundColor: srcSorted.map(function (r) {
                            return r[1] === srcMax ? GREEN_D : 'rgba(22,163,74,.55)';
                        }),
                        hoverBackgroundColor: GREEN,
                        borderRadius: 6,
                        maxBarThickness: 24
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: tooltipStyle
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { color: 'rgba(20,20,43,.05)' }
                        },
                        x: {
                            grid: { display: false },
                            ticks: {
                                maxRotation: 55,
                                minRotation: 40,
                                font: { size: 10 }
                            }
                        }
                    }
                }
            });
        }

        /* ---- Leads: conversion overview (segmented day/week/month) ---- */
        var hourEl = document.getElementById('bwrHourChart');
        if (hourEl) {
            var hourLabelsDay = ['00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00'];
            var hourData = {
                day: [0.2, 0.4, 0.3, 0.5, 0.6, 0.4, 0.3, 0.5, 0.7, 0.6, 0.8, 0.7, 0.9, 0.8, 0.6, 0.7, 0.5, 0.6, 0.4, 0.5, 0.3, 0.4, 0.2, 0.3],
                week: [0.5, 0.6, 0.55, 0.65, 0.7, 0.6, 0.75],
                month: [0.42, 0.5, 0.61, 0.48, 0.72, 0.66, 0.58, 0.7, 0.64, 0.75, 0.69, 0.8]
            };
            var hourLabelsWk = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
            var hourLabelsMo = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            bwrCharts.hour = new Chart(hourEl, {
                type: 'line',
                data: {
                    labels: hourLabelsDay,
                    datasets: [{
                        label: 'Conversion',
                        data: hourData.day,
                        borderColor: AMBER,
                        backgroundColor: function (c) {
                            return grad(c.chart.ctx, c.chart.chartArea, 'rgba(245,158,11,.22)', 'rgba(245,158,11,.02)');
                        },
                        fill: true,
                        tension: 0.38,
                        pointRadius: 0,
                        pointHoverRadius: 5,
                        borderWidth: 2.5
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    interaction: { mode: 'index', intersect: false },
                    plugins: {
                        legend: { display: false },
                        tooltip: tooltipStyle
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { color: 'rgba(20,20,43,.05)' }
                        },
                        x: {
                            grid: { display: false },
                            ticks: {
                                font: { size: 10 },
                                maxTicksLimit: 12
                            }
                        }
                    }
                }
            });

            document.querySelectorAll('#bwrHourSeg button').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    document.querySelectorAll('#bwrHourSeg button').forEach(function (b) {
                        b.classList.remove('active');
                    });
                    btn.classList.add('active');
                    var t = btn.dataset.tab;
                    bwrCharts.hour.data.labels = t === 'day' ? hourLabelsDay : (t === 'week' ? hourLabelsWk : hourLabelsMo);
                    bwrCharts.hour.data.datasets[0].data = hourData[t];
                    bwrCharts.hour.update();
                });
            });
        }

        /* ---- Qualification: doughnut ---- */
        var qualEl = document.getElementById('bwrQualChart');
        if (qualEl) {
            bwrCharts.qual = new Chart(qualEl, {
                type: 'doughnut',
                data: {
                    labels: ['SQL', 'MQL', 'UQL'],
                    datasets: [{
                        data: [62, 23, 15],
                        backgroundColor: [GREEN_D, GREEN, GREEN_L],
                        hoverOffset: 6,
                        borderWidth: 2,
                        borderColor: '#fff'
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    cutout: '64%',
                    plugins: {
                        legend: { position: 'bottom' },
                        tooltip: tooltipStyle
                    }
                }
            });
        }

        /* ---- Qualification: conversion by brand ---- */
        var brandConvEl = document.getElementById('bwrBrandConvChart');
        if (brandConvEl) {
            bwrCharts.brandConv = new Chart(brandConvEl, {
                type: 'bar',
                data: {
                    labels: ['PhD Assistance', 'Thesis Writing', 'Journal Support', 'Publication'],
                    datasets: [{
                        label: 'Conversion %',
                        data: [17.3, 14.1, 11.8, 9.6],
                        backgroundColor: function (c) {
                            return grad(c.chart.ctx, c.chart.chartArea, 'rgba(22,163,74,.9)', 'rgba(22,163,74,.45)');
                        },
                        borderRadius: 7,
                        maxBarThickness: 46
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: tooltipStyle
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { color: 'rgba(20,20,43,.05)' }
                        },
                        x: {
                            grid: { display: false },
                            ticks: {
                                font: { size: 10.5 }
                            }
                        }
                    }
                }
            });
        }

        /* ---- Geography & Products: horizontal product bar ---- */
        var productEl = document.getElementById('bwrProductChart');
        if (productEl) {
            var productLabels = ['Full XL', 'BX900', 'Membrana', '1.6 x 122', '1.6 x 115', 'BX000', 'Full', 'Catalise', 'Adenine', 'Adenoglycinth 2%', 'Adenoglycinth 5%', 'Adenoglycinth 10%', 'Adenoglycinth 3%', 'IWB Panel', 'SPM', 'Micro Thread', '1.6 x 127', 'B-Lead Material', 'Machine', 'Kit Top', 'BX400', 'Misc'];
            var productUnits = [92, 10, 3, 3, 2, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];

            bwrCharts.product = new Chart(productEl, {
                type: 'bar',
                data: {
                    labels: productLabels,
                    datasets: [{
                        label: 'Units',
                        data: productUnits,
                        backgroundColor: 'rgba(22,163,74,.6)',
                        hoverBackgroundColor: GREEN,
                        borderRadius: 5,
                        maxBarThickness: 14
                    }]
                },
                options: {
                    indexAxis: 'y',
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: tooltipStyle
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            grid: { color: 'rgba(20,20,43,.05)' }
                        },
                        y: {
                            grid: { display: false },
                            ticks: {
                                font: { size: 10.5 }
                            }
                        }
                    }
                }
            });
        }
    }

    function loadChart(cb) {
        if (window.Chart && parseInt(Chart.version, 10) >= 3) return cb();
        var s = document.createElement('script');
        s.src = 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js';
        s.onload = cb;
        document.head.appendChild(s);
    }

    /* ==========================================================================
       Tab Switching, Range Toggle, and Refresh Handlers
       ========================================================================== */
    document.addEventListener('DOMContentLoaded', function () {
        // Load and initialize charts
        loadChart(initCharts);

        /* Section tabs: pure JS display block / none */
        var tabs = document.querySelectorAll('#bwrTabs .bwr-tab');
        var panels = document.querySelectorAll('.bwr-panel');

        tabs.forEach(function (tab) {
            tab.addEventListener('click', function (e) {
                e.preventDefault();
                var targetName = tab.getAttribute('data-tab');

                /* Active class update for tabs */
                tabs.forEach(function (t) {
                    t.classList.remove('active');
                });
                tab.classList.add('active');

                /* Hide and Show panels with display block/none */
                panels.forEach(function (p) {
                    p.classList.remove('active');
                    p.style.display = 'none';
                });

                var activePanel = document.getElementById('bwrPanel-' + targetName);
                if (activePanel) {
                    activePanel.classList.add('active');
                    activePanel.style.display = 'block';

                    /* Re-measure charts that were hidden (canvas had 0 size) */
                    requestAnimationFrame(function () {
                        activePanel.querySelectorAll('canvas').forEach(function (cv) {
                            var ch = (typeof Chart !== 'undefined' && Chart.getChart) ? Chart.getChart(cv) : null;
                            if (ch) ch.resize();
                        });
                    });
                }
            });
        });

        /* Quick range chips toggle active */
        document.querySelectorAll('#bwrRange button').forEach(function (btn) {
            btn.addEventListener('click', function () {
                document.querySelectorAll('#bwrRange button').forEach(function (b) {
                    b.classList.remove('active');
                });
                btn.classList.add('active');
            });
        });

        /* Refresh */
        var refreshBtn = document.getElementById('bwrRefresh');
        if (refreshBtn) {
            refreshBtn.addEventListener('click', function () {
                window.location.reload();
            });
        }
    });

    // Expose charts object for debugging or external access
    window.bwrCharts = bwrCharts;
})();
