<?php

namespace App\Http\Controllers;

use App\Models\Balances;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function index()
    {
        return Balances::query ()->paginate (5);
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
            $uuidBalance = Uuid::generate ()->string;
            $request->request->add (['id_balances' => $uuidBalance]);
            Balances::create ($request->all ());
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
        $balances = Balances::query ()->where ('id_balances','=',$id);
        if($balances->count ()!=0){
            return $balances->paginate ('5');
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
            Balances::all ()->find ($id)->update ($request->all ());
            return response()->json($request->all(), 201);
        }catch (\Exception $e) {
            return response()->json($e->getMessage (), 500);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function balanceForAccount(string $id)
    {
        $balances= Balances::query ()->where ('id_accounts','=',$id)->get();
        if($balances->count ()!=0){
            return $balances->first ();
        }else{
            return response()->json([], 201);
        }
    }
}
