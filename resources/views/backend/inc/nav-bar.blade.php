<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">

        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="feather icon-menu"></i>
            </a>
            <a href="{{ route('home') }}">
                <img class="img-fluid" src="{{businessSetting(1)->admin_logo}}" width="150" alt="Theme-Logo">
            </a>
            <a class="mobile-options">
                <i class="feather icon-more-horizontal"></i>
            </a>
        </div>

        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li class="header-search">
                    <div class="main-search morphsearch-search">
                        <div class="input-group">
                            <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                            <input type="text" class="form-control">
                            <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()">
                        <i class="feather icon-maximize full-screen"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav-right">
                <li class="header-notification">
                    <div class="dropdown-primary dropdown">
                        @php
                            $total_notifications=App\Models\Notification::where('view',0)->count();
                        @endphp
                        <div class="dropdown-toggle" @if($total_notifications>0) data-toggle="dropdown" @endif>
                            <i class="feather icon-bell"></i>
                            <span class="badge bg-c-pink">{{ $total_notifications }}</span>
                        </div>
                        <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li>
                                <h6>Notifications</h6>
                                <label class="label label-danger">New</label>
                            </li>
                            @foreach (App\Models\Notification::where('view',0)->take(10)->latest()->get() as $notification)
                            <li>
                                <div class="media">
                                    <img class="d-flex align-self-center img-radius" src="{{ asset('backend/assets/images/avatar-4.jpg') }}" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5 class="notification-user">{{ $notification->user->name }}</h5>
                                        <p class="notification-msg">{{ $notification->title }}</p>
                                        <span class="notification-time">{{ date('d-m-Y h:iA',strtotime($notification->created_at)) }}</span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li class="user-profile header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('backend/assets/images/avatar-4.jpg') }}" class="img-radius" alt="User-Profile-Image">
                            <span>{{ auth()->user()->name ?? 'Admin' }}</span>
                            <i class="feather icon-chevron-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li>
                                <a href="{{ route('admin.business-setting') }}">
                                    <i class="feather icon-settings"></i> Settings
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.profile') }}">
                                    <i class="feather icon-user"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}">
                                    <i class="feather icon-log-out"></i> Logout
                                </a>
                            </li>
                        </ul>

                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
