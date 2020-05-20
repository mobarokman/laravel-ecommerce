@extends('layouts/admin_layout/master')
@section('content')


<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-white shadow-sm">
                <div class="card-header border-0 bg-white">
                    <span class="border-bottom-0">
                        <h4 style="display: inline;" class="card-title">Product List</h4>

                        <a style="float:right;" class=" btn btn-info add-Product-btn" data-toggle="modal"
                            data-target="#productModal" id="addButton" href="">Add Product</a>
                        <select id="perPage" class="btn btn-info" style="float: right; margin-right:5px;">
                            <option value="5" selected>5</option>
                            <option value="10">10</option>
                            <option value="30">20</option>
                            <option value="40">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <span style="float: right; margin-right:15px;">
                            <input type="text" id="search" class="form-control" style="display: inline; width: 150px;"
                                placeholder="Search">
                        </span>
                    </span>
                </div>


                <div id="productData"></div>

            </div>
        </div>
    </div>

</div>


<!-- ============================================================== -->
<!--add modal  -->
<!-- ============================================================== -->
<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.product.store')}}" method="post" id="addForm"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="inputText3" class="col-form-label">Product Name <span
                                    class="text-danger">*</span> </label>
                            <input name="product_name" id="inputText3" type="text" class="form-control"
                                placeholder="Enter tag name">
                            <span id="error-product_name" class="invalid-feedback"></span>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="inputText3" class="col-form-label">Purchase Price <span
                                    class="text-danger">*</span>
                            </label>
                            <input name="purchase_price" id="inputText3" type="text" class="form-control"
                                placeholder="Enter tag name">
                            <span id="error-price" class="invalid-feedback"></span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputText3" class="col-form-label">Sale Price <span class="text-danger">*</span>
                            </label>
                            <input name="sale_price" id="inputText3" type="text" class="form-control"
                                placeholder="Enter tag name">
                            <span id="error-price" class="invalid-feedback"></span>
                        </div>
                    </div>


                    <div class="row">

                        <div class="form-group col-md-4">
                            <label for="input-select">Product Unit</label>
                            <select name="product_unit" class="form-control" id="input-select">
                                <option>Select</option>
                                @foreach($productUnits as $unit)
                                <option value="{{ $unit->unit_id }}">{{ $unit->unit_name }}</option>
                                @endforeach
                            </select>
                            <span id="error-category" class="invalid-feedback"></span>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="input-select">Category</label>
                            <select name="category" class="form-control" id="input-select">
                                <option selected>Select</option>
                                @foreach ($categories as $category)
                                {{$category->category_name}}
                                   
                               
                                @endforeach
                            </select>
                            <span id="error-category" class="invalid-feedback"></span>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="input-select">Supplier</label>
                            <select name="supplier" class="form-control" id="input-select">
                                <option value>Select</option>
                                @foreach ($suppliers as $supplier)
                                <option value="{{$supplier->supplier_id}}"> {{$supplier->company_name}} </option>
                                @endforeach
                            </select>
                            <span id="error-supplier" class="invalid-feedback"></span>
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="input-select">Tag</label>
                            <select name="tag" class="form-control">
                                <option disabled>Select</option>
                                @foreach($tags as $tag)
                                <option value="{{ $tag->tag_id }}">{{ $tag->tag_name }}</option>
                                @endforeach
                            </select>
                            <span id="error-category" class="invalid-feedback"></span>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputText3" class="col-form-label">Weight <span class="text-danger">*</span>
                            </label>
                            <input name="weight" id="inputText3" type="text" class="form-control"
                                placeholder="Enter tag name">
                            <span id="error-weight" class="invalid-feedback"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputText3" class="col-form-label">Size <span class="text-danger">*</span>
                            </label>
                            <input name="size" id="inputText3" type="text" class="form-control"
                                placeholder="Enter tag name">
                            <span id="error-size" class="invalid-feedback"></span>
                        </div>

                    </div>


                    <div class="div">
                        <span class="">Category Photo</span>
                        <div class="custom-file mb-3">
                            <input name="photo" type="file" class="custom-file-input" id="customFile photo">
                            <label class="custom-file-label" for="customFile">Click here to upload photo</label>
                            <span id="error-photo" class="invalid-feedback"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="stock">Starting Stock</label>
                            <input name="stock_quantity" type="text" class="form-control">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="stock">Min Stock Alert</label>
                            <input name="min_quantity" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea2">Description</label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea2 description"
                            rows="4" placeholder="Write Short Description"></textarea>
                        <span id="error-description" class="invalid-feedback"></span>
                    </div>


                    <label class="custom-control custom-checkbox">
                        <input name="status" type="checkbox" class="custom-control-input"><span class="custom-control-label">Active
                            Status</span>
                    </label>

                    <div class="text-right">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- ============================================================== -->
