<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 5:09 PM
 */

namespace App\Decorators\Handlers\Book\BookCopy;


use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;

class CreateBookCopyHandler extends BookCopyHandler
{
    public function handle(array &$attributes): HandlerResponse
    {
        $bookCopyService = $this->createHandlerService();
        $importNumber = $attributes['quantity'];

        //set up updated data
        $bookCopyAttributes['book_id'] = $attributes['bookId'];
//        $bookCopyAttributes['title'] =
        $bookCopyAttributes['state_detail'] = 'available';

        for ($i = 0; $i < $importNumber; $i++) {
            $bookCopyService->createNewModel($bookCopyAttributes);
        }

        return parent::handle($attributes);
    }
}