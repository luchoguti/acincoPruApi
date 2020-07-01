<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeDocument extends Model
{
    public $table = "type_documents";
    protected $primaryKey = 'id_type_document';
    protected $fillable = [
        'id_type_document','description_type_document'
    ];
}
