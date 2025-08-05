<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use Illuminate\Http\Request;

class DonorController extends Controller
{

    public function index(Request $request)
    {
        $donors = Donor::with('user', 'bloodBank')->filter($request->only(['search', 'status']))->latest()->paginate(10);

        return view('admin.donors.donor-show', [
            'donors' => $donors
        ]);
    }

    public function updateStatus(Request $request, Donor $donor, string $action)
    {
        switch ($action) {
            case 'approve':
                $donor->status = 'approved';
                $user = $donor->user;
                $user->role = 'donor';
                $user->update();
                break;
            case 'reject':
                $donor->status = 'rejected';
                $validated = $request->validate([
                    'reasons' => ['required', 'array'],
                    'reasons.*' => ['string'],
                ]);
                $donor->rejection_reasons = $validated['reasons'];
                break;
            case 'suspend':
                $donor->status = 'suspended';
                break;
            default:
                return back()->with('fail', 'Invalid action');
        }

        $donor->blood_bank_id = auth()->user()->bloodBank->id;
        $donor->save();

        return back()->with('success', 'Donor ' . $donor->status . ' successfully.');
    }

    public function destroy(Donor $donor)
    {

        $donor->delete();

        return back()->with('success', 'Donor deleted successfully.');
    }

    

}
