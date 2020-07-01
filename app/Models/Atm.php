<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atm extends Model
{
    public $incrementing = false;

    public $table = "atms";
    protected $primaryKey = 'id_atm';
    protected $fillable = [
        'id_atm','name_atm','ubication'
    ];
}
