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

        // First, find the donor that owns this file
        $donor = Donor::where('profile_img', $path)
            ->orWhere('nrc_front', $path)
            ->orWhere('nrc_back', $path)
            ->orWhere('health_certificate', $path)
            ->firstOrFail();

        // Permission check first
        if (!($user->role === 'blood_bank_admin' || $user->id === $donor->user_id)) {
            abort(403, 'Unauthorized');
        }

        // Then check file exists in private storage
        if (!Storage::disk('local')->exists($path)) {
            abort(404, 'File not found.');
        }

        // Return file content with correct mime type
        $file = Storage::disk('local')->get($path);
        $mimeType = Storage::disk('local')->mimeType($path);

        return response($file, 200)->header('Content-Type', $mimeType);
    }
}
