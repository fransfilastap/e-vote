<?php

namespace App\Http\Livewire\Vote;

use App\Actions\Business\VoteOption\UpdateOption;
use App\Http\Livewire\SweetAlertDispatcher;
use App\Models\VoteOption;
use Livewire\Component;
use Livewire\WithFileUploads;

class VoteOptionsUpdate extends Component
{
    use SweetAlertDispatcher;
    use WithFileUploads;

    public bool $updating = false;
    public VoteOption $voteOption;

    public $label;
    public $desc;
    public $photo;
    public $oldPhoto;

    public $listeners = [
        'optionUpdating' => 'handle'
    ];

    public $rules = ['label' => 'required', 'desc' => 'required', 'photo' => 'image|max:1024'];


    public function render()
    {
        return view('livewire.vote.vote-options-update');
    }

    public function handle(VoteOption $voteOption)
    {
        $this->voteOption = $voteOption;
        $this->desc       = $voteOption->description;
        $this->label      = $voteOption->label;
        $this->oldPhoto   = $voteOption->photos;
        $this->updating = true;
    }

    public function save(UpdateOption $updateOption)
    {
        $this->validate();

        $path = $this->photo->store('photos');

        $updateOption->update($this->voteOption, [
            'label'       => $this->label,
            'description' => $this->desc,
            'photos'      => $path
        ]);

        $this->dispatchSwal('Option updated', 'option updated', 'success');
        $this->updating = false;
    }
}
