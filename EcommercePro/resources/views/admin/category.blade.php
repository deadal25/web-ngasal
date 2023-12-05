<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style>
        .div_center{
            text-align: center;
            padding-top: 40px;
        }
        .h2_font{
            font-size: 40px;
            padding-bottom: 40px;
        }
        .input_color{
           color: grey; 
        }
        .center{
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid gray;
            background-color: gray;

        }


    </style>
  </head>
  <body>
    <div class="container-scroller">
    
      <!-- partial -->
      @include('admin.sidebar')

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

                    <h2 class="h2_font">Add Category</h2>


                    <form action="{{ url('/add_category') }}" method="POST">

                        @csrf

                        <input class="input_color" type="text" name="category" placeholder="Write Category Name">

                        <input type="submit" class="btn btn-primary" name="submit" value="Add Category">

                    </form>

                </div>

                <table class="center">
                    <tr style="background-color: grey;">
                        <td>Category Name</td>
                        <td>Action</td>
                    </tr>

                    @foreach($data as $data)
                        
                    <tr style="background-color: grey;">
                        <td>{{ $data->category_name }}</td>
                        <td>
                            <a onclick="return confirm('Are You Sure To Delete This Category?')" class="btn btn-danger" href="{{ url('delete_category',$data->id) }}">Delete</a>
                        </td>

                    </tr>
                    @endforeach



                </table>


                </div>
                </div>
          <!-- partial -->
        @include('admin.script')
  </body>
</html>