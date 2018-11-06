<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Formfield extends Model
{
        public function forms()
  {
    return $this->belongsToMany('App\Form', 'form_formfields')->withPivot('order');
  }
}
