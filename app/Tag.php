<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    public function Link(){
        return $this->belongsToMany('App\Link', 'link_tags');
    }
}
