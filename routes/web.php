<?php

use App\Http\Controllers\FolderController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/folders', [FolderController::class, 'index'])->name('folders')->middleware('auth');
Route::post('/folders', [FolderController::class, 'store'])->name('folder.store')->middleware('auth');
Route::get('/folders/{folder}/edit', [FolderController::class, 'edit'])->name('folder.edit');
Route::put('/folders/{folder}/update', [FolderController::class, 'update'])->name('folder.update');
Route::delete('/folder/{folder}', [FolderController::class, 'destroy'])->name('folder.destroy'); 
Route::get('/folders/{folder}', [FolderController::class, 'delete'])->name('folder.delete'); 

Route::get('/sub_folders', [SubFolderController::class, 'index'])->name('subfolders')->middleware('auth');
Route::post('/sub_folders', [SubFolderController::class, 'store'])->name('subfolder.store')->middleware('auth');
Route::get('/sub_folders/{folder}/edit', [SubFolderController::class, 'edit'])->name('subfolder.edit');
Route::put('/sub_folders/{subfolder}/update', [SubFolderController::class, 'update'])->name('subfolder.update');
Route::delete('/sub_folder/{folder}', [SubFolderController::class, 'destroy'])->name('subfolder.destroy'); 
Route::get('/sub_folders/{folder}', [SubFolderController::class, 'delete'])->name('subfolder.delete');

// });

