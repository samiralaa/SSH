<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Logo::all()->map(function ($logo) {
            $logo->logo = 'https://ssh.mqawilk.com/storage/app/logos/' . $logo->logo;
            return $logo;
        });

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alt' => 'required|string',
        ]);

        // Store the uploaded image file
        $logoPath = $request->file('logo')->store('logos', 'public');

        // Create the Logo model instance and save it to the database
        $logo = Logo::create([
            'name' => $request->name,
            'logo' => $logoPath,
            'alt'  => $request->alt,
        ]);

        return $logo;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data  = Logo::find($id);
        return response()->json($data);
    }



    public function updata(Request $request,  $id)
    {

        $logo = Logo::findOrFail($id);

        // Update logo attributes
        $logo->name = $request->name;
        $logo->alt = $request->alt;

        // If a new logo file is uploaded, update it
        if ($request->hasFile('logo')) {
            // Delete the old logo file
            Storage::disk('public')->delete($logo->logo);

            // Store the new logo file
            $logoPath = $request->file('logo')->store('logos', 'public');
            $logo->logo = $logoPath;
        }

        // Save the changes to the database
        $logo->save();

        return $logo;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $logo = Logo::findOrFail($id);

        // Delete the logo file
        Storage::disk('public')->delete($logo->logo);

        // Delete the logo record from the database
        $logo->delete();

        return response()->json(['message' => 'Logo deleted successfully']);
    }
}
