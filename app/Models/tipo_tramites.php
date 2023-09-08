<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tipo_tramites extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primarykey = "id_tramite";
    protected $fillable = ["id_tramite", "tipo_tramite"];
}
