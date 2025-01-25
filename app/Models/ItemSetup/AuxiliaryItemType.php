<?php

namespace App\Models\ItemSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuxiliaryItemType extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'st_auxiliary_item_type';

    protected $fillable = [
        'id',
        'aux_type',
        'aux_type_descr',
        'status',
        'create_by',
        'create_date',
        'update_by',
        'update_date',
    ];


}
