<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use App\Models\Logo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Logo::all()->map(function ($logo) {
            $logo->logo = 'https://ssh.mqawilk.com/public/storage/' . $logo->logo;
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
    public function logotest()

    {// Encrypted data received from storage or transmission



            $encryptedText = '$2y$10$1QSObixmCFOScTB5HFBtKuhMvI5cYGn9BE5JUkFTg73A.jQBzQXR.';

    // Retrieve the encryption key from the Laravel configuration




try {
    // Attempt to decrypt the encrypted data
    $decryptedData = Crypt::decryptString($encryptedText);

    // If decryption succeeds, handle the decrypted data
    echo "Decrypted data: $decryptedData\n";
} catch (DecryptException $e) {
    // Handle decryption failure gracefully
    echo "Decryption failed: " . $e->getMessage() . "\n";
    // Log the error or display a user-friendly message
}
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
    public function destroy($id)
    {
        $logo = Logo::findOrFail($id);

        // Delete the logo file
        Storage::disk('public')->delete($logo->logo);

        // Delete the logo record from the database
        $logo->delete();

        return response()->json(['message' => 'Logo deleted successfully']);
    }
}
