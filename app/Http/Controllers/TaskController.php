<?php
namespace App\Http\Controllers;

use App\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller {

    /**
     * Dashboard.
     */
    public function dashboard() {
        return view('dashboard');
    }

    /**
     * API. The task list.
     */
    public function apiList() {
        return Task::orderBy('created_at', 'asc')->get();
    }

    /**
     * API. Add a task.
     */
    public function apiAdd(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
        if (!$validator->fails()) {
            $task = new Task;
            $task->name = $request->name;
            $response = $task->save();
        } else {
            $response = "KO";
        }
        return json_encode($response);
    }

    /**
     * API. Update a task
     */
    public function apiUpdate(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required|max:255',
        ]);
        if (!$validator->fails()) {
            $model = Task::findOrFail($request->id);
            $model->name = $request->name;
            $response = $model->save();
        } else {
            $response = "KO";
        }
        return json_encode($response);
    }

    /**
     * API. Delete a task
     */
    public function apiDelete($id) {
        return json_encode(Task::findOrFail($id)->delete());
    }


}

?>
