<div class="section {{request()->edit == '1' ? 'overlay-container' : ''}}">
    <div class="title-section">
        <h1 class="text-center">{!!isset($landing_page->vegetation_title) ? nl2br($landing_page->vegetation_title) : 'Monitoring of Farm-level Vegetation Cover'!!}</h1>
        <h5 class="text-center">
            {!!isset($landing_page->vegetation_subtitle) ? nl2br($landing_page->vegetation_subtitle) : 'Percentage of the farm area with vegetation cover and without planted crops.'!!}
        </h5>
        @if(request()->edit == 1)
            <div class="hover-overlay" style="width:100%; height:0">     
                <button type="button" class="btn btn-xs btn-primary" data-target="#editVegetationSectionModal" data-toggle="modal"><i class="far fa-edit"></i></button>      
            </div>
        @endif
    </div>
    <div class="row mt-4">
        <div class="offset-3">

        </div>
        <div class="col-sm-2 text-center">
            <select class="form-control">
                <option>Select Date Range</option>
              </select>
        </div>
        <div class="col-sm-2 text-center">
            <select class="form-control">
                <option>Select Province</option>
                <option>Tarlac</option>
              </select>
        </div>
        <div class="col-sm-2 text-center">
            <select class="form-control">
                <option>Select Municipality</option>
                <option>La Paz</option>
                <option>Concepcion</option>
              </select>
        </div>
    </div>
    <div class="row">
        @foreach(App\Models\VegetationMap::all() as $vegetationMap)
            <div class="col-lg-4 col-md-12 mt-3">
                @if(request()->edit == 1)
                    <div class="card">
                        <a href="{{$vegetationMap->link}}" target="_blank" style="text-decorations:none; color:inherit">
                        <img class="card-img-top" src="/storage/page_images/{{$vegetationMap->thumbnail}}" alt="Card image cap" height="320px" style="overflow: hidden;object-fit: cover;">
                        </a>
                        <div class="card-body pl-3 pr-3">
                            <h5 class="card-title line-clamp" style="text-transform: uppercase"><b>{{$vegetationMap->title}}</b></h5>
                            <p class="card-text">
                                {{$vegetationMap->description}}
                            </p>
                            @if(request()->edit == 1)
                                <button type="button" data-toggle="modal" data-target="#editVegetationMapModal-{{$vegetationMap->id}}" class="btn btn-dark">Edit</button>
                                <button type="button" data-toggle="modal" data-target="#deleteVegetationMapModal-{{$vegetationMap->id}}" class="btn btn-dark">Delete</button>
                            @endif
                        </div>
                    </div>
                @else
                    <img alt="{{$vegetationMap->title}}" src="/storage/page_images/{{$vegetationMap->thumbnail}}" style="width:100%">
                @endif
            </div>
        @endforeach
        @if(request()->edit == 1)
            <div class="col-lg-4" style="margin-top: 25px !important;">
                <button type="button" style="height:311px;width:100%" data-toggle="modal" data-target="#createVegetationMapModal" class="btn btn-primary">Add a map<br><i class="fas fa-plus"></i></button>
            </div>
        @endif
    </div>
</div>

