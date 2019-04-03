<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/2/2019
 * Time: 11:22 PM
 */

namespace App\Decorators\BookDecorators;


use App\Decorators\EloquentCreateTransactionDecorator;
use App\Decorators\Handlers\Book\BookQuantity\CreateBookQuantityHandler;
use App\Services\BookService;
use Illuminate\Database\Eloquent\Model;

class CreateBookDecorator extends EloquentCreateTransactionDecorator
{
    public function __construct(BookService $service)
    {
        parent::__construct($service);
    }

    public function attachCreate(Model &$model, $attributes): bool
    {
        if ($model != null) {
            $attributes['bookId'] = $model['id'];
            $createQuantityHandler = new CreateBookQuantityHandler();
            $response = $createQuantityHandler->handle($attributes);
            if ($response->getResponseStatus() == true) {
                return true;
            }
            //if related information update activities has errors occurred, roll back database update.
            $bookService = $this->getService();
            $this->setMessage($bookService, $response->getResponseMessage());
            return false;
        }
        return false;
    }
}