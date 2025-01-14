<?php

namespace App\Http\Controllers;

use App\Models\Newsarticle;
use App\Models\Categorie;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class NewsarticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = Newsarticle::all();
        return view('news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        $authors = Author::all();
        return view('news.form',compact('categories','authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        
        ]);

        $newsarticle = new Newsarticle();
        $newsarticle->title = $request->title;
        $newsarticle->slug = Str::slug($request->title); 
        if( $request->hasFile('image') ){
            $image = $request->file('image');

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'storage/images/';
            $image->move($imagePath, $imageName);

            $newsarticle->image   = $imagePath . $imageName;
        }
        $newsarticle->content = $request->content;
        $newsarticle->category_id = $request->category_id;
        $newsarticle->author_id = $request->author_id;
        $newsarticle->status = $request->status;
        $newsarticle->save();

        return redirect()->route('admin.news')->with('success', 'News created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $news = Newsarticle::find($id);
        $categories = Categorie::all();
        $authors = Author::all();
        return view ('news.form',compact('news','categories','authors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id=$request->id;
        $newsarticle     =  Newsarticle::find($request->id);
        $newsarticle->title = $request->title;

        if( $request->hasFile('image') ){
            $image = $request->file('image');
            if( !empty($newsarticle->image) && file_exists($newsarticle->image) ){
                unlink($newsarticle->image);
           }
            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'storage/images/';
            $image->move($imagePath, $imageName);

            $newsarticle->image   = $imagePath . $imageName;
        }
        $newsarticle->slug = Str::slug($request->title); 
        $newsarticle->content = $request->content;
        $newsarticle->category_id = $request->category_id;
        $newsarticle->author_id = $request->author_id;
        $newsarticle->status = $request->status;
        $newsarticle->save();
        return redirect()->route('admin.news')->with('success', 'News update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $newsarticle = Newsarticle::find($id);
        $newsarticle->delete();
        return redirect()->back()->with('success', ' Delete successfully');
    }

    public function status($id)
    {
        $newsarticle = Newsarticle::find($id);
        if($newsarticle->status == 1){
            $newsarticle->status = 0;
        }else{
            $newsarticle->status = 1;
        }
        $newsarticle->update();
        return redirect()->back()->with('success', ' Status changed successfully');

    }

}
