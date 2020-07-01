<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApiCollection;
use App\Models\AccountingSeat;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class AccountingSeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ApiCollection::collection (AccountingSeat::with ('ForeignKeyTransaction')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $uuidAccount = Uuid::generate ()->string;
            $request->request->add (['id_accounting_seat' => $uuidAccount]);
            AccountingSeat::create ($request->all ());
            return response()->json($request->all(), 201);

        }catch (\Exception $e) {
            return response()->json($e->getMessage (), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $accounting = AccountingSeat::query ()->where ('id_accounting_seat','=',$id);
        if($accounting->count ()!=0){
            return ApiCollection::collection ($accounting->with ('ForeignKeyTransaction')->get());
        }else{
            return response()->json([], 201);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            AccountingSeat::all ()->find ($id)->update ($request->all ());
            return response()->json($request->all(), 201);
        }catch (\Exception $e) {
            return response()->json($e->getMessage (), 500);
        }
    }
}
