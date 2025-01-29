<?php

namespace App\Models\PO;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderDtl extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'purchase_order_dtl';

    protected $fillable = [
        'id','purchase_order_id', 'item_id', 'attribute_id', 'attribute_values_id', 'rate',
        'qunty','cur_code','con_rate','unit_cost','vat','atc','remark',
        'status', 'create_by', 'create_date', 'update_by', 'update_date',
    ];

}
