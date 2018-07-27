<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Player;
use App\Comment;
use App\News;

class Team extends Model
{
    //
    protected $fillable = [
        'name', 'email', 'address', 'city'
    ];

    public function players() {
        return $this->hasMany(Player::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function news() {
        return $this->belongsToMany(News::class);
    }
}
