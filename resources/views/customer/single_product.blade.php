@extends('../layouts/customer_layout/master')

@section('content')

<!-- Page Content -->
<div class="container">
    
    <div class="text-center " id="msg"></div>

   <div class="row mx-4 my-5">
       <div class="col-md-10 offset-md-1">
            <div class="card border-0 shadow-sm ">
                <div class="card-body">

                    <div class="row product">
                        <div class="col-md-6">
                            <h5>PHOto here</h5>
                        </div>
                        <div class="col-md-6">
                            <div class="product-details">
                                <div class="border-bottom pb-3 mb-3">
                                <h2 class="mb-3" id="productId" data-product-id="{{$product->product_id}}"> {{$product->product_name }} </h2>
                                   
                                    <h3 class="mb-0 text-primary" id="price">{{$product->sale_price}} </h3>
                                </div>
                                
                                    <div class="">
                                        <h4>Quantity</h4>
                                        <div class="">
                                            <input id="quantity" type="number" min="1" max="9" step="1" value="1">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="product-description">
                                    <h4 class="mb-1">Descriptions</h4>
                                    <p>Praesent leor ntoeah eathu haethu aueh</p>
                                    <a href="#" class="add-to-cart btn btn-primary btn-block btn-lg ">Add to Cart</a>
                                </div>
                            </div>
                           
                        </div>
                        <!--row-->
                    </div>
                </div>
                <!--card -->
       </div>
      <!-- /.col --> 
   </div>
    <!-- /.row -->
</div>
<!-- /.container -->

@endsection


@section('script')
    
<script>
$(document).ready(function () {
    $(".add-to-cart").on('click', function () {
        var parentRow = $(this).parents('.product');
        var productId = parentRow.find('#productId').data('product-id');
        var price = parentRow.find('#price').text();
        var quantity = parentRow.find('#quantity').val();

        //Additional: from server
        var csrf = "{{ csrf_token() }}";
        var userid = "{{ auth()->user()->id  }}";
      
        $.ajax({
            url: "{{route('customer.cart.store')}}",
            method: "POST",
            data: {
                _token: csrf ,
                productid: productId,
                userid: userid,
                price: price,
                quantity: quantity,
               
            },
            success: function(response){
                $("#msg").append("<h5 class='alert alert-danger'>Product added to cart X</h5>");
                setTimeout(function(){
                    $("#msg").empty();    
                }, 1000);
            },

        }); //ajax
       
        

    });
});
</script>
@endsection
