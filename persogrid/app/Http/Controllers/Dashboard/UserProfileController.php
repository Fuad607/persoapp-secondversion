<?php

namespace App\Http\Controllers\Dashboard;

use App\Applicant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }


    public function showProfile(Request $request){

        $profile = DB::table('users')
            ->where('users.id', $request->userID)
            ->join('applicants', 'applicants.uID', '=', 'users.id')
            ->select('applicants.*', 'users.firstname', 'users.lastname')->get();
        return view('dashboard/userprofile', ['profile' => $profile]);
    }


    public function showMyProfile(){
        $currentUserId = Auth::user()->getAuthIdentifier();
        $profile = DB::table('users')
            ->where('users.id', $currentUserId)
            ->join('applicants', 'applicants.uID', '=', 'users.id')
            ->select('applicants.*', 'users.firstname', 'users.lastname')->get();

        return view('dashboard/userprofile', ['profile' => $profile]);
    }
}