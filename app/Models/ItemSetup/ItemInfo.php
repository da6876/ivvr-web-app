<?php

namespace App\Models\ItemSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemInfo extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'item_info';

    protected $fillable = [
        'id', 'item_code','mjr_id', 'mnr_id', 'measur_unit_id', 'mjr_cat_id',
        'name', 'desc', 'part_no', 'status',
        'create_by', 'create_date', 'update_by', 'update_date',
    ];

}
