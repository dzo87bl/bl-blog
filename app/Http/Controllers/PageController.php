<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

use Mail;
use Session;

class PageController extends Controller
{
    public function getWelcome() {
    	$articles = Article::orderBy('created_at', 'desc')->paginate(9);
    	return view('welcome', ['articles' => $articles]);
    }

    public function getAbout() {
    	return view('about');
    }

    public function getContact() {
    	return view('contact');
    }

    public function postContact(Request $request) {
        /* validate data */
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|min:10',
        ]);
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message, 
        );
        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('example@test.com');
            $message->subject('Message from BL-Blog');
        });
        return view('contact')->with('success', 'Email is successfully sent!');
    }

    public function postSearch(Request $request) {
        $articles = Article::paginate(9);
        $search = $request->search;
        if(!empty($search)) {
            $articles = Article::where('title', 'LIKE', $search . '%')->orWhere('content', 'LIKE', '%' . $search . '%')->paginate(9);
        }
        return view('welcome', ['$articles' => $articles]);
    }

}
