<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\UpdatePersonalRequest;
use App\Http\Requests\User\SearchRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\UserRequest;
use App\Http\Resources\BaseResource;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserCollection;
use App\Services\UserService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserControlle
{

    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Login
     *
     * @param LoginRequest $request
     * @return UserResource
     */
    public function login(LoginRequest $request)
    {
        return new UserResource($this->userService->login($request->filter()));
    }

    /**
     * Logout
     *
     * @param Request $request
     * @return BaseResource
     */
    public function logout(Request $request)
    {
        return new BaseResource($this->userService->logout($request->bearerToken()));
    }

    /**
     * Display a listing of the resource by condition.
     *
     * @param SearchRequest $request
     * @return UserCollection
     */
    public function search(SearchRequest $request)
    {
        return new UserCollection($this->userService->search($request->filter()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return UserResource
     */
    public function store(StoreRequest $request)
    {
        return new UserResource($this->userService->store($request->filter()));
    }

    /**
     * Display the specified resource.
     *
     * @param int UserRequest $request
     * @param int $userOid
     * @return UserResource
     */
    public function show(UserRequest $request, $userOid)
    {
        return new UserResource($this->userService->show($userOid));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param int $userOid
     * @return BaseResource
     */
    public function update(UpdateRequest $request, $userOid)
    {
        $user = $this->userService->getByEmail($request->input('email'));
        return new BaseResource($this->userService->update($request->filter()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param UserRequest $request
     * @param int $userOid
     * @return BaseResource
     */
    public function destroy(UserRequest $request, $userOid)
    {
        return new BaseResource($this->userService->destroy($userOid));
    }
}
