<?php
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/', [TaskController::class, 'index'])->middleware(['auth', 'verified'])->name('tasks.index');
Route::get('/taches', [TaskController::class, 'index'])->middleware(['auth', 'verified'])->name('tasks.index');
Route::post('/taches', [TaskController::class, 'store'])->middleware(['auth', 'verified'])->name('tasks.store');
Route::get('/taches/{task}/edit', [TaskController::class, 'edit'])->middleware(['auth', 'verified'])->name('tasks.edit');
Route::put('/taches/{task}', [TaskController::class, 'update'])->middleware(['auth', 'verified'])->name('tasks.update');
Route::delete('/taches/{task}', [TaskController::class, 'destroy'])->middleware(['auth', 'verified'])->name('tasks.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
