<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Administration - Pug Ventures, LLC</title>

        <link href="{{ URL::asset('css/ionicons.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/perfect-scrollbar.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/toggles-full.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('libs/summernote/summernote-bs4.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('libs/dropzone/dropzone.css') }}" rel="stylesheet">
        
        <link rel="stylesheet" href="{{ URL::asset('css/amanda.css') }}">

        <!-- I know this is not "good", but it's easier to work with inline jQuery this way -->
        <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('libs/summernote/summernote-bs4.min.js') }}"></script>
        <script src="{{ URL::asset('libs/dropzone/dropzone.js') }}"></script>
    </head>

    <body>

        <div class="am-header">
            <div class="am-header-left">
                <a id="naviconLeft" href="" class="am-navicon d-none d-lg-flex"><i class="icon ion-navicon-round"></i></a>
                <a id="naviconLeftMobile" href="" class="am-navicon d-lg-none"><i class="icon ion-navicon-round"></i></a>
                <a href="{{ url('/dashboard') }}" class="am-logo">Pug Ventures, LLC</a>
            </div><!-- am-header-left -->

            <div class="am-header-right">
                <div class="dropdown dropdown-notification">
                    <a href="" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
                        <i class="icon fas fa-bell tx-24"></i>
                        <!-- start: if statement -->
                        <!--<span class="square-8 bg-danger pos-absolute t-15 r-0 rounded-circle"></span>-->
                        <!-- end: if statement -->
                    </a>
                    <div class="dropdown-menu wd-300 pd-0-force">
                        <div class="dropdown-menu-header">
                            <label>Notifications</label>
                            <a href="">Mark All as Read</a>
                        </div><!-- d-flex -->

                        <div class="media-list">
                            <!-- loop starts here -->
                            <!--<a href="" class="media-list-link read">
                                <div class="media pd-x-20 pd-y-15">
                                    <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
                                    <div class="media-body">
                                        <p class="tx-13 mg-b-0"><strong class="tx-medium">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                                        <span class="tx-12">October 03, 2017 8:45am</span>
                                    </div>
                                </div>
                            </a>-->
                            <!-- loop ends here -->

                            <div class="media-list-footer">
                                <a href="" class="tx-12"><i class="fa fa-angle-down mg-r-5"></i> Show All Notifications</a>
                            </div>
                        </div><!-- media-list -->
                    </div><!-- dropdown-menu -->
                </div><!-- dropdown -->
                <div class="dropdown dropdown-profile">
                    <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                        <img src="@if($user->avatar) {{ URL::asset('img/avatars/' . $user->avatar) }} @else {{ URL::asset('img/avatars/missing.png') }} @endif" class="wd-32 rounded-circle" alt="">
                        <span class="logged-name"><span class="hidden-xs-down">{{ $user->name }}</span> <i class="fa fa-angle-down mg-l-3"></i></span>
                    </a>
                    <div class="dropdown-menu wd-200">
                        <ul class="list-unstyled user-profile-nav">
                            <li><a href="{{ url('/logout') }}"><i class="icon ion-power"></i> Logout</a></li>
                        </ul>
                    </div><!-- dropdown-menu -->
                </div><!-- dropdown -->
            </div><!-- am-header-right -->
        </div><!-- am-header -->

        <div class="am-sideleft">
            <ul class="nav am-sideleft-tab">
                <li class="nav-item">
                    <a href="#mainMenu" class="nav-link active"><i class="icon fas fa-home tx-24"></i></a>
                </li>
                <li class="nav-item">
                    <a href="#emailMenu" class="nav-link"><i class="icon fas fa-envelope tx-24"></i></a>
                </li>
                <li class="nav-item">
                    <a href="#notificationsMenu" class="nav-link"><i class="icon fas fa-bell tx-24"></i></a>
                </li>
                <li class="nav-item">
                    <a href="#settingMenu" class="nav-link"><i class="icon fas fa-cogs tx-24"></i></a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="mainMenu" class="tab-pane active">
                    <ul class="nav am-sideleft-menu">
                        <li class="nav-item">
                            <a href="{{ url('/dashboard') }}" class="nav-link">
                                <i class="icon fas fa-home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li><!-- nav-item -->
                        <li class="nav-item">
                            <a href="" class="nav-link with-sub">
                                <i class="icon far fa-money-bill-alt"></i>
                                <span>Orders</span>
                            </a>
                            <ul class="nav-sub">
                                <li class="nav-item"><a href="{{ url('/orders') }}" class="nav-link">All Orders</a></li>
                                <li class="nav-item"><a href="{{ url('/orders/abandoned-carts') }}" class="nav-link">Abandoned Carts</a></li>
                            </ul>
                        </li><!-- nav-item -->
                        <li class="nav-item">
                            <a href="" class="nav-link with-sub">
                                <i class="icon fas fa-tags"></i>
                                <span>Products</span>
                            </a>
                            <ul class="nav-sub">
                                <li class="nav-item"><a href="{{ url('/products') }}" class="nav-link">All Products</a></li>
                                <li class="nav-item"><a href="{{ url('/products/collections') }}alerts.html" class="nav-link">Collections</a></li>
                            </ul>
                        </li><!-- nav-item -->
                        <li class="nav-item">
                            <a href="" class="nav-link with-sub">
                                <i class="icon fas fa-user"></i>
                                <span>Customers</span>
                            </a>
                            <ul class="nav-sub">
                                <li class="nav-item"><a href="{{ url('customers') }}" class="nav-link">All Customers</a></li>
                            </ul>
                        </li><!-- nav-item -->
                        <li class="nav-item">
                            <a href="" class="nav-link with-sub">
                                <i class="icon fas fa-chart-pie"></i>
                                <span>Analytics</span>
                            </a>
                            <ul class="nav-sub">
                                <li class="nav-item"><a href="map-google.html" class="nav-link">Dashboards</a></li>
                                <li class="nav-item"><a href="map-vector.html" class="nav-link">Reports</a></li>
                            </ul>
                        </li><!-- nav-item -->
                        <li class="nav-item">
                            <a href="" class="nav-link with-sub">
                                <i class="icon fas fa-columns"></i>
                                <span>Sales Channels</span>
                            </a>
                            <ul class="nav-sub">
                                <li class="nav-item"><a href="{{ url('\channels\web') }}" class="nav-link">Web</a></li>
                                <li class="nav-item"><a href="{{ url('\channels\facebook') }}" class="nav-link">Facebook</a></li>
                            </ul>
                        </li><!-- nav-item -->

                    </ul>
                </div><!-- #mainMenu -->
                <div id="emailMenu" class="tab-pane">
                    <div class="pd-x-20 pd-y-10">
                        <a href="" class="btn btn-orange btn-block btn-compose">Compose Email</a>
                    </div>
                    <ul class="nav am-sideleft-menu">
                        <li class="nav-item">
                            <a href="{{ url('\mail\inbox') }}" class="nav-link">
                                <i class="icon fas fa-inbox"></i>
                                <span>Inbox</span>
                            </a>
                        </li><!-- nav-item -->
                        <li class="nav-item">
                            <a href="{{ url('\mail\drafts') }}" class="nav-link">
                                <i class="icon fas fa-tasks"></i>
                                <span>Drafts</span>
                            </a>
                        </li><!-- nav-item -->
                        <li class="nav-item">
                            <a href="{{ url('\mail\sent') }}" class="nav-link">
                                <i class="icon fas fa-paper-plane"></i>
                                <span>Sent</span>
                            </a>
                        </li><!-- nav-item -->
                        <li class="nav-item">
                            <a href="{{ url('\mail\deleted') }}" class="nav-link">
                                <i class="icon fas fa-trash-alt"></i>
                                <span>Trash</span>
                            </a>
                        </li><!-- nav-item -->
                    </ul>

                    <!--<label class="pd-x-20 tx-uppercase tx-11 mg-t-10 tx-orange mg-b-0 tx-medium">Folders</label>
                    <ul class="nav am-sideleft-menu">
                        <li class="nav-item">
                            <a href="page-inbox.html" class="nav-link">
                                <i class="icon ion-ios-folder-outline"></i>
                                <span>Updates</span>
                            </a>
                        </li>
                    </ul>-->
                </div><!-- #emailMenu -->
                <div id="notificationsMenu" class="tab-pane">
                    <div class="chat-search-bar">
                        <input type="search" class="form-control wd-150" placeholder="Search notifications...">
                        <button class="btn btn-secondary"><i class="fas fa-search"></i></button>
                    </div><!-- chat-search-bar -->

                    <label class="pd-x-15 tx-uppercase tx-11 mg-t-20 tx-orange mg-b-10 tx-medium">Notifications</label>
                    <div class="list-group list-group-chat">
                        <!--<a href="#" class="list-group-item">
                            <div class="d-flex align-items-center">
                                <img src="../img/img6.jpg" class="wd-32 rounded-circle" alt="">
                                <div class="mg-l-10">
                                    <h6>Russell M. Evans</h6>
                                    <span>Tuesday, 10:33am</span>
                                </div>
                            </div>
                            <p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain...</p>
                        </a>-->

                    </div><!-- list-group -->

                </div><!-- #notificationsMenu -->
                <div id="settingMenu" class="tab-pane">
                    <!--<div class="pd-x-15">
                        <label class="tx-uppercase tx-11 mg-t-10 tx-orange mg-b-15 tx-medium">Quick Settings</label>
                        <div class="bd pd-15">
                            <h6 class="tx-13 tx-normal tx-gray-800">Daily Newsletter</h6>
                            <p class="tx-12">Get notified when someone else is trying to access your account.</p>
                            <div class="toggle toggle-light warning"></div>
                        </div>

                        
                    </div>-->
                </div><!-- #settingMenu -->
            </div><!-- tab-content -->
        </div><!-- am-sideleft -->

        <div class="am-pagetitle">
            <h5 class="am-title">@yield('title')</h5>
            <form id="searchBar" class="search-bar" action="index.html">
                <div class="form-control-wrapper">
                    <input type="search" class="form-control bd-0" placeholder="Search...">
                </div><!-- form-control-wrapper -->
                <button id="searchBtn" class="btn btn-orange"><i class="fa fa-search"></i></button>
            </form><!-- search-bar -->
        </div><!-- am-pagetitle -->

        <div class="am-mainpanel">
            <div class="am-pagebody">

                @yield('content')

            </div><!-- am-pagebody -->
        </div><!-- am-mainpanel -->

        <script defer src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script>
        <script src="{{ URL::asset('js/popper.js') }}"></script>
        <script src="{{ URL::asset('js/bootstrap.js') }}"></script>
        <script src="{{ URL::asset('js/perfect-scrollbar.jquery.js') }}"></script>
        <script src="{{ URL::asset('js/toggles.min.js') }}"></script>
        
        <script src="{{ URL::asset('js/amanda.js') }}"></script>

    </body>
</html>
