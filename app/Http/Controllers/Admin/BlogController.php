<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate(5);
        return view('admin.blogs.blogs', compact('blogs'));
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.blog');
    }

       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
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
            $data['picture']=$fileNameToStore;

        Blog::create($data);
        return redirect()->route('blogs.index');
    }

      /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Blog::find($id);
       
        return view('admin.blogs.edit_blog', compact('blog'));
    }

       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id)
    {

        $data = $request->except(['_token','_method']);

        if ($request->hasFile('picture', '_method')) {
            $filenameWithExt = $request->file('picture')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('picture')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename. ''. time().'.'.$extension;
            // Upload Image$path = 
            $request->file('picture')->storeAs('public/image', $fileNameToStore,'do');
            $data['picture']=$fileNameToStore;
            }
        // Else add a dummy image
       
        $data['status']=isset($request->status);
            
        Blog::find($id)->update($data);
        return redirect()->route('blogs.index');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Blog::where('id', $id)->exists()){
            Blog::find($id)->delete();
        }else{
            return response()->json(['error'=>'produit dose not exist']);
        }
        return redirect()->route('blogs.index');
    }

}
