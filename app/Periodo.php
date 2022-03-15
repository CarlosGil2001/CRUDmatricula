<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $primaryKey ='idperiodo';
    protected $table='Periodos';
    public $timestamps=false;
    protected $fillable=['idperiodo','periodo'];


    public function matriculas()
    {
        return $this->hasMany(Matricula::class,'idperiodo','idperiodo');
    }

}
