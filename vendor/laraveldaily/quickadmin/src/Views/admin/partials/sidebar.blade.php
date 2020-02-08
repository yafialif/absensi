
<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-menu-user img-radius" src="admin/assets/images/avatar-4.jpg" alt="User-Profile-Image">
                <div class="user-details">
                    <p id="more-details">John Doe<i class="feather icon-chevron-down m-l-10"></i></p>
                </div>
            </div>
            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="user-profile.html">
                            <i class="feather icon-user"></i>View Profile
                        </a>
                        <a href="#!">
                            <i class="feather icon-settings"></i>Settings
                        </a>
                        <a href="auth-normal-sign-in.html">
                            <i class="feather icon-log-out"></i>Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="pcoded-navigation-label">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            @if(Auth::user()->role_id == config('quickadmin.defaultRole'))
                <li @if(Request::path() == config('quickadmin.route').'/menu') class="active" @endif>
                    <a href="{{ url(config('quickadmin.route').'/menu') }}" class="waves-effect waves-dark">
									<span class="pcoded-micon">
										<i class="feather icon-menu"></i>
									</span>
                        <span class="pcoded-mtext">{{ trans('quickadmin::admin.partials-sidebar-menu') }}</span>
                    </a>
                </li>
                <li @if(Request::path() == 'users') class="active" @endif>
                    <a href="{{ url('users') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                        <i class="fa fa-users"></i>
                            </span>
                        <span class="pcoded-mtext">{{ trans('quickadmin::admin.partials-sidebar-users') }}</span>
                    </a>
                </li>
                <li @if(Request::path() == 'roles') class="active" @endif>
                    <a href="{{ url('roles') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-gavel"></i>
                        </span>
                        <span class="pcoded-mtext">{{ trans('quickadmin::admin.partials-sidebar-roles') }}</span>
                    </a>
                </li>
                <li @if(Request::path() == config('quickadmin.route').'/actions') class="active" @endif>
                    <a href="{{ url(config('quickadmin.route').'/actions') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                        <i class="fa fa-users"></i>
                        </span>
                        <span class="pcoded-mtext">{{ trans('quickadmin::admin.partials-sidebar-user-actions') }}</span>
                    </a>
                </li>
            @endif
                @foreach($menus as $menu)
                    @if($menu->menu_type != 2 && is_null($menu->parent_id))
                        @if(Auth::user()->role->canAccessMenu($menu))
                            <li @if(isset(explode('/',Request::path())[1]) && explode('/',Request::path())[1] == strtolower($menu->name)) class=" pcoded-hasmenu active pcoded-trigger" @endif>
                                <a href="{{ route(config('quickadmin.route').'.'.strtolower($menu->name).'.index') }}">
                                    <i class="fa {{ $menu->icon }}"></i>
                                    <span class="title">{{ $menu->title }}</span>
                                </a>
                            </li>
                        @endif
                    @else
                        @if(Auth::user()->role->canAccessMenu($menu) && !is_null($menu->children()->first()) && is_null($menu->parent_id))
                            <li>
                                <a href="#">
                                    <i class="fa {{ $menu->icon }}"></i>
                                    <span class="title">{{ $menu->title }}</span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    @foreach($menu['children'] as $child)
                                        @if(Auth::user()->role->canAccessMenu($child))
                                            <li
                                                    @if(isset(explode('/',Request::path())[1]) && explode('/',Request::path())[1] == strtolower($child->name)) class="active active-sub" @endif>
                                                <a href="{{ route(strtolower(config('quickadmin.route').'.'.$child->name).'.index') }}" class="waves-effect waves-dark">
                                                    <i class="fa {{ $child->icon }}"></i>
                                                    <span class="title">
                                                    {{ $child->title  }}
                                                </span>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endif
                @endforeach


        </ul>
    </div>
</nav>