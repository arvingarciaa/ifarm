<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farmer;
use App\Models\AtRiskPlot;
use App\Imports\FarmerNDVIImport;
use Maatwebsite\Excel\Facades\Excel;

class FarmersController extends Controller
{
    //
    public function addFarmer(Request $request){
        $this->validate($request, array(
        ));
        $farmer = new Farmer;
        $farmer->first_name = $request->first_name;
        $farmer->last_name = $request->last_name;
        $farmer->ext_name = $request->ext_name;
        $farmer->barangay = $request->barangay;
        $farmer->municipality = $request->municipality;
        $farmer->rsbsa_no = $request->rsbsa_no;
        $farmer->gpx_id = $request->gpx_id;
        $farmer->parcel_name = $request->parcel_name;
        $farmer->parcel_area = $request->parcel_area;
        $farmer->planted_area = $request->planted_area;
        $farmer->commodity = $request->commodity;
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
        $farmer->ext_name = $request->ext_name;
        $farmer->barangay = $request->barangay;
        $farmer->municipality = $request->municipality;
        $farmer->rsbsa_no = $request->rsbsa_no;
        $farmer->gpx_id = $request->gpx_id;
        $farmer->parcel_name = $request->parcel_name;
        $farmer->parcel_area = $request->parcel_area;
        $farmer->planted_area = $request->planted_area;
        $farmer->commodity = $request->commodity;
        $farmer->date_planted = $request->date_planted;
        $farmer->development_stage = $request->development_stage;
        $farmer->save();
        return redirect()->back()->with('success','Farmer Updated.'); 
    }

    public function uploadNDVI(Request $request){
        $this->validate($request, array(
            'csv_file' => 'required'
        ));
        $upload = $request->file('csv_file');
        $filePath = $upload->getRealPath();
        $file = fopen($filePath, 'r');

        $header = fgetcsv($file);
        while($columns = fgetcsv($file)){
            if($columns[0] == ""){
                continue;
            }
            $data = array_combine($header, $columns);
            foreach($data as $key => &$value){
                $key = strtolower($key);
                $value = (string)$value;
            }
            $gpx_id = $data['gpx_id'];
            $ndvi = $data['ndvi'];
            $area = $data['area'];
            $development_stage = $data['development_stage'];
            
            
            $farmer = Farmer::where('gpx_id', '=', $gpx_id)->first();
            if(isset($farmer)){
                $farmer->development_stage = $development_stage;
                $farmer->save();
            }

            $plot = AtRiskPlot::firstOrNew(['gpx_id' => $gpx_id]);
            $plot->ndvi_value = $ndvi;
            $plot->area_gis = $area;
            $plot->development_stage = $development_stage;
            $plot->save();
        }
 
        return redirect()->back()->with('success','NDVI Uploaded.'); 
    }

    public function uploadDamagedPlots(Request $request){
        $this->validate($request, array(
            'damaged_csv' => 'required'
        ));
        $upload = $request->file('damaged_csv');
        $filePath = $upload->getRealPath();
        $file = fopen($filePath, 'r');

        $header = fgetcsv($file);
        while($columns = fgetcsv($file)){
            if($columns[0] == ""){
                continue;
            }
            $data = array_combine($header, $columns);
            foreach($data as $key => &$value){
                $key = strtolower($key);
                $value = (string)$value;
            }
            $gpx_id = $data['gpx_id'];
            $area = $data['area'];
            $status = $data['status'];
                    
            $plot = AtRiskPlot::firstOrNew(['gpx_id' => $gpx_id]);
            $plot->area_gis = $area;
            $plot->status = $status;
            $plot->save();
        }
 
        return redirect()->back()->with('success','NDVI Uploaded.'); 
    }

    public function deleteFarmer(Request $request, $farmer_id){
        $farmer = Farmer::find($farmer_id);
        $farmer->delete();
        return redirect()->back()->with('success','Farmer Deleted.'); 
    }
}
