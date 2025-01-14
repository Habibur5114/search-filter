<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $author = Author::all();
        return view('author.index',compact('author'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('author.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $author = new Author();
        $author->name = $request->name;
        $author->slug = str::slug($request->name);
        $author->bio = $request->bio;
        $author->status = $request->status;
        $author->save();

        return redirect()->route('admin.author')->with('success', 'author created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $author = Author::find($id);
        return view('author.form',compact('author'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, )
    {
        $id = $request->id;
        $author = Author::find($request->id);
        $author->name = $request->name;
        $author->slug = str::slug($request->name);
        $author->bio = $request->bio;
        $author->status = $request->status;
        $author->save();

        return redirect()->route('admin.author')->with('success', 'Author Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $author = Author::find($id);
        $author->delete();
        return redirect()->back()->with('success', ' Delete successfully');
    }


    public function status($id)
    {
        $author = Author::find($id);
        if($author->status == 1){
            $author->status = 0;
        }else{
            $author->status = 1;
        }
        $author->update();
        return redirect()->back()->with('success', ' Status changed successfully');

    }
}
