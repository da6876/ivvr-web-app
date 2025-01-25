<?php

namespace App\Models\ItemSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemAttributeInfo extends Model
{

    public $timestamps = false;

    protected $table = 'item_attribute_info';

    protected $fillable = [
        'id',
        'item_id',
        'attribute_id',
        'attribute_value_ids'
    ];

}
