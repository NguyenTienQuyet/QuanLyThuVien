<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 4:13 PM
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Requests\API\Publisher\PublisherDeleteRequest;
use App\Http\Controllers\Requests\API\Publisher\PublisherGetRequest;
use App\Http\Controllers\Requests\API\Publisher\PublisherPatchRequest;
use App\Http\Controllers\Requests\API\Publisher\PublisherPostRequest;
use App\Services\PublisherService;

class PublisherController extends APIController
{
    public function __construct(PublisherService $service)
    {
        parent::__construct($service);
    }

    public function get(PublisherGetRequest $request, int $id = null)
    {
        return parent::_get($request, $id);
    }

    public function patch(PublisherPatchRequest $request, int $id = null)
    {
        return parent::_patch($request, $id);
    }

    public function post(PublisherPostRequest $request)
    {
        return parent::_post($request);
    }

    public function delete(PublisherDeleteRequest $request, int $id = null)
    {
        return parent::_delete($request, $id);
    }
}