<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Oneslider extends Model
{
     protected $attributes = [   
       'sort_order' => 0  
    ] ;
	
	public function blocksliders()
  {
    return $this->belongsToMany('App\Blockslider', 'oneslider_blockslider');
  }
}
