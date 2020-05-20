@extends('../layouts/customer_layout/master')

@section('content')

<!-- Page Content -->
<div class="container">
    <div class="row mx-4 my-5">
        <div class="col-md-6">
            <div class="d-flex justify-content-between align-items-center bg-white rounded shadow-sm mb-3 p-3">
                <h3 class="text-muted">Fill up shipping address</h3>
                <span class="badge badge-secondary badge-pill">3</span>
            </div>
            <div class="card border-0 rounded shadow-sm">
                <div class="card-body">
                    <form id="form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Name</label>
                                <input name="name" type="text" class="form-control" id="firstName" placeholder=""
                                    value="">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone">Phone <span class="text-muted">(Optional)</span></label>
                                <input name="phone" type="phone" class="form-control" id="phone"
                                    placeholder="you@example.com">
                                <div class="invalid-feedback">
                                    Please enter a valid phone address for shipping updates.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email <span class="text-muted">(Optional)</span></label>
                            <input name="email" type="email" class="form-control" id="email"
                                placeholder="you@example.com">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="country">Division</label>
                                <select name="division" class="custom-select d-block w-100" id="country">
                                    <option value="">Choose...</option>
                                    <option>United States</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="state">State</label>
                                <select name="district" class="custom-select d-block w-100" id="state">
                                    <option value="">Choose...</option>
                                    <option>California</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="state">State</label>
                                <select name="upazila" class="custom-select d-block w-100" id="state">
                                    <option value="">Choose...</option>
                                    <option>California</option>
                                </select>
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <textarea class="form-control" rows="3"></textarea>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="same-address">
                            <label class="custom-control-label" for="same-address">Billing address is the same as my
                                Shipping
                                address</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="save-info">
                            <label class="custom-control-label" for="save-info">Save this information for next
                                time</label>
                        </div>
                        <hr class="mb-4">
                        <a id="gotoPaymentBtn" class="btn btn-info btn-lg btn-block text-light"
                            href="{{route('customer.paymentMethod')}}">Continue to Payment</a>
                    </form>
                </div>
            </div>
            <!-- card -->
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
    <!-- orw -->
</div>
<!-- /.container -->

@endsection


@section('script')
    
<script>
$(document).ready(function () {
    $('#gotoPaymentBtn').on('click', function(event) {
       // event.preventDefault();
        var method = "POST";
        var url = "{{route('customer.shipping.store')}}";
        var formData = $('form#form').serialize();

        $.ajax({
            url: url,
            method: method,
            data: formData,
            success: function(data){
                console.log(data);  
            },
        });

    });
});
</script>
@endsection
