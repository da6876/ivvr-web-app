<?php

namespace App\Models\ItemSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemAttribute extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'item_attribute';

    protected $fillable = [
        'id',
        'name',
        'status',
        'create_by',
        'create_date',
        'update_by',
        'update_date',
    ];

}
