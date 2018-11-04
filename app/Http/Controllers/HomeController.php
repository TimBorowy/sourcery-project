<?php

namespace App\Http\Controllers;

use App\Category;
use App\Link;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::all();
        $tags = Link::existingTags();
        $categories = Category::all()->pluck('name');
        return view('home', compact('links', 'tags', 'categories'));
    }
}
