<?php

namespace App\Http\Livewire\Vote;

use App\Models\Vote;
use Livewire\Component;

class VoteVoters extends Component
{

    public Vote $vote;

    public function mount(Vote $vote)
    {
        $this->vote = $vote;
    }

    public function render()
    {
        return view('livewire.vote.vote-voters', [
            'voters' => $this->vote->voters()->paginate(5)
        ]);
    }
}
