<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accounts extends Model
{
    use SoftDeletes;
    public $incrementing = false;

    public $table = "accounts";
    protected $primaryKey = 'id_accounts';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'id_accounts','number_account','name_cardholder','id_type_document','number_identification','banks','type_account','password_account','state'
    ];

    protected $hidden = [
        'created_at', 'updated_at','deleted_at'
    ];
    public function ForeignKeyTypeDocument(){
        $this->hasMany ('App\Models\TypeDocument','id_type_document','id_type_document');
    }
    public function banksFk(){
        $this->hasMany ('App\Models\Banks','banks','id_banks');
    }
    public function typeAccountFk(){
        $this->hasMany ('App\Models\TypeAccount','type_account','id_type_account');
    }
    public function foreignKeyAccounts(){
        $this->belongsTo(Balances::class,'id_accounts','id_accounts');
    }
}
