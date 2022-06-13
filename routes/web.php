<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\SubFolderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::middleware('auth')->group(function () {



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/folders', [FolderController::class, 'index'])->name('folders')->middleware('auth');
Route::post('/folders', [FolderController::class, 'store'])->name('folder.store')->middleware('auth');
Route::get('/folders/{folder}/edit', [FolderController::class, 'edit'])->name('folder.edit');
Route::put('/folders/{folder}/update', [FolderController::class, 'update'])->name('folder.update');
Route::delete('/folder/{folder}', [FolderController::class, 'destroy'])->name('folder.destroy'); 
Route::get('/folders/{folder}', [FolderController::class, 'delete'])->name('folder.delete'); 
// new 
Route::get('/add', [FolderController::class, 'add'])->name('folder.add');

Route::get('/sub_folders', [SubFolderController::class, 'index'])->name('subfolders')->middleware('auth');
Route::post('/sub_folders', [SubFolderController::class, 'store'])->name('subfolder.store')->middleware('auth');
Route::get('/sub_folders/{folder}/edit', [SubFolderController::class, 'edit'])->name('subfolder.edit');
Route::put('/sub_folders/{subfolder}/update', [SubFolderController::class, 'update'])->name('subfolder.update');
Route::delete('/sub_folder/{folder}', [SubFolderController::class, 'destroy'])->name('subfolder.destroy'); 
Route::get('/sub_folders/{folder}', [SubFolderController::class, 'delete'])->name('subfolder.delete');
// new 
Route::get('/sub_folders/{folder}/add', [SubFolderController::class, 'add'])->name('subfolder.add');


// notes
Route::get('/notes',[NotesController::class, 'index'])->name('notes');
Route::post('/notes',[NotesController::class, 'store'])->name('notes.store');
Route::get('/notes/show',[NotesController::class, 'show'])->name('notes.show');
Route::put('/notes/{note}/update',[NotesController::class, 'update'])->name('notes.update');
Route::delete('/notes/{note}', [NotesController::class, 'destroy'])->name('notes.destroy'); 
Route::get('/notes/{note}', [NotesController::class, 'delete'])->name('notes.delete'); 
// Route::get('/note/show/box',[NotesController::class, 'noteBox'])->name('note.show.box');

// comments
Route::get('/comments/show',[CommentsController::class, 'show'])->name('comments.show');
Route::post('/comments',[CommentsController::class, 'store']);
// });

