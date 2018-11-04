<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class NotAdminMenuScope implements Scope
{
  /**
   * Применение заготовки к данному построителю запросов Eloquent.
   *
   * @param  \Illuminate\Database\Eloquent\Builder  $builder
   * @param  \Illuminate\Database\Eloquent\Model  $model
   * @return void
   */
   /*добавить сохранение в базе, какое меню админское, и вытягивать из бд, потом подставлять в скоп*/
  public function apply(Builder $builder, Model $model)
  {
    $builder->where('id', '<>', 1);
  }
}
