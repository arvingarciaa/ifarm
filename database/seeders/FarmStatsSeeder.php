<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FarmStatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('farm_stats')->insert([ 
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
            'location' => 'La Paz',
            'number_of_farm_lots' => '587',
            'plots_harvested' => '9',
            'plots_in_vegetative_state' => '84',
            'plots_in_reproductive_state' => '7',
            'map_image' => '15.png',
            'map_link' => 'https://oahajj.users.earthengine.app/view/ifarm-farm-level-ndvi',
        ]);

        DB::table('farm_stats')->insert([ 
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
            'location' => 'Concepcion',
            'number_of_farm_lots' => '163',
            'plots_harvested' => '59',
            'plots_in_vegetative_state' => '34',
            'plots_in_reproductive_state' => '21',
            'map_image' => '15.png',
            'map_link' => 'https://oahajj.users.earthengine.app/view/ifarm-farm-level-ndvi',
        ]);
    }
}
