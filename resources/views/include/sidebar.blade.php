<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="{{ route('dashboard') }}">
            <div class="logo-img">
                <img height="40" width="130px" src="{{ asset('assets/img/blue-logo.png') }}" class="header-brand-img"
                    title="SAJIDA FOUNDATION">
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
                    class="nav-item {{ (\Request::is('home-page') || \Request::is('home-page/*') || \Request::is('about-us-page') || \Request::is('about-us-page/*') || \Request::is('news-page') || \Request::is('news-page/*')) && !(\Request::is('home-page/approach-item') || \Request::is('home-page/approach-item/*') || \Request::is('home-page/members') || \Request::is('home-page/members/*')) ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="fa fa-image"></i><span>{{ __('Pages') }}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        @canany(['access_to_users'])
                            <a href="{{ url('home-page/') }}"
                                class="menu-item {{ \Request::is('home-page') || \Request::is('home-page/*') ? 'active' : '' }}">{{ __('Home Page') }}</a>
                            <a href="{{ url('about-us-page') }}"
                                class="menu-item {{ \Request::is('about-us-page') || \Request::is('about-us-page/*') ? 'active' : '' }}">{{ __('About Us') }}</a>
                            <a href="{{ url('news-page') }}"
                                class="menu-item {{ \Request::is('news-page') || \Request::is('news-page/*') ? 'active' : '' }}">{{ __('News') }}</a>
                                {{-- contact page --}}


                        @endcan
                    </div>
                </div>
                <div
                    class="nav-item {{ \Request::is('member-designation') || \Request::is('member-designation/*') || \Request::is('member-category') || \Request::is('member-category/*') || \Request::is('home-page/members') || \Request::is('home-page/members/*') || \Request::is('member/category/create') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="fa fa-users"></i><span>{{ __('Leadership') }}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        @canany(['access_to_users'])
                            <a href="{{ url('member-designation') }}"
                                class="menu-item {{ \Request::is('member-designation') || \Request::is('member-designation/*') ? 'active' : '' }}">{{ __('Leadership Designation') }}</a>
                            <a href="{{ url('member-category') }}"
                                class="menu-item {{ \Request::is('member-category') || \Request::is('member-category/*') || \Request::is('member/category/create') ? 'active' : '' }}">{{ __('Leadership Category') }}</a>
                            <a href="{{ url('home-page/members') }}"
                                class="menu-item {{ \Request::is('home-page/members') || \Request::is('home-page/members/*') ? 'active' : '' }}">{{ __('Leaders') }}</a>
                        @endcan
                    </div>
                </div>
                <div
                    class="nav-item {{ \Request::is('job/banner/*') || \Request::is('job/profession') || \Request::is('job/profession/*') || \Request::is('job/team') || \Request::is('job/team/*') || \Request::is('job/location') || \Request::is('job/location/*') || \Request::is('job/circular') || \Request::is('job/circular/*') || \Request::is('job/job-applications') || \Request::is('job/job-applications/*') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="fa fa-info-circle"></i><span>{{ __('Job / Career') }}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        @canany(['access_to_users'])
                            <a href="{{ url('job/banner/create') }}"
                                class="menu-item {{ \Request::is('job/banner') || \Request::is('job/banner/*') ? 'active' : '' }}">{{ __('Job Page Banner') }}</a>
                            <a href="{{ url('job/profession') }}"
                                class="menu-item {{ \Request::is('job/profession') || \Request::is('job/profession/*') ? 'active' : '' }}">{{ __('Profession') }}</a>
                            <a href="{{ url('job/team') }}"
                                class="menu-item {{ \Request::is('job/team') || \Request::is('job/team/*') ? 'active' : '' }}">{{ __('Team') }}</a>
                            <a href="{{ url('job/location') }}"
                                class="menu-item {{ \Request::is('job/location') || \Request::is('job/location/*') ? 'active' : '' }}">{{ __('Location') }}</a>
                            <a href="{{ url('job/circular') }}"
                                class="menu-item {{ \Request::is('job/circular') || \Request::is('job/circular/*') ? 'active' : '' }}">{{ __('Job Circular') }}</a>
                            <a href="{{ url('job/job-applications') }}"
                                class="menu-item {{ \Request::is('job/job-applications') || \Request::is('job/job-applications/*') ? 'active' : '' }}">{{ __('Job Applications') }}</a>
                        @endcan
                    </div>
                </div>
                <div
                    class="nav-item {{ \Request::is('news-category') || \Request::is('news-category/*') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="fas fa-globe"></i><span>{{ __(' News Category') }}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        @canany(['access_to_users'])
                            <a href="{{ url('news-category') }}"
                                class="menu-item {{ \Request::is('news-category') || \Request::is('news-category/*') ? 'active' : '' }}">{{ __('News Category') }}</a>
                        @endcan
                    </div>
                </div>
                <div
                    class="nav-item {{ \Request::is('donation-banner/*') || \Request::is('donation-info') || \Request::is('donation-section-two') || \Request::is('donation-section-two/*') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="fas fa-hand-holding-heart"></i><span>{{ __(' Donation') }}</span></a>
                    <div class="submenu-content">
                        @canany(['access_to_users'])
                            <a href="{{ url('donation-banner/create') }}"
                                class="menu-item {{ \Request::is('donation-banner') || \Request::is('donation-banner/*') ? 'active' : '' }}">{{ __('Donation Page Banner') }}</a>
                            <a href="{{ url('donation-section-two/create') }}"
                                class="menu-item {{ \Request::is('donation-section-two') || \Request::is('donation-section-two/*') ? 'active' : '' }}">{{ __('Donation Section Two') }}</a>
                            <a href="{{ url('donation-info') }}"
                                class="menu-item {{ \Request::is('donation-info') || \Request::is('donation-info/*') ? 'active' : '' }}">{{ __('Donation List') }}</a>
                        @endcan
                    </div>
                </div>
                <div
                    class="nav-item {{ \Request::is('contact-us-banner/*') || \Request::is('contact-us-banner') || \Request::is('contact-leads') || \Request::is('contact-leads/*') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="fas fa-envelope"></i><span>{{ __(' Contact Us') }}</span></a>
                    <div class="submenu-content">
                        @canany(['access_to_users'])
                            <a href="{{ url('contact-us-banner/create') }}"
                                class="menu-item {{ \Request::is('contact-us-banner') || \Request::is('contact-us-banner/*') ? 'active' : '' }}">{{ __('Contact Us') }}</a>
                            <a href="{{ url('contact-leads') }}"
                                class="menu-item {{ \Request::is('contact-leads') || \Request::is('contact-leads/*') ? 'active' : '' }}">{{ __('Contact Leads') }}</a>
                        @endcan
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
