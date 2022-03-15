<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $primaryKey = 'idalumno';
    protected $fillable=['Alumnos'];
    public $timestamps=false;


    public function matriculas()
    {
        return $this->hasMany(matricula::class,'idalumno','idalumno');
    }
    public function departamento()
    {
        return $this->hasOne('App\Departamento','iddepartamento','iddepartamento');
    }
    public function nivel()
    {
        return $this->hasOne('App\Nivel','idnivel','idnivel');
    }
}
