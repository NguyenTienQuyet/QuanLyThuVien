<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 10:43 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\BookHistory;
use App\Repositories\BookHistoryRepository;

class EloquentBookHistoryRepository extends EloquentRepository implements BookHistoryRepository
{
    public function __construct(BookHistory $model)
    {
        parent::__construct($model);
    }
}