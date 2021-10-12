<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('questions/{id}/voteup', 'QuestionController@voteUp');
Route::get('questions/{id}/votedown', 'QuestionController@voteDown');
Route::get('question/{id}/comments', 'QuestionController@getQuestionComments');
Route::post('comments/add', 'CommentController@store');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
