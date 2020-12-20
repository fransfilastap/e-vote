<?php

namespace App\Http\Livewire\Guest;

use App\Http\Livewire\SweetAlertDispatcher;
use App\Models\Vote;
use App\Models\VoteOption;
use Livewire\Component;

class VoteForm extends Component
{
    use SweetAlertDispatcher;

    public VoteOption $voteOption;

    public function mount(VoteOption $voteOption)
    {
        $this->voteOption = $voteOption;
    }

    public function render()
    {
        return view('livewire.guest.vote-form');
    }

    public function voting()
    {
        $this->emit('verifyVoter', [$this->voteOption]);
    }
}
