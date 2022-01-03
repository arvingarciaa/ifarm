<?php 
    $wunderground = App\Models\WeatherData::where('source', '=', 'wunderground')->first();
    $openweathermap = App\Models\WeatherData::where('source', '=', 'openweathermap')->first();
    $weather_data_wunderground = json_decode($wunderground->data, TRUE);
    $weather_data_openweathermap = json_decode($openweathermap->data, TRUE);
?>

<div class="section {{request()->edit == '1' ? 'overlay-container' : ''}}" style="padding-bottom:0px !important">
    <h1 class="text-center">{!!isset($landing_page->weather_title) ? nl2br($landing_page->weather_title) : 'Weather Forecast and Rainfall Outlook'!!}</h1>
    <h5 class="text-center">
        {!!isset($landing_page->weather_subtitle) ? nl2br($landing_page->weather_subtitle) : 'Weather Forecast for the next 5 days and Rainfall Outlook for the next 5 months. Summary of farm information of the selected site.'!!}
    </h5>
    <div class="row mt-4">
        <div class="col-lg-6 col-sm-12" style="margin:auto">
            <div class="row">
                <div class="col-12">
                    <a href="{!!isset($landing_page->weather_link) ? $landing_page->weather_link : 'https://oahajj.users.earthengine.app/view/ifarm-farm-level-ndvi'!!}" target="_blank" class="text-center">
                        <img alt="iFarm Banner" src="/storage/page_images/{!!isset($landing_page->weather_image) ? $landing_page->weather_image : '15.png'!!}" style="width:100%" class="mb-1">
                    </a>
                </div>
                <div class="col-12 text-center show-when-mobile" style="display:none">
                    <hr class="rounded" style="margin-top:0;margin-bottom:0.5rem;">
                    <a href="{!!isset($landing_page->weather_link) ? $landing_page->weather_link : 'https://oahajj.users.earthengine.app/view/ifarm-farm-level-ndvi'!!}" target="_blank" class="text-center" style="color:blue"><h6>Click to see Interactive Map</h6></a>   
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <select class="form-control" style="width: 50%; display:inline">
                            <option selected>Select Site</option>
                            <option>La Paz, Tarlac</option>
                            <option>Concepcion, Tarlac</option>
                        </select>
                    </div>
                    <h5 class="text-center mt-4"><b>
                        Weather Forecast for the next 5 days</b>
                    </h5>
                    <div class="row mt-2">
                        <table class="col-12 text-center forecast-table">
                            <tr>
                                <th></th>
                                <td><img src="/storage/page_images/weather_4.png" style="width:35px"></td>
                                <td><img src="/storage/page_images/weather_2.png" style="width:35px"></td>
                                <td><img src="/storage/page_images/weather_3.png" style="width:35px"></td>
                                <td><img src="/storage/page_images/weather_2.png" style="width:35px"></td>
                                <td><img src="/storage/page_images/weather_3.png" style="width:35px"></td>
                            </tr>
                            <tr style="font-size:90%">
                                <th style="width:25%">Date</th>
                                <td style="width:15%">Today</td>
                                <td style="width:15%">{{date('M d', strtotime("+1 day"))}}</td>
                                <td style="width:15%">{{date('M d', strtotime("+2 day"))}}</td>
                                <td style="width:15%">{{date('M d', strtotime("+3 day"))}}</td>
                                <td style="width:15%">{{date('M d', strtotime("+4 day"))}}</td>
                            </tr>
                            <tr style="font-size:90%">
                                <th style="width:25%">Precipitation</th>
                                <td style="width:15%">{{$weather_data_openweathermap['daily'][0]['pop']*100}}% chance of<br> {{!isset($weather_data_openweathermap['daily'][0]['rain']) ? '< 0.01' : $weather_data_openweathermap['daily'][0]['rain']}}mm rain</td>
                                <td style="width:15%">{{$weather_data_openweathermap['daily'][1]['pop']*100}}% chance of<br> {{!isset($weather_data_openweathermap['daily'][1]['rain']) ? '< 0.01' : $weather_data_openweathermap['daily'][1]['rain']}}mm rain</td>
                                <td style="width:15%">{{$weather_data_openweathermap['daily'][2]['pop']*100}}% chance of<br> {{!isset($weather_data_openweathermap['daily'][2]['rain']) ? '< 0.01' : $weather_data_openweathermap['daily'][2]['rain']}}mm rain</td>
                                <td style="width:15%">{{$weather_data_openweathermap['daily'][3]['pop']*100}}% chance of<br> {{!isset($weather_data_openweathermap['daily'][3]['rain']) ? '< 0.01' : $weather_data_openweathermap['daily'][3]['rain']}}mm rain</td>
                                <td style="width:15%">{{$weather_data_openweathermap['daily'][4]['pop']*100}}% chance of<br> {{!isset($weather_data_openweathermap['daily'][4]['rain']) ? '< 0.01' : $weather_data_openweathermap['daily'][4]['rain']}}mm rain</td>
                            </tr>
                        </table>
                    </div>
                    <hr class="rounded">
                    <h5 class="text-center"><b>
                        Rainfall Outlook for December, 2021 to April, 2022</b>
                    </h5>
                    <div class="row">
                        <table class="col-12 text-center forecast-table">
                            <tr style="font-size:90%">
                                <th style="width:25%">Month</th>
                                <td style="width:15%">Dec 2021</td>
                                <td style="width:15%">Jan 2021</td>
                                <td style="width:15%">Feb 2022</td>
                                <td style="width:15%">Mar 2022</td>
                                <td style="width:15%">Apr 2022</td>
                            </tr>
                            <tr style="font-size:90%">
                                <th style="width:25%">Monthly Ave</th>
                                <td style="width:15%"><img src="/storage/page_images/rainfall_5.png" style="width:15px">33 mm</td>
                                <td style="width:15%"><img src="/storage/page_images/rainfall_2.png" style="width:15px">14 mm</td>
                                <td style="width:15%"><img src="/storage/page_images/rainfall_1.png" style="width:15px">11 mm</td>
                                <td style="width:15%"><img src="/storage/page_images/rainfall_4.png" style="width:15px">27 mm</td>
                                <td style="width:15%"><img src="/storage/page_images/rainfall_6.png" style="width:15px">58 mm</td>
                            </tr>
                        </table>
                    </div>
                    <hr class="rounded">
                    <h5 class="text-center"><b>
                        Quick farm stats on the area as of December 3, 2021</b>
                    </h5>
                    <div class="row">
                        <div class="offset-1"></div>
                        <div class="col-5">
                            <h5>Number of Farm Lots</h5>
                            <h2 style="font-weight:700 !important">
                                587
                            </h2>
                        </div>
                        <div class="offset-1"></div>
                        <div class="col-5">
                            <h5>Percent of Plots Harvested</h5>
                            <h2 style="font-weight:700 !important">
                                9%
                            </h2>
                        </div>
                        <div class="offset-1"></div>
                        <div class="col-5">
                            <h5>Percent of Plots in Vegetative State</h5>
                            <h2 style="font-weight:700 !important">
                                84%
                            </h2>
                        </div>
                        <div class="offset-1"></div>
                        <div class="col-5">
                            <h5>Percent of Plots in Reproductive State</h5>
                            <h2 style="font-weight:700 !important">
                                7%
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-12 show-when-mobile" style="display:none">
                    <hr class="rounded" style="margin-top:0;margin-bottom:0.5rem;">
                    <a href="https://www.pagasa.dost.gov.ph/" target="_blank" class="text-center" style="color:blue"><h6>Click to see weather data from DOST-PAGASA</h6></a>   
                </div>
            </div>
        </div>
        <div class="col-6 hide-when-mobile">
            <hr class="rounded" style="margin-top:0;margin-bottom:0.5rem;">
            <a href="{!!isset($landing_page->weather_link) ? $landing_page->weather_link : 'https://oahajj.users.earthengine.app/view/ifarm-farm-level-ndvi'!!}" target="_blank" class="text-center" style="color:blue"><h6>Click to see Interactive Map</h6></a>   
        </div>
        <div class="col-6 hide-when-mobile">
            <hr class="rounded" style="margin-top:0;margin-bottom:0.5rem;">
            <a href="https://www.pagasa.dost.gov.ph/" target="_blank" class="text-center" style="color:blue"><h6>Click to visit PAGASA website</h6></a>   
        </div>

        <div class="expand-collapse">
            <h4 id="collapse-button" style="padding-bottom:8px">Click to see more weather data in the area<br><i class="fas fa-angle-down"></i>
            </h4>
            <div class="collapse-content">
                <h2>Tarlac City, Tarlac, Philippines</h2>
                
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-xl-4 mt-3">
                        <div class="row">
                            <div class="col-2">
                                <img src="https://www.wunderground.com/static/i/c/v4/{{$weather_data_wunderground['daypart'][0]['iconCode'][0]}}.svg" style="max-width:60px">
                            </div>
                            <div class="col-10 row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-5">
                                            <b>{{$weather_data_wunderground['daypart'][0]['daypartName'][0]}}</b> {{date('m/d')}}
                                        </div>
                                        <div class="col-7">
                                            <b style="color:rgb(90,132,160); text-decoration:underline">
                                                {{$weather_data_openweathermap['daily'][0]['pop']*100}}% chance of rain / {{!isset($weather_data_openweathermap['daily'][0]['rain']) ? '< 0.01' : $weather_data_openweathermap['daily'][0]['rain']}}mm
                                            </b>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    {{$weather_data_wunderground['daypart'][0]['narrative'][0]}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4 mt-3">
                        <div class="row">
                            <div class="col-2">
                                <img src="https://www.wunderground.com/static/i/c/v4/{{$weather_data_wunderground['daypart'][0]['iconCode'][1]}}.svg" style="max-width:60px">
                            </div>
                            <div class="col-10 row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-5">
                                            <b>{{$weather_data_wunderground['daypart'][0]['daypartName'][1]}}</b> {{date('m/d')}}
                                        </div>
                                        <div class="col-7">
                                            <b style="color:rgb(90,132,160); text-decoration:underline">
                                                {{$weather_data_wunderground['daypart'][0]['precipChance'][1]}}% chance of rain / {{$weather_data_wunderground['daypart'][0]['qpf'][1]}}mm
                                            </b>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    {{$weather_data_wunderground['daypart'][0]['narrative'][1]}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4 mt-3">
                        <div class="row">
                            <div class="col-2">
                                <img src="https://www.wunderground.com/static/i/c/v4/{{$weather_data_wunderground['daypart'][0]['iconCode'][2]}}.svg" style="max-width:60px">
                            </div>
                            <div class="col-10 row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-5">
                                            <b>{{$weather_data_wunderground['daypart'][0]['daypartName'][2]}}</b> {{date('m/d', strtotime("+1 day"))}}
                                        </div>
                                        <div class="col-7">
                                            <b style="color:rgb(90,132,160); text-decoration:underline">
                                                {{$weather_data_openweathermap['daily'][1]['pop']*100}}% chance of rain / {{!isset($weather_data_openweathermap['daily'][0]['rain']) ? '< 0.01' : $weather_data_openweathermap['daily'][1]['rain']}}mm
                                            </b>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    {{$weather_data_wunderground['daypart'][0]['narrative'][2]}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <hr class="rounded">
                <h4>8-Day Weather Forecast</h4>
                <div class="table-responsive">
                    <table class="col-12 text-center mt-4 forecast-table">
                        <tr>
                            <td>Today {{date('m/d')}}</td>
                            <td>{{date('D m/d', strtotime("+1 day"))}}</td>
                            <td>{{date('D m/d', strtotime("+2 day"))}}</td>
                            <td>{{date('D m/d', strtotime("+3 day"))}}</td>
                            <td>{{date('D m/d', strtotime("+4 day"))}}</td>
                            <td>{{date('D m/d', strtotime("+5 day"))}}</td>
                            <td>{{date('D m/d', strtotime("+6 day"))}}</td>
                            <td>{{date('D m/d', strtotime("+7 day"))}}</td>
                        </tr>
                        <tr>
                            <td><span style="color:#d5202a">{{$weather_data_openweathermap['daily'][0]['temp']['max']}}°C</span> | <span style="color: #0053ae">{{$weather_data_openweathermap['daily'][0]['temp']['min']}}°C</span><br> <img src="http://openweathermap.org/img/wn/{{$weather_data_openweathermap['daily'][0]['weather'][0]['icon']}}@2x.png" style="max-width:75px"></td>
                            <td><span style="color:#d5202a">{{$weather_data_openweathermap['daily'][1]['temp']['max']}}°C</span> | <span style="color: #0053ae">{{$weather_data_openweathermap['daily'][1]['temp']['min']}}°C</span><br> <img src="http://openweathermap.org/img/wn/{{$weather_data_openweathermap['daily'][1]['weather'][0]['icon']}}@2x.png" style="max-width:75px"></td>
                            <td><span style="color:#d5202a">{{$weather_data_openweathermap['daily'][2]['temp']['max']}}°C</span> | <span style="color: #0053ae">{{$weather_data_openweathermap['daily'][2]['temp']['min']}}°C</span><br> <img src="http://openweathermap.org/img/wn/{{$weather_data_openweathermap['daily'][2]['weather'][0]['icon']}}@2x.png" style="max-width:75px"></td>
                            <td><span style="color:#d5202a">{{$weather_data_openweathermap['daily'][3]['temp']['max']}}°C</span> | <span style="color: #0053ae">{{$weather_data_openweathermap['daily'][3]['temp']['min']}}°C</span><br> <img src="http://openweathermap.org/img/wn/{{$weather_data_openweathermap['daily'][3]['weather'][0]['icon']}}@2x.png" style="max-width:75px"></td>
                            <td><span style="color:#d5202a">{{$weather_data_openweathermap['daily'][4]['temp']['max']}}°C</span> | <span style="color: #0053ae">{{$weather_data_openweathermap['daily'][4]['temp']['min']}}°C</span><br> <img src="http://openweathermap.org/img/wn/{{$weather_data_openweathermap['daily'][4]['weather'][0]['icon']}}@2x.png" style="max-width:75px"></td>
                            <td><span style="color:#d5202a">{{$weather_data_openweathermap['daily'][5]['temp']['max']}}°C</span> | <span style="color: #0053ae">{{$weather_data_openweathermap['daily'][5]['temp']['min']}}°C</span><br> <img src="http://openweathermap.org/img/wn/{{$weather_data_openweathermap['daily'][5]['weather'][0]['icon']}}@2x.png" style="max-width:75px"></td>
                            <td><span style="color:#d5202a">{{$weather_data_openweathermap['daily'][6]['temp']['max']}}°C</span> | <span style="color: #0053ae">{{$weather_data_openweathermap['daily'][6]['temp']['min']}}°C</span><br> <img src="http://openweathermap.org/img/wn/{{$weather_data_openweathermap['daily'][6]['weather'][0]['icon']}}@2x.png" style="max-width:75px"></td>
                            <td><span style="color:#d5202a">{{$weather_data_openweathermap['daily'][7]['temp']['max']}}°C</span> | <span style="color: #0053ae">{{$weather_data_openweathermap['daily'][7]['temp']['min']}}°C</span><br> <img src="http://openweathermap.org/img/wn/{{$weather_data_openweathermap['daily'][7]['weather'][0]['icon']}}@2x.png" style="max-width:75px"></td>
                        </tr>
                        <tr style="font-size:90%">
                            <td class="px-2">{{$weather_data_openweathermap['daily'][0]['pop']*100}}% chance of {{!isset($weather_data_openweathermap['daily'][0]['rain']) ? '< 0.01' : $weather_data_openweathermap['daily'][0]['rain']}}mm rain</td>
                            <td class="px-2">{{$weather_data_openweathermap['daily'][1]['pop']*100}}% chance of {{!isset($weather_data_openweathermap['daily'][1]['rain']) ? '< 0.01' : $weather_data_openweathermap['daily'][1]['rain']}}mm rain</td>
                            <td class="px-2">{{$weather_data_openweathermap['daily'][2]['pop']*100}}% chance of {{!isset($weather_data_openweathermap['daily'][2]['rain']) ? '< 0.01' : $weather_data_openweathermap['daily'][2]['rain']}}mm rain</td>
                            <td class="px-2">{{$weather_data_openweathermap['daily'][3]['pop']*100}}% chance of {{!isset($weather_data_openweathermap['daily'][3]['rain']) ? '< 0.01' : $weather_data_openweathermap['daily'][3]['rain']}}mm rain</td>
                            <td class="px-2">{{$weather_data_openweathermap['daily'][4]['pop']*100}}% chance of {{!isset($weather_data_openweathermap['daily'][4]['rain']) ? '< 0.01' : $weather_data_openweathermap['daily'][4]['rain']}}mm rain</td>
                            <td class="px-2">{{$weather_data_openweathermap['daily'][5]['pop']*100}}% chance of {{!isset($weather_data_openweathermap['daily'][5]['rain']) ? '< 0.01' : $weather_data_openweathermap['daily'][5]['rain']}}mm rain</td>
                            <td class="px-2">{{$weather_data_openweathermap['daily'][6]['pop']*100}}% chance of {{!isset($weather_data_openweathermap['daily'][6]['rain']) ? '< 0.01' : $weather_data_openweathermap['daily'][6]['rain']}}mm rain</td>
                            <td class="px-2">{{$weather_data_openweathermap['daily'][7]['pop']*100}}% chance of {{!isset($weather_data_openweathermap['daily'][7]['rain']) ? '< 0.01' : $weather_data_openweathermap['daily'][7]['rain']}}mm rain</td>
                        </tr>
                        <tr style="font-size:90%">
                            <td>{{ucwords($weather_data_openweathermap['daily'][0]['weather'][0]['description'])}}</td>
                            <td>{{ucwords($weather_data_openweathermap['daily'][1]['weather'][0]['description'])}}</td>
                            <td>{{ucwords($weather_data_openweathermap['daily'][2]['weather'][0]['description'])}}</td>
                            <td>{{ucwords($weather_data_openweathermap['daily'][3]['weather'][0]['description'])}}</td>
                            <td>{{ucwords($weather_data_openweathermap['daily'][4]['weather'][0]['description'])}}</td>
                            <td>{{ucwords($weather_data_openweathermap['daily'][5]['weather'][0]['description'])}}</td>
                            <td>{{ucwords($weather_data_openweathermap['daily'][6]['weather'][0]['description'])}}</td>
                            <td>{{ucwords($weather_data_openweathermap['daily'][7]['weather'][0]['description'])}}</td>
                        </tr>
                    </table>
                </div>
                <hr class="rounded mt-5 mb-3">
                <h4 class="mb-4 mt-2">Hourly Forecast for Today</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="border-top:0px" scope="col">Time</th>
                                <th style="border-top:0px" scope="col">Conditions</th>
                                <th style="border-top:0px" scope="col">Temp</th>
                                <th style="border-top:0px" scope="col">Feels Like</th>
                                <th style="border-top:0px" scope="col">Precip</th>
                                <th style="border-top:0px" scope="col">Amount</th>
                                <th style="border-top:0px" scope="col">Cloud Cover</th>
                                <th style="border-top:0px" scope="col">Dew Point</th>
                                <th style="border-top:0px" scope="col">Humidity</th>
                                <th style="border-top:0px" scope="col">Wind</th>
                                <th style="border-top:0px" scope="col">Pressure</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 0; $i < 24; $i++)
                                <tr>
                                    <th style="max-width:100%; white-space:nowrap;font-size:14px" scope="row">{{gmdate("h:i A", $weather_data_openweathermap['hourly'][$i]['dt'])}}</th>
                                    <td style="max-width:100%; white-space:nowrap;font-size:14px"><img src="http://openweathermap.org/img/wn/{{$weather_data_openweathermap['hourly'][$i]['weather'][0]['icon']}}@2x.png" style="max-width:35px"> {{ucwords($weather_data_openweathermap['hourly'][$i]['weather'][0]['description'])}}</td>
                                    <td style="max-width:100%; white-space:nowrap;font-size:14px">{{$weather_data_openweathermap['hourly'][$i]['temp']}}°C</td>
                                    <td style="max-width:100%; white-space:nowrap;font-size:14px">{{$weather_data_openweathermap['hourly'][$i]['feels_like']}}°C</td>
                                    <td style="max-width:100%; white-space:nowrap;font-size:14px">{{$weather_data_openweathermap['hourly'][$i]['pop']*100}}%</td>
                                    <td style="max-width:100%; white-space:nowrap;font-size:14px">{{!isset($weather_data_openweathermap['hourly'][$i]['rain']['1h']) ? '< 0.01' : $weather_data_openweathermap['hourly'][$i]['rain']['1h']}}mm</td>
                                    <td style="max-width:100%; white-space:nowrap;font-size:14px">{{$weather_data_openweathermap['hourly'][$i]['clouds']}}%</td>
                                    <td style="max-width:100%; white-space:nowrap;font-size:14px">{{$weather_data_openweathermap['hourly'][$i]['dew_point']}}</td>
                                    <td style="max-width:100%; white-space:nowrap;font-size:14px">{{$weather_data_openweathermap['hourly'][$i]['humidity']}}%</td>
                                    <td style="max-width:100%; white-space:nowrap;font-size:14px">{{$weather_data_openweathermap['hourly'][$i]['wind_speed']}} m/s {{$weather_data_openweathermap['hourly'][$i]['wind_deg']}} deg</td>
                                    <td style="max-width:100%; white-space:nowrap;font-size:14px">{{$weather_data_openweathermap['hourly'][$i]['pressure']}} hPa</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>    
                </div>    
            </div>
        </div>
    </div>
    @if(request()->edit == 1)
        <div class="hover-overlay" style="width:100%">    
            <button type="button" class="btn btn-xs btn-primary" data-target="#editWeatherSectionModal" data-toggle="modal"><i class="far fa-edit"></i></button>      
        </div>
    @endif
</div>


<div class="modal fade" id="editWeatherSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Weather Forecast Section</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['action' => ['PagesController@updateWeatherSection'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('weather_visibility', 'Enable Section?', ['class' => 'col-form-label required'])}}
                    <input type="checkbox" checked data-toggle="toggle" name="weather_visibility">
                </div>
                <div class="form-group">
                    {{Form::label('weather_title', 'Weather Forecast Section Title', ['class' => 'col-form-label required'])}}
                    {{Form::text('weather_title', $landing_page->weather_title, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('weather_subtitle', 'Weather Forecast Section Subtitle', ['class' => 'col-form-label required'])}}
                    {{Form::textarea('weather_subtitle', $landing_page->weather_subtitle, ['class' => 'form-control', 'rows' => '4'])}}
                </div>
                <div class="form-group">
                    {{Form::label('weather_map', 'Change Interactive Map (La Paz, Tarlac)', ['class' => 'col-form-label'])}}
                    <img src="/storage/page_images/15.png" class="card-img-top" style="object-fit: cover;overflow:hidden;width:100%;border:1px solid rgba(100,100,100,0.25)" >
                    {{ Form::file('weather_section_background_image', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
                </div>
                <div class="form-group">
                    {{Form::label('weather_map', 'Change Interactive Map (Concepcion, Tarlac)', ['class' => 'col-form-label'])}}
                    <div class="card-img-top center-vertically px-3" style="height:225px; width:100%; background-color: rgb(227, 227, 227);">
                        <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                            Upload a 700x500px image for the map.
                        </span>
                    </div>
                    {{ Form::file('weather_section_background_image', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
                </div>
                <hr class="my-0">
                {{Form::label('weather_section_background_banner', 'Change Section Background', ['class' => 'col-form-label'])}}
                <div class="input-group">
                    <label class="mr-2 radio-inline"><input type="radio" name="weather_background_color_radio" value="0" {{$landing_page->weather_background_type == 0 ? 'checked' : ''}}> Block color</label>
                    <label class="mx-2 radio-inline"><input type="radio" name="weather_background_color_radio" value="1" {{$landing_page->weather_background_type == 1 ? 'checked' : ''}}> Image</label>
                </div>
                <div class="form-group block-color-form-weather" style="{{$landing_page->weather_background_type == 1 ? 'display:none' : ''}}">
                    {{Form::label('weather_section_background_color', 'Set Block Color', ['class' => 'col-form-label'])}}
                    @if($landing_page->weather_background != null && $landing_page->weather_background_type == 0)
                    {{Form::text('weather_section_background_color', $landing_page->weather_background, ['class' => 'form-control', 'placeholder' => 'Add a hex'])}}
                    @else
                    {{Form::text('weather_section_background_color', '', ['class' => 'form-control', 'placeholder' => 'Add a hex'])}}
                    @endif
                </div>
                <div class="form-group background-image-form-weather" style="{{$landing_page->weather_background_type == 0 ? 'display:none' : ''}}">
                    {{Form::label('weather_section_background_image', 'Set Background Image', ['class' => 'col-form-label required'])}}
                    <br>
                    @if($landing_page->weather_background != null && $landing_page->weather_background_type == 1)
                    <img src="/storage/page_images/{{$landing_page->weather_background}}" class="card-img-top" style="object-fit: cover;overflow:hidden;width:100%;border:1px solid rgba(100,100,100,0.25)" >
                    @else
                    <div class="card-img-top center-vertically px-3" style="height:225px; width:100%; background-color: rgb(227, 227, 227);">
                        <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                            Upload a 1800x550px logo for the background.
                        </span>
                    </div>
                    @endif
                    {{ Form::file('weather_section_background_image', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

<style>
    td:not(:last-child),th:not(:last-child) {
        border-right: 1px solid blue;
    }

    .forecast-table {
        border-collapse: collapse;
    }
    .expand-collapse {
        width: 100%;
        margin: 0 auto;
    }
    .expand-collapse p {
        padding: 20px;
        margin: 0;
    }
    .expand-collapse div {
        padding: 0;
        margin: -2px 0 0 0;
    }
    .expand-collapse #collapse-button {
        cursor:  pointer;
        padding: 20px;
        margin: 0 0 2px;
        text-align:center;
        opacity: 30%;
    }
    .expand-collapse > #collapse-button:hover {
        opacity: 100%;
        transition: 0.75s ease-in-out;
    }

    .expand-collapse > #collapse-button.active {
        opacity: 100%;
        transition: 0.75s ease-in-out;
    }
    @media (max-width: 992px) {
        .hide-when-mobile {
            visibility: hidden;
            display: none;
        }
        .show-when-mobile{
            visibility: visible;
            display:block !important;
        }
    }
</style>

<script>
    $(document).ready(function() {
        $('.expand-collapse h4').each(function() {
            var tis = $(this), state = false, answer = tis.next('.collapse-content').slideUp();
            tis.click(function() {
                state = !state;
                answer.slideToggle(state);
                tis.toggleClass('active',state);
            });
        });
        $('input[name$="weather_background_color_radio"]').click(function() {
            if($(this).val() == '0') {
                $('.background-image-form-weather').hide();  
                $('.block-color-form-weather').show();            
            }
            else {
                $('.block-color-form-weather').hide();  
                $('.background-image-form-weather').show();   
            }
        });
    });
</script>