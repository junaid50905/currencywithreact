<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('exchange_rate') }}">
                <i class="menu-icon mdi mdi-swap-horizontal"></i>
                <span class="menu-title">Exchange Rates</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('profit') }}">
                <i class="menu-icon mdi mdi-swap-horizontal"></i>
                <span class="menu-title">Profit</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('content') }}">
                <i class="menu-icon mdi mdi-play-box-outline"></i>
                <span class="menu-title">Contents</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users') }}">
                <i class="menu-icon mdi mdi-account-group"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>
    </ul>
</nav>
