<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Product;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::paginate(5);
        //dd($bookings);
        return view('admin.booking.bookings', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.booking.order', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    {
        $products = [];
        $i=0;
        $products['product_' . $i][] = Product::find($request['produit'])->title;
        $products['product_' . $i][] = Product::find($request['produit'])->price;
        $products['product_' . $i][] = 1;
        $i++;

        $order = [];
        $order['first_name'] = $request['fname'];
        $order['last_name'] = $request['lname'];
        $order['email'] = $request['email'];
        $order['number'] = $request['phone'];
        $order['city'] = $request['city'];
        $order['adresse'] = $request['add'];
        $order['amount'] = Product::find($request['produit'])->price;
        $order['products'] = Product::find($request['produit']);
       //dd($order);
        Booking::create($order);
        return redirect()->route('booking.index');

    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::find($id);
        return view('admin.booking.show_order', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);
        return view('admin.booking.edit_order', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CheckoutRequest $request, $id)
    {
       

         Booking::find($id)->update($request->except('_token'));
         return redirect()->route('booking.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Booking::find($id)->delete();
        return redirect()->route('bookings.index');
    }
}