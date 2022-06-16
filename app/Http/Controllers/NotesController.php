<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $search_word = '';

            $folder_id = $request->folder_id;

            $search = $request->search;

            $folder = Folder::where('id' , $folder_id)->first();

            $main_folder_id = Folder::where('id' , $folder_id)->value('main_folder_id');

            $main_folder_name = Folder::where('id' , $main_folder_id)->value('name');

            $user_id = auth()->user()->id ; 

            $user = User::find($user_id);

            //showing when no folder selected but searched 
            if ($folder_id == 0 && $search != '0') {

                $folder_name = 'Search Results';
;
                $notes = Note::where('note', 'like', '%' . $search . '%')->orwhere('title', 'like', '%' . $search . '%')->orderBy('id')->get();

                $search_word = $search ; 
            }

            //showing when folder selected and no searches 
            else if ($folder_id != 0 && $search == '0') {

                $folder_name = Folder::where('id', $folder_id)->value('name');

                $notes = Note::with('user')->where('folder_id', $folder_id)->latest('created_at')->get();
            }

            //showing when no folder and no searches
            else {

                $folder_name = 'Notes';

                $notes = Note::with('user')->latest('created_at')->get();

                // dd($notes);
            }

            $html = view('notes.index', compact('folder_id', 'notes', 'folder_name' , 'folder' , 'search_word' , 'main_folder_name','user'))->render();

            return $html;
        }
    }

    public function store(Request $request)
    {
        request()->validate(
            [
                'note_title' => 'required',

                'content' => 'required',

                'folder_id' => 'required',

            ],
            [
                'folder_id.required' => 'Please Select the folder / Sub folder to add notes !'
            ]
        );


        // $note = Note::create([

        //     'user_id' => auth()->user()->id,

        //     'title' => $request->note_title,

        //     'note' => $request->content,

        //     'folder_id' => $request->folder_id

        // ]);

        $folder_id = $request->folder_id ; 

        
        $note = new Note();

        $note->user_id = auth()->user()->id ;
        $note->title = $request->note_title ;
        $note->note = $request->content ;
        $note->folder_id = $request->folder_id ;


        $folder = Folder::find($folder_id);

        $folder->notes()->save($note);

        return redirect()->route('home')->with('success', 'Note successfully created');
    }


    public function show(Request $request)
    {

        if ($request->ajax()) {

            $output = '';

            // $user = User::find(1);
            $user_id = auth()->user()->id ; 
            $user = User::find($user_id);

            $note_id = $request->note_id;

            if ($note_id == 0) {

                $note = Note::latest('created_at')->first();

            } else {

                $note = Note::where('id', $note_id)->first();
            }

            $html = view('notes.show', compact('note','user'))->render();

            return $html;
        }
    }

    public function update(Request $request, $id)
    {
        $note = Note::find($id);

        $note->note = $request->input('content');
        
        $note->update();
        
        return redirect()->back()->with('success', 'Note was successfully updated');
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('home')->with('success', 'Selected Note was deleted successfully');
    }

    public function delete(Note $note)
    {
        return view('notes.delete', compact('note'));
    }
}
