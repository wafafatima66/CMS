<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    
    {
        $folders = Folder::all();

        $notes = Note::latest('created_at')->get();

        $latest_note = Note::latest('created_at')->first();

        return view('home', compact('folders','notes','latest_note'));

    }

    
}
