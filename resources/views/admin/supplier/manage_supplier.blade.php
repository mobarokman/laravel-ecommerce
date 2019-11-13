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
            <h2 class="pageheader-title manage-category">Manage Supplier </h2>
        <a href="" class=" btn btn-info add-category-btn" data-toggle="modal" data-target="#supplierModal" id="addButton">Add Supplier</a>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Supplier</li>
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
                <h5 class="tbl-head" >Supplier List</h5>
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
                        <input id="search"  class="form-control" type="text" placeholder="Search supplier..."><span class="input-group-btn">
                        <button class="btn btn-secondary" type="button"><i class="fas fa-search"></i></button></span>
                    </div>
                </div> <!-- search box -->
            </div> <!-- card header -->
            <div class="card-body">
                <div class="table-responsive ">
                      <!-- ::::::::::::::::::::::::: -->
                    <!-- category data come form ajax load in this "categoryData" id -->
                    <!-- ::::::::::::::::::::::::: -->
                    <div id="supplierData">

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
    <div class="modal fade" id="supplierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Supplier</h5>
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin.supplier.store')}}" method="post" id="addForm">
                            @csrf 
                           <div class="row">
                                <div class="form-group col-md-6">
                                        <label for="inputText3" class="col-form-label">Company/Supplier Name <span class="text-danger">*</span> </label>
                                        <input name="company_name" id="inputText3" type="text" class="form-control" placeholder="Enter tag name">
                                        <span id="error-company_name" class="invalid-feedback"></span>
                                    </div>

                                <div class="form-group col-md-6">
                                        <label for="inputText3" class="col-form-label">Contact Name</label>
                                        <input name="contact_name" id="inputText3" type="text" class="form-control" placeholder="Enter tag name">
                                        <span id="error-contact_name" class="invalid-feedback"></span>
                                    </div>
                           </div>

                           <div class="row">
                                <div class="form-group col-md-4">
                                        <label for="inputText3" class="col-form-label">Email <span class="text-danger">*</span> </label>
                                        <input name="email" id="inputText3" type="text" class="form-control" placeholder="Enter tag name">
                                        <span id="error-email" class="invalid-feedback"></span>
                                    </div>
                                <div class="form-group col-md-4">
                                        <label for="inputText3" class="col-form-label">Phone <span class="text-danger">*</span> </label>
                                        <input name="phone" id="inputText3" type="text" class="form-control" placeholder="Enter tag name">
                                        <span id="error-phone" class="invalid-feedback"></span>
                                    </div>
                                <div class="form-group col-md-4">
                                        <label for="inputText3" class="col-form-label">Fax</label>
                                        <input name="fax" id="inputText3" type="text" class="form-control" placeholder="Enter tag name">
                                        <span id="error-fax" class="invalid-feedback"></span>
                                    </div>
                           </div>
                           
                        
                           
                           <div class="row">
                                <div class="form-group col-md-4">
                                        <label for="exampleFormControlTextarea1">Address  <span class="text-danger">*</span> </label>
                                        <textarea name="address" class="form-control" id="exampleFormControlTextarea1 description" rows="3" placeholder="Write Short Description"></textarea>
                                        <span id="error-address" class="invalid-feedback"></span>
                                    </div>

                                <div class="form-group col-md-8">
                                        <label for="exampleFormControlTextarea2">Short Description</label>
                                        <textarea name="description" class="form-control" id="exampleFormControlTextarea2 description" rows="3" placeholder="Write Short Description"></textarea>
                                        <span id="error-description" class="invalid-feedback">thth</span>
                                    </div>
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
    supplierData();

    $("#search").keyup(function(){
        supplierData();
    });

    $("#perPage").change(function(){
        supplierData();
    });

    $("#supplierData").on("click", ".page-link", function(event){
        event.preventDefault();
        var url = $(this).attr("href");
        supplierData(url);
    });

    function supplierData(url="{{ route('admin.supplierData') }}"){
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
                $("#supplierData").html(data);
            }
        }); //this ajax
    } //noticeData function
    //end script 1.
    
         //add category
        $(document).on('submit', 'form#addForm', function (event) {
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
                            console.log('#error-' + control)
                            }
                    } else {
                        $('#supplierModal').modal('hide');
                        console.log('ook')
                    supplierData()
                    
                    } //else

                }, //success method from ajax
            }); //ajax
        });  //submit from#form



  });
</script>

@endsection