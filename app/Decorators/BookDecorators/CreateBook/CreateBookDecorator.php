<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/14/2019
 * Time: 2:43 PM
 */

namespace App\Decorators\BookDecorators\CreateBook;


use App\Decorators\BookDecorators\EloquentBookDecorator;
use App\Decorators\Handlers\Book\BookQuantity\CreateBookQuantityHandler;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateBookDecorator extends EloquentBookDecorator
{
    public function createNewModel(array $attributes): ?Model
    {
        $model = parent::createNewModel($attributes);

        if ($model != null) {
            $attributes['bookId'] = $model['id'];
            $createQuantityHandler = new CreateBookQuantityHandler();
            $response = $createQuantityHandler->handle($attributes);
            if ($response->getResponseStatus() == false) {
                //if related information update activities has errors occurred, roll back database update.
                DB::rollBack();
                $bookService = $this->getService();
                $this->setMessage($bookService, $response->getResponseMessage());
                return null;
            }
        }
        return $model;
    }

}