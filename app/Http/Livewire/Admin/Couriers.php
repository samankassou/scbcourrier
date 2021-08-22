<?php

namespace App\Http\Livewire\Admin;

use App\Models\Courier;
use Livewire\Component;
use Livewire\WithPagination;

class Couriers extends Component
{
    use WithPagination;

    public $search;
    public $orderField = 'code';
    public $orderDirection = 'ASC';

    public $filters = [
        'state' => '',
        'date' => [
            'start' => '',
            'end' => '',
        ],
    ];

    protected $listeners = [
        'courierAdded' => '$refresh',
        'courierUpdated' => '$refresh',
        'courierDeleted' => '$refresh',
    ];

    public function mount()
    {
        //$this->couriers = Courier::paginate(10);
    }

    public function setOrderField(string $name)
    {
        if ($name === $this->orderField) {
            $this->orderDirection = $this->orderDirection === 'ASC' ? 'DESC' : 'ASC';
        } else {
            $this->orderField = $name;
            $this->reset('orderDirection');
        }
    }
    public function render()
    {
        $couriers = $this->getCouriers();
        $status = [
            'new', 'assigned', 'pending', 'processed', 'rejected'
        ];
        $dates = Courier::pluck('date')->sort()->unique();
        return view('livewire.admin.couriers', compact('couriers', 'status', 'dates'))
            ->extends('layouts.admin', ['title' => "Couriers"])
            ->section('main');
    }

    public function getCouriers()
    {
        $query = Courier::query();
        $search = '%' . $this->search . '%';
        if (!empty($this->filters['state'])) {
            $query->where('status', $this->filters['state']);
        }
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

        $query->orderBy($this->orderField, $this->orderDirection);


        return $query->latest()->paginate(10);
    }

    public function updateCourierStatus($courierId, $value)
    {
        Courier::find($courierId)->update(['status' => $value]);
        $this->emit("courierUpdated");
        $this->emit("success", __("Success:"), __("Courier updated!"));
    }
}
