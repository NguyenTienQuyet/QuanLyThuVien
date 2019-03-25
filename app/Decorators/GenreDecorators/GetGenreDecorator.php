<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/25/2019
 * Time: 10:44 AM
 */

namespace App\Decorators\GenreDecorators;


use App\Decorators\Handlers\Book\Book\GetGenreBookHandler;
use Illuminate\Database\Eloquent\Model;

class GetGenreDecorator extends EloquentGenreDecorator
{
    public function getModel(array $attributes, $id): ?Model
    {
        $genre = parent::getModel($attributes, $id);
        $books = $genre['books'];

        $bookRelated = [];
        $bookHandler = new GetGenreBookHandler();

        foreach ($books as $book) {
            $bookAttributes['id'] = $book['id'];
            $bookAttributes['related'] = null;
            $bookHandler->handle($bookAttributes);
            array_push($bookRelated, $bookAttributes['related']);
        }
        unset($genre['books']);
        $genre['books'] = $bookRelated;

        return $genre;
    }
}