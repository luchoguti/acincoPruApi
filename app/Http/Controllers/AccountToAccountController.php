<?php

namespace App\Http\Controllers;

use App\Models\AccountToAccount;
use Illuminate\Http\Request;

class AccountToAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AccountToAccount::query ()
            ->join ('accounts','accounts.id_accounts','=','account_to_accounts.account_association')
            ->join ('banks','banks.id_banks','=','accounts.banks')
            ->selectRaw ('account_to_accounts.id_account_to_account,account_origin,account_association,accounts.number_account as number_account_association,name_cardholder as name_cardholder_association,id_type_document as id_type_document_association,number_identification as number_identification_association,banks,banks.name_bank,type_account as type_account_association')
            ->paginate (5);
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
            AccountToAccount::create ($request->all ());
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
        return AccountToAccount::query ()
            ->where ('account_origin','=',$id)
            ->join ('accounts','accounts.id_accounts','=','account_to_accounts.account_association')
            ->join ('banks','banks.id_banks','=','accounts.banks')
            ->selectRaw ('account_to_accounts.id_account_to_account,account_origin,account_association,accounts.number_account as number_account_association,name_cardholder as name_cardholder_association,id_type_document as id_type_document_association,number_identification as number_identification_association,banks,banks.name_bank,type_account as type_account_association')
            ->get();
    }

}
