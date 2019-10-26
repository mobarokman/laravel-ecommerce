@section('title', 'Category')

@section('css')
<meta name="_token" content="{{csrf_token()}}" />
@endsection

@extends('layouts/master')
@section('content')


<!-- ============================================================== -->
<!-- pageheader  -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title manage-category">Manage Category </h2>
            <a href="#" class=" btn btn-info add-category-btn" data-toggle="modal" data-target="#catModal" id="open">Add Category</a>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Category</li>
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
                <h5 class="tbl-head" >Category List</h5>
                <div class="search-box">
                    <div class="input-group input-search">
                        <input class="form-control" type="text" placeholder="Search mail..."><span class="input-group-btn">
                        <button class="btn btn-secondary" type="button"><i class="fas fa-search"></i></button></span>
                    </div>
                </div> <!-- search box -->
            </div> <!-- card header -->
            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category as $cat)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$cat->category_name}}</td>
                                <td>{{$cat->description}}</td>
                                <td>{{$cat->photo}}</td>
                                <td>{{$cat->status}}</td>
                                <td> <button class="btn btn-sm btn-outline-light">
                                                <i class=" fas fa-edit"></i>
                                            </button>
                                <button class="btn btn-sm btn-outline-light">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$category->links()}}
                </div>
            </div> <!--card body --> 
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end responsive table -->
    <!-- ============================================================== -->
</div> <!--end row-->


                         
    <!-- ============================================================== -->
    <!-- modal  -->
    <!-- ============================================================== -->
    <!-- Modal -->
    <div class="modal fade" id="catModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                </div>
                <div class="modal-body">
                    <form action="{{route('category.store')}}" method="post" id="form">
                        @csrf 
                        <div class="form-group">
                                <label for="inputText3" class="col-form-label">Category Name</label>
                                <input name="category_name" id="inputText3 cat_name" type="text" class="form-control" placeholder="Enter category name">
                                <span id="error-category_name" class="invalid-feedback"></span>
                            </div>

                            <div class="div">
                                <span class="">Category Photo</span>
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
    <!-- modal  -->
    <!-- ============================================================== -->


@endsection

@section('js')

<script type="text/javascript" >

  $(document).ready(function(){
    
     
    $(document).on('submit', 'form#form', function (event) {
        event.preventDefault();
        var form = $(this);
        var data = new FormData($(this)[0]);
      
        var url = form.attr("action");
        var method = form.attr("method");

        var cat_name = $("#cat_name").val();
        var photo = $("#photo").val();
        var description = $("#description").val();
        
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
                    $('#catModal').modal('hide');
                    location.reload();
                } //else

            }, //success method from ajax
        }); //ajax
      });  //submit from#form
      


    
  });
</script>

@endsection