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
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5NTllYmFjOS0xNWUwLTRlODUtODQ2ZS05MjY4NDg1Zjk5OTkiLCJqdGkiOiJlMTg4OGJkM2IzYTlkY2I1MDM2MWE2Njg0N2Y3MjRkNzFmYjJhZDNjN2RjZDNjNjQxMGI1YjhmYmRmNTJhNjliZWVlZTUxZTgxOTU1Y2YwNSIsImlhdCI6MTY0NTA4OTgzMy41NTMyMzEsIm5iZiI6MTY0NTA4OTgzMy41NTMyMzUsImV4cCI6MTY3NjYyNTgzMy41NDE1NzcsInN1YiI6IiIsInNjb3BlcyI6W119.rbt2DaWb506zzGwvV447My7wVajF8Yk5TIH19I5YxYQV6JBay9yEACvL8CDPFCZbhUZmtQd_MNdmn33J27_D6WRkIZPp8syo2RpGYS5gwiGd2YtR6zc2JCQTisYpWCedY3WXjPIEgiIT1Sjf1sp8dClBv07xsLCWr4Ju9stIwvC7RqusF_hRllTDRQkwa2EIx0j518C6i6FoBFu_04R54fRUvKKsmG-9X3Ivqd6U588Rrq45mciI0kUCuXAEi-tQcjJHWYmkEDZE1KhnQqxtG7whUaeGgDhI3T660125VT2QsCdxYeNY3FcN2Hj8XTcayNCiRt4z9gWiy4qdPY6hSu9v6ikXJ6RSfHeiWeKMb5PkbqS75NBg0MStD2_HkO_030kaTAgfil9oMhpBx91SZJn2dezY0D8t1vdDr_ItidGFLbpIIkvKObAfp9y4n6rwS1MI1hi21k3jgEOwEBZt38iGIOW4WUABBMypgjYjSLFdtPuBRojkH931vE13i1Cq4ijhTTr6ZXNdEL3AusjZS--AbS9jdROyqWpW0qCvP61IRthED-Yan1buK-KNiD7NPaxxrtmz14bcG8eklrgi3EzW1Ywbf9c9h33-zjupgOA4jOY-7ffKI2prklW02qkuJn-YPcm6AjWz9f5FiEtIaYAzArUqWpqLGlX2wTMApJM';
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
