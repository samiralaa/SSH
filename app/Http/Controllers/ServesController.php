<?php

namespace App\Http\Controllers;

use App\Models\Serves;
use Illuminate\Http\Request;

class ServesController extends Controller
{

    public function index()
    {
        $data = Serves::with('sarvespage')->get();
        return response()->json($data, 200);
        // return view('admin.serves.index', compact('data'));
    }


    public function store(Request $request)
    {
        $data = $request->all();
        Serves::create($data);
        return response()->json(['message' => 'Serves created successfully'], 201);

    }
    public function show( $id)
    {
        $data = Serves::find($id);
        return response()->json($data);
    }


    public function update(Request $request,  $id)
    {
        $data= Serves::find($id);
        $data->update($request->all());
        return response()->json(['message' => 'Serves updated successfully'], 200);

    }


    public function destroy( $id)
    {
        $data = Serves::find($id);
        $data->delete();
        return response()->json(['message' => 'Serves deleted successfully'], 200);
    }
}
