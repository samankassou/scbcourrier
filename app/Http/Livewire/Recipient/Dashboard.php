<?php

namespace App\Http\Livewire\Recipient;

use App\Models\Courier;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $data['totalCouriers'] = Courier::MyCouriers()->count();
        $data['totalProcessedCouriers'] = Courier::MyCouriers()->processed()->count();
        $data['totalPendingCouriers'] = Courier::MyCouriers()->pending()->count();
        $data['totalRejectedCouriers'] = Courier::MyCouriers()->rejected()->count();
        return view('livewire.recipient.dashboard', $data)
            ->extends('layouts.admin', ['title' => "Dashboard"])
            ->section('main');
    }
}
