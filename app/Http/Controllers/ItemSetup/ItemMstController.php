<?php

namespace App\Http\Controllers\ItemSetup;

use App\Http\Controllers\Controller;
use App\Models\ItemSetup\ItemMst;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ItemMstController extends Controller
{


    public function index()
    {
        return view('itemsetup.ItemMst.index');
        return view('itemsetup.ItemMst.index');
    }

    public function store(Request $request){
        try {

            if ($request['id']==""){

                $validator = Validator::make($request->all(), [
                    'mjr_code' => 'required',
                    'mjr_desc' => 'required',
                    'status' => 'required',
                ]);

                if ($validator->fails()) {
                    return response()->json(['statusCode' => 204,'statusMsg' => 'Validation Error.', 'errors' => $validator->errors()]);
                }

                ItemMst::create([
                    'mjr_code' =>$request->mjr_code,
                    'mjr_desc' =>$request->mjr_desc,
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
                $navItem = ItemMst::findOrFail($id);

                if (!$navItem) {
                    return response()->json([
                        'statusCode' => 404,
                        'statusMsg' => 'Item not found.',
                    ]);
                }

                $validator = Validator::make($request->all(), [
                    'mjr_code' => 'required',
                    'mjr_desc' => 'required',
                    'status' => 'required',
                ]);

                if ($validator->fails()) {
                    return json_encode(array('statusCode' => 204,'statusMsg' => 'Validation Error.', 'errors' => $validator->errors()));
                }

                $navItem->update([
                    'mjr_code' =>$request->mjr_code,
                    'mjr_desc' =>$request->mjr_desc,
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

    public function destroy($id){
        try {
            $permission = ItemMst::findOrFail($id);
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
            $singleDataShow = ItemMst::findOrFail($id);
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
        $query = DB::table('st_item_mst as p')
            ->select('p.id','p.item_code', 'p.item_short_desc',
                'p.item_desc', 'p.item_part_no', 'p.origin',
                'p.auxiliary_item', 'p.status', 'p.create_date')
            ->where('p.status', '!=', 'D');
        $totalCount = $query->count();
        if (!empty($request->name)) {
            $query->where('p.mjr_code', 'like', '%' . $request->name . '%');
        }
        if (!empty($request->email)) {
            $query->where('p.mjr_desc', 'like', '%' . $request->email . '%');
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
