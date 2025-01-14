<?php

namespace App\Http\Controllers;

use App\Models\Frontend;
use App\Models\Newsarticle;
use App\Models\Categorie;
use App\Models\Author;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fronts = Newsarticle::all();
        return view ('frontend.index',compact('fronts'));
    }


    public function search(Request $request)
    {
        $query = $request->input('query');
         
        $cat = Categorie::where('name', 'LIKE', "%{$query}%")->pluck('id')->toArray();
        $aut = Author::where('name', 'LIKE', "%{$query}%")->pluck('id')->toArray();

        $results = Newsarticle::where('title', 'LIKE', "%{$query}%");
        if($cat != null){
            $results = $results
            ->orWhereIn('category_id',$cat);
            
        }
        if($aut != null){
            $results = $results
            ->orWhereIn('author_id',$aut);
        }

        $results=$results->with('category','author')
        ->get();

       
        return response()->json($results);
 
    }

  



   


    public function details($slug)
   {
    $details = Newsarticle::where('slug', $slug)->first();

    if (!$details) {
        abort(404, 'Article not found');
    }
    return view('frontend.details', compact('details'));
   }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Frontend $frontend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Frontend $frontend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Frontend $frontend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Frontend $frontend)
    {
        //
    }
}
