<div class="section {{request()->edit == '1' ? 'overlay-container' : ''}}" style="padding-bottom:0px !important">
    <h1 class="text-center">Weather Forecast and Rainfall Outlook</h1>
    <h5 class="text-center">
        Weather Forecast for the next 5 days and Rainfall Outlook for the next 5 months. <br>Summary of farm information of the selected site.
    </h5>
    <div class="row mt-4">
        <div class="col-lg-6 col-sm-12">
            <a href="https://oahajj.users.earthengine.app/view/ifarm-farm-level-ndvi" target="_blank" class="text-center">
                <img alt="iFarm Banner" src="/storage/page_images/15.png" style="width:100%" class="mb-1">
                <h6>Click to see Interactive Map</h6>
            </a>
        </div>
        <div class="col-lg-6 col-sm-12">
            <div class="text-center">
                <h4 class="">Site</h4>
                <select class="form-control" style="width: 50%; display:inline">
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
                        <td><img src="/storage/page_images/weather_3.png" style="width:45px"></td>
                        <td><img src="/storage/page_images/weather_5.png" style="width:45px"></td>
                        <td><img src="/storage/page_images/weather_2.png" style="width:45px"></td>
                        <td><img src="/storage/page_images/weather_2.png" style="width:45px"></td>
                        <td><img src="/storage/page_images/weather_6.png" style="width:45px"></td>
                    </tr>
                    <tr style="font-size:90%">
                        <th>Date</th>
                        <td style="width:15%">Today</td>
                        <td style="width:15%">Dec 23</td>
                        <td style="width:15%">Dec 24</td>
                        <td style="width:15%">Dec 25</td>
                        <td style="width:15%">Dec 26</td>
                    </tr>
                    <tr style="font-size:90%">
                        <th>Precipitation</th>
                        <td style="width:15%">6% chance of <br>< 1 mm rain</td>
                        <td style="width:15%">81% chance of<br> 3.53 mm rain</td>
                        <td style="width:15%">12% chance of<br> < 1 mm rain</td>
                        <td style="width:15%">20% chance of<br> < 1 mm rain</td>
                        <td style="width:15%">34% chance of<br> 1.03 mm rain</td>
                    </tr>
                    <tr style="font-size:90%">
                        <th>Forecast</th>
                        <td style="width:15%">Mostly Cloudy</td>
                        <td style="width:15%">Thunderstorms</td>
                        <td style="width:15%">Partly Cloudy</td>
                        <td style="width:15%">Partly Cloudy</td>
                        <td style="width:15%">Isolated Thunderstorms</td>
                    </tr>
                </table>
            </div>
            <hr class="rounded">
            <h5 class="text-center"><b>
                Rainfall Outlook for November, 2021 to March, 2022</b>
            </h5>
            <table class="col-12 text-center forecast-table">
                <tr>
                    <th></th>
                    <td style="width:15%"><img src="/storage/page_images/rainfall_5.png" style="width:45px"></td>
                    <td style="width:15%"><img src="/storage/page_images/rainfall_5.png" style="width:45px"></td>
                    <td style="width:15%"><img src="/storage/page_images/rainfall_1.png" style="width:45px"></td>
                    <td style="width:15%"><img src="/storage/page_images/rainfall_3.png" style="width:45px"></td>
                    <td style="width:15%"><img src="/storage/page_images/rainfall_4.png" style="width:45px"></td>
                </tr>
                <tr style="font-size:90%">
                    <th>Month</th>
                    <td style="width:15%">Nov 21</td>
                    <td style="width:15%">Dec 21</td>
                    <td style="width:15%">Jan 22</td>
                    <td style="width:15%">Feb 22</td>
                    <td style="width:15%">Mar 22</td>
                </tr>
                <tr style="font-size:90%">
                    <th>Monthly Ave</th>
                    <td style="width:15%">101 mm</td>
                    <td style="width:15%">18 mm</td>
                    <td style="width:15%">15 mm</td>
                    <td style="width:15%">55 mm</td>
                    <td style="width:15%">68 mm</td>
                </tr>
            </table>
            <hr class="rounded">
            <h5 class="text-center"><b>
                Quick farm stats on the area</b>
            </h5>
            <div class="row">
                <div class="offset-1"></div>
                <div class="col-5">
                    <h6>Number of Farm Lots</h6>
                    <h4 style="font-weight:700 !important">
                        494
                    </h4>
                </div>
                <div class="offset-1"></div>
                <div class="col-5">
                    <h6>Percent of Plots Harvested</h6>
                    <h4 style="font-weight:700 !important">
                        31%
                    </h4>
                </div>
                <div class="offset-1"></div>
                <div class="col-5">
                    <h6>Percent of Plots in Vegetative State</h6>
                    <h4 style="font-weight:700 !important">
                        24%
                    </h4>
                </div>
                <div class="offset-1"></div>
                <div class="col-5">
                    <h6>Percent of Plots in Reproductive State</h6>
                    <h4 style="font-weight:700 !important">
                        45%
                    </h4>
                </div>
            </div>
        </div>
        <div class="expand-collapse">
            <h4 id="collapse-button" style="padding-bottom:8px">Click to see more weather data in the area<br><i class="fas fa-angle-down"></i>
            </h4>
            <div class="collapse-content">
                <h2>Tarlac City, Tarlac, Philippines</h2>
                <h4 class="text-muted"><img src="/storage/page_images/weather_5.png" style="width:30px"> Feels like 33°C. Broken clouds. Light breeze | High <span style="color:#d5202a">31°C</span> | Low <span style="color:#0053ae">28°C</span></h4>
                <br>
                <h4>10-Day Weather Forecast</h4>
                <table class="col-12 text-center mt-4 forecast-table">
                    <tr>
                        <td>Today 12/22</td>
                        <td>Thurs 12/23</td>
                        <td>Fri 12/24</td>
                        <td>Sat 12/25</td>
                        <td>Sun 12/26</td>
                        <td>Mon 12/27</td>
                        <td>Tue 12/28</td>
                        <td>Wed 12/29</td>
                        <td>Thu 12/30</td>
                        <td>Fri 12/31</td>
                    </tr>
                    <tr>
                        <td><span style="color:#d5202a">31°</span> | <span style="color: #0053ae">28°C</span><br> <img src="/storage/page_images/weather_5.png" style="width:45px"></td>
                        <td><span style="color:#d5202a">31°</span> | <span style="color: #0053ae">28°C</span><br> <img src="/storage/page_images/weather_5.png" style="width:45px"></td>
                        <td><span style="color:#d5202a">31°</span> | <span style="color: #0053ae">28°C</span><br> <img src="/storage/page_images/weather_1.png" style="width:45px"></td>
                        <td><span style="color:#d5202a">31°</span> | <span style="color: #0053ae">28°C</span><br> <img src="/storage/page_images/weather_3.png" style="width:45px"></td>
                        <td><span style="color:#d5202a">31°</span> | <span style="color: #0053ae">28°C</span><br> <img src="/storage/page_images/weather_4.png" style="width:45px"></td>
                        <td><span style="color:#d5202a">31°</span> | <span style="color: #0053ae">28°C</span><br> <img src="/storage/page_images/weather_5.png" style="width:45px"></td>
                        <td><span style="color:#d5202a">31°</span> | <span style="color: #0053ae">28°C</span><br> <img src="/storage/page_images/weather_5.png" style="width:45px"></td>
                        <td><span style="color:#d5202a">31°</span> | <span style="color: #0053ae">28°C</span><br> <img src="/storage/page_images/weather_1.png" style="width:45px"></td>
                        <td><span style="color:#d5202a">31°</span> | <span style="color: #0053ae">28°C</span><br> <img src="/storage/page_images/weather_3.png" style="width:45px"></td>
                        <td><span style="color:#d5202a">31°</span> | <span style="color: #0053ae">28°C</span><br> <img src="/storage/page_images/weather_4.png" style="width:45px"></td>
                    </tr>
                    <tr style="font-size:90%">
                        <td>92% chance of 8.67 mm rain</td>
                        <td>87% chance of 3.17 mm rain</td>
                        <td>92% chance of 8.67 mm rain</td>
                        <td>92% chance of 8.67 mm rain</td>
                        <td>92% chance of 8.67 mm rain</td>
                        <td>92% chance of 8.67 mm rain</td>
                        <td>92% chance of 8.67 mm rain</td>
                        <td>92% chance of 8.67 mm rain</td>
                        <td>92% chance of 8.67 mm rain</td>
                        <td>92% chance of 8.67 mm rain</td>
                    </tr>
                    <tr style="font-size:90%">
                        <td>Mostly Cloudy</td>
                        <td>Thunderstorms</td>
                        <td>Partly Cloudy</td>
                        <td>Partly Cloudy</td>
                        <td>Isolated Thunderstorms</td>
                        <td>Partly Cloudy</td>
                        <td>Mostly Cloudy</td>
                        <td>Clear Sky</td>
                        <td>Isolated Thunderstorms</td>
                        <td>Partly Cloudy</td>
                    </tr>
                </table>

                <h4 class="mt-5 mb-3">Hourly Forecast for Today</h4>
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
                        <th scope="row">12:00 mn</th>
                        <td><img src="/storage/page_images/weather_5.png" style="width:25px"> Isolated Thunderstorms</td>
                        <td>31°C</td>
                        <td>33°C</td>
                        <td>34%</td>
                        <td>3.1mm</td>
                        <td>80%</td>
                        <td>30°C</td>
                        <td>96%</td>
                        <td>0 kph WNW</td>
                        <td>29.92 in</td>
                      </tr>
                      <tr>
                        <th scope="row">1:00 am</th>
                        <td><img src="/storage/page_images/weather_5.png" style="width:25px"> Isolated Thunderstorms</td>
                        <td>31°C</td>
                        <td>33°C</td>
                        <td>34%</td>
                        <td>3.1mm</td>
                        <td>80%</td>
                        <td>30°C</td>
                        <td>96%</td>
                        <td>0 kph WNW</td>
                        <td>29.92 in</td>
                      </tr>
                      <tr>
                        <th scope="row">2:00 mn</th>
                        <td><img src="/storage/page_images/weather_5.png" style="width:25px"> Isolated Thunderstorms</td>
                        <td>31°C</td>
                        <td>33°C</td>
                        <td>34%</td>
                        <td>3.1mm</td>
                        <td>80%</td>
                        <td>30°C</td>
                        <td>96%</td>
                        <td>0 kph WNW</td>
                        <td>29.92 in</td>
                      </tr>
                      <tr>
                        <th scope="row">3:00 am</th>
                        <td><img src="/storage/page_images/weather_5.png" style="width:25px"> Isolated Thunderstorms</td>
                        <td>31°C</td>
                        <td>33°C</td>
                        <td>34%</td>
                        <td>3.1mm</td>
                        <td>80%</td>
                        <td>30°C</td>
                        <td>96%</td>
                        <td>0 kph WNW</td>
                        <td>29.92 in</td>
                      </tr>
                      <tr>
                        <th scope="row">4:00 mn</th>
                        <td><img src="/storage/page_images/weather_5.png" style="width:25px"> Isolated Thunderstorms</td>
                        <td>31°C</td>
                        <td>33°C</td>
                        <td>34%</td>
                        <td>3.1mm</td>
                        <td>80%</td>
                        <td>30°C</td>
                        <td>96%</td>
                        <td>0 kph WNW</td>
                        <td>29.92 in</td>
                      </tr>
                      <tr>
                        <th scope="row">5:00 am</th>
                        <td><img src="/storage/page_images/weather_5.png" style="width:25px"> Isolated Thunderstorms</td>
                        <td>31°C</td>
                        <td>33°C</td>
                        <td>34%</td>
                        <td>3.1mm</td>
                        <td>80%</td>
                        <td>30°C</td>
                        <td>96%</td>
                        <td>0 kph WNW</td>
                        <td>29.92 in</td>
                      </tr>
                    </tbody>
                  </table>
                <h2 class="mt-2" style="text-align: center;">
                    <button type="button" class="btn btn-outline-secondary">Click here to see weather data from DOST-PAGASA</button>
                </h2>            
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