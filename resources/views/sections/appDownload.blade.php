<div class="{{request()->edit == '1' ? 'overlay-container' : ''}}" >
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="mt-4" style="color:white; font-weight: bold">{{$landing_page->mobile_download_title}}</h1>
                <h3 class="mt-4">{{$landing_page->mobile_download_subtitle}}</h3>
                <h5 class="mt-4">{{$landing_page->mobile_download_note}}</h5>
                <a href="{{$landing_page->mobile_download_link}}" target="_blank" type="button" class="btn btn-lg btn-success mt-4" style="width:100%;">Download Here</a>
            </div>
            <div class="col-sm-6">
                <img alt="iFarm Banner" src="/storage/page_images/{{$landing_page->mobile_download_image}}" style="width:100%">
            </div>
        </div>
    </div>
    @if(request()->edit == 1 && $user != null)
        <div class="hover-overlay" style="width:100%">    
            <button type="button" class="btn btn-xs btn-primary" data-target="#editMobileDownloadModal" data-toggle="modal"><i class="far fa-edit"></i></button>      
        </div>
    @endif
</div>


<div class="modal fade" id="editMobileDownloadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Mobile App Download Section</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['action' => ['PagesController@updateMobileDownloadSection'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('mobile_download_visibility', 'Enable Section?', ['class' => 'col-form-label required'])}}
                    <input type="checkbox" checked data-toggle="toggle">
                </div>
                <div class="form-group">
                    {{Form::label('mobile_download_title', 'Mobile App Download Section Title', ['class' => 'col-form-label required'])}}
                    {{Form::text('mobile_download_title', $landing_page->mobile_download_title, ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
                </div>
                <div class="form-group">
                    {{Form::label('mobile_download_subtitle', 'Mobile App Download Subtitle', ['class' => 'col-form-label required'])}}
                    {{Form::textarea('mobile_download_subtitle', $landing_page->mobile_download_subtitle, ['class' => 'form-control', 'rows' => '4', 'placeholder' => 'Add a subtitle'])}}
                </div>
                <div class="form-group">
                    {{Form::label('mobile_download_note', 'Mobile App Download Subtitle', ['class' => 'col-form-label required'])}}
                    {{Form::textarea('mobile_download_note', $landing_page->mobile_download_note, ['class' => 'form-control', 'rows' => '4', 'placeholder' => 'Add a note'])}}
                </div>
                <div class="form-group">
                    @if($landing_page->mobile_download_image!=null)
                        <img src="/storage/page_images/{{$landing_page->mobile_download_image}}" class="card-img-top" style="object-fit: cover;overflow:hidden;width:100%;border:1px solid rgba(100,100,100,0.25)" >
                    @else
                        <div class="card-img-top center-vertically px-3" style="height:225px; width:100%; background-color: rgb(227, 227, 227);">
                            <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                                Upload a 1800x350px logo for the background.
                            </span>
                        </div>
                    @endif
                    {{Form::label('mobile_download_image', 'Mobile App Download Image', ['class' => 'col-form-label required'])}}
                    {{ Form::file('mobile_download_image', ['class' => 'form-control mb-3 pt-1'])}}
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

