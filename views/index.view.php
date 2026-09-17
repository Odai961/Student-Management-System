<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuantumOS // Academy Dashboard</title>

    <!-- Google Fonts for Futuristic High-Tech Look -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --bg-main: #f4f7fc;
            --surface: #ffffff;
            --sidebar-bg: #0f172a;
            --sidebar-text: #94a3b8;
            --primary: #2563eb;
            --primary-glow: rgba(37, 99, 235, 0.15);
            --neon-cyan: #0891b2;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --font-heading: 'Outfit', sans-serif;
            --font-body: 'Plus Jakarta Sans', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: var(--font-body);
        }

        body {
            background-color: var(--bg-main);
            color: var(--text-main);
            min-height: 100vh;
        }

        .dashboard-layout {
            display: grid;
            grid-template-columns: 260px 1fr;
            min-height: 100vh;
        }

        /* --- SIDEBAR --- */
        .sidebar {
            background: var(--sidebar-bg);
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            color: #fff;
        }

        .brand {
            font-family: var(--font-heading);
            font-size: 20px;
            font-weight: 800;
            color: #fff;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand span {
            color: #38bdf8;
        }

        .nav-links {
            list-style: none;
            margin-top: 40px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .nav-links a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 16px;
            color: var(--sidebar-text);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .nav-links a:hover, .nav-links a.active {
            color: #fff;
            background: rgba(255, 255, 255, 0.08);
            border-left: 3px solid #38bdf8;
        }

        .nav-links a i {
            font-size: 16px;
            color: #38bdf8;
        }

        .sidebar-footer {
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        /* --- MAIN CONTENT AREA --- */
        .main-content {
            padding: 40px;
            overflow-y: auto;
        }

        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
        }

        .welcome-box h1 {
            font-family: var(--font-heading);
            font-size: 26px;
            font-weight: 800;
            color: var(--text-main);
            letter-spacing: -0.5px;
            margin-bottom: 4px;
        }

        .welcome-box p {
            color: var(--text-muted);
            font-size: 14px;
        }

        .user-profile-badge {
            display: flex;
            align-items: center;
            gap: 12px;
            background: var(--surface);
            border: 1px solid var(--border-color);
            padding: 8px 16px;
            border-radius: 50px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.02);
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--neon-cyan));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 13px;
        }

        /* --- STATS GRID --- */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }

        .stat-card {
            background: var(--surface);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.03);
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 30px -5px rgba(37, 99, 235, 0.08);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--primary);
        }

        .stat-card:nth-child(2)::before { background: #0891b2; }
        .stat-card:nth-child(3)::before { background: #7c3aed; }
        .stat-card:nth-child(4)::before { background: #059669; }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .stat-title {
            color: var(--text-muted);
            font-size: 12px;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .stat-icon {
            font-size: 16px;
            color: var(--primary);
        }

        .stat-value {
            font-family: var(--font-heading);
            font-size: 28px;
            font-weight: 800;
            color: var(--text-main);
        }

        /* --- DASHBOARD GRIDS --- */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 25px;
        }

        .panel {
            background: var(--surface);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.03);
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .panel-title {
            font-family: var(--font-heading);
            font-size: 16px;
            font-weight: 700;
            color: var(--text-main);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .panel-title i {
            color: var(--primary);
        }

        /* --- TABLES --- */
        .cyber-table {
            width: 100%;
            border-collapse: collapse;
        }

        .cyber-table th {
            text-align: left;
            color: var(--text-muted);
            font-size: 11px;
            text-transform: uppercase;
            font-weight: 700;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--border-color);
            letter-spacing: 0.5px;
        }

        .cyber-table td {
            padding: 14px 0;
            font-size: 14px;
            border-bottom: 1px solid var(--border-color);
            color: #334155;
        }

        .cyber-table tr:last-child td {
            border-bottom: none;
        }

        .status-pill {
            display: inline-block;
            padding: 4px 10px;
            font-size: 11px;
            font-weight: 600;
            border-radius: 20px;
            background: rgba(16, 185, 129, 0.1);
            color: #059669;
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        /* --- QUICK ACTIONS LIST --- */
        .quick-actions-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .action-card-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f8fafc;
            border: 1px solid var(--border-color);
            padding: 14px 16px;
            border-radius: 10px;
            text-decoration: none;
            color: var(--text-main);
            transition: all 0.2s ease;
        }

        .action-card-item:hover {
            background: #eff6ff;
            border-color: rgba(37, 99, 235, 0.3);
            transform: translateX(4px);
        }

        .action-info span {
            display: block;
            font-size: 13px;
            font-weight: 700;
        }

        .action-info small {
            color: var(--text-muted);
            font-size: 11px;
        }

        .action-card-item i {
            color: var(--primary);
            font-size: 14px;
        }

        /* --- RESPONSIVE --- */
        @media (max-width: 1024px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
            .dashboard-layout {
                grid-template-columns: 1fr;
            }
            .sidebar {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="dashboard-layout">

    <!-- SIDEBAR NAVIGATION -->
    <aside class="sidebar">
        <div>
            <div class="brand">
                <i class="fa-solid fa-cube"></i> QUANTUM<span>OS</span>
            </div>
            <ul class="nav-links">
                <li><a href="#" class="active"><i class="fa-solid fa-chart-pie"></i> Dashboard</a></li>
                <li><a href="/students"><i class="fa-solid fa-user-graduate"></i> Students</a></li>
                <li><a href="/courses"><i class="fa-solid fa-book-bookmark"></i> Courses</a></li>
                <li><a href="/instructors"><i class="fa-solid fa-chalkboard-user"></i> Instructors</a></li>
                <li><a href="/enrollments"><i class="fa-solid fa-file-signature"></i> Enrollments</a></li>
            </ul>
        </div>
        <div class="sidebar-footer">
            <a href="/profile" class="nav-links" style="margin: 0; padding: 0;"><i class="fa-solid fa-id-badge"></i> Student Profile</a>
        </div>
    </aside>

    <!-- MAIN BODY -->
    <main class="main-content">

        <!-- TOP HEADER -->
        <div class="top-header">
            <div class="welcome-box">
                <h1>COMMAND CENTER</h1>
                <p>Welcome back, Administrator. System telemetry is stable.</p>
            </div>
            <div class="user-profile-badge">
                <div class="user-avatar">AD</div>
                <div style="font-size: 13px;">
                    <div style="font-weight: 700;">System Admin</div>
                    <div style="color: #059669; font-size: 11px;">● Online Node</div>
                </div>
            </div>
        </div>

        <!-- STATS OVERVIEW -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-title">Total Students</span>
                    <i class="fa-solid fa-users stat-icon"></i>
                </div>
                <div class="stat-value">1,428</div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-title">Active Courses</span>
                    <i class="fa-solid fa-graduation-cap stat-icon"></i>
                </div>
                <div class="stat-value">64</div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-title">Instructors</span>
                    <i class="fa-solid fa-chalkboard stat-icon"></i>
                </div>
                <div class="stat-value">32</div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-title">Enrollments</span>
                    <i class="fa-solid fa-network-wired stat-icon"></i>
                </div>
                <div class="stat-value">3,892</div>
            </div>
        </div>

        <!-- DASHBOARD PANELS -->
        <div class="dashboard-grid">

            <!-- RECENT STUDENTS PANEL -->
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">
                        <i class="fa-solid fa-user-clock"></i> Recent Student Registrations
                    </div>
                    <a href="/students" style="color: var(--primary); font-size: 12px; text-decoration: none; font-weight: 700;">View All &rarr;</a>
                </div>

                <table class="cyber-table">
                    <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Email Node</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><strong>Alex Mercer</strong></td>
                        <td style="color: var(--text-muted);">alex.m@quantum.edu</td>
                        <td><span class="status-pill">Active</span></td>
                    </tr>
                    <tr>
                        <td><strong>Elena Vance</strong></td>
                        <td style="color: var(--text-muted);">elena.v@quantum.edu</td>
                        <td><span class="status-pill">Active</span></td>
                    </tr>
                    <tr>
                        <td><strong>Marcus Wright</strong></td>
                        <td style="color: var(--text-muted);">marcus.w@quantum.edu</td>
                        <td><span class="status-pill">Active</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <!-- QUICK MODULE ACCESS -->
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">
                        <i class="fa-solid fa-bolt"></i> System Modules
                    </div>
                </div>

                <div class="quick-actions-list">
                    <a href="/students/create" class="action-card-item">
                        <div class="action-info">
                            <span>Register New Student</span>
                            <small>Add entity to database</small>
                        </div>
                        <i class="fa-solid fa-user-plus"></i>
                    </a>

                    <a href="/courses/create" class="action-card-item">
                        <div class="action-info">
                            <span>Initialize Course</span>
                            <small>Create educational curriculum</small>
                        </div>
                        <i class="fa-solid fa-book-medical"></i>
                    </a>

                    <a href="/instructors" class="action-card-item">
                        <div class="action-info">
                            <span>Manage Instructors</span>
                            <small>Faculty oversight interface</small>
                        </div>
                        <i class="fa-solid fa-id-card"></i>
                    </a>

                    <a href="/profile" class="action-card-item">
                        <div class="action-info">
                            <span>Student Profile Hub</span>
                            <small>View telemetry & records</small>
                        </div>
                        <i class="fa-solid fa-shield-halved"></i>
                    </a>
                </div>
            </div>

        </div>

    </main>

</div>

</body>
</html>