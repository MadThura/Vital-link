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

<<<<<<< HEAD
        $donor = Donor::where('nrc_front', 'like', "%$path%")
=======
        $donor = Donor::where('profile_img', 'like', "%$path%")
            ->orwhere('nrc_front', 'like', "%$path%")
>>>>>>> fb6e7b4d91676f400e0d4390e9af14f83f4ef560
            ->orWhere('nrc_back', 'like', "%$path%")
            ->orWhere('health_certificate', 'like', "%$path%")
            ->firstOrFail();

<<<<<<< HEAD
        if ($user->role !== 'blood_bank_admin' || $donor->user_id !== $user->id) {
=======
        if ($user->role !== 'blood_bank_admin') {
>>>>>>> fb6e7b4d91676f400e0d4390e9af14f83f4ef560
            abort(403, 'Unauthorized');
        }

        if (!Storage::disk('local')->exists($path)) {
            abort(404, 'File not found.');
        }

<<<<<<< HEAD
        return response()->file(storage_path("app/" . $path));
    }
}
=======
        $file = Storage::disk('local')->get($path);

        $mimeType = Storage::disk('local')->mimeType($path);

        return response($file, 200)->header('Content-Type', $mimeType);
    }
}
>>>>>>> fb6e7b4d91676f400e0d4390e9af14f83f4ef560
