@extends('layouts/admin_layout/master')

@section('content')

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-white shadow-sm">
                <div class="card-header border-0 bg-white">
                    <span class="border-bottom-0">
                        <h4 style="display: inline;" class="card-title">Permission List</h4>
                        <a style="float:right;" class="btn btn-info" id="add-permission-btn"
                            href="#">Create Permission</a>
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


                <div id="permission-list"></div>
            </div>
        </div>
    </div>
</div>


<div id="get-modal-request"></div>


@endsection

@section('script')
<script>
    $(document).ready(function(){

                    reLoad();
                    //GET unit LIST
     
            //reLoad fun.
            function reLoad() {
                $.get("{{ route('admin.permissionList') }}", function(data){
                $("#permission-list").empty().append(data);
            });
            }

                    // Add unit
                    $("#add-permission-btn").on('click', function(e){
                e.preventDefault();
             
                $.get("{{ route('admin.permissions.create') }}", function(data){
                    $("#get-modal-request").empty().append(data);
                    $("#add-permission-modal").modal('show');       
                });
            });

            $('#get-modal-request').on('submit', '#add-permission-form', function(e){
                e.preventDefault();
                var formData = $(this).serialize();
                var url = $(this).attr('action');
                var method = $(this).attr('method');

                $.ajax({
                    url: url,
                    method: method,
                    data: formData,
                    success: function(data){
                        $("#add-permission-modal").modal('hide');
                         reLoad();                        
                    }
                });
            });
            // End Add unit
    });
</script>

@endsection
