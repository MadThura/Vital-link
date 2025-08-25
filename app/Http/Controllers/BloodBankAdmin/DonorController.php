<?php

namespace App\Http\Controllers\BloodBankAdmin;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use App\Notifications\NewDonorApproved;
use App\Notifications\NewDonorRejected;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class DonorController extends Controller
{

    public function index(Request $request)
    {
        $donors = Donor::with('user', 'bloodBank')->filter($request->only(['search', 'status']))->latest()->paginate(10);

        return view('bloodBankAdmin.donors.donor-show', [
            'donors' => $donors
        ]);
    }

    public function updateStatus(Request $request, Donor $donor, string $action)
    {
        DB::beginTransaction();

        try {
            switch ($action) {
                case 'approve':
                    $this->approveDonor($donor);
                    break;

                case 'reject':
                    $this->rejectDonor($request, $donor);
                    break;

                case 'suspend':
                    $donor->status = 'suspended';
                    break;

                default:
                    return back()->with('fail', 'Invalid action');
            }

            // Always assign blood bank from current user
            $donor->blood_bank_id = auth()->user()->bloodBank->id;
            $donor->save();

            DB::commit();

            return back()->with('success', "Donor {$donor->status} successfully.");
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('fail', 'Something went wrong: ' . $e->getMessage());
        }
    }

    /**
     * Approve donor.
     */
    private function approveDonor(Donor $donor): void
    {
        $donor->status = 'approved';

        $user = $donor->user;
        $user->role = 'donor';
        $user->save();

        $donor->donor_code = Donor::generateDonorCode();

        // clear rejection errors if any
        $donor->rejection_errors = null;

        $donor->save();

        Notification::send($donor->user, new NewDonorApproved($donor));
    }

    /**
     * Reject donor.
     */
    private function rejectDonor(Request $request, Donor $donor): void
    {
        $donor->status = 'rejected';

        $validated = $request->validate([
            'reasons'   => ['nullable', 'array'],
            'reasons.*' => ['string'],
        ]);

        $donor->rejection_errors = $validated['reasons'] ?? null;

        $donor->save();

        Notification::send($donor->user, new NewDonorRejected($donor));
    }


    public function destroy(Donor $donor)
    {

        $donor->delete();

        return back()->with('success', 'Donor deleted successfully.');
    }
}
