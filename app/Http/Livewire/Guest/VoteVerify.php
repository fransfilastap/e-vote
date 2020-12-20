<?php

namespace App\Http\Livewire\Guest;

use App\Actions\Business\VerifyVoter;
use App\Actions\Business\SubmitBallot;
use App\Http\Livewire\SweetAlertDispatcher;
use App\Models\VoteOption;
use App\Models\Voter;
use Livewire\Component;

class VoteVerify extends Component
{

    use SweetAlertDispatcher;

    public bool $verify = false;
    public VoteOption $voteOption;
    public $code;

    public $rules = ['code' => 'required'];

    public $listeners = [
        'verifyVoter' => 'handle'
    ];

    public function render()
    {
        return view('livewire.guest.vote-verify');
    }

    public function handle(VoteOption $voteOption)
    {
        $this->voteOption = $voteOption;
        $this->verify = true;
    }

    public function verify(VerifyVoter $verifyVoter, SubmitBallot $submitBallot)
    {
        $this->validate();

        $result = $verifyVoter->verify($this->voteOption, $this->code);

        if ($result instanceof Voter) {
            $submitBallot->submit($this->voteOption, $result);

            $this->dispatchSwal('Vote Success', 'Vote submited', 'success');
            $this->verify = false;
        } else {
            if ($result === 0) {
                $this->dispatchSwal('Masa Berlaku Kode Habis', 'Kode telah digunakan', 'error');
            } else if ($result === FALSE) {
                $this->dispatchSwal('Kode tidak ditemukan', 'Kode tidak ditemukan', 'error');
            } else {
                $this->dispatchSwal('Unknown error', 'Please contact admin', 'error');
            }
        }
        $this->code = "";
    }
}
