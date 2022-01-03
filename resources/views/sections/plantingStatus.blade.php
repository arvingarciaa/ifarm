<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>


<div class="section {{request()->edit == '1' ? 'overlay-container' : ''}}">
    <div class="title-section">
        <h1 class="text-center" style="">{{$landing_page->planting_status_title}}</h1>
        <h5 class="text-center" style="">
            {{$landing_page->planting_status_subtitle}}
        </h5>
        @if(request()->edit == 1)
            <div class="hover-overlay" style="width:100%; height:0">    
                <button type="button" class="btn btn-xs btn-primary" data-target="#editPlantingStatusSectionModal" data-toggle="modal"><i class="far fa-edit"></i></button>      
            </div>
        @endif
    </div>
    <div class="row">
        <div class="card shadow mb-5" style="width:100%">
            <div style="padding-left:20px;padding-top:15px;padding-right:25px"> 
                <span class="font-weight-bold text-primary" style="font-size:27px">Farmer Details</span>              
                <small>Click table headers to sort Ascending/Descending</small>  
                <span class="float-right mt-2 text-muted">0 Farmer Data</span>
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table data-table planting-table table-hover">
                        <thead style="width:100%">
                            <tr>
                                <th>#</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Baranggay</th>
                                <th>Source Database</th>
                                <th>Parcel No</th>
                                <th>Parcel Area</th>
                                <th>Planted Area</th>
                                <th>Commodity</th>
                                <th>Status</th>
                                <th>Date Planted</th>
                                <th>Stage of Crop Dev.</th>
                            </tr>
                        </thead>
                        <tbody>
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
                <div class="form-group">
                    {{Form::label('planting_status_title', 'Planting Status Section Title', ['class' => 'col-form-label required'])}}
                    {{Form::text('planting_status_title', $landing_page->planting_status_title, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('planting_status_subtitle', 'Planting Status Section Subtitle', ['class' => 'col-form-label required'])}}
                    {{Form::textarea('planting_status_subtitle', $landing_page->planting_status_subtitle, ['class' => 'form-control', 'rows' => '4'])}}
                </div>
                <hr class="my-0">
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
            </div>
            {{Form::close()}}   
        </div>
    </div>
</div>

<script>
    $(document).ready( function () {
        $('.planting-table').DataTable();

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