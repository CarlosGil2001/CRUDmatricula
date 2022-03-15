<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Curso extends Model
{
    protected $primaryKey='idcurso';
    protected $table='Cursos';
    protected $fillable=['idcurso','nombrecu','codcurso','idnivel'];
    public $timestamps=false;

    public function nivel()
    {
        return $this->hasOne('App\Nivel','idnivel','idnivel');
    }

}
