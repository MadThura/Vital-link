<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DonorFileController extends Controller
{
    public function show($path)
    {
        $user = Auth::user();

        $donor = Donor::where('nrc_front', 'like', "%$path%")
            ->orWhere('nrc_back', 'like', "%$path%")
            ->orWhere('health_certificate', 'like', "%$path%")
            ->firstOrFail();

        if ($user->role !== 'blood_bank_admin' || $donor->user_id !== $user->id) {
            abort(403, 'Unauthorized');
        }

        if (!Storage::disk('local')->exists($path)) {
            abort(404, 'File not found.');
        }

        return response()->file(storage_path("app/" . $path));
    }
}
