<?php

namespace App\Actions\Business\VoteOption;

use App\Models\VoteOption;

class DeleteOption
{
    public function delete(VoteOption $voteOption)
    {
        $voteOption->delete();
    }
}
