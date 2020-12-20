<?php

namespace App\Http\Livewire\Vote;

use App\Models\Vote;
use App\Models\VoteOption;
use Livewire\Component;

class VoteOptions extends Component
{

    public Vote $vote;

    public $listeners = ['optionCreated' => 'update'];

    public function mount(Vote $vote)
    {
        $this->vote = $vote;
    }

    public function render()
    {
        return view('livewire.vote.vote-options', [
            'options' => $this->vote->options()->paginate(5)
        ]);
    }

    public function requestCreate()
    {
        $this->emit('optionCreating', $this->vote);
    }

    public function requestUpdate(VoteOption $voteOption)
    {
        $this->emit('optionUpdating', $voteOption);
    }

    public function requestDelete(VoteOption $voteOption)
    {
        $voteOption->delete();
        $this->emitSelf('optionCreated');
    }

    public function update()
    {
    }
}
