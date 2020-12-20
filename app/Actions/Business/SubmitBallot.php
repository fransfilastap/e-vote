<?php

namespace App\Actions\Business;

use App\Models\VoteBallot;
use App\Models\VoteOption;
use App\Models\Voter;
use Illuminate\Support\Facades\DB;

class SubmitBallot
{

    public function submit(VoteOption $voteOption, Voter $voter)
    {

        DB::transaction(function () use ($voteOption, $voter) {
            VoteBallot::create(
                [
                    'vote_id' => $voteOption->vote->id,
                    'voter_id' => $voter->id,
                    'vote_option_id' => $voteOption->id,
                    'weight' => 1
                ]
            );

            $voter->vote_count = $voter->vote_count + 1;
            $voter->save();
        });
    }
}
