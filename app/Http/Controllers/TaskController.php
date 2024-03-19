<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Traits\CrudTrait;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    use CrudTrait;
    /**
     * Display a listing of the resource.
     */
    protected $model;
    public function __construct()
    {
        $this->model = new Task();
    }
    public function index()
    {
return $this->model->all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
