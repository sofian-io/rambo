<?php

use AngryMoustache\Rambo\Http\Controllers\AttachmentController;
use AngryMoustache\Rambo\Http\Controllers\CrudController;
use AngryMoustache\Rambo\Http\Controllers\DashboardController;
use AngryMoustache\Rambo\Http\Controllers\RamboAuthController;
use AngryMoustache\Rambo\Http\Middleware\RamboAuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    Route::get('/admin/login', [RamboAuthController::class, 'login']);
    Route::get('/admin/logout', [RamboAuthController::class, 'logout']);

    Route::middleware(RamboAuthMiddleware::class)->group(function () {
        Route::get("/admin/attachments/mass-upload", [AttachmentController::class, 'massUpload'])
            ->name('rambo.mass-upload');

        $controller = CrudController::class;
        Route::get("/admin", DashboardController::class)->name('rambo.dashboard');
        Route::get("/admin/{resource}", [$controller, 'index'])->name('rambo.index');
        Route::get("/admin/{resource}/create", [$controller, 'create'])->name('rambo.create');
        Route::get("/admin/{resource}/{id}", [$controller, 'show'])->name('rambo.show');
        Route::get("/admin/{resource}/{id}/edit", [$controller, 'edit'])->name('rambo.edit');
        Route::get("/admin/{resource}/{id}/delete", [$controller, 'delete'])->name('rambo.delete');
        Route::get("/admin/{resource}/{id}/delete-confirm", [$controller, 'deleteConfirm'])->name('rambo.delete-confirm');
    });
});
