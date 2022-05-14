<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 1;

    public function increment()
    {
        $this->count += 1;
    }

    public function decrement()
    {
        $this->count -= 1;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
