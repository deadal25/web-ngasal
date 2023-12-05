<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{ url('tokohome') }}"><img width="250" src="images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a class="nav-link" href="{{ url('tokohome') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="{{ 'tokohome' }}" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">New Products <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              <li><a href="{{ url('/view_home') }}">Add Product</a></li>
                              <li><a href="{{ url('/showproduct') }}">Show Product</a></li>
                              <li><a href="{{ url('/addtoko') }}">Buat Toko</a></li>
                              <li><a href="{{ url('/showtoko') }}">Show Toko</a></li>
                           </ul>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{ url('/showproducthome') }}">Products</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{ 'tokohome' }}"><i class="bi bi-box2-fill"></i></a>
                          </li>
                          <li class="nav-item">
                           <a class="nav-link" href="{{ url('toko_favorite') }}"><i class="bi bi-heart-fill fs-5"></i></a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{ url('show_carttoko') }}"><i class="bi bi-cart-fill fs-5"></i></a>
                        </li>
        
                        {{-- <div> --}}
        
                          {{-- <form action="{{ url('product_search') }}" method="GET" class="form-inline">
                             @csrf
                             <input style="width: 100px;" type="text" name="search" placeholder="Search for Something" class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                             <i class="fa fa-search" aria-hidden="true"></i> --}}
                             {{-- <input type="submit" value="Search"> --}}
              
                          {{-- </form>
                        </div> --}}
                          {{-- <form class="form-inline">
                             <button href="{{ url('product_search') }}"  class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                             <i class="fa fa-search" aria-hidden="true"></i>
                             </button>
                          </form> --}}
        
                          @if (Route::has('login'))
                          @auth
                          <x-app-layout>
           
                          </x-app-layout>
                          @else
                        <li class="nav-item">
                          <a class="btn btn-primary" id='logincss' href="{{ route('login') }}">Login</a>
                       </li>
                       <li class="nav-item">
                          <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                       </li>
                       @endauth
                       @endif
                     </ul>
                  </div>
               </nav>
            </div>
         </header>
         <!-- end header section -->
        <!-- slider section -->
        @include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      {{-- @include('home.why')
      <!-- end why section -->
      
      <!-- arrival section -->
      @include('home.new_arival')
      <!-- end arrival section -->
      
      <!-- product section -->
      @include('home.product')
      <!-- end product section -->

      <!-- subscribe section -->
      @include('home.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('home.client')
      <!-- end client section --> --}}
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>