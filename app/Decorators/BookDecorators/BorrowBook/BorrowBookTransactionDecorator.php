<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/14/2019
 * Time: 5:35 PM
 */

namespace App\Decorators\BookDecorators\BorrowBook;


use App\Decorators\EloquentUpdateTransactionDecorator;

class BorrowBookTransactionDecorator extends EloquentUpdateTransactionDecorator
{
    public function __construct(BorrowBookDecorator $service)
    {
        parent::__construct($service);
    }
}