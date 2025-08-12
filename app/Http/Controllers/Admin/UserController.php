<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BloodBank;
use App\Models\Hospital;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {

        $user = User::where('id', '!=', auth()->user()->id)->latest()->paginate(10);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed'],
            'role' => ['required', 'in:ward_operator, blood_bank_admin'],
            'address' => ['required', 'text']
        ]);

        $user = User::create($validated);

        if ($user->role === 'blood_bank_admin') {
            BloodBank::create([
                'user_id' => $user->id,
                'name' => $user->name,
                'address' => $validated['address']
            ]);
        }

        if ($user->role === 'ward_operator') {
            Hospital::create([
                'user_id' => $user->id,
                'name' => $user->name,
                'address' => $validated['address']
            ]);
        }

        return back()->with('success', 'User ' . 'with role:' . $user->role . ' created.');
    }

    public function updateStatus(User $user, string $action)
    {
        switch ($action) {
            case 'active':
                $user->status = 'active';
                break;
            case 'suspend':
                $user->status = 'suspended';
                break;
            default:
                return back()->with('fail', 'Invalid action');
        }

        $user->save();

        return back()->with('success', 'User ' . $user->status . ' successfully.');
    }

    // public function destroy(User $user)
    // {

    //     $user->delete();
    // }
}
