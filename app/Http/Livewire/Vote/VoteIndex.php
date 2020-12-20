<?php

namespace App\Http\Livewire\Vote;

use App\Models\Vote;
use Livewire\Component;
use Livewire\WithPagination;

class VoteIndex extends Component
{
    use WithPagination;

    public $deleting = false;
    public $maxWidth = "full";

    public $listeners = [
        'voteCreated' => 'handleUpdate'
    ];

    public function render()
    {
        return view('livewire.vote.vote-index', [
            'votes' => Vote::paginate(10)
        ]);
    }

    public function requestCreate()
    {
        $this->emit('requestCreating');
    }


    public function requestDelete()
    {
        $this->deleting = true;
    }

    public function requestUpdate()
    {
        $this->emit('requestUpdating');
    }

    public function handleUpdate()
    {
    }
}
