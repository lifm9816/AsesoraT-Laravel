<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventas_detalle extends Model
{
    use HasFactory;
    protected $primaryKey = 'idvd';
    protected $fillable = ['idvd', 'idv', 'idp', 'cant', 'cost'];
}
