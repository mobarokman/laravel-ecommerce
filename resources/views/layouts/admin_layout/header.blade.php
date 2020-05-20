<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/backend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/backend/css/simple-sidebar.css') }}" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" /> --}}

</head>

<body  class="">

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-sidebar shadow-sm" id="sidebar-wrapper">
            <div class="sidebar-heading text-dark"><strong>E-SHOPPING</strong></div>
            <div class="list-group list-group-flush">
                <a href="{{route('admin.dashboard')}}"
                    class="list-group-item list-group-item-action border-0">Dashboard</a>


                <a href="{{ route('admin.product.index') }}"
                    class="list-group-item list-group-item-action border-0 font-weight-bold">Product</a>

                <a href="" class="list-group-item list-group-item-action border-0 font-weight-bold">Purchase/Add Stock
                    (Null)</a>
                <span class="menu-name-color text-center">Settings</span>
                <a href="{{route('admin.category.index')}}"
                    class="list-group-item list-group-item-action border-0 font-weight-bold  {{ Route::currentRouteName() == 'admin.category.index' ? 'active' : '' }}">Category</a>
                <a href="{{ route('admin.supplier.index') }}"
                    class="list-group-item list-group-item-action border-0 font-weight-bold"> Supplier</a>
                <a href="{{ route('admin.tag.index') }}"
                    class=" list-group-item list-group-item-action border-0 font-weight-bold">Tag </a>
                <a href="{{ route('admin.product-unit.index') }}"
                    class="list-group-item list-group-item-action border-0 font-weight-bold">Product Unit</a>
               
                    
                  <span class="menu-name-color  text-center">RBAC</span>
                    
                <a class=" bg-color list-group-item list-group-item-action border-0 font-weight-bold" href="{{route('admin.roles.index')}}">Role</a>
                <a class=" bg-color list-group-item list-group-item-action border-0 font-weight-bold" href="{{route('admin.permissions.index')}}">Permission</a>
                    
                <a class=" bg-color list-group-item list-group-item-action border-0 font-weight-bold" href="{{route('admin.admin-access.index')}}">Admin Access</a>
                
                <a class=" bg-color list-group-item list-group-item-action border-0 font-weight-bold" href="{{route('admin.admin-management.index')}}">Admin Management</a>
            
            

            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light  sticky-top bg-nav">

                <!-- {{--Sidebar Menu BUtton --}} -->
                <a id="menu-toggle" href="#">
                <img src="{{asset('assets/backend/images/sidebar_menu.png')}}">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth('admin')->user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                      
                    </ul>
                </div>
            </nav>
