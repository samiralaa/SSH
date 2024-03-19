<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

trait CrudTrait
{
    public function index(Model $model){
        return response()->json($model->all());
    }
    public function show(Model $model,$id)
    {
        return response()->json($model->find($id));
    }
}
