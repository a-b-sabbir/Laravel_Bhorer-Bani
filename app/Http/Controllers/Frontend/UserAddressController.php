<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAddressController extends Controller
{
    /**
     * Display a listing of user addresses.
     */
    public function index()
    {
        $addresses = UserAddress::latest()->paginate(10);
        return view('frontend.users_address.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new user address.
     */
    public function create()
    {
        $users = User::all();
        return view('frontend.users_address.create', compact('users'));
    }

    /**
     * Store a newly created user address in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'permanent_district' => 'required|string|max:255',
            'permanent_sub_district' => 'required|string|max:255',
            'permanent_municipality' => 'required|string|max:255',
            'permanent_ward' => 'required|string|max:50',
            'permanent_post_code' => 'required|string|max:20',
            'permanent_village_locality' => 'required|string|max:255',
            'permanent_house_road_number' => 'required|string|max:255',

            'current_district' => 'required|string|max:255',
            'current_sub_district' => 'required|string|max:255',
            'current_municipality' => 'required|string|max:255',
            'current_ward' => 'required|string|max:50',
            'current_post_code' => 'required|string|max:20',
            'current_village_locality' => 'required|string|max:255',
            'current_house_road_number' => 'required|string|max:255',
        ]);

        UserAddress::create($request->all());

        return redirect()->route('users-address.index')->with('success', 'User address created successfully.');
    }

    /**
     * Display the specified user address.
     */
    public function show(UserAddress $users_address)
    {
        return view('frontend.users_address.show', compact('users_address'));
    }

    /**
     * Show the form for editing the specified user address.
     */
    public function edit(UserAddress $users_address)
    {
        $users = User::all();
        return view('frontend.users_address.edit', compact('users_address', 'users'));
    }

    /**
     * Update the specified user address in storage.
     */
    public function update(Request $request, UserAddress $users_address)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'permanent_district' => 'required|string|max:255',
            'permanent_sub_district' => 'required|string|max:255',
            'permanent_municipality' => 'required|string|max:255',
            'permanent_ward' => 'required|string|max:50',
            'permanent_post_code' => 'required|string|max:20',
            'permanent_village_locality' => 'required|string|max:255',
            'permanent_house_road_number' => 'required|string|max:255',

            'current_district' => 'required|string|max:255',
            'current_sub_district' => 'required|string|max:255',
            'current_municipality' => 'required|string|max:255',
            'current_ward' => 'required|string|max:50',
            'current_post_code' => 'required|string|max:20',
            'current_village_locality' => 'required|string|max:255',
            'current_house_road_number' => 'required|string|max:255',
        ]);

        $users_address->update($request->all());

        return redirect()->route('users-address.index')->with('success', 'User address updated successfully.');
    }

    /**
     * Remove the specified user address from storage.
     */
    public function destroy(UserAddress $users_address)
    {
        $users_address->delete();
        return redirect()->route('users-address.index')->with('success', 'User address deleted successfully.');
    }
}