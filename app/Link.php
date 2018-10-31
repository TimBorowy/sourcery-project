<?php

namespace App;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use Taggable;

    protected $fillable = [
        'linkAddress', 'description', 'score', 'category_id', 'allowVoting', 'user_id',
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function Tags()
    {
        return $this->belongsToMany('App\Tag', 'link_tags');
    }


}
