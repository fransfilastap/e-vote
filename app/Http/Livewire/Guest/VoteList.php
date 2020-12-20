<?php

namespace App\Http\Livewire\Guest;

use App\Models\Vote;
use Livewire\Component;
use Livewire\WithPagination;

class VoteList extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.guest.vote-list', [
            'votes' => Vote::paginate(10)
        ])
            ->layout('layouts.guest');
    }
}
