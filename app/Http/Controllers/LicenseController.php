<?php

namespace App\Http\Controllers;

use App\Models\LicenseKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use function Ramsey\Uuid\v1;

class LicenseController extends Controller
{
    public function generate()
    {
        // Custom formatted key: 30DAY-XXXX-XXXX-XXXX
        $prefix = '30DAY';
        $random = strtoupper(Str::random(12)); // 12 random characters
        $formattedKey = $prefix . '-' . implode('-', str_split($random, 4));

        // Insert into database
        $license = LicenseKey::create([
            'key' => $formattedKey,
        ]);
        return redirect()->route('getKeylicense', ['key' => $license->key]);
    }
    public function generateMethod()
    {
        // Custom formatted key: 30DAY-XXXX-XXXX-XXXX
        $prefix = '30DAY';
        $random = strtoupper(Str::random(12)); // 12 random characters
        $formattedKey = $prefix . '-' . implode('-', str_split($random, 4));

        // Insert into database
        $license = LicenseKey::create([
            'key' => $formattedKey,
        ]);

        // ✅ Correct redirect
        return redirect()->route('getKeylicenseAdmin', ['key' => $license->key]);
    }

    public function showAdmin($key)
    {
    $license = LicenseKey::where('key', $key)->first();
    if (!$license) {
        return redirect('/')->with('error', 'License key not found!');
    }

    $expiresOn = $license->created_at->addDays(30)->format('Y-m-d');

    return view('keypage', compact('license', 'expiresOn'));
    }
    public function show($key)
    {
    $license = LicenseKey::where('key', $key)->first();
    if (!$license) {
        return redirect('/')->with('error', 'License key not found!');
    }

    $expiresOn = $license->created_at->addDays(30)->format('Y-m-d');

    return view('keypage', compact('license', 'expiresOn'));
    }
    //Generate and store a random key
    //Validate the key for one device only
    public function activate(Request $request, $key)
    {
        $record = DB::table('license_keys')->where('key', $key)->first();
        $ip = $request->ip();
        if (! $record) {
            return response()->json(['message' => 'Invalid license key'], 404);
        }

        if ($record->ip_address && $record->ip_address !== $ip) {
            return response()->json(['message' => 'This license key is already used on another device'], 403);
        }
        if (! $record->ip_address) {
            DB::table('license_keys')->where('key', $key)->update([
                'ip_address' => $ip,
                'updated_at' => now(),
            ]);

            return response()->json(['message' => 'License activated successfully', 'device_ip' => $ip]);
        }
        return response()->json(['message' => 'License already active for this device']);
    }
    public function activeKeys()
    {
        $keys = LicenseKey::all();
        if($keys){
            return view('admin.activekey',compact("keys"));
        }
    }
    public function deleteKey($id)
    {
        $key = LicenseKey::findOrFail($id);
        $key->delete();
        if($key){
            return redirect()->route('active.keys')->with('success', 'License key has been deleted!');
        }
    }
    public function KeyMethod(){
        return view('admin.licenseMethod');
    }
}
