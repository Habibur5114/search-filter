<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::all();
        return view ('categories.manage',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('categories.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        
        ]);

        $categories = new Categorie();
        $categories->name = $request->name;
        $categories->slug = Str::slug($request->name); 
        $categories->status = $request->status;
        $categories->save();

        return redirect()->route('admin.categories')->with('success', 'Categories created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categories = Categorie::find($id);
        return view ('categories.index',compact('categories'));
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
        $categories     =  Categorie::find($request->id);
        $categories->name = $request->name;
        $categories->slug = Str::slug($request->name); 
        $categories->status = $request->status;
        $categories->save();
        return redirect()->route('admin.categories')->with('success', 'Categories update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categories = Categorie::find($id);
        $categories->delete();
        return redirect()->back()->with('success', ' Delete successfully');
    }

    public function status($id)
    {
        $categories = Categorie::find($id);
        if($categories->status == 1){
            $categories->status = 0;
        }else{
            $categories->status = 1;
        }
        $categories->update();
        return redirect()->back()->with('success', ' Status changed successfully');

    }

}
