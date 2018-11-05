<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\NotAdminMenuItemScope;

class Landmenuitem extends Model
{
	protected $table = 'menu_items';
	
	
  protected static function boot()
  {
    parent::boot();

    static::addGlobalScope(new NotAdminMenuItemScope);
  }	

}
