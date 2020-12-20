<?php

namespace App\Http\Livewire\Guest;

use App\Models\Vote;
use Livewire\Component;

class VoteResult extends Component
{
    public Vote $vote;

    public function mount(Vote $vote)
    {
        $this->vote = $vote;
    }

    public function render()
    {
        return view('livewire.guest.vote-result')->layout('layouts.guest');
    }
}
