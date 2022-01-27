<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farmer;

class FarmersController extends Controller
{
    //
    public function addFarmer(Request $request){
        $this->validate($request, array(
        ));
        $farmer = new Farmer;
        $farmer->first_name = $request->first_name;
        $farmer->last_name = $request->last_name;
        $farmer->baranggay = $request->baranggay;
        $farmer->source = $request->source;
        $farmer->parcel_no = $request->parcel_no;
        $farmer->planted_area = $request->planted_area;
        $farmer->commodity = $request->commodity;
        $farmer->status = $request->status;
        $farmer->date_planted = $request->date_planted;
        $farmer->development_stage = $request->development_stage;
        $farmer->save();

        return redirect()->back()->with('success','Farmer Added.'); 
    }

    public function editFarmer(Request $request, $farmer_id){
        $this->validate($request, array(
        ));
        $farmer = Farmer::find($farmer_id);
        $farmer->first_name = $request->first_name;
        $farmer->last_name = $request->last_name;
        $farmer->baranggay = $request->baranggay;
        $farmer->source = $request->source;
        $farmer->parcel_no = $request->parcel_no;
        $farmer->planted_area = $request->planted_area;
        $farmer->commodity = $request->commodity;
        $farmer->status = $request->status;
        $farmer->date_planted = $request->date_planted;
        $farmer->development_stage = $request->development_stage;
        $farmer->save();
        return redirect()->back()->with('success','Farmer Updated.'); 
    }

    public function deleteFarmer(Request $request, $farmer_id){
        $farmer = Farmer::find($farmer_id);
        $farmer->delete();
        return redirect()->back()->with('success','Farmer Deleted.'); 
    }
}
