<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'asistencia';

    protected $fillable = [
        'pin',
        'fecha',
        'hora',
    ];
    public function asistencia(){
        return $this->belongsTo(Asistencia::class);
    }
    public function grupo(){
        return $this->belongsTo(Grupo::class);
    }
}
