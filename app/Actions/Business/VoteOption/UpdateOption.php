<?php

namespace App\Actions\Business\VoteOption;

use App\Models\VoteOption;

class UpdateOption
{
    public function update(VoteOption $voteOption, array $option)
    {
        $voteOption->label       = $option['label'];
        $voteOption->photos      = $option['photos'];
        $voteOption->description = $option['description'];


        $voteOption->save();
    }
}
