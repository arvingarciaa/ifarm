<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FarmStat;

class FarmStatsController extends Controller
{
    //
    public function addFarmStat(Request $request){
        $user = auth()->user();
        $farm = new FarmStat;
        $farm->number_of_farm_lots = $request->number_of_farm_lots;
        $farm->plots_harvested = $request->plots_harvested;
        $farm->plots_in_vegetative_state = $request->plots_in_vegetative_state;
        $farm->plots_in_reproductive_state = $request->plots_in_reproductive_state;
        $farm->map_link = $request->map_link;
        if($request->hasFile('image')){
            if($farm->thumbnail != null){
                $image_path = public_path().'/storage/page_images/'.$farm->map_image;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $farm->map_image = $imageName;
        }
        $farm->save();

        return redirect()->back()->with('success','Farm Stat Added.'); 
    }
    
    public function editFarmStat(Request $request){
        dd($request->toArray());
        $user = auth()->user();
        $farm = FarmStat::find($request->location);
        $farm->number_of_farm_lots = $request->number_of_farm_lots;
        $farm->plots_harvested = $request->plots_harvested;
        $farm->plots_in_vegetative_state = $request->plots_in_vegetative_state;
        $farm->plots_in_reproductive_state = $request->plots_in_reproductive_state;
        $farm->map_link = $request->map_link;
        if($request->hasFile('image')){
            if($farm->thumbnail != null){
                $image_path = public_path().'/storage/page_images/'.$farm->map_image;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $farm->map_image = $imageName;
        }
        $farm->save();

        return redirect()->back()->with('success','Farm Stat Updated.'); 
    }
}
