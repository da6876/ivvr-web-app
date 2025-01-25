<?php

namespace App\Models\ItemSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MjrSubCat extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'st_mjr_sub_cat';

    protected $fillable = [
        'id',
        'mjr_sub_code',
        'mjr_sub_desc',
        'mjr_code',
        'status',
        'create_by',
        'create_date',
        'update_by',
        'update_date',
    ];

}
