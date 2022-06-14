<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Response;

class CommentsController extends Controller
{
   
    public function index()
    {
        //
    }

  
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $comment = Comment::create([

            'user_id' => auth()->user()->id,

            'note_id' => $request->note_id,

            'comment' => $request->comment,

        ]);

        return 'success';

    }

    public function show(Request $request)

    {
        if ($request->ajax()) {

            $output = '';

            $note_id = $request->note_id;

                $comments = Comment::where('note_id', $note_id)->latest()->get();

            $html = view('comments.show', compact('comments'))->render();

            return $html;
         
        }
    }

   
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
