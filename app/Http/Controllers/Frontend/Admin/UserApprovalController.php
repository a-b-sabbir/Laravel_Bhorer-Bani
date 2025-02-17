<?php

namespace App\Http\Controllers\Frontend\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserApprovalController extends Controller
{
    public function index()
        {
            $users = User::where('approval', 'Pending')->get(); 
            return view('admin.users.index', compact('users'));
        }
    
        public function update(Request $request, User $user)
            {
                if (Auth::user()->role_id !== 1) { // শুধুমাত্র এডমিন অনুমোদন দিতে পারবে
                    return redirect()->back()->with('error', 'You are not authorized to update approval status.');
                }

                $request->validate([
                    'approval' => 'required|in:Pending,Accepted,Rejected',
                    'employee_id' => 'nullable|string|max:50',
                    'role_id' => 'nullable|integer',
                ]);

                $user->update([
                    'approval' => $request->approval,
                    'employee_id' => $request->approval === 'Accepted' ? $request->employee_id : null,
                    'role_id' => $request->approval === 'Accepted' ? $request->role_id : null,
                ]);

                return redirect()->back()->with('success', 'Approval status updated successfully.');
            }
}
