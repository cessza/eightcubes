<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
        <a href="index..blade.php" class="brand-link">
            <img src="{{ asset('../images/front_images/Logo/LogoW.png')}}" alt="eight-cubes" class="brand-image img-circle elevation-3"
            style="opacity: .8">
            <span class="brand-text font-weight-light">8 CUBES</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                <img src="{{ asset('images/admin_images/admin_photos/'.Auth::guard('admin')->user()->image)}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ ucwords(Auth::guard('admin')->user()->name) }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                    <li class="nav-header">Contents</li>
                    @if(Session::get('page')=="index")
                        <?php $active = "active"; ?>
                    @else 
                        <?php $active = ""; ?>
                    @endif
                    <li class="nav-item">
                        <a href="{{ url('admin/index')}}" class="nav-link {{ $active }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                Dashboard
                                </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="order-list.blade.html" class="nav-link">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>
                                Order List
                                </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="customer-list.blade.php" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                                <p>
                                Customer List
                                </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/sales.blade.php" class="nav-link">
                            <i class="nav-icon fas fa-chart-line"></i>
                                <p>
                                    Sales
                                </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="payment.blade.php" class="nav-link">
                            <i class="nav-icon fab fa-paypal"></i>
                                <p>
                                    Payment
                                </p>
                            </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="report.blade.php" class="nav-link">
                            <i class="nav-icon fas fa-info-circle"></i>
                                <p>
                                    Report
                                </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="maintenance.blade.html" class="nav-link">
                            <i class="nav-icon fas fa-user-cog"></i>
                                <p>
                                    Maintenance
                                </p>
                            </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="backup.blade.php" class="nav-link">
                            <i class="nav-icon fas fa-trash-restore"></i>
                                <p>
                                    Back-up & Restore
                                </p>
                        </a>
                    </li>     
                            @if(Session::get('page')=="settings" || Session::get('page')=="update-admin-details")
                                <?php $active = "active"; ?>
                            @else 
                                <?php $active = ""; ?>
                            @endif
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link {{$active}}">
                            <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    Settings            
                                    <i class="nav-icon right fas fa-angle-left"></i>
                                </p>
                            </a>
                        <ul class="nav nav-treeview">
                            @if(Session::get('page')=="settings")
                                <?php $active = "active"; ?>
                            @else 
                                <?php $active = ""; ?>
                            @endif
                            <li class="nav-item">
                                <a href="{{url('admin/settings')}}" class="nav-link {{$active}}">
                                    <i class="far fa-circle nav-icon"></i>
                                        <p>Update Password</p>
                                </a>
                            </li>
                            @if(Session::get('page')=="update-admin-details")
                                <?php $active = "active"; ?>
                            @else 
                                <?php $active = ""; ?>
                            @endif
                            <li class="nav-item">
                                <a href="{{url('admin/update-admin-details')}}" class="nav-link {{$active}}">
                                    <i class="far fa-circle nav-icon"></i>
                                        <p>Update Admin Details</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                            @if(Session::get('page')=="categories" || Session::get('page')=="subcategories" || Session::get('page')=="products" || Session::get('page')=="banners")
                                <?php $active = "active"; ?>
                            @else 
                                <?php $active = ""; ?>
                            @endif
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link {{$active}}">
                            <i class="nav-icon fas fa-list-ol"></i>
                                <p>
                                Catalogues
                                <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                        <ul class="nav nav-treeview">
                            @if(Session::get('page')=="categories")
                                <?php $active = "active"; ?>
                            @else 
                                <?php $active = ""; ?>
                            @endif
                            <li class="nav-item">
                                <a href="{{url('admin/categories')}}" class="nav-link {{$active}}">
                                    <i class="far fa-circle nav-icon"></i>
                                        <p>Categories</p>
                                </a>
                            </li>
                                @if(Session::get('page')=="subcategories")
                                    <?php $active = "active"; ?>
                                @else 
                                    <?php $active = ""; ?>
                                @endif
                            <li class="nav-item">
                                <a href="{{url('admin/subcategories')}}" class="nav-link {{$active}}">
                                    <i class="far fa-circle nav-icon"></i>
                                        <p>Sub Categories</p>
                                </a>
                            </li>
                                @if(Session::get('page')=="products")
                                    <?php $active = "active"; ?>
                                @else 
                                    <?php $active = ""; ?>
                                @endif
                            <li class="nav-item">
                                <a href="{{url('admin/products')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                        <p>Products</p>
                                </a>
                            </li> 
                                @if(Session::get('page')=="banners")
                                    <?php $active = "active"; ?>
                                @else 
                                    <?php $active = ""; ?>
                                @endif
                            <li class="nav-item">
                                <a href="{{url('admin/banners')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                        <p>Banners</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
</aside>
<!--end of side bar-->