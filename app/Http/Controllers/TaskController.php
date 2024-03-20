<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Traits\CrudTrait;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    use CrudTrait;


    public function indexTasks()
    {
        return $this->index(new Task());
    }

    public function storeTask(Request $request)
    {
        return $this->store($request, new Task());
    }

    public function updateTask(Request $request, $id)
    {
        return $this->update($request, new Task(), $id);
    }

    public function destroyTask($id)
    {
        return $this->destroy(new Task(), $id);
    }
}
