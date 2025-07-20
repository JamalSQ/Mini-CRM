<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdatedUserRequest;
use App\Models\User;
use App\Utils\Reply;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, StoreUserRequest $store_user_request)
    {
        try{
            User::create($store_user_request->validated());
            return Reply::success('User record created successfylly',200,route('users.index'));
        }catch(\Exception $e){
            return Reply::error('Unable to create user',422,route('users.index'),$e);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user, UpdatedUserRequest $updated_user_request)
    {
        try{
            User::create($updated_user_request->validated());
            return Reply::success('User updated successfylly',200,route('users.index'));
        }catch(\Exception $e){
            return Reply::error('Unable to update user',422,route('users.index'),$e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try{
            $user->delete();
            return Reply::success("User deleted successfully",200,route('users.index'));
        }catch(\Exception $e){
            return Reply::error("unable to delete the user",422,route('users.index'),$e,);
        }
    }
}
