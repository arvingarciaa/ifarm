<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingPage;
use App\Models\FarmStat;
use App\Models\Farmer;
use App\Models\VegetationMap;

class PagesController extends Controller
{
    //
    public function getLandingPage(Request $request){
        if(request()->filter == 'at_risk'){
            $farmer_entries = Farmer::where('development_stage', '=', 'Vegetative')
                                ->orWhere('development_stage', '=', 'Reproductive')
                                ->orWhere('development_stage', '=', 'Maturity')
                                ->get();
        }
        elseif(request()->filter == 'no_crop'){
            $farmer_entries = Farmer::where('development_stage', '=', 'No Crop')->get();
        } 
        elseif(request()->filter == 'vegetative'){
            $farmer_entries = Farmer::where('development_stage', '=', 'Vegetative')->get();
        }
        elseif(request()->filter == 'reproductive'){
            $farmer_entries = Farmer::where('development_stage', '=', 'Reproductive')->get();
        }
        elseif(request()->filter == 'maturity'){
            $farmer_entries = Farmer::where('development_stage', '=', 'Maturity')->get();
        }
        elseif(request()->filter == 'harvested'){
            $farmer_entries = Farmer::where('development_stage', '=', 'Harvested')->get();
        }
        else {
            $farmer_entries = Farmer::all();
        }
        $vegetation_maps = VegetationMap::orderBy('date', 'desc')->paginate(3);
        return view('pages.index')
            ->withVegetationMaps($vegetation_maps)
            ->withFarmerEntries($farmer_entries);
    }

