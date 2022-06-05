<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $folders = Folder::all();
        if ($request->ajax()) {
            $data = Folder::with(['user'])->where('layer',1)->get();
            return Datatables::of($data)
                    // ->addIndexColumn()
                    ->addColumn('actions', function($row){
                        $actionBtn = '<div class="dropdown">
                                            <button class="btn table-actions" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v"></i>                       
                                            </button>
                                            <div class="dropdown-menu table-actions-dropdown" role="menu" aria-labelledby="actions">

                                                <a class="dropdown-item"  data-toggle="modal" id="editFolderButton" data-target="#editModal" href="" data-attr="'. route("folder.edit", $row["id"] ). '"><i class="mdi mdi-account-edit"></i> Edit</a>

                                                <a class="dropdown-item" data-toggle="modal" id="deleteFolderButton" data-target="#deleteModal" href="" data-attr="'. route("folder.delete", $row["id"] ). '"><i class="mdi mdi-account-off"></i> Delete</a>
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
        return view('folder.index',compact('folders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Folder $folder)
    {
        return view('folder.edit', compact('folder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //  $folder->update(request()->validate([
        //     'folder_name' => 'required|string|max:255'
        // ]));
        $folder = Folder::find($id);
        $folder->name = $request->input('folder_name');
        $folder->update();
        return redirect()->back()->with('success','Folder was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Folder $folder)
    {
        $folder->delete();

        return redirect()->route('folders')->with('success', 'Selected Folder was deleted successfully');       
    }

    public function delete(Folder $folder)
    {   
        return view('folder.delete', compact('folder'));     
    }

   
}
