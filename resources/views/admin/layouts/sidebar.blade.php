<aside class="app-aside app-aside-expand-md app-aside-light">
    <!-- .aside-content -->
    <div class="aside-content">
      <!-- .aside-header -->
      <header class="aside-header d-block d-md-none">
        <!-- .btn-account -->
        <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside"><span class="user-avatar user-avatar-lg"><img src="assets/images/avatars/profile.jpg" alt=""></span> <span class="account-icon"><span class="fa fa-caret-down fa-lg"></span></span> <span class="account-summary"><span class="account-name">Beni Arisandi</span> <span class="account-description">Marketing Manager</span></span></button> <!-- /.btn-account -->
        <!-- .dropdown-aside -->
        <div id="dropdown-aside" class="dropdown-aside collapse">
          <!-- dropdown-items -->
          <div class="pb-3">
            <a class="dropdown-item" href="user-profile.html"><span class="dropdown-icon oi oi-person"></span> Profile</a> <a class="dropdown-item" href="auth-signin-v1.html"><span class="dropdown-icon oi oi-account-logout"></span> Logout</a>
            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Help Center</a> <a class="dropdown-item" href="#">Ask Forum</a> <a class="dropdown-item" href="#">Keyboard Shortcuts</a>
          </div><!-- /dropdown-items -->
        </div><!-- /.dropdown-aside -->
      </header><!-- /.aside-header -->
      <!-- .aside-menu -->
      <div class="aside-menu overflow-hidden">
        <!-- .stacked-menu -->
        <nav id="stacked-menu" class="stacked-menu">
          <!-- .menu -->
          <ul class="menu">
            <!-- .menu-item -->
            <li class="menu-item has-active">
              <a href="index.html" class="menu-link"><span class="menu-icon fas fa-home"></span> <span class="menu-text">Dashboard</span></a>
            </li><!-- /.menu-item -->
            <!-- .menu-item -->
            <li class="menu-item has-child">
              <a href="#" class="menu-link"><span class="menu-icon far fa-file"></span> <span class="menu-text">App Pages</span> <span class="badge badge-warning">New</span></a> <!-- child menu -->
              <ul class="menu">
                <li class="menu-item">
                  <a href="page-clients.html" class="menu-link">Clients</a>
                </li>
                <li class="menu-item">
                  <a href="page-teams.html" class="menu-link">Teams</a>
                </li>
                <li class="menu-item has-child">
                  <a href="#" class="menu-link">Team</a> <!-- grand child menu -->
                  <ul class="menu">
                    <li class="menu-item">
                      <a href="page-team.html" class="menu-link">Overview</a>
                    </li>
                    <li class="menu-item">
                      <a href="page-team-feeds.html" class="menu-link">Feeds</a>
                    </li>
                    <li class="menu-item">
                      <a href="page-team-projects.html" class="menu-link">Projects</a>
                    </li>
                    <li class="menu-item">
                      <a href="page-team-members.html" class="menu-link">Members</a>
                    </li>
                  </ul><!-- /grand child menu -->
                </li>
              <ul>
            </li>
          </ul>
        </nav>
      </div>
    </div>
</aside>

