<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Oneslider;

class Blockslider extends Model
{
     protected $attributes = [   
       'sort_order' => 0  
	] ;
	
   public function sliders()
  {
    return $this->belongsToMany('App\Oneslider', 'oneslider_blockslider');
  } 
}
