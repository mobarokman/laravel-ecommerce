@extends('../layouts/customer_layout/master')

@section('content')

<!-- Page Content -->
<div class="container">

    @if($carts->all())
    <div class="row mx-4 my-5">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center bg-white rounded shadow-sm mb-3 p-5">
                <h3 class="text-muted">My cart</h3>
                <span class="badge badge-secondary badge-pill">3</span>
            </div>
            <div class="card border-0 rounded shadow-sm">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach($carts as $cart)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                            <h6 class="product_name my-0" data-product_id="{{$cart->products->product_id}}"> {{$cart->products->product_name}}</h6>
                                <small class="text-muted">Brief description</small>
                            </div>
                            <div class="quantity">
                                <span class="badge">Quantity</span>
                                <input id="quantity" type="number" min="1" max="40" step="1" value="{{$cart->quantity}}">
                            </div>
                            <span class="text-muted">${{$cart->price}}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer border-0 bg-white text-right">
                    <a class="btn btn-lg btn-warning text-light" href="{{route('customer.shipping')}}">Buy Now/Goto Shipping</a>
                </div>
            </div>
        
        </div>
        <!-- col -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5>Checkout Summery</h5>
                </div>
            </div>
        </div>
        <!--col -->
    </div>
    <!-- row -->
    @else
    <div class="text-center  mx-4 my-5">
        <img src="{{asset('assets/frontend/image/empty_cart.png')}}" alt="">
        <h2>Your Cart is empty!</h2>
        <p>Looks like you haven't made order yet.</p>
    <a class="btn btn-lg btn-warning" href="{{route('customer.home')}}">Goto Shopping</a>
    </div>
    @endif
</div>
<!-- /.container -->

@endsection

@section('script')

<script>

$(document).ready(function(){
    var product = $(".product_name").each(function(){
        var h =$(this).data('product_id');
        console.log(h);
        
        
    });
    console.log(product);
    

});
</script>

@endsection
