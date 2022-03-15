<div class="section {{request()->edit == '1' && $user != null ? 'overlay-container' : ''}}">
    <div class="title-section">
        <h1 class="text-center" style="color:white">{!!isset($landing_page->maps_title) ? nl2br($landing_page->maps_title) : 'Disaster Risk Reduction and Management Maps'!!}</h1>
        <h5 class="text-center" style="color:white">
            {!!isset($landing_page->maps_title) ? nl2br($landing_page->maps_subtitle) : 'Damage assessment tools to mitigate the impact of disasters'!!}
        </h5>
        @if(request()->edit == 1 && $user != null)
            <div class="hover-overlay" style="width:100%; height:0">    
                <button type="button" class="btn btn-xs btn-primary" data-target="#editMapsSectionModal" data-toggle="modal"><i class="far fa-edit"></i></button>      
            </div>
        @endif
    </div>
    <div class="row">
        @foreach(App\Models\Map::all() as $map)
            <div class="col-lg-4">
                <div class="card">
                    <a href="{{$map->link}}" target="_blank" style="text-decorations:none; color:inherit">
                    <img class="card-img-top" src="/storage/page_images/{{$map->thumbnail}}" alt="Card image cap" height="320px" style="overflow: hidden;object-fit: cover;">
                    </a>
                    <div class="card-body pl-3 pr-3">
                        <a href="{{$map->link}}" target="_blank" style="text-decorations:none; color:inherit">
                            <h5 class="card-title line-clamp" style="text-transform: uppercase"><b>{{$map->title}}</b></h5>
                        </a>
                        <p class="card-text">
                            {{$map->description}}
                        </p>
                        @if(request()->edit == 1 && $user != null)
                            <button type="button" data-toggle="modal" data-target="#editMapModal-{{$map->id}}" class="btn btn-dark">Edit</button>
                            <button type="button" data-toggle="modal" data-target="#deleteMapModal-{{$map->id}}" class="btn btn-dark">Delete</button>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        @if(request()->edit == 1 && $user != null)
            <div class="col-lg-4" style="margin-top: 25px !important;">
                <button type="button" style="height:311px;width:100%" data-toggle="modal" data-target="#createMapModal" class="btn btn-primary">Add a map<br><i class="fas fa-plus"></i></button>
            </div>
        @endif
    </div>
</div>


