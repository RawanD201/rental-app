<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Validation\ValidationException;


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


Route::redirect('/', '/login');

Route::middleware('auth')
    ->group(function () {

        Route::post('/dashboard/backup', function () {
            try {
                $job = Artisan::call('backup:run');
                return redirect()->route('home')->with([
                    'success' => __('index.admin.messages.backup.success')
                ]);
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['failed' => $e->getMessage()]);
            }
            if (!$job) {
                throw ValidationException::withMessages([
                    'failed' => __('index.admin.messages.backup.fail')
                ]);
            }
        })->name('backup');


        Route::get('/home/{name?}', [HomeController::class, 'index'])->name('home')->where('name', 'home');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::prefix('/admin')->group(function () {
            require __DIR__ . '/profile/index.php';
            require __DIR__ . '/expense/index.php';
            require __DIR__ . '/expenseType/index.php';
            require __DIR__ . '/car/index.php';
            require __DIR__ . '/capital/index.php';
            require __DIR__ . '/merchant/index.php';
            require __DIR__ . '/treat/index.php';
        });

        Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
    });

Route::middleware('guest')
    ->group(function () {
        Route::get('login', [AuthController::class, 'create'])->name('login');
        Route::post('login', [AuthController::class, 'store']);
    });


Route::fallback(function () {
    return abort(404);
});
