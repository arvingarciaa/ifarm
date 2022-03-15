<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LandingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('landing_page')->insert([ 
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
            'weather_title' => 'Weather Forecast and Rainfall Outlook',
            'weather_subtitle' => 'Weather Forecast for the next 5 days and Rainfall Outlook for the next 5 months. Summary of farm information of the selected site.',
            'weather_image' => '15.png',
            'weather_link' => 'https://oahajj.users.earthengine.app/view/ifarm-farm-level-ndvi',
            'bulletin_title' => 'Corn Bulletin',
            'bulletin_date' => '(December 2021 – April 2022 based on November 2021 Condition)',
            'bulletin_subtitle' => 'Site-specific advisories using meteorological information for better farm management decision-making. Source: Dr. Artemio Salazar, Project SARAi',
            'bulletin_advisory' => 'In Tarlac (Region III), decline in rainfall is expected in December. Corn planting should be done by January at latest. Corn harvesting should be done by April since rice crop will be planted by May. We expect the usual good corn-after-rice production in the 1st and 2nd quarter of the year.',
            'vegetation_title' => 'Monitoring of Farm-level Vegetation Cover',
            'vegetation_subtitle' => 'Percentage of the farm area with vegetation cover and without planted crops.',
            'maps_title' => 'Disaster Risk Reduction and Management Maps',
            'maps_subtitle' => 'Damage assessment tools to mitigate the impact of disasters.',
            'news_title' => 'News and Information from Central Luzon',
            'news_subtitle' => 'Latest news and information on agricultural activities and initiatives from Central Luzon.',
            'planting_status_title' => 'Farm-level Planting Status',
            'planting_status_subtitle' => 'List of farmers and farm areas with stages of planting status.',
            'mobile_download_title' => 'iFarm Crop Monitoring App',
            'mobile_download_subtitle' => 'Want to access the iFarm outputs on your mobile phones? Download our mobile application now!',
            'mobile_download_note' => '*Please note that the application is still on testing phase so you may need to download the latest version once a month'
        ]);
    }
}
