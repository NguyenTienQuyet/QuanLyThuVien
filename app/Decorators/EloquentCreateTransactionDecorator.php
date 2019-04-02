<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 4:30 PM
 */

namespace App\Decorators;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

abstract class EloquentCreateTransactionDecorator extends EloquentDecorator
{
    public function createNewModel(array $attributes): ?Model
    {
        $model = null;
        DB::transaction(function () use ($attributes, &$model) {
            $model = parent::createNewModel($attributes);
            $attachedChecker = $this->attachCreate($model, $attributes);
            if (!$attachedChecker) {
                DB::rollBack();
            }
        });
        return $model;
    }

    abstract function attachCreate(Model $model, array $attributes) : bool;
}