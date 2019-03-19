<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/16/2019
 * Time: 3:15 PM
 */

namespace App\Decorators\BookHistoryDecorator\ReturnBook;


use App\Decorators\BookHistoryDecorator\EloquentBookHistoryDecorator;
use App\Decorators\Handlers\Book\BookCopy\UpdateBookCopy\UpdatePositiveStateHandler;
use App\Decorators\Handlers\Book\BookHistory\UpdateHistoryHandler;
use Illuminate\Support\Facades\DB;

class ReturnBookDecorator extends EloquentBookHistoryDecorator
{
    public function updateModel(array $attributes, $id): bool
    {
        $bookHistoryService = $this->getService();
        $bookCopyUpdateHandler = new UpdatePositiveStateHandler();
        $bookHistoryUpdateHandler = new UpdateHistoryHandler();

        $bookHistoryUpdateHandler->setNextHandler($bookCopyUpdateHandler);

        //gather input information
        $userId = $attributes['user_id'];
        $bookCopies = $attributes['bookCopies'];

        //set up for searching
        $userPair = [
            'needle' => 'user_id',
            'value' =>  $userId
        ];

        $statePair = [
            'needle' => 'state',
            'value' => true
        ];

        $pairs = [];

        array_push($pairs, $userPair);
        array_push($pairs, $statePair);

        foreach ($bookCopies as $bookCopy) {

            $bookCopyPair = [
                'needle' => 'book_copies_id',
                'value' =>  $bookCopy
            ];

            array_push($pairs, $bookCopyPair);
            unset($pairs[2]);

            $history = $bookHistoryService->getBy($pairs, ['bookCopy']);

            if ($history != null) {
                $handleAttributes['bookCopy'] = $history['bookCopy'];
                $handleAttributes['historyId'] = $history['id'];
                $response = $bookHistoryUpdateHandler->handle($handleAttributes);
                if ($response->getResponseStatus() == false) {
                    DB::rollBack();
                    return false;
                }
            }

        }

        return parent::updateModel($attributes, $id);
    }
}