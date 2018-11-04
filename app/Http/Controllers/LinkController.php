<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\LinkRequest;
use App\Link;
use App\Vote;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        //dd($filterTags);

        if($filterTags != null){
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
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function vote(Request $request, Link $link){
        $voteValue = $request->input('vote');


        // Prevent vote form spoofing for wrong values
        if($voteValue == 1 || $voteValue == -1){

            // Try to get vote if already exists
            try{
                // Gives exception if not found
                $vote = Vote::where('user_id', Auth::user()->id)->where('link_id', $link->id)->firstorfail();
                $vote->vote = $voteValue;
                $vote->save();

            } catch(ModelNotFoundException $e){
                $vote = new Vote;
                $vote->user_id = Auth::user()->id;
                $vote->link_id = $link->id;
                $vote->vote = $voteValue;
                $vote->save();

            }
        }

        return redirect(route('index'));
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
        $input['user_id'] = Auth::user()->id;
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
        if($this->isAllowedToModify($link)){
            return response('Unauthorized.', 401);
        }

        $categories = Category::all()->pluck('name', 'id');
        $tags = Link::existingTags()->pluck('name');

        $inputTags = "";

        if (!empty($link->tags[0])) {
            // make string from all tags for this link.
            foreach ($link->tags as $tag) {
                $inputTags .= $tag->name . ",";
            }
            //remove last comma from string
            $inputTags = substr($inputTags, 0, -1);
        }
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
        if ($this->isAllowedToModify($link)) {
            return response('Unauthorized.', 401);
        }

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
        if ($this->isAllowedToModify($link)) {
            return response('Unauthorized.', 401);
        }

        $link->delete();
        return redirect(route('link.index'));
    }

    public function isAllowedToModify($link){
        // Allow modification if user is admin or owner of post.

        return (Auth::user()->role->name != 'Admin' || Auth::user()->id != $link->user_id);
    }
}
