<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VegetationMap;

class VegetationMapsController extends Controller
{
    //
    public function addVegetationMap(Request $request){
        $this->validate($request, array(
            'title' => 'required|max:100',
            'image' => 'max:200000',
        ));
        $user = auth()->user();
        $vegetationMap = new VegetationMap;
        $vegetationMap->title = $request->title;
        $vegetationMap->description = $request->description;
        $vegetationMap->province = $request->province;
        $vegetationMap->municipality = $request->municipality;
        $vegetationMap->date = $request->date;
        if($request->hasFile('image')){
            if($vegetationMap->thumbnail != null){
                $image_path = public_path().'/storage/page_images/'.$vegetationMap->thumbnail;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $vegetationMap->thumbnail = $imageName;
        }
        $vegetationMap->save();

        return redirect()->back()->with('success','Vegetation Map Added.'); 
    }
    
    public function editVegetationMap(Request $request, $vegetationMap_id){
        $this->validate($request, array(
            'title' => 'required|max:100',
            'image' => 'max:200000',
        ));
        $user = auth()->user();
        $vegetationMap = VegetationMap::find($vegetationMap_id);
        $vegetationMap->title = $request->title;
        $vegetationMap->description = $request->description;
        $vegetationMap->province = $request->province;
        $vegetationMap->municipality = $request->municipality;
        $vegetationMap->date = $request->date;
        if($request->hasFile('image')){
            if($vegetationMap->thumbnail != null){
                $image_path = public_path().'/storage/page_images/'.$vegetationMap->thumbnail;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $vegetationMap->thumbnail = $imageName;
        }
        $vegetationMap->save();

        return redirect()->back()->with('success','Vegetation Map Updated.'); 
    }

    public function deleteVegetationMap($vegetationMap_id, Request $request){
        $vegetationMap = VegetationMap::find($vegetationMap_id);
        if($vegetationMap->thumbnail != null){
            $image_path = public_path().'/storage/page_images/'.$vegetationMap->thumbnail;
            if(file_exists($image_path)){
                    unlink($image_path);
                }
        }
        $vegetationMap->delete();

        return redirect()->back()->with('success','Vegetation Map Deleted.'); 
    }
}
