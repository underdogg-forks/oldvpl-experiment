<?php

Route::get('tasks/run', ['uses' => 'Modules\Tasks\Controllers\TaskController@run', 'as' => 'tasks.run']);