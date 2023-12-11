<?php

namespace App\Http\Controllers\store;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::content();

        $subtotal = str_replace(',', '', \Cart::subtotal());
        return view('store.cart', compact('carts', 'subtotal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd($request->all());
        $duplicata = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id == $request->product_id;
        });

        if ($duplicata->isNotEmpty()) {
            return back()->with('success', 'Le produit a déjà été ajouté.');
        }

        $product = Product::find($request->product_id);
        $product_quantity = $request['product-quatity'];
        if($product_quantity<=0){
            $product_quantity=1;
        }
        Cart::add($product->id, $product->title, $product_quantity, $product->price)
            ->associate('App\Models\Product');

        return back()->with('success', 'Le produit a bien été ajouté.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->json()->all();

        $validates = Validator::make($request->all(), [
            'product-quantity' => 'required|integer|between:1,100',
        ]);

        if ($validates->fails()) {
            #Session::flash('error', 'La quantité doit est comprise entre 1 et 100.');
            return response()->json(['error' => 'Cart Quantity Has Not Been Updated', 'request'=>$request->except('_token','_method')]);
        }
        try{
            $quantity = $request['product-quantity'];
            
                #$quantity = $quantity-1==0?1:$quantity-1;
                $cart = Cart::update($request['row_id'], $quantity);
                #$cart = Cart::update($request['row_id'], $quantity+1);
            

        } catch(Exception $e){
            Session::flash('error', 'le produit n\'existe pas');
            #return response()->json(['success' => 'Cart Quantity Has Been Updated']);
        }

        $subtotal = $cart->price*$cart->qty;
        return response()->json(['response'=>$request['row_id'], 'q'=>$subtotal,'subtotal'=>Cart::subtotal(),'totals'=>Cart::total(),'total'=>str_replace(',', '', \Cart::subtotal()),'qty'=>$cart->qty],202); #back()->with('success', 'mis à jour.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {

        try{
            Cart::remove($rowId);
        }catch(Exception $e){
           return back()->with('error', 'Le produit a été supprimé');
        }

        return back()->with('success', 'Le produit a été supprimé.');
    }


    public function destroyAll()
    {
        try{
            Cart::destroy();
        }catch(Exception $e){
           return back()->with('error', 'Le produit a été vidé');
        }



        return back()->with('success', 'Le panier a été vidé.');
    }


}
