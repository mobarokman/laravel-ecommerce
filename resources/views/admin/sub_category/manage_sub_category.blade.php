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
            <h2 class="pageheader-title manage-category">Manage Category</h2>
        <a href="" class=" btn btn-info add-category-btn" data-toggle="modal" data-target="#subCatModal" id="addButton">Add SubCategory</a>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">SubCategory</li>
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
    <!-- ============================================================== -->
    <!-- responsive table -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="tbl-head" >SubCategory List</h5>
                {{-- per page --}}
                <select id="perPage" class="btn btn-info" style=" margin-left:10px;">
                    <option value="5" selected="1">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                </select>
                {{-- search box --}}
                <div class="search-box">
                    <div class="input-group input-search">
                        <input id="search"  class="form-control" type="text" placeholder="Search mail..."><span class="input-group-btn">
                        <button class="btn btn-secondary" type="button"><i class="fas fa-search"></i></button></span>
                    </div>
                </div> <!-- search box -->
            </div> <!-- card header -->
            <div class="card-body">
                <div class="table-responsive ">
                      <!-- ::::::::::::::::::::::::: -->
                    <!-- category data come form ajax load in this "categoryData" id -->
                    <!-- ::::::::::::::::::::::::: -->
                    <div id="subCategoryData">

                    </div>
                </div>
            </div> <!--card body --> 
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end responsive table -->
    <!-- ============================================================== -->
</div> <!--end row-->


                         
    <!-- ============================================================== -->
    <!--add modal  -->
    <!-- ============================================================== -->
    <!-- Modal -->
    <div class="modal fade" id="subCatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add SubCategory</h5>
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin.sub-category.store')}}" method="post" id="subCatAddForm">
                            @csrf 
                            <div class="form-group">
                                <label for="input-select">Main Category</label>
                                <select name="category_name" class="form-control" id="input-select">
                                    <option selected>Select</option>
                                    @foreach ($category as $cat)
                                    <option value="{{$cat->category_id}}"> {{$cat->category_name}} </option>
                                    @endforeach
                                </select>
                                <span id="error-category_name" class="invalid-feedback"></span>
                            </div>
                            <div class="form-group">
                                    <label for="inputText3" class="col-form-label">SubCategory Name</label>
                                    <input name="sub_category_name" id="inputText3 cat_name" type="text" class="form-control" placeholder="Enter category name">
                                    <span id="error-sub_category_name" class="invalid-feedback"></span>
                                </div>
                
                                <div class="div">
                                    <span class="">Photo</span>
                                    <div class="custom-file mb-3">
                                        <input name="photo" type="file" class="custom-file-input" id="customFile photo">
                                        <label class="custom-file-label" for="customFile">Click here to upload photo</label>    
                                    <span id="error-photo" class="invalid-feedback"></span>
                                    </div>
                                </div>
                            
                            
                            <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Short Description</label>
                                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1 description" rows="3" placeholder="Write Short Description"></textarea>
                                    <span id="error-description" class="invalid-feedback"></span>
                                </div>
                
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Active Status</span>
                                </label>
                
                                <button type="submit"  class="btn btn-primary" id="ajaxSubmit">Submit</button>       
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                    </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!--end add modal  -->
    <!-- ============================================================== -->




@endsection

@section('js')

<script type="text/javascript" >

  $(document).ready(function(){

    //start script 1::::
    // 1.notice-data, 2.search, 3.perPage, 4.pagination, 5.function for script 1.
    subCategoryData();

    $("#search").keyup(function(){
        subCategoryData();
    });

    $("#perPage").change(function(){
        subCategoryData();
    });

    $("#subCategoryData").on("click", ".page-link", function(event){
        event.preventDefault();
        var url = $(this).attr("href");
        subCategoryData(url);
    });

    function subCategoryData(url="{{ route('admin.subCategoryData') }}"){
        var search = $("#search").val();
        var perPage = $("#perPage").val();

        $.ajax({
            url: url,
            data: {
                search:search,
                perPage:perPage,
                
            },
            method: "get",
            dataType: "html",
            success: function(data){
                $("#subCategoryData").html(data);
            }
        }); //this ajax
    } //noticeData function
    //end script 1.

    //add sub-category
    $(document).on('submit', 'form#subCatAddForm', function (event) {
        event.preventDefault();
        var form = $(this);
        var data = new FormData($(this)[0]);
        var url = form.attr("action");
        var method = form.attr("method");
        
        $.ajax({
            type: method,
            url: url,
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('.is-invalid').removeClass('is-invalid');
                if (data.fail) {   
                    for (control in data.errors) {
                        $('input[name=' + control + ']').addClass('is-invalid');
                        $('textarea[name=' + control + ']').addClass('is-invalid');
                        $('#error-' + control).html(data.errors[control]);
                        }
                } else {
                    $('#subCatModal').modal('hide');
                    subCategoryData()
                } //else

            }, //success method from ajax
        }); //ajax
    });  //submit from#form
    
 
});
</script>

@endsection