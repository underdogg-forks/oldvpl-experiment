<?php

use Modules\Tasks\Controllers\TaskController;

Route::get('tasks/run', [TaskController::class, 'run'])->name('tasks.run');
