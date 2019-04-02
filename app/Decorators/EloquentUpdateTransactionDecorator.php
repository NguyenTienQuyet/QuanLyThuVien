<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 4:33 PM
 */

namespace App\Decorators;


use Illuminate\Support\Facades\DB;

abstract class EloquentUpdateTransactionDecorator extends EloquentDecorator
{
    public function updateModel(array $attributes, $id): bool
    {
        $model = null;
        DB::transaction(function () use ($attributes, $id, &$model) {
            $model = parent::updateModel($attributes, $id);
            $attachedChecker = $this->attachUpdate($model, $attributes);
            if (!$attachedChecker) {
                DB::rollBack();
            }
        });

        return $model;
    }

    abstract public function attachUpdate(bool $model, array $attributes): bool;
}