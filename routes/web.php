<?php
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\creerQuestionController;

Route::get('/', [QuizController::class, 'index'])->name('home');
Route::post('/store', [creerQuestionController::class, 'store'])->name('store');

Route::middleware(['auth'])->group(function () {
Route::get('/creerQuestion', [creerQuestionController::class, 'creerQuestion'])->name('creerQuestion');
Route::post('/creerQuestion', [CreerQuestionController::class, 'store'])->name('creerQuestion.store');
});

Route::get('/quiz/start', [QuizController::class, 'start'])->name('quiz.start');
Route::get('/quiz/question/{index}', [QuizController::class, 'showQuestion'])->name('quiz.question');
Route::post('/quiz/answer', [QuizController::class, 'submitAnswer'])->name('quiz.answer');
Route::get('/quiz/finish', [QuizController::class, 'finish'])->name('quiz.finish');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
