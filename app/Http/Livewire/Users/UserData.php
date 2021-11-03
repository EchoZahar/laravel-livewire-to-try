<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

class UserData extends Component
{
    public function render()
    {
        return view('livewire.users.user-data', [
            'user' => auth()->user(),
        ]);
    }
}