<!--end add modal  -->
<!-- ============================================================== -->


@endsection

@section('script')

<script type="text/javascript">
    $(document).ready(function () {

        //start script 1::::
        // 1.notice-data, 2.search, 3.perPage, 4.pagination, 5.function for script 1.
        productData();

        $("#search").keyup(function () {
            productData();
        });

        $("#perPage").change(function () {
            productData();
        });

        $("#productData").on("click", ".page-link", function (event) {
            event.preventDefault();
            var url = $(this).attr("href");
            productData(url);
        });

        function productData(url = "{{ route('admin.productData') }}") {
            var search = $("#search").val();
            var perPage = $("#perPage").val();

            $.ajax({
                url: url,
                data: {
                    search: search,
                    perPage: perPage,

                },
                method: "get",
                dataType: "html",
                success: function (data) {
                    $("#productData").html(data);
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
                        $('#productModal').modal('hide');
                        console.log('ook')
                        productData()

                    } //else

                }, //success method from ajax
            }); //ajax
        }); //submit from#form

        //start script 3:::

        // //load edit modal with selected id
        // $("#productData").on('click', "#editButton", function(e) {
        //     $("#editproductModal").on("show.bs.modal", function(e) {
        //         var link = $(e.relatedTarget);
        //         $(this).find(".modal-content").load(link.attr("href"));
        //     });

        //    //edit notice ajax submit and validation
        //     $(document).on('submit', 'form#editproductForm', function (event) {
        //         event.preventDefault();

        //         var form = $(this);
        //         var data = new FormData($(this)[0]);
        //         var url = form.attr("action");
        //         var method = form.attr("method");

        //         $.ajax({
        //             type: method,
        //             url: url,
        //             data: data,
        //             cache: false,
        //             contentType: false,
        //             processData: false,
        //             success: function (data) {
        //                 $('.is-invalid').removeClass('is-invalid');
        //                 if (data.fail) {   
        //                     for (control in data.errors) {
        //                         $('input[name=' + control + ']').addClass('is-invalid');
        //                         $('textarea[name=' + control + ']').addClass('is-invalid');
        //                         $('#error-' + control).html(data.errors[control]);
        //                         }
        //                 } else {
        //                     $('#editproductModal').modal('hide');
        //                     productData();
        //                 } //else

        //             }, //success method from ajax
        //         }); // this ajax
        //     });  //submit from#editNoticeForm

        // }); //#noticeData || #editButton
        // //end script 3

        //           //start script 4:::
        //   //delete notice
        //   $("#productData").on('click', "#deleteButton", function(e) {
        //edit notice ajax submit and validation
        // $(document).on('submit', 'form#deleteForm', function (event) {
        // event.preventDefault();
        // var form = $(this);
        // var data = new FormData($(this)[0]);
        // var url = form.attr("action");
        // var method = form.attr("method");

        // $.ajax({
        //     type: method,
        //     url: url,
        //     data: data,
        //     cache: false,
        //     contentType: false,
        //     processData: false,
        //     success: function (data) {
        //             alert('Record deleted');
        //             productData();
        //         } 

        //     }); //this ajax

        // }); //#deleteForm
        // }); //#deleteButton

        // //end script 4


    });

</script>

@endsection
