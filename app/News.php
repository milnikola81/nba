<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class News extends Model
{
    //
    protected $fillable = [
        'title', 'content', 'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::Class); // this will return join of comments associated wwith movie
    }

}
