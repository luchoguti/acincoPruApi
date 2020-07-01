<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $incrementing = false;

    public $table = "transactions";
    protected $primaryKey = 'id_transaction';
    protected $fillable = [
        'id_transaction','value_transaction','accounts_origin','accounts_addressee','id_atm','type_transaction'
    ];
}
