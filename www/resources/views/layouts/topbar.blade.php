<header id="page-topbar">
    <div class="navbar-header">
        <div class="container-fluid">
            <div class="float-right">

                <div class="dropdown d-none d-lg-inline-block ml-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="mdi mdi-fullscreen"></i>
                    </button>
                </div>

{{--                <div class="dropdown d-inline-block">--}}
{{--                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                        <i class="mdi mdi-bell-outline"></i>--}}
{{--                        <span class="badge badge-danger badge-pill">3</span>--}}
{{--                    </button>--}}
{{--                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-notifications-dropdown">--}}
{{--                        <div class="p-3">--}}
{{--                            <div class="row align-items-center">--}}
{{--                                <div class="col">--}}
{{--                                    <h6 class="m-0"> Notifications </h6>--}}
{{--                                </div>--}}
{{--                                <div class="col-auto">--}}
{{--                                    <a href="#!" class="small"> View All</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div data-simplebar style="max-height: 230px;">--}}
{{--                            <a href="" class="text-reset notification-item">--}}
{{--                                <div class="media">--}}
{{--                                    <div class="avatar-xs mr-3">--}}
{{--                                        <span class="avatar-title bg-primary rounded-circle font-size-16">--}}
{{--                                            <i class="bx bx-cart"></i>--}}
{{--                                        </span>--}}
{{--                                    </div>--}}
{{--                                    <div class="media-body">--}}
{{--                                        <h6 class="mt-0 mb-1">Your order is placed</h6>--}}
{{--                                        <div class="font-size-12 text-muted">--}}
{{--                                            <p class="mb-1">If several languages coalesce the grammar</p>--}}
{{--                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a href="" class="text-reset notification-item">--}}
{{--                                <div class="media">--}}
{{--                                    <img src="images/users/avatar-3.jpg" class="mr-3 rounded-circle avatar-xs" alt="user-pic">--}}
{{--                                    <div class="media-body">--}}
{{--                                        <h6 class="mt-0 mb-1">James Lemire</h6>--}}
{{--                                        <div class="font-size-12 text-muted">--}}
{{--                                            <p class="mb-1">It will seem like simplified English.</p>--}}
{{--                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a href="" class="text-reset notification-item">--}}
{{--                                <div class="media">--}}
{{--                                    <div class="avatar-xs mr-3">--}}
{{--                                        <span class="avatar-title bg-success rounded-circle font-size-16">--}}
{{--                                            <i class="bx bx-badge-check"></i>--}}
{{--                                        </span>--}}
{{--                                    </div>--}}
{{--                                    <div class="media-body">--}}
{{--                                        <h6 class="mt-0 mb-1">Your item is shipped</h6>--}}
{{--                                        <div class="font-size-12 text-muted">--}}
{{--                                            <p class="mb-1">If several languages coalesce the grammar</p>--}}
{{--                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}

{{--                            <a href="" class="text-reset notification-item">--}}
{{--                                <div class="media">--}}
{{--                                    <img src="images/users/avatar-4.jpg" class="mr-3 rounded-circle avatar-xs" alt="user-pic">--}}
{{--                                    <div class="media-body">--}}
{{--                                        <h6 class="mt-0 mb-1">Salena Layfield</h6>--}}
{{--                                        <div class="font-size-12 text-muted">--}}
{{--                                            <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>--}}
{{--                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="p-2 border-top">--}}
{{--                            <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">--}}
{{--                                <i class="mdi mdi-arrow-right-circle mr-1"></i> View More..--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="{{asset('images/users/avatar-2.jpg')}}" alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ml-1">
                            @if(\Illuminate\Support\Facades\Auth::check())
                                {{auth()->user()->name}}
                            @endif
                        </span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle mr-1"></i> Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>


            </div>
            <div>
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="index" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{asset('images/logo-sm.png')}}" alt="" height="20">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('images/images/logo-dark.png')}}" alt="" height="17">
                        </span>
                    </a>

                    <a href="index" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{asset('images/logo-sm.png')}}" alt="" height="20">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('images/logo-light.png')}}" alt="" height="19">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect" id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

{{--                <!-- App Search-->--}}
{{--                <form class="app-search d-none d-lg-inline-block">--}}
{{--                    <div class="position-relative">--}}
{{--                        <input type="text" class="form-control" placeholder="Search...">--}}
{{--                        <span class="bx bx-search-alt"></span>--}}
{{--                    </div>--}}
{{--                </form>--}}
            </div>

        </div>
    </div>
</header>
