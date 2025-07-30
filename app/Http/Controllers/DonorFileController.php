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

        $donor = Donor::where('profile_img', 'like', "%$path%")
            ->orwhere('nrc_front', 'like', "%$path%")
            ->orWhere('nrc_back', 'like', "%$path%")
            ->orWhere('health_certificate', 'like', "%$path%")
            ->firstOrFail();

        if ($user->role !== 'blood_bank_admin') {
            abort(403, 'Unauthorized');
        }

        if (!Storage::disk('local')->exists($path)) {
            abort(404, 'File not found.');
        }

        $file = Storage::disk('local')->get($path);

        $mimeType = Storage::disk('local')->mimeType($path);

        return response($file, 200)->header('Content-Type', $mimeType);
    }
}