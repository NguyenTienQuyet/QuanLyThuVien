<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/14/2019
 * Time: 5:36 PM
 */

namespace App\Decorators\BookDecorators\ImportBook;


use App\Decorators\EloquentUpdateTransactionDecorator;

class ImportBookTransactionDecorator extends EloquentUpdateTransactionDecorator
{
    public function __construct(ImportBookDecorator $service)
    {
        parent::__construct($service);
    }
}