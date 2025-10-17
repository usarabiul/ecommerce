<aside class="app-aside app-aside-expand-md app-aside-light">
    <div class="aside-content">
        <!-- Sidebar Menu -->
        <div class="aside-menu overflow-hidden">
            <nav id="stacked-menu" class="stacked-menu">
                <ul class="menu">

                    <!-- Dashboard -->
                    <li class="menu-item {{ Request::is('admin/dashboard') ? 'has-active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}" class="menu-link">
                            <span class="menu-icon fas fa-home"></span>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="menu-item {{ Request::is('admin/my-profile') ? 'has-active' : '' }}">
                        <a href="{{route('admin.myProfile')}}" class="menu-link">
                            <span class="menu-icon fas fa-user"></span>
                            <span class="menu-text">My Profile</span>
                        </a>
                    </li>

                    <!-- Blog Posts -->
                    <li class="menu-item has-child {{ Request::is('admin/posts*') ? 'has-open has-active' : '' }}">
                        <a href="javascript:;" class="menu-link">
                            <span class="menu-icon far fa-file"></span>
                            <span class="menu-text">Blog Posts</span>
                        </a>
                        <ul class="menu">
                            <li class="menu-item {{ Request::is('admin/posts') ? 'has-active' : '' }}">
                                <a href="{{ route('admin.posts') }}" class="menu-link">Blogs List</a>
                            </li>
                            <li class="menu-item {{ Request::is('admin/posts/create') ? 'has-active' : '' }}">
                                <a href="{{ route('admin.postsAction',['create']) }}" class="menu-link">New Blog</a>
                            </li>
                            <li class="menu-item {{ Request::is('admin/posts/categories*') ? 'has-active' : '' }}">
                                <a href="{{ route('admin.postsCategories') }}" class="menu-link">Categories</a>
                            </li>
                            <li class="menu-item {{ Request::is('admin/posts/comments*') ? 'has-active' : '' }}">
                                <a href="{{ route('admin.postsCommentsAll') }}" class="menu-link">Comments</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Pages -->
                    <li class="menu-item {{ Request::is('admin/pages*') ? 'has-active' : '' }}">
                        <a href="{{ route('admin.pages') }}" class="menu-link">
                            <span class="menu-icon fas fa-edit"></span>
                            <span class="menu-text">Pages</span>
                        </a>
                    </li>

                    <!-- Media Assets -->
                    <li class="menu-item {{ Request::is('admin/medies*') ? 'has-active' : '' }}">
                        <a href="{{ route('admin.medies') }}" class="menu-link">
                            <span class="menu-icon fas fa-images"></span>
                            <span class="menu-text">Media Assets</span>
                        </a>
                    </li>

                    <li class="menu-header">Ecommerce Unit</li>

                    <!-- Order Management -->
                    <li class="menu-item {{ Request::is('admin/orders*') ? 'has-active' : '' }}">
                        <a href="{{route('admin.orders')}}" class="menu-link">
                            <span class="menu-icon fas fa-briefcase"></span>
                            <span class="menu-text">Order Management</span>
                        </a>
                    </li>

                    <!-- Products -->
                    <li class="menu-item has-child {{ Request::is('admin/products*') ? 'has-open' : '' }}">
                        <a href="javascript:;" class="menu-link">
                            <span class="menu-icon fas fa-shopping-cart"></span>
                            <span class="menu-text">Products Lists</span>
                        </a>
                        <ul class="menu">
                            <li class="menu-item
                            {{ 
                                (Request::is('admin/products*') 
                                    && !Request::is('admin/products/categories*') 
                                    && !Request::is('admin/products/brands*') 
                                    && !Request::is('admin/products/tags*') 
                                    && !Request::is('admin/products/attributes*') 
                                    && !Request::is('admin/products/reviews*') 
                                ) ? 'has-active' : '' 
                            }}
                            "><a href="{{route('admin.products')}}" class="menu-link">All Products</a></li>
                            <li class="menu-item "><a href="{{route('admin.productsAction','create')}}" class="menu-link">New Products</a></li>
                            <li class="menu-item {{ Request::is('admin/products/categories*') ? 'has-active' : '' }}"><a href="{{route('admin.productsCategories')}}" class="menu-link">Categories</a></li>
                            <li class="menu-item {{ Request::is('admin/products/brands*') ? 'has-active' : '' }}"><a href="{{route('admin.productsBrands')}}" class="menu-link">Brands</a></li>
                            <li class="menu-item {{ Request::is('admin/products/tags*') ? 'has-active' : '' }}"><a href="{{route('admin.productsTags')}}" class="menu-link">Tags</a></li>
                            <li class="menu-item {{ Request::is('admin/products/attributes*') ? 'has-active' : '' }}"><a href="{{route('admin.productsAttributes')}}" class="menu-link">Attributes</a></li>
                            <li class="menu-item {{ Request::is('admin/products/reviews*') ? 'has-active' : '' }}"><a href="{{route('admin.productsReview')}}" class="menu-link">Reviews</a></li>
                        </ul>
                    </li>

                    <li class="menu-item {{ Request::is('admin/pos-orders*') ? 'has-active' : '' }}">
                        <a href="{{ route('admin.posOrdersAction','sale') }}" class="menu-link">
                            <span class="menu-icon fas fa-shopping-cart"></span>
                            <span class="menu-text">POS Sale</span>
                        </a>
                    </li>

                    <!-- Ecommerce Setting (Static for now) -->
                    <li class="menu-item has-child">
                        <a href="javascript:;" class="menu-link">
                            <span class="menu-icon fas fa-store"></span>
                            <span class="menu-text">Ecommerce Setting</span>
                        </a>
                        <ul class="menu">
                            <li class="menu-item"><a href="{{route('admin.ecommerceSetting')}}" class="menu-link">Settings</a></li>
                            <li class="menu-item"><a href="{{route('admin.ecommerceCoupons')}}" class="menu-link">Coupons</a></li>
                            <li class="menu-item"><a href="component-badges.html" class="menu-link">Promotion</a></li>
                        </ul>
                    </li>

                    <li class="menu-header">General Widgets</li>

                    <!-- Clients -->
                    <li class="menu-item {{ Request::is('admin/clients*') ? 'has-active' : '' }}">
                        <a href="{{ route('admin.clients') }}" class="menu-link">
                            <span class="menu-icon fas fa-users"></span>
                            <span class="menu-text">Clients</span>
                        </a>
                    </li>

                    <!-- Sliders -->
                    <li class="menu-item {{ Request::is('admin/sliders*') ? 'has-active' : '' }}">
                        <a href="{{ route('admin.sliders') }}" class="menu-link">
                            <span class="menu-icon fas fa-image"></span>
                            <span class="menu-text">Sliders</span>
                        </a>
                    </li>

                    <!-- Galleries -->
                    <li class="menu-item {{ Request::is('admin/galleries*') ? 'has-active' : '' }}">
                        <a href="{{ route('admin.galleries') }}" class="menu-link">
                            <span class="menu-icon fas fa-images"></span>
                            <span class="menu-text">Galleries</span>
                        </a>
                    </li>

                    <!-- Menus -->
                    <li class="menu-item {{ Request::is('admin/menus*') ? 'has-active' : '' }}">
                        <a href="{{ route('admin.menus') }}" class="menu-link">
                            <span class="menu-icon fas fa-bars"></span>
                            <span class="menu-text">Menus List</span>
                        </a>
                    </li>

                    <li class="menu-header">User Management</li>

                    <!-- Admin Users -->
                    <li class="menu-item has-child {{ Request::is('admin/users/admin*') ? 'has-open has-active' : '' }}">
                        <a href="javascript:;" class="menu-link">
                            <span class="menu-icon fas fa-user-shield"></span>
                            <span class="menu-text">Admin Users</span>
                        </a>
                        <ul class="menu">
                            <li class="menu-item {{ Request::is('admin/users/admin') ? 'has-active' : '' }}">
                                <a href="{{ route('admin.usersAdmin') }}" class="menu-link">Admin List</a>
                            </li>
                            <li class="menu-item"><a href="charts-chartjs.html" class="menu-link">Roles Permission</a></li>
                        </ul>
                    </li>

                    <!-- All Users -->
                    <li class="menu-item {{ Request::is('admin/users/customer*') ? 'has-active' : '' }}">
                        <a href="{{ route('admin.usersCustomer') }}" class="menu-link">
                            <span class="menu-icon fas fa-user-circle"></span>
                            <span class="menu-text">All Users</span>
                        </a>
                    </li>

                    <li class="menu-header">Report Management</li>

                    <!-- Reports -->
                    <li class="menu-item has-child">
                        <a href="javascript:;" class="menu-link">
                            <span class="menu-icon fas fa-chart-bar"></span>
                            <span class="menu-text">Reports List</span>
                        </a>
                        <ul class="menu">
                            <li class="menu-item"><a href="component-alerts.html" class="menu-link">Summary Reports</a></li>
                            <li class="menu-item"><a href="component-accordions.html" class="menu-link">Product Reports</a></li>
                            <li class="menu-item"><a href="component-badges.html" class="menu-link">Order Reports</a></li>
                            <li class="menu-item"><a href="component-badges.html" class="menu-link">User Reports</a></li>
                            <li class="menu-item"><a href="component-badges.html" class="menu-link">Blog Reports</a></li>
                        </ul>
                    </li>
					<li class="menu-header">Apps Setting</li>
                    <!-- App Settings -->
                    <li class="menu-item has-child {{ Request::is('admin/setting*') ? 'has-open has-active' : '' }}">
                        <a href="javascript:;" class="menu-link">
                            <span class="menu-icon fas fa-cogs"></span>
                            <span class="menu-text">Settings</span>
                        </a>
                        <ul class="menu">
                            <li class="menu-item {{ Request::is('admin/setting/general') ? 'has-active' : '' }}">
                                <a href="{{ route('admin.setting','general') }}" class="menu-link">General Settings</a>
                            </li>
                            <li class="menu-item {{ Request::is('admin/setting/mail') ? 'has-active' : '' }}">
                                <a href="{{ route('admin.setting','mail') }}" class="menu-link">Mail Setting</a>
                            </li>
                            <li class="menu-item {{ Request::is('admin/setting/sms') ? 'has-active' : '' }}">
                                <a href="{{ route('admin.setting','sms') }}" class="menu-link">SMS Setting</a>
                            </li>
                            <li class="menu-item {{ Request::is('admin/setting/social') ? 'has-active' : '' }}">
                                <a href="{{ route('admin.setting','social') }}" class="menu-link">Social Setting</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Support -->
                    <li class="menu-item">
                        <a href="{{ route('admin.setting','document') }}" target="_blank" class="menu-link">
                            <span class="menu-icon fas fa-headset"></span>
                            <span class="menu-text">Support</span>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</aside>

