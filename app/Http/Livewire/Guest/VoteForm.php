<?php

namespace App\Http\Livewire\Guest;

use App\Http\Livewire\SweetAlertDispatcher;
use App\Models\Vote;
use App\Models\VoteOption;
use Carbon\Carbon;
use Livewire\Component;

class VoteForm extends Component
{
    use SweetAlertDispatcher;

    public VoteOption $voteOption;

    public function mount(VoteOption $voteOption)
    {
        $this->voteOption = $voteOption;

        if (!Carbon::now()->between($voteOption->vote->start_time, $voteOption->vote->end_time)) {
            abort('403');
        }
    }

    public function render()
    {
        return view('livewire.guest.vote-form');
    }

    public function voting()
    {
        $this->emit('verifyVoter', [$this->voteOption]);
    }

    public function readmore()
    {
        $this->emit('requestReading', $this->voteOption->description);
    }
}