<div class="modal fade" id="editVegetationSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Vegetation Section</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['action' => ['PagesController@updateVegetationSection'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('vegetation_visibility', 'Enable Section?', ['class' => 'col-form-label required'])}}
                    <input type="checkbox" checked data-toggle="toggle">
                </div>
                <div class="form-group">
                    {{Form::label('vegetation_title', 'Vegetation Section Title', ['class' => 'col-form-label required'])}}
                    {{Form::text('vegetation_title', $landing_page->vegetation_title, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('vegetation_subtitle', 'Vegetation Section Subtitle', ['class' => 'col-form-label required'])}}
                    {{Form::textarea('vegetation_subtitle', $landing_page->vegetation_subtitle, ['class' => 'form-control', 'rows' => '4'])}}
                </div>
                <hr class="my-0">
                {{Form::label('vegetation_section_background_banner', 'Change Section Background', ['class' => 'col-form-label'])}}
                <div class="input-group">
                    <label class="mr-2 radio-inline"><input type="radio" name="vegetation_background_color_radio" value="0" {{$landing_page->vegetation_background_type == 0 ? 'checked' : ''}}> Block color</label>
                    <label class="mx-2 radio-inline"><input type="radio" name="vegetation_background_color_radio" value="1" {{$landing_page->vegetation_background_type == 1 ? 'checked' : ''}}> Image</label>
                </div>
                <div class="form-group block-color-form-vegetation" style="{{$landing_page->vegetation_background_type == 1 ? 'display:none' : ''}}">
                    {{Form::label('vegetation_section_background_color', 'Set Block Color', ['class' => 'col-form-label'])}}
                    @if($landing_page->vegetation_background != null && $landing_page->vegetation_background_type == 0)
                    {{Form::text('vegetation_section_background_color', $landing_page->vegetation_background, ['class' => 'form-control', 'placeholder' => 'Add a hex'])}}
                    @else
                    {{Form::text('vegetation_section_background_color', '', ['class' => 'form-control', 'placeholder' => 'Add a hex'])}}
                    @endif
                </div>
                <div class="form-group background-image-form-vegetation" style="{{$landing_page->vegetation_background_type == 0 ? 'display:none' : ''}}">
                    {{Form::label('vegetation_section_background_image', 'Set Background Image', ['class' => 'col-form-label required'])}}
                    <br>
                    @if($landing_page->vegetation_background != null && $landing_page->vegetation_background_type == 1)
                    <img src="/storage/page_images/{{$landing_page->vegetation_background}}" class="card-img-top" style="object-fit: cover;overflow:hidden;width:100%;border:1px solid rgba(100,100,100,0.25)" >
                    @else
                    <div class="card-img-top center-vertically px-3" style="height:225px; width:100%; background-color: rgb(227, 227, 227);">
                        <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                            Upload a 1800x550px logo for the background.
                        </span>
                    </div>
                    @endif
                    {{ Form::file('vegetation_section_background_image', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
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

<div class="modal fade" id="createVegetationMapModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ Form::open(['action' => ['VegetationMapsController@addVegetationMap'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Create Vegetation Maps</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('title', 'Vegetation Map Title', ['class' => 'col-form-label required'])}}
                    {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Enter map title'])}}
                </div>
                <div class="form-group">
                    {{Form::label('description', 'Description', ['class' => 'col-form-label required'])}}
                    {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Add description', 'rows' => '4'])}}
                </div>
                <div class="form-group">
                    {{Form::label('province', 'Province', ['class' => 'col-form-label required'])}}
                    <select name="province" class="form-control">
                        <option value="" disabled selected>Select a Province</option>
                        <option value="Tarlac"> Tarlac</option>
                    </select> 
                </div>
                <div class="form-group">
                    {{Form::label('municipality', 'Municipality', ['class' => 'col-form-label required'])}}
                    <select name="municipality" class="form-control">
                        <option value="" disabled selected>Select a Municipality</option>
                        <option value="La Paz"> La Paz</option>
                        <option value="Concepcion"> Concepcion</option>
                    </select> 
                </div>
                <div class="form-group">
                    {{Form::label('date', 'Vegetation Map Date', ['class' => 'col-form-label required'])}}
                    {{ Form::date('date', '',['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{Form::label('image', 'Vegetation Map Thumbnail', ['class' => 'col-form-label required'])}}
                    <br>
                    <div class="card-img-top center-vertically px-3" style="height:225px; width:100%; background-color: rgb(227, 227, 227);">
                        <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                            Upload a 1800x550px image for the background.
                        </span>
                    </div>
                    {{ Form::file('image', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
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

@foreach(App\Models\VegetationMap::all() as $vegetation_map_modal)
    <div class="modal fade" id="editVegetationMapModal-{{$vegetation_map_modal->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{ Form::open(['action' => ['VegetationMapsController@editVegetationMap', $vegetation_map_modal->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Edit Vegetation Map</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> 
                <div class="modal-body">
                    <div class="form-group">
                        {{Form::label('title', 'Vegetation Map Title', ['class' => 'col-form-label required'])}}
                        {{Form::text('title', $vegetation_map_modal->title, ['class' => 'form-control', 'placeholder' => 'Enter map title'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('description', 'Description', ['class' => 'col-form-label required'])}}
                        {{Form::textarea('description', $vegetation_map_modal->description, ['class' => 'form-control', 'placeholder' => 'Add description', 'rows' => '4'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('province', 'Province', ['class' => 'col-form-label required'])}}
                        <select name="province" class="form-control">
                            <option value="" disabled {{$vegetation_map_modal->province == null ? 'selected' : ''}}>Select a Province</option>
                            <option value="Tarlac" {{$vegetation_map_modal->province == "Tarlac" ? 'selected' : ''}}> Tarlac</option>
                        </select> 
                    </div>
                    <div class="form-group">
                        {{Form::label('municipality', 'Municipality', ['class' => 'col-form-label required'])}}
                        <select name="municipality" class="form-control">
                            <option value="" disabled {{$vegetation_map_modal->municipality == null ? 'selected' : ''}}>Select a Municipality</option>
                            <option value="La Paz" {{$vegetation_map_modal->province == "La Paz" ? 'selected' : ''}}> La Paz</option>
                            <option value="Concepcion" {{$vegetation_map_modal->province == "Concepcion" ? 'selected' : ''}}> Concepcion</option>
                        </select> 
                    </div>
                    <div class="form-group">
                        {{Form::label('date', 'Vegetation Map Date', ['class' => 'col-form-label required'])}}
                        {{ Form::date('date', $vegetation_map_modal->date,['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{Form::label('image', 'Vegetation Map Thumbnail', ['class' => 'col-form-label required'])}}
                        <br>
                        @if($vegetation_map_modal->thumbnail != null)
                            <img src="/storage/page_images/{{$vegetation_map_modal->thumbnail}}" class="card-img-top" style="object-fit: cover;overflow:hidden;width:100%;border:1px solid rgba(100,100,100,0.25)" >
                        @else
                            <div class="card-img-top center-vertically px-3" style="height:225px; width:100%; background-color: rgb(227, 227, 227);">
                                <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                                    Upload a 1800x550px logo for the background.
                                </span>
                            </div>
                        @endif
                        {{ Form::file('image', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
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

    <div class="modal fade" id="deleteVegetationMapModal-{{$vegetation_map_modal->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            {{ Form::open(['action' => ['VegetationMapsController@deleteVegetationMap', $vegetation_map_modal->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                <input type="hidden" name="_method" value="delete">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Delete Map</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="">Are you sure you want to delete: <b>{{$vegetation_map_modal->title}}</b></p>
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
    $(document).ready(function() {
        $('input[name$="vegetation_background_color_radio"]').click(function() {
            if($(this).val() == '0') {
                $('.background-image-form-vegetation').hide();  
                $('.block-color-form-vegetation').show();            
            }
            else {
                $('.block-color-form-vegetation').hide();  
                $('.background-image-form-vegetation').show();   
            }
        });
    });
</script>