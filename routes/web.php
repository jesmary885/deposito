<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JumpersController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\SobrenosotrosController;
use App\Models\Marketplace;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

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
        return view('auth.login');
    });


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/home', [HomeController::class,'index'])->name('home');
});

/*
Route::middleware(['auth'])->group(function()
{
    Route::get('/home',[HomeController::class,'index'])->name('home');
}*/


//Jumpers
Route::get('cint',[JumpersController::class,'cint'])->name('cint.index');
Route::get('internals',[JumpersController::class,'internals'])->name('internals.index');
Route::get('k100',[JumpersController::class,'kmil'])->name('kmil.index');
Route::get('k1092',[JumpersController::class,'kmilnoventaydos'])->name('kmilnoventaydos.index');
Route::get('k2062',[JumpersController::class,'kdosmilsesentaydos'])->name('kdosmilsesentaydos.index');
Route::get('k23',[JumpersController::class,'kveintitres'])->name('kveintitres.index');
Route::get('k7341',[JumpersController::class,'ksietemilcuarentayuno'])->name('ksietemilcuarentayuno.index');
Route::get('prodege',[JumpersController::class,'prodege'])->name('prodege.index');
Route::get('samplicio',[JumpersController::class,'samplicio'])->name('samplicio.index');
Route::get('scube',[JumpersController::class,'scube'])->name('scube.index');
Route::get('spectrum',[JumpersController::class,'spectrum'])->name('spectrum.index');
Route::get('toluna',[JumpersController::class,'toluna'])->name('toluna.index');
Route::get('ssidkr',[JumpersController::class,'ssidkr'])->name('ssidkr.index');

//Marketplace

Route::get('marketplace',[MarketplaceController::class,'index'])->name('marketplace.index');
Route::get('marketplace_shop/{marketplace}',[MarketplaceController::class,'shop'])->name('marketplace.shop');

//chat
Route::get('chat-conver',[ChatController::class,'index'])->name('chat.index');
Route::get('chat-conver/{user}',[ChatController::class,'chat_convers'])->name('chat.convers');

//Sobre nosotros

Route::get('sobre-nosotros',[SobrenosotrosController::class,'index'])->name('sobrenosotros.index');

//Mis compras
Route::get('my_shopping',[MarketplaceController::class,'compras'])->name('marketplace_compras.index');


