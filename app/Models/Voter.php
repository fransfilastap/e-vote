<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    use HasFactory;

    public $fillable = ['id', 'vote_id', 'code', 'key', 'name', 'vote_count'];
}
