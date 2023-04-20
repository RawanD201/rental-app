<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }
    public function create()
    {
        return view('profile.create');
    }
    public function store(StoreProfileRequest $req)
    {
        $req->storeRecord();
        return \back()->with([
            'success' => __('index.admin.messages.user.success.create')
        ]);
    }
    public function edit(User $user)
    {
        return view('profile.edit', \compact('user'));
    }
    public function update(UpdateProfileRequest $req, User $user)
    {
        if ($user->username === config('info.default_username') || $user->username === config('info.admin_username'))
            throw ValidationException::withMessages([
                'failed' =>  __('index.admin.messages.user.fail.delete_admin')
            ]);
        $req->updateRecord($user);
        return \redirect()->route('profile.edit', ['user' => $user->id])->with([
            'user' => $user,
            'success' => __('index.admin.messages.user.success.update')
        ]);
    }
    public function manage()
    {
        $users = User::latest()->paginate(7);
        $filtered = $users->getCollection()->reject(function ($user) {
            return $user->username === config('info.admin_username');
        });
        $users->setCollection($filtered);
        return view('profile.manage', \compact('users'));
    }
    public function destroy(User $user)
    {
        if ($user->username === config('info.default_username') || $user->username === config('info.admin_username'))
            throw ValidationException::withMessages([
                'failed' => __('index.admin.messages.user.fail.delete_admin')
            ]);

        $user->delete();
        return \redirect()->route('admin.profile.manage')->with([
            'success' => __('index.admin.messages.user.success.delete')
        ]);
    }
}
