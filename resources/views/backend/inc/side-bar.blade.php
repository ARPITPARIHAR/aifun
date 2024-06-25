<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="{{ route('admin.business-setting') }}">
                    <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                    <span class="pcoded-mtext">{{ __('Business Settings') }}</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.practice_areas.index') }}">
                    <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                    <span class="pcoded-mtext">{{ __('Practice Areas') }}</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.case-studies.index') }}">
                    <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                    <span class="pcoded-mtext">{{ __('Case Studies') }}</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.laws.index') }}">
                    <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                    <span class="pcoded-mtext">{{ __('Laws') }}</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.teams.index') }}">
                    <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                    <span class="pcoded-mtext">{{ __('Teams') }}</span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('admin.clients.index') }}">
                    <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                    <span class="pcoded-mtext">{{ __('Clients') }}</span>
                </a>
            </li>
            {{-- <li class="">
                <a href="{{ route('admin.blog.index') }}">
                    <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                    <span class="pcoded-mtext">{{ __('Practice Areas') }}</span>
                </a>
            </li> --}}
            <li class="">
                <a href="{{ route('admin.contact.index') }}">
                    <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                    <span class="pcoded-mtext">{{ __('Contact Table') }}</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.consult.index') }}">
                    <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                    <span class="pcoded-mtext">{{ __('Consult Table') }}</span>
                </a>
            </li>

            <li class="pcoded-hasmenu active pcoded-trigger">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                    <span class="pcoded-mtext">{{ __('Customers') }}</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="active">
                        <a href="{{ route('admin.customers.index') }}">
                            <span class="pcoded-mtext">{{ __('Customer') }}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('admin.cases.index') }}">
                            <span class="pcoded-mtext">{{ __('Cases') }}</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ route('admin.billings.index') }}">
                            <span class="pcoded-mtext">{{ __('Billings') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="{{ route('admin.sliders.index') }}">
                    <span class="pcoded-micon"><i class="feather icon-file"></i></span>
                    <span class="pcoded-mtext">{{ __('Silders') }}</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.pages.index') }}">
                    <span class="pcoded-micon"><i class="feather icon-file"></i></span>
                    <span class="pcoded-mtext">{{ __('Pages') }}</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
