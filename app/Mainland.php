<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;
use TCG\Voyager\Facades\Voyager;

class Mainland extends Model
{
	use Resizable;
	use Translatable;

    protected $translatable = ['name', 'slogan','title', 'description', 'keyword', 'title_image', 'alt_image'];
    protected $guarded = [];

  public function scopeActive($query)
  {
    return $query->whereStatus(1)->firstOrFail();
  }
}
