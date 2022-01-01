<?php

namespace App\Console\Commands;

use App\Models\WeatherData;
use Illuminate\Console\Command;

class UpdateWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update db with data from openweather and wunderground API daily';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //Weather Underground API
        $url_wunderground = file_get_contents("https://api.weather.com/v3/wx/forecast/daily/5day?geocode=14.156233%2C121.262197&units=m&language=en-US&format=json&apiKey=f4664437a9f14d5ba64437a9f13d5b5a");
        $json_wunderground = json_decode($url_wunderground, true);

        $wunderground_db = WeatherData::updateOrCreate(
            ['source' => 'wunderground'],
            ['data' => json_encode($json_wunderground)]
        );

        $url_openweather = file_get_contents("http://api.openweathermap.org/data/2.5/onecall?lat=14.156233&lon=121.262197&units=metric&appid=8da14edfb48e4bd083619be0df91f4a3");
        $json_openweather = json_decode($url_openweather, true);

        $openweather_db = WeatherData::updateOrCreate(
            ['source' => 'openweathermap'],
            ['data' => json_encode($json_openweather)]
        );
    }
}
