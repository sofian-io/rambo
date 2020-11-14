<?php

use Illuminate\Support\Facades\Route;

$controller = \AngryMoustache\Rambo\Http\Controllers\CrudController::class;

Route::get("/admin/{resource}", [$controller, 'index']);
Route::get("/admin/{resource}/create", [$controller, 'create']);
Route::get("/admin/{resource}/{id}", [$controller, 'show']);
Route::get("/admin/{resource}/{id}/edit", [$controller, 'edit']);
Route::get("/admin/{resource}/{id}/delete", [$controller, 'delete']);
