<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use Purifier;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('categories.create-edit', [ 'categories' => $categories]);
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
            'description' => 'required',
        ));
        /* store data id db */
        $category = new Category;
        $category->title = $request->title;
        $category->description = Purifier::clean($request->description);
        $category->parent_id = $request->parent_id;
        $category->save();
        /* return with message */
        return redirect('/home')->with('success', 'Category is successfully saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('categories.create-edit', ['category' => $category, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        /* validate data */
        $this->validate($request, array(
            'title' => 'required|max:255',
            'description' => 'required',
        ));
        /* store data id db */
        $category->title = $request->title;
        $category->description = Purifier::clean($request->description);
        $category->parent_id = $request->parent_id;
        $category->save();
        /* return with message */
        return redirect('/home')->with('success', 'Category is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('home')->with('success', 'Category is successfully deleted!');
    }
}
