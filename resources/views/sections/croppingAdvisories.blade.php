<div class="section {{request()->edit == '1' ? 'overlay-container' : ''}} px-5" style="">
    <h1 class="text-center">Farm-Level Crop Monitoring</h1>
    <h5 class="text-center">
        Satellite-based data and site-specific monitoring reports on selected sites.<br>Recommendations may or may not be the same with other sites with the same climate type.
    </h5>
    <div class="row mt-4">
        <div class="offset-sm-2 px-5 col-sm-4 text-center">
            <h4>Crop</h4>
            <select class="form-control">
                <option>Corn</option>
                <option>Rice</option>
            </select>
        </div>
        <div class="col-sm-4 px-5 text-center">
            <h4>Site</h4>
            <select class="form-control">
                <option>La Paz, Tarlac</option>
                <option>Concepcion, Tarlac</option>
              </select>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-sm-6">
            <img alt="iFarm Banner" src="/storage/page_images/15.png" style="width:100%" class="mb-1">
            <a href="" class="text-center"><h6>Link to Interactive Map</h6></a>
        </div>
        <div class="col-sm-6 ">
            <h5 class="text-center">
                Rainfall Outlook for November, 2021 to March, 2022
            </h5>
            <div class="row mt-4">
                <div class="col-sm-2 text-center">
                    <img src="/storage/page_images/rainfall_5.png" style="width:50px;visibility: hidden"><br>
                    <b>Month<br>
                    mm<br></b>
                </div>
                <div class="col-sm-2 text-center">
                    <img src="/storage/page_images/rainfall_5.png" style="width:50px"><br>
                    Nov 2021<br>
                    101
                </div>
                <div class="col-sm-2 text-center">
                    <img src="/storage/page_images/rainfall_1.png" style="width:50px"><br>
                    Dec 2021<br>
                    18
                </div>
                <div class="col-sm-2 text-center">
                    <img src="/storage/page_images/rainfall_1.png" style="width:50px"><br>
                    Jan 2022<br>
                    15
                </div>
                <div class="col-sm-2 text-center">
                    <img src="/storage/page_images/rainfall_3.png" style="width:50px"><br>
                    Feb 2022<br>
                    55
                </div>
                <div class="col-sm-2 text-center">
                    <img src="/storage/page_images/rainfall_4.png" style="width:50px"><br>
                    Mar 2022<br>
                    68
                </div>
            </div>
            <hr class="rounded">
            <div class="row">
                <div class="offset-sm-1"></div>
                <div class="col-sm-4">
                    <h5>Number of Farm Lots</h5>
                    <h2 style="font-weight:700 !important">
                        494
                    </h2>
                </div>
                <div class="offset-sm-2"></div>
                <div class="col-sm-4">
                    <h5>Percent of Plots Harvested</h5>
                    <h2 style="font-weight:700 !important">
                        31%
                    </h2>
                </div>
                <div class="offset-sm-1"></div>
                <div class="offset-sm-1"></div>
                <div class="col-sm-4">
                    <h5>Percent of Plots in Vegetative State</h5>
                    <h2 style="font-weight:700 !important">
                        24%
                    </h2>
                </div>
                <div class="offset-sm-2"></div>
                <div class="col-sm-4">
                    <h5>Percent of Plots in Reproductive State</h5>
                    <h2 style="font-weight:700 !important">
                        45%
                    </h2>
                </div>
            </div>
            <hr class="rounded">
            <h6 class="text-center">
                Legend
            </h6>
            <div class="row">
                <div class="offset-sm-1">
                </div>
                <div class="col-sm-5">
                    <img alt="iFarm Banner" src="/storage/page_images/17.png" style="width:100%">
                </div>
                <div class="offset-sm-1">
                </div>
                <div class="col-sm-4">
                    <img alt="iFarm Banner" src="/storage/page_images/18.png" style="width:100%">
                </div>
            </div>
        </div>
    </div>
    @if(request()->edit == 1)
        <div class="hover-overlay" style="width:100%">    
            <button type="button" class="btn btn-xs btn-primary" data-target="#editCroppingAdvisoriesSectionModal" data-toggle="modal"><i class="far fa-edit"></i></button>      
        </div>
    @endif
</div>


<div class="modal fade" id="editCroppingAdvisoriesSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Cropping Advisories Section</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('latest_aanr_subheader', 'Enable Section?', ['class' => 'col-form-label required'])}}
                    <input type="checkbox" checked data-toggle="toggle">
                </div>
                <div class="form-group">
                    {{Form::label('latest_aanr_header', 'Cropping Advisories Header', ['class' => 'col-form-label required'])}}
                    {{Form::text('latest_aanr_header', 'iFarm Cropping Advisories', ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('latest_aanr_subheader', 'Cropping Advisories Subheader', ['class' => 'col-form-label required'])}}
                    {{Form::textarea('latest_aanr_subheader', 'We craft site-specific recommendations for the representative sites of the different climate types. Recommendations may or may not be the same with other sites with the same climate type.
                    ', ['class' => 'form-control', 'rows' => '4'])}}
                </div>
                {{Form::label('banner', 'Change Section Background', ['class' => 'col-form-label'])}}
                <div class="input-group">
                    <label class="mr-2 radio-inline"><input type="radio" name="banner_color_radio_latest_aanr" value="1" checked> Block color</label>
                    <label class="mx-2 radio-inline"><input type="radio" name="banner_color_radio_latest_aanr" value="0"> Image</label>
                </div>
                <div class="form-group block-color-form_latest_aanr" style="">
                    {{Form::label('banner_color', 'Change block color', ['class' => 'col-form-label'])}}
                    {{Form::text('banner_color', '', ['class' => 'form-control', 'placeholder' => 'Add a hex'])}}
                </div>
                <div class="form-group gradient-color-form_latest_aanr" style="display:none">
                    {{Form::label('image', 'Latest AANR Section Background', ['class' => 'col-form-label required'])}}
                    <br>
                    <div class="card-img-top center-vertically px-3" style="height:225px; width:100%; background-color: rgb(227, 227, 227);">
                        <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                            Upload a 1800x550px logo for the background.
                        </span>
                    </div>
                    {{ Form::file('image', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
            </div>
        </div>
    </div>
</div>