<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stocks extends Model
{
    protected $fillable = ['item_name', 'item_type', 'item_quantity','item_description'];

    public function scopeSearch($q)
	{
	    return empty(request()->search) ? $q : $q->where('name', 'like', '%'.request()->search.'%');
	}
}
