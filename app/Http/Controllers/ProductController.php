<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use App\ProductVarient;
use Validator;
use Auth;
use AddToCart;

class ProductController extends Controller
{
	/*Create Page of product*/
    public function create()
    {
        return view('createProduct');
    }

/*Store Product in products*/
    public function storeProduct(Request $request){
        $this->validate($request, [
      		'name'           => 'required|string|max:255',
            'product_price'  => 'required',
            'category'       => 'required',
            'image'          => 'required',
            'size_xxl'       => 'required',
            'size_large'     => 'required',
            'size_medium'    => 'required',
            'size_xl'        => 'required',
    	]);
            
        if($request->hasfile('image')){
            $photo = time().'.'.$file->getClientOriginalExtension();
                $file->move('images/brandImages', $photo);  
                $data = $photo;
        //     foreach($request->file('image') as $file)
        //     {
        //         $photo = time().'.'.$file->getClientOriginalExtension();
        //         $file->move('images/brandImages', $photo);  
        //         $data[] = $photo;  
        //     }
        }

        $product 				= 	new Product;
        $product->product_name	=	$request->name;
        $product->product_price	=	$request->product_price;
        $product->category		=	$request->category;
        $product->save();
        if($product->id){
            ProductImage::create([
                'product_id'    =>  $product->id, 
                'image'         =>   $data,
            ]);

            ProductVarient::create([
                'product_id'     => $product->id,
                'size_xxl'       => $request->size_xxl,
                'size_large'     => $request->size_large,
                'size_medium'    => $request->size_medium,
                'size_xl'        => $request->size_xl,
            ]);
               
        }

               
        return back()->with('success', 'Products and files has been successfully added');       
    }

    /*List Of products*/
    public function productList(Request $request){
        $getProductDetails = Product::with('getImages','getVarient')->get();
        return view('productList',compact('getProductDetails'));
    }

    /*Details of product*/
    public function productdetails($id){
        $product = Product::with('getImages','getVarient')->where('id',$id)->first();
        return view('detailsProduct',compact('product'));

    }

    /*For add to card*/

    public function addToCart(Request $request){
        $storeAddToCart = new AddToCart;
        $storeAddToCart->product_id = $request->product_id;
        $storeAddToCart->user_id    = Auth::User()->id;
        $storeAddToCart->size       = $request->size;
        $storeAddToCart->quantity   = $request->quantity;
        $storeAddToCart->Save();
        return back()->with('success', 'Products and files has been successfully added');  

    }

    /*Check Cart*/
    public function urCartDetails(){
        $loginUser = Auth::User()->id;
        $getOrders = AddToCart::with('getUserInfo','productDetails')->where('user_id',$loginUser)->get();
        return view('orderDEtails',compact('getOrders'));

    }

}
