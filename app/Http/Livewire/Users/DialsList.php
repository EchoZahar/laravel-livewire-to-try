<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

class DialsList extends Component
{
    public function render()
    {
        return view('livewire.users.dials-list', [
            'user' => auth()->user(),
            'dials' => auth()->user()->dials,
        ]);
    }
}
