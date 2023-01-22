<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Starter</li>
            {{-- <li class="nav-item dropdown {{ $type_menu === 'layout' ? 'active' : '' }}"> --}}
            <li class="nav-item dropdown {{ Request::is('pinjam') ? 'active' : '' }}">
                <a href="/pinjam" class="nav-link"><i class="fas fa-columns"></i>
                    <span>Layout</span></a>

            </li>
            <li class="nav-item dropdown {{ Request::is('buku') ? 'active' : '' }}">
                <a href="/buku" class="nav-link"><i class="fas fa-columns"></i>
                    <span>Buku</span></a>

            </li>
            <li class="nav-item dropdown {{ Request::is('anggota') ? 'active' : '' }}">
                <a href="/anggota" class="nav-link"><i class="fas fa-columns"></i>
                    <span>Anggota</span></a>

            </li>
            <li class="nav-item dropdown {{ Request::is('batas') ? 'active' : '' }}">
                <a href="/batas" class="nav-link"><i class="fas fa-columns"></i>
                    <span>Batas</span></a>

            </li>

        </ul>

        <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
