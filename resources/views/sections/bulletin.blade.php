<div class="section {{request()->edit == '1' ? 'overlay-container' : ''}}">
    <h1 class="text-center">ICMF Corn Bulletin</h1>
    <h5 class="text-center">(October 2021 – February 2022 based on September 2021 Condition)</h5>
    <h6 class="text-center">
        We generate science-based site-specific advisories using SARAi-generated meteorological information for better farm management decision-making.
        <br>Source: Dr. Artemio Salazar; Project 3.3 Integrating Research Results, Communication Planning, and Linking Science to Policy
    </h6>
    <div class="row mt-4">
        <div class="offset-sm-4 col-sm-4 px-5 text-center">
            <h4>Region</h4>
            <select class="form-control">
                <option>Region III - Central Luzon</option>
              </select>
        </div>
    </div>

    <img alt="iFarm Banner" src="/storage/page_images/corn_bulletin.png" style="width:100%">
    @if(request()->edit == 1)
        <div class="hover-overlay" style="width:100%">    
            <button type="button" class="btn btn-xs btn-primary" data-target="#editBulletinSectionModal" data-toggle="modal"><i class="far fa-edit"></i></button>      
        </div>
    @endif
</div>


<div class="modal fade" id="editBulletinSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit ICMF Bulletin Section</h6>
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
                    {{Form::label('latest_aanr_header', 'ICMF Bulletin Header', ['class' => 'col-form-label required'])}}
                    {{Form::text('latest_aanr_header', 'ICMF Corn Bulletin', ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('latest_aanr_subheader', 'ICMF Bulletin Subheader', ['class' => 'col-form-label required'])}}
                    {{Form::textarea('latest_aanr_subheader', 'We generate science-based site-specific advisories using SARAi-generated meteorological information for better farm management decision-making. Source: Dr. Artemio Salazar; Project 3.3 Integrating Research Results, Communication Planning, and Linking Science to Policy
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