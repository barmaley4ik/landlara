<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Onevideo extends Model
{
 protected $translatable = ['caption', 'caption_button'];
}
