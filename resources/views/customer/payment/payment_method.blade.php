@extends('../layouts/customer_layout/master')

@section('content')

<!-- Page Content -->
<div class="container">


    <div class="row mx-4 my-5">
        <div class="col-md-8">
            <div class="bg-white rounded shadow-sm mb-3 p-2">
                <h3 class="text-muted">Payment Method</h3>
                <p>Please select only one payment method.</p>
            </div>
            {{-- payment method accordion --}}
            <div class="accordion" id="bsAccordion">
                <!--  Payment method One -->
                <div class="card border-0 rounded shadow-sm mb-3">
                    <div class="card-header border-0 bg-white" id="methodOne">
                        <button class="btn btn-link collapsed text-none" type="button" data-toggle="collapse"
                            data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <h4> Cash On Deliverys</h4>
                        </button>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="methodOne" data-parent="#bsAccordion">
                        <div class="card-body ">
                            dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                            <br>
                            <p>I aggre with terms and conditions</p>
                            <a class="btn btn-success btn-lg confirm-order-btn" href="#">Confirm Order</a>
                        </div>
                    </div>
                </div>
                <!--  Payment method Two -->
                <div class="card border-0 rounded shadow-sm mb-3">
                    <div class="card-header border-0 bg-white" id="methodTwo">
                        <button class="btn btn-link collapsed text-none" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h4>Visa Crad</h4>
                        </button>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="methodTwo" data-parent="#bsAccordion">
                        <div class="card-body ">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life <br>
                            accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                            dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                            <br>
                            <p>I aggre with terms and conditions</p>
                            <a class="btn btn-success btn-lg confirm-order-btn" href="">Confirm Order</a>
                        </div>
                    </div>
                </div>
                <!--  Payment method Three -->
                <div class="card border-0 rounded shadow-sm mb-3">
                    <div class="card-header border-0 bg-white" id="methodThree">
                        <button class="btn btn-link collapsed text-none" type="button" data-toggle="collapse"
                            data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <h4>Nogod</h4>
                        </button>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="methodThree" data-parent="#bsAccordion">
                        <div class="card-body ">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life <br>
                            accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                            dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                            <br>
                            <p>I aggre with terms and conditions</p>
                            <a class="btn btn-success btn-lg" href="">Confirm Order</a>
                        </div>
                    </div>
                </div>
            </div> <!--according -->
        </div>
        <!-- col -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5>Order Summery</h5>
                </div>
            </div>
        </div>
        <!--col -->
    </div>
    <!-- row -->
</div>
<!-- /.container -->

@endsection

@section('script')

<script>
    $(document).ready(function(){
        $('.confirm-order-btn').on('click', function(event){
            event.preventDefault();
            var method = "POST"
            var url = "{{route('customer.paymentConfirm')}}"
          $.ajax({
                url: url,
                method: method,
                data: {
                    payment_type: 'cash',
                    _token: ' {{csrf_token()}}'
                },
                success: function(data){
                    console.log(data);
                    location.replace("{{route('customer.orderConfirmation')}}");
                    
                },
          })
            
        });
    });
</script>

@endsection