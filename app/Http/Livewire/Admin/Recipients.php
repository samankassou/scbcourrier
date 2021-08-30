<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Recipients extends Component
{
    protected $listeners = [
        'recipientAdded' => '$refresh',
        'recipientUpdated' => '$refresh',
        'recipientDeleted' => '$refresh',
        'languageChanged' => '$refresh'
    ];

    public function render()
    {
        $recipients = User::recipients()->withCount('couriers')->paginate(10);
        return view('livewire.admin.recipients', compact('recipients'))
            ->extends('layouts.admin', ['title' => "Recipients"])
            ->section('main');
    }

    public function toggleRecipientStatus($id)
    {
        $user = User::find($id);
        $user->status = !$user->status;
        $user->save();
        $message = $user->status ? "Recipient enabled." : "Recipient disabled.";
        $this->emit("success", __("Success:"), __($message));
    }
}
