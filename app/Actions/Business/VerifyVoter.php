<?php

namespace App\Actions\Business;


use App\Models\VoteOption;

class VerifyVoter
{
    public function verify(VoteOption $voteOption, $code)
    {
        $record = $voteOption->vote->voters()->where('code', $code)->first();

        if ($record == null)
            return false;

        if ($record != null && $record->vote_count <= 0)
            return $record;

        return 0;
    }
}
