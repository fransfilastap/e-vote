<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteBallot extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'vote_id', 'voter_id', 'vote_option_id', 'weight'];
}
