<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;

class Mainland extends Model
{
	use Resizable;
	
  public function scopeActive($query)
  {
    return $query->whereStatus(1)->firstOrFail();
  }
}
