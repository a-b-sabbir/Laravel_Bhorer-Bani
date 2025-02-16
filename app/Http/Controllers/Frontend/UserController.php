<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|email|unique:users,email',
            'bangla_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:20',
            'whatsapp_number' => 'nullable|string|max:20',
            'dob' => 'required|date',
            'education_qualifications' => 'required|string',
            'national_id' => 'required|string|max:50',
            'interested_position' => 'required|string|max:255',
            'responsible_place_name' => 'required|string|max:255',
            'accept_terms_conditions' => 'required|boolean',
            'password' => 'required|min:8|confirmed',
        ]);

        // Image Upload
        $imagePath = $request->file('image')->store('users', 'public');

        // Create User
        User::create([
            'image' => $imagePath,
            'email' => $request->email,
            'bangla_name' => $request->bangla_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'mobile_number' => $request->mobile_number,
            'whatsapp_number' => $request->whatsapp_number,
            'dob' => $request->dob,
            'education_qualifications' => $request->education_qualifications,
            'national_id' => $request->national_id,
            'interested_position' => $request->interested_position,
            'responsible_place_name' => $request->responsible_place_name,
            'accept_terms_conditions' => $request->accept_terms_conditions,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified user.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'bangla_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:20',
            'whatsapp_number' => 'nullable|string|max:20',
            'dob' => 'required|date',
            'education_qualifications' => 'required|string',
            'national_id' => 'required|string|max:50',
            'interested_position' => 'required|string|max:255',
            'responsible_place_name' => 'required|string|max:255',
            'accept_terms_conditions' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            Storage::delete('public/' . $user->image);
            $imagePath = $request->file('image')->store('users', 'public');
            $user->image = $imagePath;
        }

        $user->update($request->except(['password']));

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        Storage::delete('public/' . $user->image);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
