<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Papeletas extends Model
{
    use HasFactory;
    protected $fillable = ['num_papeleta','dni','dependencia','motivo','lugar',
                        'hora_salida','hora_llegada','observacion', 'fecha_ini','fecha_fin','usuario_id'];
    protected $table = 'papeletas';
}
