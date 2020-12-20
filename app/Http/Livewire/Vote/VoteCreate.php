<?php

namespace App\Http\Livewire\Vote;

use App\Http\Livewire\SweetAlertDispatcher;
use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;

class VoteCreate extends Component
{

    use SweetAlertDispatcher;

    //forms
    public $voteName;
    public $startDate;
    public $endDate;

    public $rules = ['voteName' => 'required', 'startDate' => 'required', 'endDate' => 'required'];

    public $creating = false;

    public $listeners = [
        'requestCreating' => 'handle'
    ];



    public function render()
    {
        return view('livewire.vote.vote-create');
    }

    public function __save()
    {
        $this->validate();

        Vote::create([
            'uuid'       => Str::uuid(),
            'vote_name'  => $this->voteName,
            'start_time' => $this->startDate,
            'end_time'   => $this->endDate,
            'is_enabled' => 1
        ]);

        $this->creating = false;

        $this->emit('voteCreated');

        $this->dispatchSwal('Voting Added', 'Success', 'success');
    }

    public function handle()
    {
        $this->creating = true;
    }
}
