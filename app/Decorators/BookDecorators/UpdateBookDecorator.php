<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/26/2019
 * Time: 4:51 PM
 */

namespace App\Decorators\BookDecorators;


use App\Decorators\EloquentUpdateTransactionDecorator;
use App\Decorators\Handlers\Image\Create\CreateBookImageHandler;
use App\Decorators\Handlers\Image\Upload\UploadBookImageHandler;

class UpdateBookDecorator extends EloquentUpdateTransactionDecorator
{

    public function attachUpdate(bool $updateChecker, array $attributes, int $id): bool
    {
        $attributes['bookId'] = $id;
        $uploadImageHandler = new UploadBookImageHandler();
        $createBookImageHandler = new CreateBookImageHandler();

        $uploadImageHandler->setNextHandler($createBookImageHandler);
        $response = $uploadImageHandler->handle($attributes);
        if ($response->getResponseStatus() == true) {
            return true;
        }
        //if related information update activities has errors occurred, roll back database update.
        $this->setMessage($response->getResponseMessage());
        return false;
    }
}