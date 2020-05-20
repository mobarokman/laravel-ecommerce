@extends('layouts/admin_layout/master')
@section('content')


<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-white shadow-sm">
                <div class="card-header border-0 bg-white">
                    <span class="border-bottom-0">
                        <h4 style="display: inline;" class="card-title">Supplier List</h4>

                        <a style="float:right;" class=" btn btn-info add-category-btn" data-toggle="modal"
                            data-target="#supplierModal" id="addButton" href="">Add Supplier</a>
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


                <div id="supplierData"></div>

            </div>
        </div>
    </div>

</div>


<!-- ============================================================== -->
<!--add modal  -->
<!-- ============================================================== -->
<!-- Modal -->
<div class="modal fade" id="supplierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
                            <label for="inputText3" class="col-form-label">Company/Supplier Name <span
                                    class="text-danger">*</span> </label>
                            <input name="company_name" id="inputText3" type="text" class="form-control"
                                placeholder="Enter tag name">
                            <span id="error-company_name" class="invalid-feedback"></span>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputText3" class="col-form-label">Contact Name</label>
                            <input name="contact_name" id="inputText3" type="text" class="form-control"
                                placeholder="Enter tag name">
                            <span id="error-contact_name" class="invalid-feedback"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="inputText3" class="col-form-label">Email <span class="text-danger">*</span>
                            </label>
                            <input name="email" id="inputText3" type="text" class="form-control"
                                placeholder="Enter tag name">
                            <span id="error-email" class="invalid-feedback"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputText3" class="col-form-label">Phone <span class="text-danger">*</span>
                            </label>
                            <input name="phone" id="inputText3" type="text" class="form-control"
                                placeholder="Enter tag name">
                            <span id="error-phone" class="invalid-feedback"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputText3" class="col-form-label">Phone 2 <span class="text-danger">*</span>
                            </label>
                            <input name="phone2" id="inputText3" type="text" class="form-control"
                                placeholder="Enter tag name">
                            <span id="error-phone" class="invalid-feedback"></span>
                        </div>
                    </div>



                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="exampleFormControlTextarea1">Address <span class="text-danger">*</span> </label>
                            <textarea name="address" class="form-control" id="exampleFormControlTextarea1 description"
                                rows="3" placeholder="Write Short Description"></textarea>
                            <span id="error-address" class="invalid-feedback"></span>
                        </div>

                        <div class="form-group col-md-8">
                            <label for="exampleFormControlTextarea2">Short Description</label>
                            <textarea name="description" class="form-control"
                                id="exampleFormControlTextarea2 description" rows="3"
                                placeholder="Write Short Description"></textarea>
                            <span id="error-description" class="invalid-feedback"></span>
                        </div>
                    </div>

                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Active
                            Status</span>
                    </label>

                    <div class="text-right">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-lg btn-info">Submit</button>
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
        supplierData();

        $("#search").keyup(function () {
            supplierData();
        });

        $("#perPage").change(function () {
            supplierData();
        });

        $("#supplierData").on("click", ".page-link", function (event) {
            event.preventDefault();
            var url = $(this).attr("href");
            supplierData(url);
        });

        function supplierData(url = "{{ route('admin.supplierData') }}") {
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
        }); //submit from#form

        //start script 3:::

        //load edit modal with selected id
        $("#supplierData").on('click', "#editButton", function (e) {
            $("#editSupplierModal").on("show.bs.modal", function (e) {
                var link = $(e.relatedTarget);
                $(this).find(".modal-content").load(link.attr("href"));
            });

            //edit notice ajax submit and validation
            $(document).on('submit', 'form#editSupplierForm', function (event) {
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
                            $('#editSupplierModal').modal('hide');
                            supplierData();
                        } //else

                    }, //success method from ajax
                }); // this ajax
            }); //submit from#editNoticeForm

        }); //#noticeData || #editButton
        //end script 3

        //start script 4:::
        //delete notice
        $("#supplierData").on('click', "#deleteButton", function (e) {
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
                        supplierData();
                    }

                }); //this ajax

            }); //#deleteForm
        }); //#deleteButton

        //end script 4


    });

</script>

@endsection
