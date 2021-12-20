<div class="section {{request()->edit == '1' ? 'overlay-container' : ''}}" style="">
    <h1 class="text-center">Corn Bulletin</h1>
    <h4 class="text-center">(December 2021 – April 2022 based on November 2021 Condition)</h4>
    <h5 class="text-center">
        Site-specific advisories using meteorological information for better farm management decision-making. <br>Source: Dr. Artemio Salazar, Project SARAi
    </h5>

    <h2 class="mt-2" style="text-align: center;">
        <button type="button" class="btn btn-outline-secondary">Download Nationwide Bulletin</button>
    </h2>
    <!--
    <table class="table mt-2" style="table-layout: fixed;">
        <thead bgcolor="308CDD">
          <tr>
            <th scope="col" style="border: 1px solid #308CDD;"></th>
            <th scope="col" style="border: 1px solid #ddd;" colspan=5>Rainfall Forecast</th>
            <th scope="col" style="border: 1px solid #ddd;" colspan=5>40-year average of province</th>
            <th scope="col" style="border: 1px solid #ddd;" colspan=5>% of 40-year avg.</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td bgcolor="308CDD" style="border: 1px solid #308CDD;font-size:14px;"><b></b></td>
            <td bgcolor="6eb6f5" style="border: 1px solid #ddd;font-size:12px;"><b>December</b></td>
            <td bgcolor="6eb6f5" style="border: 1px solid #ddd;font-size:13px;"><b>January</b></td>
            <td bgcolor="6eb6f5" style="border: 1px solid #ddd;font-size:14px;"><b>February</b></td>
            <td bgcolor="6eb6f5" style="border: 1px solid #ddd;font-size:14px;"><b>March</b></td>
            <td bgcolor="6eb6f5" style="border: 1px solid #ddd;font-size:14px;"><b>April</b></td>
            <td bgcolor="6eb6f5" style="border: 1px solid #ddd;font-size:12px;"><b>December</b></td>
            <td bgcolor="6eb6f5" style="border: 1px solid #ddd;font-size:13px;"><b>January</b></td>
            <td bgcolor="6eb6f5" style="border: 1px solid #ddd;font-size:14px;"><b>February</b></td>
            <td bgcolor="6eb6f5" style="border: 1px solid #ddd;font-size:14px;"><b>March</b></td>
            <td bgcolor="6eb6f5" style="border: 1px solid #ddd;font-size:14px;"><b>April</b></td>
            <td bgcolor="6eb6f5" style="border: 1px solid #ddd;font-size:12px;"><b>December</b></td>
            <td bgcolor="6eb6f5" style="border: 1px solid #ddd;font-size:13px;"><b>January</b></td>
            <td bgcolor="6eb6f5" style="border: 1px solid #ddd;font-size:14px;"><b>February</b></td>
            <td bgcolor="6eb6f5" style="border: 1px solid #ddd;font-size:14px;"><b>March</b></td>
            <td bgcolor="6eb6f5" style="border: 1px solid #ddd;font-size:14px;"><b>April</b></td>
          </tr>
          <tr>
            <td style="border: 1px solid #dee2e6;;" bgcolor="308CDD"><b>Tarlac</b></td>
            <td style="border: 1px solid #dee2e6;;">209mm</td>
            <td style="border: 1px solid #dee2e6;;">97mm</td>
            <td style="border: 1px solid #dee2e6;;">37mm</td>
            <td style="border: 1px solid #dee2e6;;">14mm</td>
            <td style="border: 1px solid #dee2e6;;">10mm</td>
            <td style="border: 1px solid #dee2e6;;">213mm</td>
            <td style="border: 1px solid #dee2e6;;">62mm</td>
            <td style="border: 1px solid #dee2e6;;">14mm</td>
            <td style="border: 1px solid #dee2e6;;">2mm</td>
            <td style="border: 1px solid #dee2e6;;">8mm</td>
            <td style="border: 1px solid #dee2e6;;">98%</td>
            <td style="border: 1px solid #dee2e6;;">156%</td>
            <td style="border: 1px solid #dee2e6;;">255%</td>
            <td style="border: 1px solid #dee2e6;;">621%</td>
            <td style="border: 1px solid #dee2e6;;">129%</td>
          </tr>
        </tbody>
    </table>-->
    <div class="text-center">
        <img alt="iFarm Banner" src="/storage/page_images/20.png" style="width:75%" class="mb-1">
    </div>
    <h5 class="mt-4" style="text-align:justify;margin: 0 auto;width: 85%;">
        <b>Advisory:</b> In this other major corn-after-rice producing Region, rice crop by May should be the consideration (as in Region 1 &amp;
        4B). Hence corn harvesting should be by April which means January planting of corn at the latest. Decline in rainfall is
        expected in December except Aurora which still have rainfall beyond 100mm. Hence we expect the usual good corn-
        after-rice production from the Region in 1 st and 2 nd quarter coming mainly from the provinces of Tarlac, Pampanga and
        Nueva Ecija. Aurora’s highest corn production in 2 nd quarter could be ascribed to still good rain in December and more
        than 100m rainfall from Jan to March. Its total annual rainfall is also close to 3m a little less than Regns 5, 8 and
        CARAGA
    </h5>

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
                    {{Form::textarea('latest_aanr_subheader', 'We generate science-based site-specific advisories using meteorological information for better farm management decision-making. Source: Dr. Artemio Salazar; Project 3.3 Integrating Research Results, Communication Planning, and Linking Science to Policy
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