<?php

namespace App\Models\ItemSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeasureUnit extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'st_measure_unit';

    protected $fillable = [
        'id',
        'msr_unit_code',
        'msr_unit_desc',
        'status',
        'create_by',
        'create_date',
        'update_by',
        'update_date',
    ];

}
