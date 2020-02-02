<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	protected $fillable = [
        'id',
        'link',
        'title',
        'created_at',
        'updated_at',
    ];
    
    protected $table = 'page';
}
