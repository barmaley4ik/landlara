<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Onevideo extends Model
{
	use Translatable;
 protected $translatable = ['caption', 'caption_button'];
}
