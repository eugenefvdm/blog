<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GuestNavigationMenu extends Component
{
    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'refresh-navigation-menu' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.guest-navigation-menu');
    }
}
