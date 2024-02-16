<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::all();
        return response()->json($contacts);
    }


    public function store(Request $request)
    {
      
        $contact = Contact::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Data Added',
            'data' => $contact
        ]);
    }


    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return response()->json($contact);
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Deleted',
            'data' => $contact
        ]);
    }
}
