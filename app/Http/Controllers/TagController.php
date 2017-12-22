<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', ['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* validate data */
        $this->validate($request, array(
            'title' => 'required|max:255',
        ));
        /* store data to db */
        $tag = new Tag;
        $tag->title = $request->title;
        $tag->save();
        /* return with message */
        return redirect('home')->with('success', 'Tag is successfully saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $tags = Tag::all();
        return view('tags.index', ['tags' => $tags, 'tag' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        /* validate data */
        $this->validate($request, array(
            'title' => 'required|max:255',
        ));
        /* store data to db */
        $tag->title = $request->title;
        $tag->save();
        /* return with message */
        return redirect('home')->with('success', 'Tag is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->articles()->detach();
        $tag->delete();
        return redirect('home')->with('success', 'Tag is successfully deleted!');
    }
}
