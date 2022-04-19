<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;
    protected $fillable = [
        'rsbsa_no',
        'last_name',
        'first_name',
        'ext_name',
        'gpx_id',
        'municipality',
        'barangay',
        'parcel_name',
        'parcel_area',
        'planted_area',
        'commodity',
        'date_planted',
        'development_stage',
        'area_gis',
        'ndvi_value'
    ];
}
