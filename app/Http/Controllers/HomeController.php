<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Services;
// use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
// use Spatie\Newsletter\Facades\Newsletter;
use Newsletter;

class Homecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::paginate(5);
        return view('home.index',compact('services'));
    }


 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        $services = Services::paginate(5);
        return view('home.about',compact('services'));
    }

    public function service()
    {
        $services =Services::paginate(5);
        return view('home.service',compact('services'));
    }

    public function contact()
    {
        $services = Services::paginate(5);
        return view('home.contact',compact('services'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMessage(Request $request)
    {
        $request->validate([
            'nom_complet' => 'required',
            'address_mail' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
            'sujet' => 'required',
            'phone' => ['required', 'regex:/^\d{10,}$/'],
            'message' => 'required',

        ]);
       // dd($request->all());
        Contact::create($request->except('_token'));
        Session::flash('success', 'Votre message a été soumis avec succès!');
        return redirect()->back();
    }

    public function storeEmail(Request $request)
    {
        $request->validate([
            'adresse_mail'=>['required','unique:newsletters', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],


        ]);

        // Newsletter::create($request->all());
        if ( ! Newsletter::isSubscribed($request->adresse_mail) ) {
            Newsletter::subscribe($request->adresse_mail);
            dd('dvvevsdv');
        }
        // Newsletter::subscribe($request->adresse_mail);
        Session::flash('success', 'Votre suscription a été effectué avec succès!');
        return redirect()->back();
    }


    public function show_service($id)
    {
        $service = Services::find($id);
        $services = Services::paginate(5);
        return view('home.serviceDetail',compact('service','services'));
    }


}
