<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = ['vote_name', 'uuid', 'is_enabled', 'start_time', 'end_time'];

    protected $dates = [
        'start_time',
        'end_time',
    ];

    public function options()
    {
        return $this->hasMany(VoteOption::class);
    }

    public function voters()
    {
        return $this->hasMany(Voter::class);
    }

    public function voted()
    {
        return $this->hasMany(Voter::class)->where('vote_count', '>', 0);
    }
}
