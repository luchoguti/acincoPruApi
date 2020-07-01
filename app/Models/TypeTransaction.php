<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeTransaction extends Model
{
    public $table = "type_transactions";
    protected $primaryKey = 'id_type_transaction';
    protected $fillable = [
        'id_type_transaction','description_type_transaction'
    ];
}
