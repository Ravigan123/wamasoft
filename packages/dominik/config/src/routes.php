<?php

namespace Dominik\Config;

use Illuminate\Support\Facades\Route;
use Dominik\Config\ConfigKeyController;

// Route::get('config', function(){
// 	echo 'Hello from the calculator package!';
// });

Route::get('/config', [ConfigKeyController::class, 'index']);