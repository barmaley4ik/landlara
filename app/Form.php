<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Form extends Model
{
    public function form_formfields()
  {
    return $this->belongsToMany('App\Formfield', 'form_formfields')->withPivot('order');
  }
}
