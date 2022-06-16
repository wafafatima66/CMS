<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\SubFolderController;
use Illuminate\Support\Facades\Route;

Auth::routes();

// HOME
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

// USERS
Route::resource('user',  'App\Http\Controllers\UserController');
Route::get('/user/{user}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete'); 
//user notification
Route::post('/user/mark-as-read', [App\Http\Controllers\UserController::class, 'markNotification'])->name('user.notifications.mark');

//FOLDER
Route::get('/folders', [FolderController::class, 'index'])->name('folders')->middleware('auth');
Route::post('/folders', [FolderController::class, 'store'])->name('folder.store')->middleware('auth');
Route::get('/folders/{folder}/edit', [FolderController::class, 'edit'])->name('folder.edit');
Route::put('/folders/{folder}/update', [FolderController::class, 'update'])->name('folder.update');
Route::delete('/folder/{folder}', [FolderController::class, 'destroy'])->name('folder.destroy'); 
Route::get('/folders/{folder}', [FolderController::class, 'delete'])->name('folder.delete'); 
Route::get('/add', [FolderController::class, 'add'])->name('folder.add');

//SUB FOLDERS
Route::get('/sub_folders', [SubFolderController::class, 'index'])->name('subfolders')->middleware('auth');
Route::post('/sub_folders', [SubFolderController::class, 'store'])->name('subfolder.store')->middleware('auth');
Route::get('/sub_folders/{folder}/edit', [SubFolderController::class, 'edit'])->name('subfolder.edit');
Route::put('/sub_folders/{subfolder}/update', [SubFolderController::class, 'update'])->name('subfolder.update');
Route::delete('/sub_folder/{folder}', [SubFolderController::class, 'destroy'])->name('subfolder.destroy'); 
Route::get('/sub_folders/{folder}', [SubFolderController::class, 'delete'])->name('subfolder.delete');
Route::get('/sub_folders/{folder}/add', [SubFolderController::class, 'add'])->name('subfolder.add');

//SEARCH THROUGH FOLDERS
Route::get('/folders_search',[FolderController::class, 'searchFolders'])->name('folder.search')->middleware('auth');

// NOTES
Route::get('/notes',[NotesController::class, 'index'])->name('notes');
Route::post('/notes',[NotesController::class, 'store'])->name('notes.store');
Route::get('/notes/show',[NotesController::class, 'show'])->name('notes.show');
Route::put('/notes/{note}/update',[NotesController::class, 'update'])->name('notes.update');
Route::delete('/notes/{note}', [NotesController::class, 'destroy'])->name('notes.destroy'); 
Route::get('/notes/{note}', [NotesController::class, 'delete'])->name('notes.delete'); 

// COMMENTS
Route::get('/comments/show',[CommentsController::class, 'show'])->name('comments.show');
Route::post('/comments',[CommentsController::class, 'store']);


