<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/25/2019
 * Time: 12:06 PM
 */

namespace App\Decorators\Handlers\Book\Book;


class GetAuthorBookHandler extends GetBookWithRelatedHandler
{

    public function setRelations(): array
    {
        return ['bookImages','genres','publisher','bookQuantity'];
    }
}