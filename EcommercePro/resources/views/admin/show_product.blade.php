<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div style="padding-top:30px;" class="container-fluid page-body-wrapper">
                <div class= "container" align="center"> 

                @if(session()->has('message'))
     
                <div class="alert alert-success">
         
                    
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{session()->get('message')}}
                    
                </div>
                   
                @endif 
                <table class="center">


                    <tr style="background-color: grey;">
                        <td style="padding: 20px;">Product Title</td >
                            <td style="padding: 20px;">Description</td >
                                <td style="padding: 20px;">Quantity</td >
                                    <td style="padding: 20px;">Category</td >
                                        <td style="padding: 20px;">Price</td >
                                            <td style="padding: 20px;">Diskon Price</td >
                                        <td style="padding: 20px;">Product Image</td>
                                        <td style="padding: 20px;">Edit</td>
                                        <td style="padding: 20px;">Delete</td>
                    </tr>
                    @foreach($data as $product)
                    
                
                <tr align="center" style="background-color: black;" >
                    <td style="padding: 20px;" width="150px">{{ $product->title }}</td >
                        <td style="padding: 20px;">{{ $product->description }}</td >
                            <td style="padding: 20px;">{{ $product->quantity }}</td >
                                <td style="padding: 20px;">{{ $product->category }}</td >
                                <td style="padding: 20px;">{{ $product->price }}</td >
                                        <td style="padding: 20px;" width="150px">{{ $product->discount_price }}</td >
                                    <td style="padding: 20px;" width="150px">
                                        <img height="400px" width="300px" src="/product/{{ $product->image }}" >
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ url('update_product', $product->id) }}">Edit</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" onclick="return confirm('Are yous Sure?')" href="{{ url('deleteproduct', $product->id) }}">Delete</a>
                                        </td>
                                    
                                    
                                </tr>
                                
                                @endforeach
                </table>
                </div>
                    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>