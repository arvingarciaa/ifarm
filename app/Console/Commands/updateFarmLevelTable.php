<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Models\Farmer;

class updateFarmLevelTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'farmer:updateAPIData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update db with data from DA API daily';

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
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5NWQwYzBiNy0zMDFiLTQ4ZDUtYTIyNi1jMTc2NDlmZmJjZmMiLCJqdGkiOiJjNzllOGVlMGRhM2FmNzIxYTA5ODgzMjIzNTE2YmE5ZTU3ZGZlNTVmNDc0ZjcwZTNmZmI5ZjIzYTE5OTBhYWVkNjc0ODBlOGRiMWE3MGRjNSIsImlhdCI6MTY0NzI1MzA4MS45NDk5NTIsIm5iZiI6MTY0NzI1MzA4MS45NDk5NTgsImV4cCI6MTY3ODc4OTA4MS45MzA0OTUsInN1YiI6IiIsInNjb3BlcyI6W119.fkyyI15QLRFRFbYsn4c6NPEFWOe3WzAspgQtPwDSa7B5dnTdM1srH_Kji1dArnDpmNs7Ym6LihdGo0KYv6IYhbDR5HdTOqCEMrBUkIo0j6BhAULlJszlXunBi1zB63kV1bgr29c7rTigPxjMMH5HtT8bly9N9VtslqLwoec6oKnUYRcmuyETWMZ-HXpPN9SGRH_yKBVn937wGMgyVRZokFIUl6K1xRA6bG8_MB-BXYbScIMBi44m7SyDx5NiJyDGm4FN8aiQNzzJQal42VA6pBo0vgQlnKQeNBYQzwjKq0ZZEACcRIM4GbzgItuqNsklMtk5mUhvyRrBNrHkV9ehOYz6lktX0hoL0rEV0J1DPpwRIL_AzQZ1igmHedVKBQmFmajLOjG4FxSdAiYZBLAo-Q2juvdn_7ZGmXBCHCSVs3cn6PxJ9YW1rwpRhxkAAcySKFjmnfTKe3N_6n7WPaGgeHzKRKsOrvkiKsrQvXjFgR2m_4OUkv6iROcHgAW-oTxaxp2bkc8MNF0hb-nGoFGPEdUJf488l2q9k4wFDM0uDM13rKnrzSJtf0r86r9WdGJFYicisMvPckAHziUbKr5wAncY0yFVDj7oEHNKzsk01nawO9iWeIlXpm_d6jDUkSzPfs07cKhnwQmY-7-j8wuhLAbUE2I80Po-Coao3okN2J8';
        $client = new Client(['base_uri' => 'https://ifarm.ai4gov.net/', 'verify' => false]);
        $response = $client->request(
            'GET',  
            'api/reports/table/planting',
            ['headers' => 
                [
                    'Authorization' => 'Bearer ' . $token,        
                    'Accept'        => 'application/json',
                ]
            ]
        )->getBody()->getContents();
        $farmerData = json_decode($response, true);
            

        foreach($farmerData['data'] as $farmerEntry){
            $farmer = Farmer::updateOrCreate(
                ['rsbsa_no' => $farmerEntry['rsbsa_no']],
                ['last_name' => $farmerEntry['last_name'],
                'first_name' => $farmerEntry['first_name'],
                'ext_name' => $farmerEntry['ext_name'],
                'gpx_id' => $farmerEntry['gpx_id'],
                'municipality' => $farmerEntry['municipality'],
                'barangay' => $farmerEntry['barangay'],
                'parcel_name' => $farmerEntry['parcel_name'],
                'parcel_area' => $farmerEntry['parcel_area'],
                'planted_area' => $farmerEntry['planted_area'],
                'commodity' => $farmerEntry['commodity'],
                'date_planted' => $farmerEntry['date_planted'],
                'development_stage' => $farmerEntry['development_stage'],
                ]
            );
        }
    }
}