{{--
  
  
<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{asset(general()->favicon())}}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Ecommerce</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="{{route('admin.dashboard')}}">
						<div class="parent-icon"><i class='bx bx-home'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				<li class="{{Request::is('admin/posts*')? 'mm-active' : ''}}">
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-spa' ></i>
						</div>
						<div class="menu-title">Blog Posts</div>
					</a>
					<ul class="mm-collapse {{Request::is('admin/posts*')? 'mm-show' : ''}}">
						<li class="
            @if( Request::is('admin/posts/categories*') || Request::is('admin/posts/comments*') )
            @else
            {{Request::is('admin/posts*')? 'mm-active' : ''}}
            @endif 
            "> <a href="{{route('admin.posts')}}"><i class="bx bx-right-arrow-alt"></i>Blogs List</a>
						</li>
						<li> <a href="{{route('admin.postsAction',['create'])}}"><i class="bx bx-right-arrow-alt"></i>New Blog</a>
						</li>
						<li class="{{Request::is('admin/posts/categories*')? 'mm-active' : ''}}" > <a href="{{route('admin.postsCategories')}}"><i class="bx bx-right-arrow-alt"></i>Categories</a>
						</li>
						<li class="{{Request::is('admin/posts/comments*')? 'mm-active' : ''}}"> <a href="{{route('admin.postsCommentsAll')}}"><i class="bx bx-right-arrow-alt"></i>Comments</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="{{route('admin.pages')}}">
						<div class="parent-icon"><i class='bx bx-edit'></i>
						</div>
						<div class="menu-title">Pages</div>
					</a>
				</li>
				<li>
					<a href="{{route('admin.medies')}}">
						<div class="parent-icon"><i class='bx bx-images'></i>
						</div>
						<div class="menu-title">Media Assets</div>
					</a>
				</li>
				<li class="menu-label">Ecommerce Unit</li>
				<li>
					<a href="widgets.html">
						<div class="parent-icon"><i class='bx bx-briefcase-alt-2'></i>
						</div>
						<div class="menu-title">Order Management</div>
					</a>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart-alt' ></i>
						</div>
						<div class="menu-title">Products Lists</div>
					</a>
					<ul>
						<li> <a href="ecommerce-products.html"><i class="bx bx-right-arrow-alt"></i>All Products</a>
						</li>
						<li> <a href="ecommerce-products-details.html"><i class="bx bx-right-arrow-alt"></i>New Products</a>
						</li>
						<li> <a href="ecommerce-add-new-products.html"><i class="bx bx-right-arrow-alt"></i>Categories</a>
						</li>
						<li> <a href="ecommerce-orders.html"><i class="bx bx-right-arrow-alt"></i>Attributes</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-list-minus'></i>
						</div>
						<div class="menu-title">Ecommerce Setting</div>
					</a>
					<ul>
						<li> <a href="component-alerts.html"><i class="bx bx-right-arrow-alt"></i>Settings</a>
						</li>
						<li> <a href="component-accordions.html"><i class="bx bx-right-arrow-alt"></i>Coupons</a>
						</li>
						<li> <a href="component-badges.html"><i class="bx bx-right-arrow-alt"></i>Promotion</a>
						</li>
					</ul>
				</li>
				<li class="menu-label">General widgets</li>
				<li>
					<a href="{{route('admin.clients')}}">
						<div class="parent-icon"><i class='bx bx-grid-alt'></i>
						</div>
						<div class="menu-title">Clients</div>
					</a>
				</li>
				<li>
					<a href="{{route('admin.brands')}}">
						<div class="parent-icon"><i class='bx bx-grid-alt'></i>
						</div>
						<div class="menu-title">Brands</div>
					</a>
				</li>
				<li>
					<a href="{{route('admin.sliders')}}">
						<div class="parent-icon"><i class='bx bx-image'></i>
						</div>
						<div class="menu-title">Sliders</div>
					</a>
				</li>
				<li>
					<a href="{{route('admin.galleries')}}">
						<div class="parent-icon"><i class='bx bx-images'></i>
						</div>
						<div class="menu-title">Galleries</div>
					</a>
				</li>
				<li>
					<a href="{{route('admin.menus')}}">
						<div class="parent-icon"><i class='bx bx-menu'></i>
						</div>
						<div class="menu-title">Menus List</div>
					</a>
				</li>
				
				<li class="menu-label">User Management</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-user"></i>
						</div>
						<div class="menu-title">Admin Users</div>
					</a>
					<ul>
						<li> <a href="{{route('admin.usersAdmin')}}"><i class="bx bx-right-arrow-alt"></i>Admin list</a>
						</li>
						<li> <a href="charts-chartjs.html"><i class="bx bx-right-arrow-alt"></i>Roles Permission</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="{{route('admin.usersCustomer')}}">
						<div class="parent-icon"><i class='bx bx-user-circle'></i>
						</div>
						<div class="menu-title">All Users</div>
					</a>
				</li>
				<li class="menu-label">Report Management</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-bar-chart-alt-2"></i>
						</div>
						<div class="menu-title">Reports List </div>
					</a>
					<ul>
						<li> <a href="component-alerts.html"><i class="bx bx-right-arrow-alt"></i>Summery Reports</a>
						</li>
						<li> <a href="component-accordions.html"><i class="bx bx-right-arrow-alt"></i>Product Reports</a>
						</li>
						<li> <a href="component-badges.html"><i class="bx bx-right-arrow-alt"></i>Order Reports</a>
						</li>
						<li> <a href="component-badges.html"><i class="bx bx-right-arrow-alt"></i>User Reports</a>
						</li>
						<li> <a href="component-badges.html"><i class="bx bx-right-arrow-alt"></i>Blog Reports</a>
						</li>
					</ul>
				</li>
				<li class="menu-label">Apps Setting</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-cog"></i>
						</div>
						<div class="menu-title">Setting </div>
					</a>
					<ul>
						<li> <a href="{{route('admin.setting','general')}}"><i class="bx bx-right-arrow-alt"></i>General Settings</a>
						</li>
						<li> <a href="{{route('admin.setting','mail')}}"><i class="bx bx-right-arrow-alt"></i>Mail Setting</a>
						</li>
						<li> <a href="{{route('admin.setting','sms')}}"><i class="bx bx-right-arrow-alt"></i>SMS Setting</a>
						</li>
						<li> <a href="{{route('admin.setting','social')}}"><i class="bx bx-right-arrow-alt"></i>Social Setting</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="{{route('admin.setting','document')}}" target="_blank">
						<div class="parent-icon"><i class='bx bx-headphone' ></i>
						</div>
						<div class="menu-title">Support</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>
--}}
\