<?php

namespace App\Http\Controllers\ItemSetup;

use App\Http\Controllers\Controller;
use App\Models\ItemSetup\ItemAttributeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ItemAttributeValueController extends Controller
{

    public function index()
    {
        return view('itemsetup.ItemAttributeValue.index');
    }

    public function store(Request $request){
        try {

            if ($request['id']==""){

                $validator = Validator::make($request->all(), [
                    'attribute_id' => 'required',
                    'name' => 'required',
                    'status' => 'required',
                ]);

                if ($validator->fails()) {
                    return response()->json(['statusCode' => 204,'statusMsg' => 'Validation Error.', 'errors' => $validator->errors()]);
                }

                ItemAttributeValue::create([
                    'attribute_id' =>$request->attribute_id,
                    'name' =>$request->name,
                    'status' =>$request->status,
                    'create_by' => auth()->user()->id,
                ]);

                return response()->json([
                    "statusCode" => 200,
                    "statusMsg" => "Data Added Successfully"
                ]);
            }

            else{
                $id = $request['id'];
                $navItem = ItemAttributeValue::findOrFail($id);

                if (!$navItem) {
                    return response()->json([
                        'statusCode' => 404,
                        'statusMsg' => 'Item not found.',
                    ]);
                }

                $validator = Validator::make($request->all(), [
                    'attribute_id' => 'required',
                    'name' => 'required',
                    'status' => 'required',
                ]);

                if ($validator->fails()) {
                    return json_encode(array('statusCode' => 204,'statusMsg' => 'Validation Error.', 'errors' => $validator->errors()));
                }

                $navItem->update([
                    'attribute_id' =>$request->attribute_id,
                    'name' =>$request->name,
                    'status' =>$request->status,
                    'update_by' => auth()->user()->id,
                ]);

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
    public function itemAttributeValueAdd(Request $request){
        try {
            ItemAttributeValue::create([
                'attribute_id' =>$request->attribute_ids,
                'name' =>$request->newAttributeValue,
                'status' =>'A',
                'create_by' => '1',
            ]);

            return response()->json([
                "statusCode" => 200,
                "statusMsg" => "Data Added Successfully"
            ]);

        } catch (\Exception $e) {
            return response()->json([
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ]);
        }
    }

    public function destroy($id){
        try {
            $permission = ItemAttributeValue::findOrFail($id);
            $permission->update([
                'status' => "D",
                'update_by' => auth()->user()->id,
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
            $singleDataShow = ItemAttributeValue::findOrFail($id);
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
        $query = DB::table('item_attribute_value as p')
            ->leftJoin('item_attribute','item_attribute.id','=','p.attribute_id')
            ->select('p.id','p.attribute_id','item_attribute.name as attribute', 'p.name', 'p.status', 'p.create_date')
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
}
