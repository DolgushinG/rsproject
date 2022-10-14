<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Super Admin 2.0</title>

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{asset('organizer/resources/vendors/zwicon/zwicon.min.css')}}">
    <link rel="stylesheet" href="{{asset('organizer/resources/vendors/animate.css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('organizer/resources/vendors/overlay-scrollbars/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('organizer/resources/vendors/fullcalendar/core/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('organizer/resources/vendors/fullcalendar/daygrid/main.min.css')}}">

    <!-- App styles -->
    <link rel="stylesheet" href="{{asset('organizer/resources/css/app.min.css')}}">
</head>

<body data-sa-theme="1">
<main class="main">
    <div class="page-loader">
        <div class="page-loader__spinner">
            <svg viewBox="25 25 50 50">
                <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>

    <header class="header">
        <div class="navigation-trigger d-xl-none" data-sa-action="aside-open" data-sa-target=".sidebar">
            <i class="zwicon-hamburger-menu"></i>
        </div>

        <div class="logo d-none d-sm-inline-flex">
            <a href="index-2.html">Super Admin 2.0</a>
        </div>

        <form class="search">
            <div class="search__inner">
                <input type="text" class="search__text" placeholder="Search for people, files, documents...">
                <i class="zwicon-search search__helper"></i>
                <i class="zwicon-arrow-left search__reset" data-sa-action="search-close"></i>
            </div>
        </form>

        <ul class="top-nav">
            <li class="d-xl-none"><a href="#" data-sa-action="search-open"><i class="zwicon-search"></i></a></li>

            <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="top-nav__notify"><i class="zwicon-mail"></i></a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu--block">
                    <div class="dropdown-header">
                        Messages

                        <div class="actions">
                            <a href="messages.html" class="actions__item zwicon-plus"></a>
                        </div>
                    </div>

                    <div class="listview listview--hover">
                        <a href="#" class="listview__item">
                            <img src="demo/img/profile-pics/1.jpg" class="avatar-img" alt="">

                            <div class="listview__content">
                                <div class="listview__heading">
                                    David Belle <small>12:01 PM</small>
                                </div>
                                <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                            </div>
                        </a>

                        <a href="#" class="listview__item">
                            <img src="demo/img/profile-pics/2.jpg" class="avatar-img" alt="">

                            <div class="listview__content">
                                <div class="listview__heading">
                                    Jonathan Morris
                                    <small>02:45 PM</small>
                                </div>
                                <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                            </div>
                        </a>

                        <a href="#" class="listview__item">
                            <img src="demo/img/profile-pics/3.jpg" class="avatar-img" alt="">

                            <div class="listview__content">
                                <div class="listview__heading">
                                    Fredric Mitchell Jr.
                                    <small>08:21 PM</small>
                                </div>
                                <p>Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</p>
                            </div>
                        </a>

                        <a href="#" class="listview__item">
                            <img src="demo/img/profile-pics/4.jpg" class="avatar-img" alt="">

                            <div class="listview__content">
                                <div class="listview__heading">
                                    Glenn Jecobs
                                    <small>08:43 PM</small>
                                </div>
                                <p>Ut vitae lacus sem ellentesque maximus, nunc sit amet varius dignissim, dui est consectetur neque</p>
                            </div>
                        </a>

                        <a href="#" class="listview__item">
                            <img src="demo/img/profile-pics/5.jpg" class="avatar-img" alt="">

                            <div class="listview__content">
                                <div class="listview__heading">
                                    Bill Phillips
                                    <small>11:32 PM</small>
                                </div>
                                <p>Proin laoreet commodo eros id faucibus. Donec ligula quam, imperdiet vel ante placerat</p>
                            </div>
                        </a>

                        <a href="#" class="view-more">View all messages</a>
                    </div>
                </div>
            </li>

            <li class="dropdown top-nav__notifications">
                <a href="#" data-toggle="dropdown" class="top-nav__notify">
                    <i class="zwicon-bell"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu--block">
                    <div class="dropdown-header">
                        Notifications

                        <div class="actions">
                            <a href="#" class="actions__item zwicon-checkmark-square" data-sa-action="notifications-clear"></a>
                        </div>
                    </div>

                    <div class="listview listview--hover">
                        <div class="listview__scroll scrollbar">
                            <a href="#" class="listview__item">
                                <img src="demo/img/profile-pics/1.jpg" class="avatar-img" alt="">

                                <div class="listview__content">
                                    <div class="listview__heading">David Belle</div>
                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                </div>
                            </a>

                            <a href="#" class="listview__item">
                                <img src="demo/img/profile-pics/2.jpg" class="avatar-img" alt="">

                                <div class="listview__content">
                                    <div class="listview__heading">Jonathan Morris</div>
                                    <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                                </div>
                            </a>

                            <a href="#" class="listview__item">
                                <img src="demo/img/profile-pics/3.jpg" class="avatar-img" alt="">

                                <div class="listview__content">
                                    <div class="listview__heading">Fredric Mitchell Jr.</div>
                                    <p>Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</p>
                                </div>
                            </a>

                            <a href="#" class="listview__item">
                                <img src="demo/img/profile-pics/4.jpg" class="avatar-img" alt="">

                                <div class="listview__content">
                                    <div class="listview__heading">Glenn Jecobs</div>
                                    <p>Ut vitae lacus sem ellentesque maximus, nunc sit amet varius dignissim, dui est consectetur neque</p>
                                </div>
                            </a>

                            <a href="#" class="listview__item">
                                <img src="demo/img/profile-pics/5.jpg" class="avatar-img" alt="">

                                <div class="listview__content">
                                    <div class="listview__heading">Bill Phillips</div>
                                    <p>Proin laoreet commodo eros id faucibus. Donec ligula quam, imperdiet vel ante placerat</p>
                                </div>
                            </a>

                            <a href="#" class="listview__item">
                                <img src="demo/img/profile-pics/1.jpg" class="avatar-img" alt="">

                                <div class="listview__content">
                                    <div class="listview__heading">David Belle</div>
                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                </div>
                            </a>

                            <a href="#" class="listview__item">
                                <img src="demo/img/profile-pics/2.jpg" class="avatar-img" alt="">

                                <div class="listview__content">
                                    <div class="listview__heading">Jonathan Morris</div>
                                    <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                                </div>
                            </a>

                            <a href="#" class="listview__item">
                                <img src="demo/img/profile-pics/3.jpg" class="avatar-img" alt="">

                                <div class="listview__content">
                                    <div class="listview__heading">Fredric Mitchell Jr.</div>
                                    <p>Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</p>
                                </div>
                            </a>
                        </div>

                        <div class="p-1"></div>
                    </div>
                </div>
            </li>

            <li class="dropdown d-none d-sm-inline-block">
                <a href="#" data-toggle="dropdown"><i class="zwicon-checkmark-circle"></i></a>

                <div class="dropdown-menu dropdown-menu-right dropdown-menu--block" role="menu">
                    <div class="dropdown-header">Tasks</div>

                    <div class="listview listview--hover">
                        <a href="#" class="listview__item">
                            <div class="listview__content">
                                <div class="listview__heading">HTML5 Validation Report</div>

                                <div class="progress mt-1">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="listview__item">
                            <div class="listview__content">
                                <div class="listview__heading">Google Chrome Extension</div>

                                <div class="progress mt-1">
                                    <div class="progress-bar bg-warning" style="width: 43%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="listview__item">
                            <div class="listview__content">
                                <div class="listview__heading">Social Intranet Projects</div>

                                <div class="progress mt-1">
                                    <div class="progress-bar bg-success" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="listview__item">
                            <div class="listview__content">
                                <div class="listview__heading">Bootstrap Admin Template</div>

                                <div class="progress mt-1">
                                    <div class="progress-bar bg-info" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="listview__item">
                            <div class="listview__content">
                                <div class="listview__heading">Youtube Client App</div>

                                <div class="progress mt-1">
                                    <div class="progress-bar bg-danger" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="view-more">View all Tasks</a>
                    </div>
                </div>
            </li>

            <li class="dropdown d-none d-sm-inline-block">
                <a href="#" data-toggle="dropdown"><i class="zwicon-grid"></i></a>

                <div class="dropdown-menu dropdown-menu-right dropdown-menu--block" role="menu">
                    <div class="row app-shortcuts">
                        <a class="col-4 app-shortcuts__item" href="#">
                            <i class="zwicon-calendar-never"></i>
                            <small class="">Calendar</small>
                        </a>
                        <a class="col-4 app-shortcuts__item" href="#">
                            <i class="zwicon-document"></i>
                            <small class="">Files</small>
                        </a>
                        <a class="col-4 app-shortcuts__item" href="#">
                            <i class="zwicon-mail"></i>
                            <small class="">Email</small>
                        </a>
                        <a class="col-4 app-shortcuts__item" href="#">
                            <i class="zwicon-line-chart"></i>
                            <small class="">Reports</small>
                        </a>
                        <a class="col-4 app-shortcuts__item" href="#">
                            <i class="zwicon-broadcast"></i>
                            <small class="">News</small>
                        </a>
                        <a class="col-4 app-shortcuts__item" href="#">
                            <i class="zwicon-image"></i>
                            <small class="">Gallery</small>
                        </a>
                    </div>
                </div>
            </li>

            <li class="dropdown d-none d-sm-inline-block">
                <a href="#" data-toggle="dropdown"><i class="zwicon-more-h"></i></a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item" data-sa-action="fullscreen">Fullscreen</a>
                    <a href="#" class="dropdown-item">Clear Local Storage</a>
                    <a href="#" class="dropdown-item">Settings</a>
                </div>
            </li>

            <li class="d-none d-sm-inline-block">
                <a href="#" class="top-nav__themes" data-sa-action="aside-open" data-sa-target=".themes"><i class="zwicon-palette"></i></a>
            </li>
        </ul>

        <div class="clock d-none d-md-inline-block">
            <div class="time">
                <span class="time__hours"></span>
                <span class="time__min"></span>
                <span class="time__sec"></span>
            </div>
        </div>
    </header>

    <aside class="sidebar ">
        <div class="scrollbar">
            <div class="user">
                <div class="user__info" data-toggle="dropdown">
                    <img class="user__img" src="demo/img/profile-pics/8.jpg" alt="">
                    <div>
                        <div class="user__name">Malinda Hollaway</div>
                        <div class="user__email">malinda-h@gmail.com</div>
                    </div>
                </div>

                <div class="dropdown-menu dropdown-menu--invert">
                    <a class="dropdown-item" href="#">View Profile</a>
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Logout</a>
                </div>
            </div>

            <ul class="navigation">
                <li class="navigation__active"><a href="index-2.html"><i class="zwicon-home"></i> Home</a></li>

                <li class="navigation__sub">
                    <a href="#"><i class="zwicon-three-h"></i> Variants</a>

                    <ul>
                        <li><a href="hidden-sidebar.html">Hidden Sidebar</a></li>
                        <li><a href="boxed-layout.html">Boxed Layout</a></li>
                        <li><a href="hidden-sidebar-boxed-layout.html">Boxed Layout with Hidden Sidebar</a></li>
                    </ul>
                </li>

                <li>
                    <a href="typography.html"><i class="zwicon-edit-square-feather"></i> Typography</a>
                </li>

                <li>
                    <a href="widgets.html"><i class="zwicon-layout-4"></i> Widgets</a>
                </li>

                <li class="navigation__sub">
                    <a href="#"><i class="zwicon-layout-2"></i> Tables</a>

                    <ul>
                        <li>
                            <a href="html-table.html">HTML Table</a>
                        </li>
                        <li>
                            <a href="data-table.html">Data Table</a>
                        </li>
                    </ul>
                </li>

                <li class="navigation__sub">
                    <a href="#"><i class="zwicon-note"></i> Forms</a>

                    <ul>
                        <li>
                            <a href="form-elements.html">Basic Form Elements</a>
                        </li>
                        <li>
                            <a href="form-components.html">Form Components</a>
                        </li>
                        <li>
                            <a href="form-layouts.html">Form Layouts</a>
                        </li>
                        <li>
                            <a href="form-validation.html">Form Validation</a>
                        </li>
                    </ul>
                </li>

                <li class="navigation__sub">
                    <a href="#"><i class="zwicon-cursor-square"></i> User Interface</a>

                    <ul>
                        <li>
                            <a href="colors.html">Colors</a>
                        </li>
                        <li>
                            <a href="css-animations.html">CSS Animations</a>
                        </li>
                        <li>
                            <a href="buttons.html">Buttons</a>
                        </li>
                        <li>
                            <a href="icons.html">Icons</a>
                        </li>
                        <li>
                            <a href="listview.html">Listview</a>
                        </li>
                        <li>
                            <a href="toolbars.html">Toolbars</a>
                        </li>
                        <li>
                            <a href="cards.html">Cards</a>
                        </li>
                        <li>
                            <a href="alerts.html">Alerts</a>
                        </li>
                        <li>
                            <a href="badges.html">Badges</a>
                        </li>
                        <li>
                            <a href="breadcrumbs.html">Bredcrumbs</a>
                        </li>
                        <li>
                            <a href="jumbotron.html">Jumbotron</a>
                        </li>
                        <li>
                            <a href="navs.html">Navs</a>
                        </li>
                        <li>
                            <a href="pagination.html">Pagination</a>
                        </li>
                        <li>
                            <a href="progress.html">Progress</a>
                        </li>
                    </ul>
                </li>

                <li class="navigation__sub">
                    <a href="#"><i class="zwicon-tray-stack"></i> Javascript Components</a>

                    <ul class="navigation__sub">
                        <li>
                            <a href="carousel.html">Carousel</a>
                        </li>
                        <li>
                            <a href="collapse.html">Collapse</a>
                        </li>
                        <li>
                            <a href="dropdowns.html">Dropdowns</a>
                        </li>
                        <li>
                            <a href="modals.html">Modals</a>
                        </li>
                        <li>
                            <a href="popover.html">Popover</a>
                        </li>
                        <li>
                            <a href="tabs.html">Tabs</a>
                        </li>
                        <li>
                            <a href="tooltips.html">Tooltips</a>
                        </li>
                        <li>
                            <a href="toast.html">Toasts</a>
                        </li>
                        <li>
                            <a href="treeview.html">Tree View</a>
                        </li>
                        <li>
                            <a href="custom-alerts.html">Custom Alerts</a>
                        </li>
                    </ul>
                </li>

                <li class="navigation__sub">
                    <a href="#"><i class="zwicon-line-chart"></i> Charts</a>

                    <ul>
                        <li>
                            <a href="flot-charts.html">Flot</a>
                        </li>
                        <li>
                            <a href="other-charts.html">Other Charts</a>
                        </li>
                        <li>
                            <a href="maps.html">Maps</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="calendar.html"><i class="zwicon-calendar-never"></i> Calendar</a>
                </li>

                <li>
                    <a href="photo-gallery.html"><i class="zwicon-image"></i> Photo Gallery</a>
                </li>

                <li class="navigation__sub">
                    <a href="#"><i class="zwicon-repository"></i> Sample Pages</a>

                    <ul>
                        <li>
                            <a href="profile-about.html">Profile</a>
                        </li>
                        <li>
                            <a href="messages.html">Messages</a>
                        </li>
                        <li>
                            <a href="contacts.html">Contacts</a>
                        </li>
                        <li>
                            <a href="new-contact.html">New Contact</a>
                        </li>
                        <li>
                            <a href="groups.html">Groups</a>
                        </li>
                        <li>
                            <a href="pricing-tables.html">Pricing Tables</a>
                        </li>
                        <li>
                            <a href="invoice.html">Invoice</a>
                        </li>
                        <li>
                            <a href="todo-lists.html">Todo Lists</a>
                        </li>
                        <li>
                            <a href="notes.html">Notes</a>
                        </li>
                        <li>
                            <a href="search-results.html">Search Results</a>
                        </li>
                        <li>
                            <a href="issue-tracker.html">Issue Tracker</a>
                        </li>
                        <li>
                            <a href="faq.html">FAQ</a>
                        </li>
                        <li>
                            <a href="team.html">Team</a>
                        </li>
                        <li>
                            <a href="blog.html">Blog</a>
                        </li>
                        <li>
                            <a href="blog-detail.html">Blog Detail</a>
                        </li>
                        <li>
                            <a href="questions-answers.html">Questions & Answers</a>
                        </li>
                        <li>
                            <a href="questions-answers-details.html">Questions & Answers Details</a>
                        </li>
                        <li>
                            <a href="login.html">Login & SignUp</a>
                        </li>
                        <li>
                            <a href="lockscreen.html">Lockscreen</a>
                        </li>
                        <li>
                            <a href="404.html">404</a>
                        </li>
                        <li>
                            <a href="empty.html">Empty Page</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>
    <div class="themes">
        <div class="scrollbar">
            <a href="#" class="themes__item active" data-sa-value="1"><img src="{{asset('organizer/resources/img/bg/1.jpg')}}" alt=""></a>
            <a href="#" class="themes__item" data-sa-value="2"><img src="{{asset('organizer/resources/img/bg/2.jpg')}}" alt=""></a>
            <a href="#" class="themes__item" data-sa-value="3"><img src="{{asset('organizer/resources/img/bg/3.jpg')}}" alt=""></a>
            <a href="#" class="themes__item" data-sa-value="4"><img src="{{asset('organizer/resources/img/bg/4.jpg')}}" alt=""></a>
            <a href="#" class="themes__item" data-sa-value="5"><img src="{{asset('organizer/resources/img/bg/5.jpg')}}" alt=""></a>
            <a href="#" class="themes__item" data-sa-value="6"><img src="{{asset('organizer/resources/img/bg/6.jpg')}}" alt=""></a>
            <a href="#" class="themes__item" data-sa-value="7"><img src="{{asset('organizer/resources/img/bg/7.jpg')}}" alt=""></a>
            <a href="#" class="themes__item" data-sa-value="8"><img src="{{asset('organizer/resources/img/bg/8.jpg')}}" alt=""></a>
            <a href="#" class="themes__item" data-sa-value="9"><img src="{{asset('organizer/resources/img/bg/9.jpg')}}" alt=""></a>
            <a href="#" class="themes__item" data-sa-value="10"><img src="{{asset('organizer/resources/img/bg/10.jpg')}}" alt=""></a>
        </div>
    </div>

    <section class="content">
        <header class="content__title">
            <h1>Dashboard <small>Welcome to the unique SuperAdmin web app experience!</small></h1>

            <div class="actions">
                <a href="#" class="actions__item zwicon-cog"></a>
                <a href="#" class="actions__item zwicon-refresh-double"></a>

                <div class="dropdown actions__item">
                    <i data-toggle="dropdown" class="zwicon-more-h"></i>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item">Refresh</a>
                        <a href="#" class="dropdown-item">Manage Widgets</a>
                        <a href="#" class="dropdown-item">Settings</a>
                    </div>
                </div>
            </div>
        </header>

        <div class="row quick-stats">
            <div class="col-sm-6 col-md-3">
                <div class="quick-stats__item">
                    <div class="quick-stats__info">
                        <h2>987,459</h2>
                        <small>Total Leads Recieved</small>
                    </div>

                    <div class="quick-stats__chart peity-bar">6,4,8,6,5,6,7,8,3,5,9</div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="quick-stats__item">
                    <div class="quick-stats__info">
                        <h2>356,785K</h2>
                        <small>Total Website Clicks</small>
                    </div>

                    <div class="quick-stats__chart peity-bar">4,7,6,2,5,3,8,6,6,4,8</div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="quick-stats__item">
                    <div class="quick-stats__info">
                        <h2>$58,778</h2>
                        <small>Total Sales Orders</small>
                    </div>

                    <div class="quick-stats__chart peity-bar">9,4,6,5,6,4,5,7,9,3,6</div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="quick-stats__item">
                    <div class="quick-stats__info">
                        <h2>214</h2>
                        <small>Total Support Tickets</small>
                    </div>

                    <div class="quick-stats__chart peity-bar">5,6,3,9,7,5,4,6,5,6,4</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sales Statistics</h4>
                        <h6 class="card-subtitle">Vestibulum purus quam scelerisque, mollis nonummy metus</h6>

                        <div class="flot-chart flot-curved-line"></div>
                        <div class="flot-chart-legends flot-chart-legends--curved"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Growth Rate</h4>
                        <h6 class="card-subtitle">Commodo luctus nisi erat porttitor ligula eget lacinia odio semnec</h6>

                        <div class="flot-chart flot-line"></div>
                        <div class="flot-chart-legends flot-chart-legends--line"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="widget-lists card-columns">
            <div class="card widget-past-days">
                <div class="card-body">
                    <h4 class="card-title">For the past 30 days</h4>
                    <h6 class="card-subtitle">Pellentesque ornare sem lacinia quam</h6>
                </div>

                <div class="widget-past-days__main">
                    <div class="flot-chart flot-chart--sm flot-past-days"></div>
                </div>

                <div class="listview listview--striped">
                    <div class="listview__item">
                        <div class="widget-past-days__info">
                            <small>Page Views</small>
                            <h3>47,896,536</h3>
                        </div>

                        <div class="widget-past-days__chart hidden-sm">
                            <div class="peity-bar">6,9,5,6,3,7,5,4,6,5,6,4,2,5,8,2,6,9</div>
                        </div>
                    </div>

                    <div class="listview__item">
                        <div class="widget-past-days__info">
                            <small>Site Visitors</small>
                            <h3>24,456,799</h3>
                        </div>

                        <div class="widget-past-days__chart hidden-sm">
                            <div class="peity-bar">5,7,2,5,2,8,6,7,6,5,3,1,9,3,5,8,2,4</div>
                        </div>
                    </div>

                    <div class="listview__item">
                        <div class="widget-past-days__info">
                            <small>Total Clicks</small>
                            <h3>13,965</h3>
                        </div>

                        <div class="widget-past-days__chart hidden-sm">
                            <div class="peity-bar">5,7,2,5,2,8,6,7,6,5,3,1,9,3,5,8,2,4</div>
                        </div>
                    </div>

                    <div class="listview__item">
                        <div class="widget-past-days__info">
                            <small>Total Returns</small>
                            <h3>198</h3>
                        </div>

                        <div class="widget-past-days__chart hidden-sm">
                            <div class="peity-bar">3,9,1,3,5,6,7,6,8,2,5,2,7,5,6,7,6,8</div>
                        </div>
                    </div>
                    <div class="listview__item">
                        <div class="widget-past-days__info">
                            <small>Total Leads</small>
                            <h3>19821</h3>
                        </div>

                        <div class="widget-past-days__chart hidden-sm">
                            <div class="peity-bar">4,2,2,2,2,8,1,6,8,2,5,2,7,5,4,2,6,3</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card todo">
                <div class="card-body">
                    <h4 class="card-title">Todo lists</h4>
                    <h6 class="card-subtitle">Venenatis portauam Inceptos ameteiam</h6>
                </div>

                <div class="listview">
                    <div class="listview__item">
                        <div class="checkbox-char todo__item">
                            <input type="checkbox" id="char-1">
                            <label for="char-1">F</label>

                            <div class="listview__content">
                                <div class="listview__heading">Fivamus sagittis lacus vel augue laoreet rutrum faucibus dolor</div>
                                <p>Today at 8.30 AM</p>

                                <div class="listview__attrs">
                                    <span>#Messages</span>
                                    <span>!!!</span>
                                </div>
                            </div>
                        </div>

                        <div class="actions listview__actions">
                            <div class="dropdown actions__item">
                                <i class="zwicon-more-h" data-toggle="dropdown"></i>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Mark as completed</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="listview__item">
                        <div class="checkbox-char todo__item">
                            <input type="checkbox" id="char-2">
                            <label for="char-2">N</label>

                            <div class="listview__content">
                                <div class="listview__heading">Nullam id dolor id nibh ultricies vehicula ut id elit</div>
                                <p>Today at 12.30 PM</small>

                                <div class="listview__attrs">
                                    <span>#Clients</span>
                                    <span>!!</span>
                                </div>
                            </div>
                        </div>

                        <div class="actions listview__actions">
                            <div class="dropdown actions__item">
                                <i class="zwicon-more-h" data-toggle="dropdown"></i>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Mark as completed</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="listview__item">
                        <div class="checkbox-char todo__item">
                            <input type="checkbox" id="char-3">
                            <label for="char-3">C</label>

                            <div class="listview__content">
                                <div class="listview__heading">Cras mattis consectetur purus sit amet fermentum</div>
                                <p>Tomorrow at 10.30 AM</small>

                                <div class="listview__attrs">
                                    <span>#Clients</span>
                                    <span>!!</span>
                                </div>
                            </div>
                        </div>

                        <div class="actions listview__actions">
                            <div class="dropdown actions__item">
                                <i class="zwicon-more-h" data-toggle="dropdown"></i>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Mark as completed</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="listview__item">
                        <div class="checkbox-char todo__item">
                            <input type="checkbox" id="char-4">
                            <label for="char-4">I</label>

                            <div class="listview__content">
                                <div class="listview__heading">Integer posuere erat a ante venenatis dapibus posuere velit aliquet</div>
                                <p>05/08/2017 at 08.00 AM</small>

                                <div class="listview__attrs">
                                    <span>#Server</span>
                                    <span>!</span>
                                </div>
                            </div>
                        </div>

                        <div class="actions listview__actions">
                            <div class="dropdown actions__item">
                                <i class="zwicon-more-h" data-toggle="dropdown"></i>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Mark as completed</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="listview__item">
                        <div class="checkbox-char todo__item">
                            <input type="checkbox" id="char-5">
                            <label for="char-5">P</label>

                            <div class="listview__content">
                                <div class="listview__heading">Praesent commodo cursus magnavel scelerisque nisl consectetur</div>
                                <p>10/08/2016 at 04.00 AM</small>

                                <div class="listview__attrs">
                                    <span>#Server</span>
                                    <span>!!!</span>
                                </div>
                            </div>
                        </div>

                        <div class="actions listview__actions">
                            <div class="dropdown actions__item">
                                <i class="zwicon-more-h" data-toggle="dropdown"></i>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Mark as completed</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="todos.html" class="view-more">View More</a>
                </div>
            </div>

            <div class="card widget-visitors">
                <div class="card-body">
                    <h4 class="card-title">Realtime Visitors</h4>
                    <h6 class="card-subtitle">Nullam dolor isnibh ultricies vehicula adipiscing</h6>

                    <div class="widget-visitors__stats">
                        <div>
                            <strong>23528</strong>
                            <small>Visitor for last 24 hours</small>
                        </div>
                        <div>
                            <strong>746</strong>
                            <small>Visitors last 30 minutes</small>
                        </div>
                    </div>

                    <div class="widget-visitors__map map-visitors"></div>
                </div>

                <div class="listview listview--bordered">
                    <div class="listview__item">
                        <div class="listview__content">
                            <div class="listview__heading">Sunday, September 4, 21:44:02 (2 Mins 56 Seconds)</div>

                            <div class="listview__attrs">
                                <span><img class="widget-visitors__country" src="demo/img/flags/United_States_of_America.png" alt=""> United States</span>
                                <span>Firefox</span>
                                <span>Mac OSX</span>
                            </div>
                        </div>
                    </div>

                    <div class="listview__item">
                        <div class="listview__content">
                            <div class="listview__heading">Sunday, September 4, 20:21:01 (5 Mins 12 Seconds)</div>

                            <div class="listview__attrs">
                                <span><img class="widget-visitors__country" src="demo/img/flags/Australia.png" alt=""> Australia</span>
                                <span>Chrome</span>
                                <span>Android</span>
                            </div>
                        </div>
                    </div>

                    <div class="listview__item">
                        <div class="listview__content">
                            <div class="listview__heading">Sunday, September 4, 20:21:10 (10 Mins 43 Seconds)</div>

                            <div class="listview__attrs">
                                <span><img class="widget-visitors__country" src="demo/img/flags/Brazil.png" alt=""> Brazil</span>
                                <span>Edge</span>
                                <span>Windows</span>
                            </div>
                        </div>
                    </div>

                    <div class="listview__item">
                        <div class="listview__content">
                            <div class="listview__heading">Sunday, September 4, 20:59:04 (1 Min 02 Seconds)</div>

                            <div class="listview__attrs">
                                <span><img class="widget-visitors__country" src="demo/img/flags/South_Korea.png" alt=""> South Korea</span>
                                <span>Chrome</span>
                                <span>Android</span>
                            </div>
                        </div>
                    </div>

                    <div class="listview__item">
                        <div class="listview__content">
                            <div class="listview__heading">Sunday, September 4, 20:58:12 (3 Min 44 Seconds)</div>

                            <div class="listview__attrs">
                                <span><img class="widget-visitors__country" src="demo/img/flags/Japan.png" alt=""> Japan</span>
                                <span>Chrome</span>
                                <span>Windows</span>
                            </div>
                        </div>
                    </div>

                    <div class="p-3"></div>
                </div>
            </div>

            <div class="card widget-pie">
                <div class="widget-pie__inner">
                    <div class="col-6 col-sm-4 col-md-6 col-lg-4 widget-pie__item">
                        <div class="easy-pie-chart" data-percent="50" data-size="80" data-track-color="rgba(0,0,0,0.25)" data-bar-color="#fff">
                            <span class="easy-pie-chart__value">92</span>
                        </div>
                        <div class="widget-pie__title">Email<br> Scheduled</div>
                    </div>

                    <div class="col-6 col-sm-4 col-md-6 col-lg-4 widget-pie__item">
                        <div class="easy-pie-chart" data-percent="11" data-size="80" data-track-color="rgba(0,0,0,0.25)" data-bar-color="#fff">
                            <span class="easy-pie-chart__value">11</span>
                        </div>
                        <div class="widget-pie__title">Email<br> Bounced</div>
                    </div>

                    <div class="col-6 col-sm-4 col-md-6 col-lg-4 widget-pie__item">
                        <div class="easy-pie-chart" data-percent="52" data-size="80" data-track-color="rgba(0,0,0,0.25)" data-bar-color="#fff">
                            <span class="easy-pie-chart__value">52</span>
                        </div>
                        <div class="widget-pie__title">Email<br> Opened</div>
                    </div>

                    <div class="col-6 col-sm-4 col-md-6 col-lg-4 widget-pie__item">
                        <div class="easy-pie-chart" data-percent="44" data-size="80" data-track-color="rgba(0,0,0,0.25)" data-bar-color="#fff">
                            <span class="easy-pie-chart__value">44</span>
                        </div>
                        <div class="widget-pie__title">Storage<br>Remaining</div>
                    </div>

                    <div class="col-6 col-sm-4 col-md-6 col-lg-4 widget-pie__item">
                        <div class="easy-pie-chart" data-percent="78" data-size="80" data-track-color="rgba(0,0,0,0.25)" data-bar-color="#fff">
                            <span class="easy-pie-chart__value">78</span>
                        </div>
                        <div class="widget-pie__title">Web Page<br> Views</div>
                    </div>

                    <div class="col-6 col-sm-4 col-md-6 col-lg-4 widget-pie__item">
                        <div class="easy-pie-chart" data-percent="32" data-size="80" data-track-color="rgba(0,0,0,0.25)" data-bar-color="#fff">
                            <span class="easy-pie-chart__value">32</span>
                        </div>
                        <div class="widget-pie__title">Server<br> Processing</div>
                    </div>
                </div>
            </div>

            <div class="card widget-calendar">
                <div class="actions">
                    <a href="calendar.html" class="actions__item zwicon-plus"></a>
                    <div class="dropdown actions__item">
                        <i class="zwicon-more-h" data-toggle="dropdown"></i>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Refresh</a>
                            <a class="dropdown-item" href="#">Calendar Settings</a>
                        </div>
                    </div>
                </div>

                <div class="widget-calendar__header">
                    <div class="widget-calendar__year"></div>
                    <div class="widget-calendar__day"></div>
                </div>

                <div id="widget-calendar-body"></div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Server Process</h4>
                    <h6 class="card-subtitle">Maecenas faucibus mollis interdum porttitor</h6>

                    <div class="flot-chart flot-dynamic"></div>
                    <div class="flot-chart-legends flot-chart-legends--dynamic"></div>
                </div>
            </div>
        </div>

        <footer class="footer d-none d-sm-block">
            <p>© Super Admin Responsive. All rights reserved.</p>

            <ul class="footer__nav">
                <a href="#">Homepage</a>
                <a href="#">Company</a>
                <a href="#">Support</a>
                <a href="#">News</a>
                <a href="#">Contacts</a>
            </ul>
        </footer>
    </section>
