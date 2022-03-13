<div class="{{request()->edit == '1' ? 'overlay-container' : ''}}" >
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="mt-4" style="color:white; font-weight: bold">iFarm Crop Monitoring App</h1>
                <h3 class="mt-4">Want to access the iFarm outputs on your mobile phones? Download our mobile application now!</h3>
                <h5 class="mt-4">
                    *Please note that the application is still on testing phase so you may need to download the latest version once a month
                </h5>
                <button type="button" class="btn btn-lg btn-success mt-4" style="width:100%;">Download Here</button>
            </div>
            <div class="col-sm-6">
                <img alt="iFarm Banner" src="/storage/page_images/11.png" style="width:100%">
            </div>
        </div>
    </div>
    @if(request()->edit == 1 && $user != null)
        <div class="hover-overlay" style="width:100%">    
            <button type="button" class="btn btn-xs btn-primary" data-target="#editCroppingAdvisoriesSectionModal" data-toggle="modal"><i class="far fa-edit"></i></button>      
        </div>
    @endif
</div>