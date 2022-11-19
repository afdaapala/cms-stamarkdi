<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
               <img src="{{ asset('assets/img/logo-bmkg.png') }}" width="36" height="36" alt="" srcset="">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">BMKG</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="{{ url('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('categories') ? 'active' : '' }}">
            <a href="{{ url('categories') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bx-category'></i>
                <div data-i18n="Analytics">Category</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('tags') ? 'active' : '' }}">
            <a href="{{ url('tags') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bx-tag'></i>
                <div data-i18n="Analytics">Tags</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('posts') ? 'active' : '' }}">
            <a href="{{ url('posts') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bx-paper-plane'></i>
                <div data-i18n="Analytics">Posts</div>
            </a>
        </li>


    </ul>
</aside>
