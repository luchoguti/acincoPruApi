<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banks extends Model
{
    public $table = "banks";
    public $incrementing = false;

    protected $primaryKey = 'id_banks';
    protected $fillable = [
        'id_banks','name_bank','nit'
    ];
}
