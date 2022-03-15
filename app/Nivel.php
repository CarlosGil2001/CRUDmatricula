<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Nivel extends Model
{
    protected $primaryKey ='idnivel';
    protected $table='Nivels';
    public $timestamps=false;
    protected $fillable=['idnivel','nombreni'];

    public function cursos()
    {
        return $this->hasMany(Curso::class,'idnivel','idnivel');
    }
    public function matriculas()
    {
        return $this->hasMany(Matricula::class,'idnivel','idnivel');
    }
    public function alumno()
    {
        return $this->hasMany(Alumno::class,'idnivel','idnivel');
    }
}