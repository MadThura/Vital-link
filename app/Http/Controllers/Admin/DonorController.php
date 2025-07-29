<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use Illuminate\Http\Request;

class DonorController extends Controller
{

    public function index(Request $request)
    {
        $donors = Donor::with('user')->filter($request->only(['search', 'status']))->latest()->paginate(10);

        return view('admin.donors.donor-show', [
            'donors' => $donors
        ]);
    }

    public function approve(Donor $donor)
    {

        $donor->status = 'approved';
        $donor->save();

        return back()->with('success', 'Donor approved successfully.');
    }

    public function reject(Donor $donor)
    {

        $donor->status = 'rejected';
        $donor->save();

        return back()->with('success', 'Donor rejected successfully.');
    }

    public function suspend(Donor $donor)
    {

        $donor->status = 'suspended';
        $donor->save();

        return back()->with('success', 'Donor suspended successfully.');
    }

    public function activate(Donor $donor)
    {

        $donor->status = 'activated';
        $donor->save();

        return back()->with('success', 'Donor activated successfully.');
    }


    public function destroy(Donor $donor)
    {

        $donor->delete();

        return back()->with('success', 'Donor deleted successfully.');
    }
}
