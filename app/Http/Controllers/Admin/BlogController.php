<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Http\Requests\BlogRequest;
use App\Jobs\SubscriptionJob;
use App\Mail\SubscriptionMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Newsletter;


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
        $categories =Category::orderBy('id', 'desc')->get();
        return view('admin.blogs.blogs', compact('blogs','categories'));
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


        try {
            $data['slug'] = $request['title'];
            Blog::create($data);
            $blogs  = Blog::orderBy('id', 'desc')->paginate(5);



            #3. Envoi du mail
            //dispatch(new SubscriptionJob($data));
            $newsletters =  Newsletter::all();
            foreach($newsletters as $key=>$news){
               // dd($news->adresse_mail);
                Mail::to($news->adresse_mail)
                ->queue(new SubscriptionMail($request->all()));
            }

        //    Mail::to("adingranarcisse211@gmail.com")
        //    ->queue(new SubscriptionMail($request->all()));
            return response()->json(['success' => true, 'message' => 'La post a été modifié avec succès.', 'blogs' => $blogs], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Une erreur est survenue lors de l\'enregistrement du post.', 'error' => $e->getMessage()], 500);
        }

        #return redirect()->route('blogs.index');
    }

      /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return response()->json(['success' => true,  'blog' => $blog], 200);

        #return view('admin.blogs.edit_blog', compact('blog'));
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
            $request->file('picture')->storeAs('public/image', $fileNameToStore);
            $data['picture']=$fileNameToStore;
            }
        // Else add a dummy image

        try {
        Blog::find($id)->update($data);
        $blogs  = Blog::orderBy('id', 'desc')->paginate(5);

        return response()->json(['success' => true, 'message' => 'La post a été modifié avec succès.', 'blogs' => $blogs], 200);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Une erreur est survenue lors de l\'enregistrement du post.', 'error' => $e->getMessage()], 500);
    }
       # return redirect()->route('blogs.index');
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
