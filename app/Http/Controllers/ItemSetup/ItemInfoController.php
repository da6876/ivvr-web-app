<?php

namespace App\Http\Controllers\ItemSetup;

use App\Http\Controllers\Controller;
use App\Models\ItemSetup\ItemAttributeInfo;
use App\Models\ItemSetup\ItemInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ItemInfoController extends Controller
{
    public function index()
    {
        return view('itemsetup.ItemInfo.index');
    }
    public function create()
    {
        return view('itemsetup.ItemInfo.create');
    }
    public function store(Request $request){
        try {

            if ($request['id']==""){

                $validator = Validator::make($request->all(), [
                    'mjr_id' => 'required',
                    'mnr_id' => 'required',
                    'measur_unit_id' => 'required',
                    'mjr_cat_id' => 'required',
                    'desc' => 'required',
                    'name' => 'required',
                    'status' => 'required',
                ]);

                if ($validator->fails()) {
                    return response()->json(['statusCode' => 204,'statusMsg' => 'Validation Error.', 'errors' => $validator->errors()]);
                }
                $item_code =$request->mjr_id.$request->mjr_cat_id.$request->mnr_id.$request->measur_unit_id;
                $temInfo = ItemInfo::create([
                    'item_code' =>$item_code,
                    'mjr_id' =>$request->mjr_id,
                    'mnr_id' =>$request->mnr_id,
                    'measur_unit_id' =>$request->measur_unit_id,
                    'mjr_cat_id' =>$request->mjr_cat_id,
                    'name' =>$request->name,
                    'desc' =>$request->desc,
                    'status' =>$request->status,
                    'create_by' => '1',
                ]);
                $attributes = json_decode($request->attribute, true);  // `true` makes it return an associative array
                foreach ($attributes as $attribute) {
                    $attribute_id = $attribute['attribute_ids'];
                    $attribute_value_ids = implode(',', $attribute['attribute_value_ids']); // Convert array to a comma-separated string

                    // Create the ItemAttributeInfo record
                    ItemAttributeInfo::create([
                        'item_id' => $temInfo->id,  // Link the newly created item
                        'attribute_id' => $attribute_id,  // The selected attribute id
                        'attribute_value_ids' => $attribute_value_ids,  // Comma-separated string of attribute_value_ids
                    ]);
                }
                /*ItemAttributeInfo::create([
                    'item_id'=>
                    'attribute_id'=>
                    'attribute_value_ids'=>
                ]);*/
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
            $singleDataShow = ItemInfo::findOrFail($id);
            return $singleDataShow;
        } catch (\Exception $e) {

            return response()->json([
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ]);
        }
    }
    public function getdata(Request $request)
    {
        $query = DB::table('item_info as p')
            ->select('p.id','p.mjr_id', 'p.mnr_id','p.measur_unit_id',
                'p.mjr_cat_id','p.attribute_ids','p.name','p.desc','p.part_no',
                'p.status', 'p.create_date')
            ->where('p.status', '!=', 'D');

        $totalCount = $query->count();

        if (!empty($request->name)) {
            $query->where('item_attribute.name', 'like', '%' . $request->name . '%');
        }
        if (!empty($request->email)) {
            $query->where('p.name', 'like', '%' . $request->email . '%');
        }
        if (!empty($request->SelectAttribute)) {
            $query->where('p.attribute_id', 'like', '%' . $request->SelectAttribute . '%');
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
    public function showItemsDropDown(){
        $ViewType = request()->input('ViewType');
        if ($ViewType == "mjr") {
            try {
                $st_mjr_cat = DB::table('st_mjr_cat')
                    ->where('status', '=', 'N')
                    ->get();
                return json_encode($st_mjr_cat);
            } catch (\Exception $e) {
                DB::rollBack();
                return ["o_status_message" => $e->getMessage()];
            }
        }
        elseif($ViewType == "mjr_cat"){
            $mjr_id = request()->input('mjr_id');
            try {
                $st_mjr_sub_cat = DB::table('st_mjr_sub_cat')
                    ->where('status', '=', 'N')
                    ->where('mjr_code', '=', $mjr_id)
                    ->get();
                return json_encode($st_mjr_sub_cat);
            } catch (\Exception $e) {
                DB::rollBack();
                return ["o_status_message" => $e->getMessage()];
            }
        }
        elseif ($ViewType == "mnr") {
            $mjr_id = request()->input('mjr_id');
            $mjr_cat_id = request()->input('mjr_cat_id');
            try {
                $st_mnr_cat = DB::table('st_mnr_cat')
                    ->where('status', '=', 'N')
                    ->where('mjr_code', '=', $mjr_id)
                    ->where('mjr_sub_code', '=', $mjr_cat_id)
                    ->get();
                return json_encode($st_mnr_cat);
            } catch (\Exception $e) {
                DB::rollBack();
                return ["o_status_message" => $e->getMessage()];
            }
        }
        elseif($ViewType == "measur_unit"){
            try {
                $st_measure_unit = DB::table('st_measure_unit')
                    ->where('status', '=', 'N')
                    ->get();
                return json_encode($st_measure_unit);
            } catch (\Exception $e) {
                DB::rollBack();
                return ["o_status_message" => $e->getMessage()];
            }
        }
        elseif($ViewType == "attribute"){
            try {
                $attribute_ids = DB::table('item_attribute')
                    ->where('status', '=', 'A')
                    ->get();
                return json_encode($attribute_ids);
            } catch (\Exception $e) {
                DB::rollBack();
                return ["o_status_message" => $e->getMessage()];
            }
        }
        elseif($ViewType == "attribute_value"){
            $attribute_id = request()->input('attribute_id');
            try {
                $attribute_ids = DB::table('item_attribute_value')
                    ->where('status', '=', 'A')
                    ->where('attribute_id', '=', $attribute_id)
                    ->get();
                return json_encode($attribute_ids);
            } catch (\Exception $e) {
                DB::rollBack();
                return ["o_status_message" => $e->getMessage()];
            }
        }
    }
}
