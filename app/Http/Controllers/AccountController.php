<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApiCollection;
use App\Models\Accounts;
use App\Models\AccountToAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Accounts::query ()->paginate (5);
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
            $uuidAccount = \Faker\Provider\Uuid::uuid ();
            $request->request->add (['id_accounts' => $uuidAccount]);
            $request->request->remove ('password_account');
            $password_account = bcrypt ($request->password_account);
            $request->request->add (['password_account' => $password_account]);
            Accounts::create ($request->all ());
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
        $accounting = Accounts::query ()->where ('id_accounts','=',$id);
        if($accounting->count ()!=0){
            return $accounting->paginate ('5');
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
            Accounts::all ()->find ($id)->update ($request->all ());
            return response()->json($request->all(), 201);
        }catch (\Exception $e) {
            return response()->json($e->getMessage (), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Accounts::query ()->find ($id)->delete();
            return response()->json('successfully deleted!', 201);
        }catch (\Exception $e) {
            return response()->json($e->getMessage (), 500);
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function accountRandom()
    {
        return Accounts::query ()
            ->join ('banks','banks.id_banks','=','accounts.banks')
            ->inRandomOrder ()->first ();
    }

    /*
     * @param Request $request
     */
    public function verificationPasswordAccount(Request $request)
    {
        $dataRequest = $request->all ();
        $accountData=Accounts::query ()->where ('id_accounts','=',$dataRequest["id_account"])->get ()->toArray ();
        if (Hash::check($dataRequest["password_account"], $accountData[0]['password_account'])) {
            return response()->json(true, 201);
        }else{
            return response()->json(false, 201);
        }
    }
}
