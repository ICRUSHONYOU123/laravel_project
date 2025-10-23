@extends('admin.layout')

@section('content')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Admin Dashboard</title>
    <style>
        :root {
            --bg-primary: #0a0a0a;
            --bg-secondary: #1a1a1a;
            --bg-tertiary: #2a2a2a;
            --text-primary: #ffffff;
            --text-secondary: #a0a0a0;
            --accent-primary: #6366f1;
            --accent-secondary: #8b5cf6;
            --border-color: #333333;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: var(--bg-primary);
            color: var(--text-primary);
            overflow-x: hidden;
        }
        /* Main Content */
        .main-content {
            margin-left: 260px;
            padding: 2rem;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }

        .content-header {
            margin-bottom: 2rem;
        }

        .content-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .content-subtitle {
            color: var(--text-secondary);
            font-size: 0.95rem;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background-color: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 1.5rem;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(99, 102, 241, 0.15);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .stat-icon.primary {
            background-color: rgba(99, 102, 241, 0.15);
            color: var(--accent-primary);
        }

        .stat-icon.success {
            background-color: rgba(16, 185, 129, 0.15);
            color: var(--success);
        }

        .stat-icon.warning {
            background-color: rgba(245, 158, 11, 0.15);
            color: var(--warning);
        }

        .stat-icon.danger {
            background-color: rgba(239, 68, 68, 0.15);
            color: var(--danger);
        }

        .stat-change {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            font-size: 0.875rem;
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
        }

        .stat-change.positive {
            background-color: rgba(16, 185, 129, 0.15);
            color: var(--success);
        }

        .stat-change.negative {
            background-color: rgba(239, 68, 68, 0.15);
            color: var(--danger);
        }

        .stat-label {
            color: var(--text-secondary);
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        /* Chart Card */
        .chart-card {
            background-color: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .chart-title {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .chart-filters {
            display: flex;
            gap: 0.5rem;
        }

        .filter-btn {
            padding: 0.5rem 1rem;
            background-color: var(--bg-tertiary);
            border: 1px solid var(--border-color);
            border-radius: 6px;
            color: var(--text-secondary);
            cursor: pointer;
            transition: all 0.2s;
            font-size: 0.875rem;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background-color: var(--accent-primary);
            color: white;
            border-color: var(--accent-primary);
        }

        .chart-container {
            height: 300px;
            position: relative;
        }

        /* Table Styles */
        .table-card {
            background-color: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 1.5rem;
            overflow: hidden;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .table-title {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            background-color: var(--bg-tertiary);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 0.5rem 1rem 0.5rem 2.5rem;
            color: var(--text-primary);
            width: 250px;
        }

        .search-box input:focus {
            outline: none;
            border-color: var(--accent-primary);
        }

        .search-box i {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
        }

        .custom-table thead {
            border-bottom: 1px solid var(--border-color);
        }

        .custom-table th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: var(--text-secondary);
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .custom-table td {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
        }

        .custom-table tbody tr {
            transition: background-color 0.2s;
        }

        .custom-table tbody tr:hover {
            background-color: var(--bg-tertiary);
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.375rem 0.75rem;
            border-radius: 6px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .status-badge.active {
            background-color: rgba(16, 185, 129, 0.15);
            color: var(--success);
        }

        .status-badge.pending {
            background-color: rgba(245, 158, 11, 0.15);
            color: var(--warning);
        }

        .status-badge.inactive {
            background-color: rgba(239, 68, 68, 0.15);
            color: var(--danger);
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background-color: currentColor;
        }

        .action-btn {
            background: none;
            border: none;
            color: var(--text-secondary);
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 6px;
            transition: all 0.2s;
        }

        .action-btn:hover {
            background-color: var(--bg-tertiary);
            color: var(--text-primary);
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-toggle {
                display: block;
                position: fixed;
                top: 1rem;
                left: 1rem;
                z-index: 999;
                background-color: var(--bg-secondary);
                border: 1px solid var(--border-color);
                border-radius: 8px;
                padding: 0.75rem;
                color: var(--text-primary);
                cursor: pointer;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .search-box input {
                width: 100%;
            }

            .chart-filters {
                flex-wrap: wrap;
            }
        }

        @media (min-width: 769px) {
            .mobile-toggle {
                display: none;
            }
        }

        /* Canvas for Chart */
        canvas {
            max-width: 100%;
        }
    </style>
</head>
<body>
        <div class="content-header">
            <h1 class="content-title">Dashboard Overview</h1>
            <p class="content-subtitle">Welcome back! Here's what's happening with your platform today.</p>
        </div>
         Stats Grid
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon primary">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="stat-change positive">
                        <i class="bi bi-arrow-up"></i>
                        <span>12.5%</span>
                    </div>
                </div>
                <div class="stat-label">Total Users</div>
                <div class="stat-value">24,583</div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon success">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>
                    <div class="stat-change positive">
                        <i class="bi bi-arrow-up"></i>
                        <span>8.2%</span>
                    </div>
                </div>
                <div class="stat-label">Revenue</div>
                <div class="stat-value">$89,432</div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon warning">
                        <i class="bi bi-key-fill"></i>
                    </div>
                    <div class="stat-change positive">
                        <i class="bi bi-arrow-up"></i>
                        <span>5.7%</span>
                    </div>
                </div>
                <div class="stat-label">Active Keys</div>
                <div class="stat-value">1,247</div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon danger">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                    </div>
                    <div class="stat-change negative">
                        <i class="bi bi-arrow-down"></i>
                        <span>2.3%</span>
                    </div>
                </div>
                <div class="stat-label">Issues</div>
                <div class="stat-value">23</div>
            </div>
        </div>

         Chart Card
        <div class="chart-card">
            <div class="chart-header">
                <h2 class="chart-title">Analytics Overview</h2>
                <div class="chart-filters">
                    <button class="filter-btn" onclick="updateChart('7d', this)">7D</button>
                    <button class="filter-btn active" onclick="updateChart('30d', this)">30D</button>
                    <button class="filter-btn" onclick="updateChart('90d', this)">90D</button>
                    <button class="filter-btn" onclick="updateChart('1y', this)">1Y</button>
                </div>
            </div>
            <div class="chart-container">
                <canvas id="analyticsChart"></canvas>
            </div>
        </div>

         Recent Activity Table
        <div class="table-card">
            <div class="table-header">
                <h2 class="table-title">Recent Activity</h2>
                <div class="search-box">
                    <i class="bi bi-search"></i>
                    <input type="text" placeholder="Search..." onkeyup="filterTable(this.value)">
                </div>
            </div>
            <div class="table-responsive">
                <table class="custom-table" id="activityTable">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Action</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div style="width: 32px; height: 32px; border-radius: 50%; background: linear-gradient(135deg, #6366f1, #8b5cf6); display: flex; align-items: center; justify-content: center; font-weight: 600;">JD</div>
                                    <span>John Doe</span>
                                </div>
                            </td>
                            <td>Created new license key</td>
                            <td>
                                <span class="status-badge active">
                                    <span class="status-dot"></span>
                                    Active
                                </span>
                            </td>
                            <td>2 hours ago</td>
                            <td>
                                <button class="action-btn" title="View">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="action-btn" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="action-btn" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div style="width: 32px; height: 32px; border-radius: 50%; background: linear-gradient(135deg, #10b981, #059669); display: flex; align-items: center; justify-content: center; font-weight: 600;">SM</div>
                                    <span>Sarah Miller</span>
                                </div>
                            </td>
                            <td>Updated user permissions</td>
                            <td>
                                <span class="status-badge active">
                                    <span class="status-dot"></span>
                                    Active
                                </span>
                            </td>
                            <td>5 hours ago</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div style="width: 32px; height: 32px; border-radius: 50%; background: linear-gradient(135deg, #f59e0b, #d97706); display: flex; align-items: center; justify-content: center; font-weight: 600;">MJ</div>
                                    <span>Mike Johnson</span>
                                </div>
                            </td>
                            <td>Pending verification</td>
                            <td>
                                <span class="status-badge pending">
                                    <span class="status-dot"></span>
                                    Pending
                                </span>
                            </td>
                            <td>1 day ago</td>
                            <td>
                                <button class="action-btn" title="View">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="action-btn" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="action-btn" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div style="width: 32px; height: 32px; border-radius: 50%; background: linear-gradient(135deg, #ef4444, #dc2626); display: flex; align-items: center; justify-content: center; font-weight: 600;">EB</div>
                                    <span>Emily Brown</span>
                                </div>
                            </td>
                            <td>Deleted expired keys</td>
                            <td>
                                <span class="status-badge inactive">
                                    <span class="status-dot"></span>
                                    Inactive
                                </span>
                            </td>
                            <td>2 days ago</td>
                            <td>
                                <button class="action-btn" title="View">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="action-btn" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="action-btn" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div style="width: 32px; height: 32px; border-radius: 50%; background: linear-gradient(135deg, #8b5cf6, #7c3aed); display: flex; align-items: center; justify-content: center; font-weight: 600;">DW</div>
                                    <span>David Wilson</span>
                                </div>
                            </td>
                            <td>Added new admin user</td>
                            <td>
                                <span class="status-badge active">
                                    <span class="status-dot"></span>
                                    Active
                                </span>
                            </td>
                            <td>3 days ago</td>
                            <td>
                                <button class="action-btn" title="View">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="action-btn" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="action-btn" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        // Initialize Chart
        const ctx = document.getElementById('analyticsChart').getContext('2d');
        let analyticsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Users',
                    data: [1200, 1900, 1500, 2100, 2400, 2200, 2800, 3100, 2900, 3400, 3800, 4200],
                    borderColor: '#6366f1',
                    backgroundColor: 'rgba(99, 102, 241, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }, {
                    label: 'Revenue',
                    data: [800, 1200, 1000, 1600, 1800, 1500, 2100, 2400, 2200, 2700, 3000, 3300],
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            color: '#a0a0a0',
                            usePointStyle: true,
                            padding: 20
                        }
                    },
                    tooltip: {
                        backgroundColor: '#1a1a1a',
                        titleColor: '#ffffff',
                        bodyColor: '#a0a0a0',
                        borderColor: '#333333',
                        borderWidth: 1,
                        padding: 12,
                        displayColors: true,
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.y !== null) {
                                    label += context.datasetIndex === 1 ? '$' + context.parsed.y.toLocaleString() : context.parsed.y.toLocaleString();
                                }
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#333333',
                            drawBorder: false
                        },
                        ticks: {
                            color: '#a0a0a0'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#a0a0a0'
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            }
        });

        // Toggle Sidebar
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
        }

        // Set Active Nav Link
        function setActive(event) {
            event.preventDefault();
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });
            event.currentTarget.classList.add('active');
        }

        // Update Chart
        function updateChart(period, button) {
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            button.classList.add('active');

            // Simulate data update based on period
            const dataMap = {
                '7d': {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    users: [320, 450, 380, 520, 480, 610, 590],
                    revenue: [240, 350, 290, 410, 380, 490, 470]
                },
                '30d': {
                    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                    users: [1800, 2200, 2400, 2800],
                    revenue: [1400, 1700, 1900, 2200]
                },
                '90d': {
                    labels: ['Month 1', 'Month 2', 'Month 3'],
                    users: [6500, 7800, 8900],
                    revenue: [5200, 6100, 7000]
                },
                '1y': {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    users: [1200, 1900, 1500, 2100, 2400, 2200, 2800, 3100, 2900, 3400, 3800, 4200],
                    revenue: [800, 1200, 1000, 1600, 1800, 1500, 2100, 2400, 2200, 2700, 3000, 3300]
                }
            };

            const data = dataMap[period];
            analyticsChart.data.labels = data.labels;
            analyticsChart.data.datasets[0].data = data.users;
            analyticsChart.data.datasets[1].data = data.revenue;
            analyticsChart.update();
        }

        // Filter Table
        function filterTable(searchTerm) {
            const table = document.getElementById('activityTable');
            const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const text = row.textContent.toLowerCase();

                if (text.includes(searchTerm.toLowerCase())) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const mobileToggle = document.querySelector('.mobile-toggle');

            if (window.innerWidth <= 768 &&
                sidebar.classList.contains('active') &&
                !sidebar.contains(event.target) &&
                !mobileToggle.contains(event.target)) {
                sidebar.classList.remove('active');
            }
        });
    </script>
</body>
</html>
@endsection
