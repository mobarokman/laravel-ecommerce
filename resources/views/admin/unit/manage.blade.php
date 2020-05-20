@extends('layouts/admin_layout/master')

@section('content')

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-white shadow-sm">
                <div class="card-header border-0 bg-white">
                  <span class="border-bottom-0">
                    <h4 style="display: inline;" class="card-title">Unit List</h4>
                    <a style="float:right;" class="btn btn-info" id="add-unit-btn" href="">Add Unit</a>
                    <select id="perPage" class="btn btn-info" style="float: right; margin-right:5px;">
                        <option value="5" selected>5</option>
                        <option value="10">10</option>
                        <option value="30">20</option>
                        <option value="40">30</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span style="float: right; margin-right:15px;">
                        <input type="text" id="search" class="form-control" style="display: inline; width: 150px;" placeholder="Search">
                    </span>
                </span>
                </div>

                <div id="unit-list"></div>
            </div>
        </div>
    </div>
</div>



<div id="get-modal-request"></div>


@endsection

@section('script')
    <script>
        $(document).ready(function(){

            $("#perPage").change( function(){
            getData();
        });

        $("#unit-list").on("click", ".page-link", function(event){
            event.preventDefault();
            var url = $(this).attr("href");
            getData(url);
            
        });

        $("#search").keyup( function(){
            getData();
        });

        function getData(url="{{route('admin.product-unit.list')}}"){
            var perPage =   $('#perPage').val();
            var search = $('#search').val();
            
              $.ajax({
                  url: url,
                  data: {
                    perPage: perPage,
                    search: search,
                  },
                  method: "GET",
                  dataType: "html",
                  success: function(data){
                    $("#unit-list").empty().append(data);;
                     
                      
                  }

              })
        }



            //GET unit LIST
            $.get("{{ route('admin.product-unit.list')}}", function(data){
                $("#unit-list").empty().append(data);
            });

            //reLoad fun.
            function reLoad() {
                $.get("{{ route('admin.product-unit.list')}}", function(data){
                $("#unit-list").empty().append(data);
            });
            }
          
              
            // Add unit
            $("#add-unit-btn").on('click', function(e){
                e.preventDefault();
             
                $.get("{{ route('admin.product-unit.create')}}", function(data){
                    $("#get-modal-request").empty().append(data);
                    $("#add-unit-modal").modal('show');       
                });
            });

            $('#get-modal-request').on('submit', '#add-unit-form', function(e){
                e.preventDefault();
                var formData = $(this).serialize();
                var url = $(this).attr('action');
                var method = $(this).attr('method');

                $.ajax({
                    url: url,
                    method: method,
                    data: formData,
                    success: function(data){
                        $("#add-unit-modal").modal('hide');
                        reLoad();                        
                    }
                });
            });
            // End Add unit

            // Edit unit
            $('#unit-list').on('click', ".edit-unit-btn", function(e){
                e.preventDefault();
                var url = $(this).attr('href');
                
                $.get(url, function(data){
                    $('#get-modal-request').empty().append(data);
                    $('#edit-unit-modal').modal('show');
                });         
            });


            $('#get-modal-request').on('submit', '#edit-unit-form', function(e){
               e.preventDefault();
                var formData = $(this).serialize();
                var url = $(this).attr('action');
                var method = $(this).attr('method');

                $.ajax({
                    url: url,
                    method: method,
                    data: formData,
                    success: function(data){
                        $("#edit-unit-modal").modal('hide');
                        reLoad();                      
                    }
                });
            });
            //Edit End

              //Delete
              $('#unit-list').on('click', ".delete-unit-btn", function(e){
                e.preventDefault();
                var url = $(this).attr('href');
                
                $.get(url, function(data){
                    $('#get-modal-request').empty().append(data);
                    $('#delete-unit-modal').modal('show');
                });         
            });

            $('#get-modal-request').on('submit', '#delete-unit-form', function(e){
               e.preventDefault();
                var formData = $(this).serialize();
                var url = $(this).attr('action');
                var method = $(this).attr('method');

                $.ajax({
                    url: url,
                    method: method,
                    data: formData,
                    success: function(data){
                        $("#delete-unit-modal").modal('hide');
                        reLoad();                        
                    }
                });
            });
            //End Delete

            // Single unit details-btn
          $('#unit-list').on('click', ".details-btn", function(e){
                e.preventDefault();
                var url = $(this).attr('href');
              
                $.get(url, function(data){
                    $("#get-modal-request").empty().append(data);
                    $("#show-unit-modal").modal('show');       
                });
            });


        });
    </script>
@endsection