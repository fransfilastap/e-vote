<?php

namespace App\Http\Livewire\Vote;

use App\Http\Livewire\SweetAlertDispatcher;
use App\Models\Vote;
use App\Models\VoteOption;
use Carbon\Carbon;
use Livewire\Component;

class VoteOptions extends Component
{

    use SweetAlertDispatcher;

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
        if (Carbon::now()->between($this->vote->start_time, $this->vote->end_time)) {
            $this->dispatchSwal('Action not permitted', 'Voting sedang berlangsung. Tidak boleh menghapus vote', 'error');
            return;
        }


        $this->emit('optionCreating', $this->vote);
    }

    public function requestUpdate(VoteOption $voteOption)
    {
        if (Carbon::now()->between($this->vote->start_time, $this->vote->end_time)) {
            $this->dispatchSwal('Action not permitted', 'Voting sedang berlangsung. Tidak boleh menghapus vote', 'error');
            return;
        }

        $this->emit('optionUpdating', $voteOption);
    }

    public function requestDelete(VoteOption $voteOption)
    {
        if (Carbon::now()->between($this->vote->start_time, $this->vote->end_time)) {
            $this->dispatchSwal('Action not permitted', 'Voting sedang berlangsung. Tidak boleh menghapus vote', 'error');
            return;
        }

        $voteOption->delete();
        $this->emitSelf('optionCreated');
    }

    public function update()
    {
    }
}
