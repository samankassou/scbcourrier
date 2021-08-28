<?php

namespace App\Http\Livewire\Writer;

use App\Models\Courier;
use Livewire\Component;
use Livewire\WithPagination;

class Couriers extends Component
{
    use WithPagination;

    public $search;

    protected $listeners = [
        'courierAdded' => '$refresh',
        'courierUpdated' => '$refresh',
        'courierDeleted' => '$refresh',
    ];

    public function render()
    {
        $couriers = $this->getPaginatedCouriers();
        $status = [
            'new', 'assigned', 'pending', 'processed', 'rejected'
        ];
        return view('livewire.writer.couriers', compact('couriers', 'status'))
            ->extends('layouts.admin', ['title' => "Couriers"])
            ->section('main');
    }

    public function getPaginatedCouriers()
    {
        return $this->getCouriers()->latest()->paginate(10);
    }

    public function getCouriers()
    {
        $query = Courier::query();
        $search = '%' . $this->search . '%';
        $query->where('code', 'LIKE', $search);
        $query->orWhere('sender', 'LIKE', $search);
        $query->orWhere('object', 'LIKE', $search);
        $query->orWhere('status', 'LIKE', $search);
        $query->orWhere('comments', 'LIKE', $search);
        $query->orWhereDay('date', $this->search);
        $query->orWhereMonth('date', $this->search);
        $query->orWhereYear('date', $this->search);
        $query->orWhereDate('date', $this->search);
        $query->orWhereHas('recipient', function ($query) use ($search) {
            $query->where('name', 'LIKE', $search);
            $query->orWhere('email', 'LIKE', $search);
        });
        return $query;
    }

    public function export()
    {
        $couriers = $this->getCouriers()->get();
        dd($couriers);
    }
}
