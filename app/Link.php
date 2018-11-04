<?php

namespace App;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Link extends Model
{
    use Taggable;

    protected $fillable = [
        'linkAddress', 'description', 'category_id', 'allowVoting', 'user_id',
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function score(){
        return Vote::where('link_id', $this->id)->sum('vote');
    }

    public function userVote(){
        if(Auth::check()){

            return Vote::where('link_id', $this->id)->where('user_id', Auth::user()->id)->pluck('vote')->first();
        }

        return false;
    }



}
