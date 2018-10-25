<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Mainland extends Model
{
	protected $attributes = [   
       'blockbaner_id' => -1  
    ] ;
	
  public function scopeActive($query)
  {
    return $query->where('status', 1)->firstOrFail();
  }
}
