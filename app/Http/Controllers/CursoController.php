<?php

namespace App\Http\Controllers;
use App\curso;
use App\nivel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
           
        $buscarpor=$request->get('buscarpor');
        $cursos = DB::table('cursos')->join('nivels','cursos.idnivel','=','nivels.idnivel')->where('nombrecu','like','%'.$buscarpor.'%')->orderby('idcurso','desc')->paginate(4);
        return view('cursos.mantecursos',compact('cursos','buscarpor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
       return view('cursos.mantecursos');
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
            'codcurso'=>'required|unique:cursos,codcurso',
        ],[
            'codcurso.unique'=>'El codigo de curso ya existe',
        ]);

       //$curso = request()->except('_token');
       //$guardar=curso::insert($curso);
       $curso=new curso();
       $curso->codcurso=$request->codcurso;
       $curso->nombrecu=$request->nombrecu;
       $curso->idnivel=$request->idnivel;

       if($curso->save()){
        return redirect()->route('curso.index')->with('status_success','Curso Agregado Correctamente');;
       }
      
       //return redirect()->route('curso.index')->with('datos2','ya existe');
      
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
        
        $curso=curso::find($id);
        $nivel=nivel::all();;
        return view('cursos.editarcurso',compact('curso'));
        
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
        
        curso::find($id)->update($request->all());
        return redirect()->route('curso.index')->with('editar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        curso::find($id)->delete();
        return redirect()->route('curso.index')->with('borrar','ok');
    }
}
