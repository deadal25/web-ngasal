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
        body {
            padding-top: 5px;
        }

        .main-panel {
            margin-top: 20px;
        }

        .div_center {
            text-align: center;
            padding-top: 5px;
        }

        .font_size {
            font-size: 40px;
            padding-bottom: 10px;
        }

        .text_color {
            color: black;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            text-align: center;
        }

        .div_design {
            /* padding-top: 5px; */
            margin-bottom: 5px;
            text-align: center;
        }

        
        .btn {
            /* font-family: 'Courier New', Courier, monospace; */
            color: rgb(255, 255, 255);
            background-color: rgb(9, 41, 247);
            
        }
        .btn-danger {
            /* font-family: 'Courier New', Courier, monospace; */
            color: rgb(255, 255, 255);
            background-color: rgb(247, 9, 9);
            
        }

    </style>
</head>
<body>
    @include('toko.header')
    <div class="main-panel">
        <div class="content-wrapper">
            @if(session()->has('message'))
                <div class="alert alert-success mx-auto" style="width: 50%;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session()->get('message') }}
                </div>
            @endif
            {{-- <div class="d-flex justify-content-center align-items-center" style="height: 50vh;"> --}}
                {{-- <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div> --}}
            
            

            <div class="div_center">
                <table class="table table-hover table-condensed text-center mx-auto" style="width: 70%">
                    <thead>
                    <tr>
                        {{-- <th style="width: 25%">Image Toko</th> --}}
                        <th style="width: 25%">Nama Toko</th>
                        <th style="width: 25%">Description Toko</th>
                        <th style="width: 25%">Alamat Toko</th>
                        <th style="width: 25%">Contact Toko</th>
                        
                        <th style="width: 25%">Edit</th>
                        <th style="width: 25%">Delete</th>
                    </tr>
                </thead>
                @foreach($data as $store)
                <tr>
                    <td class="td_deg">
                        <div class="row align-items-center">
                            <div class="col-sm-12">
                                <img src="store/{{ $store->image_store }}" width="300" height="300" alt="Product Image">
                            </div>
                            <div class="col-sm-8 text-center"> {{-- Tambahkan text-left untuk membuat tulisan berada di kiri --}}
                                <h4 class="nomargin" value="{{ $store->nama_store }}">{{ $store->nama_store }}</h4>
                            </div>
                        </div>
                    </td>
                    <td class="td_deg" value="{{ $store->description_store }}">{{ $store->description_store }}</td>
                    <td class="td_deg" value="{{ $store->address }}">{{ $store->address }}</td>
                    <td class="td_deg" value="{{ $store->phone }}">{{ $store->phone }}</td>
                    {{-- <td class="td_deg">{{ $store->price }}</td>
                    <td class="td_deg">{{ $store->discount_price }}</td> --}}
                    <td class="td_deg"> <a class="btn btn-primary" href="{{ url('update_toko', $store->id) }}">Edit Product</a></td>
                    <td class="td_deg">
                        <a class="btn btn-danger" onclick="return confirm('Are yous Sure?')" href="{{ url('deleteproduct', $store->id) }}">Delete</a>
                    </td>

                </tr>
                @endforeach
                </table>
                {{-- <h1 class="font_size">Show Product</h1> --}}
                {{-- <form action="{{ route('addproduct') }}" method="POST" enctype="multipart/form-data" class="mx-auto" style="width: 50%;">
                    @csrf
                    <div class="div_design">
                        <label for="title" class="text_color">Product Title</label>
                        <input class="form-control" type="text" name="title" placeholder="Write a Title" required="">
                    </div>
                    <div class="div_design">
                        <label for="description" class="text_color">Product Description</label>
                        <input class="form-control" type="text" name="description" placeholder="Write a Description" required="">
                    </div>
                    <div class="div_design">
                        <label for="price" class="text_color">Product Price</label>
                        <input class="form-control" type="number" name="price" placeholder="Write a Price" required="">
                    </div>
                    <div class="div_design">
                        <label for="discount_price" class="text_color">Discount Price</label>
                        <input class="form-control" type="number" name="discount_price" placeholder="Write a Discount Price" required="">
                    </div>
                    <div class="div_design">
                        <label for="quantity" class="text_color">Product Quantity</label>
                        <input class="form-control" type="number" min="0" name="quantity" placeholder="Write a Quantity" required="">
                    </div>
                    <div class="div_design">
                        <label for="category" class="text_color">Category</label>
                        <select class="form-control" style="color: black;" name="category" required="">
                            <option value="" selected=''>Add a Category here</option>
                            @foreach($category as $category)
                                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="div_design">
                        <label for="image" class="text_color">Product Image Here :</label>
                        <input class="form-control" type="file" name="image" required="">
                    </div>
                    <div class="div_design" style="padding-bottom: 35px;">
                        <button type="submit" class="btn btn-danger">Add Product</button>

                    </div>
                </form> --}}
            </div>
        </div>
    </div>
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
