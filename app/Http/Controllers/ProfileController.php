<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\LicenseKey;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);
        $user = $request->user();
        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function showRole()
    {
        $user = Auth::user();
        // Check if email matches admin
        if ($user && $user->email === 'bitthork165@gmail.com') {
            return view('admin.dashboard'); // admin goes to dashboard view
        }
        // Otherwise, send to home
        return redirect('/');
    }
    public function showPayment()
    {
        return view('paypage');
    }
    public function process($key)
    {
        $license = LicenseKey::where('key', $key)->first();
        if (!$license) {
            return redirect('/')->with('error', 'License not found!');
        }
        $expiresOn = $license->created_at->addDays(30);

        return view('keypage', [
            'key' => $license->key,
            'generated_on' => $license->created_at,
            'expires_on' => $expiresOn,
            'ip_address' => $license->ip_address,
        ]);
    }
    public function viewAdmins()
    {
        $user = auth()->user();

        if ($user && $user->email === 'bitthork165@gmail.com') {
        return view('admin.viewadmin');
    }
    // If not admin, redirect or abort
    return redirect('/')->with('error', 'Access denied.');
    }
    public function viewClients()
    {
        $data = User::orderBy('id', 'asc')->get();
        if($data){
            return view('admin.viewuser',compact('data'));
        }
        return redirect()->back()->with('message', 'No users found.');
    }
    public function generateKey()
    {
        return view('admin.generateKey');
    }
    public function editUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate name, email, and password (optional)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed', // optional, must match confirmation
        ]);
        // Update basic info
        $user->name = $request->name;
        $user->email = $request->email;
        // Update password only if provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->back()->with('success', 'User updated successfully.');
    }
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        if ($user->email === 'bitthork165@gmail.com') {
            return redirect()->back()->with('error', 'Cannot delete admin.');
        }

        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
    public function KeyMethod(){
        return view('admin.licenseMethod');
    }
}