    public function updateTopBanner(Request $request){
        $this->validate($request, [
            'image' => 'required'
        ]);
        $page = LandingPage::first();
        if($request->hasFile('image')){
            if($page->top_banner != null){
                $image_path = public_path().'/storage/page_images/'.$page->top_banner;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
    		$imageFile->move(public_path('/storage/page_images/'), $imageName);
        }
        $page->top_banner = $imageName;
        $page->save();

        return redirect('/?edit=1')->with('success', 'Top Banner Updated');
    }

    public function updateWeatherSection(Request $request){
        $this->validate($request, [
            'weather_title' => 'required',
            'weather_subtitle' => 'required'
        ]);
        $page = LandingPage::first();
        if($request->weather_visibility == 'on'){
            $page->weather_visibility = 1;
        } else {
            $page->weather_visibility = 0;
        }
        $page->weather_title = $request->weather_title;
        $page->weather_subtitle = $request->weather_subtitle;
        $page->weather_position = $request->weather_position;
        if($request->weather_background_color_radio == 0){
            //delete previously saved background image if exists
            if($page->weather_background_type == 1){
                $image_path = public_path().'/storage/page_images/'.$page->weather_background;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            if($request->weather_section_background_color){
                $page->weather_background = $request->weather_section_background_color;
            } else {
                $page->weather_background = '#f8fafc';
            }
            $page->weather_background_type = 0;
        } else {
            if($request->hasFile('weather_section_background_image')){
                if($page->weather_background != null){
                    $image_path = public_path().'/storage/page_images/'.$page->weather_background;
                    if(file_exists($image_path)){
                        unlink($image_path);
                    }
                }
                $imageFile = $request->file('weather_section_background_image');
                $imageName = uniqid().$imageFile->getClientOriginalName();
                $imageFile->move(public_path('/storage/page_images/'), $imageName);
            }
            $page->weather_background = $imageName;
            $page->weather_background_type = 1;
        }

        $page->save();
        return redirect('/?edit=1')->with('success', 'Weather Section Updated');
    }

    public function updateBulletinSection(Request $request){
        $this->validate($request, [
            'bulletin_title' => 'required',
            'bulletin_subtitle' => 'required',
            'bulletin_file' => 'file|max:10240|mimes:pdf,csv,xlsx,xls'
        ]);
        $page = LandingPage::first();
        if($request->bulletin_visibility == 'on'){
            $page->bulletin_visibility = 1;
        } else {
            $page->bulletin_visibility = 0;
        }
        $page->bulletin_title = $request->bulletin_title;
        $page->bulletin_subtitle = $request->bulletin_subtitle;
        $page->bulletin_date = $request->bulletin_date;
        $page->bulletin_position = $request->bulletin_position;
        if($request->hasFile('bulletin_file')){
            if($page->bulletin_file){
                $file_path = public_path().'/storage/files/'.$page->bulletin_file;
                if(file_exists($file_path)){
                    unlink($file_path);
                }
            }
            $pdfFile = $request->file('bulletin_file');
            $pdfName = uniqid().$pdfFile->getClientOriginalName();
            $pdfFile->move(public_path('/storage/files/'), $pdfName);
            $page->bulletin_file = $pdfName;
        }
        if($request->bulletin_background_color_radio == 0){
            //delete previously saved background image if exists
            if($page->bulletin_background_type == 1){
                $image_path = public_path().'/storage/page_images/'.$page->bulletin_background;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            if($request->bulletin_section_background_color){
                $page->bulletin_background = $request->bulletin_section_background_color;
            } else {
                $page->bulletin_background = '#f8fafc';
            }
            $page->bulletin_background_type = 0;
        } else {
            if($request->hasFile('bulletin_section_background_image')){
                if($page->bulletin_background != null){
                    $image_path = public_path().'/storage/page_images/'.$page->bulletin_background;
                    if(file_exists($image_path)){
                        unlink($image_path);
                    }
                }
                $imageFile = $request->file('bulletin_section_background_image');
                $imageName = uniqid().$imageFile->getClientOriginalName();
                $imageFile->move(public_path('/storage/page_images/'), $imageName);
            }
            $page->bulletin_background = $imageName;
            $page->bulletin_background_type = 1;
        }

        $page->save();
        return redirect('/?edit=1')->with('success', 'Corn Bulletin Section Updated');
    }

    public function updateVegetationSection(Request $request){
        $this->validate($request, [
            'vegetation_title' => 'required',
            'vegetation_subtitle' => 'required',
        ]);
        $page = LandingPage::first();
        if($request->vegetation_visibility == 'on'){
            $page->vegetation_visibility = 1;
        } else {
            $page->vegetation_visibility = 0;
        }
        $page->vegetation_title = $request->vegetation_title;
        $page->vegetation_subtitle = $request->vegetation_subtitle;
        $page->vegetation_position = $request->vegetation_position;
        if($request->vegetation_background_color_radio == 0){
            //delete previously saved background image if exists
            if($page->vegetation_background_type == 1){
                $image_path = public_path().'/storage/page_images/'.$page->vegetation_background;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            if($request->vegetation_section_background_color){
                $page->vegetation_background = $request->vegetation_section_background_color;
            } else {
                $page->vegetation_background = '#f8fafc';
            }
            $page->vegetation_background_type = 0;
        } else {
            if($request->hasFile('vegetation_section_background_image')){
                if($page->vegetation_background != null){
                    $image_path = public_path().'/storage/page_images/'.$page->vegetation_background;
                    if(file_exists($image_path)){
                        unlink($image_path);
                    }
                }
                $imageFile = $request->file('vegetation_section_background_image');
                $imageName = uniqid().$imageFile->getClientOriginalName();
                $imageFile->move(public_path('/storage/page_images/'), $imageName);
            }
            $page->vegetation_background = $imageName;
            $page->vegetation_background_type = 1;
        }

        $page->save();
        return redirect('/?edit=1')->with('success', 'Vegetation Section Updated');
    }

    public function updatePlantingStatusSection(Request $request){
        $this->validate($request, [
            'planting_status_title' => 'required',
            'planting_status_subtitle' => 'required',
        ]);
        $page = LandingPage::first();
        if($request->planting_status_visibility == 'on'){
            $page->planting_status_visibility = 1;
        } else {
            $page->planting_status_visibility = 0;
        }
        $page->planting_status_title = $request->planting_status_title;
        $page->planting_status_subtitle = $request->planting_status_subtitle;
        $page->planting_status_map_title = $request->planting_status_map_title;
        $page->planting_status_map_subtitle = $request->planting_status_map_subtitle;
        $page->planting_status_map_link = $request->planting_status_map_link;
        $page->planting_status_position = $request->planting_status_position;
        if($request->planting_status_background_color_radio == 0){
            //delete previously saved background image if exists
            if($page->planting_status_background_type == 1){
                $image_path = public_path().'/storage/page_images/'.$page->planting_status_background;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            if($request->planting_status_section_background_color){
                $page->planting_status_background = $request->planting_status_section_background_color;
            } else {
                $page->planting_status_background = '#f8fafc';
            }
            $page->planting_status_background_type = 0;
        } else {
            if($request->hasFile('planting_status_section_background_image')){
                if($page->planting_status_background != null){
                    $image_path = public_path().'/storage/page_images/'.$page->planting_status_background;
                    if(file_exists($image_path)){
                        unlink($image_path);
                    }
                }
                $imageFile = $request->file('planting_status_section_background_image');
                $imageName = uniqid().$imageFile->getClientOriginalName();
                $imageFile->move(public_path('/storage/page_images/'), $imageName);
            }
            $page->planting_status_background = $imageName;
            $page->planting_status_background_type = 1;
        }

        if($request->hasFile('planting_status_map_image')){
            if($page->planting_status_map_image != null){
                $image_path = public_path().'/storage/page_images/'.$page->planting_status_map_image;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('planting_status_map_image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $page->planting_status_map_image = $imageName;
        }

        $page->save();
        return redirect('/?edit=1')->with('success', 'Planting Status Section Updated');
    }

    public function updateMapsSection(Request $request){
        $this->validate($request, [
            'maps_title' => 'required',
            'maps_subtitle' => 'required',
        ]);
        $page = LandingPage::first();
        if($request->maps_visibility == 'on'){
            $page->maps_visibility = 1;
        } else {
            $page->maps_visibility = 0;
        }
        $page->maps_title = $request->maps_title;
        $page->maps_subtitle = $request->maps_subtitle;
        $page->maps_position = $request->maps_position;
        if($request->maps_background_color_radio == 0){
            //delete previously saved background image if exists
            if($page->maps_background_type == 1){
                $image_path = public_path().'/storage/page_images/'.$page->maps_background;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            if($request->maps_section_background_color){
                $page->maps_background = $request->maps_section_background_color;
            } else {
                $page->maps_background = '#f8fafc';
            }
            $page->maps_background_type = 0;
        } else {
            if($request->hasFile('maps_section_background_image')){
                if($page->maps_background != null){
                    $image_path = public_path().'/storage/page_images/'.$page->maps_background;
                    if(file_exists($image_path)){
                        unlink($image_path);
                    }
                }
                $imageFile = $request->file('maps_section_background_image');
                $imageName = uniqid().$imageFile->getClientOriginalName();
                $imageFile->move(public_path('/storage/page_images/'), $imageName);
            }
            $page->maps_background = $imageName;
            $page->maps_background_type = 1;
        }

        $page->save();
        return redirect('/?edit=1')->with('success', 'Maps Section Updated');
    }

    public function updateNewsSection(Request $request){
        $this->validate($request, [
            'news_title' => 'required',
            'news_subtitle' => 'required',
        ]);
        $page = LandingPage::first();
        if($request->news_visibility == 'on'){
            $page->news_visibility = 1;
        } else {
            $page->news_visibility = 0;
        }
        $page->news_title = $request->news_title;
        $page->news_subtitle = $request->news_subtitle;
        $page->news_position = $request->news_position;
        if($request->news_background_color_radio == 0){
            //delete previously saved background image if exists
            if($page->news_background_type == 1){
                $image_path = public_path().'/storage/page_images/'.$page->news_background;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            if($request->news_section_background_color){
                $page->news_background = $request->news_section_background_color;
            } else {
                $page->news_background = '#f8fafc';
            }
            $page->news_background_type = 0;
        } else {
            if($request->hasFile('news_section_background_image')){
                if($page->news_background != null){
                    $image_path = public_path().'/storage/page_images/'.$page->news_background;
                    if(file_exists($image_path)){
                        unlink($image_path);
                    }
                }
                $imageFile = $request->file('news_section_background_image');
                $imageName = uniqid().$imageFile->getClientOriginalName();
                $imageFile->move(public_path('/storage/page_images/'), $imageName);
            }
            $page->news_background = $imageName;
            $page->news_background_type = 1;
        }
        $page->save();
        return redirect('/?edit=1')->with('success', 'News Section Updated');
    }

    public function editFarmerTableConfig(Request $request){
        $this->validate($request, array(
        ));
        $page = LandingPage::first();
        $page->first_name_access = $request->first_name_access;
        $page->last_name_access = $request->last_name_access;
        $page->barangay_access = $request->barangay_access;
        $page->municipality_access = $request->municipality_access;
        $page->rsbsa_no_access = $request->rsbsa_no_access;
        $page->gpx_id_access = $request->gpx_id_access;
        $page->parcel_name_access = $request->parcel_name_access;
        $page->planted_area_access = $request->planted_area_access;
        $page->commodity_access = $request->commodity_access;
        $page->date_planted_access = $request->date_planted_access;
        $page->development_stage_access = $request->development_stage_access;
        $page->save();
        return redirect()->back()->with('success','Farmer Table Config Updated.'); 
    }

    public function updateFarmStats(Request $request){
        if(!$request->farm_stats_location_selector){
            return redirect('/?edit=1')->with('error', 'No Location Selected');
        }
        $farm = FarmStat::find($request->farm_stats_location_selector);
        $farm->number_of_farm_lots = $request->number_of_farm_lots;
        $farm->plots_harvested = $request->plots_harvested;
        $farm->plots_in_vegetative_state = $request->plots_in_vegetative_state;
        $farm->plots_in_reproductive_state = $request->plots_in_reproductive_state;
        if($request->hasFile('map_image')){
            if($farm->map_image != null){
                $image_path = public_path().'/storage/page_images/'.$farm->map_image;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('map_image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $farm->map_image = $imageName;
        }
        $farm->map_link = $request->map_link;

        $farm->save();
        return redirect('/?edit=1')->with('success', 'Maps Section Updated');
    }
}
