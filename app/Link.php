<?php

namespace App;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use Taggable;

    protected $fillable = [
        'linkAddress', 'description', 'score', 'category_id', 'allowVoting'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function Tags()
    {
        return $this->belongsToMany('App\Tag', 'link_tags');
    }


}
