{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i
            class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

{{--<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-th-list"></i> Users</a></li>--}}

@if(backpack_user()->hasAnyPermission(['create bookings','edit bookings','view bookings','delete bookings'])||backpack_user()->isSuperAdmin)
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('booking-calendar') }}"><i class="nav-icon la la-th-list"></i>
            Bookings Calendar</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('booking') }}"><i class="nav-icon la la-th-list"></i>
            Bookings</a></li>
@endif
@if(backpack_user()->hasAnyPermission(['create business','edit business','view business','delete business'])||backpack_user()->isSuperAdmin)

    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('business') }}"><i
                class="nav-icon la la-th-list"></i>
            Businesses</a></li>
@endif
@if(backpack_user()->hasAnyPermission(['create inventory logs','edit inventory logs','view inventory logs','delete inventory logs'])||backpack_user()->isSuperAdmin)

    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('inventory-log') }}"><i
                class="nav-icon la la-th-list"></i> Inventory logs</a></li>
@endif
@if(backpack_user()->hasAnyPermission(['create products','edit products','view products','delete products'])||backpack_user()->isSuperAdmin)

    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('product') }}"><i class="nav-icon la la-th-list"></i>
            Products</a></li>
@endif
@if(backpack_user()->hasAnyPermission(['create services','edit services','view services','delete services'])||backpack_user()->isSuperAdmin)

    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('service') }}"><i class="nav-icon la la-th-list"></i>
            Services</a></li>
@endif
@if(backpack_user()->hasAnyPermission(['create suppliers','edit suppliers','view suppliers','delete suppliers'])||backpack_user()->isSuperAdmin)
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('supplier') }}"><i
                class="nav-icon la la-th-list"></i>
            Suppliers</a></li>
@endif
@if(backpack_user()->hasAnyPermission(['create supplier orders','edit supplier orders','view supplier orders','delete supplier orders'])||backpack_user()->isSuperAdmin)
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('supplier-order') }}"><i
                class="nav-icon la la-th-list"></i> Supplier orders</a></li>
@endif

@if(backpack_user()->hasAnyPermission(['create settings','edit settings','view settings','delete settings'])||backpack_user()->isSuperAdmin)
    <!-- Settings Only -->
    <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Settings</a>
        <ul class="nav-dropdown-items">
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('location') }}"><i
                        class="nav-icon la la-th-list"></i> Locations</a></li>

            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('holiday') }}"><i
                        class="nav-icon la la-th-list"></i>
                    Holidays</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('opening-hour') }}"><i
                        class="nav-icon la la-th-list"></i> Opening hours</a></li>

        </ul>
    </li>
@endif

@if(auth()->user()->isSuperAdmin)
    <!-- Super Admin Only -->
    <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> For Super Admin</a>
        <ul class="nav-dropdown-items">
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('solution-integrator') }}"><i
                        class="nav-icon la la-th-list"></i> Solution integrators</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i
                        class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i
                        class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('supplier-order-item') }}"><i
                        class="nav-icon la la-th-list"></i> Supplier order items</a></li>

        </ul>
    </li>
@endif
@if(backpack_user()->hasAnyPermission(['create bookings','edit bookings','view bookings','delete bookings'])||backpack_user()->isSuperAdmin)
    <!-- Users, Roles, Permissions -->
    <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
        <ul class="nav-dropdown-items">
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i
                        class="nav-icon la la-user"></i>
                    <span>Users</span></a></li>
        </ul>
    </li>
@endif

