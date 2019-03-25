<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/25/2019
 * Time: 10:44 AM
 */

namespace App\Decorators\GenreDecorators;


use Illuminate\Database\Eloquent\Model;

class GetGenreDecorator extends EloquentGenreDecorator
{
    public function getModel(array $attributes, $id): ?Model
    {
        $genre = parent::getModel($attributes, $id);
        $books = $genre['books'];

        foreach ($books as $book) {

        }

        return $genre;
    }
}