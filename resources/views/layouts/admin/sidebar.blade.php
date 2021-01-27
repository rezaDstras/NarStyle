<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/admin/dashboard')}}" class="brand-link">
        <img src="/admin/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img
                   src={{asset("/admin/images/admin_images".\Illuminate\Support\Facades\Auth::guard('admin')->user()->image)}} class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ucwords(\Illuminate\Support\Facades\Auth::guard('admin')->user()->name)}}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    @if(\Illuminate\Support\Facades\Session::get('page')=="setting" || \Illuminate\Support\Facades\Session::get('page')=="update-admin" )
                        <?php $active = "active"; ?>
                    @else
                        <?php $active = ""; ?>
                    @endif
                    <a href="#" class="nav-link {{$active}} ">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Admin
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @if(\Illuminate\Support\Facades\Session::get('page')=="setting")
                                <?php $active = "active"; ?>
                            @else
                                <?php $active = ""; ?>
                            @endif
                            <a href="{{url('admin/setting')}}"  class="nav-link {{$active}} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Update Password</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            @if(\Illuminate\Support\Facades\Session::get('page')=="update-admin")
                                <?php $active = "active"; ?>
                            @else
                                <?php $active = ""; ?>
                            @endif
                            <a href="{{url('/admin/update-admin')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Update Detail</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu-open">
                    @if(\Illuminate\Support\Facades\Session::get('page')=="section" || \Illuminate\Support\Facades\Session::get('page')=="category" )
                        <?php $active = "active"; ?>
                    @else
                        <?php $active = ""; ?>
                    @endif
                    <a href="#" class="nav-link {{$active}} ">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Catalogues
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @if(\Illuminate\Support\Facades\Session::get('page')=="section")
                                <?php $active = "active"; ?>
                            @else
                                <?php $active = ""; ?>
                            @endif
                            <a href="{{url('admin/section')}}"  class="nav-link {{$active}} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Section</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            @if(\Illuminate\Support\Facades\Session::get('page')=="category")
                                <?php $active = "active"; ?>
                            @else
                                <?php $active = ""; ?>
                            @endif
                            <a href="{{url('/admin/category')}}" class="nav-link {{$active}} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu-open">
                    @if(\Illuminate\Support\Facades\Session::get('page')=="product" )
                        <?php $active = "active"; ?>
                    @else
                        <?php $active = ""; ?>
                    @endif
                    <a href="#" class="nav-link {{$active}} ">
                        <i class="nav-icon fas fa-tablet"></i>
                        <p>
                            Products
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @if(\Illuminate\Support\Facades\Session::get('page')=="product")
                                <?php $active = "active"; ?>
                            @else
                                <?php $active = ""; ?>
                            @endif
                            <a href="{{url('admin/product')}}"  class="nav-link {{$active}} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product</p>
                            </a>
                        </li>

                    </ul>

                </li>
                <li class="nav-item menu-open">
                    @if(\Illuminate\Support\Facades\Session::get('page')=="brand"  && \Illuminate\Support\Facades\Session::get('page')=="banner"  )
                        <?php $active = "active"; ?>
                    @else
                        <?php $active = ""; ?>
                    @endif
                    <a href="#" class="nav-link {{$active}} ">
                        <i class="nav-icon fas fa-bookmark"></i>
                        <p>
                            Brands
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @if(\Illuminate\Support\Facades\Session::get('page')=="brand")
                                <?php $active = "active"; ?>
                            @else
                                <?php $active = ""; ?>
                            @endif
                            <a href="{{url('admin/brand')}}"  class="nav-link {{$active}} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Brand</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            @if(\Illuminate\Support\Facades\Session::get('page')=="banner")
                                <?php $active = "active"; ?>
                            @else
                                <?php $active = ""; ?>
                            @endif
                            <a href="{{url('admin/banner')}}"  class="nav-link {{$active}} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Banner</p>
                            </a>
                        </li>

                    </ul>

                </li>
                <li class="nav-item menu-open">
                    @if(\Illuminate\Support\Facades\Session::get('page')=="coupon" )
                        <?php $active = "active"; ?>
                    @else
                        <?php $active = ""; ?>
                    @endif
                    <a href="#" class="nav-link {{$active}} ">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                            Coupon
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @if(\Illuminate\Support\Facades\Session::get('page')=="coupon")
                                <?php $active = "active"; ?>
                            @else
                                <?php $active = ""; ?>
                            @endif
                            <a href="{{url('admin/coupon')}}"  class="nav-link {{$active}} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Coupon</p>
                            </a>
                        </li>

                    </ul>

                </li>
            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
