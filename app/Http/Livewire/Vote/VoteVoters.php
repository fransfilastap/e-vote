<?php

namespace App\Http\Livewire\Vote;

use App\Models\Vote;
use Livewire\Component;

class VoteVoters extends Component
{

    public Vote $vote;
    public $perPage = 10;
    public $voteCount;

    public function mount(Vote $vote)
    {
        $this->vote = $vote;
    }

    public function render()
    {
        $voters = $this->vote->voters();

        if(isset($this->voteCount)){
            $voters = $voters->where('vote_count','=',$this->voteCount);
        }

        

        return view('livewire.vote.vote-voters', [
            'voters' => $voters->paginate($this->perPage)
        ]);
    }
}
