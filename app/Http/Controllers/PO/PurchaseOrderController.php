<?php

namespace App\Http\Controllers\PO;

use App\Http\Controllers\Controller;
use App\Models\ItemSetup\ItemAttributeInfo;
use App\Models\ItemSetup\ItemInfo;
use App\Models\PO\PurchaseOrder;
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
        return view('purchaseorder.poInfo.edit', [ 'itemID' => $id]);
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
                $item_code =$request->mjr_id.$request->mjr_cat_id.$request->mnr_id.$request->measur_unit_id;
                $temInfo = PurchaseOrder::create([
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
                    'department_id' =>$request->department_id,
                    'authorization' =>"Pending",
                    'status' =>"A",
                    'create_by' => '1',
                ]);
                /*$attributes = json_decode($request->attribute, true);  // `true` makes it return an associative array
                foreach ($attributes as $attribute) {
                    $attribute_id = $attribute['attribute_ids'];
                    $attribute_value_ids = implode(',', $attribute['attribute_value_ids']); // Convert array to a comma-separated string

                    // Create the ItemAttributeInfo record
                    ItemAttributeInfo::create([
                        'item_id' => $temInfo->id,  // Link the newly created item
                        'attribute_id' => $attribute_id,  // The selected attribute id
                        'attribute_value_ids' => $attribute_value_ids,  // Comma-separated string of attribute_value_ids
                    ]);
                }*/
                return response()->json([
                    "statusCode" => 200,
                    "statusMsg" => "Data Added Successfully"
                ]);
            }

            else{
                $temInfo = ItemInfo::find($request->id);
                if (!$temInfo) {
                    return response()->json([
                        "statusCode" => 404,
                        "statusMsg" => "Item not found"
                    ]);
                }

                $temInfo->mjr_id = $request->mjr_id;
                $temInfo->mnr_id = $request->mnr_id;
                $temInfo->measur_unit_id = $request->measur_unit_id;
                $temInfo->mjr_cat_id = $request->mjr_cat_id;
                $temInfo->name = $request->name;
                $temInfo->desc = $request->desc;
                $temInfo->save();

                $attributes = json_decode($request->attribute, true);
                foreach ($attributes as $attribute) {
                    $attribute_id = $attribute['attribute_ids'];
                    $attribute_value_ids = implode(',', $attribute['attribute_value_ids']);
                    $existingAttribute = ItemAttributeInfo::where('item_id', $temInfo->id)
                        ->where('attribute_id', $attribute_id)
                        ->first();

                    if ($existingAttribute) {
                        $existingAttribute->attribute_value_ids = $attribute_value_ids;
                        $existingAttribute->save();
                    } else {
                        ItemAttributeInfo::create([
                            'item_id' => $temInfo->id,
                            'attribute_id' => $attribute_id,
                            'attribute_value_ids' => $attribute_value_ids,
                        ]);
                    }
                }
                return response()->json([
                    "statusCode" => 200,
                    "statusMsg" => "Data Updated Successfully"
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
            $permission = ItemInfo::findOrFail($id);
            $permission->update([
                'status' => "D",
                'update_by' => '1',
            ]);

            return  response()->json([
                "statusCode" => 200
            ]);
        } catch (\Exception $e) {

            return json_encode(array(
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ));;
        }
    }

    public function show($id)
    {
        try {
            $data['itemMaster'] = ItemInfo::findOrFail($id);
            $data['itemAttibute'] = ItemAttributeInfo::where('item_id','=',$id)->get();
            return $data;
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
