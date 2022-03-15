@extends('plantilla.educacion')
@section('educacion')

@section('estilos' )
<link rel="stylesheet" href="/select2/bootstrap-select.min.css"> 
@endsection

<section id="mu-page-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-page-breadcrumb-area">
            <h2>Actualizar Matricula de Alumno <a href="{{URL::to('/matricula')}}" class="btn btn-primary">Ir Matriculas</a>
             
               </h2>
            <ol class="breadcrumb">
             <li><a href="#">SistemasPE</a></li>
             @php
             $contar=DB::table('matriculas')->select('idmatricula')->count();
             @endphp            
             <li class="active">Alumnos Matriculados <b style="font-size: 20px;">{{$contar}}</b></li>
              
           </ol>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="mu-course-content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-course-content-area">
             <div class="row">
               <div class="col-md-9">
                <div class="row">
                   
                  <div class="col-md-12 col-md-12" style="background-color: #A5A5AA;border-radius: 5px;">
                   <br>
                   <div class="card" style="width: 100%;" >

                     <div class="card-body px-lg-5 pt-0" >
                 <form action="{{route('matricula.update',$matricula->idmatricula)}}" method="post" class="editar">
                     @csrf
                     <input name="_method" type="hidden" value="PATCH">

                     <div class="form-row">

                      <div class="col-md-12">
                        <label for="name"><b>DATOS DE ALUMNO</b></label>
                      </div>

                     

                     <div class="col-md-12">

                       <div class="form-group col-md-4">
                         <label for="exampleInputEmail1">Apellido Paterno</label>
                         <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="" value="{{$matricula->alumno->apellidopaterno}}" disabled>
                       </div>

                       <div class="form-group col-md-4">
                         <label for="exampleInputEmail1">Apellido Materno</label>
                         <input type="text" class="form-control" id="" aria-describedby="emailHelp"   name="" value="{{$matricula->alumno->apellidomaterno}}" disabled>
                       </div>

                       <div class="form-group col-md-4">
                         <label for="exampleInputEmail1">Nombres</label>
                         <input type="text" class="form-control" id="" aria-describedby="emailHelp"  name="" value="{{$matricula->alumno->primernombres}}" disabled>
                       </div>

                     

                     <div class="form-row">
                       <div class="form-group col-md-4">
                         <label for="exampleInputEmail1">DNI</label>
                         <input type="text" class="form-control" id="" aria-describedby="emailHelp"  name="" value="{{$matricula->alumno->dni}}" disabled>
                       </div>

                       <div class="form-group col-md-4">
                         <label for="exampleInputEmail1">Sexo</label>
                         <input type="text" class="form-control" id="" name="" value="{{$matricula->alumno->sexo}}" disabled>
                       </div>

                       <div class="form-group col-md-4">
                         <label for="exampleInputEmail1">Fecha Nacimiento</label>
                         <input type="text" class="form-control" id="" name="" value="{{$matricula->alumno->fechanacimiento}}" disabled>
                       </div>


               

                   </div>
                   
                   <div class="form-row">
                     <div class="form-group col-md-4">
                       <label for="exampleInputEmail1">Código Educando</label>
                       <input type="text" class="form-control" id=""  name="codeducando" value="{{$matricula->alumno->codeducando}}" disabled>
                     </div>

                   </div>

                   <div class="form-row">
                       <div class="form-group col-md-4">
                         <label for="exampleInputEmail1">Escala</label>
                         <input type="text" class="form-control" id=""  aria-describedby="emailHelp"  name="escala" value="{{$matricula->alumno->escala}}" disabled>
                       </div>
   
                       <div class="form-group col-md-4">
                         <label for="exampleInputPassword1">Año Ingreso</label>
                         <input type="text" class="form-control" id=""  name="anioingreso" value="{{$matricula->alumno->anioingreso}}" disabled>
                       </div>

 
                     </div>


              </div>

              <div class="form-row">
                <div class="col-md-12"><br>
                  <label for="name"><b>DATOS DE MATRICULA</b></label>
                </div>
            

              <div class="col-md-9">

                <div class="form-group col-md-4">
                  <label for="exampleInputEmail1">Nivel</label>
                  <select class="form-control" name="idnivel" id="" style=" border: 2px solid red;" required>
                    @php
                             $mostrar=DB::table('nivels')->get();
                         @endphp
                @foreach($mostrar as $mos)
                <option value="{{$mos->idnivel}}" 
                  @if($matricula->idnivel==$mos->idnivel)
                       selected="selected"
                   @endif
                  >{{$mos->nombreni}}</option>
               @endforeach
             </select>
                </div>

              

              <div class="form-row">

                <div class="form-group col-md-12">
                  <label for="exampleInputEmail1">Fecha Matricula</label>
                  <input type="date" class="form-control" id="" name="fechamatricula" style=" border: 2px solid red;" value="{{$matricula->fechamatricula}}" required>
                </div>

            </div>


                <div class="form-row">
                     
                  <div class="form-group col-md-5">
                    <label for="exampleInputPassword1">Periodo</label>
                    <select class="form-control" name="idperiodo" id="idperiododo" style=" border: 2px solid red;" required>
                         @php
                                  $mostrar=DB::table('periodos')->get();
                              @endphp
                     @foreach($mostrar as $mos)
                     <option value="{{$mos->idperiodo}}" 
                       @if($matricula->idperiodo==$mos->idperiodo)
                            selected="selected"
                        @endif
                       >{{$mos->periodo}}</option>
                    @endforeach
                  </select>
              
                  </div>
                  <div class="form-row">
                    <div style="text-align: center">
                      <a href="{{URL::to('/matricula')}}"><button type="button" class="btn btn-warning btn-sm" data-dismiss="modal" style="font-size: 18px;"><i class="fas fa-arrow-alt-circle-left"></i> Cancelar</button></a>
                        <button class="btn btn-primary"  style="font-size: 18px;" type="submit">Actualizar</button>
                    </div>
                  </div>


                 
                  </div>


                 
              </div>
              
              </div>


           

                   
                     </div>
                 
                    <br>
                    
                 </form>
                 </div>
                 </div>
                 
                </div> 
                
                </div> 
                
              

              </div>
               <div class="col-md-3">
                 <aside class="mu-sidebar">
  
                  <div class="mu-single-sidebar"style="background-color:#F3C6AE;border-radius: 5px;">
                    <h3><b>Referencias</b></h3>
                  
                   
                      <li><a href="{{URL::to('/nivel')}}">Niveles Educativos</a></li>
                     
                    
                     
                      <li><a href="{{URL::to('/ficha')}}">Alumnos</a></li>
                    
                     
                      <li><a href="{{URL::to('/curso')}}">Cursos</a></li>
                     
                
                      <li><a href="{{URL::to('/matricula')}}">Matriculas</a></li>

                    </ul>
                  </div>

                  <div class="mu-single-sidebar"style="background-color:#F3C6AE;border-radius: 5px;" >
                    <h4 style="text-align: center;font-size: 19px;"><b >Alumnos Matriculados</b></h4>
                     <ul class="mu-sidebar-catg mu-sidebar-archives" style="text-align: center;">
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#fullHeightModalRight" >
                        Buscar Matricula...
                      </button>
                    
                      <div class="modal fade right" id="fullHeightModalRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                      
                        <div class="modal-dialog modal-full-height modal-lg" role="document" >
                      
                          <div class="modal-content" >
                            <div class="modal-header"style="background-color:#3C4A54;text-align: center;">
                              <h4 class="modal-title w-100" id="myModalLabel" style="color: white;font-size: 19px;"><b>Listado de Matriculados</b></h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              
                              <table id="matriculas"  class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">ALUMNO</th>
                                    <th scope="col">NIVEL</th>
                                    <th scope="col">PERIODO</th>
                                    <th scope="col">VER</th>
                                    <th scope="col">EDITAR</th>
                                    <th scope="col">ELIMINAR</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @php
                            $matriculas=DB::table('matriculas')->join('alumnos','matriculas.idalumno','=','alumnos.idalumno')
                            ->join('nivels','matriculas.idnivel','=','nivels.idnivel')
                            ->join('periodos as pe','pe.idperiodo','matriculas.idperiodo')->paginate(4);
                        @endphp
                       
                        @foreach ($matriculas as $item)   
                                    <tr>
                                    <th >{{$item->apellidopaterno}} {{$item->apellidomaterno}} {{$item->primernombres}}</th>
                                    <td>{{$item->nombreni}}</td>
                                    <td>{{$item->periodo}}</td>
                                    <td> <a href="{{action('MatriculaController@show', $item->idmatricula)}}" title="Seleccionar" class="btn btn-info"><b>👁</b></a></td>
                                    <td> <a href="{{action('MatriculaController@edit', $item->idmatricula)}}" title="Editar" class="btn btn-primary"><b><i class="fas fa-edit"></i></b></a></td>
                                    <td>
                                     
                                      <form href="{{action('MatriculaController@destroy', $item->idmatricula)}}" class="eliminar" title="Eliminar" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE"> 
                                        <button type="submit" class="btn btn-danger" style="width: 50px;"><b>X</b></button>
                                      </form></td>
                                  </tr>
                                  @endforeach   
                                </tbody>
                    
                              </table>
                              
                              
                            </div>
                            <div class="modal-footer justify-content-center">
                              <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                            </div>
                          </div>
                        </div>
                      </div>
                     </ul>
                   </div>
  
                <div class="mu-single-sidebar" style="background-color:#F3C6AE;border-radius: 5px;">
                    <h4 style="text-align: center;font-size: 16px;"><b >Alumnos Matriculados Recientemente</b></h4>
                    <div class="mu-sidebar-popular-courses">
                     @php
                     $limite=DB::table('matriculas as m')->join('alumnos as a','m.idalumno','=','a.idalumno')->
                     join('nivels','m.idnivel','=','nivels.idnivel')
                     ->join('periodos as pe','pe.idperiodo','=','m.idperiodo')->limit('3')->get();
                 @endphp
                 @if($limite->count())
                 @foreach ($limite as $item)
                      <div class="media">
                        <div class="media-body">
                          <a   href="{{action('MatriculaController@edit', $item->idmatricula)}}" title="Seleccionar" ><li style="font-size: 14px;"><b>{{$item->nombreni}}</b>-- <b>{{$item->periodo}}</b></li></a>                     
                        </div>
                      </div>
                      @endforeach
                      @else
                      <div class="alert alert-warning" role="alert" style="text-align: center">
                       <b style="font-size: 15px;">¡No hay Alumnos Matriculados Recientemente!</b> 
                     </div>
                    @endif 
                    </div>
                  </div>
  
                 </aside>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="/select2/bootstrap-select.min.js"></script>         
@stop

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script>

<script>

$('.editar').submit(function(e){
    e.preventDefault();

    Swal.fire({
  title: '¿Actualizar Matricula de Alumno?',
  text: "¡La Matricula del Alumno se actualizará!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: '¡Si, Actualizar!',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {

    this.submit();
  }
})
   });

 $(document).ready(function() {
      $('#matriculas').DataTable({
        "language": {
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "No hay ningún matricula registrada",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                 "sPrevious": "Anterior"
            }
        }
    });
} );


  




</script>
@stop