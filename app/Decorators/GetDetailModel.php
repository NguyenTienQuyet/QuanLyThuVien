<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/25/2019
 * Time: 12:57 PM
 */

namespace App\Decorators;


use App\Decorators\Handlers\Book\BookCopy\GetBookCopy\CountAvailableHandler;
use App\Decorators\Handlers\Handlerable;
use Illuminate\Database\Eloquent\Model;

trait GetDetailModel
{
    public function getDetailModel(Model $parentModel): ?Model
    {
        $model = $parentModel;
        $books = $model['books'];

        $bookRelated = [];
        $bookHandler = $this->createGetHandler();
        $bookCopyHandler = new CountAvailableHandler();
        $bookHandler->setNextHandler($bookCopyHandler);

        foreach ($books as $book) {
            $bookAttributes['book'] = $book;
            $bookHandler->handle($bookAttributes);
            array_push($bookRelated, $bookAttributes);
            unset($bookAttributes['book']);
        }
        unset($model['books']);
        $model['books'] = $bookRelated;

        return $model;
    }

    abstract public function createGetHandler(): Handlerable;
}