<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteOption extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'label', 'vote_id', 'atribute_1', 'description', 'atribute_2', 'atribute_3', 'description', 'photos'];

    public function vote()
    {
        return $this->belongsTo(Vote::class);
    }

    public function voted()
    {
        return $this->hasMany(VoteBallot::class);
    }
}
