<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

use App\Category;
use App\Tag;
use Auth;
use Purifier;
use Image;

class ArticleController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(10);
        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.create-edit', ['categories' => $categories, 'tags' => $tags]);
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
            'slug' => 'required|max:255|unique:articles,slug',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ));
        /* store data to db */
        $article = new Article;
        $article->title = $request->title;
        $article->slug = $request->slug;
        $article->content = Purifier::clean($request->content);
        $article->category_id = $request->category_id;
        $article->created_by = Auth::id();
        if($request->hasFile('image')) {
            /*$image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image->getRealPath())->resize(800, 600)->save($location);
            $article->image = $filename;*/
            $path = $request->image->path();
            $extension = $request->image->extension();
            //Image::make($request->file('image')->getRealPath())->encode('jpg', 100)->resize(800, 600)->save();
            $image = $request->image->store('public/images');
            if($request->file('image')->isValid()) {
                $article->image = $image;
            }
        }
        $article->save();
        $article->tags()->sync($request->tags, false);
        /* return with message */
        return redirect('home')->with('success', 'Article is successfully saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.show', ['article' => $article, 'categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.create-edit', ['article' => $article, 'categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        /* validate data */
        if($article->slug == $request->slug){
            $this->validate($request, array(
                'title' => 'required|max:255',
                'content' => 'required',
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            ));
        } else {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => 'required|min:3|max:255|alpha_dash|unique:articles,slug',
                'content' => 'required',
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            ));
        }
        
        /* store data to db */
        $article->title = $request->title;
        $article->slug = $request->slug;
        $article->content = $request->content;
        $article->category_id = $request->category_id;
        $article->updated_by = Auth::id();
        if($request->hasFile('image')) {
            /*$image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image->getRealPath())->resize(800, 600)->save($location);
            $article->image = $filename;*/
            $path = $request->image->path();
            $extension = $request->image->extension();
            //Image::make($request->file('image')->getRealPath())->encode('jpg', 100)->resize(800, 600)->save();
            $image = $request->image->store('public/images');
            if($request->file('image')->isValid()) {
                $article->image = $image;
            }
        }
        $article->save();
        if(isset($request->tags)){
            $article->tags()->sync($request->tags);
        } else {
            $article->tags()->sync(array());
        }
        /* return with message */
        return redirect('home')->with('success', 'Article is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->tags()->detach();
        $article->delete();
        return redirect('home')->with('success', 'Article is successfully deleted!');
    }
}
