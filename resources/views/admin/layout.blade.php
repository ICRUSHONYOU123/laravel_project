<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <title>Admin Sidebar</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #2d2b2b;
            color: #fff;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            width: 260px;
            background: #000;
            padding: 20px 0;
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.5);
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar-header {
            padding: 0 20px 30px;
            border-bottom: 1px solid #333;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 20px;
            flex-shrink: 0;
        }

        .logo-text {
            font-size: 20px;
            font-weight: 600;
            white-space: nowrap;
            opacity: 1;
            transition: opacity 0.3s ease;
        }

        .sidebar.collapsed .logo-text {
            opacity: 0;
            width: 0;
        }

        .toggle-btn {
            background: #222;
            border: none;
            color: #fff;
            width: 32px;
            height: 32px;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .toggle-btn:hover {
            background: #333;
        }

        .sidebar.collapsed .toggle-btn {
            transform: rotate(180deg);
        }

        .menu {
            list-style: none;
            padding: 20px 0;
        }

        .menu-item {
            margin: 5px 0;
        }

        .menu-link {
            display: flex;
            align-items: center;
            padding: 14px 20px;
            color: #aaa;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            gap: 16px;
        }

        .menu-link:hover {
            background: #1a1a1a;
            color: #fff;
        }

        .menu-link.active {
            background: #1a1a1a;
            color: #fff;
            border-left: 3px solid #667eea;
        }

        .menu-icon {
            width: 24px;
            height: 24px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .menu-text {
            white-space: nowrap;
            opacity: 1;
            transition: opacity 0.3s ease;
        }

        .sidebar.collapsed .menu-text {
            opacity: 0;
            width: 0;
        }

        .sidebar.collapsed .menu-link {
            justify-content: center;
            padding: 14px 0;
        }

        /* Main content area */
        .main-content {
            margin-left: 260px;
            padding: 40px;
            transition: margin-left 0.3s ease;
        }

        .sidebar.collapsed~.main-content {
            margin-left: 80px;
        }

        .content-header {
            margin-bottom: 30px;
        }

        .content-header h1 {
            font-size: 32px;
            margin-bottom: 8px;
        }

        .content-header p {
            color: #888;
        }

        /* Tooltip for collapsed state */
        .menu-link::after {
            content: attr(data-tooltip);
            position: absolute;
            left: 100%;
            top: 50%;
            transform: translateY(-50%);
            background: #333;
            color: #fff;
            padding: 8px 12px;
            border-radius: 6px;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
            margin-left: 10px;
            font-size: 14px;
        }

        .sidebar.collapsed .menu-link:hover::after {
            opacity: 1;
        }
    </style>
</head>

<body>
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="logo">
                <div class="logo-icon">A</div>
                <span class="logo-text text-white">Admin</span>
            </div>
            <button class="toggle-btn" id="toggleBtn"><span>◀</span></button>
        </div>

        <ul class="menu">
            <li class="menu-item">
                <a href="{{ route('dashboard') }}"
                    class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" data-tooltip="Dashboard">
                    <span class="menu-icon">📊</span>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('view.admins') }}"
                    class="menu-link {{ request()->routeIs('view.admins') ? 'active' : '' }}" data-tooltip="Admins">
                    <span class="menu-icon">👤</span>
                    <span class="menu-text">View Admins</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('view.clients') }}"
                    class="menu-link {{ request()->routeIs('view.clients') ? 'active' : '' }}" data-tooltip="Clients">
                    <span class="menu-icon">👥</span>
                    <span class="menu-text">View Users</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('active.keys') }}"
                    class="menu-link {{ request()->routeIs('active.keys') ? 'active' : '' }}" data-tooltip="Keys">
                    <span class="menu-icon">🔓</span>
                    <span class="menu-text">Active Keys</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('license.Method') }}"
                    class="menu-link {{ request()->routeIs('generate.key') ? 'active' : '' }}" data-tooltip="Keys">
                    <span class="menu-icon">🗝️</span>
                    <span class="menu-text">Generate Keys</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ url('/') }}" class="menu-link {{ request()->is('/') ? 'active' : '' }}"
                    data-tooltip="Go to Website">
                    <span class="menu-icon">🗝️</span>
                    <span class="menu-text">Go Website</span>
                </a>
            </li>
            <li class="menu-item mt-5">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </aside>
    <!-- 🧩 This is where each page’s content will load -->
    <main class="main-content">
        @yield('content')
    </main>

    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggleBtn');
        toggleBtn.addEventListener('click', () => sidebar.classList.toggle('collapsed'));
    </script>
</body>

</html>
