<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    use HasFactory;

    protected $primaryKey = 'idp';
    protected $fillable = ['idp', 'nombre', 'idc', 'idp', 'cantidad', 'costo', "Activo"];
}
