@extends('plantilla.educacion')
@section('educacion')
<section id="mu-page-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-page-breadcrumb-area">
            <h2>Ficha de Alumnos </h2>
            <ol class="breadcrumb">
             <li><a href="#">SistemasPE</a></li>
             @php
             $contar=DB::table('alumnos')->select('idalumno')->count();
             @endphp            
             <li class="active">Numero de Alumnos <b style="font-size: 20px;">{{$contar}}</b></li>
              
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
                 <div>
                   <img src="/img/veralumno.png" alt="" width="100%">
                 </div><br><br>
  
                <div class="card" style="margin-top: -30px;" >

                  <div class="card-body px-lg-5 pt-0" >
              <form action="" method="post" class="editar" >
                  @csrf
                  <input name="_method" type="hidden" value="PATCH">
                  <div><b style="font-size: 18px;color: #25619D">----Datos de Alumno----</b></div>
                  <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="exampleInputEmail1">Codigo Educando</label>
                  <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="" value="{{$matricula->codeducando}}" disabled>
                </div>
                <div class="form-group col-md-5">
                  <label for="exampleInputEmail1">Apellidos</label>
                  <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="" value="{{$matricula->apellidopaterno}} {{$matricula->apellidomaterno}}" disabled>
                </div>
                <div class="form-group col-md-4" >
                  <label for="exampleInputEmail1">Nombres</label>
                  <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="" value="{{$matricula->primernombres}} {{$matricula->otrosnombres}}" disabled>
                </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Fecha Nacimiento</label>
                    <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="" value="{{$matricula->fechanacimiento}}" disabled>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleInputPassword1">Departamento</label>
                    <input type="text" class="form-control" id="" name="" value="{{$matricula->departamento->nombrede}}" disabled>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">Escala</label>
                    <input type="text" class="form-control" id="" name="direccion" value="{{$matricula->escala}}" disabled>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="exampleInputPassword1">Año Ingreso</label>
                    <input type="text" class="form-control" id="" name="direccion" value="{{$matricula->anioingreso}}" disabled>
                  </div>
                  </div>
                 
                    <div style="text-align: center">
                    <a href="{{URL::to('/ficha')}}" class="btn btn-warning" style="font-size: 18px;"><i class="fas fa-arrow-alt-circle-left"></i></i> Regresar</a>
                  </div>
              </form>
              </div>
              </div>
              

              </div>
               <div class="col-md-3">
                 <aside class="mu-sidebar">
  
                  <div class="mu-single-sidebar"style="background-color:#F3C6AE;border-radius: 5px;">
                    <h3><b>Referencias</b></h3>
                    <ul class="mu-sidebar-catg">
                    
                    
                      <li><a href="{{URL::to('/ficha')}}">Alumnos</a></li>

                      <li><a href="{{URL::to('/curso')}}">Cursos</a></li>

                      <li><a href="{{URL::to('/matricula')}}">Matriculas</a></li>
                    </ul>
                  </div>

                   <div class="mu-single-sidebar"style="background-color:#F3C6AE;border-radius: 5px;" >
                    <h4 style="text-align: center;font-size: 18px;"><b >Listado de Alumnos</b></h4>
                     <ul class="mu-sidebar-catg mu-sidebar-archives" style="text-align: center">
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#fullHeightModalRight">
                        Buscar Alumnos...
                      </button>
                      
                      <div class="modal fade right" id="fullHeightModalRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                      
                        <div class="modal-dialog modal-full-height modal-lg" role="document" >
                      
                      
                          <div class="modal-content" >
                            <div class="modal-header"style="background-color:#3C4A54;text-align:center">
                              <h4 class="modal-title w-100" id="myModalLabel" style="color: white;font-size: 19px;"><b>Listado de Alumnos</b></h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <table id="alumnos"  class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">CODIGO EDUCANDO</th>
                                    <th scope="col">APELLIDOS</th>
                                    <th scope="col">NOMBRES</th>
                                    <th scope="col">AÑO INGRESO</th>
                                    <th scope="col">VER</th>
                                    <th scope="col">ELIMINAR</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @php
                                        $alumnos=DB::table('alumnos')->get();
                                    @endphp
                                     
                                    @foreach ($alumnos as $alumno)   
                                    <tr>
                                    <th>{{$alumno->codeducando}}</th>
                                    <th >{{$alumno->apellidopaterno}} {{$alumno->apellidomaterno}}</th>
                                    <td>{{$alumno->primernombres}} {{$alumno->otrosnombres}}</td>
                                    <td>{{$alumno->anioingreso}}</td>
                                    <td> <a href="{{action('FichaController@edit', $alumno->idalumno)}}" title="Seleccionar Alumno" class="btn btn-primary"><b>👁</b></a></td>
                                    <td>
                                      <form action="{{action('FichaController@destroy', $alumno->idalumno)}}" class="eliminar" title="Eliminar Alumno" method="post">
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
                    <h4 style="text-align: center;font-size: 16px;"><b >Alumnos Recientemente Agregados</b></h4>
                    <div class="mu-sidebar-popular-courses">
                     @php
                     $limite=DB::table('alumnos')->limit('3')->get();
                 @endphp
                 @if($limite->count())
                 @foreach ($limite as $item)
                      <div class="media">
                        <div class="media-body">
                          <a href="{{action('FichaController@edit', $item->idalumno)}}" title="Seleccionar"><li style="font-size: 14px;"> {{$item->apellidopaterno}} {{$item->apellidomaterno}} {{$item->primernombres}}</li></a>                   
                        </div>
                      </div>
                      @endforeach
                      @else
                      <div class="alert alert-warning" role="alert" style="text-align: center">
                       <b style="font-size: 15px;">¡No hay Alumnos Agregados Recientemente!</b> 
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
            
@stop

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script>

<script>
 $(document).ready(function() {
      $('#alumnos').DataTable({
        "language": {
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "No hay ningún alumno registrado",
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