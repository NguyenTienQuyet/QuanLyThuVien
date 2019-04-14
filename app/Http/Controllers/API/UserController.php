<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 4:09 PM
 */

namespace App\Http\Controllers\API;


use App\Decorators\AccountDecorators\CreateAccount\CreateUserProxy;
use App\Decorators\AccountDecorators\Login\LoginDecorator;
use App\Http\Controllers\Requests\API\User\UserDeleteRequest;
use App\Http\Controllers\Requests\API\User\UserGetRequest;
use App\Http\Controllers\Requests\API\User\UserLoginRequest;
use App\Http\Controllers\Requests\API\User\UserPatchRequest;
use App\Http\Controllers\Requests\API\User\UserPostRequest;
use App\Services\Message;
use App\Services\UserService;

class UserController extends APIController
{
    public function __construct(UserService $service)
    {
        parent::__construct($service);
    }

    public function get(UserGetRequest $request, int $id = null)
    {
        return parent::_get($request, $id);
    }

    public function post(UserPostRequest $request)
    {
        /**
         * @var UserService $userService
         */
        $userService = $this->getService();
        $userProxy = new CreateUserProxy($userService);

        $newUser = $userProxy->createNewModel($request->all());

        if ($newUser == null) {
            /**
             * @var Message $userProxy
             */
            return response(['Message' => $this->message($userProxy)], 403);
        }
        return response([
            'Message' => 'Register successfully',
            'User' => $newUser
        ], 200);
    }

    public function patch(UserPatchRequest $request, int $id = null)
    {
        return parent::_patch($request, $id);
    }

    public function delete(UserDeleteRequest $request, int $id = null)
    {
        return parent::_delete($request, $id);
    }

    public function login(UserLoginRequest $request)
    {
        /**
         * @var UserService $userService
         */
        $userService = $this->getService();
        $enhancedService = new LoginDecorator($userService);
        $user = $enhancedService->getModel($request->all(), null);
        if ($user == null) {
            return response(['Invalid password'], 403);
        }
        return response([
            'Message' => 'Login successfully',
            'User' => $user
        ], 200);
    }
}