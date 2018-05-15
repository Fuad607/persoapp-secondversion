<?php
/**
 * Created by PhpStorm.
 * User: Philipp
 * Date: 11.04.2018
 * Time: 13:59
 */

namespace App\Http\Controllers\Dashboard;

use App\Business;
use App\Http\Controllers\Controller;
use App\MatchingQuestion;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public static function initDashboard(){
        if(Auth::user()->hasRole('applicant')){
            $question = MatchingQuestion::where('userType', 'applicant')->inRandomOrder()->first();
//            $question = MatchingQuestion::where('id' , rand(1,MatchingQuestion::count('id'))->where('userType', 'applicant'))->first();
            echo $question->question;
        }
        if(Auth::user()->hasRole('business')){
            $question = MatchingQuestion::where('userType', 'business')->inRandomOrder()->first();
//            $question = MatchingQuestion::where('id' , rand(1,MatchingQuestion::count('id'))->where('userType', 'business'))->first();
            echo $question->question;
        }

    }

    public function getBusinessName(){
        $currentUserId = Auth::user()->getAuthIdentifier();
        $bName = Business::where('uID' , $currentUserId)->get()->select('businessName');

        return $bName;
    }

    public function viewDashboard(){
        $question = MatchingQuestion::where('id' , rand(0,MatchingQuestion::count('id')))->first();
        return view('dashboard/dashboard', ['question' => $question]);
    }

}