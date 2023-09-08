<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class citas extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primarykey = "id_cita";
    protected $fillable = ["id_cita", "id_asesoria", "id_tramite", "id_cliente", "id_abogado", "fecha", "hora"];

}
