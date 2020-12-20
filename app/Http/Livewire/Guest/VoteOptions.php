<?php

namespace App\Http\Livewire\Guest;

use App\Models\Vote;
use Livewire\Component;

class VoteOptions extends Component
{
    public Vote $vote;

    public function mount(Vote $vote)
    {
        $this->vote = $vote;
    }

    public function render()
    {
        return view('livewire.guest.vote-options', [
            'options' => $this->vote->options
        ])->layout('layouts.guest');
    }
}
