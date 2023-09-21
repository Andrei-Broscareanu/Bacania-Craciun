<?php

namespace App\Livewire;

use Livewire\Component;

class Notification extends Component
{
    public $message = '';

    protected $listeners = ['showNotification'];

    public function showNotification($message)
    {
        $this->message = $message;
        $this->dispatchBrowserEvent('show-notification');
    }


    public function render()
    {
        return view('livewire.notification');
    }
}
