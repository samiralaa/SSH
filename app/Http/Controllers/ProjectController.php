<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Traits\CrudTrait;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use CrudTrait;
    protected $model ;
    public function __construct()
    {
        $this->model== new Project();
    }

    public function index()
    {
        return $this->model->all();
    }

    public function store(Request $request)
    {
        $this->model->create($request->all());
        return response()->json(['message'=>'created successfully'],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
