<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Team;

class News extends Model
{
    //
    protected $fillable = [
        'title', 'content', 'user_id', 'teams'
    ];

    public function user() {
        return $this->belongsTo(User::Class); // this will return join of comments associated wwith movie
    }

    public function teams() {
        return $this->belongsToMany(Team::class);
    }

    protected $hidden = [
        'id', 'created_at', 'updated_at'
    ];

}
