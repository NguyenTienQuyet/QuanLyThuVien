<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/25/2019
 * Time: 11:03 AM
 */

namespace App\Decorators\Handlers\Book\Book;


use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;

abstract class GetBookWithRelatedHandler extends BookHandler
{
    public function handle(array &$attributes): HandlerResponse
    {
        $bookService = $this->createHandlerService();
        $book = $attributes['book'];
        $attributes['related'] = $bookService->getModel($this->setRelations(), $book['id']);
        return parent::handle($attributes);
    }

    abstract public function setRelations(): array;
}