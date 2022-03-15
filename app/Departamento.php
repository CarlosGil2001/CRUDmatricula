<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Departamento extends Model
{
    protected $primaryKey='iddepartamento';
    protected $table='Departamentos';
    public $timestamps=false;
    protected $fillable=['Departamentos'];


    public function alumnos()
    {
        return $this->hasMany(Alumno::class,'iddepartamento','iddepartamento');
    }
}
