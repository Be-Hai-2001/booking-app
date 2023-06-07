<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class CheckRequired extends Component
{

        public $search = '';

        public function render()
        {
            dd($this->search);
            return view('livewire.check-required', [
                'users' => User::where('email', $this->search)->get(),
            ]);
        }

}
