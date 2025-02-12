@if (isset($currentUser) && config('twill.enabled.users-management'))
    @php
        $user_management_route = config('twill.admin_route_name_prefix') . 'users.index';
        if ($currentUser->can('edit-users')) {
            $user_management_route = config('twill.admin_route_name_prefix') . 'users.index';
        } elseif ($currentUser->can('edit-user-roles')) {
            $user_management_route = config('twill.admin_route_name_prefix') . 'roles.index';
        } elseif ($currentUser->can('edit-user-groups')) {
            $user_management_route = config('twill.admin_route_name_prefix') . 'groups.index';
        }
    @endphp

    <ul>
        <li class="header__item {{ request()->routeIs(config('twill.admin_route_name_prefix') . 'users.edit') ? 's--on' : '' }}">
            <a href="{{ route(config('twill.admin_route_name_prefix') . 'users.edit', $currentUser->id) }}"
                @click.prevent="$refs.userDropdown.toggle()">
                {{ $currentUser->role === 'SUPERADMIN' ? twillTrans('twill::lang.nav.admin') : $currentUser->name }}
            </a>
        </li>
        @if ($currentUser->can('access-user-management'))
            <li class="header__item header__subitem {{ request()->routeIs($user_management_route) ? 's--on' : '' }}">
                <a href="{{ route($user_management_route) }}">{{ twillTrans('twill::lang.nav.cms-users') }}</a>
            </li>
        @endif
        <li class="header__item header__subitem {{ request()->routeIs(config('twill.admin_route_name_prefix') . 'users.edit') ? 's--on' : '' }}">
            <a
                href="{{ route(config('twill.admin_route_name_prefix') . 'users.edit', $currentUser->id) }}">{{ twillTrans('twill::lang.nav.profile') }}</a>
        </li>
        <li class="header__item header__subitem">
            <a href="#" data-logout-btn>{{ twillTrans('twill::lang.nav.logout') }}</a>
        </li>
    </ul>
@endif
