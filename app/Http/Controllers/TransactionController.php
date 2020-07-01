<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Transaction::query ()->paginate (5);
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
            $uuidTransaction = \Faker\Provider\Uuid::uuid ();
            $request->request->add (['id_transaction' => $uuidTransaction]);
            Transaction::create ($request->all ());
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
        $transaction = Transaction::query ()->where ('id_transaction','=',$id);
        if($transaction->count ()!=0){
            return $transaction->paginate ('5');
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
            Transaction::all ()->find ($id)->update ($request->all ());
            return response()->json($request->all(), 201);
        }catch (\Exception $e) {
            return response()->json($e->getMessage (), 500);
        }
    }

    public function transactionAccountOrigin($idOrigin)
    {
        return Transaction::query ()
            ->where ('accounts_origin','=',$idOrigin)
            ->selectRaw ('transactions.*,type_transactions.*, accounts.number_account as number_account_destination')
            ->join ('type_transactions','type_transactions.id_type_transaction','=','type_transaction')
            ->leftJoin ('accounts','accounts.id_accounts','=','accounts_addressee')
            ->get();
    }
}
