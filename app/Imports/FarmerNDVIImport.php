<?php

namespace App\Imports;

use App\Models\Farmer;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;

class FarmerNDVIImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $farmer = Farmer::where('gpx_id', '=', $row['gpx_id'])->firstOrFail();
            $farmer->ndvi_value = $row['ndvi'];
            $farmer->area_gis = $row['area'];
            $farmer->development_stage = $row['development_stage'];
            $farmer->save();
        }
    }
}
