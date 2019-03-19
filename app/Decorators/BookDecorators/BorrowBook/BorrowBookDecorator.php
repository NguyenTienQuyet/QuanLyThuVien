<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 5:21 PM
 */

namespace App\Decorators\BookDecorators\BorrowBook;


use App\Decorators\BookDecorators\EloquentBookDecorator;
use App\Decorators\Handlers\Book\BookCopy\GetBookCopy\CheckAvailableBookCopyHandler;
use App\Decorators\Handlers\Book\BookCopy\GetBookCopy\GetAvailableBookCopyHandler;
use App\Decorators\Handlers\Book\BookCopy\UpdateBookCopy\UpdateNegativeState\UpdateBorrowedStateHandler;
use App\Decorators\Handlers\Book\BookHistory\CheckHistoryHandler;
use App\Decorators\Handlers\Book\BookHistory\CreateBookHistoryHandler;
use App\Decorators\Handlers\Handlerable;
use Illuminate\Support\Facades\DB;

class BorrowBookDecorator extends EloquentBookDecorator
{
    public function updateModel(array $attributes, $id): bool
    {
        $requiredBooks = $attributes['books'];
        $handleAttributes['userId'] = $id;

        $checkHistoryHandler = new CheckHistoryHandler();
        $checkCopyHandler = new CheckAvailableBookCopyHandler();
        $getCopyHandler = new GetAvailableBookCopyHandler();
        $updateCopyHandler = new UpdateBorrowedStateHandler();
        $createHistoryHandler = new CreateBookHistoryHandler();

        $checkHistoryHandler->setNextHandler($checkCopyHandler);
        $checkCopyHandler->setNextHandler($getCopyHandler);
        $getCopyHandler->setNextHandler($updateCopyHandler);
        $updateCopyHandler->setNextHandler($createHistoryHandler);


        //set up total quantity for checking history
        $totalQuantity = 0;
        foreach ($requiredBooks as $requiredBook) {
            $totalQuantity += $requiredBook['quantity'];
        }
        $handleAttributes['totalQuantity'] = $totalQuantity;

        //
        foreach ($requiredBooks as $requiredBook) {
            $handleAttributes['bookId'] = $requiredBook['book_id'];
            $handleAttributes['quantity'] = $requiredBook['quantity'];
            $this->arrangeHandler($handleAttributes['quantity'], $createHistoryHandler);
            $handlerResponse = $checkHistoryHandler->handle($handleAttributes);
            if ($handlerResponse->getResponseStatus() == false) {
                DB::rollBack();
                return false;
            }
        }

        return true;
    }

    private function arrangeHandler(int $quantity, Handlerable &$handler): Handlerable
    {
        $newGetCopyHandler = null;

        for ($i = 0; $i < $quantity - 1; $i ++) {
            $newGetCopyHandler = new GetAvailableBookCopyHandler();
            $newUpdateCopyHandler = new UpdateBorrowedStateHandler();
            $newCreateHistoryHandler = new CreateBookHistoryHandler();

            $newGetCopyHandler->setNextHandler($newUpdateCopyHandler);
            $newUpdateCopyHandler->setNextHandler($newCreateHistoryHandler);

            if ($quantity >= 2) {
                $newCreateHistoryHandler->setNextHandler($newGetCopyHandler);
            }
        }

        $handler->setNextHandler($newGetCopyHandler);

        return $handler;
    }
}