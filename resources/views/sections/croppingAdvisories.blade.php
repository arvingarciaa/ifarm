<?php 
    $weather = App\Models\WeatherData::first();
    $weather_data = json_decode($weather->wunderground_data, TRUE);
?>

<div class="section {{request()->edit == '1' ? 'overlay-container' : ''}}" style="padding-bottom:0px !important">
    <h1 class="text-center">Weather Forecast and Rainfall Outlook</h1>
    <h5 class="text-center">
        Weather Forecast for the next 5 days and Rainfall Outlook for the next 5 months. <br>Summary of farm information of the selected site.
    </h5>
    <div class="row mt-4">
        <div class="col-lg-6 col-sm-12" style="margin:auto">
            <a href="https://oahajj.users.earthengine.app/view/ifarm-farm-level-ndvi" target="_blank" class="text-center">
                <img alt="iFarm Banner" src="/storage/page_images/15.png" style="width:100%" class="mb-1">
            </a>
        </div>
        <div class="col-lg-6 col-sm-12">
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
                        <td style="width:15%">{{(new \DateTime($weather_data['validTimeLocal'][1]))->format('M d')}}</td>
                        <td style="width:15%">{{(new \DateTime($weather_data['validTimeLocal'][2]))->format('M d')}}</td>
                        <td style="width:15%">{{(new \DateTime($weather_data['validTimeLocal'][3]))->format('M d')}}</td>
                        <td style="width:15%">{{(new \DateTime($weather_data['validTimeLocal'][4]))->format('M d')}}</td>
                    </tr>
                    <tr style="font-size:90%">
                        <th style="width:25%">Precipitation</th>
                        <td style="width:15%">{{$weather_data['daypart'][0]['precipChance'][0]}}% chance of<br> {{$weather_data['daypart'][0]['qpf'][0] == 0 ? '< 0.01' : $weather_data['daypart'][0]['qpf'][0]}}mm rain</td>
                        <td style="width:15%">{{$weather_data['daypart'][0]['precipChance'][2]}}% chance of<br> {{$weather_data['daypart'][0]['qpf'][2] == 0 ? '< 0.01' : $weather_data['daypart'][0]['qpf'][2]}}mm rain</td>
                        <td style="width:15%">{{$weather_data['daypart'][0]['precipChance'][4]}}% chance of<br> {{$weather_data['daypart'][0]['qpf'][4] == 0 ? '< 0.01' : $weather_data['daypart'][0]['qpf'][4]}}mm rain</td>
                        <td style="width:15%">{{$weather_data['daypart'][0]['precipChance'][6]}}% chance of<br> {{$weather_data['daypart'][0]['qpf'][6] == 0 ? '< 0.01' : $weather_data['daypart'][0]['qpf'][6]}}mm rain</td>
                        <td style="width:15%">{{$weather_data['daypart'][0]['precipChance'][8]}}% chance of<br> {{$weather_data['daypart'][0]['qpf'][8] == 0 ? '< 0.01' : $weather_data['daypart'][0]['qpf'][8]}}mm rain</td>
                    </tr>
                </table>
            </div>
            <hr class="rounded">
            <h5 class="text-center"><b>
                Rainfall Outlook for December, 2021 to April, 2022</b>
            </h5>
            <div class="row">
                <table class="col-12 text-center forecast-table">
                    <tr>
                        <th style="width:25%"></th>
                        <td style="width:15%"><img src="/storage/page_images/rainfall_3.png" style="width:30px"></td>
                        <td style="width:15%"><img src="/storage/page_images/rainfall_2.png" style="width:30px"></td>
                        <td style="width:15%"><img src="/storage/page_images/rainfall_1.png" style="width:30px"></td>
                        <td style="width:15%"><img src="/storage/page_images/rainfall_3.png" style="width:30px"></td>
                        <td style="width:15%"><img src="/storage/page_images/rainfall_5.png" style="width:30px"></td>
                    </tr>
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
                        <td style="width:15%">33 mm</td>
                        <td style="width:15%">14 mm</td>
                        <td style="width:15%">11 mm</td>
                        <td style="width:15%">27 mm</td>
                        <td style="width:15%">58 mm</td>
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
        <div class="col-lg-6">
            <hr class="rounded" style="margin-top:0;margin-bottom:0.5rem;">
            <a href="https://oahajj.users.earthengine.app/view/ifarm-farm-level-ndvi" target="_blank" class="text-center" style="color:blue"><h6>Click to see Interactive Map</h6></a>   
        </div>
        <div class="col-lg-6">
            <hr class="rounded" style="margin-top:0;margin-bottom:0.5rem;">
            <a href="https://www.pagasa.dost.gov.ph/" target="_blank" class="text-center" style="color:blue"><h6>Click to see weather data from DOST-PAGASA</h6></a>   
        </div>

        <div class="expand-collapse">
            <h4 id="collapse-button" style="padding-bottom:8px">Click to see more weather data in the area<br><i class="fas fa-angle-down"></i>
            </h4>
            <div class="collapse-content">
                <h2>Tarlac City, Tarlac, Philippines</h2>
                <h4 class="text-muted"><img src="/storage/page_images/weather_5.png" style="width:30px"> {{$weather_data['daypart'][0]['narrative'][0]}}</h4>
                <br>
                <hr class="rounded">
                <h4>10-Day Weather Forecast</h4>
                <table class="col-12 text-center mt-4 forecast-table">
                    <tr>
                        <td>Today 12/27</td>
                        <td>Tue 12/28</td>
                        <td>Wed 12/29</td>
                        <td>Thu 12/30</td>
                        <td>Fri 12/31</td>
                        <td>Sat 1/01</td>
                        <td>Sun 1/02</td>
                        <td>Mon 1/03</td>
                        <td>Tue 1/04</td>
                        <td>Wed 1/05</td>
                    </tr>
                    <tr>
                        <td><span style="color:#d5202a">32°</span> | <span style="color: #0053ae">22°C</span><br> <img src="/storage/page_images/weather_4.png" style="width:45px"></td>
                        <td><span style="color:#d5202a">33°</span> | <span style="color: #0053ae">22°C</span><br> <img src="/storage/page_images/weather_2.png" style="width:45px"></td>
                        <td><span style="color:#d5202a">32°</span> | <span style="color: #0053ae">23°C</span><br> <img src="/storage/page_images/weather_3.png" style="width:45px"></td>
                        <td><span style="color:#d5202a">30°</span> | <span style="color: #0053ae">22°C</span><br> <img src="/storage/page_images/weather_2.png" style="width:45px"></td>
                        <td><span style="color:#d5202a">30°</span> | <span style="color: #0053ae">22°C</span><br> <img src="/storage/page_images/weather_3.png" style="width:45px"></td>
                        <td><span style="color:#d5202a">30°</span> | <span style="color: #0053ae">21°C</span><br> <img src="/storage/page_images/weather_4.png" style="width:45px"></td>
                        <td><span style="color:#d5202a">31°</span> | <span style="color: #0053ae">22°C</span><br> <img src="/storage/page_images/weather_5.png" style="width:45px"></td>
                        <td><span style="color:#d5202a">31°</span> | <span style="color: #0053ae">22°C</span><br> <img src="/storage/page_images/weather_1.png" style="width:45px"></td>
                        <td><span style="color:#d5202a">31°</span> | <span style="color: #0053ae">21°C</span><br> <img src="/storage/page_images/weather_2.png" style="width:45px"></td>
                        <td><span style="color:#d5202a">30°</span> | <span style="color: #0053ae">23°C</span><br> <img src="/storage/page_images/weather_2.png" style="width:45px"></td>
                    </tr>
                    <tr style="font-size:90%">
                        <td>{{$weather_data['daypart'][0]['precipChance'][0]}}% chance of {{$weather_data['daypart'][0]['qpf'][0] == 0 ? '< 0.01' : $weather_data['daypart'][0]['qpf'][0]}}mm rain</td>
                        <td>{{$weather_data['daypart'][0]['precipChance'][2]}}% chance of {{$weather_data['daypart'][0]['qpf'][2] == 0 ? '< 0.01' : $weather_data['daypart'][0]['qpf'][2]}}mm rain</td>
                        <td>{{$weather_data['daypart'][0]['precipChance'][4]}}% chance of {{$weather_data['daypart'][0]['qpf'][4] == 0 ? '< 0.01' : $weather_data['daypart'][0]['qpf'][4]}}mm rain</td>
                        <td>{{$weather_data['daypart'][0]['precipChance'][6]}}% chance of {{$weather_data['daypart'][0]['qpf'][6] == 0 ? '< 0.01' : $weather_data['daypart'][0]['qpf'][6]}}mm rain</td>
                        <td>{{$weather_data['daypart'][0]['precipChance'][8]}}% chance of {{$weather_data['daypart'][0]['qpf'][8] == 0 ? '< 0.01' : $weather_data['daypart'][0]['qpf'][8]}}mm rain</td>
                        <td>3% chance of 0.01 mm rain</td>
                        <td>3% chance of 0.01 mm rain</td>
                        <td>5% chance of 0.01 mm rain</td>
                        <td>7% chance of 0.01 mm rain</td>
                        <td>11% chance of 0.01 mm rain</td>
                    </tr>
                    <tr style="font-size:90%">
                        <td>Mostly Cloudy</td>
                        <td>Partly Cloudy</td>
                        <td>Mostly Cloudy</td>
                        <td>Partly Cloudy</td>
                        <td>Mostly Cloudy</td>
                        <td>Partly Cloudy</td>
                        <td>Mostly Cloudy</td>
                        <td>Clear Sky</td>
                        <td>Partly Cloudy</td>
                        <td>Partly Cloudy</td>
                    </tr>
                </table>

                <hr class="rounded mt-5 mb-3">
                <h4 class="">Hourly Forecast for Today</h4>
                <img src="/storage/page_images/21.png" style="width:1000px">
                <hr class="rounded mb-3">
                <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">Time</th>
                        <th scope="col">Conditions</th>
                        <th scope="col">Temp</th>
                        <th scope="col">Feels Like</th>
                        <th scope="col">Precip</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Cloud Cover</th>
                        <th scope="col">Dew Point</th>
                        <th scope="col">Humidity</th>
                        <th scope="col">Wind</th>
                        <th scope="col">Pressure</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1:00 am</th>
                        <td><img src="https://www.wunderground.com/static/i/c/v4/27.svg" style="width:25px"> Mostly Cloudy</td>
                        <td>24°C</td>
                        <td>24°C</td>
                        <td>7%</td>
                        <td>0mm</td>
                        <td>65%</td>
                        <td>23°C</td>
                        <td>95%</td>
                        <td>0 km/h W</td>
                        <td>1,012.60 hPa</td>
                      </tr>
                      <tr>
                        <th scope="row">2:00 am</th>
                        <td><img src="https://www.wunderground.com/static/i/c/v4/27.svg" style="width:25px"> Mostly Cloudy</td>
                        <td>24°C</td>
                        <td>24°C</td>
                        <td>7%</td>
                        <td>0 mm</td>
                        <td>65%</td>
                        <td>23°C</td>
                        <td>95%</td>
                        <td>0 km/h W</td>
                        <td>1,012.60 hPa</td>
                      </tr>
                      <tr>
                        <th scope="row">3:00 am</th>
                        <td><img src="https://www.wunderground.com/static/i/c/v4/27.svg" style="width:25px"> Mostly Cloudy</td>
                        <td>23°C</td>
                        <td>23°C</td>
                        <td>6%</td>
                        <td>0 mm</td>
                        <td>72%</td>
                        <td>22°C</td>
                        <td>95%</td>
                        <td>0 km/h W</td>
                        <td>1,012.60 hPa</td>
                      </tr>
                      <tr>
                        <th scope="row">4:00 am</th>
                        <td><img src="https://www.wunderground.com/static/i/c/v4/27.svg" style="width:25px"> Mostly Cloudy</td>
                        <td>23°C</td>
                        <td>23°C</td>
                        <td>6%</td>
                        <td>0 mm</td>
                        <td>68%</td>
                        <td>22°C</td>
                        <td>95%</td>
                        <td>0 km/h WSW</td>
                        <td>1,011.90 hPa</td>
                      </tr>
                      <tr>
                        <th scope="row">5:00 am</th>
                        <td><img src="https://www.wunderground.com/static/i/c/v4/27.svg" style="width:25px"> Mostly Cloudy</td>
                        <td>23°C</td>
                        <td>23°C</td>
                        <td>3%</td>
                        <td>0 mm</td>
                        <td>68%</td>
                        <td>22°C</td>
                        <td>95%</td>
                        <td>0 km/h WSW</td>
                        <td>1,012.00 hPa</td>
                      </tr>
                      <tr>
                        <th scope="row">6:00 am</th>
                        <td><img src="https://www.wunderground.com/static/i/c/v4/27.svg" style="width:25px"> Mostly Cloudy</td>
                        <td>23°C</td>
                        <td>23°C</td>
                        <td>3%</td>
                        <td>0mm</td>
                        <td>65%</td>
                        <td>22°C</td>
                        <td>95%</td>
                        <td>0 km/h WSW</td>
                        <td>1,012.90 hPa</td>
                      </tr>
                      <tr>
                        <th scope="row">7:00 am</th>
                        <td><img src="https://www.wunderground.com/static/i/c/v4/28.svg" style="width:25px"> Mostly Cloudy</td>
                        <td>24°C</td>
                        <td>24°C</td>
                        <td>3%</td>
                        <td>0 mm</td>
                        <td>63%</td>
                        <td>23°C</td>
                        <td>94%</td>
                        <td>0 km/h WSW</td>
                        <td>1,013.40 hPa</td>
                      </tr>
                      <tr>
                        <th scope="row">8:00 am</th>
                        <td><img src="https://www.wunderground.com/static/i/c/v4/28.svg" style="width:25px"> Mostly Cloudy</td>
                        <td>25°C</td>
                        <td>28°C</td>
                        <td>8%</td>
                        <td>0 mm</td>
                        <td>68%</td>
                        <td>23°C</td>
                        <td>88%</td>
                        <td>0 km/h WSW</td>
                        <td>1,013.40 hPa</td>
                      </tr>
                      <tr>
                        <th scope="row">9:00 am</th>
                        <td><img src="https://www.wunderground.com/static/i/c/v4/28.svg" style="width:25px"> Mostly Cloudy</td>
                        <td>27°C</td>
                        <td>30°C</td>
                        <td>6%</td>
                        <td>0 mm</td>
                        <td>64%</td>
                        <td>23°C</td>
                        <td>80%</td>
                        <td>0 km/h WSW</td>
                        <td>1,013.50 hPa</td>
                      </tr>
                      <tr>
                        <th scope="row">10:00 am</th>
                        <td><img src="https://www.wunderground.com/static/i/c/v4/28.svg" style="width:25px"> Mostly Cloudy</td>
                        <td>28°C</td>
                        <td>32°C</td>
                        <td>12%</td>
                        <td>0 mm</td>
                        <td>60%</td>
                        <td>23°C</td>
                        <td>69%</td>
                        <td>2 km/h S</td>
                        <td>1,013.50 hPa</td>
                      </tr>
                      <tr>
                        <th scope="row">11:00 am</th>
                        <td><img src="https://www.wunderground.com/static/i/c/v4/30.svg" style="width:25px"> Partly Cloudy</td>
                        <td>30°C</td>
                        <td>34°C</td>
                        <td>20%</td>
                        <td>0 mm</td>
                        <td>55%</td>
                        <td>23°C</td>
                        <td>69%</td>
                        <td>4 km/h ESE</td>
                        <td>1,012.70 hPa</td>
                      </tr>
                      <tr>
                        <th scope="row">12:00 pm</th>
                        <td><img src="https://www.wunderground.com/static/i/c/v4/30.svg" style="width:25px"> Partly Cloudy</td>
                        <td>31°C</td>
                        <td>36°C</td>
                        <td>17%</td>
                        <td>0 mm</td>
                        <td>51%</td>
                        <td>23°C</td>
                        <td>62%</td>
                        <td>6 km/h ESE</td>
                        <td>1,011.70 hPa</td>
                      </tr>
                      <tr>
                        <th scope="row">1:00 pm</th>
                        <td><img src="https://www.wunderground.com/static/i/c/v4/30.svg" style="width:25px"> Partly Cloudy</td>
                        <td>31°C</td>
                        <td>36°C</td>
                        <td>13%</td>
                        <td>0 mm</td>
                        <td>49%</td>
                        <td>23°C</td>
                        <td>62%</td>
                        <td>6 km/h ESE</td>
                        <td>1,011.70 hPa</td>
                      </tr>
                      <tr>
                        <th scope="row">2:00 pm</th>
                        <td><img src="https://www.wunderground.com/static/i/c/v4/30.svg" style="width:25px"> Partly Cloudy</td>
                        <td>32°C</td>
                        <td>36°C</td>
                        <td>23%</td>
                        <td>0 mm</td>
                        <td>49%</td>
                        <td>23°C</td>
                        <td>61%</td>
                        <td>7 km/h SE</td>
                        <td>1,009.70 hPa</td>
                      </tr>
                      <tr>
                        <th scope="row">3:00 pm</th>
                        <td><img src="https://www.wunderground.com/static/i/c/v4/30.svg" style="width:25px"> Partly Cloudy</td>
                        <td>31°C</td>
                        <td>36°C</td>
                        <td>22%</td>
                        <td>0 mm</td>
                        <td>47%</td>
                        <td>23°C</td>
                        <td>62%</td>
                        <td>8 km/h SE</td>
                        <td>1,009.75 hPa</td>
                      </tr>
                      <tr>
                        <th scope="row">4:00 pm</th>
                        <td><img src="https://www.wunderground.com/static/i/c/v4/37.svg" style="width:25px"> Isolated Thunderstorms</td>
                        <td>31°C</td>
                        <td>35°C</td>
                        <td>32%</td>
                        <td>0.20 mm</td>
                        <td>50%</td>
                        <td>23°C</td>
                        <td>62%</td>
                        <td>8 km/h SE</td>
                        <td>1,009.75 hPa</td>
                      </tr>
                      <tr>
                        <th scope="row">5:00 pm</th>
                        <td><img src="https://www.wunderground.com/static/i/c/v4/30.svg" style="width:25px"> Partly Cloudy</td>
                        <td>29°C</td>
                        <td>33°C</td>
                        <td>20%</td>
                        <td>0 mm</td>
                        <td>47%</td>
                        <td>23°C</td>
                        <td>62%</td>
                        <td>7 km/h SE</td>
                        <td>1,010.20 hPa</td>
                      </tr>
                      <tr>
                        <th scope="row">6:00 pm</th>
                        <td><img src="https://www.wunderground.com/static/i/c/v4/29.svg" style="width:25px"> Partly Cloudy</td>
                        <td>28°C</td>
                        <td>31°C</td>
                        <td>22%</td>
                        <td>0 mm</td>
                        <td>47%</td>
                        <td>23°C</td>
                        <td>62%</td>
                        <td>6 km/h SSE</td>
                        <td>1,010.20 hPa</td>
                      </tr>
                      <tr>
                        <th scope="row">7:00 pm</th>
                        <td><img src="https://www.wunderground.com/static/i/c/v4/29.svg" style="width:25px"> Partly Cloudy</td>
                        <td>27°C</td>
                        <td>30°C</td>
                        <td>24%</td>
                        <td>0 mm</td>
                        <td>51%</td>
                        <td>23°C</td>
                        <td>62%</td>
                        <td>4 km/h SSE</td>
                        <td>1,012.20 hPa</td>
                      </tr>
                      <tr>
                        <th scope="row">8:00 pm</th>
                        <td><img src="https://www.wunderground.com/static/i/c/v4/29.svg" style="width:25px"> Partly Cloudy</td>
                        <td>26°C</td>
                        <td>29°C</td>
                        <td>10%</td>
                        <td>0 mm</td>
                        <td>54%</td>
                        <td>22°C</td>
                        <td>62%</td>
                        <td>3 km/h S</td>
                        <td>1,012.20 hPa</td>
                      </tr>
                      <tr>
                        <th scope="row">9:00 pm</th>
                        <td><img src="https://www.wunderground.com/static/i/c/v4/29.svg" style="width:25px"> Partly Cloudy</td>
                        <td>25°C</td>
                        <td>28°C</td>
                        <td>13%</td>
                        <td>0 mm</td>
                        <td>48%</td>
                        <td>22°C</td>
                        <td>85%</td>
                        <td>1 km/h SSW</td>
                        <td>1,012.50 hPa</td>
                      </tr>
                      <tr>
                        <th scope="row">10:00 pm</th>
                        <td><img src="https://www.wunderground.com/static/i/c/v4/29.svg" style="width:25px"> Partly Cloudy</td>
                        <td>25°C</td>
                        <td>27°C</td>
                        <td>11%</td>
                        <td>0 mm</td>
                        <td>40%</td>
                        <td>22°C</td>
                        <td>87%</td>
                        <td>0 km/h SW</td>
                        <td>1,012.80 hPa</td>
                      </tr>
                      <tr>
                        <th scope="row">11:00 pm</th>
                        <td><img src="https://www.wunderground.com/static/i/c/v4/29.svg" style="width:25px"> Partly Cloudy</td>
                        <td>24°C</td>
                        <td>27°C</td>
                        <td>8%</td>
                        <td>0 mm</td>
                        <td>35%</td>
                        <td>22°C</td>
                        <td>89%</td>
                        <td>0 km/h SW</td>
                        <td>1,012.80 hPa</td>
                      </tr>
                    </tbody>
                  </table>        
            </div>
        </div>
    </div>
    @if(request()->edit == 1)
        <div class="hover-overlay" style="width:100%">    
            <button type="button" class="btn btn-xs btn-primary" data-target="#editCroppingAdvisoriesSectionModal" data-toggle="modal"><i class="far fa-edit"></i></button>      
        </div>
    @endif
</div>


<div class="modal fade" id="editCroppingAdvisoriesSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</style>

<script>
    $(document).ready(function() {
        $('.expand-collapse h4').each(function() {
            var tis = $(this), state = false, answer = tis.next('div').slideUp();
            tis.click(function() {
                state = !state;
                answer.slideToggle(state);
                tis.toggleClass('active',state);
            });
        });
    });
</script>