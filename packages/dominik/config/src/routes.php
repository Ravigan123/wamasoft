<?php

namespace Dominik\Config;


use Illuminate\Support\Facades\Route;
use Dominik\Config\ConfigKeyController;
use Dominik\Config\ConfigValueController;
use Dominik\Config\ConfigUserController;
use Dominik\Config\ConfigMessageController;

// Route::get('config', function(){
// 	echo 'Hello from the calculator package!';
// });

Route::get('/config', [ConfigKeyController::class, 'index'])->name('configKey.index');
Route::get('/config/form', [ConfigKeyController::class, 'form'])->name('configKey.form');
Route::get('/config/message', [ConfigMessageController::class, 'message'])->name('configMessage.message');
Route::get('/config/user', [ConfigUserController::class, 'store'])->name('configUser.store');
Route::post('/config/form/send', [ConfigKeyController::class, 'send'])->name('configKey.send');
Route::get('/config/details/{id}', [ConfigValueController::class, 'index'])->name('configValue.index');