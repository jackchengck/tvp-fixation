{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i
            class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

{{--<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-th-list"></i> Users</a></li>--}}


<li class="nav-item"><a class="nav-link" href="{{ backpack_url('booking') }}"><i class="nav-icon la la-th-list"></i>
        Bookings</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('business') }}"><i class="nav-icon la la-th-list"></i>
        Businesses</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('inventory-log') }}"><i
            class="nav-icon la la-th-list"></i> Inventory logs</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('product') }}"><i class="nav-icon la la-th-list"></i>
        Products</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('service') }}"><i class="nav-icon la la-th-list"></i>
        Services</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('supplier') }}"><i class="nav-icon la la-th-list"></i>
        Suppliers</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('supplier-order') }}"><i
            class="nav-icon la la-th-list"></i> Supplier orders</a></li>

<!-- Settings Only -->
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Settings</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('location') }}"><i
                    class="nav-icon la la-th-list"></i> Locations</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('supplier-order-item') }}"><i
                    class="nav-icon la la-th-list"></i> Supplier order items</a></li>

    </ul>
</li>

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
        </ul>
    </li>
@endif

<!-- Users, Roles, Permissions -->
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i>
                <span>Users</span></a></li>
    </ul>
</li>
