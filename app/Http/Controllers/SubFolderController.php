<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class SubFolderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*****************************SUB FOLDER ****************************** */

    public function index(Request $request)
    {
        $folders = Folder::where('layer',1)->get();
        // dd(Folder::with(['user'])->where('layer', 2)->get());
        if ($request->ajax()) {
            $data = Folder::with(['user'])->where('layer', 2)->get();
            return Datatables::of($data)
                    // ->addIndexColumn()
                    ->addColumn('actions', function($row){
                        $actionBtn = '<div class="dropdown">
                                            <button class="btn table-actions" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v"></i>                       
                                            </button>
                                            <div class="dropdown-menu table-actions-dropdown" role="menu" aria-labelledby="actions">

                                                <a class="dropdown-item"  data-toggle="modal" id="editSubFolderButton" data-target="#editModal" href="" data-attr="'. route("subfolder.edit", $row["id"] ). '"><i class="mdi mdi-account-edit"></i> Edit</a>

                                                <a class="dropdown-item" data-toggle="modal" id="deleteSubFolderButton" data-target="#deleteModal" href="" data-attr="'. route("subfolder.delete", $row["id"] ). '"><i class="mdi mdi-account-off"></i> Delete</a>
                                            </div>
                                        </div>';
                        return $actionBtn;
                    })
                    ->addColumn('name', function ($row) {
                        // return substr($row->email_body, 0, 20);
                        return $row->name ;
                    })
                    ->addColumn('user', function ($row) {
                        // return substr($row->email_body, 0, 20);
                        return $row->user->name ;
                    })
                    ->addColumn('created_at', function ($row) {
                        // return substr($row->email_body, 0, 20);
                        return $row->created_at ;
                    })
                    ->rawColumns(['actions', 'name','user'])
                    ->make(true); 
                                      
        }
        return view('sub-folder.index',compact('folders'));
    }

  
    public function store(Request $request)
    {
       
        $request->validate([
            'folder_name' => 'required|string|max:255',
            'main_folder_id' => 'required'
        ]);

        $folder = Folder::create([
            'name' => $request->folder_name,
            'main_folder_id' => $request->main_folder_id,
            'user_id' => Auth::user()->id,
            'layer' => '2'
        ]); 

        $folder->save();        

        return redirect()->back()->with('success', 'Congratulation! New Sub Folder has been created');

    }

  
    public function edit(Folder $folder)
    {
        
        $main_folders = Folder::where('layer',1)->get();
        return view('sub-folder.edit', compact('folder','main_folders'));
    }

    public function update(Request $request, $id)
    {
     
        $folder = Folder::find($id);
        $folder->name = $request->input('folder_name');
        $folder->main_folder_id= $request->input('main_folder_id');
        
        $folder->update();
        return redirect()->back()->with('success','Folder was successfully updated');
    }

  
    public function destroy(Folder $folder)
    {
        $folder_id = $folder->id ; 
        $Note = Note::where('folder_id',$folder_id);
        $Note->delete();
        $folder->delete();

        return redirect()->route('home')->with('success', 'Selected Folder was deleted successfully');       
    }

    public function delete(Folder $folder)
    {   
        return view('sub-folder.delete', compact('folder'));     
    }
    
    // new

    public function add(Folder $folder)
    {
        $main_folders = Folder::where('layer',1)->get();
        return view('sub-folder.add', compact('folder','main_folders'));
    }

}
