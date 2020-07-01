<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeAccount extends Model
{
    public $table = "type_accounts";
    protected $primaryKey = 'id_type_account';
    protected $fillable = [
        'id_type_account','description_type_account'
    ];
    public function accountFk(){
        $this->hasMany ('App\Models\Accounts','id_type_account','type_account');
    }
}
