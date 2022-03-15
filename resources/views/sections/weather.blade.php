<?php 
    $wunderground = App\Models\WeatherData::where('source', '=', 'wunderground')->first();
    $openweathermap = App\Models\WeatherData::where('source', '=', 'openweathermap')->first();
    $openweathermap_la_paz = App\Models\WeatherData::where('source', '=', 'openweathermap_la_paz')->first();
    $openweathermap_concepcion = App\Models\WeatherData::where('source', '=', 'openweathermap_concepcion')->first();
    $weather_data_wunderground = json_decode($wunderground->data, TRUE);
    $weather_data_openweathermap = json_decode($openweathermap->data, TRUE);
    $weather_data_openweathermap_la_paz = json_decode($openweathermap_la_paz->data, TRUE);
    $weather_data_openweathermap_concepcion = json_decode($openweathermap_concepcion->data, TRUE);
?>

<div class="section {{request()->edit == '1' && $user != null ? 'overlay-container' : ''}}" style="padding-bottom:0px !important">
    <h1 class="text-center">{!!isset($landing_page->weather_title) ? nl2br($landing_page->weather_title) : 'Weather Forecast and Rainfall Outlook'!!}</h1>
    <h5 class="text-center">
        {!!isset($landing_page->weather_subtitle) ? nl2br($landing_page->weather_subtitle) : 'Weather Forecast for the next 5 days and Rainfall Outlook for the next 5 months. Summary of farm information of the selected site.'!!}
    </h5>
    <div class="row mt-4">

        <div class="text-center offset-lg-4 col-lg-4 offset-md-0 col-md-12">
            <select class="form-control" style="width:75%; display:inline" name="stats_site_selector" id="stats_site_selector">
                <option disabled>Select Site</option>
                <option value="1" selected>La Paz, Tarlac</option>
                <option value="2">Concepcion, Tarlac</option>
            </select>
        </div>
    </div>
    <div class="row">
        @foreach(App\Models\FarmStat::all() as $farm_stats_map)
        <div class="col-lg-5 col-sm-12 sites-all" style="margin:auto;display:{{$loop->first ? 'initial' : 'none'}}" id="site-{{$farm_stats_map->id}}">
            <div class="row">
                <div class="col-12">
                    <h5 class="text-center mt-4"><b>
                        Farm-level Planting Status as of {{isset($farm_stats_map->planting_status_image_date) ? $farm_stats_map->planting_status_image_date->format('M Y') : '--'}}</b>
                    </h5>
                    <a href="{{$farm_stats_map->map_link}}" target="_blank" class="text-center">
                        <img alt="iFarm Banner" src="storage/page_images/{!!$farm_stats_map->map_image!!}" style="width:100%;max-width:700px;max-height:480px" class="mb-1">
                    </a>
                </div>
                <div class="col-12 text-center show-when-mobile" style="display:none">
                    <hr class="rounded" style="margin-top:0;margin-bottom:0.5rem;">
                    <a href="{{$farm_stats_map->map_link}}" target="_blank" class="text-center" style="color:blue"><h6>Click to see Farm-level Planting Status</h6></a>   
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-lg-7 col-sm-12">
            <?php
                $citySpecificWeather['la_paz'] = $weather_data_openweathermap_la_paz;
                $citySpecificWeather['concepcion'] = $weather_data_openweathermap_concepcion;

            ?>
            <div class="row">
                <div class="col-12">
                    @foreach($citySpecificWeather as $key => $item)
                    <div class="forecast-all" style="display:{{$loop->first ? 'inherit' : 'none'}}" id="forecast-{{$loop->iteration}}">
                        <h5 class="text-center mt-4"><b>
                            Weather Forecast for {{ucwords(str_replace("_", " ", $key))}}, Tarlac in the next 6 days</b>
                        </h5>
                        <div class="row mt-2">
                            <table class="col-12 text-center forecast-table">
                                <tr>
                                    <th></th>
                                    <td><img src="http://openweathermap.org/img/wn/{{$item['daily'][0]['weather'][0]['icon']}}@2x.png" style="max-width:75px"></td>
                                    <td><img src="http://openweathermap.org/img/wn/{{$item['daily'][1]['weather'][0]['icon']}}@2x.png" style="max-width:75px"></td>
                                    <td><img src="http://openweathermap.org/img/wn/{{$item['daily'][2]['weather'][0]['icon']}}@2x.png" style="max-width:75px"></td>
                                    <td><img src="http://openweathermap.org/img/wn/{{$item['daily'][3]['weather'][0]['icon']}}@2x.png" style="max-width:75px"></td>
                                    <td><img src="http://openweathermap.org/img/wn/{{$item['daily'][4]['weather'][0]['icon']}}@2x.png" style="max-width:75px"></td>
                                    <td><img src="http://openweathermap.org/img/wn/{{$item['daily'][5]['weather'][0]['icon']}}@2x.png" style="max-width:75px"></td>
                                </tr>
                                <tr style="font-size:90%">
                                    <th style="width:14%">Date</th>
                                    <td style="width:14%">Today</td>
                                    <td style="width:14%">{{date('M d', strtotime("+1 day"))}}</td>
                                    <td style="width:14%">{{date('M d', strtotime("+2 day"))}}</td>
                                    <td style="width:14%">{{date('M d', strtotime("+3 day"))}}</td>
                                    <td style="width:14%">{{date('M d', strtotime("+4 day"))}}</td>
                                    <td style="width:14%">{{date('M d', strtotime("+5 day"))}}</td>
                                </tr>
                                <tr style="font-size:90%">
                                    <th style="width:14%">Precipitation</th>
                                    <td style="width:14%">{{$item['daily'][0]['pop']*100}}% chance of<br> {{!isset($item['daily'][0]['rain']) ? '< 0.01' : $item['daily'][0]['rain']}}mm</td>
                                    <td style="width:14%">{{$item['daily'][1]['pop']*100}}% chance of<br> {{!isset($item['daily'][1]['rain']) ? '< 0.01' : $item['daily'][1]['rain']}}mm</td>
                                    <td style="width:14%">{{$item['daily'][2]['pop']*100}}% chance of<br> {{!isset($item['daily'][2]['rain']) ? '< 0.01' : $item['daily'][2]['rain']}}mm</td>
                                    <td style="width:14%">{{$item['daily'][3]['pop']*100}}% chance of<br> {{!isset($item['daily'][3]['rain']) ? '< 0.01' : $item['daily'][3]['rain']}}mm</td>
                                    <td style="width:14%">{{$item['daily'][4]['pop']*100}}% chance of<br> {{!isset($item['daily'][4]['rain']) ? '< 0.01' : $item['daily'][4]['rain']}}mm</td>
                                    <td style="width:14%">{{$item['daily'][5]['pop']*100}}% chance of<br> {{!isset($item['daily'][5]['rain']) ? '< 0.01' : $item['daily'][5]['rain']}}mm</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    @endforeach
                    <hr class="rounded">
                    <h5 class="text-center"><b>
                        Rainfall Outlook for Tarlac ({{isset($landing_page->outlook_month) ? $landing_page->outlook_month->format('M Y') : '--'}} to {{isset($landing_page->outlook_month) ? $landing_page->outlook_month->addMonths(5)->format('M Y') : '--'}})</b>
                    </h5>
                    <div class="row">
                        <table class="col-12 text-center forecast-table">
                            <tr style="font-size:90%">
                                <th style="width:14%">Month</th>
                                <td style="width:14%;font-weight:900;font-size:16px">{{isset($landing_page->outlook_month) ? $landing_page->outlook_month->format('M Y') : '--'}}</td>
                                <td style="width:14%;font-weight:900;font-size:16px">{{isset($landing_page->outlook_month) ? $landing_page->outlook_month->addMonths(1)->format('M Y') : '--'}}</td>
                                <td style="width:14%;font-weight:900;font-size:16px">{{isset($landing_page->outlook_month) ? $landing_page->outlook_month->addMonths(2)->format('M Y') : '--'}}</td>
                                <td style="width:14%;font-weight:900;font-size:16px">{{isset($landing_page->outlook_month) ? $landing_page->outlook_month->addMonths(3)->format('M Y') : '--'}}</td>
                                <td style="width:14%;font-weight:900;font-size:16px">{{isset($landing_page->outlook_month) ? $landing_page->outlook_month->addMonths(4)->format('M Y') : '--'}}</td>
                                <td style="width:14%;font-weight:900;font-size:16px">{{isset($landing_page->outlook_month) ? $landing_page->outlook_month->addMonths(5)->format('M Y') : '--'}}</td>
                            </tr>
                            <tr style="font-size:90%">
                                <th style="width:14%">Min</th>
                                <td style="width:14%"><img src="/storage/website_assets/rainfall_1.png" style="width:15px">{{isset($landing_page->min_1) ? $landing_page->min_1 : '--'}} mm</td>
                                <td style="width:14%"><img src="/storage/website_assets/rainfall_1.png" style="width:15px">{{isset($landing_page->min_2) ? $landing_page->min_2 : '--'}} mm</td>
                                <td style="width:14%"><img src="/storage/website_assets/rainfall_3.png" style="width:15px">{{isset($landing_page->min_3) ? $landing_page->min_3 : '--'}} mm</td>
                                <td style="width:14%"><img src="/storage/website_assets/rainfall_5.png" style="width:15px">{{isset($landing_page->min_4) ? $landing_page->min_4 : '--'}} mm</td>
                                <td style="width:14%"><img src="/storage/website_assets/rainfall_4.png" style="width:15px">{{isset($landing_page->min_5) ? $landing_page->min_5 : '--'}} mm</td>
                                <td style="width:14%"><img src="/storage/website_assets/rainfall_5.png" style="width:15px">{{isset($landing_page->min_6) ? $landing_page->min_6 : '--'}} mm</td>
                            </tr>
                            <tr style="font-size:90%">
                                <th style="width:14%">Max</th>
                                <td style="width:14%"><img src="/storage/website_assets/rainfall_1.png" style="width:15px">{{isset($landing_page->max_1) ? $landing_page->max_1 : '--'}} mm</td>
                                <td style="width:14%"><img src="/storage/website_assets/rainfall_1.png" style="width:15px">{{isset($landing_page->max_2) ? $landing_page->max_2 : '--'}} mm</td>
                                <td style="width:14%"><img src="/storage/website_assets/rainfall_3.png" style="width:15px">{{isset($landing_page->max_3) ? $landing_page->max_3 : '--'}} mm</td>
                                <td style="width:14%"><img src="/storage/website_assets/rainfall_6.png" style="width:15px">{{isset($landing_page->max_4) ? $landing_page->max_4 : '--'}} mm</td>
                                <td style="width:14%"><img src="/storage/website_assets/rainfall_6.png" style="width:15px">{{isset($landing_page->max_5) ? $landing_page->max_5 : '--'}} mm</td>
                                <td style="width:14%"><img src="/storage/website_assets/rainfall_6.png" style="width:15px">{{isset($landing_page->max_6) ? $landing_page->max_6 : '--'}} mm</td>
                            </tr>
                            <tr style="font-size:90%">
                                <th style="width:14%">Mean</th>
                                <td style="width:14%;font-weight:900;font-size:16px"><img src="/storage/website_assets/rainfall_5.png" style="width:15px">{{isset($landing_page->mean_1) ? $landing_page->mean_1 : '--'}} mm</td>
                                <td style="width:14%;font-weight:900;font-size:16px"><img src="/storage/website_assets/rainfall_2.png" style="width:15px">{{isset($landing_page->mean_2) ? $landing_page->mean_2 : '--'}} mm</td>
                                <td style="width:14%;font-weight:900;font-size:16px"><img src="/storage/website_assets/rainfall_1.png" style="width:15px">{{isset($landing_page->mean_3) ? $landing_page->mean_3 : '--'}} mm</td>
                                <td style="width:14%;font-weight:900;font-size:16px"><img src="/storage/website_assets/rainfall_4.png" style="width:15px">{{isset($landing_page->mean_4) ? $landing_page->mean_4 : '--'}} mm</td>
                                <td style="width:14%;font-weight:900;font-size:16px"><img src="/storage/website_assets/rainfall_6.png" style="width:15px">{{isset($landing_page->mean_5) ? $landing_page->mean_5 : '--'}} mm</td>
                                <td style="width:14%;font-weight:900;font-size:16px"><img src="/storage/website_assets/rainfall_6.png" style="width:15px">{{isset($landing_page->mean_6) ? $landing_page->mean_6 : '--'}} mm</td>
                            </tr>
                        </table>
                    </div>
                    <hr class="rounded">
                    @foreach(App\Models\FarmStat::all() as $farm_stats_data)
                    <div class="row stats-all" style="display:{{$loop->first ? 'flex' : 'none'}}" id="stat-{{$farm_stats_data->id}}">

                        <h5 class="text-center col-12"><b>
                            Quick farm stats on the area as of {{isset($farm_stats_data->quick_farm_stats_date) ? $farm_stats_data->quick_farm_stats_date->format('M Y') : '--'}}</b>
                        </h5>
                        <div class="offset-1"></div>
                        <div class="col-5">
                            <h5>Number of Farm Lots</h5>
                            <h2 style="font-weight:700 !important">
                                {{$farm_stats_data->number_of_farm_lots}}
                            </h2>
                        </div>
                        <div class="offset-1"></div>
                        <div class="col-5">
                            <h5>Percent of Plots Harvested</h5>
                            <h2 style="font-weight:700 !important">
                                {{$farm_stats_data->plots_harvested}}%
                            </h2>
                        </div>
                        <div class="offset-1"></div>
                        <div class="col-5">
                            <h5>Percent of Plots in Vegetative State</h5>
                            <h2 style="font-weight:700 !important">
                                {{$farm_stats_data->plots_in_vegetative_state}}%
                            </h2>
                        </div>
                        <div class="offset-1"></div>
                        <div class="col-5">
                            <h5>Percent of Plots in Reproductive State</h5>
                            <h2 style="font-weight:700 !important">
                                {{$farm_stats_data->plots_in_reproductive_state}}%
                            </h2>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-12 show-when-mobile" style="display:none">
                    <hr class="rounded" style="margin-top:0;margin-bottom:0.5rem;">
                    <a href="https://www.pagasa.dost.gov.ph/" target="_blank" class="text-center" style="color:blue"><h6>Click to see weather data from DOST-PAGASA</h6></a>   
                </div>
            </div>
        </div>
        <div class="col-5 hide-when-mobile">
            <hr class="rounded" style="margin-top:0;margin-bottom:0.5rem;">
            <a href="{!!isset($landing_page->weather_link) ? $landing_page->weather_link : 'https://oahajj.users.earthengine.app/view/ifarm-farm-level-ndvi'!!}" target="_blank" class="text-center" style="color:blue"><h6>Click to see Interactive Map</h6></a>   
        </div>
        <div class="col-7 hide-when-mobile">
            <hr class="rounded" style="margin-top:0;margin-bottom:0.5rem;">
            <a href="https://www.pagasa.dost.gov.ph/" target="_blank" class="text-center" style="color:blue"><h6>Source: PAGASA website</h6></a>   
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
                                <th class="text-center" style="border-top:0px" scope="col">Temp</th>
                                <th class="text-center" style="border-top:0px" scope="col">Precip</th>
                                <th class="text-center" style="border-top:0px" scope="col">Amount</th>
                                <th class="text-center" style="border-top:0px" scope="col">Cloud Cover</th>
                                <th class="text-center" style="border-top:0px" scope="col">Humidity</th>
                                <th class="text-center" style="border-top:0px" scope="col">Wind</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 0; $i < 24; $i++)
                                <tr>
                                    <th style="max-width:100%; white-space:nowrap;font-size:14px" scope="row">{{gmdate("h:i A", $weather_data_openweathermap['hourly'][$i]['dt'])}}</th>
                                    <td style="max-width:100%; white-space:nowrap;font-size:14px"><img src="http://openweathermap.org/img/wn/{{$weather_data_openweathermap['hourly'][$i]['weather'][0]['icon']}}@2x.png" style="max-width:35px"> {{ucwords($weather_data_openweathermap['hourly'][$i]['weather'][0]['description'])}}</td>
                                    <td class="text-center" style="max-width:100%; white-space:nowrap;font-size:14px">{{$weather_data_openweathermap['hourly'][$i]['temp']}}°C</td>
                                    <td class="text-center" style="max-width:100%; white-space:nowrap;font-size:14px">{{$weather_data_openweathermap['hourly'][$i]['pop']*100}}%</td>
                                    <td class="text-center" style="max-width:100%; white-space:nowrap;font-size:14px">{{!isset($weather_data_openweathermap['hourly'][$i]['rain']['1h']) ? '< 0.01' : $weather_data_openweathermap['hourly'][$i]['rain']['1h']}}mm</td>
                                    <td class="text-center" style="max-width:100%; white-space:nowrap;font-size:14px">{{$weather_data_openweathermap['hourly'][$i]['clouds']}}%</td>
                                    <td class="text-center" style="max-width:100%; white-space:nowrap;font-size:14px">{{$weather_data_openweathermap['hourly'][$i]['humidity']}}%</td>
                                    <td class="text-center" style="max-width:100%; white-space:nowrap;font-size:14px">{{$weather_data_openweathermap['hourly'][$i]['wind_speed']}} m/s {{$weather_data_openweathermap['hourly'][$i]['wind_deg']}} deg</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>    
                </div>    
            </div>
        </div>
    </div>
    @if(request()->edit == 1 && $user != null)
        <div class="hover-overlay" style="width:100%">    
            <button type="button" class="btn btn-xs btn-primary" data-target="#editWeatherSectionModal" data-toggle="modal"><i class="fas fa-cog"></i> Configure Section</button>  
            <button type="button" class="btn btn-xs btn-primary" data-target="#editRainfallOutlookModal" data-toggle="modal"><i class="fas fa-edit"></i> Edit Rainfall Outlook</button>      
            <button type="button" class="btn btn-xs btn-primary" data-target="#editFarmStatsModal" data-toggle="modal"><i class="fas fa-edit"></i> Edit Farm Stats</button>       
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

