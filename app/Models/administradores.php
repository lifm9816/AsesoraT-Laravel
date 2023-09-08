<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class administradores extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primarykey = "id";
    protected $fillable = ["id", "nombre", "aPaterno", "aMaterno", "teléfono", "correo", "Identificación", "contraseña"];
}
