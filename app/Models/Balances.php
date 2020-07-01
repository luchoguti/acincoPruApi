<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balances extends Model
{
    public $incrementing = false;

    public $table = "balances";
    protected $primaryKey = 'id_balances';
    protected $fillable = [
        'id_balances','balance','id_accounts'
    ];
    public function foreignKeyAccounts(){
        $this->hasMany(Accounts::class,'id_accounts','id_accounts');
    }
}
