<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FarmStat;

class FarmStatsController extends Controller
{
    /*
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
        $user = auth()->user();
        $farm = FarmStat::find($request->location);
        $farm->outlook_month = $request->outlook_month;
        $farm->min_1 = $request->min_1;
        $farm->min_2 = $request->min_2;
        $farm->min_3 = $request->min_3;
        $farm->min_4 = $request->min_4;
        $farm->min_5 = $request->min_5;
        $farm->min_6 = $request->min_6;
        $farm->max_1 = $request->max_1;
        $farm->max_2 = $request->max_2;
        $farm->max_3 = $request->max_3;
        $farm->max_4 = $request->max_4;
        $farm->max_5 = $request->max_5;
        $farm->max_6 = $request->max_6;
        $farm->mean_1 = $request->mean_1;
        $farm->mean_2 = $request->mean_2;
        $farm->mean_3 = $request->mean_3;
        $farm->mean_4 = $request->mean_4;
        $farm->mean_5 = $request->mean_5;
        $farm->mean_6 = $request->mean_6;
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
    */
}
