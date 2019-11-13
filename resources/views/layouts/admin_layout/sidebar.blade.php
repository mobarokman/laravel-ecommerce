        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                         
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.dashboard')}}"><i class="fa fa-fw fa-rocket"></i>Dashboard</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Product Categories</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('admin.category.index')}}">Main Category</a>
                                        </li>
                                        
                                        <li class="nav-item">
                                        <a class="nav-link" href="{{route('admin.sub-category.index')}}">Sub Category</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.tag.index')}}"><i class="fa fa-fw fa-rocket"></i>Product Tag</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.supplier.index')}}"><i class="fa fa-fw fa-rocket"></i>Supplier Company</a>
                            </li>
                         
                                      
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- ============================================================== -->
<!-- end left sidebar -->
<!-- ============================================================== -->


<!-- ============================================================== -->
<!-- second wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
