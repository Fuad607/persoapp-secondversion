<?php

namespace App\Http\Controllers\dashboard;

use App\Applicant;
use App\Offer;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MatchesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function viewMyMatches(){
        $currentUserId = Auth::user()->getAuthIdentifier();


        $matches = DB::table('applicants')
            ->where('applicants.uID', $currentUserId)
            ->join('offers', function($join){
                $join->on('offers.location', '=', 'applicants.location')
                    ->on('offers.jobtitel', '=','applicants.jobtitel');})

            ->select('offers.*')->orderBy('offers.id')
            ->get();
        return view('dashboard/matches', ['matches' => $matches]);

    }

    public function viewAllMatchesBusiness(){
        $currentUserId = Auth::user()->getAuthIdentifier();


        $matches = DB::table('offers')
            ->where('offers.creatorID', $currentUserId)
            ->join('applicants', function($join){
                $join->on('offers.location', '=', 'applicants.location')
                    ->on('offers.jobtitel', '=','applicants.jobtitel');})
            ->join('users', 'applicants.uID' , '=', 'users.id')
            ->select('applicants.*', 'users.firstname', 'users.lastname', 'users.id')->orderBy('offers.id')
            ->get();

//        foreach($matches as $match){
//            $match->firstname = User::where('id', $match->uID)->first()->select('firstname');
//            $match->lastname = User::where('id', $match->uID)->first()->select('lastname');
//        }

        return view('dashboard/matches', ['matches' => $matches]);


    }
}
