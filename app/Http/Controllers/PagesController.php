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
            $farmer_entries = Farmer::where('development_stage', '=', '2')
                                ->orWhere('development_stage', '=', '3')
                                ->orWhere('development_stage', '=', '4')
                                ->get();
        }
        elseif(request()->filter == 'no_crop'){
            $farmer_entries = Farmer::where('development_stage', '=', '0')->get();
        } 
        elseif(request()->filter == 'vegetative'){
            $farmer_entries = Farmer::where('development_stage', '=', '1')->get();
        }
        elseif(request()->filter == 'reproductive'){
            $farmer_entries = Farmer::where('development_stage', '=', '2')->get();
        }
        elseif(request()->filter == 'maturity'){
            $farmer_entries = Farmer::where('development_stage', '=', '3')->get();
        }
        elseif(request()->filter == 'harvested'){
            $farmer_entries = Farmer::where('development_stage', '=', '4')->get();
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
        $page->bulletin_advisory = $request->bulletin_advisory;
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

    public function updateBulletinData(Request $request){
        $this->validate($request, [
            'bulletin_file' => 'file|max:10240|mimes:pdf,csv,xlsx,xls'
        ]);
        $page = LandingPage::first();
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
        
        $page->forty_year_mean_1 = $request->forty_year_mean_1;
        $page->forty_year_mean_2 = $request->forty_year_mean_2;
        $page->forty_year_mean_3 = $request->forty_year_mean_3;
        $page->forty_year_mean_4 = $request->forty_year_mean_4;
        $page->forty_year_mean_5 = $request->forty_year_mean_5;
        $page->forty_year_mean_6 = $request->forty_year_mean_6;
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
        $farm_1 = FarmStat::find(1);
        $farm_1->quick_farm_stats_date = $request->quick_farm_stats_date_1;
        $farm_1->planting_status_image_date	= $request->planting_status_image_date_1;
        $farm_1->number_of_farm_lots = $request->number_of_farm_lots_1;
        $farm_1->plots_harvested = $request->plots_harvested_1;
        $farm_1->plots_in_vegetative_state = $request->plots_in_vegetative_state_1;
        $farm_1->plots_in_reproductive_state = $request->plots_in_reproductive_state_1;
        if($request->hasFile('map_image_1')){
            if($farm_1->map_image != null){
                $image_path = public_path().'/storage/page_images/'.$farm_1->map_image;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('map_image_1');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $farm_1->map_image = $imageName;
        }
        $farm_1->map_link = $request->map_link_1;
        $farm_1->save();

        $farm_2 = FarmStat::find(2);
        $farm_1->quick_farm_stats_date = $request->quick_farm_stats_date_2;
        $farm_1->planting_status_image_date	= $request->planting_status_image_date_2;
        $farm_2->number_of_farm_lots = $request->number_of_farm_lots_2;
        $farm_2->plots_harvested = $request->plots_harvested_2;
        $farm_2->plots_in_vegetative_state = $request->plots_in_vegetative_state_2;
        $farm_2->plots_in_reproductive_state = $request->plots_in_reproductive_state_2;
        if($request->hasFile('map_image_2')){
            if($farm_2->map_image != null){
                $image_path = public_path().'/storage/page_images/'.$farm_2->map_image;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('map_image_2');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $farm_2->map_image = $imageName;
        }
        $farm_2->map_link = $request->map_link_2;
        $farm_2->save();
        return redirect('/?edit=1')->with('success', 'Farm Stats Updated');
    }

    public function editRainfallOutlook(Request $request){
        $page = LandingPage::first();
        $page->outlook_month = $request->date_1;
        $page->min_1 = $request->min_1;
        $page->min_2 = $request->min_2;
        $page->min_3 = $request->min_3;
        $page->min_4 = $request->min_4;
        $page->min_5 = $request->min_5;
        $page->min_6 = $request->min_6;
        $page->max_1 = $request->max_1;
        $page->max_2 = $request->max_2;
        $page->max_3 = $request->max_3;
        $page->max_4 = $request->max_4;
        $page->max_5 = $request->max_5;
        $page->max_6 = $request->max_6;
        $page->mean_1 = $request->mean_1;
        $page->mean_2 = $request->mean_2;
        $page->mean_3 = $request->mean_3;
        $page->mean_4 = $request->mean_4;
        $page->mean_5 = $request->mean_5;
        $page->mean_6 = $request->mean_6;
        if($request->hasFile('rainfall_outlook_source')){
            if($page->rainfall_outlook_source){
                $file_path = public_path().'/storage/files/'.$page->rainfall_outlook_source;
                if(file_exists($file_path)){
                    unlink($file_path);
                }
            }
            $pdfFile = $request->file('rainfall_outlook_source');
            $pdfName = uniqid().$pdfFile->getClientOriginalName();
            $pdfFile->move(public_path('/storage/files/'), $pdfName);
            $page->rainfall_outlook_source = $pdfName;
        }
        $page->save();
        return redirect()->back()->with('success','Rainfall Outlook Updated.'); 
    }

    public function updateMobileDownloadSection(Request $request){
        $page = LandingPage::first();
        $page->mobile_download_title = $request->mobile_download_title;
        $page->mobile_download_subtitle = $request->mobile_download_subtitle;
        $page->mobile_download_note = $request->mobile_download_note;
        if($request->hasFile('mobile_download_image')){
            if($page->mobile_download_image != null){
                $image_path = public_path().'/storage/page_images/'.$page->mobile_download_image;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('mobile_download_image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $page->mobile_download_image = $imageName;
        }
        $page->mobile_download_link = $request->mobile_download_link;

        $page->save();
        return redirect('/?edit=1')->with('success', 'Mobile App Section Updated');
    }
}