</main>

<!-- Older IE warning message -->
<!--[if IE]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade to any of the following web browsers to access this website.</p>

    <div class="ie-warning__downloads">
        <a href="http://www.google.com/chrome">
            <img src="img/browsers/chrome.png" alt="">
        </a>

        <a href="https://www.mozilla.org/en-US/firefox/new">
            <img src="img/browsers/firefox.png" alt="">
        </a>

        <a href="http://www.opera.com">
            <img src="img/browsers/opera.png" alt="">
        </a>

        <a href="https://support.apple.com/downloads/safari">
            <img src="img/browsers/safari.png" alt="">
        </a>

        <a href="https://www.microsoft.com/en-us/windows/microsoft-edge">
            <img src="img/browsers/edge.png" alt="">
        </a>

        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
            <img src="img/browsers/ie.png" alt="">
        </a>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->

<!-- Javascript -->
<!-- Vendors -->
<script src="{{asset('organizer/resources/vendors/jquery/jquery.min.js')}}"></script>
<script src="{{asset('organizer/resources/vendors/popper.js/popper.min.js')}}"></script>
<script src="{{asset('organizer/resources/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('organizer/resources/vendors/overlay-scrollbars/jquery.overlayScrollbars.min.js')}}"></script>

<script src="{{asset('organizer/resources/vendors/flot/jquery.flot.js')}}"></script>
<script src="{{asset('organizer/resources/vendors/flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('organizer/resources/vendors/flot/flot.curvedlines/curvedLines.js')}}"></script>
<script src="{{asset('organizer/resources/vendors/peity/jquery.peity.min.js')}}"></script>
<script src="{{asset('organizer/resources/vendors/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('organizer/resources/vendors/jqvmap/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset('organizer/resources/vendors/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
<script src="{{asset('organizer/resources/vendors/fullcalendar/core/main.min.js')}}"></script>
<script src="{{asset('organizer/resources/vendors/fullcalendar/daygrid/main.min.js')}}"></script>

<!-- App functions and actions -->
<script src="{{asset('organizer/resources/js/app.min.js')}}"></script>
</body>
</html>
