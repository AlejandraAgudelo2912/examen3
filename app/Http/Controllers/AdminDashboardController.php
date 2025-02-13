<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\Video;

class AdminDashboardController extends Controller
{
    public function __invoke()
    {
        return view('admin.dashboard', [
            'totalCourses' => Course::count(),
            'totalVideos' => Video::count(),
            'totalUsers' => User::whereDoesntHave('roles', function ($query) {
                $query->where('name', 'admin');
            })->count(),
        ]);
    }
}
