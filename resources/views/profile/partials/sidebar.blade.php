<aside class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('dashboard') }}" class="sidebar-brand">
            <i class="bi bi-triangle-fill"></i>
            <span>AdminPanel</span>
        </a>
    </div>

    <div class="sidebar-section">
        <ul class="sidebar-nav">
            <li class="sidebar-nav-item">
                <a href="{{ route('dashboard') }}" class="sidebar-nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid"></i>
                    <span>Overview</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('analytics') }}" class="sidebar-nav-link {{ request()->routeIs('analytics') ? 'active' : '' }}">
                    <i class="bi bi-journal-text"></i>
                    <span>Analytics</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="sidebar-section">
        <div class="sidebar-section-title">Compute</div>
        <ul class="sidebar-nav">
            <li class="sidebar-nav-item">
                <a href="{{ route('functions') }}" class="sidebar-nav-link {{ request()->routeIs('functions') ? 'active' : '' }}">
                    <i class="bi bi-lightning"></i>
                    <span>Functions</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('edge-functions') }}" class="sidebar-nav-link {{ request()->routeIs('edge-functions') ? 'active' : '' }}">
                    <i class="bi bi-code-square"></i>
                    <span>Edge Functions</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('external-apis') }}" class="sidebar-nav-link {{ request()->routeIs('external-apis') ? 'active' : '' }}">
                    <i class="bi bi-diagram-3"></i>
                    <span>External APIs</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('middleware') }}" class="sidebar-nav-link {{ request()->routeIs('middleware') ? 'active' : '' }}">
                    <i class="bi bi-layers"></i>
                    <span>Middleware</span>
                    <span class="badge-internal">Internal</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
