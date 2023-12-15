<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =  Product::orderBy('id', 'desc')->paginate(5);

        // $produits->setPageName('product_page');
        return view('admin.products.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {


        $data = $request->except('_token');
        //dd($data);
        if ($request->hasFile('picture')) {
            $filenameWithExt = $request->file('picture')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('picture')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename. ''. time().'.'.$extension;
            // Upload Image $path =
            $request->file('picture')->storeAs('public/image', $fileNameToStore);
            // $request->file('picture')->storeAs('public/image', $fileNameToStore,['do']);
            }

        // Else add a dummy image
        else {
            $fileNameToStore = 'noimage.jpg';
            }
            // $data['status']=isset($request->status);
            $data['picture']=$fileNameToStore;
            $data['slug']=$request['title'];


        try {

            Product::create($data);
            $products  = Product::orderBy('id', 'desc')->paginate(5);

            return response()->json(['success' => true, 'message' => 'La catégorie a été enregistrée avec succès.', 'products' => $products], 200);
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
        $produit = Product::where('id', $id)->get();
        //return view()
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return response()->json(['success' => true,  'product' => $product], 200);

        // return view('admin.products.edit_product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {

        $data = $request->except(['_token','_method']);

        if ($request->hasFile('picture')) {
            $filenameWithExt = $request->file('picture')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('picture')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename. ''. time().'.'.$extension;
            // Upload Image$path =
            $request->file('picture')->storeAs('public/image', $fileNameToStore);
            $data['picture']=$fileNameToStore;
            }
        // Else add a dummy image

        // $data['status']=isset($request->status);


        try {

            Product::find($id)->update($data);
            $products  = Product::orderBy('id', 'desc')->paginate(5);

            return response()->json(['success' => true, 'message' => 'La catégorie a été enregistrée avec succès.', 'products' => $products], 200);
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
        if (Product::where('id', $id)->exists()){
            Product::find($id)->delete();
        }else{
            return response()->json(['error'=>'produit dose not exist']);
        }
        return redirect()->route('products.index');
    }
}
