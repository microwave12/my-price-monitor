<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class PageDetail extends Model
{
	protected $fillable = [
        'id',
        'page_id',
        'image',
        'description',
        'amount',
        'currency',
        'created_at',
        'updated_at',
    ];
    
    protected $table = 'page_details';
}
