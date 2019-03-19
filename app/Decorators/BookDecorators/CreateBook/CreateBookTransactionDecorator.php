<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/14/2019
 * Time: 5:38 PM
 */

namespace App\Decorators\BookDecorators\CreateBook;


use App\Decorators\EloquentCreateTransactionDecorator;

class CreateBookTransactionDecorator extends EloquentCreateTransactionDecorator
{
    public function __construct(CreateBookDecorator $service)
    {
        parent::__construct($service);
    }
}