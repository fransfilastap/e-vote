<?php

namespace App\Http\Livewire\Vote;

use App\Http\Livewire\SweetAlertDispatcher;
use App\Models\Vote;
use Carbon\Carbon;
use Livewire\Component;

class VoteUpdate extends Component
{
    use SweetAlertDispatcher;

    public Vote $vote;
    //forms
    public $voteName;
    public $startDate;
    public $endDate;

    public $rules = ['voteName' => 'required', 'startDate' => 'required', 'endDate' => 'required'];

    public $updating = false;

    public $listeners = [
        'requestUpdating' => 'handle'
    ];


    public function render()
    {
        return view('livewire.vote.vote-update');
    }


    public function __save()
    {
        $this->validate();
        $this->vote->vote_name  = $this->voteName;
        $this->vote->start_time = $this->startDate;
        $this->vote->end_time   = $this->endDate;
        $this->vote->save();

        $this->dispatchSwal('Vote updated', 'vote updated', 'success');
        $this->updating = false;
    }

    public function handle(Vote $vote)
    {
        $this->vote = $vote;

        $this->voteName = $vote->vote_name;
        $this->startDate = $vote->start_time;
        $this->endDate = $vote->end_time;

        $this->updating = true;
    }
}
