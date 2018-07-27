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
}
