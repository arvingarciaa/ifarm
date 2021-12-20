<div class="section {{request()->edit == '1' ? 'overlay-container' : ''}}">
    <h1 class="text-center">Analytics Dashboard</h1>
    <h5 class="text-center">
        Analytics dashboard aids key management decisions using site-specific data translated into graphs, tables, and infographics.
    </h5>
    <div class="row mt-4">
        <div class="col-sm-3 text-center">
            <select class="form-control">
                <option>Corn</option>
                <option>Rice</option>
            </select>
        </div>
        <div class="col-sm-3 text-center">
            <select class="form-control">
                <option>Select Date Range</option>
              </select>
        </div>
        <div class="col-sm-2 text-center">
            <select class="form-control">
                <option>Tarlac</option>
              </select>
        </div>
        <div class="col-sm-2 text-center">
            <select class="form-control">
                <option>La Paz</option>
                <option>Concepcion</option>
              </select>
        </div>
        <div class="col-sm-2 text-center">
            <select class="form-control">
                <option>Castillo</option>
                <option>Magao</option>
                <option>Balanoy</option>
                <option>Caut</option>
              </select>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-4 col-md-12">
            <img alt="iFarm Banner" src="/storage/page_images/ndvi_1.png" style="width:100%">
        </div>
        <div class="col-lg-4 col-md-12">
            <img alt="iFarm Banner" src="/storage/page_images/ndvi_2.png" style="width:100%">
        </div>
        <div class="col-lg-4 col-md-12">
            <img alt="iFarm Banner" src="/storage/page_images/ndvi_3.png" style="width:100%">
        </div>
    </div>
    @if(request()->edit == 1)
        <div class="hover-overlay" style="width:100%">    
            <button type="button" class="btn btn-xs btn-primary" data-target="#editCroppingAdvisoriesSectionModal" data-toggle="modal"><i class="far fa-edit"></i></button>      
        </div>
    @endif
</div>