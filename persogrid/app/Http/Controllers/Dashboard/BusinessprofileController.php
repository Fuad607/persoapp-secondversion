<?php

namespace App\Http\Controllers\dashboard;

use App\Business;
use Illuminate\Bus\BusServiceProvider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BusinessprofileController extends Controller
{
    //

    private $currentUserId;


    public function __construct()
    {
        $this->middleware('auth');


    }

    public function viewProfile(){
        $this->currentUserId = Auth::user()->getAuthIdentifier();
        $businessProfile = Business::where('uid', $this->currentUserId)->get();
        return view('dashboard/businessprofile', ['bps' => $businessProfile]);
    }

    public function editProfile(Request $request){
        $this->currentUserId = Auth::user()->getAuthIdentifier();

        $businessProfile = Business::where('uID', $this->currentUserId)->first();
        $update = [
            'name' => $request->name,
            'location' => $request->location,
            'plz' => $request->plz,
            'website' => $request->website,
            'email' => $request->email,
            'telnr' => $request->telnr,
            'street' => $request->street,
            'size' => $request->size,
            'foundyear' => $request->foundyear,
            'businessName' => $request->businessName,
        ];

        $businessProfile->update($update);


        return $this->viewProfile();
        }


}
