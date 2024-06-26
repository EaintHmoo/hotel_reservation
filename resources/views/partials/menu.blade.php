<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <span class="app-brand-logo demo">

            </span>
            <span class="app-brand-text demo menu-text text-sm fw-bold ms-2">{{trans("panel.site_title")}}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
            <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-divider mt-0"></div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <!-- Dashboards -->
        <li class="menu-item {{ request()->is('admin') ? 'active' : '' }}">
            <a href="{{ route('admin.home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div> Dashboard</div>
            </a>
        </li>

        {{-- user management --}}
        @can('user_management_access')
            <li
                class="menu-item  {{ request()->is('admin/permissions*') ? 'active open' : '' }} {{ request()->is('admin/roles*') ? 'active open' : '' }} {{ request()->is('admin/users*') ? 'active open' : '' }} {{ request()->is('admin/audit-logs*') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="Dashboards">User management</div>
                </a>
                <ul class="menu-sub">
                    @can('permission_access')
                        <li
                            class="menu-item  {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.permissions.index') }}" class="menu-link">
                                <div data-i18n="Analytics"> {{ trans('cruds.permission.title') }}</div>
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li
                            class="menu-item {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.roles.index') }}" class="menu-link">
                                <div data-i18n="eCommerce"> {{ trans('cruds.role.title') }}</div>
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li
                            class="menu-item {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.users.index') }}" class="menu-link">
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan

        {{-- Form --}}
        @can('form_access')
            <li
                class="menu-item {{ request()->is('admin/reservation-forms') || request()->is('admin/reservation-forms/*') ? 'active' : '' }}">
                <a href="{{ route('admin.reservation-forms.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-book-content"></i>
                    <div> {{ trans('cruds.reservationForm.title') }}</div>
                </a>
            </li>
        @endcan


        {{-- profile password --}}
        @if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li
                    class="menu-item  {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                    <a href="{{ route('profile.password.edit') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-key"></i>
                        <div> {{ trans('global.change_password') }}</div>
                    </a>
                </li>
            @endcan
        @endif

        {{-- logout --}}
        <li class="menu-item d-none">
            <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-key"></i>
                <div> {{ trans('global.logout') }}</div>
            </a>
        </li>

    </ul>
</aside>
