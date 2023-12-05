<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    <base href="/public">
    @include('admin.css')
    <style type="text/css">
    .div_center{
        text-align: center;
        padding-top: 40px;
    }
    .font_size{
        font-size: 40px;
        padding-bottom: 40px;
    }
    .text_color{
        color: black;
        padding-bottom: 20px;
    }
    label{
        display: inline-block;
        width: 200px;
    }
    .div_design{
        padding-bottom: 15px;
    }
</style>
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))
     
                <div class="alert alert-success">
         
                    
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{session()->get('message')}}
                    
                </div>
                   
                @endif 
                <div class="div_center">
                    <h1 class="font_size">Update Product</h1>

                    <form action="{{ url('/update_product_confirm', $data->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                    <div class="div_design">
                        <label for="">Product Title</label>
                        <input class="text_color" type="text" name="title" placeholder="Write a Title" required="" value="{{ $data->title }}">

                    </div>
                    <div class="div_design">
                        <label for="">Product Description</label>
                        <input class="text_color" type="text" name="description" placeholder="Write a Description" required="" value="{{ $data->description }}">

                    </div>
                    <div class="div_design">
                        <label for="">Product Price</label>
                        <input class="text_color" type="number" name="price" placeholder="Write a Price" required="" value="{{ $data->price }}">

                    </div>
                    <div class="div_design">
                        <label for="">Discount Price</label>
                        <input class="text_color" type="number" name="discount_price" placeholder="Write a Discount Price" required="" value="{{ $data->discount_price }}">

                    </div>
                    <div class="div_design">
                        <label for="">Product Quantity</label>
                        <input class="text_color" type="number" min="0" name="quantity" placeholder="Write a Quantity" required="" value="{{ $data->quantity }}">

                    </div>
                    {{-- <div class="div_design">
                        <label for="">Product Category :</label>
                        <select  class="text_color"  name="category" required="">
                            <option value="" selected="">Add a Category Here</option>
                            @foreach($category as $category)
                            
                            <option  class="text_color"  value="{{$category->category_name }}"></option>
                            @endforeach
                        </select> --}}
                        {{-- <input class="text_color" type="text" name="category" placeholder="Write a Category"> --}}

                    {{-- </div> --}}
                    <div style="div_design">
                        <label >Product Category</label>
                        <select style="color: black;" name="category" required="" >
                            <option value="{{ $data->category }}" selected=''>{{ $data->category }}</option>
                            
                            @foreach($category as $category)
                                
                            <option value="{{ $category->category_name }}"> {{ $category->category_name }}</option>
            
                            @endforeach
                        </select>
            
                        {{-- <input style="color: black" type="text" min="0" name="quantity" placeholder="Product Quantity" required=""> --}}
            
                    </div>

                    <div class="div_design" style=" padding-top: 15px;">
                        <label for="">Current Product Image :</label>
                        <img style="margin:auto" height="100px" src="/product/{{ $data->image }}" alt="">
                        {{-- <input class="text_color" type="text" name="title" placeholder="Write a Title"> --}}

                    </div>
                    
                    <div class="div_design" style=" padding-top: 15px;">
                        <label for="">Change Product Image :</label>
                        <input type="file" name="image">
                        {{-- <input class="text_color" type="text" name="title" placeholder="Write a Title"> --}}

                    </div>
                    <div>
                        {{-- <label for="">Product Image Here :</label> --}}
                        <input type="submit" class="btn btn-primary" value="Update Product">
                        {{-- <input class="text_color" type="text" name="title" placeholder="Write a Title"> --}}

                    </div>
                </form>
                </div>
            </div>
         </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>