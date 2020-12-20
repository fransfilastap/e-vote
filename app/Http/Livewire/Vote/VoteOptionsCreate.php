<?php

namespace App\Http\Livewire\Vote;

use App\Actions\Business\VoteOption\CreateOption;
use App\Http\Livewire\SweetAlertDispatcher;
use App\Models\Vote;
use Livewire\Component;
use Livewire\WithFileUploads;

class VoteOptionsCreate extends Component
{

    use SweetAlertDispatcher;
    use WithFileUploads;

    public bool $creating = false;
    public Vote $vote;

    public $label;
    public $desc;
    public $photo;

    public $listeners = [
        'optionCreating' => 'handle'
    ];

    public $rules = ['label' => 'required', 'desc' => 'required', 'photo' => 'image|max:1024'];

    public function render()
    {
        return view('livewire.vote.vote-options-create');
    }

    public function save(CreateOption $createOption)
    {
        $this->validate();

        $path = $this->photo->store('public');

        $createOption->create([
            'label' => $this->label,
            'description' => $this->desc,
            'atribute_1' => '-',
            'atribute_2' => '-',
            'atribute_3' => '-',
            'photos' => $path,
            'vote_id' => $this->vote->id
        ]);

        $this->dispatchSwal('New Option created', 'Success', 'success');
        $this->creating = false;
        $this->emit('optionCreated');
    }

    public function handle(Vote $vote)
    {
        $this->vote = $vote;
        $this->creating = true;
    }
}
