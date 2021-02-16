<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::withCount('products')->get();
        return view('tags.index', ['tags' => $tags]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(tag $tag)
    {
        $tag->delete();
    }
}
