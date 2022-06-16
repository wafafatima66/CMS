<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Note;
use App\Models\User;
use App\Notifications\CommentNotification;
use Illuminate\Http\Request;
// use Illuminate\Notifications\Notification;
use Notification;
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
        // $users = User::all();

        $comment = Comment::create([

            'user_id' => auth()->user()->id,

            'note_id' => $request->note_id,

            'comment' => $request->comment,

        ]);

        $user_ids = [];
        $message = [];

        $note_id = $request->note_id ; 

        $note_name = Note::where('id',$note_id)->value('title') ; 

        $user_id_created_note = Note::where('id', $note_id)->value('user_id'); //getting user id who made the note
        
        if(!empty($user_id_created_note)){

            if($user_id_created_note != auth()->user()->id){
                array_push($message , auth()->user()->name .'  Commented on your note');

                // $users = User::where('id', $user_id_created_note)->orwhereIn('id', $user_ids )->get();
                $users = User::where('id', $user_id_created_note)->get();

                Notification::send($users , new CommentNotification($request->comment , $request->note_id , $message , $note_name));

            }
            
            // $message = auth()->user()->name .'  Commented on your post';
        }

        //finding whether the note has previous comments
        // $previouscomments = Comment::where('note_id' , $note_id)->get();

        // if(!empty($previouscomments)){
            
        //     foreach($previouscomments as $previouscomment){
        //         if(($previouscomment->user_id != $user_id_created_note) || ($previouscomment->user_id != auth()->user()->id)){
        //         array_push($message , $previouscomment->user->name .'  Replied To your comment');
        //         array_push($user_ids, $previouscomment->user_id);
        //         }
        //     }

        //     $user_ids = array_unique($user_ids);
        // }

      

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
