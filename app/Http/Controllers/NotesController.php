<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $output = '';

            $folder_id = $request->folder_id;

            $search = $request->search;

            //showing when no folder selected but searched 
            if ($folder_id == 0 && $search != '0') {

                $folder_name = 'Search Results';
;
                $notes = Note::where('note', 'like', '%' . $search . '%')->orwhere('title', 'like', '%' . $search . '%')->orderBy('id')->get();
            }

            //showing when folder selected and no searches 
            else if ($folder_id != 0 && $search == '0') {

                $folder_name = Folder::where('id', $folder_id)->value('name');

                $notes = Note::with(['user'])->where('folder_id', $folder_id)->latest('created_at')->get();
            }

            //showing when no folder and no searches
            else {

                $folder_name = 'Notes';

                $notes = Note::with(['user'])->latest('created_at')->get();
            }

            $html = view('notes.index', compact('folder_id', 'notes', 'folder_name'))->render();

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


        $note = Note::create([

            'user_id' => auth()->user()->id,

            'title' => $request->note_title,

            'note' => $request->content,

            'folder_id' => $request->folder_id

        ]);

        return redirect()->route('home')->with('success', 'Note successfully created');
    }


    public function show(Request $request)
    {

        if ($request->ajax()) {

            $output = '';

            $note_id = $request->note_id;

            if ($note_id == 0) {

                $note = Note::latest('created_at')->first();
            } else {

                $note = Note::where('id', $note_id)->first();
            }

            $html = view('notes.show', compact('note'))->render();

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
