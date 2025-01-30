<?php

namespace App\Http\Controllers\PO;

use App\Http\Controllers\Controller;
use App\Models\ItemSetup\ItemAttributeInfo;
use App\Models\ItemSetup\ItemInfo;
use App\Models\PO\PurchaseOrder;
use App\Models\PO\PurchaseOrderDtl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        return view('purchaseorder.poInfo.index');
    }
    public function create()
    {
        return view('purchaseorder.poInfo.create');
    }
    public function edit($id)
    {
        return view('purchaseorder.poInfo.edit', [ 'poId' => $id]);
    }
    public function store(Request $request){
        try {

            if ($request['id']==""){

                $validator = Validator::make($request->all(), [
                    'purchase_order_no' => 'required',
                    'purchase_order_date' => 'required',
                    'lc_bank_id' => 'required',
                    'lc_number' => 'required',
                    'lc_date' => 'required',
                    'purchase_type' => 'required',
                    'store' => 'required',
                    'origin' => 'required',
                    'supplier_id' => 'required',
                    'consignee_id' => 'required',
                ]);

                if ($validator->fails()) {
                    return response()->json(['statusCode' => 204,'statusMsg' => 'Validation Error.', 'errors' => $validator->errors()]);
                }

                $purchaseOrder = PurchaseOrder::create([
                    'purchase_order_no' =>$request->purchase_order_no,
                    'purchase_order_date' =>$request->purchase_order_date,
                    'lc_bank_id' =>$request->lc_bank_id,
                    'lc_number' =>$request->lc_number,
                    'lc_date' =>$request->lc_date,
                    'purchase_type' =>$request->purchase_type,
                    'store' =>$request->store,
                    'origin' =>$request->origin,
                    'supplier_id' =>$request->supplier_id,
                    'consignee_id' =>$request->consignee_id,
                    'cost_type' =>$request->cost_type,
                    'department_id' =>$request->department_id,
                    'authorization' =>"Pending",
                    'status' =>"A",
                    'create_by' => '1',
                ]);
                $itemDetailsInfo = json_decode($request->itemDetailsInfo, true);
                foreach ($itemDetailsInfo as $rowData) {

                    PurchaseOrderDtl::create([
                        'purchase_order_id' => $purchaseOrder->id,
                        'item_id' => $rowData['itemID'],
                        'attribute_id' => $rowData['attributes'],
                        'attribute_values_id' => $rowData['attributeValues'],
                        'rate' => $rowData['con_rate'],
                        'qunty' => $rowData['qunty'],
                        'cur_code' => $rowData['cur_code'],
                        'unit_cost' => $rowData['unit_cost'],
                        'con_rate' => $rowData['con_rate'],
                        'vat' => $rowData['vat'],
                        'atc' => $rowData['atc'],
                        'remark' => 'N/A',
                        'status' =>"A",
                        'create_by' => '1',
                    ]);
                }
                return response()->json([
                    "statusCode" => 200,
                    "statusMsg" => "Data Added Successfully"
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ]);
        }
    }
    public function destroy($id){
        try {
            $purchaseOrder = PurchaseOrder::findOrFail($id);
            $purchaseOrder->update([
                'status' => "D",
                'update_by' => '1',
            ]);
            $purchaseOrderDtl = PurchaseOrderDtl::where('purchase_order_id', $purchaseOrder->id);
            if ($purchaseOrderDtl) {
                $purchaseOrderDtl->update([
                    'status' => "D",
                    'update_by' => '1',
                ]);
            } else {
                return response()->json([
                    "statusCode" => 404,
                    "statusMsg" => "Purchase Order Detail not found for Purchase Order ID: " . $purchaseOrder->id
                ]);
            }

            return response()->json([
                "statusCode" => 200
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ]);
        }
    }

    public function show($id)
    {
        try {
            $data['poMaster'] = PurchaseOrder::findOrFail($id);
            $data['poDetails'] = PurchaseOrderDtl::where('purchase_order_id','=',$id)->get();
            return $data;
        } catch (\Exception $e) {

            return response()->json([
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ]);
        }
    }

    public function ForwordToAuthorization()
    {
        try {
            $id = request()->input('id');

            $purchaseOrder = PurchaseOrder::findOrFail($id);
            $purchaseOrder->update([
                'authorization' => "Authorization Level 1 Pending",
                'update_by' => '1',
            ]);
            return response()->json([
                "statusCode" => 200,
                "purchaseOrder" => $purchaseOrder
            ]);
        } catch (\Exception $e) {

            return response()->json([
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ]);
        }
    }

    public function showDetails()
    {
        try {
            $id = request()->input('id');
            $query = DB::table('purchase_order_dtl as p')
                ->join('item_info as ii', 'ii.id', '=', 'p.item_id')
                ->join('item_attribute_value as av', DB::raw('FIND_IN_SET(av.id, p.attribute_values_id)'), '>', DB::raw('0'))
                ->join('item_attribute as a', 'a.id', '=', 'av.attribute_id')
                ->select(
                    'p.id',
                    'p.purchase_order_id',
                    'ii.name as item_name',
                    DB::raw('GROUP_CONCAT(DISTINCT CONCAT(a.name, ": ", av.name) ORDER BY a.name) as attribute_details'),
                    'p.rate',
                    'p.qunty',
                    'p.cur_code',
                    'p.con_rate',
                    'p.unit_cost',
                    'p.vat',
                    'p.atc'
                )
                ->where('p.purchase_order_id', '=', $id)
                ->groupBy(
                    'p.id',
                    'p.purchase_order_id',
                    'ii.name',
                    'p.rate',
                    'p.qunty',
                    'p.cur_code',
                    'p.con_rate',
                    'p.unit_cost',
                    'p.vat',
                    'p.atc'
                )
                ->get();
            return $query;

        } catch (\Exception $e) {

            return response()->json([
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ]);
        }
    }

    public function getdata(Request $request)
    {
        $query = DB::table('purchase_order_mst as p')
            ->select('p.id','p.purchase_order_no', 'p.purchase_order_date', 'p.lc_number','p.authorization')
            ->where('p.status', '!=', 'D');
        $totalCount = $query->count();
        if (!empty($request->name)) {
            $query->where('p.purchase_order_no', 'like', '%' . $request->name . '%');
        }

        $filteredCount = $query->count();
        if ($request->has('order')) {
            $orderColumn = $request->columns[$request->order[0]['column']]['data'];
            $orderDirection = $request->order[0]['dir'];
            $query->orderBy($orderColumn, $orderDirection);
        }

        $start = $request->input('start');
        $length = $request->input('length');
        $data = $query->offset($start)->limit($length)->get();

        return response()->json([
            'draw' => intval($request->draw),
            'recordsTotal' => $totalCount,
            'recordsFiltered' => $filteredCount,
            'data' => $data,
            'name' => $request->name,
        ]);
    }
}
