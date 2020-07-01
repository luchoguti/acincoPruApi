<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountingSeat extends Model
{
    public $incrementing = false;

    public $table = "accounting_seats";
    protected $primaryKey = 'id_accounting_seat';
    protected $fillable = [
        'id_accounting_seat','debit','credit','id_transaction'
    ];

    public function ForeignKeyTransaction(){
        return $this->hasMany ('App\Models\Transaction','id_transaction','id_transaction');
    }
}
