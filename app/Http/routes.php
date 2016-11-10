<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

use App\Task;
use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () {

    // Retrieve the tasks route.
    Route::get('/api/tasks/list', 'TaskController@apiList');

    // Add a task route.
    Route::post('/api/task/add', 'TaskController@apiAdd');

    // Delete a task route.
    Route::get('/api/task/delete/{id}', 'TaskController@apiDelete');

    // Update a task route.
    Route::post('/api/task/update', 'TaskController@apiUpdate');

    // Dashboard route.
    Route::get('/', 'TaskController@dashboard');

});
