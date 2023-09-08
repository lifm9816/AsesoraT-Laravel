<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tipo_asesoria extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primarykey = "id_asesoria";
    protected $fillable = ["id_asesoria", "tipo_asesoria"];
}
