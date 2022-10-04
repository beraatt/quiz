<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QuizController;
use Psy\Readline\Hoa\Console;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\MainController;

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
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('panel',[MainController::class,'dashboard'])->name('dashboard');
    Route::get('quiz/detay/{slug}',[MainController::class,'quiz_detail'])->name('quiz_detail');
    Route::get('quiz/{slug}',[MainController::class,'quiz'])->name('quiz.join');
    Route::post('quiz/{slug}/result',[MainController::class,'result'])->name('quiz.result');

});

Route::group(['middleware'=>['auth','isAdmin'],'prefix'=>'admin'],
function(){
    Route::resource('quizzes',QuizController::class);
    Route::resource('quiz/{quiz_id}/questions',QuestionController::class);

});

