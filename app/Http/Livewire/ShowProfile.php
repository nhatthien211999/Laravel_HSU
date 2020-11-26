<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowProfile extends Component
{
    public $profile;

    public function mount($profile)
    {
        $this->profile= $profile;

    }
    
    public function render()
    {
        return view('livewire.show-profile');
    }
}
