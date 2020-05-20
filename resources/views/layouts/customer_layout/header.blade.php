  <!DOCTYPE html>
  <html lang="en">
  
  <head>
  
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
  
      <title>Shop Homepage - Start Bootstrap Template</title>
  
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('assets/frontend/css/shop-homepage.css') }}" rel="stylesheet">
  
  </head>
  
  <body style="background-color: #F1F2F4;" class="">
      <div style="background-color: #3a948f;" class="fixed-top text-right p-1">
          <a class="text-white px-3" href="">Service</a>
          <a class="text-white px-3" href="">About</a>
      <a class="text-white px-3 mr-5" href="{{route('customer.cart')}}">Cart</a>
  
      </div>
  
  
      <nav class="navbar navbar-expand-md navbar-light bg-white">
          <a class="navbar-brand" href="{{route('customer.home')}}"><h4 class="text-info">Tora Grocery</h4></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04"
              aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
  
          <div class="collapse navbar-collapse" id="navbarsExample04">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link disabled" href="#">Disabled</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="" id="dropdown04" data-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false">Dropdown</a>
                      <div class="dropdown-menu" aria-labelledby="dropdown04">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                  </li>
              </ul>
              <form class="form-inline my-2 my-md-0">
                  <input class="form-control" type="text" placeholder="Search">
              </form>
          </div>
      </nav>