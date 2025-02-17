<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Frontend\Admin\UserApprovalController;

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/approve/user/list/dashboard', [UserApprovalController::class, 'index'])->name('show.pending.user');
    Route::patch('/approve/user/dashboard/{user}', [UserApprovalController::class, 'update'])->name('approve.user');
});