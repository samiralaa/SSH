<?php

namespace App\Http\Controllers;

use App\Models\TypeDev;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class TypeDevController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $data = TypeDev::create($request->all());
        return response()->json($data);
    }



    public function update(Request $request, $id)
    {
        $data = TypeDev::find($id);
        return response()->json($data);
    }
    public function destroy(TypeDev $typeDev)
    {
      
    }
}
