<?php

namespace App\Actions\Business\VoteOption;

use App\Models\VoteOption;

class CreateOption
{
    public function create(array $option)
    {
        VoteOption::create($option);
    }
}
