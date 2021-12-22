<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<div class="section {{request()->edit == '1' ? 'overlay-container' : ''}}" style="">
    <h1 class="text-center">Corn Bulletin</h1>
    <h4 class="text-center">(December 2021 – April 2022 based on November 2021 Condition)</h4>
    <h5 class="text-center">
        Site-specific advisories using meteorological information for better farm management decision-making. <br>Source: Dr. Artemio Salazar, Project SARAi
    </h5>

    <h2 class="mt-2" style="text-align: center;">
        <button type="button" class="btn btn-outline-secondary">Download Nationwide Bulletin</button>
    </h2>

    <h5 class="mt-4" style="text-align:justify;margin: 0 auto;width: 85%;">
        <b>Advisory:</b> In Tarlac (Region III), decline in rainfall is expected in December. Corn planting should be done by January at latest.   Corn harvesting should be done by April since rice crop will be planted by May. We expect the usual good corn-after-rice production in the 1st and 2nd quarter of the year.
    </h5>
    <figure class="highcharts-figure">
        <div id="container"></div>
    </figure>

    @if(request()->edit == 1)
        <div class="hover-overlay" style="width:100%">    
            <button type="button" class="btn btn-xs btn-primary" data-target="#editBulletinSectionModal" data-toggle="modal"><i class="far fa-edit"></i></button>      
        </div>
    @endif
</div>

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
            text: 'Dr. Artemio Salazar, Project SARAi',
            align: 'center'
        },
        xAxis: [{
            categories: ['Dec 21', 'Jan 22', 'Feb 22', 'Mar 22', 'Apr 22'],
            crosshair: true
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value}%',
                style: {
                    color: Highcharts.getOptions().colors[2]
                }
            },
            title: {
                text: '% of change',
                style: {
                    color: Highcharts.getOptions().colors[2]
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
            data: [33, 14, 11, 27, 58],
            tooltip: {
                valueSuffix: ' mm'
            }

        }, {
            name: '40-year average rainfall',
            type: 'column',
            yAxis: 1,
            data: [14, 2, 8, 22, 61],
            tooltip: {
                valueSuffix: ' mm'
            }

        }, {
            name: '% of change',
            type: 'spline',
            data: [233, 626, 134, 124, 119],
            tooltip: {
                valueSuffix: '%'
            }
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
<div class="modal fade" id="editBulletinSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit ICMF Bulletin Section</h6>
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
                    {{Form::label('latest_aanr_header', 'ICMF Bulletin Header', ['class' => 'col-form-label required'])}}
                    {{Form::text('latest_aanr_header', 'ICMF Corn Bulletin', ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('latest_aanr_subheader', 'ICMF Bulletin Subheader', ['class' => 'col-form-label required'])}}
                    {{Form::textarea('latest_aanr_subheader', 'We generate science-based site-specific advisories using meteorological information for better farm management decision-making. Source: Dr. Artemio Salazar; Project 3.3 Integrating Research Results, Communication Planning, and Linking Science to Policy
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