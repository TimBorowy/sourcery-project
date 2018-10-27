<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'linkAddress', 'description', 'score', 'category_id'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function Tags()
    {
        return $this->belongsToMany('App\Tag', 'link_tags');
    }


}
