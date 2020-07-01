<?php

namespace App\Http\Controllers;

use App\Models\TypeAccount;
use Illuminate\Http\Request;

class TypeAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TypeAccount::query ()->paginate (5);
    }
}
