<div class="{{request()->edit == '1' && $user != null ? 'overlay-container' : ''}} fill-container">
    <img alt="iFarm Banner" src="/storage/page_images/{{isset($landing_page->top_banner) ? $landing_page->top_banner : 'ifarm_v3.png'}}" style="width:100%">
    @if(request()->edit == 1 && $user != null)
        <div class="hover-overlay" style="width:100%">    
            <button type="button" class="btn btn-xs btn-primary" data-target="#editTopBannerSectionModal" data-toggle="modal"><i class="far fa-edit"></i></button>      
        </div>
    @endif
</div>


<div class="modal fade" id="editTopBannerSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Top Banner Section</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['action' => ['PagesController@updateTopBanner'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('top_banner_visibility', 'Enable Section?', ['class' => 'col-form-label required'])}}
                    <input type="checkbox" checked data-toggle="toggle">
                </div>
                <div class="form-group">
                    @if($landing_page->top_banner!=null)
                        <img src="/storage/page_images/{{$landing_page->top_banner}}" class="card-img-top" style="object-fit: cover;overflow:hidden;width:100%;border:1px solid rgba(100,100,100,0.25)" >
                    @else
                        <div class="card-img-top center-vertically px-3" style="height:225px; width:100%; background-color: rgb(227, 227, 227);">
                            <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                                Upload a 1800x350px logo for the background.
                            </span>
                        </div>
                    @endif
                    {{Form::label('image', 'iFarm Top Banner', ['class' => 'col-form-label required'])}}
                    {{ Form::file('image', ['class' => 'form-control mb-3 pt-1'])}}
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