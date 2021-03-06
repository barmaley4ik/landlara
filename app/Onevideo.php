<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
use TCG\Voyager\Facades\Voyager;

class Onevideo extends Model
{
	use Translatable;
    protected $translatable = ['caption', 'caption_button'];
    protected $guarded = [];

    public function scopeActive($query)
  {
    return $query->where('status', 1)->first();
  }
}
