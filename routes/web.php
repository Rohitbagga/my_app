<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishlistController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::delete('force-delete/{id}', [WishlistController::class, 'forceDelete'])->name('wishlists.force_delete');
    Route::get('restore/{id}', [WishlistController::class, 'restore'])->name('wishlists.restore'); 
    Route::resource('wishlists', WishlistController::class);
});


require __DIR__ . '/auth.php';