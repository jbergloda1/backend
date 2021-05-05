<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserProfileRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\user\UserCollection;
use App\Http\Resources\user\UserResource;
use App\Http\Resources\BaseResource;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function search(UserRequest $request)
    {
        return new UserCollection($this->userRepository->search($request->searchFilter()));
    }   

    public function store(UserRequest $request)
    {
        $image          = $request->file('img');
        $newNamefile    = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('/uploads/user/'),$newNamefile);
        return new UserResource($this->userRepository->store($request->storeFilter(), $newNamefile));
    }

    public function show($id)
    {
        return new UserResource($this->userRepository->show($id));
    }

    public function update(UserRequest $request, $id)
    {
        $getdataUser = new UserResource($this->userRepository->show($id));
        if(!empty($request->password)){ 
            if($getdataUser->img == $request->img){
                return new BaseResource($this->userRepository->update($request->updateFilter(), $id));
            }else{
                $image          = $request->file('img');
                $newNamefile    = rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('/uploads/user/'),$newNamefile);
                $updateUser = new BaseResource($this->userRepository->updateNew($request->updateFilter(), $id, $newNamefile));
                unlink("uploads/user/".$getdataUser->img);
                return $updateUser;
            }
        }else{
            if($getdataUser->img == $request->img){
                return new BaseResource($this->userRepository->updateNoPass($request->updateFilter(), $id));
            }else{
                $image          = $request->file('img');
                $newNamefile    = rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('/uploads/user/'),$newNamefile);
                $updateUser = new BaseResource($this->userRepository->updateNewNoPass($request->updateFilter(), $id, $newNamefile));
                unlink("uploads/user/".$getdataUser->img);
                return $updateUser;
            }
        }
        
    }

    public function destroy($id)
    {
        return new BaseResource($this->userRepository->destroy($id));
    }

    public function showProfile($id)
    {
        return new UserResource($this->userRepository->show($id));
    }
    public function updateProfile(UserProfileRequest $request, $id)
    {
        $test = $request->name;
        $all = $request->getContent();
        dd($all);
        // die;
        return new BaseResource($this->userRepository->updateProfile($request->updateFilter(), $id));
    }

}
