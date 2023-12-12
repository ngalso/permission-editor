<?php

use Illuminate\Support\Facades\Route;
use Ngalso\PermissionEditor\Http\Controllers\PermissionController;
use Ngalso\PermissionEditor\Http\Controllers\RoleController;


Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);



