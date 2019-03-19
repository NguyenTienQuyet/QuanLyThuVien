<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/16/2019
 * Time: 3:47 PM
 */

namespace App\Http\Controllers\Requests\API\BookHistory;


use App\Http\Controllers\Requests\PatchRequest;

class BookReturnRequest extends PatchRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'int|required|exists:users,id',
            'books' => 'array|required',
            'books.*.book_id' => 'int|required|distinct|exists:books,id',
            'books.*.quantity' => 'int|required|min:0',
        ];
    }

}