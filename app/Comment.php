<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Team;

class Comment extends Model
{
    //
    protected $fillable = [
        'content', 'user_id', 'team_id'
    ];

    public function team() {
        return $this->belongsTo(Team::Class); // this will return join of comments associated wwith movie
    }

    public function user() {
        return $this->belongsTo(User::Class); // this will return join of comments associated wwith movie
    }
}
