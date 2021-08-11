<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Recipients extends Component
{
    protected $listeners = [
        'recipientAdded' => '$refresh',
        'recipientUpdated' => '$refresh',
        'recipientDeleted' => '$refresh'
    ];

    public function render()
    {
        $recipients = User::recipients()->withCount('couriers')->paginate(10);
        return view('livewire.admin.recipients', compact('recipients'))
            ->extends('layouts.admin', ['title' => "Recipients"])
            ->section('main');
    }
}
