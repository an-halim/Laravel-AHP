<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::paginate(5);
        return view('dashboard.user.user', ['users' => $user]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email', // Ensure unique email
            'role' => 'required',
            'password' => 'required|min:6' // Ensure password is at least 6 characters
        ]);

        try {
            User::create([
                'name' => $request->name,
                'role' => $request->role,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            // Flash success message
            return redirect()->back()->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            // Log the error and flash failure message
            \Log::error("User creation failed: " . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create user. Please try again.');
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'nullable|min:6', // Make password optional
        ]);

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->password) {
            $user->password = Hash::make($request->password); // Only update password if provided
        }

        $user->save();

        // Redirect or return a response
        return redirect()->back()->with('success', 'User updated successfully');
    }

    public function delete($id)
    {
        // menghapus data users berdasarkan id yang dipilih
        try {
            User::destroy($id);
            return redirect()->back()->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            // Log the error and flash failure message
            \Log::error("User deletion failed: " . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete user. Please try again.');
        }
    }
}
