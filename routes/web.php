<?php

use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MicrosoftApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
    return view('welcome');
});
Auth::routes();
Route::group(['middleware' => ['auth']], function () {
//    Verification Routes
    Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
    //only verified account can access with this group
    Route::group(['middleware' => ['verified']], function () {
        Route::group(['prefix' => 'dashboard'], function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
            Route::get('/customers', [CustomerController::class, 'index'])->name('teams.customers.index');
            Route::resource('clients', ClientController::class);
        });
//        External Routes
        Route::post('/get-team-users', [MicrosoftApiController::class, 'getTeamUsers'])->name('microsoft.teams.users');
    });

});
//    Documentation Routes

Route::get('/documentation', function () {
    return view('doc.doc');
})->name('documentation.link');
Route::get('/documentationFile', function () {
    return Storage::disk('local')->get('documentation.json');
});




