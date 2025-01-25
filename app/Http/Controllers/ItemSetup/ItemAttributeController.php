<?php

namespace App\Http\Controllers\ItemSetup;

use App\Http\Controllers\Controller;
use App\Models\ItemSetup\ItemAttribute;
use App\Models\ItemSetup\MjrCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ItemAttributeController extends Controller
{

    public function index()
    {
        return view('itemsetup.ItemAttribute.index');
    }

    public function store(Request $request){
        try {

            if ($request['id']==""){

                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'status' => 'required',
                ]);

                if ($validator->fails()) {
                    return response()->json(['statusCode' => 204,'statusMsg' => 'Validation Error.', 'errors' => $validator->errors()]);
                }

                ItemAttribute::create([
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
                $navItem = ItemAttribute::findOrFail($id);

                if (!$navItem) {
                    return response()->json([
                        'statusCode' => 404,
                        'statusMsg' => 'Item not found.',
                    ]);
                }

                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'status' => 'required',
                ]);

                if ($validator->fails()) {
                    return json_encode(array('statusCode' => 204,'statusMsg' => 'Validation Error.', 'errors' => $validator->errors()));
                }

                $navItem->update([
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

    public function destroy($id){
        try {
            $permission = ItemAttribute::findOrFail($id);
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
            $singleDataShow = ItemAttribute::findOrFail($id);
            return $singleDataShow;
        } catch (\Exception $e) {

            return response()->json([
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ]);
        }
    }

    public function getAttribute()
    {
        try {
            $singleDataShow = ItemAttribute::where('status','=','A')->get();
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
        $query = DB::table('item_attribute as p')
            ->select('p.id','p.name', 'p.status', 'p.create_date')
            ->where('p.status', '!=', 'D');
        $totalCount = $query->count();
        if (!empty($request->name)) {
            $query->where('p.name', 'like', '%' . $request->name . '%');
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
