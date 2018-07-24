<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Player;

class Team extends Model
{
    //
    protected $fillable = [
        'name', 'email', 'address', 'city'
    ];

    public function players() {
        return $this->hasMany(Player::class);
    }
}
