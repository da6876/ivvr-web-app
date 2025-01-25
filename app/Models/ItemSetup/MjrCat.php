<?php

namespace App\Models\ItemSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MjrCat extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'st_mjr_cat';

    protected $fillable = [
        'id',
        'mjr_code',
        'mjr_desc',
        'status',
        'create_by',
        'create_date',
        'update_by',
        'update_date',
    ];

}
