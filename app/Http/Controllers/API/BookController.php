<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 4:08 PM
 */

namespace App\Http\Controllers\API;


use App\Decorators\BookDecorators\BorrowBook\BorrowBookDecorator;
use App\Decorators\BookDecorators\BorrowBook\BorrowBookTransactionDecorator;
use App\Decorators\BookDecorators\CreateBook\CreateBookDecorator;
use App\Decorators\BookDecorators\CreateBook\CreateBookTransactionDecorator;
use App\Decorators\BookDecorators\ImportBook\ImportBookDecorator;
use App\Decorators\BookDecorators\ImportBook\ImportBookTransactionDecorator;
use App\Http\Controllers\Requests\API\Book\BookBorrowRequest;
use App\Http\Controllers\Requests\API\Book\BookDeleteRequest;
use App\Http\Controllers\Requests\API\Book\BookGetRequest;
use App\Http\Controllers\Requests\API\Book\BookImportRequest;
use App\Http\Controllers\Requests\API\Book\BookPatchRequest;
use App\Http\Controllers\Requests\API\Book\BookPostRequest;
use App\Services\BookService;
use App\Services\Message;

class BookController extends APIController
{
    public function __construct(BookService $service)
    {
        parent::__construct($service);
    }

    public function get(BookGetRequest $request, int $id = null)
    {
        return parent::_get($request, $id);
    }

    public function post(BookPostRequest $request)
    {
        /**
         * @var BookService $bookService
         */
        $bookService = $this->getService();
        $enhancedService = new CreateBookDecorator($bookService);
        $transactionService = new CreateBookTransactionDecorator($enhancedService);
        $a = $transactionService->createNewModel($request->all());
        if ($a == null) {
            /**
             * @var Message $transactionService
             */
            return $this->message($transactionService);
        }
        return $a;
    }

    public function patch(BookPatchRequest $request, int $id = null)
    {
        return parent::_patch($request, $id);
    }

    public function delete(BookDeleteRequest $request, int $id = null)
    {
        return parent::_delete($request, $id);
    }

    public function import(BookImportRequest $request, int $id = null)
    {
        $id = ($id == null) ? $request->get('id') : $id;
        /**
         * @var BookService $bookService
         */
        $bookService = $this->getService();
        $enhancedService = new ImportBookDecorator($bookService);
        $transactionService = new ImportBookTransactionDecorator($enhancedService);
        $a = $transactionService->updateModel($request->all(), $id);
        if ($a) {
            return ['success'];
        }
        return ['false'];
    }

    public function borrow(BookBorrowRequest $request)
    {
        $id =  $request->get('user_id');
        /**
         * @var BookService $bookService
         */
        $bookService = $this->getService();
        $enhancedService = new BorrowBookDecorator($bookService);
        $transactionService = new BorrowBookTransactionDecorator($enhancedService);
        $a = $transactionService->updateModel($request->all(), $id);
        if ($a) {
            return ['success'];
        }
        return ['false'];
    }
}