<div class="modal fade" id="editFarmStatsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Farm Stats</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['action' => ['PagesController@updateFarmStats'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-6">
                        <label for="location" class="col-form-label">Select Location</label>
                        <select class="form-control" name="farm_stats_location_selector" id="farm_stats_location_selector">
                            <option value="" selected>Select Location</option>
                            @foreach(App\Models\FarmStat::all() as $farm_stats_location)
                            <option value="{{$farm_stats_location->id}}">{{$farm_stats_location->location}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>                
                @foreach(App\Models\FarmStat::all() as $farm_stats_location)
                <div class="location-all" style="display: none;" id="location-{{$farm_stats_location->id}}">
                    <hr class="my-0">
                    <h2 class="mt-2">Edit {{$farm_stats_location->location}}</h2>
                    <div class="row">
                        <div class="form-group col-12">
                            {{Form::label('map_image'.$farm_stats_location->id, 'Change Interactive Map', ['class' => 'col-form-label required'])}}
                            <br>
                            @if($farm_stats_location->map_image!=null)
                                <img src="/storage/page_images/{{$farm_stats_location->map_image}}" class="card-img-top" style="object-fit: cover;overflow:hidden;width:100%;border:1px solid rgba(100,100,100,0.25)" >
                            @else
                                <div class="card-img-top center-vertically px-3" style="height:225px; width:100%; background-color: rgb(227, 227, 227);">
                                    <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                                        Upload a 1800x550px image for the background.
                                    </span>
                                </div>
                            @endif
                            {{ Form::file('map_image_'.$farm_stats_location->id, ['class' => 'form-control mt-2 mb-3 pt-1'])}}
                        </div>

                        <div class="form-group col-6">  
                                {{Form::label('planting_status_image_date_'.$farm_stats_location->id, 'Planting Status Image Date', ['class' => 'col-form-label required'])}}
                                <div class="input-append date" id="planting_status_image_date" data-date-format="mm-yyyy">
                                    <input class="form-control" type="text" placeholder="Add month" name="planting_status_image_date_{{$farm_stats_location->id}}" value="{{isset($landing_page->planting_status_image_date) ? $landing_page->planting_status_image_date->format('Y-M') : ''}}">    
                                    <span class="add-on"><i class="icon-th"></i></span>      
                                </div>    
                        </div>
                        <div class="form-group col-12">
                            {{Form::label('map_link_'.$farm_stats_location->id, 'Link to Map', ['class' => 'col-form-label required'])}}
                            {{Form::text('map_link_'.$farm_stats_location->id, $farm_stats_location->map_link, ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <hr class="my-0 mt-3">
                    <h4 class="mt-2">Farm Stats</h4>
                    <div class="row">
                        <div class="col-6">
                            {{Form::label('quick_farm_stats_date', 'Farm Stats Date', ['class' => 'col-form-label required'])}}
                            <div class="input-append date" id="quick_farm_stats_date" data-date-format="mm-yyyy">
                                <input class="form-control" type="text" placeholder="Add month" name="quick_farm_stats_date_{{$farm_stats_location->id}}" value="{{isset($landing_page->quick_farm_stats_date) ? $landing_page->quick_farm_stats_date->format('Y-M') : ''}}">    
                                <span class="add-on"><i class="icon-th"></i></span>      
                            </div>     
                        </div>
                        <div class="form-group col-6">
                            {{Form::label('number_of_farm_lots_'.$farm_stats_location->id, 'Number of Farm Lots', ['class' => 'col-form-label required'])}}
                            {{Form::text('number_of_farm_lots_'.$farm_stats_location->id, $farm_stats_location->number_of_farm_lots, ['class' => 'form-control'])}}
                        </div>
                        <div class="form-group col-6">
                            {{Form::label('plots_harvested_'.$farm_stats_location->id, 'Percent of Plots Harvested', ['class' => 'col-form-label required'])}}
                            {{Form::text('plots_harvested_'.$farm_stats_location->id, $farm_stats_location->plots_harvested, ['class' => 'form-control'])}}
                        </div>
                        <div class="form-group col-6">
                            {{Form::label('plots_in_vegetative_state_'.$farm_stats_location->id, 'Percent of Plots in Vegetative State', ['class' => 'col-form-label required'])}}
                            {{Form::text('plots_in_vegetative_state_'.$farm_stats_location->id, $farm_stats_location->plots_in_vegetative_state, ['class' => 'form-control'])}}
                        </div>
                        <div class="form-group col-6">
                            {{Form::label('plots_in_reproductive_state_'.$farm_stats_location->id, 'Percent of Plots in Reproductive State', ['class' => 'col-form-label required'])}}
                            {{Form::text('plots_in_reproductive_state_'.$farm_stats_location->id, $farm_stats_location->plots_in_reproductive_state, ['class' => 'form-control'])}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

<div class="modal fade" id="editRainfallOutlookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Rainfall Outlook</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['action' => ['PagesController@editRainfallOutlook'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-body">
                <h4 class="mt-2">Rainfall Outlook</h4>
                <div class="row form-group">   
                    <div class="col-6">
                        {{Form::label('date_1', 'Date for first month', ['class' => 'col-form-label required'])}}
                        <div class="input-append date" id="date_1" data-date-format="mm-yyyy">
                            <input class="form-control" type="text" placeholder="Add first month" name="date_1" value="{{isset($landing_page->outlook_month) ? $landing_page->outlook_month->format('Y-M') : ''}}">    
                            <span class="add-on"><i class="icon-th"></i></span>      
                        </div>     
                    </div>
                </div>
                <div class="row">
                    <h5 class="col-12 mb-0">Month 1</h5>
                    <div class="col-4">
                        {{Form::label('min_1', 'Min', ['class' => 'col-form-label required'])}}
                        {{Form::text('min_1', $landing_page->min_1, ['class' => 'form-control', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <div class="col-4">
                        {{Form::label('max_1', 'Max', ['class' => 'col-form-label required'])}}
                        {{Form::text('max_1', $landing_page->max_1, ['class' => 'form-control', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <div class="col-4">
                        {{Form::label('mean_1', 'Mean', ['class' => 'col-form-label required'])}}
                        {{Form::text('mean_1', $landing_page->mean_1, ['class' => 'form-control', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <h5 class="col-12 mt-2 mb-0">Month 2</h5>
                    <div class="col-4">
                        {{Form::label('min_2', 'Min', ['class' => 'col-form-label required'])}}
                        {{Form::text('min_2', $landing_page->min_2, ['class' => 'form-control', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <div class="col-4">
                        {{Form::label('max_2', 'Max', ['class' => 'col-form-label required'])}}
                        {{Form::text('max_2', $landing_page->max_2, ['class' => 'form-control', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <div class="col-4">
                        {{Form::label('mean_2', 'Mean', ['class' => 'col-form-label required'])}}
                        {{Form::text('mean_2', $landing_page->mean_2, ['class' => 'form-control', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <h5 class="col-12 mt-2 mb-0">Month 3</h5>
                    <div class="col-4">
                        {{Form::label('min_3', 'Min', ['class' => 'col-form-label required'])}}
                        {{Form::text('min_3', $landing_page->min_3, ['class' => 'form-control', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <div class="col-4">
                        {{Form::label('max_3', 'Max', ['class' => 'col-form-label required'])}}
                        {{Form::text('max_3', $landing_page->max_3, ['class' => 'form-control', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <div class="col-4">
                        {{Form::label('mean_3', 'Mean', ['class' => 'col-form-label required'])}}
                        {{Form::text('mean_3', $landing_page->mean_3, ['class' => 'form-control', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <h5 class="col-12 mt-2 mb-0">Month 4</h5>
                    <div class="col-4">
                        {{Form::label('min_4', 'Min', ['class' => 'col-form-label required'])}}
                        {{Form::text('min_4', $landing_page->min_4, ['class' => 'form-control', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <div class="col-4">
                        {{Form::label('max_4', 'Max', ['class' => 'col-form-label required'])}}
                        {{Form::text('max_4', $landing_page->max_4, ['class' => 'form-control', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <div class="col-4">
                        {{Form::label('mean_4', 'Mean', ['class' => 'col-form-label required'])}}
                        {{Form::text('mean_4', $landing_page->mean_4, ['class' => 'form-control', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <h5 class="col-12 mt-2 mb-0">Month 5</h5>
                    <div class="col-4">
                        {{Form::label('min_5', 'Min', ['class' => 'col-form-label required'])}}
                        {{Form::text('min_5', $landing_page->min_5, ['class' => 'form-control', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <div class="col-4">
                        {{Form::label('max_5', 'Max', ['class' => 'col-form-label required'])}}
                        {{Form::text('max_5', $landing_page->max_5, ['class' => 'form-control', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <div class="col-4">
                        {{Form::label('mean_5', 'Mean', ['class' => 'col-form-label required'])}}
                        {{Form::text('mean_5', $landing_page->mean_5, ['class' => 'form-control', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <h5 class="col-12 mt-2 mb-0">Month 6</h5>
                    <div class="col-4">
                        {{Form::label('min_6', 'Min', ['class' => 'col-form-label required'])}}
                        {{Form::text('min_6', $landing_page->min_6, ['class' => 'form-control', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <div class="col-4">
                        {{Form::label('max_6', 'Max', ['class' => 'col-form-label required'])}}
                        {{Form::text('max_6', $landing_page->max_6, ['class' => 'form-control', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <div class="col-4">
                        {{Form::label('mean_6', 'Mean', ['class' => 'col-form-label required'])}}
                        {{Form::text('mean_6', $landing_page->mean_6, ['class' => 'form-control', 'placeholder' => 'ex. 10'])}}
                    </div>
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

<script>
    $("#date_1").datepicker( {
        format: "yyyy-M",
        startView: "months", 
        minViewMode: "months",
        autoclose: true,
    });
    $("#date_1").blur(function(e) { $(this).datepicker("hide"); });


    $("#planting_status_image_date").datepicker( {
        format: "yyyy-M",
        startView: "months", 
        minViewMode: "months",
        autoclose: true,
    });
    $("#planting_status_image_date").blur(function(e) { $(this).datepicker("hide"); });

    $("#quick_farm_stats_date").datepicker( {
        format: "yyyy-M",
        startView: "months", 
        minViewMode: "months",
        autoclose: true,
    });
    $("#quick_farm_stats_date").blur(function(e) { $(this).datepicker("hide"); });

    $( "#editFarmStatsModal" ).scroll(function() {
        $('.date').datepicker('place')
    });

</script>

<style>
    .datepicker{
        margin-top:3rem !important;
    }
    td:not(:last-child),th:not(:last-child) {
        border-right: 1px solid green;
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

        document.getElementById('farm_stats_location_selector').addEventListener("change", function (e) {
            var divsToHide = document.getElementsByClassName("location-all"); //divsToHide is an array
            for(var i = 0; i < divsToHide.length; i++){
                divsToHide[i].style.display = "none"; 
            }
            document.getElementById('location-'+e.target.value).style.display = 'initial';
        });
        
        document.getElementById('stats_site_selector').addEventListener("change", function (e) {
            var divsToHideSite = document.getElementsByClassName("sites-all"); //divsToHide is an array
            for(var i = 0; i < divsToHideSite.length; i++){
                divsToHideSite[i].style.display = "none"; 
            }
            document.getElementById('site-'+e.target.value).style.display = 'initial';

            var divsToHideStats = document.getElementsByClassName("stats-all"); //divsToHide is an array
            for(var i = 0; i < divsToHideStats.length; i++){
                divsToHideStats[i].style.display = "none"; 
            }
            document.getElementById('stat-'+e.target.value).style.display = 'flex';

            var divsToHideForecast = document.getElementsByClassName("forecast-all"); //divsToHide is an array
            for(var i = 0; i < divsToHideForecast.length; i++){
                divsToHideForecast[i].style.display = "none"; 
            }
            document.getElementById('forecast-'+e.target.value).style.display = 'inherit';
        });

    });
</script>