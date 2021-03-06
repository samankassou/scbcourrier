<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\RedirectController;
use App\Http\Livewire\Admin\Couriers;
use App\Http\Livewire\Admin\Couriers\Show as ShowCourier;
use App\Http\Livewire\Recipient\Couriers as RecipientCouriers;
use App\Http\Livewire\Writer\Couriers as WriterCouriers;
use App\Http\Livewire\Manager\Couriers as ManagerCouriers;
use App\Http\Livewire\Recipient\Couriers\Show as RecipientShowCourier;
use App\Http\Livewire\Writer\Couriers\Show as WriterShowCourier;
use App\Http\Livewire\Manager\Couriers\Show as ManagerShowCourier;
use App\Http\Livewire\Admin\Dashboard as AdminDashboard;
use App\Http\Livewire\Recipient\Dashboard as RecipientDashboard;
use App\Http\Livewire\Writer\Dashboard as WriterDashboard;
use App\Http\Livewire\Manager\Dashboard as ManagerDashboard;
use App\Http\Livewire\Admin\Recipients as AdminRecipients;
use App\Http\Livewire\Writer\Recipients as WriterRecipients;
use App\Http\Livewire\UserSettings as Settings;
use App\Http\Livewire\Admin\Users;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome')->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');


Route::middleware('auth')->group(function () {

    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');

    Route::get('redirect', RedirectController::class)->name('redirect');

    /* Admin routes */
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
    ], function () {
        Route::get('dashboard', AdminDashboard::class)
            ->name('dashboard');
        Route::get('couriers', Couriers::class)
            ->name('couriers');
        Route::get('couriers/{courier}', ShowCourier::class)
            ->name('couriers.show');
        Route::get('users', Users::class)
            ->name('users');
        Route::get('recipients', AdminRecipients::class)
            ->name('recipients');
        Route::get('settings', Settings::class)
            ->name('settings');
    });

    /* Recipient routes */
    Route::group([
        'prefix' => 'recipient',
        'as' => 'recipient.',
    ], function () {
        Route::get('dashboard', RecipientDashboard::class)
            ->name('dashboard');
        Route::get('couriers', RecipientCouriers::class)
            ->name('couriers');
        Route::get('couriers/{courier}', RecipientShowCourier::class)
            ->name('couriers.show');
        Route::get('settings', Settings::class)
            ->name('settings');
    });

    /* Writer routes */
    Route::group([
        'prefix' => 'writer',
        'as' => 'writer.',
    ], function () {
        Route::get('dashboard', WriterDashboard::class)
            ->name('dashboard');
        Route::get('couriers', WriterCouriers::class)
            ->name('couriers');
        Route::get('couriers/{courier}', WriterShowCourier::class)
            ->name('couriers.show');
        Route::get('recipients', WriterRecipients::class)
            ->name('recipients');
        Route::get('settings', Settings::class)
            ->name('settings');
    });

    /* Manager routes */
    Route::group([
        'prefix' => 'manager',
        'as' => 'manager.',
    ], function () {
        Route::get('dashboard', ManagerDashboard::class)
            ->name('dashboard');
        Route::get('couriers', ManagerCouriers::class)
            ->name('couriers');
        Route::get('couriers/{courier}', ManagerShowCourier::class)
            ->name('couriers.show');
        Route::get('settings', Settings::class)
            ->name('settings');
    });


    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});
