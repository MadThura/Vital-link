<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $numOfBBA = User::whereRole('blood_bank_admin')->count();
        $numOfWO = User::whereRole('ward_operator')->count();
        $numOfBlogs = Blog::all()->count();

        return view('superAdmin.dashboard', [
            'numOfBBA' => $numOfBBA,
            'numOfWO' => $numOfWO,
            'numOfBlogs' => $numOfBlogs,
        ]);
    }
}
