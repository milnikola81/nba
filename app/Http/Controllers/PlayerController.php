<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class PlayerController extends Controller
{
    //
    public function show($id)
    {
        $player = Player::with('team')->find($id);
        // sa with se radi eager load (dovuce sve podatke i za post i za usera u jednom pozivu)
        return view('player.show', compact('player'));
    }
}
