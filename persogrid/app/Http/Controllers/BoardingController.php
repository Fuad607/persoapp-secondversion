<?php

namespace App\Http\Controllers;

use App\Role;
use App\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Applicant;
use App\Business;

class BoardingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function viewBoarding()
    {
        return view('boarding');
    }

    public function initializeBusiness(Request $request)
    {
        $this->createOffer($request);
        $this->saveBusiness($request);

        return view('dashboard/dashboard');

    }


    public function createOffer(Request $request)
    {
        if($request->jobtitelO != ""){
        $currentUserId = Auth::user()->getAuthIdentifier();

        $offer = new Offer();
        $offer->jobtitel = $request->jobtitelO;
        $offer->location = $request->locationO;
        $offer->creatorID = $currentUserId;
        $offer->date = $request->dateO;
        $offer->workload = $request->workloadO;
        $offer->branche = $request->brancheO;
        $offer->experience = $request->experienceO;
        $offer->education = $request->educationO;
        $offer->degree = $request->degreeO;
        $offer->softskills = $request->softskillsO;
        $offer->socialskills = $request->socialskillsO;
        $offer->extra = $request->extraO;

        $offer->save();
        }
    }

    public function saveBusiness(Request $request){

        $currentUserId = Auth::user()->getAuthIdentifier();

        $businessProfile = Business::where('uID', $currentUserId)->first();
        $update = [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'businessName' => $request->businessName,
            'size' => $request->size,
            'website' => $request->website,
            'facebook' => $request->facebook,
            'car' => $request->carB,
            'event' => $request->eventB,
            'flat' => $request->flatB,
            'travel' => $request->travelB,
            'fitness' => $request->fitnessB,
            'kindergarden' => $request->kindergardenB,
            'description' => $request->descriptionB
        ];

        $businessProfile->update($update);
    }

    public function saveApplicant(Request $request)
    {
        $currentUserId = Auth::user()->getAuthIdentifier();

        $applicant = new Applicant();
        $applicant->uID = $currentUserId;
        $applicant->birthdate = $request->birthdate;
        $applicant->jobtitel = $request->jobtitel;
        $applicant->location = $request->location;
        $applicant->save();


//       Auth::user()->roles()->detach(Role::where('name', 'applicantBlank')->first());
//       Auth::user()->roles()->attach(Role::where('name', 'applicant')->first());

        return view('dashboard/dashboard');
    }
}
