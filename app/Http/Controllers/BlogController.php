<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class BlogController extends Controller
{
    public function getArticle($slug) {
    	$article = Article::where('slug', '=', $slug)->first();
    	return view('blog.article', ['article' => $article]);
    }
}
