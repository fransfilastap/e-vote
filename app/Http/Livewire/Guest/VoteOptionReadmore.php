<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class VoteOptionReadmore extends Component
{
    public bool $reading = false;
    public $description;

    public $listeners = [
        'requestReading' => 'handle'
    ];

    public function render()
    {
        return view('livewire.guest.vote-option-readmore');
    }

    public function handle(string $description)
    {
        $this->description = $description;
        $this->reading = true;
    }
}
