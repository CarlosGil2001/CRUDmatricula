<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Matricula extends Model
{
    protected $primaryKey='idmatricula';
    protected $table='Matriculas';
    public $timestamps=false;
    protected $fillable=['idmatricula','idalumno','idnivel','idperiodo','fechamatricula','escala','anio'];

    public function alumno()
    {
        return $this->hasOne('App\Alumno','idalumno','idalumno');
    }
    public function nivel()
    {
        return $this->hasOne('App\Nivel','idnivel','idnivel');
    }

    public function periodo()
    {
        return $this->hasOne('App\Periodo','idperiodo','idperiodo');
    }

}

