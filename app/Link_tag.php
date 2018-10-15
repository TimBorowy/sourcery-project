<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link_tag extends Model
{
    protected $fillable = [
        'tag_id', 'link_id'
    ];
}
