<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\User;
use App\Team;

class NewsController extends Controller
{
    //
    public function index()
    {
        $news = News::with('user')->with('teams')->latest()->paginate(10);
        // sa with se radi eager load (dovuce sve podatke i za post i za usera u jednom pozivu)
        return view('news.index', compact('news'));
    }

    public function show($id)
    {
        $news = News::with('user')->with('teams')->latest()->find($id);
        return view('news.show', compact('news'));
    }

    public function showNewsForTeam($team)
    {
        $news = Team::with('news')->find($team)->news()->latest()->paginate(10);
        return view('news.index', compact('news'));
    }

    public function create() {
        $teams = Team::all();
        return view('news.create', compact('teams'));
    }

    public function store() {

        $this->validate(request(), ['title' => 'required', 'content' => 'required', 'teams' => 'required|array']);

        $news = News::create([
            'title' => request('title'),
            'content' => request('content'),
            'user_id' => !empty(auth()->user())
                ? auth()->user()->id
                : 1
        ]);

        $news->teams()->attach(request('teams'));

        return redirect('/news')
        ->with('message', 'Thank you for publishing article on www.nba.com.');
    }
}
