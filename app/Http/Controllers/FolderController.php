<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class FolderController extends Controller
{
   
    public function __construct()

    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $folders = Folder::all();

        if ($request->ajax()) {

            $data = Folder::with(['user'])->where('layer', 1)->get();

            return Datatables::of($data)

                
                ->addColumn('actions', function ($row) {
                    $actionBtn = '<div class="dropdown">
                                            <button class="btn table-actions" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v"></i>                       
                                            </button>
                                            <div class="dropdown-menu table-actions-dropdown" role="menu" aria-labelledby="actions">

                                                <a class="dropdown-item"  data-toggle="modal" id="editFolderButton" data-target="#editModal" href="" data-attr="' . route("folder.edit", $row["id"]) . '"><i class="mdi mdi-account-edit"></i> Edit</a>

                                                <a class="dropdown-item" data-toggle="modal" id="deleteFolderButton" data-target="#deleteModal" href="" data-attr="' . route("folder.delete", $row["id"]) . '"><i class="mdi mdi-account-off"></i> Delete</a>
                                            </div>
                                        </div>';
                    return $actionBtn;
                })

                ->addColumn('name', function ($row) {
                    return $row->name;
                })

                ->addColumn('user', function ($row) {
                    return $row->user->name;
                })

                ->addColumn('created_at', function ($row) {
                    return $row->created_at;
                })

                ->rawColumns(['actions', 'name', 'user'])

                ->make(true);
        }

        return view('folder.index', compact('folders'));
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)

    {

        $request->validate([
            'folder_name' => 'required|string|max:255'
        ]);

        $folder = Folder::create([
            'name' => $request->folder_name,

            'user_id' => Auth::user()->id,

            'layer' => '1'

        ]);

        $folder->save();

        return redirect()->back()->with('success', 'Congratulation! New Folder has been created');
    }

   
    public function show($id)
    {
        //
    }


    public function edit(Folder $folder)

    {
        return view('folder.edit', compact('folder'));
    }

  
    public function update(Request $request, $id)

    {
        
        $folder = Folder::find($id);

        $folder->name = $request->input('folder_name');

        $folder->update();

        return redirect()->back()->with('success', 'Folder was successfully updated');
    }

    public function destroy(Folder $folder)

    {

        $folder_id = $folder->id;

        $sub_folders = Folder::where('main_folder_id', $folder_id)->get();

        foreach ($sub_folders as $sub_folder) {

            $Note = Note::where('folder_id', $sub_folder->id);

            $Note->delete();
        }

        $sub_folders = Folder::where('main_folder_id', $folder_id)->delete();

        $Note = Note::where('folder_id', $folder_id);

        $Note->delete();

        $folder->delete();

        return redirect()->route('home')->with('success', 'Selected Folder was deleted successfully');
    }

    public function delete(Folder $folder)
    {
        return view('folder.delete', compact('folder'));
    }

    public function add()

    {
        return view('folder.add');
    }

    public function searchFolders(Request $request)

    {
       
        if ($request->ajax()) {

            $output = '';

            $search = $request->search;

            $folders = Folder::where('name', 'like', '%' . $search . '%')->withCount('notes')->orderBy('id')->get();

            $html = view('folder.search', compact('folders'))->render();

            return $html;

        }
    }

}
