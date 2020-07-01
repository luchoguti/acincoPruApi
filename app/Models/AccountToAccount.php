<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountToAccount extends Model
{
    public $table = "account_to_accounts";
    protected $primaryKey = 'id_account_to_account';
    protected $fillable = [
        'id_account_to_account','account_origin','account_association'
    ];
}
