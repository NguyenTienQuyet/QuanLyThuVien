<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 10:54 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\BookCopyRepository;
use App\Services\BookCopyService;
use Illuminate\Database\Eloquent\Model;

class EloquentBookCopyService extends EloquentService implements BookCopyService
{
    public function __construct(BookCopyRepository $repository)
    {
        parent::__construct($repository);
    }

    public function getFirst(array $pairs, array $relations = [])
    {
        if (count($pairs) == 0) {
            return null;
        }
        $conditions = $this->createConditions($pairs);

        return $this->getRepository()->getBy($conditions, $relations);
    }

    public function countAvailable(): int
    {
       $pairs = [
           [
               'needle' => 'state',
               'value' => true
           ]
       ];
       return $this->count($pairs);
    }
}