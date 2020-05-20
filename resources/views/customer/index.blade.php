@extends('../layouts/customer_layout/master')

@section('content')

<!-- Page Content -->
<div class="container">
    <div class="row mx- my-5">
        <div class="col-md-3 pb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5>Some MEnu</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <h6 class="my-0">Some here</h6>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <h6 class="my-0">Some here</h6>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <h6 class="my-0">Some here</h6>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <h6 class="my-0">Some here</h6>
        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--col -->
      
        <!-- /.col-lg-3 -->

        <div class="col-md-9 ">

            <div class="row">
                @foreach($products as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h- 100 p-2 border-0 rounded shadow-sm">
                        <a href="#">
                            <img class="card-img-top"
                                src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16efd487c58%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16efd487c58%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.1953125%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                                alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#"> {{$product->product_name}} </a>
                            </h4>
                            <h5>${{ $product->price }}</h5>
                            <p class="card-text">Size: XL</p>
                        </div>
                        <div class="card-footer border-0 bg-light d-flex">
                            <div class="mr-5">
                                <a class="btn btn-sm btn-info text" href="{{route('customer.product.show', $product->product_id)}}">View</a>
                            </div>
                            <div class="text-right">
                                <a class="add-to-cart btn btn-sm btn-primary" href="">Add to Cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                @endforeach

                {{-- :::::::::::::::::::::::::: --}}
                @foreach($products as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h- 100 p-2 border-0 rounded shadow-sm">
                        <a href="#">
                            <img class="card-img-top"
                                src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16efd487c58%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16efd487c58%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.1953125%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                                alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#"> {{$product->product_name}} </a>
                            </h4>
                            <h5>${{ $product->price }}</h5>
                            <p class="card-text">Size: XL</p>
                        </div>
                        <div class="card-footer border-0 bg-light d-flex">
                            <div class="mr-5">
                                <a class="btn btn-sm btn-info text" href="">View</a>
                            </div>
                            <div class="text-right">
                                <a class="add-to-cart btn btn-sm btn-primary" href="">Add to Cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- :::::::::::::::::::::::::::::::: --}}
            </div>
            <!-- /.row -->
        </div>
        <!-- /.col-lg-9 -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->

@endsection


@section('script')
    
<script>
$(document).ready(function () {
    
});
</script>
@endsection
