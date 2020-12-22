<?php

namespace App\Http\Livewire\Guest;

use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class VoteCard extends Component
{
    use AuthorizesRequests;

    public Vote $vote;
    public $isrunning;
    public $isallowed = false;

    public function mount(Vote $vote)
    {

        $this->vote = $vote;

        if (Carbon::now()->between($this->vote->start_time, $this->vote->end_time)) {
            $this->isrunning = "Berlangsung";
            $this->isallowed = true;
        } else {
            if (Carbon::now()->isBefore($this->vote->start_time))
                $this->isrunning = "Belum dimulai";
            if (Carbon::now()->isAfter($this->vote->end_time))
                $this->isrunning = "Selesai";
        }
    }

    public function render()
    {
        return view('livewire.guest.vote-card');
    }
}
