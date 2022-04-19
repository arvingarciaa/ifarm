<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>


<div class="section {{request()->edit == '1' && $user != null ? 'overlay-container' : ''}}" style="padding-bottom:0px !important">
    <div class="title-section">
        <h1 class="text-center" style="">{{$landing_page->planting_status_title}}</h1>
        <h5 class="text-center" style="">
            {{$landing_page->planting_status_subtitle}}
        </h5>
        @if(request()->edit == 1 && $user != null)
            <div class="hover-overlay" style="width:100%; height:0">    
                <button type="button" class="btn btn-xs btn-primary" data-target="#editPlantingStatusSectionModal" data-toggle="modal"><i class="far fa-edit"></i></button>      
            </div>
        @endif
    </div>
    <div class="row">
        <div class="card shadow mb-5" style="width:100%">
            <div style="padding-left:20px;padding-top:15px;padding-right:25px"> 
                <span class="font-weight-bold text-primary" style="font-size:27px">Farmer Details</span>              
                <small>Click/drag table headers to sort Ascending/Descending</small> 
                <span class="text-right float-right">
                    <div class="btn-group">
                        <h5 class="mr-1 mt-2">Filter:</h5>
                        <button class="btn btn-outline-primary btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret">{!!request()->filter ? '<b>'.ucwords(str_replace("_", " ", request()->filter)).'</b>' : 'All'!!}</span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('getLandingPage', ['filter' => 'all'])}}#planting-status-anchor">All</a>
                            <a class="dropdown-item" href="{{ route('getLandingPage', ['filter' => 'at_risk'])}}#planting-status-anchor">At Risk</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('getLandingPage', ['filter' => 'no_crop'])}}#planting-status-anchor">No Crop</a>
                            <a class="dropdown-item" href="{{ route('getLandingPage', ['filter' => 'vegetative'])}}#planting-status-anchor">Vegetative</a>
                            <a class="dropdown-item" href="{{ route('getLandingPage', ['filter' => 'reproductive'])}}#planting-status-anchor">Reproductive</a>
                            <a class="dropdown-item" href="{{ route('getLandingPage', ['filter' => 'maturity'])}}#planting-status-anchor">Maturity</a>
                            <a class="dropdown-item" href="{{ route('getLandingPage', ['filter' => 'harvested'])}}#planting-status-anchor">Harvested</a>
                        </div>
                    </div>
                    <span class="mt-2 ml-3 text-muted">{{App\Models\Farmer::all()->count()}} Farmer Data</span>
                    @if(request()->edit == '1' && $user != null)
                    <button type="button" class="btn btn-default" data-target="#uploadNDVIModal" data-toggle="modal"><i class="fa fa-plus"></i> Upload NDVI</button>  
                    <button type="button" class="btn btn-default" data-target="#uploadDamagedPlotsModal" data-toggle="modal"><i class="fa fa-plus"></i> Upload Damaged Plots</button>  
                    <button type="button" class="btn btn-default" data-target="#editFarmerEntryFieldsModal" data-toggle="modal"><i class="fas fa-edit"></i> Configure</button>     
                    @endif
                </span>
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table data-table planting-table table-hover" style="width:100% !important;">
                        <thead style="">
                            <tr>
                                <th >#</th>
                                <th class="text-center" style="{{$landing_page->rsbsa_no_access == 2 || $landing_page->rsbsa_no_access == 1 && $user != null ? '' : 'display:none'}}">RSBSA No</th>
                                <th class="text-center" style="{{$landing_page->last_name_access == 2 || $landing_page->last_name_access == 1 && $user != null ? '' : 'display:none'}}">Last Name</th>
                                <th class="text-center" style="{{$landing_page->first_name_access == 2 || $landing_page->first_name_access == 1 && $user != null ? '' : 'display:none'}}">First Name</th>
                                <th class="text-center" style="{{$landing_page->ndvi_value_access == 2 || $landing_page->ndvi_value_access == 1 && $user != null ? '' : 'display:none'}} background-color: #90EE90;">NDVI Value</th>
                                <th class="text-center" style="{{$landing_page->area_gis_access == 2 || $landing_page->area_gis_access == 1 && $user != null ? '' : 'display:none'}} background-color: #90EE90;">Area GIS</th>
                                <th class="text-center" style="{{$landing_page->development_stage_access == 2 || $landing_page->development_stage_access == 1 && $user != null ? '' : 'display:none'}} background-color: #90EE90;">Stage of Crop Dev.</th>
                                <th class="text-center" style="{{$landing_page->gpx_id_access == 2 || $landing_page->gpx_id_access == 1 && $user != null ? '' : 'display:none'}}">GPX ID</th>
                                <th class="text-center" style="{{$landing_page->barangay_access == 2 || $landing_page->barangay_access == 1 && $user != null ? '' : 'display:none'}}">Baranggay</th>
                                <th class="text-center" style="{{$landing_page->municipality_access == 2 || $landing_page->municipality_access == 1 && $user != null ? '' : 'display:none'}}">Municipality</th>
                                <th class="text-center" style="{{$landing_page->parcel_name_access == 2 || $landing_page->parcel_name_access == 1 && $user != null ? '' : 'display:none'}}">Parcel Name</th>
                                <th class="text-center" style="{{$landing_page->parcel_area_access == 2 || $landing_page->parcel_area_access == 1 && $user != null ? '' : 'display:none'}}">Parcel Area</th>
                                <th class="text-center" style="{{$landing_page->planted_area_access == 2 || $landing_page->planted_area_access == 1 && $user != null ? '' : 'display:none'}}">Planted Area</th>
                                <th class="text-center" style="{{$landing_page->commodity_access == 2 || $landing_page->commodity_access == 1 && $user != null ? '' : 'display:none'}}">Commodity</th>
                                <th class="text-center" style="{{$landing_page->date_planted_access == 2 || $landing_page->date_planted_access == 1 && $user != null ? '' : 'display:none'}}">Date Planted</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($farmerEntries as $farmer_entry)
                                <?php 
                                    $current_plot_ndvi = App\Models\AtRiskPlot::where('gpx_id', '=', $farmer_entry->gpx_id)->first();
                                    if(isset($current_plot_ndvi)){
                                        if($current_plot_ndvi->development_stage == 0){
                                            $current_development_stage_text = "No Crop";
                                        } elseif($current_plot_ndvi->development_stage == 1){
                                            $current_development_stage_text = "Vegetative";
                                        } elseif($current_plot_ndvi->development_stage == 2){
                                            $current_development_stage_text = "Reproductive";
                                        } elseif($current_plot_ndvi->development_stage == 3){
                                            $current_development_stage_text = "Maturity";
                                        } else{
                                            $current_development_stage_text = "Harvested";
                                        }
                                    }
                                ?>
                                <tr>
                                    <th>{{$loop->iteration}}</th>
                                    <th style="{{$landing_page->rsbsa_no_access == 2 || $landing_page->rsbsa_no_access == 1 && $user != null ? '' : 'display:none'}} {{request()->filter == "at_risk" ? 'background-color:rgba(222, 29, 29,0.5)' : ''}}">{{$farmer_entry->rsbsa_no}}</th>
                                    <th style="{{$landing_page->last_name_access == 2 || $landing_page->last_name_access == 1 && $user != null ? '' : 'display:none'}} {{request()->filter == "at_risk" ? 'background-color:rgba(222, 29, 29,0.5)' : ''}}">{{$farmer_entry->last_name}}</th>
                                    <th style="{{$landing_page->first_name_access == 2 || $landing_page->first_name_access == 1 && $user != null ? '' : 'display:none'}} {{request()->filter == "at_risk" ? 'background-color:rgba(222, 29, 29,0.5)' : ''}}">{{$farmer_entry->first_name}}</th>
                                    <th class="text-center" style="{{$landing_page->ndvi_value_access == 2 || $landing_page->ndvi_value_access == 1 && $user != null ? '' : 'display:none'}} background-color: #90EE90;">{{isset($current_plot_ndvi) ? $current_plot_ndvi->ndvi_value : '--'}}</th>
                                    <th class="text-center" style="{{$landing_page->area_gis_access == 2 || $landing_page->area_gis_access == 1 && $user != null ? '' : 'display:none'}} background-color: #90EE90;">{{isset($current_plot_ndvi) ? $current_plot_ndvi->area_gis : '--'}}</th>
                                    <th class="text-center" style="{{$landing_page->development_stage_access == 2 || $landing_page->development_stage_access == 1 && $user != null ? '' : 'display:none'}} background-color: #90EE90;">{{isset($current_plot_ndvi) && $current_plot_ndvi->development_stage != null ? $current_development_stage_text : '---'}}</th>
                                    <th class="text-center" style="{{$landing_page->gpx_id_access == 2 || $landing_page->gpx_id_access == 1 && $user != null ? '' : 'display:none'}} {{request()->filter == "at_risk" ? 'background-color:rgba(222, 29, 29,0.5)' : ''}}">{{$farmer_entry->gpx_id}}</th>
                                    <th class="text-center" style="{{$landing_page->barangay_access == 2 || $landing_page->barangay_access == 1 && $user != null ? '' : 'display:none'}} {{request()->filter == "at_risk" ? 'background-color:rgba(222, 29, 29,0.5)' : ''}}">{{$farmer_entry->barangay}}</th>
                                    <th class="text-center" style="{{$landing_page->municipality_access == 2 || $landing_page->municipality_access == 1 && $user != null ? '' : 'display:none'}} {{request()->filter == "at_risk" ? 'background-color:rgba(222, 29, 29,0.5)' : ''}}">{{$farmer_entry->municipality}}</th>
                                    <th class="text-center" style="{{$landing_page->parcel_name_access == 2 || $landing_page->parcel_name_access == 1 && $user != null ? '' : 'display:none'}} {{request()->filter == "at_risk" ? 'background-color:rgba(222, 29, 29,0.5)' : ''}}">{{$farmer_entry->parcel_name}}</th>
                                    <th class="text-center" style="{{$landing_page->parcel_area_access == 2 || $landing_page->parcel_area_access == 1 && $user != null ? '' : 'display:none'}} {{request()->filter == "at_risk" ? 'background-color:rgba(222, 29, 29,0.5)' : ''}}">{{number_format(round($farmer_entry->parcel_area,2),2)}}</th>
                                    <th class="text-center" style="{{$landing_page->planted_area_access == 2 || $landing_page->planted_area_access == 1 && $user != null ? '' : 'display:none'}} {{request()->filter == "at_risk" ? 'background-color:rgba(222, 29, 29,0.5)' : ''}}">{{number_format(round($farmer_entry->planted_area, 2),2)}}</th>
                                    <th class="text-center" style="{{$landing_page->commodity_access == 2 || $landing_page->commodity_access == 1 && $user != null ? '' : 'display:none'}} {{request()->filter == "at_risk" ? 'background-color:rgba(222, 29, 29,0.5)' : ''}}">{{$farmer_entry->commodity}}</th>
                                    <th class="text-center" style="{{$landing_page->date_planted_access == 2 || $landing_page->date_planted_access == 1 && $user != null ? '' : 'display:none'}} {{request()->filter == "at_risk" ? 'background-color:rgba(222, 29, 29,0.5)' : ''}}">{{$farmer_entry->date_planted}}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <style>
                        .planting-table{
                            overflow-y:scroll;
                            overflow-x:scroll;
                            height:500px;
                            display:block;
                        }
                        .planting-table > td, th{
                            white-space:nowrap;
                        }
                    </style>
                </div>
            </div>
        </div>
        <div class="expand-collapse">
            <h4 id="collapse-button" style="padding-bottom:8px">Click to see Farm-level NDVI Map<br><i class="fas fa-angle-down"></i>
            </h4>
            <div class="collapse-content mt-3">
                <div class="row">
                    <div class="col-lg-6 col-sm-12" style="margin:auto">
                        <div class="row">
                            <div class="col-12">
                                <a href="{!!isset($landing_page->planting_status_map_link) ? $landing_page->planting_status_map_link : 'https://oahajj.users.earthengine.app/view/ifarm-farm-level-ndvi'!!}" target="_blank" class="text-center">
                                    <img alt="iFarm Banner" src="/storage/page_images/{!!isset($landing_page->planting_status_map_image) ? $landing_page->planting_status_map_image : '15.png'!!}" style="width:100%" class="mb-1">
                                </a>
                                <hr class="rounded" style="margin-top:0;margin-bottom:0.5rem;">
                                <a href="{!!isset($landing_page->weather_link) ? $landing_page->weather_link : 'https://oahajj.users.earthengine.app/view/ifarm-farm-level-ndvi'!!}" target="_blank" class="text-center" style="color:blue"><h6>Click to see Interactive Map</h6></a>   
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 px-4" style="margin:auto">
                        <h1>{{$landing_page->planting_status_map_title}}</h1>
                        <h4 class="text-muted">{{$landing_page->planting_status_map_subtitle}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editPlantingStatusSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Planting Status Section</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['action' => ['PagesController@updatePlantingStatusSection'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('planting_status_visibility', 'Enable Section?', ['class' => 'col-form-label required'])}}
                    <input type="checkbox" checked data-toggle="toggle">
                </div>
                <hr class="my-0 my-3">
                <h4>Farm-level Planting Status Table Section</h4>
                <div class="form-group">
                    {{Form::label('planting_status_title', 'Planting Status Section Title', ['class' => 'col-form-label required'])}}
                    {{Form::text('planting_status_title', $landing_page->planting_status_title, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('planting_status_subtitle', 'Planting Status Section Subtitle', ['class' => 'col-form-label required'])}}
                    {{Form::textarea('planting_status_subtitle', $landing_page->planting_status_subtitle, ['class' => 'form-control', 'rows' => '4'])}}
                </div>
                <hr class="my-0 my-3">
                {{Form::label('planting_status_section_background_banner', 'Change Section Background', ['class' => 'col-form-label'])}}
                <div class="input-group">
                    <label class="mr-2 radio-inline"><input type="radio" name="planting_status_background_color_radio" value="0" {{$landing_page->planting_status_background_type == 0 ? 'checked' : ''}}> Block color</label>
                    <label class="mx-2 radio-inline"><input type="radio" name="planting_status_background_color_radio" value="1" {{$landing_page->planting_status_background_type == 1 ? 'checked' : ''}}> Image</label>
                </div>
                <div class="form-group block-color-form-planting-status" style="{{$landing_page->planting_status_background_type == 1 ? 'display:none' : ''}}">
                    {{Form::label('planting_status_section_background_color', 'Set Block Color', ['class' => 'col-form-label'])}}
                    @if($landing_page->planting_status_background != null && $landing_page->planting_status_background_type == 0)
                    {{Form::text('planting_status_section_background_color', $landing_page->planting_status_background, ['class' => 'form-control', 'placeholder' => 'Add a hex'])}}
                    @else
                    {{Form::text('planting_status_section_background_color', '', ['class' => 'form-control', 'placeholder' => 'Add a hex'])}}
                    @endif
                </div>
                <div class="form-group background-image-form-planting-status" style="{{$landing_page->planting_status_background_type == 0 ? 'display:none' : ''}}">
                    {{Form::label('planting_status_section_background_image', 'Set Background Image', ['class' => 'col-form-label required'])}}
                    <br>
                    @if($landing_page->planting_status_background != null && $landing_page->planting_status_background_type == 1)
                    <img src="/storage/page_images/{{$landing_page->planting_status_background}}" class="card-img-top" style="object-fit: cover;overflow:hidden;width:100%;border:1px solid rgba(100,100,100,0.25)" >
                    @else
                    <div class="card-img-top center-vertically px-3" style="height:225px; width:100%; background-color: rgb(227, 227, 227);">
                        <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                            Upload a 1800x550px logo for the background.
                        </span>
                    </div>
                    @endif
                    {{ Form::file('planting_status_section_background_image', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
                </div>
                <hr class="my-0 my-3">
                <h4>Farm-level NDVI Map Section</h4>
                <div class="form-group">
                    {{Form::label('planting_status_map_title', 'Planting Status Map Title', ['class' => 'col-form-label required'])}}
                    {{Form::text('planting_status_map_title', $landing_page->planting_status_map_title, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('planting_status_map_subtitle', 'Planting Status Map Subtitle', ['class' => 'col-form-label required'])}}
                    {{Form::text('planting_status_map_subtitle', $landing_page->planting_status_map_subtitle, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('planting_status_map_image', 'Set Map Image', ['class' => 'col-form-label required'])}}
                    <br>
                    @if($landing_page->planting_status_map_image != null)
                    <img src="/storage/page_images/{{$landing_page->planting_status_map_image}}" class="card-img-top" style="object-fit: cover;overflow:hidden;width:100%;border:1px solid rgba(100,100,100,0.25)" >
                    @else
                    <div class="card-img-top center-vertically px-3" style="height:225px; width:100%; background-color: rgb(227, 227, 227);">
                        <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                            Upload a 1800x550px logo for the image.
                        </span>
                    </div>
                    @endif
                    {{ Form::file('planting_status_map_image', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
                </div>
                <div class="form-group">
                    {{Form::label('planting_status_map_link', 'Planting Status Map Link', ['class' => 'col-form-label required'])}}
                    {{Form::text('planting_status_map_link', $landing_page->planting_status_map_link, ['class' => 'form-control'])}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
            </div>
            {{Form::close()}}   
        </div>
    </div>
</div>

<div class="modal fade" id="editFarmerEntryFieldsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Configure Table Fields Visibility</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['action' => ['PagesController@editFarmerTableConfig'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-6">
                        <label for="last_name_access">Last Name</label>
                        <select class="form-control" id="last_name_access" name="last_name_access">
                            <option value="2" {{$landing_page->last_name_access == 2 ? 'selected' : ''}}>Public</option>
                            <option value="1" {{$landing_page->last_name_access == 1 ? 'selected' : ''}}>Private</option>
                            <option value="0" {{$landing_page->last_name_access == 0 ? 'selected' : ''}}>Disabled</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="first_name_access">First Name</label>
                        <select class="form-control" id="first_name_access" name="first_name_access">
                            <option value="2" {{$landing_page->first_name_access == 2 ? 'selected' : ''}}>Public</option>
                            <option value="1" {{$landing_page->first_name_access == 1 ? 'selected' : ''}}>Private</option>
                            <option value="0" {{$landing_page->first_name_access == 0 ? 'selected' : ''}}>Disabled</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="gpx_id_access">GPX ID</label>
                        <select class="form-control" id="gpx_id_access" name="gpx_id_access">
                            <option value="2" {{$landing_page->gpx_id_access == 2 ? 'selected' : ''}}>Public</option>
                            <option value="1" {{$landing_page->gpx_id_access == 1 ? 'selected' : ''}}>Private</option>
                            <option value="0" {{$landing_page->gpx_id_access == 0 ? 'selected' : ''}}>Disabled</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="rsbsa_no_access">RSBSA No.</label>
                        <select class="form-control" id="rsbsa_no_access" name="rsbsa_no_access">
                            <option value="2" {{$landing_page->rsbsa_no_access == 2 ? 'selected' : ''}}>Public</option>
                            <option value="1" {{$landing_page->rsbsa_no_access == 1 ? 'selected' : ''}}>Private</option>
                            <option value="0" {{$landing_page->rsbsa_no_access == 0 ? 'selected' : ''}}>Disabled</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="municipality_access">Municipality</label>
                        <select class="form-control" id="municipality_access" name="municipality_access">
                            <option value="2" {{$landing_page->municipality_access == 2 ? 'selected' : ''}}>Public</option>
                            <option value="1" {{$landing_page->municipality_access == 1 ? 'selected' : ''}}>Private</option>
                            <option value="0" {{$landing_page->municipality_access == 0 ? 'selected' : ''}}>Disabled</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="barangay_access">Baranggay</label>
                        <select class="form-control" id="barangay_access" name="barangay_access">
                            <option value="2" {{$landing_page->barangay_access == 2 ? 'selected' : ''}}>Public</option>
                            <option value="1" {{$landing_page->barangay_access == 1 ? 'selected' : ''}}>Private</option>
                            <option value="0" {{$landing_page->barangay_access == 0 ? 'selected' : ''}}>Disabled</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="parcel_name_access">Parcel Name</label>
                        <select class="form-control" id="parcel_name_access" name="parcel_name_access">
                            <option value="2" {{$landing_page->parcel_name_access == 2 ? 'selected' : ''}}>Public</option>
                            <option value="1" {{$landing_page->parcel_name_access == 1 ? 'selected' : ''}}>Private</option>
                            <option value="0" {{$landing_page->parcel_name_access == 0 ? 'selected' : ''}}>Disabled</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="parcel_area_access">Parcel Area</label>
                        <select class="form-control" id="parcel_area_access" name="parcel_area_access">
                            <option value="2" {{$landing_page->parcel_area_access == 2 ? 'selected' : ''}}>Public</option>
                            <option value="1" {{$landing_page->parcel_area_access == 1 ? 'selected' : ''}}>Private</option>
                            <option value="0" {{$landing_page->parcel_area_access == 0 ? 'selected' : ''}}>Disabled</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="planted_area_access">Planted Area</label>
                        <select class="form-control" id="planted_area_access" name="planted_area_access">
                            <option value="2" {{$landing_page->planted_area_access == 2 ? 'selected' : ''}}>Public</option>
                            <option value="1" {{$landing_page->planted_area_access == 1 ? 'selected' : ''}}>Private</option>
                            <option value="0" {{$landing_page->planted_area_access == 0 ? 'selected' : ''}}>Disabled</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="commodity_access">Commodity</label>
                        <select class="form-control" id="commodity_access" name="commodity_access">
                            <option value="2" {{$landing_page->commodity_access == 2 ? 'selected' : ''}}>Public</option>
                            <option value="1" {{$landing_page->commodity_access == 1 ? 'selected' : ''}}>Private</option>
                            <option value="0" {{$landing_page->commodity_access == 0 ? 'selected' : ''}}>Disabled</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="date_planted_access">Date Planted</label>
                        <select class="form-control" id="date_planted_access" name="date_planted_access">
                            <option value="2" {{$landing_page->date_planted_access == 2 ? 'selected' : ''}}>Public</option>
                            <option value="1" {{$landing_page->date_planted_access == 1 ? 'selected' : ''}}>Private</option>
                            <option value="0" {{$landing_page->date_planted_access == 0 ? 'selected' : ''}}>Disabled</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="development_stage_access">Stage of Crop Development</label>
                        <select class="form-control" id="development_stage_access" name="development_stage_access">
                            <option value="2" {{$landing_page->development_stage_access == 2 ? 'selected' : ''}}>Public</option>
                            <option value="1" {{$landing_page->development_stage_access == 1 ? 'selected' : ''}}>Private</option>
                            <option value="0" {{$landing_page->development_stage_access == 0 ? 'selected' : ''}}>Disabled</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
            </div>
            {{Form::close()}}   
        </div>
    </div>
</div>

<div class="modal fade" id="addFarmerEntryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Add Farmer Entry</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['action' => ['FarmersController@addFarmer'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-5">
                        {{Form::label('first_name', 'First Name', ['class' => 'col-form-label required'])}}
                        {{Form::text('first_name', '', ['class' => 'form-control','placeholder' => 'Enter first name'])}}
                    </div>
                    <div class="form-group col-4">
                        {{Form::label('last_name', 'Last Name', ['class' => 'col-form-label required'])}}
                        {{Form::text('last_name', '', ['class' => 'form-control','placeholder' => 'Enter last name'])}}
                    </div>
                    <div class="form-group col-3">
                        {{Form::label('ext_name', 'Ext. Name', ['class' => 'col-form-label required'])}}
                        {{Form::text('ext_name', '', ['class' => 'form-control','placeholder' => 'Enter extension'])}}
                    </div>
                    <div class="form-group col-8">
                        {{Form::label('parcel_name', 'Parcel Name', ['class' => 'col-form-label required'])}}
                        {{Form::text('parcel_name', '', ['class' => 'form-control','placeholder' => 'Enter parcel name'])}}
                    </div>
                    <div class="form-group col-6">
                        {{Form::label('gpx_id', 'GPX ID', ['class' => 'col-form-label required'])}}
                        {{Form::text('gpx_id', '', ['class' => 'form-control','placeholder' => 'Enter ID'])}}
                    </div>
                    <div class="form-group col-6">
                        {{Form::label('rsbsa_no', 'RSBSA Number', ['class' => 'col-form-label required'])}}
                        {{Form::text('rsbsa_no', '', ['class' => 'form-control','placeholder' => 'Enter Number'])}}
                    </div>
                    <div class="form-group col-6">
                        <label for="municipality" class="col-form-label">Select Municipality</label>
                        <select class="form-control" id="municipality" name="municipality">
                            <option disabled selected>Select Municipality</option>
                            <option value="La Paz">La Paz</option>
                            <option value="Concepcion">Concepcion</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="barangay" class="col-form-label">Select Baranggay</label>
                        <select class="form-control" id="barangay" name="barangay">
                            <option disabled selected>Select Baranggay</option>
                            <option value="Balanoy">Balanoy</option>
                            <option value="Bantog-Caricutan">Bantog-Caricutan</option>
                            <option value="Caut">Caut</option>
                            <option value="Comillas">Comillas</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-4">
                        {{Form::label('parcel_area', 'Parcel Area', ['class' => 'col-form-label required'])}}
                        {{Form::text('parcel_area', '', ['class' => 'form-control','placeholder' => 'Enter area'])}}
                    </div>
                    <div class="form-group col-4">
                        {{Form::label('planted_area', 'Planted Area', ['class' => 'col-form-label required'])}}
                        {{Form::text('planted_area', '', ['class' => 'form-control','placeholder' => 'Enter area'])}}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="commodity" class="col-form-label">Select Commodity</label>
                        <select class="form-control" id="commodity" name="commodity">
                            <option disabled selected>Select Crop</option>
                            <option value="Corn">Corn</option>
                            <option value="Rice">Rice</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        {{Form::label('date_planted', 'Date Planted', ['class' => 'col-form-label required'])}}
                        {{Form::date('date_planted', '', ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group col-6">
                        <label for="development_stage" class="col-form-label">Stage of Crop Development</label>
                        <select class="form-control" id="development_stage" name="development_stage">
                            <option disabled selected>Select Stage</option>
                            <option value="No Crop">No Crop</option>
                            <option value="Vegetative">Vegetative</option>
                            <option value="Reproductive">Reproductive</option>
                            <option value="Maturity">Maturity</option>
                            <option value="Harvested">Harvested</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
            </div>
            {{Form::close()}}   
        </div>
    </div>
</div>

<div class="modal fade" id="uploadNDVIModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Upload NDVI CSV File</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['action' => ['FarmersController@uploadNDVI'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-12">
                        {{Form::label('csv_file', 'Upload NDVI CSV File', ['class' => 'col-form-label required'])}}
                        {{Form::file('csv_file', ['class' => 'form-control'])}}
                        <small>Please follow CSV format linked <a target="_blank" href="https://drive.google.com/file/d/1eUVgZ9s7__Yocal9Rf3fU0AYP2z5pT27/view?usp=sharing">here</a></small>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
            </div>
            {{Form::close()}}   
        </div>
    </div>
</div>

<div class="modal fade" id="uploadDamagedPlotsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Upload Damaged Plots CSV File</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['action' => ['FarmersController@uploadDamagedPlots'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-12">
                        {{Form::label('damaged_csv', 'Upload Damaged Plots CSV File', ['class' => 'col-form-label required'])}}
                        {{Form::file('damaged_csv', ['class' => 'form-control'])}}
                        <small>Please follow CSV format linked <a target="_blank" href="https://drive.google.com/file/d/1gT5NGuG0EUNAhQoUciYtuYgP6PIybhJm/view?usp=sharing">here</a></small>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
            </div>
            {{Form::close()}}   
        </div>
    </div>
</div>

@foreach(App\Models\Farmer::all() as $farmer_modal)

    <div class="modal fade" id="editFarmerEntryModal-{{$farmer_modal->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Edit Farmer Entry</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['action' => ['FarmersController@editFarmer', $farmer_modal->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-5">
                            {{Form::label('first_name', 'First Name', ['class' => 'col-form-label required'])}}
                            {{Form::text('first_name', $farmer_modal->first_name, ['class' => 'form-control','placeholder' => 'Enter first name'])}}
                        </div>
                        <div class="form-group col-4">
                            {{Form::label('last_name', 'Last Name', ['class' => 'col-form-label required'])}}
                            {{Form::text('last_name', $farmer_modal->last_name, ['class' => 'form-control','placeholder' => 'Enter last name'])}}
                        </div>
                        <div class="form-group col-3">
                            {{Form::label('ext_name', 'Ext. Name', ['class' => 'col-form-label required'])}}
                            {{Form::text('ext_name', $farmer_modal->ext_name, ['class' => 'form-control','placeholder' => 'Enter extension'])}}
                        </div>
                        <div class="form-group col-8">
                            {{Form::label('parcel_name', 'Parcel Name', ['class' => 'col-form-label required'])}}
                            {{Form::text('parcel_name', $farmer_modal->parcel_name, ['class' => 'form-control','placeholder' => 'Enter parcel name'])}}
                        </div>
                        <div class="form-group col-6">
                            {{Form::label('gpx_id', 'GPX ID', ['class' => 'col-form-label required'])}}
                            {{Form::text('gpx_id', $farmer_modal->gpx_id, ['class' => 'form-control','placeholder' => 'Enter ID'])}}
                        </div>
                        <div class="form-group col-6">
                            {{Form::label('rsbsa_no', 'RSBSA Number', ['class' => 'col-form-label required'])}}
                            {{Form::text('rsbsa_no', $farmer_modal->rsbsa_no, ['class' => 'form-control','placeholder' => 'Enter Number'])}}
                        </div>
                        <div class="form-group col-6">
                            <label for="municipality" class="col-form-label">Select Municipality</label>
                            <select class="form-control" id="municipality" name="municipality">
                                <option disabled>Select Municipality</option>
                                <option {{$farmer_modal->municipality == "La Paz" ? 'selected' : ''}} value="La Paz">La Paz</option>
                                <option {{$farmer_modal->municipality == "Concepcion" ? 'selected' : ''}} value="Concepcion">Concepcion</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="barangay" class="col-form-label">Select Baranggay</label>
                            <select class="form-control" id="barangay" name="barangay">
                                <option disabled>Select Baranggay</option>
                                <option {{$farmer_modal->barangay == "Balanoy" ? 'selected' : ''}} value="Balanoy">Balanoy</option>
                                <option {{$farmer_modal->barangay == "Bantog-Caricutan" ? 'selected' : ''}} value="Bantog-Caricutan">Bantog-Caricutan</option>
                                <option {{$farmer_modal->barangay == "Caut" ? 'selected' : ''}} value="Caut">Caut</option>
                                <option {{$farmer_modal->barangay == "Comillas" ? 'selected' : ''}} value="Comillas">Comillas</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            {{Form::label('parcel_area', 'Parcel Area', ['class' => 'col-form-label required'])}}
                            {{Form::text('parcel_area', $farmer_modal->parcel_area, ['class' => 'form-control','placeholder' => 'Enter area'])}}
                        </div>
                        <div class="form-group col-4">
                            {{Form::label('planted_area', 'Planted Area', ['class' => 'col-form-label required'])}}
                            {{Form::text('planted_area', $farmer_modal->planted_area, ['class' => 'form-control','placeholder' => 'Enter area'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="commodity" class="col-form-label">Select Commodity</label>
                            <select class="form-control" id="commodity" name="commodity">
                                <option disabled>Select Crop</option>
                                <option {{$farmer_modal->commodity == "Corn" ? 'selected' : ''}} value="Corn">Corn</option>
                                <option {{$farmer_modal->commodity == "Rice" ? 'selected' : ''}} value="Rice">Rice</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            {{Form::label('date_planted', 'Date Planted', ['class' => 'col-form-label required'])}}
                            {{Form::date('date_planted', $farmer_modal->date_planted, ['class' => 'form-control'])}}
                        </div>
                        <div class="form-group col-6">
                            <label for="development_stage" class="col-form-label">Stage of Crop Development</label>
                            <select class="form-control" id="development_stage" name="development_stage">
                                <option disabled>Select Stage</option>
                                <option {{$farmer_modal->development_stage == "No Crop" ? 'selected' : ''}} value="No Crop">No Crop</option>
                                <option {{$farmer_modal->development_stage == "Vegetative" ? 'selected' : ''}} value="Vegetative">Vegetative</option>
                                <option {{$farmer_modal->development_stage == "Reproductive" ? 'selected' : ''}} value="Reproductive">Reproductive</option>
                                <option {{$farmer_modal->development_stage == "Maturity" ? 'selected' : ''}} value="Maturity">Maturity</option>
                                <option {{$farmer_modal->development_stage == "Harvested" ? 'selected' : ''}} value="Harvested">Harvested</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
                </div>
                {{Form::close()}}   
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteFarmerEntryModal-{{$farmer_modal->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            {{ Form::open(['action' => ['FarmersController@deleteFarmer', $farmer_modal->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                <input type="hidden" name="_method" value="delete">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Delete Farmer Entry</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="">Are you sure you want to delete: <b>{{$farmer_modal->first_name}} {{$farmer_modal->last_name}} {{$farmer_modal->gpx_id}}</b></p>
                </div>
                <div class="modal-footer">
                    {{Form::submit('Confirm', ['class' => 'btn btn-success'])}}
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                </div>
            {{Form::close()}}
            </div>
        </div>
    </div>
@endforeach

<script>
    $(document).ready( function () {
        $('.planting-table').DataTable( {
            colReorder: true,
            dom: 'lBfrtip',
            buttons: [{
                extend: 'collection',
                autoClose: true,
                text: 'Export',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                ]
            }]
        } );

        $('input[name$="planting_status_background_color_radio"]').click(function() {
            if($(this).val() == '0') {
                $('.background-image-form-planting-status').hide();  
                $('.block-color-form-planting-status').show();            
            }
            else {
                $('.block-color-form-planting-status').hide();  
                $('.background-image-form-planting-status').show();   
            }
        });
    });
</script>