/**
 * Gharuda CRM - Lead Dashboard Page Script
 * File: assets/js/pages/lead-dashboard.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
(function () {
        var LD = { "period": "October 2026", "labels": [["1", "Thu"], ["2", "Fri"], ["3", "Sat"], ["4", "Sun"], ["5", "Mon"], ["6", "Tue"], ["7", "Wed"], ["8", "Thu"], ["9", "Fri"], ["10", "Sat"], ["11", "Sun"], ["12", "Mon"], ["13", "Tue"], ["14", "Wed"], ["15", "Thu"], ["16", "Fri"], ["17", "Sat"], ["18", "Sun"], ["19", "Mon"], ["20", "Tue"], ["21", "Wed"], ["22", "Thu"], ["23", "Fri"], ["24", "Sat"], ["25", "Sun"], ["26", "Mon"], ["27", "Tue"], ["28", "Wed"], ["29", "Thu"], ["30", "Fri"], ["31", "Sat"]], "daily": { "leads": [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "quotes": [0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 1, 0, 3, 1, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "pvalue": [0, 0, 0, 0, 0, 0, 0, 0, 85000, 0, 0, 0, 0, 0, 0, 14601, 0, 0, 0, 380000, 18000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "orders": [0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "ovalue": [0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "proforma": [0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "pfvalue": [0, 0, 0, 0, 0, 0, 0, 0, 0, 101, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "invoice": [0, 0, 0, 0, 0, 0, 0, 0, 0, 5000, 0, 0, 0, 0, 0, 0, 0, 0, -100000, 291.76, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "icount": [0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "payments": [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5999, 5000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "paycount": [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0] }, "yearly": { "leads": [2, 2, 1, 2, 2, 1, 3, 2, 1, 2, 2, 2], "quotes": [10, 7, 5, 11, 8, 5, 12, 9, 6, 9, 10, 7], "pvalue": [547361.1, 398080.8, 248800.5, 597121.2, 447840.9, 298560.6, 646881.3, 497601, 348320.7, 497601, 547361.1, 398080.8], "orders": [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1], "ovalue": [55000, 40000, 25000, 60000, 45000, 30000, 65000, 50000, 35000, 50000, 55000, 40000], "proforma": [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1], "pfvalue": [111.1, 80.8, 50.5, 121.2, 90.9, 60.6, 131.3, 101, 70.7, 101, 111.1, 80.8], "invoice": [-104179.06, -75766.59, -47354.12, -113649.89, -85237.42, -56824.94, -123120.71, -94708.24, -66295.77, -94708.24, -104179.06, -75766.59], "icount": [3, 2, 2, 4, 3, 2, 4, 3, 2, 3, 3, 2], "payments": [12098.9, 8799.2, 5499.5, 13198.8, 9899.1, 6599.4, 14298.7, 10999, 7699.3, 10999, 12098.9, 8799.2], "paycount": [2, 2, 1, 2, 2, 1, 3, 2, 1, 2, 2, 2] }, "yearMonths": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"], "todayIdx": 16, "staff": ["Thilak", "ASHISH", "Rokith", "Prabhu", "KISHORE", "GHARUDA"], "calls": { "meeting": [0, 0, 0, 0, 0, 0], "call": [1, 0, 0, 0, 0, 0] }, "pipeline": [["Lead", 5.6, 5.6], ["Proposal", 535498.18, 535498.18], ["Estimate", 119.18, 119.18], ["Invoice", 98000.98, -98000.98]], "sources": [["IndiaMART", 97], ["test", 5], ["Exihibition", 3], ["Mail", 2], ["Gokul(Reference)", 1], ["Telegram", 1]], "avgMonths": ["October", "November", "December"], "avgRevenue": [[0, 0, 0], [0, 0, 0], [0, 0, 0], [0, 0, 0], [0, 0, 0], [5017562.93, 0, -105708.24]], "avgLeads": [[0, 0, 0], [0, 0, 0], [0, 0, 2], [0, 0, 0], [0, 0, 0], [40, 55, 17]], "avgWon": [12, 6, 2], "avgLost": [3, 2, 0] };

        // ===== Helpers =====
        function fmtInr(n, dec) {
            dec = (dec === undefined) ? 2 : dec;
            var neg = n < 0,
                s = Math.abs(n).toFixed(dec).split('.'),
                int = s[0],
                last3 = int.slice(-3),
                rest = int.slice(0, -3);
            if (rest) rest = rest.replace(/\B(?=(\d{2})+(?!\d))/g, ',') + ',';
            return '₹ ' + (neg ? '-' : '') + rest + last3 + (dec ? '.' + s[1] : '');
        }

        function shortInr(v) {
            var a = Math.abs(v),
                sign = v < 0 ? '-' : '';
            if (a >= 1e7) return sign + (a / 1e7) + 'Cr';
            if (a >= 1e5) return sign + (a / 1e5) + 'L';
            if (a >= 1e3) return sign + (a / 1e3) + 'K';
            return v;
        }

        function sum(arr) {
            return arr.reduce(function (a, b) {
                return a + b;
            }, 0);
        }

        function labelText(l) {
            return Array.isArray(l) ? l.join(' ') : l;
        }

        var C = {
            green: '#16a34a',
            blue: '#3b82f6',
            amber: '#f5b301',
            violet: '#8b5cf6',
            red: '#ef4444',
            grey: '#9ca3af',
            pink: '#ec4899'
        };
        var STAFF_COLORS = ['#3b82f6', '#16a34a', '#84cc16', '#8b5cf6', '#f59e0b', '#0f766e'];
        var GRID = {
            color: '#eef0f3',
            drawBorder: false
        };
        var charts = {};

        function ctxFor(id) {
            if (charts[id]) charts[id].destroy();
            return document.getElementById(id).getContext('2d');
        }

        function gradient(top, bottom) {
            return function (context) {
                var chart = context.chart,
                    area = chart.chartArea;
                if (!area) return top;
                var g = chart.ctx.createLinearGradient(0, area.top, 0, area.bottom);
                g.addColorStop(0, top);
                g.addColorStop(1, bottom);
                return g;
            };
        }

        // ===== Period aggregation (monthly = daily points) =====
        function agg(period, keys) {
            var out = {
                labels: [],
                series: {},
                unit: 'day'
            };
            keys.forEach(function (k) {
                out.series[k] = [];
            });

            if (period === 'yearly') {
                out.labels = LD.yearMonths;
                out.unit = 'month';
                keys.forEach(function (k) {
                    out.series[k] = LD.yearly[k].slice();
                });
            } else if (period === 'weekly') {
                out.unit = 'week';
                var n = LD.labels.length,
                    weeks = Math.ceil(n / 7);
                for (var w = 0; w < weeks; w++) {
                    var from = w * 7,
                        to = Math.min(from + 7, n);
                    out.labels.push(['W' + (w + 1), (from + 1) + '-' + to]);
                    keys.forEach(function (k) {
                        out.series[k].push(sum(LD.daily[k].slice(from, to)));
                    });
                }
            } else if (period === 'today') {
                out.labels = [LD.labels[LD.todayIdx]];
                keys.forEach(function (k) {
                    out.series[k] = [LD.daily[k][LD.todayIdx]];
                });
            } else {
                out.labels = LD.labels;
                keys.forEach(function (k) {
                    out.series[k] = LD.daily[k].slice();
                });
            }
            return out;
        }

        function baseOptions() {
            return {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false
                },
                plugins: {
                    legend: {
                        position: 'top',
                        align: 'end',
                        labels: {
                            usePointStyle: true,
                            pointStyle: 'rectRounded',
                            boxWidth: 9,
                            boxHeight: 9,
                            padding: 14,
                            font: {
                                size: 11,
                                weight: '600'
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: '#111827',
                        padding: 10,
                        cornerRadius: 8,
                        titleFont: {
                            size: 12,
                            weight: '700'
                        },
                        bodyFont: {
                            size: 12
                        },
                        boxPadding: 4,
                        callbacks: {
                            title: function (items) {
                                return items.length ? labelText(items[0].chart.data.labels[items[0].dataIndex]) : '';
                            },
                            label: function (c) {
                                var v = (c.parsed.y !== undefined && c.parsed.y !== null) ? c.parsed.y : c.parsed;
                                var money = c.dataset.label && c.dataset.label.indexOf('₹') > -1;
                                return ' ' + c.dataset.label + ': ' + (money ? fmtInr(v) : v);
                            }
                        }
                    }
                }
            };
        }

        function moneyAndCountScales() {
            return {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 10
                        },
                        maxRotation: 0
                    }
                },
                y: {
                    position: 'left',
                    grid: GRID,
                    border: {
                        display: false
                    },
                    ticks: {
                        callback: shortInr,
                        font: {
                            size: 10
                        }
                    }
                },
                y1: {
                    position: 'right',
                    beginAtZero: true,
                    grid: {
                        drawOnChartArea: false
                    },
                    border: {
                        display: false
                    },
                    ticks: {
                        precision: 0,
                        font: {
                            size: 10
                        }
                    }
                }
            };
        }

        function metric(color, label, value) {
            return '<div class="col-6 col-md-3"><div class="card border-0 bg-light p-2 text-center rounded-3"><small class="text-muted fw-semibold">' + label + '</small><div class="fs-6 fw-bold text-dark mt-1">' + value + '</div></div></div>';
        }

        // ===== Proposals / quotations =====
        function buildProposals(period) {
            var a = agg(period, ['quotes', 'pvalue']),
                opt = baseOptions();
            opt.scales = moneyAndCountScales();

            charts.proposals = new Chart(ctxFor('ldProposalChart'), {
                data: {
                    labels: a.labels,
                    datasets: [{
                        type: 'bar',
                        label: 'Proposals count',
                        data: a.series.quotes,
                        backgroundColor: 'rgba(59,130,246,.55)',
                        hoverBackgroundColor: 'rgba(59,130,246,.85)',
                        borderRadius: 6,
                        maxBarThickness: 34,
                        yAxisID: 'y1',
                        order: 2
                    }, {
                        type: 'line',
                        label: 'Proposal value (₹)',
                        data: a.series.pvalue,
                        borderColor: C.green,
                        backgroundColor: gradient('rgba(22,163,74,.28)', 'rgba(22,163,74,0)'),
                        borderWidth: 2.5,
                        pointRadius: 3,
                        pointBackgroundColor: '#fff',
                        pointBorderColor: C.green,
                        pointBorderWidth: 2,
                        tension: .35,
                        fill: true,
                        yAxisID: 'y',
                        order: 1
                    }]
                },
                options: opt
            });

            var counts = a.series.quotes,
                values = a.series.pvalue,
                total = sum(counts),
                totalVal = sum(values),
                active = values.filter(function (v) {
                    return v > 0;
                }).length,
                peakIdx = counts.indexOf(Math.max.apply(null, counts));
            document.getElementById('ldPropMetrics').innerHTML =
                metric(C.blue, 'Total proposals', total) +
                metric(C.green, 'Total value', fmtInr(totalVal)) +
                metric(C.amber, 'Average per ' + a.unit, fmtInr(active ? totalVal / active : 0)) +
                metric(C.violet, 'Peak ' + a.unit, total ? labelText(a.labels[peakIdx]) : '-');
        }

        // ===== Sales funnel =====
        function step(cls, icon, label, value, sub) {
            var bgSubtle = cls === 'blue' ? 'bg-primary-subtle text-primary' : (cls === 'green' ? 'bg-success-subtle text-success' : (cls === 'amber' ? 'bg-warning-subtle text-warning' : (cls === 'pink' ? 'bg-danger-subtle text-danger' : (cls === 'violet' ? 'bg-info-subtle text-info' : 'bg-secondary-subtle text-secondary'))));
            return '<div class="col"><div class="card border-0 bg-light p-2 rounded-3 h-100 text-center"><div class="d-flex align-items-center justify-content-center gap-1 text-muted small fw-semibold mb-1"><span class="badge ' + bgSubtle + ' p-1 rounded-circle"><i class="bi ' + icon + '"></i></span> ' + label + '</div><div class="fw-bold fs-6 text-dark">' + value + '</div><div class="small text-muted" style="font-size:0.75rem;">' + (sub || '&nbsp;') + '</div></div></div>';
        }

        function buildFunnel(period) {
            var keys = ['leads', 'quotes', 'pvalue', 'orders', 'ovalue', 'proforma', 'pfvalue', 'invoice', 'icount', 'payments', 'paycount'];
            var a = agg(period, keys),
                s = a.series;

            document.getElementById('ldFunnelSteps').innerHTML =
                '<div class="row row-cols-2 row-cols-md-3 row-cols-lg-6 g-2 w-100 m-0">' +
                step('blue', 'bi-bullseye', 'Leads', sum(s.leads), '') +
                step('amber', 'bi-file-earmark-text', 'Quotes', sum(s.quotes), fmtInr(sum(s.pvalue))) +
                step('grey', 'bi-cart-check', 'Sales orders', sum(s.orders), fmtInr(sum(s.ovalue))) +
                step('pink', 'bi-receipt', 'Proforma', sum(s.proforma), fmtInr(sum(s.pfvalue))) +
                step('green', 'bi-cash-stack', 'Invoice value', fmtInr(sum(s.invoice)), sum(s.icount) + ' invoices') +
                step('violet', 'bi-wallet2', 'Payments', fmtInr(sum(s.payments)), sum(s.paycount) + ' payments') +
                '</div>';

            var opt = baseOptions();
            opt.scales = moneyAndCountScales();
            charts.funnel = new Chart(ctxFor('ldFunnelChart'), {
                data: {
                    labels: a.labels,
                    datasets: [{
                        type: 'bar',
                        label: 'Leads',
                        data: s.leads,
                        backgroundColor: 'rgba(59,130,246,.7)',
                        borderRadius: 5,
                        maxBarThickness: 22,
                        yAxisID: 'y1',
                        order: 3
                    },
                    {
                        type: 'bar',
                        label: 'Quotes',
                        data: s.quotes,
                        backgroundColor: 'rgba(245,179,1,.75)',
                        borderRadius: 5,
                        maxBarThickness: 22,
                        yAxisID: 'y1',
                        order: 3
                    },
                    {
                        type: 'bar',
                        label: 'Sales orders',
                        data: s.orders,
                        backgroundColor: 'rgba(156,163,175,.75)',
                        borderRadius: 5,
                        maxBarThickness: 22,
                        yAxisID: 'y1',
                        order: 3
                    },
                    {
                        type: 'bar',
                        label: 'Proforma',
                        data: s.proforma,
                        backgroundColor: 'rgba(236,72,153,.65)',
                        borderRadius: 5,
                        maxBarThickness: 22,
                        yAxisID: 'y1',
                        order: 3
                    },
                    {
                        type: 'line',
                        label: 'Invoice value (₹)',
                        data: s.invoice,
                        borderColor: C.green,
                        backgroundColor: C.green,
                        borderWidth: 2.5,
                        pointRadius: 3,
                        tension: .35,
                        yAxisID: 'y',
                        order: 1
                    },
                    {
                        type: 'line',
                        label: 'Payments (₹)',
                        data: s.payments,
                        borderColor: C.violet,
                        backgroundColor: C.violet,
                        borderWidth: 2.5,
                        borderDash: [5, 4],
                        pointRadius: 3,
                        tension: .35,
                        yAxisID: 'y',
                        order: 2
                    }
                    ]
                },
                options: opt
            });
        }

        // ===== Calls & meetings =====
        function buildCalls() {
            var opt = baseOptions();
            opt.scales = {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 11
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: GRID,
                    border: {
                        display: false
                    },
                    ticks: {
                        precision: 0,
                        font: {
                            size: 10
                        }
                    }
                }
            };
            charts.calls = new Chart(ctxFor('ldCallsChart'), {
                type: 'bar',
                data: {
                    labels: LD.staff,
                    datasets: [{
                        label: 'Meeting',
                        data: LD.calls.meeting,
                        backgroundColor: 'rgba(59,130,246,.75)',
                        borderRadius: 6,
                        maxBarThickness: 30
                    }, {
                        label: 'Call summary',
                        data: LD.calls.call,
                        backgroundColor: 'rgba(22,163,74,.75)',
                        borderRadius: 6,
                        maxBarThickness: 30
                    }]
                },
                options: opt
            });
        }

        // ===== Pipeline doughnut =====
        function buildPipeline() {
            var colors = [C.blue, C.amber, C.green, C.violet],
                net = sum(LD.pipeline.map(function (p) {
                    return p[2];
                })),
                totalAbs = sum(LD.pipeline.map(function (p) {
                    return p[1];
                }));

            var centerText = {
                id: 'ldCenter',
                afterDraw: function (chart) {
                    var a = chart.chartArea,
                        x = (a.left + a.right) / 2,
                        y = (a.top + a.bottom) / 2,
                        c = chart.ctx,
                        ff = Chart.defaults.font.family;
                    c.save();
                    c.textAlign = 'center';
                    c.fillStyle = '#6b7280';
                    c.font = '600 11px ' + ff;
                    c.fillText('Net pipeline', x, y - 8);
                    c.fillStyle = '#111827';
                    c.font = '800 15px ' + ff;
                    c.fillText(fmtInr(net, 0), x, y + 12);
                    c.restore();
                }
            };

            var opt = baseOptions();
            opt.cutout = '68%';
            opt.plugins.legend.display = false;
            opt.plugins.tooltip.callbacks.label = function (c) {
                return ' ' + LD.pipeline[c.dataIndex][0] + ': ' + fmtInr(LD.pipeline[c.dataIndex][2]);
            };
            charts.pipeline = new Chart(ctxFor('ldPipelineChart'), {
                type: 'doughnut',
                data: {
                    labels: LD.pipeline.map(function (p) {
                        return p[0];
                    }),
                    datasets: [{
                        data: LD.pipeline.map(function (p) {
                            return p[1];
                        }),
                        backgroundColor: colors,
                        borderColor: '#fff',
                        borderWidth: 3,
                        hoverOffset: 6
                    }]
                },
                options: opt,
                plugins: [centerText]
            });

            document.getElementById('ldPipelineLegend').innerHTML = LD.pipeline.map(function (p, i) {
                var share = totalAbs ? Math.round(p[1] / totalAbs * 100) : 0;
                return '<div class="d-flex align-items-center justify-content-between py-1 border-bottom"><span class="d-flex align-items-center gap-2 small"><span class="badge rounded-circle p-1" style="background:' + colors[i] + '"> </span><span class="fw-semibold text-dark">' + p[0] + '</span> <span class="text-muted">(' + share + '%)</span></span><span class="fw-bold small text-dark">' + fmtInr(p[2]) + '</span></div>';
            }).join('');
        }

        // ===== Top lead sources (horizontal bars) =====
        function buildSources() {
            var opt = baseOptions();
            opt.indexAxis = 'y';
            opt.plugins.legend.display = false;
            opt.plugins.tooltip.callbacks.title = function (items) {
                return items[0].label;
            };
            opt.plugins.tooltip.callbacks.label = function (c) {
                return ' Total lead: ' + c.parsed.x;
            };
            opt.scales = {
                x: {
                    beginAtZero: true,
                    grid: GRID,
                    border: {
                        display: false
                    },
                    ticks: {
                        precision: 0,
                        font: {
                            size: 10
                        }
                    }
                },
                y: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 11,
                            weight: '600'
                        }
                    }
                }
            };
            charts.sources = new Chart(ctxFor('ldSourceChart'), {
                type: 'bar',
                data: {
                    labels: LD.sources.map(function (s) {
                        return s[0];
                    }),
                    datasets: [{
                        data: LD.sources.map(function (s) {
                            return s[1];
                        }),
                        backgroundColor: gradient('rgba(22,163,74,.9)', 'rgba(74,222,128,.75)'),
                        borderRadius: 6,
                        maxBarThickness: 22
                    }]
                },
                options: opt
            });
        }

        // ===== Average sales tabs =====
        function buildAvg(tab) {
            var opt = baseOptions(),
                datasets, title, yTitle;

            if (tab === 'leads') {
                title = 'Leads by staff';
                yTitle = 'Leads';
                datasets = LD.staff.map(function (n, i) {
                    return {
                        label: n,
                        data: LD.avgLeads[i],
                        backgroundColor: STAFF_COLORS[i],
                        borderRadius: 6,
                        maxBarThickness: 26
                    };
                });
            } else if (tab === 'wl') {
                title = 'Won vs lost';
                yTitle = 'Deals';
                datasets = [{
                    label: 'Won',
                    data: LD.avgWon,
                    backgroundColor: C.green,
                    borderRadius: 6,
                    maxBarThickness: 34
                }, {
                    label: 'Lost',
                    data: LD.avgLost,
                    backgroundColor: C.red,
                    borderRadius: 6,
                    maxBarThickness: 34
                }];
            } else {
                title = 'Revenue by staff';
                yTitle = 'Amount';
                datasets = LD.staff.map(function (n, i) {
                    return {
                        label: n,
                        data: LD.avgRevenue[i],
                        backgroundColor: STAFF_COLORS[i],
                        borderRadius: 6,
                        maxBarThickness: 26
                    };
                });
            }
            document.getElementById('ldAvgTitle').textContent = title;

            opt.scales = {
                x: {
                    grid: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Month',
                        font: {
                            size: 10
                        }
                    }
                },
                y: {
                    grid: GRID,
                    border: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: yTitle,
                        font: {
                            size: 10
                        }
                    },
                    ticks: {
                        precision: 0,
                        font: {
                            size: 10
                        }
                    }
                }
            };
            if (tab === 'revenue') {
                opt.scales.y.ticks.callback = shortInr;
                opt.plugins.tooltip.callbacks.label = function (c) {
                    return ' ' + c.dataset.label + ': ' + fmtInr(c.parsed.y);
                };
            }
            charts.avg = new Chart(ctxFor('ldAvgChart'), {
                type: 'bar',
                data: {
                    labels: LD.avgMonths,
                    datasets: datasets
                },
                options: opt
            });
        }

        // ===== Toggle wiring =====
        function bindSeg(id, handler) {
            var seg = document.getElementById(id);
            seg.querySelectorAll('button').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    seg.querySelectorAll('button').forEach(function (b) {
                        b.classList.remove('active');
                    });
                    btn.classList.add('active');
                    handler(btn.dataset.period || btn.dataset.tab);
                });
            });
        }

        // Backend hook: staff filter for the funnel. Define window.ldFunnelStaffChanged(value) to reload data via AJAX.
        var funnelStaff = document.getElementById('ldFunnelStaff');
        if (funnelStaff) {
            funnelStaff.addEventListener('change', function () {
                if (typeof window.ldFunnelStaffChanged === 'function') window.ldFunnelStaffChanged(this.value);
            });
            if (window.jQuery) {
                window.jQuery(funnelStaff).on('change.select2', function () {
                    if (typeof window.ldFunnelStaffChanged === 'function') window.ldFunnelStaffChanged(this.value);
                });
            }
        }

        function init() {
            Chart.defaults.font.family = getComputedStyle(document.body).fontFamily;
            Chart.defaults.color = '#6b7280';
            if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                Chart.defaults.animation = false;
            }
            buildCalls();
            buildPipeline();
            buildProposals('monthly');
            buildFunnel('monthly');
            buildSources();
            buildAvg('revenue');

            bindSeg('ldPropSeg', buildProposals);
            bindSeg('ldFunnelSeg', buildFunnel);
            bindSeg('ldAvgTabs', buildAvg);

            // Staff table search filter (hide & show rows)
            var sumSearch = document.getElementById('ldSumSearch');
            if (sumSearch) {
                sumSearch.addEventListener('input', function () {
                    var query = this.value.toLowerCase().trim();
                    var rows = document.querySelectorAll('#ldSumTable tbody tr');
                    var matched = 0;
                    rows.forEach(function (row) {
                        var staffName = (row.getAttribute('data-staff') || row.textContent).toLowerCase();
                        if (!query || staffName.indexOf(query) > -1) {
                            row.style.display = '';
                            matched++;
                        } else {
                            row.style.display = 'none';
                        }
                    });
                    var emptyEl = document.getElementById('ldSumEmpty');
                    if (emptyEl) {
                        if (matched === 0) {
                            emptyEl.classList.add('show');
                        } else {
                            emptyEl.classList.remove('show');
                        }
                    }
                });
            }

        }

        // ===== Section tabs =====
        var ldTabs = document.querySelectorAll('#ldTabs .ld-tab');
        ldTabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                ldTabs.forEach(function (t) { t.classList.remove('active'); });
                tab.classList.add('active');
                var name = tab.dataset.tab;
                document.querySelectorAll('.lead-dash-page .ld-panel').forEach(function (p) {
                    p.classList.remove('active');
                    p.classList.add('d-none');
                });
                var panel = document.getElementById('ldPanel-' + name);
                if (panel) {
                    panel.classList.remove('d-none');
                    panel.classList.add('active');
                    /* hidden canvases had 0 size — re-measure charts on show */
                    requestAnimationFrame(function () {
                        panel.querySelectorAll('canvas').forEach(function (cv) {
                            var ch = window.Chart && Chart.getChart ? Chart.getChart(cv) : null;
                            if (ch) ch.resize();
                        });
                    });
                }
            });
        });

        // Use the page's Chart.js if v3+ is already loaded, otherwise load v4 from cdnjs
        function loadChart(cb) {
            if (window.Chart && parseInt(Chart.version, 10) >= 3) return cb();
            var s = document.createElement('script');
            s.src = 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js';
            s.onload = cb;
            document.head.appendChild(s);
        }

        document.addEventListener('DOMContentLoaded', function () {
            loadChart(init);
        });
    })();
