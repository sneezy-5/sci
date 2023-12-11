<?php

namespace App\Http\Controllers\store;

use Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('status', 0)->get();
        $last_products = Product::where('status',1)->orderBy('created_at', 'DESC')->get();

       // $path = Storage::disk('s3')->url("image/$last_products");
        
        return view('store.home', compact('products', 'last_products'));
    }

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function products()
    {
        $products = Product::paginate(6);
        return view('store.product', compact('products'));
    }


    public function details($produit_slug)
    {
        
        $product = Product::where('title',$produit_slug)->firstOrFail();

        $last_products = Product::paginate(4);

        $stock = $product->stock === 0 ? 'Indisponible' : 'Disponible';
        //dd($produit);
        return view('store.product_detail', compact('product','stock', 'last_products'));
    }

   public function search(){
        // request()->validate([
        //     'q' => 'required|min:3'
        // ]);
            
        $all_products = Product::where('status', 1)->get();
        $q = request()->input('q');
           // dd($q);
        $products = Product::where('title', 'like', "%$q%")
                ->orWhere('description', 'like', "%$q%")
                ->paginate(10);

        return view('store.search', compact('products','categories','all_products'));
   }
   
}
