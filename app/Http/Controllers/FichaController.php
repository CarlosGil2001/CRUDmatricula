<?php

namespace App\Http\Controllers;
use App\departamento;
use App\alumno;
use App\nivel;

use Illuminate\Http\Request;

class FichaController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $buscarpor=$request->get('buscarpor');
        $alumnos=alumno::where('apellidopaterno','like','%'.$buscarpor.'%')->where('apellidomaterno','like','%'.$buscarpor.'%')
        ->where('primernombres','like','%'.$buscarpor.'%')->where('otrosnombres','like','%'.$buscarpor.'%')->get();

       return view('fichas.mantefichas',['alumnos'=>$alumnos,'buscarpor'=>$buscarpor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('fichas.mantefichas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

        $request->validate([
            'codeducando'=>'required|unique:alumnos,codeducando',
            'dni'=>'required|unique:alumnos,dni',
        ],[
            'codeducando.unique'=>'El codigo de alumno ya existe',
            'dni.unique'=>'El Número de DNI ya existe',
        ]);

        
        $ficha=new alumno();
        $ficha->codeducando=$request->codeducando;
        $ficha->dni=$request->dni;
        $ficha->apellidopaterno=$request->apellidopaterno;
        $ficha->apellidomaterno=$request->apellidomaterno;
        $ficha->primernombres=$request->primernombres;
        $ficha->otrosnombres=$request->otrosnombres;
        $ficha->sexo=$request->sexo;
        $ficha->fechanacimiento=$request->fechanacimiento;
        $ficha->iddepartamento=$request->iddepartamento;
        $ficha->escala=$request->escala;
        $ficha->anioingreso=$request->anioingreso;

 
        if($ficha->save()){
            return redirect()->route('ficha.index')->with('status_success','Alumno Agregado Correctamente');
      
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {          
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        $matricula=alumno::findOrFail($id);
        $nivel=nivel::all();
        return view('fichas.veralumno',compact('matricula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        alumno::find($id)->delete();
        return redirect()->route('ficha.index')->with('borrar','ok');
    }
}
