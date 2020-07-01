<?php

namespace App\Http\Controllers;

use App\Models\Atm;
use Illuminate\Http\Request;

class AtmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Atm::query ()->paginate (5);
    }
    public function atmRandom()
    {
        return Atm::query ()->inRandomOrder ()->first ();
    }
}
