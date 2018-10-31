<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\LinkRequest;
use App\Link;
use App\Tag;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::all();
        return view('link.index', compact('links'));
    }

    public function search(Request $request){

        $searchQuery = $request->input('searchQuery');
        $filterTags = $request->input('tags');

        if($filterTags == null){
            $links = Link::withAnyTag($filterTags)->where('description', 'LIKE', '%' . $searchQuery . '%')->get();
        } else {
            $links = Link::where('description', 'LIKE', '%' . $searchQuery . '%')->get();
        }

        $tags = Link::existingTags();


        return view('home', compact('links', 'tags', 'filterTags', 'searchQuery'));
    }


    /**
     * Up vote the specified resource.
     *
     * @param  \App\Link $link
     * @return \Illuminate\Http\Response
     */
    public function upvote(Link $link){
        $link->score++;
        $link->update();
        return redirect(route('link.index'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        $tags = Link::existingTags()->pluck('name');

        return view('link.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  LinkRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinkRequest $request)
    {
        $input = $request->all();
        //$input->allowVoting = 1;
        $link = Link::create($input);

        $link->tag(explode(',', $request->tags));

        return redirect(route('link.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        return view('link.show', compact('link'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        $categories = Category::all()->pluck('name', 'id');
        $tags = Link::existingTags()->pluck('name');

        $inputTags = "";
        // make string from all tags for this link.
        foreach ($link->tags as $tag) {
            $inputTags .= $tag->name.",";
        }
        //remove last comma from string
        $inputTags = substr($inputTags, 0, -1);

        return view('link.edit', compact('link','categories', 'tags', 'inputTags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  LinkRequest;  $request
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(LinkRequest $request, Link $link)
    {
        $link->update($request->all());

        $link->retag(explode(',', $request->tags));
        return redirect(route('link.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     * @throws ? XD
     */
    public function destroy(Link $link)
    {
        $link->delete();
        return redirect(route('link.index'));
    }
}
