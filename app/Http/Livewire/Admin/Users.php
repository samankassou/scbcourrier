<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Users extends Component
{
    protected $listeners = [
        'userAdded' => '$refresh',
        'userUpdated' => '$refresh',
        'userDeleted' => '$refresh'
    ];

    public function render()
    {
        $users = User::with('roles')->paginate(10);
        $roles = DB::table('roles')->get();
        return view('livewire.admin.users', compact('users', 'roles'))
            ->extends('layouts.admin', ['title' => "Users"])
            ->section('main');
    }

    public function toggleUserStatus($id)
    {
        $user = User::find($id);
        $user->status = !$user->status;
        $user->save();
        $message = $user->status ? "User account enabled" : "User account disabled";
        $this->emit("success", __("Success:"), __($message));
    }

    public function updateUserRole($userId, $role)
    {
        $user = User::find($userId);

        $oldRole = $user->roles[0];
        $user->retract($oldRole);
        $user->assign($role);

        $this->emit("userUpdated");
        $this->emit("success", __("Success:"), __("User updated!"));
    }
}
