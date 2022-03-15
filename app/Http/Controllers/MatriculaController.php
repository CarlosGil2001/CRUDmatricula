<?php

namespace App\Http\Controllers;
use App\matricula;
use App\alumno;
use App\nivel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class MatriculaController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('matricula.create');//,compact('matriculados'));
    }

    public function create()
    {
      return view('matricula.create');
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
            'idalumno' => 'unique:matriculas,idalumno,NULL,idmatricula,idperiodo,'.request('idperiodo'),
        ],[
           // 'idalumno.unique'=>'El Alumno ya está matriculado',
        ]);

        $matricula=new matricula();
        $matricula->idalumno=$request->idalumno;
        $matricula->idperiodo=$request->idperiodo;
        $matricula->idnivel=$request->idnivel;
        $matricula->fechamatricula=$request->fechamatricula;
        $matricula->save();
        return redirect()->route('matricula.create')->with('status_success','Matricula Registrada Correctamente');
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
       
       $matricula=matricula::find($id);
       return view('matricula.edit',compact('matricula'));
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
        

        $matricula=matricula::findOrFail($id);
        $matricula->fechamatricula=$request->fechamatricula;
        $matricula->idnivel=$request->idnivel;
        $matricula->idperiodo=$request->idperiodo;
        $matricula->save();
        return redirect()->route('matricula.index')->with('editar','ok');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        matricula::find($id)->delete();
        return redirect()->route('matricula.index')->with('borrar','ok');
    }


}


