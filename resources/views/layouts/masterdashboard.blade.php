
<!DOCTYPE html>
<html lang="en"
      dir="ltr" class="dark-mode">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Dashboard</title>

        <!-- Prevent the demo from appearing in search engines -->
        <meta name="robots"
              content="noindex">

        <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7COswald:300,400,500,700%7CRoboto:400,500%7CExo+2:600&display=swap"
              rel="stylesheet">

        <!-- Perfect Scrollbar -->
        <link type="text/css"
              href="{{ asset('assets/frontAssets') }}/vendor/perfect-scrollbar.css"
              rel="stylesheet">

        <!-- Material Design Icons -->
        <link type="text/css"
              href="{{ asset('assets/frontAssets') }}/css/material-icons.css"
              rel="stylesheet">

        <!-- Font Awesome Icons -->
        <link type="text/css"
              href="{{ asset('assets/frontAssets') }}/css/fontawesome.css"
              rel="stylesheet">

        <!-- Preloader -->
        <link type="text/css"
              href="{{ asset('assets/frontAssets') }}/vendor/spinkit.css"
              rel="stylesheet">
        <link type="text/css"
              href="{{ asset('assets/frontAssets') }}/css/preloader.css"
              rel="stylesheet">

        <!-- App CSS -->
        <link type="text/css"
              href="{{ asset('assets/frontAssets') }}/css/app.css"
              rel="stylesheet">

        <!-- Dark Mode CSS (optional) -->
        <link type="text/css"
              href="{{ asset('assets/frontAssets') }}/css/dark-mode.css"
              rel="stylesheet">

        <!-- Vector Maps -->
        <link type="text/css"
              href="{{ asset('assets/frontAssets') }}/vendor/jqvmap/jqvmap.min.css"
              rel="stylesheet">

    </head>

    <body class="layout-app layout-sticky-subnav ">

        @php
            $url_explode = explode('/',url()->current());
            $current_url = end($url_explode);
        @endphp

        <div class="preloader">
            <div class="sk-chase">
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
            </div>



            <!-- More spinner examples at https://github.com/tobiasahlin/SpinKit/blob/master/examples.html -->
        </div>

        <div class="mdk-drawer-layout js-mdk-drawer-layout"
             data-push
             data-responsive-width="992px">
            <div class="mdk-drawer-layout__content page-content">

                <!-- Header -->

                <div class="navbar navbar-expand navbar-shadow px-0  pl-lg-16pt navbar-light bg-body"
                     id="default-navbar"
                     data-primary>

                    <!-- Navbar toggler -->
                    <button class="navbar-toggler d-block d-lg-none rounded-0"
                            type="button"
                            data-toggle="sidebar">
                        <span class="material-icons">menu</span>
                    </button>

                    <!-- Navbar Brand -->
                    <a href="index.html"
                       class="navbar-brand mr-16pt d-lg-none">
                        <img class="navbar-brand-icon mr-0 mr-lg-8pt"
                             src="{{ asset('assets/frontAssets') }}/images/logo/accent-teal-100@2x.png"
                             width="32"
                           >
                        <span class="d-none d-lg-block">JobTime</span>
                    </a>

                    <!-- <button class="btn navbar-btn mr-16pt" data-toggle="modal" data-target="#apps">Apps <i class="material-icons">arrow_drop_down</i></button> -->

                    <form class="search-form navbar-search d-none d-md-flex mr-16pt"
                          action="index.html">
                        <button class="btn"
                                type="submit"><i class="material-icons">search</i></button>
                        <input type="text"
                               class="form-control"
                               placeholder="Search ...">
                    </form>

                    <div class="flex"></div>

                    <div class="nav navbar-nav flex-nowrap d-none d-lg-flex mr-16pt"
                         style="white-space: nowrap;">
                        <div class="nav-item dropdown d-none d-sm-flex">
                            <a href="#"
                               class="nav-link dropdown-toggle"
                               data-toggle="dropdown">EN</a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-header"><strong>Select language</strong></div>
                                <a class="dropdown-item active"
                                   href="">English</a>
                                <a class="dropdown-item"
                                   href="">French</a>
                                <a class="dropdown-item"
                                   href="">Romanian</a>
                                <a class="dropdown-item"
                                   href="">Spanish</a>
                            </div>
                        </div>
                    </div>

                    <div class="nav navbar-nav flex-nowrap d-flex ml-0 mr-16pt">
                        <div class="nav-item dropdown d-none d-sm-flex">
                            <a href="#"
                               class="nav-link d-flex align-items-center dropdown-toggle"
                               data-toggle="dropdown">
                                <img width="32"
                                     height="32"
                                     class="rounded-circle mr-8pt"
                                     src="{{ asset('uploads/profile') }}/{{ auth()->user()->profile_photo }}"
                                     alt="account" />
                                <span class="flex d-flex flex-column mr-8pt">
                                    <span class="text-light">{{ auth()->user()->name }}</span>
                                    <small class="text-light">{{ Str::title(auth()->user()->user_type) }}</small>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-header"><strong>Account</strong></div>
                                <a class="dropdown-item"
                                   href="{{ route('profile.edit') }}">Edit Account</a>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item"   onclick="event.preventDefault();
                                    this.closest('form').submit();"
                                       href="{{ route('logout') }}">Logout</a>
                                </form>
                            </div>
                        </div>

                        <!-- Notifications dropdown -->
                        <div class="nav-item ml-16pt dropdown dropdown-notifications">
                            <button class="nav-link btn-flush dropdown-toggle"
                                    type="button"
                                    data-toggle="dropdown"
                                    data-dropdown-disable-document-scroll
                                    data-caret="false">
                                <i class="material-icons">notifications</i>
                                <span class="badge badge-notifications badge-accent">2</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div data-perfect-scrollbar
                                     class="position-relative">
                                    <div class="dropdown-header"><strong>System notifications</strong></div>
                                    <div class="list-group list-group-flush mb-0">

                                        <a href="javascript:void(0);"
                                           class="list-group-item list-group-item-action unread">
                                            <span class="d-flex align-items-center mb-1">
                                                <small class="text-black-50">3 minutes ago</small>

                                                <span class="ml-auto unread-indicator bg-accent"></span>

                                            </span>
                                            <span class="d-flex">
                                                <span class="avatar avatar-xs mr-2">
                                                    <span class="avatar-title rounded-circle bg-light">
                                                        <i class="material-icons font-size-16pt text-accent">account_circle</i>
                                                    </span>
                                                </span>
                                                <span class="flex d-flex flex-column">

                                                    <span class="text-black-70">Your profile information has not been synced correctly.</span>
                                                </span>
                                            </span>
                                        </a>

                                        <a href="javascript:void(0);"
                                           class="list-group-item list-group-item-action">
                                            <span class="d-flex align-items-center mb-1">
                                                <small class="text-black-50">5 hours ago</small>

                                            </span>
                                            <span class="d-flex">
                                                <span class="avatar avatar-xs mr-2">
                                                    <span class="avatar-title rounded-circle bg-light">
                                                        <i class="material-icons font-size-16pt text-primary">group_add</i>
                                                    </span>
                                                </span>
                                                <span class="flex d-flex flex-column">
                                                    <strong class="text-black-100">Adrian. D</strong>
                                                    <span class="text-black-70">Wants to join your private group.</span>
                                                </span>
                                            </span>
                                        </a>

                                        <a href="javascript:void(0);"
                                           class="list-group-item list-group-item-action">
                                            <span class="d-flex align-items-center mb-1">
                                                <small class="text-black-50">1 day ago</small>

                                            </span>
                                            <span class="d-flex">
                                                <span class="avatar avatar-xs mr-2">
                                                    <span class="avatar-title rounded-circle bg-light">
                                                        <i class="material-icons font-size-16pt text-warning">storage</i>
                                                    </span>
                                                </span>
                                                <span class="flex d-flex flex-column">

                                                    <span class="text-black-70">Your deploy was successful.</span>
                                                </span>
                                            </span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // END Notifications dropdown -->

                        <!-- Notifications dropdown -->
                        <div class="nav-item ml-16pt dropdown dropdown-notifications">
                            <button class="nav-link btn-flush dropdown-toggle"
                                    type="button"
                                    data-toggle="dropdown"
                                    data-dropdown-disable-document-scroll
                                    data-caret="false">
                                <i class="material-icons icon-24pt">mail_outline</i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div data-perfect-scrollbar
                                     class="position-relative">
                                    <div class="dropdown-header"><strong>Messages</strong></div>
                                    <div class="list-group list-group-flush mb-0">

                                        <a href="javascript:void(0);"
                                           class="list-group-item list-group-item-action unread">
                                            <span class="d-flex align-items-center mb-1">
                                                <small class="text-black-50">5 minutes ago</small>

                                                <span class="ml-auto unread-indicator bg-accent"></span>

                                            </span>
                                            <span class="d-flex">
                                                <span class="avatar avatar-xs mr-2">
                                                    <img src="{{ asset('assets/frontAssets') }}/images/people/110/woman-5.jpg"
                                                         alt="people"
                                                         class="avatar-img rounded-circle">
                                                </span>
                                                <span class="flex d-flex flex-column">
                                                    <strong class="text-black-100">Michelle</strong>
                                                    <span class="text-black-70">Clients loved the new design.</span>
                                                </span>
                                            </span>
                                        </a>

                                        <a href="javascript:void(0);"
                                           class="list-group-item list-group-item-action">
                                            <span class="d-flex align-items-center mb-1">
                                                <small class="text-black-50">5 minutes ago</small>

                                            </span>
                                            <span class="d-flex">
                                                <span class="avatar avatar-xs mr-2">
                                                    <img src="{{ asset('assets/frontAssets') }}/images/people/110/woman-5.jpg"
                                                         alt="people"
                                                         class="avatar-img rounded-circle">
                                                </span>
                                                <span class="flex d-flex flex-column">
                                                    <strong class="text-black-100">Michelle</strong>
                                                    <span class="text-black-70">🔥 Superb job..</span>
                                                </span>
                                            </span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // END Notifications dropdown -->
                    </div>

                    <div class="dropdown border-left-2 navbar-border">
                        <button class="navbar-toggler navbar-toggler-custom d-block"
                                type="button"
                                data-toggle="dropdown"
                                data-caret="false">
                            <span class="material-icons">business_center</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-header"><strong>Select company</strong></div>
                            <a href=""
                               class="dropdown-item active d-flex align-items-center">

                                <div class="avatar avatar-sm mr-8pt">

                                    <span class="avatar-title rounded bg-primary">FM</span>

                                </div>

                                <small class="ml-4pt flex">
                                    <span class="d-flex flex-column">
                                        <strong class="text-black-100">FrontendMatter Inc.</strong>
                                        <span class="text-black-50">Administrator</span>
                                    </span>
                                </small>
                            </a>
                            <a href=""
                               class="dropdown-item d-flex align-items-center">

                                <div class="avatar avatar-sm mr-8pt">

                                    <span class="avatar-title rounded bg-accent">HH</span>

                                </div>

                                <small class="ml-4pt flex">
                                    <span class="d-flex flex-column">
                                        <strong class="text-black-100">JobTime Inc.</strong>
                                        <span class="text-black-50">Publisher</span>
                                    </span>
                                </small>
                            </a>
                        </div>
                    </div>

                </div>

                <!-- // END Header -->
                @yield('dashboard_body')


                <div class="js-fix-footer footer border-top-2">
                    <div class="container-fluid page__container page-section d-flex flex-column">
                        <p class="text-70 brand mb-24pt">
                            <img class="brand-icon"
                                 src="{{ asset('assets/frontAssets') }}/images/logo/black-70@2x.png"
                                 width="30"
                                 alt="Huma"> JobTime
                        </p>
                    </div>
                    <div class="pb-16pt pb-lg-24pt">
                        <div class="container-fluid page__container">
                            <div class="bg-dark rounded page-section py-lg-32pt px-16pt px-lg-24pt">
                                <div class="row">
                                    <div class="col-md-2 col-sm-4 mb-24pt mb-md-0">
                                        <p class="text-white-70 mb-8pt"><strong>Follow us</strong></p>
                                        <nav class="nav nav-links nav--flush">
                                            <a href="#"
                                               class="nav-link mr-8pt"><img src="{{ asset('assets/frontAssets') }}/images/icon/footer/facebook-square@2x.png"
                                                     width="24"
                                                     height="24"
                                                     alt="Facebook"></a>
                                            <a href="#"
                                               class="nav-link mr-8pt"><img src="{{ asset('assets/frontAssets') }}/images/icon/footer/twitter-square@2x.png"
                                                     width="24"
                                                     height="24"
                                                     alt="Twitter"></a>
                                            <a href="#"
                                               class="nav-link mr-8pt"><img src="{{ asset('assets/frontAssets') }}/images/icon/footer/vimeo-square@2x.png"
                                                     width="24"
                                                     height="24"
                                                     alt="Vimeo"></a>
                                            <!-- <a href="#" class="nav-link"><img src="{{ asset('assets/frontAssets') }}/images/icon/footer/youtube-square@2x.png" width="24" height="24" alt="YouTube"></a> -->
                                        </nav>
                                    </div>
                                    <div class="col-md-6 col-sm-4 mb-24pt mb-md-0 d-flex align-items-center">
                                    </div>
                                    <div class="col-md-4 text-md-right">
                                        <p class="mb-8pt d-flex align-items-md-center justify-content-md-end">
                                            <a href=""
                                               class="text-white-70 text-underline mr-16pt">Terms</a>
                                            <a href=""
                                               class="text-white-70 text-underline">Privacy policy</a>
                                        </p>
                                        <p class="text-white-50 small mb-0">Copyright 2019 &copy; All rights reserved.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- // END drawer-layout__content -->

            <!-- drawer -->
            <div class="mdk-drawer js-mdk-drawer"
                 id="default-drawer">
                <div class="mdk-drawer__content">
                    <div class="sidebar sidebar-dark sidebar-left"
                         data-perfect-scrollbar>

                        <!-- Navbar toggler -->
                        {{-- <a href="compact-index.html"
                           class="navbar-toggler navbar-toggler-right navbar-toggler-custom d-flex align-items-center justify-content-center position-absolute right-0 top-0"
                           data-toggle="tooltip"
                           data-title="Switch to Compact Vertical Layout"
                           data-placement="right"
                           data-boundary="window">
                            <span class="material-icons">sync_alt</span>
                        </a> --}}

                        <a href="{{ route('dashboard') }}"
                           class="sidebar-brand ">
                            <img class="sidebar-brand-icon"
                                 src="{{ asset('assets/frontAssets') }}/images/logo/accent-teal-100@2x.png"
                                 alt="Huma">
                            <span>JobTime</span>
                        </a>

                        <div class="sidebar-account mx-16pt mb-16pt dropdown">
                            <a href="#"
                               class="nav-link d-flex align-items-center dropdown-toggle"
                               data-toggle="dropdown"
                               data-caret="false">
                                <img width="32"
                                     height="32"
                                     class="rounded-circle mr-8pt"
                                     src="{{ asset('uploads/profile') }}/{{ auth()->user()->profile_photo }}"
                                     alt="account" />
                                <span class="flex d-flex flex-column mr-8pt">
                                    <span class="text-black-100">{{ auth()->user()->name }}</span>
                                    <small class="text-black-50">{{ Str::title(auth()->user()->user_type) }}</small>
                                </span>
                                <i class="material-icons text-black-20 icon-16pt">keyboard_arrow_down</i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-full dropdown-menu-caret-center">
                                <div class="dropdown-header"><strong>Account</strong></div>
                                <a class="dropdown-item"
                                   href="{{ route('profile.edit') }}">Edit Account</a>


                                <div class="dropdown-divider"></div>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item"   onclick="event.preventDefault();
                                    this.closest('form').submit();"
                                       href="{{ route('logout') }}">Logout</a>
                                </form>


                            </div>
                        </div>


                        <div class="sidebar-heading">Overview</div>
                        <ul class="sidebar-menu">
                            <li class="sidebar-menu-item active">
                                <a class="sidebar-menu-button"
                                   href="{{ route('dashboard') }}">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">insert_chart_outlined</span>
                                    <span class="sidebar-menu-text">Dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="data.php">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">web</span> View Site
                                </a>
                            </li>
                        </ul>

                        <div class="sidebar-heading">Application</div>

                        <ul class="sidebar-menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button js-sidebar-collapse"
                                   data-toggle="collapse"
                                   href="#enterprise_menu">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">donut_large</span>
                                    Category
                                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                </a>
                                <ul class="sidebar-submenu collapse sm-indent"
                                    id="enterprise_menu">
                                    <li class="sidebar-menu-item  active">
                                        <a class="sidebar-menu-button"
                                           href="{{ route('category.create') }}">
                                            <span class="sidebar-menu-text">Ceate</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button"
                                           href="{{ route('category.index') }}">
                                            <span class="sidebar-menu-text">List</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button collapsed" data-toggle="collapse" href="#productivity_menu" aria-expanded="false">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">group</span>
                                    Users
                                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                </a>
                                <ul class="sidebar-submenu sm-indent collapse" id="productivity_menu" style="">
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button"
                                        href="{{ route('add.sub.admin') }}">
                                         <span class="sidebar-menu-text">Add Subadmin</span>
                                        </a>
                                    </li>

                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button"
                                        href="{{ route('user.list') }}">
                                         <span class="sidebar-menu-text">User List</span>
                                        </a>
                                    </li>


                                </ul>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
            <!-- // END drawer -->
        </div>
        <!-- // END drawer-layout -->


        <!-- jQuery -->
        <script src="{{ asset('assets/frontAssets') }}/vendor/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script src="{{ asset('assets/frontAssets') }}/vendor/popper.min.js"></script>
        <script src="{{ asset('assets/frontAssets') }}/vendor/bootstrap.min.js"></script>

        <!-- Perfect Scrollbar -->
        <script src="{{ asset('assets/frontAssets') }}/vendor/perfect-scrollbar.min.js"></script>

        <!-- DOM Factory -->
        <script src="{{ asset('assets/frontAssets') }}/vendor/dom-factory.js"></script>

        <!-- MDK -->
        <script src="{{ asset('assets/frontAssets') }}/vendor/material-design-kit.js"></script>

        <!-- App JS -->
        <script src="{{ asset('assets/frontAssets') }}/js/app.js"></script>

        <!-- Highlight.js -->
        <script src="{{ asset('assets/frontAssets') }}/js/hljs.js"></script>

        <!-- Global Settings -->
        <script src="{{ asset('assets/frontAssets') }}/js/settings.js"></script>

        <!-- Flatpickr -->
        <script src="{{ asset('assets/frontAssets') }}/vendor/flatpickr/flatpickr.min.js"></script>
        <script src="{{ asset('assets/frontAssets') }}/js/flatpickr.js"></script>

        <!-- Moment.js -->
        <script src="{{ asset('assets/frontAssets') }}/vendor/moment.min.js"></script>
        <script src="{{ asset('assets/frontAssets') }}/vendor/moment-range.js"></script>

        <!-- Chart.js -->
        <script src="{{ asset('assets/frontAssets') }}/vendor/Chart.min.js"></script>
        <script src="{{ asset('assets/frontAssets') }}/js/chartjs.js"></script>

        <!-- Chart.js Samples -->
        <script src="{{ asset('assets/frontAssets') }}/js/page.analytics-dashboard.js"></script>

        <!-- Vector Maps -->
        <script src="{{ asset('assets/frontAssets') }}/vendor/jqvmap/jquery.vmap.min.js"></script>
        <script src="{{ asset('assets/frontAssets') }}/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
        <script src="{{ asset('assets/frontAssets') }}/js/vector-maps.js"></script>

        <!-- List.js -->
        <script src="{{ asset('assets/frontAssets') }}/vendor/list.min.js"></script>
        <script src="{{ asset('assets/frontAssets') }}/js/list.js"></script>

        <!-- Tables -->
        <script src="{{ asset('assets/frontAssets') }}/js/toggle-check-all.js"></script>
        <script src="{{ asset('assets/frontAssets') }}/js/check-selected-row.js"></script>

        <!-- App Settings (safe to remove) -->
        <script src="{{ asset('assets/frontAssets') }}/js/app-settings.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @yield('script_body')
    </body>

</html>
