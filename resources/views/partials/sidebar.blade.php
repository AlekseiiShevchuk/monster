@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.dashboard')</span>
                </a>
            </li>

            
            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('role_access')
                <li class="{{ $request->segment(1) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.roles.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_access')
                <li class="{{ $request->segment(1) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('quickadmin.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('monster_part_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-child"></i>
                    <span class="title">@lang('quickadmin.monster-parts.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('hair_access')
                <li class="{{ $request->segment(1) == 'hairs' ? 'active active-sub' : '' }}">
                        <a href="{{ route('hairs.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.hair.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('mask_access')
                <li class="{{ $request->segment(1) == 'masks' ? 'active active-sub' : '' }}">
                        <a href="{{ route('masks.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.mask.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('body_access')
                <li class="{{ $request->segment(1) == 'bodies' ? 'active active-sub' : '' }}">
                        <a href="{{ route('bodies.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.body.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('suit_access')
                <li class="{{ $request->segment(1) == 'suits' ? 'active active-sub' : '' }}">
                        <a href="{{ route('suits.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.suit.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('test_access')
            <li class="{{ $request->segment(1) == 'tests' ? 'active' : '' }}">
                <a href="{{ route('tests.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.tests.title')</span>
                </a>
            </li>
            @endcan
            
            @can('result_access')
            <li class="{{ $request->segment(1) == 'results' ? 'active' : '' }}">
                <a href="{{ route('results.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.results.title')</span>
                </a>
            </li>
            @endcan
            <li class="{{ $request->segment(1) == 'localizations' ? 'active' : '' }}">
                <a href="{{ route('localizations.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.localizations.title')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('quickadmin.logout')</button>
{!! Form::close() !!}