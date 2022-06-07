<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index(Request $request) {
        if($request->ajax()){

            $output = '';
        $folder_id = $request->folder_id ; 
    
        // $data = Folder::with(['user'])->where('layer',1)->get();

        $notes = Note::with(['user'])->where('folder_id',$folder_id)->get();
        foreach($notes as $note){

            $output .= '<div class="card sidebar-card">
            <div class="card-h6">'. $note->title.'</div>
            <div class="card-body">
                '.$note->note.'
                <div class="card-sub-body d-flex justify-content-between align-items-baseline mt-2">
                    <p>'.$note->user->name.'</p>
                    <p>'. date("d M. Y", strtotime($note->created_at)) .'</p>
                </div>
            </div>
        </div>';

        }
        
        return response($output);

        }
     }
}
