<?php

use App\Http\Livewire\Guest\VoteForm;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Vote\VoteIndex;
use App\Http\Livewire\Guest\VoteList;
use App\Http\Livewire\Guest\VoteOptions;
use App\Http\Livewire\Guest\VoteResult;
use App\Http\Livewire\Vote\VoteOptions as VoteVoteOptions;
use App\Http\Livewire\Vote\VoteVoters;

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

Route::get('/', VoteList::class)->name('home');
Route::get('/vote/{vote:uuid}', VoteOptions::class)->name('vote-form');
Route::get('/vote-result/{vote:uuid}', VoteResult::class)->name('vote-result');



Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/manage-vote', VoteIndex::class)->name('voting');
    Route::get('/manage-vote-option/{vote:uuid}', VoteVoteOptions::class)->name('vote-options');
    Route::get('/managet-vote-voters/{vote:uuid}', VoteVoters::class)->name('vote-voters');
});
