<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Abogados extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primarykey = "id";
    protected $fillable = ["id", "id_especialidad", "cedula_profesiona", "nombre", "aPaterno", "aMaterno", "telefono", "correo", "Identificación", "contraseña"];
}
