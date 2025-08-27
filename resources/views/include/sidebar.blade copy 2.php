<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="{{ route('dashboard') }}">
            <div class="logo-img">
                <img height="40" width="130px" src="{{ asset('assets/images/logos-headers.png') }}"
                    class="header-brand-img" title="SAJIDA FOUNDATION">
            </div>
        </a>
        <div class="sidebar-action"><i class="ik ik-arrow-left-circle"></i></div>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    @php
        $segment1 = request()->segment(1);
        $segment2 = request()->segment(2);
    @endphp

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div
                    class="nav-item {{ $segment1 == 'users' || $segment1 == 'roles' || $segment1 == 'permission' || $segment1 == 'user' ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-user"></i><span>{{ __('Administrator') }}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        @can('manage_user')
                            <a href="{{ url('users') }}"
                                class="menu-item {{ $segment1 == 'users' ? 'active' : '' }}">{{ __('Users') }}</a>
                            <a href="{{ url('user/create') }}"
                                class="menu-item {{ $segment1 == 'user' && $segment2 == 'create' ? 'active' : '' }}">{{ __('Add User') }}</a>
                        @endcan
                        <!-- only those have manage_role permission will get access -->
                        @can('manage_roles')
                            <a href="{{ url('roles') }}"
                                class="menu-item {{ $segment1 == 'roles' ? 'active' : '' }}">{{ __('Roles') }}</a>
                        @endcan
                        <!-- only those have manage_permission permission will get access -->
                        @can('manage_permission')
                            <a href="{{ url('permission') }}"
                                class="menu-item {{ $segment1 == 'permission' ? 'active' : '' }}">{{ __('Permission') }}</a>
                        @endcan
                    </div>
                </div>

                <div
                    class="nav-item {{ \Request::is('top-banner') || \Request::is('top-banner/*') || \Request::is('top-slider') || \Request::is('top-slider/*') || \Request::is('middle-banner') || \Request::is('middle-banner/*') || \Request::is('middle-banner-content') || \Request::is('middle-banner-content/*') || \Request::is('bottom-banner') || \Request::is('bottom-banner/*') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="fa fa-image"></i><span>{{ __('Banners / Sliders') }}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        @canany(['access_to_users'])
                            <a href="{{ url('top-banner') }}"
                                class="menu-item {{ \Request::is('top-banner') || \Request::is('top-banner/*') ? 'active' : '' }}">{{ __('Top Banner') }}</a>
                            <a href="{{ url('top-slider') }}"
                                class="menu-item {{ \Request::is('top-slider') || \Request::is('top-slider/*') ? 'active' : '' }}">{{ __('Top Slider') }}</a>
                            <a href="{{ url('middle-banner') }}"
                                class="menu-item {{ \Request::is('middle-banner') || \Request::is('middle-banner/*') ? 'active' : '' }}">{{ __('Middle Banner') }}</a>
                            <a href="{{ url('middle-banner-content') }}"
                                class="menu-item {{ \Request::is('middle-banner-content') || \Request::is('middle-banner-content/*') ? 'active' : '' }}">{{ __('Middle Banner Content') }}</a>
                            <a href="{{ url('bottom-banner') }}"
                                class="menu-item {{ \Request::is('bottom-banner') || \Request::is('bottom-banner/*') ? 'active' : '' }}">{{ __('Bottom Banner') }}</a>
                        @endcan
                    </div>
                </div>
                <div
                    class="nav-item {{ \Request::is('approach') || \Request::is('approach/*') || \Request::is('approach-item/*') || \Request::is('approach-item') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="fa fa-tasks"></i><span>{{ __('Approch') }}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        @canany(['access_to_users'])
                            <a href="{{ url('approach') }}"
                                class="menu-item {{ \Request::is('approach') || \Request::is('approach/*') ? 'active' : '' }}">{{ __('Approch') }}</a>
                            <a href="{{ url('approach-item') }}"
                                class="menu-item {{ \Request::is('approach-item') || \Request::is('approach-item/*') ? 'active' : '' }}">{{ __('Approach Item') }}</a>
                        @endcan
                    </div>
                </div>
                <div
                    class="nav-item {{ \Request::is('member-designation') || \Request::is('member-designation/*') || \Request::is('member-category') || \Request::is('member-category/*') || \Request::is('members') || \Request::is('members/*') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="fa fa-users"></i><span>{{ __('Member') }}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        @canany(['access_to_users'])
                            <a href="{{ url('member-designation') }}"
                                class="menu-item {{ \Request::is('member-designation') || \Request::is('member-designation/*') ? 'active' : '' }}">{{ __('Member Designation') }}</a>
                            <a href="{{ url('member-category') }}"
                                class="menu-item {{ \Request::is('member-category') || \Request::is('member-category/*') ? 'active' : '' }}">{{ __('Member Category') }}</a>
                            <a href="{{ url('members') }}"
                                class="menu-item {{ \Request::is('members') || \Request::is('members/*') ? 'active' : '' }}">{{ __('Members') }}</a>
                        @endcan
                    </div>
                </div>
                <div
                    class="nav-item {{ \Request::is('about-us') || \Request::is('about-us/*') || \Request::is('patron') || \Request::is('patron/*') || \Request::is('about-us-content') || \Request::is('about-us-content/*') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="fa fa-info-circle"></i><span>{{ __('About Us') }}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        @canany(['access_to_users'])
                            <a href="{{ url('about-us') }}"
                                class="menu-item {{ \Request::is('about-us') || \Request::is('about-us/*') ? 'active' : '' }}">{{ __('About Us') }}</a>
                            <a href="{{ url('patron') }}"
                                class="menu-item {{ \Request::is('patron') || \Request::is('patron/*') ? 'active' : '' }}">{{ __('Patron') }}</a>
                            <a href="{{ url('about-us-content') }}"
                                class="menu-item {{ \Request::is('about-us-content') || \Request::is('about-us-content/*') ? 'active' : '' }}">{{ __('About Us Contents') }}</a>
                        @endcan
                    </div>
                </div>
                <div
                    class="nav-item {{ \Request::is('news-category') || \Request::is('news-category/*') || \Request::is('news-banner') || \Request::is('news-banner/*') || \Request::is('news') || \Request::is('news/*') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="fas fa-globe"></i><span>{{ __(' News') }}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        @canany(['access_to_users'])
                            <a href="{{ url('news-category') }}"
                                class="menu-item {{ \Request::is('news-category') || \Request::is('news-category/*') ? 'active' : '' }}">{{ __('News Category') }}</a>
                            <a href="{{ url('news-banner') }}"
                                class="menu-item {{ \Request::is('news-banner') || \Request::is('news-banner/*') ? 'active' : '' }}">{{ __("News Page's Banner") }}</a>
                            <a href="{{ url('news') }}"
                                class="menu-item {{ \Request::is('news') || \Request::is('news/*') ? 'active' : '' }}">{{ __('News') }}</a>
                        @endcan
                    </div>
                </div>
                <div
                    class="nav-item {{ \Request::is('news-category') || \Request::is('news-category/*') || \Request::is('news-banner') || \Request::is('news-banner/*') || \Request::is('news') || \Request::is('news/*') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="fas fa-hand-holding-heart"></i><span>{{ __(' Donate') }}</span></a>
                    <div class="submenu-content">
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
