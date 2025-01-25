<?php

namespace App\Models\ItemSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemMst extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'st_item_mst';

    protected $fillable = [
        'id',
        'item_short_desc',
        'item_old_code',
        'item_code',
        'item_desc',
        'msr_unit_code',
        'item_part_no',
        'item_hs_code',
        'item_reorder_qty',
        'item_avg_lead_time',
        'item_req_qty',
        'item_max_qty',
        'item_min_qty',
        'item_eco_qty',
        'item_tolr_qty',
        'mjr_code',
        'mjr_sub_code',
        'mnr_sub_code',
        'origin',
        'item_status',
        'item_wa_reorder_qty',
        'item_po_reorder_qty',
        'sl_no',
        'country_code',
        'item_basic_category',
        'item_base_store',
        'item_base_sub_section',
        'item_basic_sub_category',
        'account_card_no',
        'mnr_code',
        'main_item_msr_code',
        'contain_qty',
        'auxiliary_item',
        'item_size',
        'item_capacity',
        'item_sub_name',
        'volume_info',
        's_item_code',
        'mak_qty',
        'mak_phy_bal_qty',
        'id_no',
        'shortage_excess',
        'box_or_ledger',
        'bbc_no',
        'it_remarks',
        'data_error',
        'unit_3_4_qty',
        'unit_5_qty',
        'item_pic_name',
        'consignee',
        'status',
        'create_by',
        'create_date',
        'update_by',
        'update_date',
    ];

}
