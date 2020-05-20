@extends('layouts/admin_layout/master')
@section('content')


    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-white shadow-sm">
                    <div class="card-header border-0 bg-white">
                    <span class="border-bottom-0">
                        <h4 style="display: inline;" class="card-title">Category List</h4>

                        <a style="float:right;" class=" btn btn-info add-category-btn" data-toggle="modal"
                           data-target="#catModal" id="addButton" href="">Add Category</a>
                      <select id="perPage" class="btn btn-info" style="float: right; margin-right:5px;">
                            <option value="5" selected>5</option>
                            <option value="10">10</option>
                                            <option value="30">20</option>
                          <option value="40">30
                          </option>
                            <option value="50">50</option>
                            <option value="100">100</option>


                        </select>
                        <span style="float: right; margin-right:15px;">
                            <input type="text" id="search" class="form-control" style="display: inline; width: 150px;"
                                   placeholder="Search">
                        </span>
                    </span>
                    </div>


                    <div id="categoryData"></div>

                </div>
            </div>
        </div>

    </div>






    <!-- ============================================================== -->
    <!--add modal  -->
    <!-- ============================================================== -->
    <!-- Modal -->
    <div class="modal fade" id="catModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.category.store')}}" method="post" id="addForm">
                        @csrf

                        <div class="form-group">
                            <label for="">Category</label>
                            <input name="category_name" class="form-control" type="text" placeholder="cat name">

                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="parent_id" class="form-control" id="">
                                <option value="">Select</option>
                                <option>opti</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Category Image</label>
                            <input name="photo" class="" type="file">
                        </div>

                        <div class="form-group">
                            <label for="Des">Des</label>
                            <textarea name="des" class="form-control" rows="4"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <input name="featured" type="checkbox">
                            </div>
                            <div class="col-md-4">
                                <input name="menu" type="checkbox">
                            </div>
                            <div class="col-md-4">
                                <input type="checkbox" name="status">
                            </div>
                        </div>


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

@section('dscript')

    <script type="text/javascript">
        $(document).ready(function () {

            //start script 1::::
            // 1.notice-data, 2.search, 3.perPage, 4.pagination, 5.function for script 1.
            categoryData();

            $("#search").keyup(function () {
                categoryData();
            });

            $("#perPage").change(function () {
                categoryData();
            });

            $("#categoryData").on("click", ".page-link", function (event) {
                event.preventDefault();
                var url = $(this).attr("href");
                categoryData(url);
            });

            function categoryData(url = "{{ route('admin.categoryData') }}") {
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
                        $("#categoryData").html(data);
                    }
                }); //this ajax
            } //noticeData function
            //end script 1.

            //add category
            $(document).on('submit', 'form#addForm', function (event) {
                event.preventDefault();
                var formData = $(this).serialize();


                var url = $(this).attr("action");
                var method = $(this).attr("method");

                $.ajax({
                    type: method,
                    url: url,
                    data: formData,
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
                            categoryData()

                        } //else

                    }, //success method from ajax
                }); //ajax
            }); //submit from#form


            //start script 3:::

            //load edit modal with selected id
            $("#categoryData").on('click', "#editButton", function (e) {
                $("#editCategoryModal").on("show.bs.modal", function (e) {
                    var link = $(e.relatedTarget);
                    $(this).find(".modal-content").load(link.attr("href"));
                });

                //edit notice ajax submit and validation
                $(document).on('submit', 'form#editCategoryForm', function (event) {
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
                                    $('input[name=' + control + ']').addClass(
                                        'is-invalid');
                                    $('textarea[name=' + control + ']').addClass(
                                        'is-invalid');
                                    $('#error-' + control).html(data.errors[control]);
                                }
                            } else {
                                $('#editCategoryModal').modal('hide');
                                categoryData();
                            } //else

                        }, //success method from ajax
                    }); // this ajax
                }); //submit from#editNoticeForm

            }); //#noticeData || #editButton
            //end script 3

            //start script 4:::
            //delete notice
            $("#categoryData").on('click', "#deleteButton", function (e) {
                //edit notice ajax submit and validation
                $(document).on('submit', 'form#deleteForm', function (event) {
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
                            alert('Record deleted');
                            categoryData();
                        }

                    }); //this ajax

                }); //#deleteForm
            }); //#deleteButton

            //end script 4


        });

    </script>

@endsection
