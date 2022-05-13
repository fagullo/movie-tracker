<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Repositories\User\IUserRepository;

class DashboardController extends Controller
{
    /**
     * Show the dashboard
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $userRepository = app()
            ->make(IUserRepository::class);

        $user = Auth::user();
        $views = $userRepository->getViewStats($user->id);
        $likes = $userRepository->getLikeStats($user->id);

        return view('dashboard', compact('views', 'likes'));
    }
}