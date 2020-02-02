<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	protected $fillable = [
        'id',
        'link',
        'title',
    ];
    
    protected $table = 'page';

    public $timestamps = false;
}
