@extends('plantilla.educacion')
@section('educacion')

<section id="mu-page-breadcrumb">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mu-page-breadcrumb-area">
          <h2>Detalles Curso</h2>
          <ol class="breadcrumb">
           <li><a href="#">SistemasPE</a></li>
           @php
           $contar=DB::table('cursos')->select('idcurso')->count();
           @endphp            
           <li class="active">Cursos en Total <b style="font-size: 20px;">{{$contar}}</b></li>
            
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
             <div class="col-md-4">

               <div class="mu-course-container">
                 <div class="row">
                  
                    <div class="card-body px-lg-5 pt-0">
                <form action="{{route('curso.update',$curso->idcurso)}}" method="post" class="editar">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">
                  <div class="form-row">
                      <div class="form-group col-4 ">
                          <label for="exampleInputEmail1" style="font-size: 18px;">Codigo Curso</label>
                          <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="codcurso" minlength="4" maxlength="4" pattern="[A-Za-z0-9]+" title="Solo se permiten Letras y Números" value="{{$curso->codcurso}}">
                        </div><hr>
                   
                    <div class="form-group col-8">
                      <label for="exampleInputEmail1"style="font-size: 18px;">Curso</label>
                      <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="nombrecu" value="{{$curso->nombrecu}}">
                    </div>
                </div><hr>
                
                    <div class="form-group">
                      <label for="exampleInputPassword1"style="font-size: 18px;">Nivel Educativo</label>
                      <select class="form-control" name="idnivel" id="nivel" required>
                        <option ><--Actualizar Nivel--></option>
                           @php
                              $mostrar=DB::table('nivels')->get();
                          @endphp
                       @foreach($mostrar as $mos)
                       <option value="{{$mos->idnivel}}" 
                         @if($curso->idnivel==$mos->idnivel)
                              selected="selected"
                          @endif
                         >{{$mos->nombreni}}</option>
                      @endforeach
                    </select>
                    </div><hr>
                
                    <br>
                <div style="margin-left: 100px;">       
                <a href="{{URL::to('/curso')}}"><button type="button" class="btn btn-warning btn-sm" data-dismiss="modal" style="font-size: 18px;"><i class="fas fa-arrow-alt-circle-left"></i> Cancelar</button></a>
               
                <button type="submit" class="btn btn-primary btn-sm" style="font-size: 18px;">Actualizar</button>
                
                </div>
                </form>
                </div>
                <br>
                <hr style="background-color: green;border: solid 2px;color: green">
                 </div>
               </div>

               <div class="row" style="width: 700px;">
                <div class="col-md-12">
                  <div class="mu-related-item">
                <h3><b>¡Nuestros Cursos!</b></h3>
                <div class="mu-related-item-area">
                  <div id="mu-related-item-slide">
                    @php
                    $cursos = DB::table('cursos')->join('nivels','cursos.idnivel','=','nivels.idnivel')
                ->get();
                @endphp
                @if($cursos->count())
                @foreach ($cursos as $item)
                    <div class="col-md-12">
                      <div class="mu-latest-course-single">
                        <figure class="mu-latest-course-img" >
                          <a href="{{action('CursoController@edit', $item->idcurso)}}"title="Seleccionar Curso"><img alt="img" src="/edu/assets/img/1.jpg" height="180px;"></a>
                          <figcaption class="mu-latest-course-imgcaption">
                            <a href="{{action('CursoController@edit', $item->idcurso)}}" title="Seleccionar"><b>{{$item->nombrecu}}</b></a>
                            <span><b>{{$item->codcurso}}</b></span>
                          </figcaption>
                        </figure>
                        <div class="mu-latest-course-single-content">
                          <h5>{{$item->nombreni}}</h5>
                          <p></p>
                        </div>
                      </div>
                    
                    </div>
                    @endforeach
                        @else
                       <div class="alert alert-info" role="alert" style="text-align: center">
                        <b style="font-size: 18px;">¡No hay Cursos Registrados!</b>
                      </div>
                     @endif  
                  </div>
                </div>
              </div>
                </div>
              </div>
             </div>
             <div class="col-md-5" style="margin-top: 50px;" >
              <img src="/edu/assets/img/editarcurso.jpg" width="100%" style="border-radius: 40px;" alt="img">
              <hr style="background-color: green;border: solid 2px;color: green;margin-top: 167px;">
              
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
                  <h4 style="text-align: center;font-size: 19px;"><b >Listado de Cursos</b></h4>
                   <ul class="mu-sidebar-catg mu-sidebar-archives" style="text-align: center">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#fullHeightModalRight" >
                      Buscar Curso...
                    </button>
                  
                    <div class="modal fade right" id="fullHeightModalRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    
                      <div class="modal-dialog modal-full-height modal-lg" role="document" >
                    
                    
                        <div class="modal-content" >
                          <div class="modal-header"style="background-color:#3C4A54;">
                            <h4 class="modal-title w-100" id="myModalLabel" style="color: white;font-size: 19px;"><b>Listado de Cursos</b></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            
                            <table id="cursos"  class="table table-striped table-bordered table-responsive" >
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">CODIGO</th>
                                  <th scope="col">CURSO</th>
                                  <th scope="col">NIVEL</th>
                                  <th scope="col">VER</th>
                                  <th scope="col">ELIMINAR</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php
                                      $cursos = DB::table('cursos')->join('nivels','cursos.idnivel','=','nivels.idnivel')
                                     ->orderby('idcurso','desc')->get();
                                    @endphp
                                    
                                    @foreach ($cursos as $curso)
                                  <tr>
                                  <th >{{$curso->codcurso}}</th>
                                  <td>{{$curso->nombrecu}}</td>
                                  <td>{{$curso->nombreni}}</td>
                                  <td>
                                    <a href="{{action('CursoController@edit', $curso->idcurso)}}" title="Seleccionar Curso" class="btn btn-primary"><b>👁</b></a>
                                  </td>
                                  
                                  <td>
                                  
                                    <form action="{{action('CursoController@destroy', $curso->idcurso)}}" class="eliminar" title="Eliminar Curso" method="post">
                                      @csrf
                                      <input name="_method" type="hidden" value="DELETE"> 
                                      <button type="submit" class="btn btn-danger" ><b>X</b></button>
                                    </form>
                                   
                                  </td>
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
                  <h4 style="text-align: center"><b >Cursos Recientemente Agregados</b></h4>
                  <div class="mu-sidebar-popular-courses">
                   @php
                   $limite=DB::table('cursos')->orderby('idcurso','desc')->limit('3')->get();
               @endphp
               @if($limite->count())
               @foreach ($limite as $item)
                    <div class="media">
                      <div class="media-body">
                        <a href="{{action('CursoController@edit', $item->idcurso)}}"title="Seleccionar"><li style="font-size: 14px;"><b>{{$item->codcurso}}</b>-{{$item->nombrecu}}</li></a>                     
                      </div>
                    </div>
                    @endforeach
                    @else
                    <div class="alert alert-warning" role="alert" style="text-align: center">
                     <b style="font-size: 15px;">¡No hay Cursos Agregados Recientemente!</b> 
                   </div>
                  @endif 
                  </div>
                </div>
                


                <div class="mu-single-sidebar"style="background-color:#F3C6AE;border-radius: 5px;" >
                  <h4 style="text-align: center"><b >Cantidad de Cursos por Nivel</b></h4>
                   <ul class="mu-sidebar-catg mu-sidebar-archives">
                     @php
                         $cantidad=DB::select('SELECT n.nombreni, count(c.idnivel) as cantidad FROM Cursos as c INNER JOIN nivels as n ON n.idnivel=c.idnivel GROUP BY n.nombreni')
                     @endphp
                     @if($cantidad)
                     @foreach ($cantidad as $item)
                     
                     <li><a href="#" style="color: black">{{$item->nombreni}}: {{$item->cantidad}}</a></li>
                     @endforeach
                     @else
                     <div class="alert alert-info" role="alert" style="text-align: center">
                      <b style="font-size: 16px;">¡No hay Cursos en Niveles!</b>
                    </div>
                   @endif 
                   </ul>
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
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@if(session('borrar') =='ok')
<script>
Swal.fire(
  '¡Curso Eliminado!',
   'El curso se eliminó correctamente.',
   'success'
   )
 </script>
@endif

  <script>
     $(document).ready(function() {
      $('#cursos').DataTable({
        "language": {
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "No hay ningún curso registrado",
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
  text: "¡Este curso se borrará difinitivamente!",
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
   
   $('.editar').submit(function(e){
    e.preventDefault();

    Swal.fire({
  title: '¿Actualizar Curso?',
  text: "¡Este curso se actualizará!",
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


     
  </script>
@stop