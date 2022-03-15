@extends('plantilla.educacion')
@section('educacion')

@section('estilos' )
<link rel="stylesheet" href="/select2/bootstrap-select.min.css"> 
@endsection
<html>
  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Tooplate">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <section id="mu-page-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-page-breadcrumb-area">
            <h2>Matricula de Alumnos 
            </h2>
            <ol class="breadcrumb">
             <li><a href="#">SistemasPE</a></li>
             @php
             $contar=DB::table('matriculas')->select('idmatricula')->count();
             @endphp            
             <li class="active">Total Alumnos Matriculados <b style="font-size: 20px;">{{$contar}}</b></li>
              
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
  
                 <div class="mu-course-container bg-light">
                   <div class="row">
                     <div class="col-md-12 col-md-12">
                      @include('custom.mensaje')
                     
                      <form  style="color: #757575;" method="post" action="{{route('matricula.store')}}" class="registrar">
                        @csrf
                        <div class="form-row">
                          <div class="col-md-6">
                            <label for=""><b>Periodo:</b></label>
                            <select class="form-control select2 select2-hidden accessible selectpicker"  data-select2-id="1" tabindex="-1" aria hidden="true" data-live-search="true" name="idperiodo" id=""  required>
                              <option value="" selected><--Seleccione Periodo--></option> 
                                   @php
                                       $periodos=DB::table('periodos')->orderby('idperiodo','desc')->get();
                                   @endphp
                               @foreach ($periodos as $mostrar)
                                 <option value="{{$mostrar->idperiodo}}">{{$mostrar->periodo}}</option>
                              @endforeach
                          </select>
                          </div>

                          <div class="col-md-6">
                            <label for=""><b>Codigo Educando de Alumno:</b></label>
                            <select class="form-control select2 select2-hidden accessible selectpicker"  data-select2-id="1" tabindex="-1" aria hidden="true" data-live-search="true" name="idalumno" id=""  required>
                              <option value="" selected><--Seleccione Alumno--></option> 
                                   @php
                                       $alumnos=DB::table('alumnos')->orderby('idalumno','desc')->get();
                                   @endphp
                               @foreach ($alumnos as $mostrar)
                                 <option value="{{$mostrar->idalumno}}">{{$mostrar->codeducando}} - {{$mostrar->primernombres}} {{$mostrar->apellidopaterno}}</option>
                              @endforeach
                          </select>
                          </div>

                         
                        </div>


                            <div class="form-row">
                          
                                 
                                <div class="col-md-6">
                                    <label for="date"><b>Fecha Matricula :</b></label>
                                    <input type="date" name="fechamatricula" class="form-control" required>
                               </div>
    
                             
                          </div>

                            <div class="form-row">
                              <div class="col-md-6">
                                
                                  <label for="select">Nivel</label>
                                  <select class="form-control select2 select2-hidden accessible selectpicker"  data-select2-id="1" tabindex="-1" aria hidden="true" data-live-search="true" name="idnivel" id=""  required>
                                    <option value="" selected><--Seleccione Nivel--></option> 
                                         @php
                                             $nivels=DB::table('nivels')->orderby('idnivel','desc')->get();
                                         @endphp
                                     @foreach ($nivels as $mostrar)
                                       <option value="{{$mostrar->idnivel}}">{{$mostrar->nombreni}}</option>
                                    @endforeach
                                </select>
                             
                              </div>

                            </div>

                      
                        
                         <div class="row">
                           <div class="col-md-12" style="margin-top: 20px;">
                            <button class="btn btn-outline-dark btn-rounded btn-block my-4 waves-effect z-depth-0 btn-primary" style="font-size: 16px;" type="submit"><b >Matricular</b></button>
                           </div>
                           
                         </div>
                            <hr style="background-color: green;height: 5px;">
                        </form>
                        

                    </div>

                    <div class="col-md-12 col-md-12">
                      <div class="row" >
                        <div class="col-md-12">
                          <div class="mu-related-item">
                        <h3><b>¡Alumnos Matriculados!</b></h3>
                        <div class="mu-related-item-area">
                          <div id="">
                            @php
                            $matriculas=DB::table('matriculas')->join('alumnos','matriculas.idalumno','=','alumnos.idalumno')
                            ->join('nivels','matriculas.idnivel','=','nivels.idnivel')->join('periodos as pe','pe.idperiodo','=','matriculas.idperiodo')->paginate(4);
                        @endphp
                        @if($matriculas->count())
                        @foreach ($matriculas as $item)   
                            <div class="col-md-6">
                              <div class="mu-latest-course-single" style="background-color: #E3F0FB">
                                <figure class="mu-latest-course-img">
                                  <a  href="" title="Seleccionar" ><img alt="img" src="/img/matri.png" height="250px" width=""></a>
                                  <figcaption class="mu-latest-course-imgcaption">
                                    <a  href="" title="Seleccionar" >{{$item->primernombres}} {{$item->apellidopaterno}} {{$item->apellidomaterno}}<b style="font-size: 17px;"></b></a>
                                    <span><a href=""><form action="{{action('MatriculaController@destroy', $item->idmatricula)}}" method="post" class="eliminar">
                                  @csrf
                                  <input name="_method" type="hidden" value="DELETE"> 
                                  <button type="submit" class="btn btn-danger">Anular</button>
                                </form></a></span>
                                  </figcaption>
                                </figure>
                                <div class="mu-latest-course-single-content">
                                  <h5><b>Nivel: </b>{{$item->nombreni}}</h5>
                                  <h5> <b>Periodo: </b>{{$item->periodo}}</h5>
                                  <p></p>
                                </div>
                              </div>
                            
                            </div>
                            @endforeach
                               @else
                               <div class="alert alert-info" role="alert" style="text-align: center">
                                <b style="font-size: 18px;">¡No hay Alumnos Matriculados!</b>
                              </div>
                             @endif  

                          </div>

                        </div>
                        
                      </div>
                      {{$matriculas->links()}}
                        </div>
                      </div>
                    </div>
                      
                      </div>
                      </div>
  
              </div>
               <div class="col-md-3">
                 <aside class="mu-sidebar">
  
                  <div class="mu-single-sidebar"style="background-color:#F3C6AE;border-radius: 5px;">
                    <h3><b>Referencias</b></h3>
                    <ul class="mu-sidebar-catg">


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
                        <th >{{$item->primernombres}} {{$item->apellidopaterno}}</th>
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
                     join('nivels','m.idnivel','=','nivels.idnivel')->
                     join('periodos as pe','pe.idperiodo','=','m.idperiodo')->limit('3')->get();
                 @endphp
                 @if($limite->count())
                 @foreach ($limite as $item)
                      <div class="media">
                        <div class="media-body">
                          <a href="{{action('MatriculaController@edit', $item->idmatricula)}}" title="Seleccionar" ><li style="font-size: 14px;"><b>{{$item->nombreni}}</b>- {{$item->primernombres}} {{$item->apellidopaterno}}- <b>{{$item->periodo}}</b></li></a>                     
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


</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="/select2/bootstrap-select.min.js"></script>  
@stop

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script>

@if(session('borrar') =='ok')
<script>
Swal.fire(
  '¡Matricula Anulada!',
   'La Matricula se anuló correctamente.',
   'success'
   )
 </script>
@endif


@if(session('editar') =='ok')
<script>
Swal.fire(
  '¡Matricula Actualizada!',
   'La Matricula se actualizó correctamente.',
   'success'
   )
 </script>
@endif


@if(session()->has('matricula'))
  <script>
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: '¡Se registró correctamente!',
    showConfirmButton: false,
    timer: 2000 
   })
  </script>
  @endif

  <script>



$(document).ready(function() {
      $('#matriculas').DataTable({
        "language": {
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "No hay ninguna matricula registrada",
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

 $('.eliminar').submit(function(e){
    e.preventDefault();

    Swal.fire({
  title: '¿Estás Seguro?',
  text: "¡La Matricula se anulará difinitivamente!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: '¡Si, Eliminar!',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {

    this.submit();
  }
})
   });

  
  </script>
@stop