<?php

namespace App\Http\Controllers\dashboard;

use App\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Offer;
use App\Http\Controllers\Controller;

class OfferController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function viewDetail(Request $request){
        $offer = Offer::where('id', $request->offerID)->first();

        $bID = Business::where('uID' , $offer->creatorID)->pluck('id');

        return view('dashboard/offerDetail', ['offer' => $offer, 'bID' => $bID[0]]);

    }

    public function deleteOffer(Request $request){
        Offer::where('id', $request->id)->delete();
        return $this->viewOwnOffers();
    }

    public function editOffer(Request $request){
        $offer = Offer::where('id', $request->id)->first();
        $update = [
          'jobtitel' => $request->jobtitel,
            'location' => $request->location,
            'date' => $request->date,
            'workload' => $request->workload,
            'branche' => $request->branche,
            'experience' => $request->experience,
            'education' => $request->education,
            'degree' => $request->degree,
            'softskills' => $request->softskills,
            'socialskills' => $request->socialskills
        ];


        $offer->update($update);
        $bID = Business::where('uID' , $offer->creatorID)->pluck('id');

        return view('dashboard/offerDetail', ['offer' => $offer, 'bID' => $bID[0]]);
    }

    public function createOffer(Request $request){
        $currentUserId = Auth::user()->getAuthIdentifier();

        $offer = new Offer();
        $offer->jobtitel = $request->jobtitelB;
        $offer->location = $request->locationB;
        $offer->creatorID = $currentUserId;
        $offer->date = $request->dateB;
        $offer->workload = $request->workloadB;
        $offer->branche = $request->brancheB;
        $offer->experience = $request->experienceB;
        $offer->education = $request->educationB;
        $offer->degree = $request->degreeB;
        $offer->softskills = $request->softskillsB;
        $offer->socialskills = $request->socialskillsB;
        $offer->extra = $request->extraB;
        $offer->save();

        return $this->viewOwnOffers();
    }

    public function viewOwnOffers(){
        $currentUserId = Auth::user()->getAuthIdentifier();
        $offers = Offer::where('creatorID', $currentUserId)->get();

        $businessInfo = Business::where('uID', $currentUserId)->first();

        return view('dashboard/offer', ['offers' => $offers, 'bInfo' => $businessInfo]);
    }

}