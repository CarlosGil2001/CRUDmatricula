<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Nivel;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscarpor=$request->get('buscarpor');
        $niveles=DB::table('nivels')->where('nombreni','like','%'.$buscarpor.'%')->orderby('idnivel','desc')->paginate(6);
        return view('niveles.indexnivel',compact('niveles','buscarpor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('niveles.indexnivel');
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
            'nombreni'     => 'required|max:50|unique:nivels,nombreni',     
        ],[
            'nombreni.unique'=>'El Nivel ingresado ya existe',     
        ]);

        $nivel = nivel::create($request->all());
        return redirect()->route('nivel.index')->with('status_success','Nivel Programado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editarni=nivel::find($id);
        return view('niveles.editnivel',compact('editarni'));
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
        nivel::find($id)->update($request->all());
        return redirect()->route('nivel.index')->with('editar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        nivel::find($id)->delete();
        return redirect()->route('nivel.index')->with('borrar','ok');
    }
}
