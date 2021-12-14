<div class="section {{request()->edit == '1' ? 'overlay-container' : ''}}">
    <h1 class="text-center">Analytics Dashboard</h1>
    <h5 class="text-center">
        Analytics dashboard aids key management decisions using site-specific data translated into graphs, tables, and infographics.
    </h5>
    <div class="row mt-4 px-5 mx-5">
        <div class="px-5 col-sm-3 text-center">
            <select class="form-control">
                <option>Corn</option>
                <option>Rice</option>
            </select>
        </div>
        <div class="col-sm-3 px-5 text-center">
            <select class="form-control">
                <option>Select Date Range</option>
              </select>
        </div>
        <div class="col-sm-2 px-5 text-center">
            <select class="form-control">
                <option>Tarlac</option>
              </select>
        </div>
        <div class="col-sm-2 px-5 text-center">
            <select class="form-control">
                <option>La Paz</option>
                <option>Concepcion</option>
              </select>
        </div>
        <div class="col-sm-2 px-5 text-center">
            <select class="form-control">
                <option>Castillo</option>
                <option>Magao</option>
                <option>Balanoy</option>
                <option>Caut</option>
              </select>
        </div>
    </div>
    <div class="row px-5 mx-5 mt-5">
        <div class="col-sm-3">
            <img alt="iFarm Banner" src="/storage/page_images/1.jpg" style="width:100%">
        </div>
        <div class="col-sm-3">
            <img alt="iFarm Banner" src="/storage/page_images/2.jpg" style="width:100%">
        </div>
        <div class="col-sm-3">
            <img alt="iFarm Banner" src="/storage/page_images/3.jpg" style="width:100%">
        </div>
        <div class="col-sm-3">
            <img alt="iFarm Banner" src="/storage/page_images/4.jpg" style="width:100%">
        </div>
        
        <div class="col-sm-3">
            <img alt="iFarm Banner" src="/storage/page_images/5.jpg" style="width:100%">
        </div>
        <div class="col-sm-3">
            <img alt="iFarm Banner" src="/storage/page_images/6.jpg" style="width:100%">
        </div>
        <div class="col-sm-3">
            <img alt="iFarm Banner" src="/storage/page_images/7.jpg" style="width:100%">
        </div>
        <div class="col-sm-3">
            <img alt="iFarm Banner" src="/storage/page_images/8.jpg" style="width:100%">
        </div>
    </div>
    <div class="row px-5 mx-5 mt-5">
        <div class="col-sm-6">
            <img alt="iFarm Banner" src="/storage/page_images/9.png" style="width:100%">
        </div>
        <div class="col-sm-6">
            <img alt="iFarm Banner" src="/storage/page_images/10.png" style="width:100%">
        </div>
    </div>
    @if(request()->edit == 1)
        <div class="hover-overlay" style="width:100%">    
            <button type="button" class="btn btn-xs btn-primary" data-target="#editCroppingAdvisoriesSectionModal" data-toggle="modal"><i class="far fa-edit"></i></button>      
        </div>
    @endif
</div>