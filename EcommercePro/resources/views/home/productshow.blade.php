<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <link href="home/css/style.css" rel="stylesheet" />
    <link href="home/css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <style>
        /* Atur padding pada body untuk mengurangi jarak dari atas */
        .center{
            margin:auto;
            width: 100%;
            text-align: center;
            margin-top: 10px;
        }

/* Atur margin pada container utama */
.container {
    margin:auto;
            width: 100%;
            text-align: center;
            margin-top: 0px; /* Sesuaikan sesuai kebutuhan */
}

/* Atur padding pada heading container */
.heading_container {
    padding-top: 2px; /* Sesuaikan sesuai kebutuhan */
}

/* Atur margin pada form pencarian */
form {
    margin-bottom: 1px; /* Sesuaikan sesuai kebutuhan */
}

      

    </style>
</head>
<body>
    @include('home.header')
   
    
    <section class="product_section layout_padding ">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
             Our <span>products</span>
            </h2>
            
            <br><br>
            
            <div>
                
            <form action="{{ url('product_search') }}" method="GET">
                @csrf
               <input style="width: 500px;" type="text" name="search" placeholder="Search for Ssomething">
               <input type="submit" value="Search">

            </form>
          </div>
          
        </div>
        <div class="row">
            
            @foreach($product as $products)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{ url('product_details',$products->id) }}" class="option1">
                        Product Details
                    </a>
                    {{-- <a href="{{ }}" class="option2">
                        
                        Buy Now
                     </a> --}}
                        <form action="{{ url('add_cart', $products->id) }}" method="POST">
                            @csrf
                        <div class="row">
                            <div class="col-md-4">
                              <input type="number" name="quantity" value="1" min="1" style="width:100px">
                            </div>
                            <div class="col-md-4">
                              <input type="submit" value="Add to Cart">
                            </div>
                     </div>
                    </form>
                  </div>
                </div>
               <div class="img-box">
                  <img src="product/{{ $products->image }}" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                      {{ $products->title }}
                  </h5>

                  @if($products->discount_price!=null)
                  
                  <h6 style="color: red">
                    Discount Price
                    <br>
                    {{ $products->discount_price }}
                </h6>
                <h6 style="text-decoration: line-through; color:blue;">
                    Price
                    <br>
                    {{ $products->price }}
                </h6>
                @else
                <h6 style="color:blue">
                    Price
                    <br>
                    {{ $products->price }}
                </h6>
                @endif
                
            </div>
            </div>
        </div>
         
         
         @endforeach
         <span style="padding-top: 10px; ">
            
         </span>
         {{-- {!!$product->withQueryString()->links('pagination::bootstrap-5')!!} --}}
        </div>
        
            
    </section>
            <div class="cpy_">
                <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
                
                   Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
                
                </p>
             </div>
            
        
            <script src="home/js/jquery-3.4.1.min.js"></script>
            <script src="home/js/popper.min.js"></script>
            <script src="home/js/bootstrap.js"></script>
            <script src="home/js/custom.js"></script>
        </body>
        </html>