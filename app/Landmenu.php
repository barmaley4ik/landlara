<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\NotAdminMenuScope;

class Landmenu extends Model
{
	protected $table = 'menus';
	
	
  protected static function boot()
  {
    parent::boot();

    static::addGlobalScope(new NotAdminMenuScope);
  }	

}
