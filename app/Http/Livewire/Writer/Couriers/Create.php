<?php

namespace App\Http\Livewire\Writer\Couriers;

use App\Models\Courier;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    public $date;
    public $code;
    public $sender;
    public $object;

    protected $rules = [
        'date'      => 'required|date',
        'code'      => 'required',
        'sender'    => 'required',
        'object'    => 'required',
    ];

    public function render()
    {
        return view('livewire.writer.couriers.create');
    }

    public function save()
    {
        $this->validate();

        $courier = Courier::create([
            'date'         => $this->date,
            'code'         => $this->code,
            'sender'       => $this->sender,
            'object'       => $this->object,
        ]);

        $this->emit("courierAdded");
        $this->emit("success", __("Success:"), __("Courier saved!"));
        $this->closeModal();
    }
}
