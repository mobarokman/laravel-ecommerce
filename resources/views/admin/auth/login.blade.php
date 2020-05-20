<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/backend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/backend/css/simple-sidebar.css') }}" rel="stylesheet">
</head>

<body style="background-color:#ececec;" class="">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card mt-5">
                    <div class="card-body">
                        <h5>Login</h5>
                        <form action="{{route('admin.login.post')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Email</label>
                                <input name="email" type="email" class="form-control" value="{{old('email')}}" placeholder="eg: tonystark@avengers.com">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input name="password" type="password" class="form-control" placeholder="password">
                            </div>

                            <div class="animated-checkbox">
                                <label>
                                    <input type="checkbox" name="remember"><span class="label-text">Stay Signed
                                        in</span>
                                </label>
                            </div>
                            <button class="btn btn-info">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('assets/backend/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Menu Toggle Script -->
    <script>

    </script>

</body>

</html>
