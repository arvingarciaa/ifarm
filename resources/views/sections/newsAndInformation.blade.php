<div class="section {{request()->edit == '1' ? 'overlay-container' : ''}}">
    <div class="title-section">
        <h1 class="text-center">News and Information from Central Luzon</h1>
        <h5 class="text-center">
            Latest news and information on agricultural activities and initiatives from Central Luzon.
        </h5>
        @if(request()->edit == 1)
            <div class="hover-overlay" style="width:100%; height:0">    
                <button type="button" class="btn btn-xs btn-primary" data-target="#editNewsSectionModal" data-toggle="modal"><i class="far fa-edit"></i></button>      
            </div>
        @endif
    </div>
    <div class="row">
        @foreach(App\Models\News::all() as $news_entry)
            <div class="col-lg-3">
                <div class="card">
                    <img class="card-img-top" src="/storage/page_images/{{$news_entry->thumbnail}}" alt="Card image cap" height="210px" style="overflow: hidden;object-fit: cover;">
                    <div class="card-body pl-3 pr-3">
                        <h5 class="card-title line-clamp" style="text-transform: uppercase"><b>{{$news_entry->title}}</b></h5>
                        <p class="card-text trail-end">
                            <i class="fas fa-user-edit "></i> {{$news_entry->author}}
                        </p>
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#viewNewsModal-{{$news_entry->id}}">Read</button>
                        
                        @if(request()->edit == 1)
                            <button type="button" data-toggle="modal" data-target="#editNewsModal-{{$news_entry->id}}" class="btn btn-dark">Edit</button>
                            <button type="button" data-toggle="modal" data-target="#deleteNewsModal-{{$news_entry->id}}" class="btn btn-dark">Delete</button>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        @if(request()->edit == 1)
            <div class="col-lg-3" style="margin-top: 25px !important;">
                <button type="button" style="height:311px;width:100%" data-toggle="modal" data-target="#createNewsModal" class="btn btn-primary">Add a unit<br><i class="fas fa-plus"></i></button>
            </div>
        @endif
    </div>
</div>

<div class="modal fade" id="editNewsSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<div class="modal fade" id="createNewsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ Form::open(['action' => ['NewsController@addNews'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Create News</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('title', 'News Title', ['class' => 'col-form-label required'])}}
                    {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Enter news title'])}}
                </div>
                <div class="form-group">
                    {{Form::label('author', 'News Author', ['class' => 'col-form-label required'])}}
                    {{Form::text('author', '', ['class' => 'form-control', 'placeholder' => 'Enter full name of author'])}}
                </div>
                <div class="form-group">
                    {{Form::label('description', 'Description', ['class' => 'col-form-label required'])}}
                    {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Add description', 'rows' => '4'])}}
                </div>
                <div class="form-group">
                    {{Form::label('image', 'News Thumbnail', ['class' => 'col-form-label required'])}}
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
        </div>
        {{Form::close()}}
    </div>
</div>

@foreach(App\Models\News::all() as $news_modal)
    <div class="modal fade" id="editNewsModal-{{$news_modal->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{ Form::open(['action' => ['NewsController@editNews', $news_modal->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create News</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> 
                <div class="modal-body">
                    <div class="form-group">
                        {{Form::label('title', 'News Title', ['class' => 'col-form-label required'])}}
                        {{Form::text('title', $news_modal->title, ['class' => 'form-control', 'placeholder' => 'Enter news title'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('author', 'News Author', ['class' => 'col-form-label required'])}}
                        {{Form::text('author', $news_modal->author, ['class' => 'form-control', 'placeholder' => 'Enter full name of author'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('description', 'Description', ['class' => 'col-form-label required'])}}
                        {{Form::textarea('description', $news_modal->description, ['class' => 'form-control', 'placeholder' => 'Add description', 'rows' => '4'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('image', 'News Thumbnail', ['class' => 'col-form-label required'])}}
                        <br>
                        @if($news_modal->thumbnail!=null)
                            <img src="/storage/page_images/{{$news_modal->thumbnail}}" class="card-img-top" style="object-fit: cover;overflow:hidden;width:100%;border:1px solid rgba(100,100,100,0.25)" >
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
                        {{Form::text('link', $news_modal->link, ['class' => 'form-control', 'placeholder' => 'Add website URL'])}}
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

    <div class="modal fade" id="viewNewsModal-{{$news_modal->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content pl-0 pr-0 pl-0">
                <img class="card-img-top" src="/storage/page_images/{{$news_modal->thumbnail}}" height="300px" style="overflow: hidden;object-fit: cover;">
                <div class="inner-modal pl-3 pr-3"> 
                    <div class="modal-header">
                        <span style="width:100%">
                            
                            <h2 style="text-transform: uppercase; font-weight:600; width:100%">{{$news_modal->title}}</h2>
                            <span class="text-muted">By: <i>{{$news_modal->author}}</i></span>
                        <span>
                    </div>
                    <div class="modal-body">
                        <p style="text-align:justify">{{$news_modal->description}}</p>
                    </div>
                    <div class="modal-footer">
                        <a href="{{$news_modal->link}}" target="_blank"><button type="button" class="btn btn-primary">Go to Link</button></a>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteNewsModal-{{$news_modal->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            {{ Form::open(['action' => ['NewsController@deleteNews', $news_modal->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                <input type="hidden" name="_method" value="delete">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Delete News</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="">Are you sure you want to delete: <b>{{$news_modal->title}}</b></p>
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
