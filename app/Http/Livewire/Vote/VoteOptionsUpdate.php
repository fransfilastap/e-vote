<?php

namespace App\Http\Livewire\Vote;

use App\Actions\Business\VoteOption\UpdateOption;
use App\Http\Livewire\SweetAlertDispatcher;
use App\Models\VoteOption;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
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

    public $rules = ['label' => 'required', 'desc' => 'required', 'photo' => 'image'];


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

        $uploadedFileUrl = Cloudinary::upload($this->photo->getRealPath(), [
            'transformation' => [
                'gravity' => 'auto',
                'width' => 300,
                'height' => 300,
                'crop' => 'crop'
            ]
        ])->getSecurePath();

        $updateOption->update($this->voteOption, [
            'label'       => $this->label,
            'description' => $this->desc,
            'photos'      => $uploadedFileUrl
        ]);

        $this->dispatchSwal('Option updated', 'option updated', 'success');
        $this->updating = false;
    }
}
