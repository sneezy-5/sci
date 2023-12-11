<?php

namespace App\Http\Controllers\store;

use App\Models\Coupon;
use App\Models\Booking;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        if ( \Cart::instance()->count()<= 0) {
            return redirect()->route('homePage');
        }
        $carts = \Cart::content();
        $subtotal = str_replace(',', '', \Cart::subtotal());
        $total=$subtotal;
        if($subtotal<=100000){
            $total = $subtotal+1000;
        }
        return view('store.checkout', compact('total', 'carts', 'subtotal'));
    }


    public function payment(Request $request)
    {
        return view('store.payement');
    }




    public function store(CheckoutRequest $request)
    {
      // dd($request->all());

    
        if (request()->session()->has('coupon')) {
            $total = (\Cart::subtotal() - request()->session()->get('coupon')['remise']) + (\Cart::subtotal() - request()->session()->get('coupon')['remise']) * (config('cart.tax') / 100);
        } else {
            $total = \Cart::subtotal();
        }

        if ($this->checkIfNotAvailable()) {
            Session::flash('error', 'Un produit de votre panier ne se trouve plus en stock.');
            return response()->json(['success' => false], 400);
        }

        $data = $request->json()->all();

        $order = new Booking();


        $products = [];
        $i = 0;

        foreach (\Cart::content() as $product) {
            $products['product_' . $i][] = $product->model->title;
            $products['product_' . $i][] = $product->model->price;
            $products['product_' . $i][] = $product->qty;
            $i++;
        }
        $order->products = serialize($products);
        $order->fullname = $request['fname'];
        // $order->last_name = $request['fname'];
        $order->email = $request['email'];
        $order->phone = $request['phone'];
        $order->city = $request['city'];
        $order->adresse = $request['add'];
        $order->address_type= $request['location'];
        $order->amount = str_replace(',', '', \Cart::subtotal())>=10000?\Cart::subtotal():str_replace(',', '', \Cart::subtotal())+1000;
        $this->updateStock();
        \Cart::destroy();
        $order->save();
       #return  $this->thankyou();
        return redirect()->route('store.thankYou');
        
    }


    public function thankyou()
    {
        return view('store.thankYou');
    }



    private function checkIfNotAvailable()
    {
        foreach (\Cart::content() as $item) {
            $product = Product::find($item->model->id);

            if ($product->stock < $item->qty) {
                return true;
            }
        }

        return false;
    }

    private function updateStock()
    {
        foreach (\Cart::content() as $item) {
            $product = Product::find($item->model->id);
            $product->update(['stock' => $product->stock - $item->qty]);

           
        }
        
    }






}
