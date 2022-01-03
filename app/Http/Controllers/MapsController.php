<?php

namespace App\Http\Controllers;
use App\Models\Map;

use Illuminate\Http\Request;

class MapsController extends Controller
{
    public function addMap(Request $request){
        $this->validate($request, array(
            'title' => 'required|max:100',
            'image' => 'max:200000',
        ));
        $user = auth()->user();
        $map = new Map;
        $map->title = $request->title;
        $map->description = $request->description;
        $map->link = $request->link;
        if($request->hasFile('image')){
            if($map->thumbnail != null){
                $image_path = public_path().'/storage/page_images/'.$map->thumbnail;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $map->thumbnail = $imageName;
        }
        $map->save();

        return redirect()->back()->with('success','Maps Added.'); 
    }
    
    public function editMap(Request $request, $map_id){
        $this->validate($request, array(
            'title' => 'required|max:100',
            'image' => 'max:200000',
        ));
        $user = auth()->user();
        $map = Map::find($map_id);
        $map->title = $request->title;
        $map->description = $request->description;
        $map->link = $request->link;
        if($request->hasFile('image')){
            if($map->thumbnail != null){
                $image_path = public_path().'/storage/page_images/'.$map->thumbnail;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $map->thumbnail = $imageName;
        }
        $map->save();

        return redirect()->back()->with('success','Maps Updated.'); 
    }

    public function deleteMap($map_id, Request $request){
        $map = Map::find($map_id);
        if($map->thumbnail != null){
            $image_path = public_path().'/storage/page_images/'.$map->thumbnail;
            if(file_exists($image_path)){
                    unlink($image_path);
                }
        }
        $map->delete();

        return redirect()->back()->with('success','Maps Deleted.'); 
    }
}
