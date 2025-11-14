<div class="dashboard-menu">
    <ul class="nav flex-column" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('customer/dashboard') ? 'active' : '' }} "  href="{{route('customer.dashboard')}}" ><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('customer/orders*') ? 'active' : '' }}" href="{{route('customer.orders')}}" ><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link"  href="#track-orders"  ><i class="fi-rs-shopping-cart-check mr-10"></i>My Review</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link {{ Request::is('customer/profile*') ? 'active' : '' }}" href="{{route('customer.profile')}}" ><i class="fi-rs-user mr-10"></i>Account details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('customer/change-password*') ? 'active' : '' }}" href="{{route('customer.changePassword')}}" ><i class="fi-rs-marker mr-10"></i>Change Password</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="page-login-register.html"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
        </li>
    </ul>
</div>