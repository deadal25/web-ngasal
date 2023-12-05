<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\store;
use App\Models\favorite;
use App\Models\cart;
use Illuminate\Support\Facades\Auth;

class TokoController extends Controller
{
    public function view_home(){
        $category=category::all();

        return view('toko.addproduct', compact('category'));
    }

    public function addproduct(Request $request){
        $product = new product;
        $store= new store;
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->discount_price=$request->discount_price;
        $product->category=$request->category;
        $store->nama_store=$request->nama_store;
        $store->description_store=$request->description_store;

        $image=$request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();  
        $request->image->move('product', $imagename);  
        $product->image=$imagename;
           
        $product->save();
        return redirect()->back()->with('message', 'Product Added Successfully');;
    }
    public function showproduct(Request $request){
        
        $data =product::all();
        // $store = store::find($id);

        // $store =store::find($id);
        
        return view('toko.showproduct', compact('data'));
    }
    public function update_product($id){

        $data =product::find($id);
        $category=category::all();


        // $data =product::all();

        return view('toko.update_product',compact('data','category'));

    }
    public function updateproduct(Request $request , $id){

        $data =product::find($id);
        $category=category::all();

        // $data=new product;
        $storeId=store::all();
        
        $data->title=$request->title;
        
        $data->price=$request->price;
        
        $data->category=$request->category;
        
        $data->discount_price=$request->discount_price;
        
        $data->description=$request->description;
        
        $data->quantity=$request->quantity;
        
        $data->store_id = $storeId;

        $image=$request->image;

        
        if($image){

            $imagename=time().'.'.$image->getClientOriginalExtension();
        
            $request->image->move('product', $imagename);
            
            $data->image=$imagename;
        
        }
        
       

        $data->save();
        
        // return redirect()->back()->with('message','Product Updated Successfully');
        return redirect()->back()->with('message', 'Product Updated Successfully');
        
        
        // $data =product::all();
        
        // return view('admin.updateview',compact('data'));
        
    }
    public function deleteproduct($id){

        $data =product::find($id);

        $data->delete();

        // return redirect()->back()->with('message','Product Deleted Successfully');;
        return redirect()->back()->with('message', 'Product Deleted Successfully');

        // return view('admin.deleteproduct',compact('data'));

    }
    public function showtoko(Request $request){
        
        $data= store::where('nama_store', '!=', null)->get();
        
        return view('toko.showtoko', compact('data'));
    }
    public function addtoko(){
        $category=category::all();

        return view('toko.addtoko', compact('category'));
    }
    public function addtokoonline(Request $request){
        $store = new store;
        $store->nama_store=$request->nama_store;
        $store->description_store=$request->description_store;
        $store->address=$request->address;
        $store->phone=$request->phone;
        // $store->discount_price=$request->discount_price;
        // $store->category=$request->category;

        $image_store=$request->image_store;
        $imagename = time().'.'.$image_store->getClientOriginalExtension();  
        $request->image_store->move('store', $imagename);  
        $store->image_store=$imagename;
           
        $store->save();
        return redirect()->back()->with('message', 'store Added Successfully');;
    }
    public function update_toko($id){

        $data =store::find($id);
        // $category=category::all();


        // $data =product::all();

        return view('toko.update_toko',compact('data'));

    }
    public function edittoko(Request $request , $id){

        $data =store::find($id);
        // $category=category::all();

        // $data=new product;
       
        
        $data->nama_store=$request->nama_store;
        $data->description_store=$request->description_store;
        $data->address=$request->address;
        $data->phone=$request->phone;
        $image_store=$request->image_store;
        
        if($image_store){

            $imagename=time().'.'.$image_store->getClientOriginalExtension();
        
            $request->image_store->move('store', $imagename);
            
            $data->image_store=$imagename;
        
        };
        
       

        $data->save();
        
        // return redirect()->back()->with('message','Product Updated Successfully');
        return redirect()->back()->with('message', 'Product Updated Successfully');
        
        
        // $data =product::all();
        
        // return view('admin.updateview',compact('data'));
        
    }
    public function showproducthome(Request $request){
        
        $product =product::all();
        // $store = store::find($id);

        // $store =store::find($id);
        
        return view('toko.showproducthome', compact('product'));
    }
    public function toko_favorite(){

        if(Auth::id())
        {
            $id=Auth::user()->id;
            $favorite=favorite::where('user_id','=',$id)->get();
            return view('toko.favorite',compact('favorite'));
        }
        else{
            return redirect('login');
        }
       
    }
    public function addtoko_favorite(Request $request, $id)
{
    if (Auth::check()) {
        $user = Auth::user();
        $product = Product::find($id);

        $favorite = new Favorite();
        $favorite->name = $user->name;
        $favorite->email = $user->email;
        $favorite->phone = $user->phone;
        $favorite->address = $user->address;
        $favorite->user_id = $user->id;
        $favorite->product_title = $product->title;
        $favorite->price = $product->discount_price;

        // $quantity = $request->input('quantity');

        // if ($product->discount_price != null) {
        //     $favorite->price = $product->discount_price * $quantity;
        // } else {
        //     $favorite->price = $product->price * $quantity;
        // }

        $favorite->image = $product->image;
        $favorite->product_id = $product->id;

        // Tindakan berdasarkan tombol yang ditekan
        switch ($request->input('action')) {
            case 'favorite':
                $favorite->save();
                // Tindakan khusus untuk tombol 'Favorite' di sini
                // Misalnya, Anda dapat menambahkan logika tambahan atau menyimpan ke tabel 'favorite'
                break;
            
            case 'cart':
                // Tindakan khusus untuk tombol 'Keranjang' di sini
                // Misalnya, Anda dapat menambahkan logika tambahan atau menyimpan ke tabel 'cart'
                break;

            // Tambahkan tindakan lain jika diperlukan

            default:
                // Tindakan default jika tidak ada tindakan yang sesuai
        }

        $favorite->save();
        return redirect()->back();
    } else {
        return redirect('login');
    }
}

public function productdetails(Request $request, $id)
    {
    // Mendapatkan data produk dari database
    $product = product::find($id);

    $store = $product->store;

    // Mengembalikan tampilan dengan data produk dan data toko
    return view('toko.productdetails', compact('product', 'store'));
}
public function show_carttoko(){

    if(Auth::id())
    {
        $id=Auth::user()->id;
        $cart=cart::where('user_id','=',$id)->get();
        return view('toko.show_carttoko',compact('cart'));
    }
    else{
        return redirect('login');
    }
   
}
    
    
    
    

}
