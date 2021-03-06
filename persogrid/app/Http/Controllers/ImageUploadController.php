<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function imageUpload(){
        return view('imageUpload');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function imageUploadPost(){
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

//        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        $imageName = request()->type.request()->businessID;

        request()->image->move(public_path('imgupload'), $imageName);


        return back()->with('success','You have successfully upload image.')->with('image',$imageName);

    }
}
