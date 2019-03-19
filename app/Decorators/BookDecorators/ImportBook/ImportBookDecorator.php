<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 4:27 PM
 */

namespace App\Decorators\BookDecorators\ImportBook;


use App\Decorators\BookDecorators\EloquentBookDecorator;
use App\Decorators\Handlers\Book\BookCopy\CreateBookCopyHandler;
use App\Decorators\Handlers\Book\BookQuantity\UpdateQuantity\IncreaseQuantityHandler;
use Illuminate\Support\Facades\DB;

class ImportBookDecorator extends EloquentBookDecorator
{
    public function updateModel(array $attributes, $id): bool
    {
        $quantityHandler = new IncreaseQuantityHandler();
        $bookCopyHandler = new CreateBookCopyHandler();

        $attributes['bookId'] = $id;

        $quantityHandler->setNextHandler($bookCopyHandler);
        $handlerResult = $quantityHandler->handle($attributes);

        if ($handlerResult->getResponseStatus() == false) {
            DB::rollBack();
            return false;
        }
        return parent::updateModel($attributes, $id);
    }

}