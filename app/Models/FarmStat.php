<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmStat extends Model
{
    use HasFactory;
    protected $dates = ['quick_farm_stats_date', 'planting_status_image_date'];
}
