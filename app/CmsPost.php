<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmsPost extends Model
{
    protected $fillable = [
        'title',
        'content',
    ];    
}
