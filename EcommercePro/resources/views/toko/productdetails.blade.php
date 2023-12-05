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
    <style>
        .cart-form {
    margin-top: 10px; /* Sesuaikan sesuai kebutuhan */
}

.btn-favorite,
.btn-cart {
    width: 100%;
    padding: 10px;
    background-color: #3498db; /* Warna latar sesuaikan dengan preferensi Anda */
    color: #fff; /* Warna teks sesuaikan dengan preferensi Anda */
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-favorite:hover,
.btn-cart:hover {
    background-color: #2980b9; /* Warna latar saat hover sesuaikan dengan preferensi Anda */
}

.row {
    display: flex;
    justify-content: space-between;
}

.col-md-4 {
    width: 32%; /* Atur lebar kolom sesuai dengan preferensi Anda */
}

    </style>
      <div class="hero_area">
         <!-- header section strats -->
        @include('toko.header')
         <!-- end header section -->
      
      

         <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width:50%; padding:30px">
            <div class="img-box" style="padding:20px;">
                <img src="product/{{ $product->image }}" alt="">
            </div>
            <div class="detail-box">
                <h5>{{ $product->title }}</h5>
        
                @if($product->discount_price!=null)
                    <h6 style="color: red">
                        Harga Diskon
                        <br>
                        {{ $product->discount_price }}
                    </h6>
                    <h6 style="text-decoration: line-through; color:blue;">
                        Harga
                        <br>
                        {{ $product->price }}
                    </h6>
                @else
                    <h6 style="color:blue">
                        Harga
                        <br>
                        {{ $product->price }}
                    </h6>
                @endif
        
                <h6>Kategori Produk: {{ $product->category }}</h6>
                <h6>Detail Produk: {{ $product->description }}</h6>
                <h6>Jumlah Tersedia: {{ $product->quantity }}</h6>
        
                {{-- <form action="{{ url('add_cart',$product->id) }}" method="POST" class="cart-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <input type="number" name="quantity" value="1" min="1" style="width: 100px">
                        </div>
                        <div class="col-md-4">
                            <input type="submit" value="Keranjang" class="btn-cart">
                        </div>
                    </div>
                </form> --}}
                <!-- Form untuk menambahkan ke Favorite -->
<form action="{{ url('addtoko_favorite', $product->id) }}" method="POST" class="cart-form">
    @csrf
    <div class="row">
        {{-- <div class="col-md-4">
            <input type="number" name="quantity" value="1" min="1" style="width: 100px">
        </div> --}}
        <div class="col-md-12">
            <input type="submit" name="action" value="add to favorite" class="btn-favorite">
        </div>
    </div>
</form>

<!-- Form untuk menambahkan ke Keranjang -->
<form action="{{ url('add_cart', $product->id) }}" method="POST" class="cart-form">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <input type="number" name="quantity" value="1" min="1" style="width: 420px">
        </div>
        <div class="col-md-12">
            <input type="submit" name="action" value="add to cart" class="btn-cart">
        </div>
    </div>
</form>

                

                {{-- @if(isset($store))
        <div>
            <h3>Informasi Toko</h3>
            <p>Nama Toko: {{ $store->nama_store }}</p>
            <p>Deskripsi Toko: {{ $store->description_store }}</p>
            <p>Alamat: {{ $store->address }}</p>
            <p>Telepon: {{ $store->phone }}</p>
            <!-- Tampilkan gambar toko jika ada -->
            @if($store->image_store)
                <img src="{{ asset('store/' . $store->image_store) }}" alt="Image Toko">
            @endif
        </div>
    @endif --}}
            </div>
            
        </div>
        
      
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