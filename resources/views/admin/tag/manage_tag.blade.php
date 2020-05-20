@extends('layouts/admin_layout/master')
@section('content')

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-white shadow-sm">
                <div class="card-header border-0 bg-white">
                    <span class="border-bottom-0">
                        <h4 style="display: inline;" class="card-title">Tag List</h4>
                        <a style="float:right;" class=" btn btn-info add-category-btn" data-toggle="modal"
                            data-target="#tagModal" id="addButton" href="">Add Tag</a>
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
                 
                <div id="tagData"></div>

            </div>
        </div>
    </div>

</div>


<!-- ============================================================== -->
<!--add modal  -->
<!-- ============================================================== -->
<!-- Modal -->
<div class="modal fade" id="tagModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Tag</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div id="modalBody" class="modal-body">
                <form action="{{route('admin.tag.store')}}" method="post" id="addForm">
                    @csrf
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Tag Name</label>
                        <input name="tag_name" id="inputText3" type="text" class="form-control"
                            placeholder="Enter tag name">
                        <span id="error-tag_name" class="invalid-feedback"></span>
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

@section('script')

<script type="text/javascript">
    $(document).ready(function () {

        //Load Tag list
        tagData();

        $("#search").keyup(function () {
            tagData();
        });

        $("#perPage").change(function () {
            tagData();
        });

        $("#tagData").on("click", ".page-link", function (event) {
            event.preventDefault();
            var url = $(this).attr("href");
            tagData(url);
        });

        function tagData(url = "{{ route('admin.tagData') }}") {
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
                    $("#tagData").html(data);
                }
            }); //ajax
        } //tagData function
        //end script 1.

        //add tag
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
                            $('#error-' + control).html(data.errors[control]);
                        }
                    } else {
                        $('#tagModal').modal('hide');
                        tagData();
                        //to clear add modal input text
                        $("#modalBody").empty().append('<form action="{{route("admin.tag.store")}}" method="post" id="addForm">\
                                                            @csrf\
                                                            <div class="form-group">\
                                                                <label for="inputText3" class="col-form-label">Tag Name</label>\
                                                                <input name="tag_name" id="inputText3" type="text" class="form-control" placeholder="Enter tag name">\
                                                                <span id="error-tag_name" class="invalid-feedback"></span>\
                                                            </div>\
                                                            <div class="text-right">\
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>\
                                                                <button type="submit" class="btn btn-info">Submit</button>\
                                                            </div>\
                                                        </form>');

                    } //else
                }, //success
            }); //ajax
        }); //add tag

        //load edit modal with selected id
        $("#tagData").on('click', ".edit-button", function (e) {
            $("#editTagModal").on("show.bs.modal", function (e) {
                var link = $(e.relatedTarget);
                $(this).find(".modal-content").load(link.attr("href"));
            });
        }); 

        //edit notice ajax submit and validation
        $(document).on('submit', 'form#editTagForm', function (event) {
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
                            $('#error-' + control).html(data.errors[control]);
                        }
                    } else {
                        $('#editTagModal').modal('hide');
                        tagData();
                    }
                }, //success method
            }); //ajax
        }); //end edit modal

        //delete tag
        $("#tagData").on('click', "#deleteButton", function (e) {
            
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
                        tagData();
                    }
                }); //this ajax
            }); //#deleteForm
        }); //#deleteButton

    }); //Ready

</script>

@endsection
