@section('title', 'Category')

@section('css')
<meta name="_token" content="{{csrf_token()}}" />
@endsection

@extends('layouts/admin_layout/master')
@section('content')


<!-- ============================================================== -->
<!-- pageheader  -->
<!-- ============================================================== -->
<div class="row" id="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title manage-category"> Product View </h2>
            <a href="" class=" btn btn-info add-category-btn" data-toggle="modal" data-target="#productModal"
                id="addButton">Add Product</a>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product</li>
                        <li class="breadcrumb-item active" aria-current="page">Product</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- end pageheader  -->
<!-- ============================================================== -->

<div class="row">
    <div class="col-md-8">
        <h2><strong>Product Name:</strong> {{$product->product_name}} </h2>
        <h2><strong>Product Supplier:</strong> {{$product->supplier_id}} </h2>

        <h2><strong>Product category:</strong> {{$product->subcategory->sub_category_name}} </h2>
        <h2><strong>Product Name:</strong> {{$product->product_name}} </h2>
        <h2><strong>Product Name:</strong> {{$product->product_name}} </h2>

    </div>

</div>
<!--end row-->




@endsection

@section('js')


@endsection
