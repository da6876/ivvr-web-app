<?php

namespace App\Models\PO;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'purchase_order_mst';

    protected $fillable = [
        'id','purchase_order_no', 'purchase_order_date', 'lc_bank_id', 'lc_number', 'lc_date',
        'purchase_type','cost_type','store','origin',
        'supplier_id','consignee_id','department_id','authorization',
        'status', 'create_by', 'create_date', 'update_by', 'update_date',
    ];

}
