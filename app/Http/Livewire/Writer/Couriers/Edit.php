<?php

namespace App\Http\Livewire\Writer\Couriers;

use App\Models\Courier;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{
    public $courier;
    public $date;
    public $code;
    public $sender;
    public $object;

    public function mount(Courier $courier)
    {
        $this->courier   = $courier;
        $this->date      = optional($courier->date)->format('Y-m-d');
        $this->code      = $courier->code;
        $this->sender    = $courier->sender;
        $this->object    = $courier->object;
    }

    protected $rules = [
        'date'      => 'required|date',
        'code'      => 'required',
        'sender'    => 'required',
        'object'    => 'required',
    ];

    public function render()
    {
        return view('livewire.writer.couriers.edit');
    }

    public function save()
    {
        $this->validate();
        $this->courier->update([
            'date'         => $this->date,
            'code'         => $this->code,
            'sender'       => $this->sender,
            'object'       => $this->object,
        ]);

        $this->emit("courierUpdated");
        $this->emit("success", __("Success:"), __("Courier updated!"));
        $this->closeModal();
    }
}
