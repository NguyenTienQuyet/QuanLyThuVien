<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/25/2019
 * Time: 12:07 PM
 */

namespace App\Decorators\Handlers\Book\Book;


class GetPublisherBookHandler extends GetBookWithRelatedHandler
{
    public function setRelations(): array
    {
        return ['bookImages','authors','genres','bookQuantity'];
    }
}