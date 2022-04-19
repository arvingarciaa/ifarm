<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<div class="section {{request()->edit == '1' && $user != null ? 'overlay-container' : ''}}" style="">
    <h1 class="text-center">{!!isset($landing_page->bulletin_title) ? nl2br($landing_page->bulletin_title) : 'Corn Bulletin'!!}</h1>
    <h4 class="text-center">{!!isset($landing_page->bulletin_date) ? nl2br($landing_page->bulletin_date) : 'Corn Bulletin'!!}</h4>
    <h5 class="text-center">
        {!!isset($landing_page->bulletin_subtitle) ? nl2br($landing_page->bulletin_subtitle) : 'Site-specific advisories using meteorological information for better farm management decision-making.<br>Source: Dr. Artemio Salazar, Project SARAi'!!}
    </h5>
    @if($landing_page->bulletin_file != null)
    <a href="/storage/files/{{$landing_page->bulletin_file}}">
        <h2 class="mt-2" style="text-align: center;">
            <button type="button" class="btn btn-outline-primary">Download Nationwide Bulletin</button>
        </h2>
    </a>
    @endif

    <h5 class="mt-4" style="text-align:justify;margin: 0 auto;width: 85%;">
        <b>Advisory:</b> {!!isset($landing_page->bulletin_advisory) ? nl2br($landing_page->bulletin_advisory) : '--'!!}
    </h5>
    <figure class="highcharts-figure">
        <div id="container"></div>
    </figure>

    @if(request()->edit == 1 && $user != null)
        <div class="hover-overlay" style="width:100%">    
            <button type="button" class="btn btn-xs btn-primary" data-target="#editBulletinSectionModal" data-toggle="modal"><i class="fas fa-cog"></i> Configure Section</button>     
            <button type="button" class="btn btn-xs btn-primary" data-target="#editBulletinDataModal" data-toggle="modal"><i class="fas fa-edit"></i> Edit Bulletin Data</button>  
        </div>
    @endif
</div>

