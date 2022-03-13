<nav class="navbar navbar-expand-md navbar-light shadow-sm fixed-top" style="background-color:#006400">             
    <div class="container">
        <a class="navbar-brand" href="https://competense.com/ifarm">
            <h4 style="color:white"><i class="fa fa-puzzle-piece"></i> i-FARM</h4>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <div class="btn-group">
                    <button class="btn navbar-btn dropdown-toggle navbar-btn btn-white ml-2 text-white" data-toggle="dropdown"> Forms</button>
                    <div class="dropdown-menu navbar-dark text-white" style="background-color:#006400">
                      
                      <a id="mnuFrmPlant" class="dropdown-item nav-link text-white" href="https://competense.com/ifarm/planting"><i class="fa fa-seedling"></i> Planting</a> 
                      <a id="mnuFrmHarvest" class="dropdown-item nav-link text-white" href="https://competense.com/ifarm/harvesting"><i class="fa fa-sign-language"></i> Harvesting</a> 
                      <a id="mnuFrmDmg" class="dropdown-item nav-link text-white" href="https://competense.com/ifarm/damage-assessment"><i class="fa fa-clipboard-check"></i> Damage assessment</a>
                      <a id="mnuFrmRehab" class="dropdown-item nav-link text-white" href="https://competense.com/ifarm/rehabilitation-and-interventions"><i class="fa fa-hands-helping"></i> Rehabilitation and interventions</a>
                    </div>   
                </div> 
                    <div class="btn-group">
                        <button class="btn navbar-btn dropdown-toggle navbar-btn btn-white ml-2 text-white" data-toggle="dropdown"> Lookups</button>
                        <div class="dropdown-menu text-white" style="background-color:#006400">
                            <a onclick="dummy()" class="dropdown-item nav-link text-white" href="https://competense.com/ifarm/lookup/Cause-of-damage" data-id="4"><i class="fa fa-search"></i> Cause of damage</a>
                            <a onclick="dummy()" class="dropdown-item nav-link text-white" href="https://competense.com/ifarm/lookup/Commodity" data-id="4"><i class="fa fa-search"></i> Commodity</a>	                                
                            <a onclick="dummy()" class="dropdown-item nav-link text-white" href="https://competense.com/ifarm/lookup/Ecosystem" data-id="4"><i class="fa fa-search"></i> Ecosystem</a>	                
                            <a onclick="dummy()" class="dropdown-item nav-link text-white" href="https://competense.com/ifarm/lookup/Extent-of-damage" data-id="4"><i class="fa fa-search"></i> Extent of damage</a>                    
                            <a onclick="dummy()" class="dropdown-item nav-link text-white" href="https://competense.com/ifarm/lookup/Program-Projects-Activities" data-id="4"><i class="fa fa-search"></i> Program/Projects activities</a>
                            <a onclick="dummy()" class="dropdown-item nav-link text-white" href="https://competense.com/ifarm/lookup/Rehab-fund-source" data-id="4"><i class="fa fa-search"></i> Rehab. fund source</a>
                            <a onclick="dummy()" class="dropdown-item nav-link text-white" href="https://competense.com/ifarm/lookup/Report-type" data-id="4"><i class="fa fa-search"></i> Report type</a>	
                            <a onclick="dummy()" class="dropdown-item nav-link text-white" href="https://competense.com/ifarm/lookup/Seed-source" data-id="4"><i class="fa fa-search"></i> Seed source</a>	
                            <a onclick="dummy()" class="dropdown-item nav-link text-white" href="https://competense.com/ifarm/lookup/Seed-type" data-id="4"><i class="fa fa-search"></i> Seed type</a>
                            <a onclick="dummy()" class="dropdown-item nav-link text-white" href="https://competense.com/ifarm/lookup/Stage-of-development" data-id="4"><i class="fa fa-search"></i> Stage of development</a>
                            <a onclick="dummy()" class="dropdown-item nav-link text-white" href="https://competense.com/ifarm/lookup/Unit" data-id="4"><i class="fa fa-search"></i> Unit</a>                                                                
                        </div>   
                    </div> 
                <div class="btn-group">
                    <button class="btn navbar-btn dropdown-toggle navbar-btn btn-white ml-2 text-white" data-toggle="dropdown"> Reports</button>
                    <div class="dropdown-menu text-white" style="background-color:#006400">
                      
                      <a onclick="dummy()" class="dropdown-item nav-link text-white" href="https://competense.com/ifarm/report/Planting-general" data-id="4"><i class="fa fa-newspaper"></i> Planting - general</a>                              
                      <a onclick="dummy()" class="dropdown-item nav-link text-white" href="https://competense.com/ifarm/report/Planting-accomplishment-rice" data-id="4"><i class="fa fa-newspaper"></i> Planting accomplishment - Rice</a>
                      <a onclick="dummy()" class="dropdown-item nav-link text-white" href="https://competense.com/ifarm/report/Planting-accomplishment-corn" data-id="4"><i class="fa fa-newspaper"></i> Planting accomplishment - Corn</a>
                      <a onclick="dummy()" class="dropdown-item nav-link text-white" href="https://competense.com/ifarm/report/Planting-standing-crops" data-id="4"><i class="fa fa-newspaper"></i> Planting - standing crops</a> 
                      <a onclick="dummy()" class="dropdown-item nav-link text-white" href="https://competense.com/ifarm/report/Planting-fill-up-form" data-id="4"><i class="fa fa-file-contract"></i> Planting - fill up form</a>
                      <div class="dropdown-divider"></div>  
                      <a onclick="dummy()" class="dropdown-item nav-link text-white" href="https://competense.com/ifarm/report/Harvesting-accomplishment-rice" data-id="4"><i class="fa fa-newspaper"></i> Harvesting accomplishment - Rice</a> 
                      
                    </div>   
                </div> 
                <div class="btn-group">
                    <a href="/" class="btn navbar-btn btn-white ml-1 text-white"> Crop Monitoring</a>
                </div> 
            </ul>
            <ul class="navbar-nav ml-auto">
                @guest
                <li class="nav-item">
                    <a class="nav-link" style="color:white !important" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                </li>
                <!--
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" style="color:white !important" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                    </li>
                @endif
                -->
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" style="color:white !important" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Welcome, {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

  
