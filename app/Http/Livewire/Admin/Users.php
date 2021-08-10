<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    protected $listeners = [
        'userAdded' => '$refresh'
    ];

    public function render()
    {
        $users = User::with('roles')->paginate(10);
        return view('livewire.admin.users', [
            'users' => $users
        ])
            ->extends('layouts.admin', ['title' => "Users"])
            ->section('main');
    }
}