<div class="modal fade" id="editMapsSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Maps Section</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['action' => ['PagesController@updateMapsSection'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('maps_visibility', 'Enable Section?', ['class' => 'col-form-label required'])}}
                    <input type="checkbox" checked data-toggle="toggle">
                </div>
                <div class="form-group">
                    {{Form::label('maps_title', 'Maps Section Title', ['class' => 'col-form-label required'])}}
                    {{Form::text('maps_title', $landing_page->maps_title, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('maps_subtitle', 'Maps Section Subtitle', ['class' => 'col-form-label required'])}}
                    {{Form::textarea('maps_subtitle', $landing_page->maps_subtitle, ['class' => 'form-control', 'rows' => '4'])}}
                </div>
                <hr class="my-0">
                {{Form::label('maps_section_background_banner', 'Change Section Background', ['class' => 'col-form-label'])}}
                <div class="input-group">
                    <label class="mr-2 radio-inline"><input type="radio" name="maps_background_color_radio" value="0" {{$landing_page->maps_background_type == 0 ? 'checked' : ''}}> Block color</label>
                    <label class="mx-2 radio-inline"><input type="radio" name="maps_background_color_radio" value="1" {{$landing_page->maps_background_type == 1 ? 'checked' : ''}}> Image</label>
                </div>
                <div class="form-group block-color-form-maps" style="{{$landing_page->maps_background_type == 1 ? 'display:none' : ''}}">
                    {{Form::label('maps_section_background_color', 'Set Block Color', ['class' => 'col-form-label'])}}
                    @if($landing_page->maps_background != null && $landing_page->maps_background_type == 0)
                    {{Form::text('maps_section_background_color', $landing_page->maps_background, ['class' => 'form-control', 'placeholder' => 'Add a hex'])}}
                    @else
                    {{Form::text('maps_section_background_color', '', ['class' => 'form-control', 'placeholder' => 'Add a hex'])}}
                    @endif
                </div>
                <div class="form-group background-image-form-maps" style="{{$landing_page->maps_background_type == 0 ? 'display:none' : ''}}">
                    {{Form::label('maps_section_background_image', 'Set Background Image', ['class' => 'col-form-label required'])}}
                    <br>
                    @if($landing_page->maps_background != null && $landing_page->maps_background_type == 1)
                    <img src="/storage/page_images/{{$landing_page->maps_background}}" class="card-img-top" style="object-fit: cover;overflow:hidden;width:100%;border:1px solid rgba(100,100,100,0.25)" >
                    @else
                    <div class="card-img-top center-vertically px-3" style="height:225px; width:100%; background-color: rgb(227, 227, 227);">
                        <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                            Upload a 1800x550px logo for the background.
                        </span>
                    </div>
                    @endif
                    {{ Form::file('maps_section_background_image', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
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

<div class="modal fade" id="createMapModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ Form::open(['action' => ['MapsController@addMap'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Create Maps</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('title', 'Map Title', ['class' => 'col-form-label required'])}}
                    {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Enter map title'])}}
                </div>
                <div class="form-group">
                    {{Form::label('description', 'Description', ['class' => 'col-form-label required'])}}
                    {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Add description', 'rows' => '4'])}}
                </div>
                <div class="form-group">
                    {{Form::label('image', 'Map Thumbnail', ['class' => 'col-form-label required'])}}
                    <br>
                    <div class="card-img-top center-vertically px-3" style="height:225px; width:100%; background-color: rgb(227, 227, 227);">
                        <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                            Upload a 1800x550px image for the background.
                        </span>
                    </div>
                    {{ Form::file('image', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
                </div>
                <div class="form-group">
                    {{Form::label('link', 'Link to website', ['class' => 'col-form-label required'])}}
                    {{Form::text('link', '', ['class' => 'form-control', 'placeholder' => 'Add website URL'])}}
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

@foreach(App\Models\Map::all() as $map_modal)
    <div class="modal fade" id="editMapModal-{{$map_modal->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{ Form::open(['action' => ['MapsController@editMap', $map_modal->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create Maps</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> 
                <div class="modal-body">
                    <div class="form-group">
                        {{Form::label('title', 'Map Title', ['class' => 'col-form-label required'])}}
                        {{Form::text('title', $map_modal->title, ['class' => 'form-control', 'placeholder' => 'Enter map title'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('description', 'Description', ['class' => 'col-form-label required'])}}
                        {{Form::textarea('description', $map_modal->description, ['class' => 'form-control', 'placeholder' => 'Add description', 'rows' => '4'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('image', 'Map Thumbnail', ['class' => 'col-form-label required'])}}
                        <br>
                        @if($map_modal->thumbnail!=null)
                            <img src="/storage/page_images/{{$map_modal->thumbnail}}" class="card-img-top" style="object-fit: cover;overflow:hidden;width:100%;border:1px solid rgba(100,100,100,0.25)" >
                        @else
                            <div class="card-img-top center-vertically px-3" style="height:225px; width:100%; background-color: rgb(227, 227, 227);">
                                <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                                    Upload a 1800x550px image for the background.
                                </span>
                            </div>
                        @endif
                        {{ Form::file('image', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('link', 'Link to website', ['class' => 'col-form-label required'])}}
                        {{Form::text('link', $map_modal->link, ['class' => 'form-control', 'placeholder' => 'Add website URL'])}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>

    <div class="modal fade" id="deleteMapModal-{{$map_modal->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            {{ Form::open(['action' => ['MapsController@deleteMap', $map_modal->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                <input type="hidden" name="_method" value="delete">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Delete Map</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="">Are you sure you want to delete: <b>{{$map_modal->title}}</b></p>
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
        $('input[name$="maps_background_color_radio"]').click(function() {
            if($(this).val() == '0') {
                $('.background-image-form-maps').hide();  
                $('.block-color-form-maps').show();            
            }
            else {
                $('.block-color-form-maps').hide();  
                $('.background-image-form-maps').show();   
            }
        });
    });
</script>