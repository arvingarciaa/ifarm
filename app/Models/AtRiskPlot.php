<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtRiskPlot extends Model
{
    use HasFactory;
    protected $fillable = [
        'gpx_id',
        'development_stage',
        'area_gis',
        'ndvi_value',
        'status'
    ];
}
