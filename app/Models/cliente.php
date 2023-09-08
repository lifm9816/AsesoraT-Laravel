<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cliente extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "clientes";
    protected $primarykey = "id";
    protected $fillable = ["id", "nombre", "aPaterno", "aMaterno", "telefono", "correo", "Identificación", "contraseña"];

}
