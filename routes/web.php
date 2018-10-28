<?php

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

use App\Task;
use Illuminate\Http\Request;

// 全タスク表示
Route::get( '/', function () {  
    // 全てのtaskを昇順で取得
    $tasks = \App\Task::orderBy( 'created_at', 'asc' )->get();

    return view( 'tasks', [
        'tasks' => $tasks
    ] );
});

// タスク投稿
Route::post( '/task', function ( Request $request ) {
    // 全てのリクエスト（name）に対してバリデーションをかける
    $validator = Validator::make( $request->all(), [
        'name' => 'required|max:255',
    ] );

    // validation失敗時
    if ( $validator->fails() ) {
        return redirect( '/' )
            ->withInput() // 以前の入力
            ->withErrors( $validator ); // エラー
    }

    $task = new Task; // taskのインスタンスを生成
    $task->name = $request->name; 
    $task->save();

    return redirect( '/' );
});

// タスク削除
Route::delete( 'task/{id}', function ( $id ) {
    Task::findOrFail( $id )->delete();

    return redirect( '/' );
} );

