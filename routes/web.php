<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    $tasks = DB::select("SELECT id, content FROM tasks");
    return view('index', ["tasks" => $tasks]);
});

Route::post('/new-task', function(Request $request) {
    $validatedData = $request->validate(["content" => "required"]);
    $content = $validatedData["content"];
    DB::insert("INSERT INTO tasks (content) VALUES (:content)", ["content" => $content]);
                                                                    
    return redirect('/');          
});