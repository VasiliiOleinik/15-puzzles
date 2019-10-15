<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class LanguageScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        if ($this->notInDashboard()) {
            $builder->where($model->getTable() . '.language', app()->getLocale());
        }
    }

    /**
     * @return bool
     */
    public static function notInDashboard()
    {
        //мы в админке на странице create (исключение)
        if (preg_match('#admin#', \Request::path()) == 1) {
            return false;
        }
        return true;
    }
}
