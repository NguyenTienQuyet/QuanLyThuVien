<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/25/2019
 * Time: 11:03 AM
 */

namespace App\Decorators\Handlers\Book\Book;


use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;

class GetGenreBookWithRelatedHandler extends BookHandler
{
    public function handle(array &$attributes): HandlerResponse
    {
        $bookService = $this->createHandlerService();
        $attributes['related'] = $bookService->getModel(['bookImages','authors','publisher','bookQuantity'], $attributes['id']);
        return parent::handle($attributes);
    }
}