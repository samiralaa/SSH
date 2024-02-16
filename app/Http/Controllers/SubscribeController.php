<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function index()
    {
        $data = Subscribe::all();
        return response()->json($data);

    }




    public function store(Request $request)
    {
        
        $data = new Subscribe;
        $data->email = $request->email;
        $data->save();
        return response()->json($data);
    }


    public function show( $id)
    {
        $data = Subscribe::find($id);
        return response()->json($data);

    }



    public function destroy( $id)
    {
        $data = Subscribe::find($id);
        $data->delete();
        return response()->json("sucsess");
    }
}
