<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::orderBy('id', 'desc')->paginate(5);
        return view('admin.services.services',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.service');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'required',

        ]);
        $data = $request->except('_token');

        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename. ''. time().'.'.$extension;
            // Upload Image $path = 
            $request->file('image')->storeAs('public/image', $fileNameToStore);
               
            
            $data['image']=$fileNameToStore;
            } else {
                $fileNameToStore = 'noimage.jpg';
                $data['image']=$fileNameToStore;
                }

                   // dd($data);
    
        try {

            Services::create($data);
            $services  = Services::orderBy('id', 'desc')->paginate(5);

            return response()->json(['success' => true, 'message' => 'La catégorie a été enregistrée avec succès.', 'services' => $services], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Une erreur est survenue lors de l\'enregistrement de la catégorie.', 'error' => $e->getMessage()], 500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Services::find($id);
        return view('admin.services.show_service',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Services::find($id);
        return response()->json(['success' => true,  'service' => $service], 200);
        // return view('admin.services.edit_service',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');

        if ($request->hasFile('image')) {
;            $filenameWithExt = $request->file('image')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename. ''. time().'.'.$extension;
            // Upload Image $path = 
            $request->file('image')->storeAs('public/image', $fileNameToStore);
               
            
            $data['image']=$fileNameToStore;
            } else {
                $fileNameToStore = 'noimage.jpg';
                $data['image']=Services::find($id)->image;
                }

                   // dd($data);
        try {

            Services::find($id)->update($data);
            $services  = Services::orderBy('id', 'desc')->paginate(5);

            return response()->json(['success' => true, 'message' => 'La catégorie a été enregistrée avec succès.', 'services' => $services], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Une erreur est survenue lors de l\'enregistrement de la catégorie.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Services::find($id)->delete();

        return redirect()->route('services.index');

    }
}
