<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
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
      <style>
        .center{
            margin:auto;
            width: 100%;
            text-align: center;
            margin-top: 30px;
        }
        table,th,td{
            margin-top: 10px;
            margin: auto;
            border: 1px solid grey;

        }
        .th_deg{
            font-size: 30px;
            padding: 5px;
            background:rgb(9, 216, 195);
            text-align: center;
        }
        .td_deg{
            font-size: 20px;
            padding: 5px;
           text-align:center;
        }
        
        .img_deg{
            height: 800px;
            width: 400px;
        }
        .total_deg{
            font-size: 50px;
            /* padding: 20px; */
            text-align: center;
        }
        .cpy_ {
        /* position: fixed;
        bottom: 0;
        width: 100%;
        background-color: #0e0e0e; /* Sesuaikan dengan warna background yang Anda inginkan */
        /* text-align: center;
        padding: px 0;  */
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('toko.header')
         <!-- end header section -->
         {{-- <div class="main-panel"> --}}
            <div class="content-wrapper">
                @if(session()->has('message'))
                    <div class="alert alert-success mx-auto" style="width: 50%;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session()->get('message') }}
                    </div>
                @endif
         

      {{-- </div> --}}
      <div class="center">
        {{-- <div>
            <h3>1 item in your csrt</h3>
        </div>
        <div class="cart">
            <div class="row">
                <div class="col-lg-3">
                    <img src="" alt="">
                </div>
                    <div class="col-lg-9">
                        <div class="top">
                            <p class="item-name"> Nama Produk</p>
                            <div class="top-right">
                                <p class="">200000</p>
                                <select name="quantity" id="quantity" data-item="id-cartnya">
                                    @foreach($i = 1; $i <=10; $i++) 
                                    <option value="{{ $i }}">{{ $i }}</option> 
                                    @endforeach
                                </select>
                                <p class="total-item">Rp. Subtotal</p>
                            </div>
                        </div>
                        <hr class="mt-2 mb-2">
                        <div class="bottom">
                            <div class="row">
                                <p class="col-lg-6 item-desc">Deskripsi</p>
                                <div class="offser-lg-4">
                                </div>
                                <div class="col-lg-2">

                                        <form action="" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

        </div>
        <div class="total">
            <h4 class="total-price">Total Price: Rp. 100000</h4>
        </div>
        </div>
        <form action="" method="POST" style="margin-left: 700px;">
        @csrf
            <button type="submit" class="btn btn-primary">Checkout</button>
    </form> --}}
    <table id="cart" class="table table-hover table-condensed text-center mx-auto" style="width: 70%">
        <thead>
            <tr>
                <th style="width: 25%">Product</th>
                <th style="width: 15%">Price</th>
                <th style="width: 15%">Quantity</th>
                <th style="width: 20%">Action</th>
                {{-- <th style="width: 25%">Checkout</th> --}}
            </tr>
        </thead>
    
        <?php $totalprice=0 ?>
        @foreach($cart as $cart)
        <tr>
            <td class="td_deg">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <img src="/product/{{ $cart->image }}" width="600" height="600" alt="Product Image">
                    </div>
                    <div class="col-sm-8 text-center"> {{-- Tambahkan text-left untuk membuat tulisan berada di kiri --}}
                        <h4 class="nomargin">{{ $cart->product_title }}</h4>
                    </div>
                </div>
            </td>
            <td class="td_deg">{{ $cart->price }}</td>
            <td class="td_deg">
                <form action="{{ url('update_cart', $cart->id) }}" method="post">
                    @csrf
                    <input type="number" name="quantity" value="{{ $cart->quantity }}" class="form-control quantity cart_update" min="1">
                    <button type="submit" class="btn btn-primary">Update Quantity</button>
                </form>
                
            </td>
            {{-- <td class="td_deg">{{ $cart->price }}</td> --}}
            {{-- <td>
                <form action="{{ url('update_cart', $cart->id) }}" method="post">
                    @csrf
                    <input type="number" name="quantity" value="{{ $cart->quantity }}" class="form-control" min="1">
                    <button type="submit" class="btn btn-primary">Update Quantity</button>
                </form>
            </td> --}}
            <td>
                <a class="btn btn-danger" onclick="return confirm('Are you sure to remove product?')" href="{{ url('delete', $cart->id) }}">Remove Product</a>
            </td>
            {{-- <td>Cash On deli</td> --}}
        </tr>
        <?php $totalprice += $cart->price ?>
        @endforeach
    
        <!-- Total row -->
        <tr>
            <td colspan="3" class="text-right">Total:</td>
            <td>{{ $totalprice }}</td>
            {{-- <td> Checkout</td> --}}
        </tr>
        
        <!-- Tambahkan kode berikut di tampilan untuk menampilkan total harga -->
        @if(session('totalPrice'))
            <tr>
                <td colspan="4" class="text-right">Grand Total:</td>
                <td>{{ session('totalPrice') }}</td>
            </tr>
        @endif
    </table>

    <div style="padding-bottom;25px;">
        <h1 style="font-size: 35px; padding-bottom:15px;">Proceed To Order</h1>
        <a href="{{ url('cash_order') }}" class="btn btn-danger">COD</a>
        <a href="" class="btn btn-danger">Pay Using Card</a>
    </div>
    
    
    
    
        {{-- <div> --}}
            
            {{-- <h1 class="total_deg">
                Total Price: {{ $totalprice  }}
                </h1> --}}
        {{-- </div> --}}
{{-- 
        <div>
            <h1 style="font-size: 25px; padding-bottom:15px;">Proceed to Order</h1>
            <a href="" class="btn btn-danger">Cash On Delivery</a>
            <a href="" class="btn btn-danger">Pay Using Card</a>
        </div> --}}

      {{-- </div> --}}
    
      <!-- footer start -->
  
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

      {{-- <script>
        Add this script to handle quantity change and update price
        $(document).ready(function () {
            $('.quantity-select').change(function () {
                var quantity = $(this).val();
                var itemId = $(this).data('item');
                var pricePerUnit = {{ $cart->price }}; // replace with the actual price per unit
    
                $('#price_' + itemId).text(pricePerUnit * quantity);
            });
        });
    </script> --}}
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>