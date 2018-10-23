<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Mainland extends Model
{
  public function scopeActive($query)
  {
    return $query->where('status', 1)->firstOrFail();
  }
}
