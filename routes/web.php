<?php

use App\Http\Controllers\KlinikController;
use App\Http\Controllers\PublikController;
use App\Http\Controllers\HomeController;
// use App\Http\Middleware\KlinikMiddleware;
// use App\Http\Middleware\PublikMiddleware;
//use App\Http\Controllers\ProfileController;
use App\Models\User;
use App\Models\Klinik;
use App\Models\Publik;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('klinik.klinik_login');
// });

Route::get('/', function () {
    return view('home');
});


// Route::get('/clientList', function () {
//     return view('admin.clientList');
// });
//--------------------------------------------------ROUTE FOR HOME-----------------------------------------------------


Route::prefix('home')->group(function (){

    Route::get('/logout', [HomeController::class,'Index'])->name('home');
});

//--------------------------------------------------ROUTE FOR KLINIK-----------------------------------------------------
Route::prefix('klinik')->group(function (){

Route::get('/login', [KlinikController::class,'Index'])->name('login_from');
Route::POST('/login/owner', [KlinikController::class,'Login'])->name('klinik.login');
Route::get('/clientList', [KlinikController::class,'clientList'])->name('klinik.clientList');
Route::get('/dashboard', [KlinikController::class,'Dashboard'])->name('klinik.dashboard')->middleware('klinik');

Route::get('/about', [KlinikController::class, 'about'])->name('klinik_about')->middleware('klinik');
Route::get('/klinikabout', [KlinikController::class, 'about'])->name('klinikabout.about')->middleware('klinik');
Route::get('/klinikabout/create', [KlinikController::class, 'create'])->name('klinikabout.create');
Route::post('/klinikabout/store', [KlinikController::class, 'store'])->name('klinikabout.store');
Route::get('/klinik/about', [KlinikController::class, 'about'])->name('klinik.abouts.klinik_about');
Route::get('/klinikabout/{klinikabout}/edit', [KlinikController::class, 'edit'])->name('klinikabout.edit');
Route::put('/klinikabout/{klinikabout}/update', [KlinikController::class, 'update'])->name('klinikabout.update');
Route::delete('/klinikabout/{klinikabout}/destroy', [KlinikController::class, 'destroy'])->name('klinikabout.destroy');

Route::get('/logout', [KlinikController::class,'Logout'])->name('klinik.logout')->middleware('klinik');
Route::get('/register', [KlinikController::class,'KlinikRegister'])->name('klinik.register');
Route::POST('/register/create', [KlinikController::class,'KlinikRegisterCreate'])->name('klinik.register.create');
Route::POST('/user/create', [KlinikController::class,'createNewUser'])->name('klinik.newUser');
Route::get('/delete/{id}', [KlinikController::class,'deleteClient'])->name('klinik.deleteClient');
});
//----------------------------------------END ROUTE FOR KLINIK------------------------------------------------------------

//-----------------------------------ROUTE FOR PUBLIK---------------------------------------------------------------------
Route::prefix('publik')->group(function (){

    Route::get('/login', [PublikController::class,'Index'])->name('publik_login_from');
    Route::POST('/login/owner', [PublikController::class,'PublikLogin'])->name('publik.login');
    Route::get('/dashboard', [PublikController::class,'PublikDashboard'])->name('publik.dashboard')->middleware('publik');
    Route::get('/logout', [PublikController::class,'PublikLogout'])->name('publik.logout')->middleware('publik');
    Route::get('/register', [PublikController::class,'PublikRegister'])->name('publik.register');
    Route::POST('/register/create', [PublikController::class,'PublikRegisterCreate'])->name('publik.register.create');
});
//-----------------------------------END ROUTE FOR PUBLIK-----------------------------------------------------------------


//-------------------ROUTE FOR CLIENT DASHBOARD------------------------------------------------
// Route::get('/Client', function () {
//     return view('ClientDashboard');
// });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



// Route::get('/some-route', function () {
//     // Your route code here
// })->middleware(PublikMiddleware::class);

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth', 'isKlinik'])->group(function () {
    Route::get('/klinik', function () {
      return view('KlinikDashboard');
    })->name('KlinikDashboard');
});

// Route::middleware(['klinik'])->group(function () {
//     Route::get('/klinikabout', [KlinikController::class, 'index'])->name('klinikabout.aboute');
//     Route::get('/klinikabout/create', [KlinikController::class, 'create'])->name('klinikabout.create');
//     Route::post('/klinikabout/store', [KlinikController::class, 'store'])->name('klinikabout.store');
//     Route::get('/klinikabout/{klinikabout}/edit', [KlinikController::class, 'edit'])->name('klinikabout.edit');
//     Route::put('/klinikabout/{klinikabout}/update', [KlinikController::class, 'update'])->name('klinikabout.update');
//     Route::delete('/klinikabout/{klinikabout}/destroy', [KlinikController::class, 'destroy'])->name('klinikabout.destroy');
// });

Route::post('NewClient', [UserController::class, 'NewClient']);
require __DIR__.'/auth.php';