<div class="modal fade" id="editBulletinSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Corn Bulletin Section</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['action' => ['PagesController@updateBulletinSection'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('bulletin_visibility', 'Enable Section?', ['class' => 'col-form-label required'])}}
                    <input type="checkbox" checked data-toggle="toggle">
                </div>
                <div class="form-group">
                    {{Form::label('bulletin_title', 'Corn Bulletin Section Title', ['class' => 'col-form-label required'])}}
                    {{Form::text('bulletin_title', $landing_page->bulletin_title, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('bulletin_date', 'Corn Bulletin Date', ['class' => 'col-form-label required'])}}
                    {{Form::text('bulletin_date', $landing_page->bulletin_date, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('bulletin_subtitle', 'Corn Bulletin Section Subtitle', ['class' => 'col-form-label required'])}}
                    {{Form::textarea('bulletin_subtitle', $landing_page->bulletin_subtitle, ['class' => 'form-control', 'rows' => '4'])}}
                </div>
                <div class="form-group">
                    {{Form::label('bulletin_advisory', 'Corn Bulletin Advisory', ['class' => 'col-form-label required'])}}
                    {{Form::textarea('bulletin_advisory', $landing_page->bulletin_advisory, ['class' => 'form-control', 'rows' => '4'])}}
                </div>
                <hr class="my-0">
                {{Form::label('bulletin_section_background_banner', 'Change Section Background', ['class' => 'col-form-label'])}}
                <div class="input-group">
                    <label class="mr-2 radio-inline"><input type="radio" name="bulletin_background_color_radio" value="0" {{$landing_page->bulletin_background_type == 0 ? 'checked' : ''}}> Block color</label>
                    <label class="mx-2 radio-inline"><input type="radio" name="bulletin_background_color_radio" value="1" {{$landing_page->bulletin_background_type == 1 ? 'checked' : ''}}> Image</label>
                </div>
                <div class="form-group block-color-form-bulletin" style="{{$landing_page->bulletin_background_type == 1 ? 'display:none' : ''}}">
                    {{Form::label('bulletin_section_background_color', 'Set Block Color', ['class' => 'col-form-label'])}}
                    @if($landing_page->bulletin_background != null && $landing_page->bulletin_background_type == 0)
                    {{Form::text('bulletin_section_background_color', $landing_page->bulletin_background, ['class' => 'form-control', 'placeholder' => 'Add a hex'])}}
                    @else
                    {{Form::text('bulletin_section_background_color', '', ['class' => 'form-control', 'placeholder' => 'Add a hex'])}}
                    @endif
                </div>
                <div class="form-group background-image-form-bulletin" style="{{$landing_page->bulletin_background_type == 0 ? 'display:none' : ''}}">
                    {{Form::label('bulletin_section_background_image', 'Set Background Image', ['class' => 'col-form-label required'])}}
                    <br>
                    @if($landing_page->bulletin_background != null && $landing_page->bulletin_background_type == 1)
                    <img src="/storage/page_images/{{$landing_page->bulletin_background}}" class="card-img-top" style="object-fit: cover;overflow:hidden;width:100%;border:1px solid rgba(100,100,100,0.25)" >
                    @else
                    <div class="card-img-top center-vertically px-3" style="height:225px; width:100%; background-color: rgb(227, 227, 227);">
                        <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                            Upload a 1800x550px logo for the background.
                        </span>
                    </div>
                    @endif
                    {{ Form::file('bulletin_section_background_image', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
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

<div class="modal fade" id="editBulletinDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Corn Bulletin Data</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['action' => ['PagesController@updateBulletinData'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('bulletin_file', 'Upload Corn Bulletin File', ['class' => 'col-form-label required'])}}
                    {{Form::file('bulletin_file', ['class' => 'form-control mb-3 pb-2'])}}
                </div>
                <div class="row form-group">   
                    <div class="col-6">
                        {{Form::label('date_1', 'Date for first month', ['class' => 'col-form-label required'])}}
                        <div class="input-append date" id="date_1" data-date-format="mm-yyyy">
                            <input disabled class="form-control" type="text" placeholder="Add first month" name="date_1" value="{{isset($landing_page->outlook_month) ? $landing_page->outlook_month->format('Y-M') : ''}}">    
                            <span class="add-on"><i class="icon-th"></i></span>      
                        </div>     
                    </div>
                    <div class="col-12">
                        <small>Date and current mean taken from Tarlac rainfall outlook input.</small>
                    </div>
                </div>
                <div class="form-group row">
                    <h5 class="col-12 mb-0">Month 1 - {{$landing_page->outlook_month->format('F')}}</h5>
                    <div class="col-4">
                        {{Form::label('mean_1', 'Current Mean', ['class' => 'col-form-label required'])}}
                        {{Form::text('mean_1', $landing_page->mean_1, ['disabled', 'class' => 'form-control ', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <div class="col-4 col-offset-1">
                        {{Form::label('forty_year_mean_1', '40 Year Average', ['class' => 'col-form-label required'])}}
                        {{Form::text('forty_year_mean_1', $landing_page->forty_year_mean_1, ['class' => 'form-control ', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <h5 class="col-12 mt-2 mb-0">Month 2 - {{$landing_page->outlook_month->addMonths(1)->format('F')}}</h5>
                    <div class="col-4">
                        {{Form::label('mean_2', 'Current Mean', ['class' => 'col-form-label required'])}}
                        {{Form::text('mean_2', $landing_page->mean_2, ['disabled', 'class' => 'form-control', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <div class="col-4 col-offset-1">
                        {{Form::label('forty_year_mean_2', '40 Year Average', ['class' => 'col-form-label required'])}}
                        {{Form::text('forty_year_mean_2', $landing_page->forty_year_mean_2, ['class' => 'form-control ', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <h5 class="col-12 mt-2 mb-0">Month 3 - {{$landing_page->outlook_month->addMonths(2)->format('F')}}</h5>
                    <div class="col-4">
                        {{Form::label('mean_3', 'Current Mean', ['class' => 'col-form-label required'])}}
                        {{Form::text('mean_3', $landing_page->mean_3, ['disabled', 'class' => 'form-control', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <div class="col-4 col-offset-1">
                        {{Form::label('forty_year_mean_3', '40 Year Average', ['class' => 'col-form-label required'])}}
                        {{Form::text('forty_year_mean_3', $landing_page->forty_year_mean_3, ['class' => 'form-control ', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <h5 class="col-12 mt-2 mb-0">Month 4 - {{$landing_page->outlook_month->addMonths(3)->format('F')}}</h5>
                    <div class="col-4">
                        {{Form::label('mean_4', 'Current Mean', ['class' => 'col-form-label required'])}}
                        {{Form::text('mean_4', $landing_page->mean_4, ['disabled', 'class' => 'form-control', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <div class="col-4 col-offset-1">
                        {{Form::label('forty_year_mean_4', '40 Year Average', ['class' => 'col-form-label required'])}}
                        {{Form::text('forty_year_mean_4', $landing_page->forty_year_mean_4, ['class' => 'form-control ', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <h5 class="col-12 mt-2 mb-0">Month 5 - {{$landing_page->outlook_month->addMonths(4)->format('F')}}</h5>
                    <div class="col-4">
                        {{Form::label('mean_5', 'Current Mean', ['class' => 'col-form-label required'])}}
                        {{Form::text('mean_5', $landing_page->mean_5, ['disabled', 'class' => 'form-control', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <div class="col-4 col-offset-1">
                        {{Form::label('forty_year_mean_5', '40 Year Average', ['class' => 'col-form-label required'])}}
                        {{Form::text('forty_year_mean_5', $landing_page->forty_year_mean_5, ['class' => 'form-control ', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <h5 class="col-12 mt-2 mb-0">Month 6 - {{$landing_page->outlook_month->addMonths(5)->format('F')}}</h5>
                    <div class="col-4">
                        {{Form::label('mean_6', 'Current Mean', ['class' => 'col-form-label required'])}}
                        {{Form::text('mean_6', $landing_page->mean_6, ['disabled', 'class' => 'form-control', 'placeholder' => 'ex. 10'])}}
                    </div>
                    <div class="col-4 col-offset-1">
                        {{Form::label('forty_year_mean_6', '40 Year Average', ['class' => 'col-form-label required'])}}
                        {{Form::text('forty_year_mean_6', $landing_page->forty_year_mean_6, ['class' => 'form-control ', 'placeholder' => 'ex. 10'])}}
                    </div>
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

<?php 
    $forty_year_mean_array = array();
    $current_mean_array = array();
    $rate_of_change_array = array();
    $date_array = array();
    array_push($date_array, $landing_page->outlook_month->format('M Y'),$landing_page->outlook_month->addMonths(1)->format('M Y'), $landing_page->outlook_month->addMonths(2)->format('M Y'), $landing_page->outlook_month->addMonths(3)->format('M Y'), $landing_page->outlook_month->addMonths(4)->format('M Y'), $landing_page->outlook_month->addMonths(5)->format('M Y'));
    array_push($forty_year_mean_array,(int)$landing_page->forty_year_mean_1, (int)$landing_page->forty_year_mean_2, (int)$landing_page->forty_year_mean_3, (int)$landing_page->forty_year_mean_4, (int)$landing_page->forty_year_mean_5, (int)$landing_page->forty_year_mean_6);
    array_push($current_mean_array,(int)$landing_page->mean_1, (int)$landing_page->mean_2, (int)$landing_page->mean_3, (int)$landing_page->mean_4, (int)$landing_page->mean_5, (int)$landing_page->mean_6);
    for($i = 0; $i < 6; $i++){
        $temp = 100*($current_mean_array[$i]-$forty_year_mean_array[$i])/ ($forty_year_mean_array[$i] ? 1);
        array_push($rate_of_change_array, round($temp, 2));
    }
?>

<script>
    Highcharts.chart('container', {
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Tarlac rainfall forecast vs 40-year average rainfall',
            align: 'center'
        },
        subtitle: {
            text: 'PAGASA',
            align: 'center'
        },
        xAxis: [{
            title: {
                text: 'Month and Year'
            },
            categories: @php echo json_encode($date_array);@endphp,
            crosshair: true
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value}%',
                style: {
                    color: Highcharts.getOptions().colors[5]
                }
            },
            title: {
                text: '% of change',
                style: {
                    color: Highcharts.getOptions().colors[5]
                }
            },
            opposite: true

        }, { // Secondary yAxis
            gridLineWidth: 0,
            title: {
                text: 'Rainfall',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            labels: {
                format: '{value} mm',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            }

        }, ],
        tooltip: {
            shared: true
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            x: 80,
            verticalAlign: 'top',
            y: 55,
            floating: true,
            backgroundColor:
                Highcharts.defaultOptions.legend.backgroundColor || // theme
                'rgba(255,255,255,0.25)'
        },
        series: [{
            name: 'Current Rainfall Forecast',
            type: 'column',
            yAxis: 1,
            data: @php echo json_encode($current_mean_array);@endphp,
            tooltip: {
                valueSuffix: ' mm'
            }

        }, {
            name: '40-year average rainfall',
            type: 'column',
            yAxis: 1,
            data: @php echo json_encode($forty_year_mean_array);@endphp,
            tooltip: {
                valueSuffix: ' mm'
            }

        }, {
            name: '% of change',
            type: 'spline',
            data: @php echo json_encode($rate_of_change_array);@endphp,
            tooltip: {
                valueSuffix: '%'
            }, 
            color: Highcharts.getOptions().colors[5]
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        floating: false,
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom',
                        x: 0,
                        y: 0
                    },
                    yAxis: [{
                        labels: {
                            align: 'right',
                            x: 0,
                            y: -6
                        },
                        showLastLabel: false
                    }, {
                        labels: {
                            align: 'left',
                            x: 0,
                            y: -6
                        },
                        showLastLabel: false
                    }, {
                        visible: false
                    }]
                }
            }]
        }
    });
    $(document).ready(function() {
        $('input[name$="bulletin_background_color_radio"]').click(function() {
            if($(this).val() == '0') {
                $('.background-image-form-bulletin').hide();  
                $('.block-color-form-bulletin').show();            
            }
            else {
                $('.block-color-form-bulletin').hide();  
                $('.background-image-form-bulletin').show();   
            }
        });
    });
</script>
<style>
    #container{
        overflow: unset !important;
    }
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 310px;
        margin: 1em auto;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }

</style>