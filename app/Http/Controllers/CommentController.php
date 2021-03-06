<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Team;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use App\Mail\CommentReceived;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('words', ['only' => 'store']);
    }

    public function store(Team $team) {
        
        $this->validate(request(),[
            'content' => 'required|min:10'
        ]);
        
        $team->comments()->create([
            'content' => request('content'),
            'user_id' => Auth::id()
            // 'team_id' => $team->id
        ]);

        Mail::to($team->email)->send(new CommentReceived($team));

        return redirect('/teams/'.$team->id);         
    }
}
