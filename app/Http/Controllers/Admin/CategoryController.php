<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories =Category::orderBy('id', 'desc')->paginate(5);
        return view('admin.categories.categories',compact('categories'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.category');
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name'=>'required',

    //     ]);
    //     $data = $request->except('_token');

    //                // dd($data);
    //     Category::create($data);
    //     return redirect()->route('categories.index');

    // }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            $data = $request->except('_token');
            $category = Category::create($data);
            $categories = $categories = Category::orderBy('id', 'desc')->paginate(5);

            return response()->json(['success' => true, 'message' => 'La catégorie a été enregistrée avec succès.', 'categories' => $categories], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Une erreur est survenue lors de l\'enregistrement de la catégorie.', 'error' => $e->getMessage()], 500);
        }
    }

      /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit_category',compact('category'));
    }

       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $data = $request->except('_token');

    //                // dd($data);
    //     Category::find($id)->update($data);
    //     return redirect()->route('categories.index');

    // }
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');

                   // dd($data);



        try {
            $data = $request->except('_token');
            Category::find($id)->update($data);
            $categories = $categories = Category::orderBy('id', 'desc')->paginate(5);

            return response()->json(['success' => true, 'message' => 'La catégorie a été modifié avec succès.', 'categories' => $categories], 200);
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
        Category::find($id)->delete();

        return redirect()->route('categories.index');

    }
}
