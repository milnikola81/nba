<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Player;

class PlayerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $player = Player::with('team')->find($id);
        // sa with se radi eager load (dovuce sve podatke i za post i za usera u jednom pozivu)
        return view('players.show', compact('player'));
    }
}
