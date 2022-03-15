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
  
                 <div class="mu-course-container bg-light">
                   <div class="row">
                     <div class="col-md-12 col-md-12">
                      <img src="/img/9.jpg" style=";border-radius: 10px;" width="100%" alt="img"><br><br>
                      <div>
                       
                        <div class="card-body px-lg-5 pt-0" >
                          @include('custom.mensaje')
                            <label style="color: #5472CC" for=""><b>-----------Datos Personales-----------</b></label>
                        
                            <form  style="color: #757575;" method="post" action="{{route ('ficha.store')}}">
                                @csrf
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="md-form">
                                    <input type="text" id="" name="codeducando" class="form-control" minlength="8" maxlength="8" pattern="[A-Za-z0-9]+" title="Solo se permiten Letras y Números" placeholder="Ingrese codigo" required>
                                </div>
                           </div>

                    
                    <div class="col-md-6">
                        <div class="md-form">
                            <input type="text" id="" name="dni" minlength="8" maxlength="8" pattern="[0-9]+" title="Solo se permiten números" class="form-control" placeholder="Ingrese dni" required>
                        </div>
                    </div>
                    </div><br>
                    
                    <div class="form-row" style="margin-top: 25px;">
                        <div class="col-md-6">
                            <div class="md-form">
                                <input type="text" id="" name="apellidopaterno" pattern="[A-Za-z]+" title="Solo se permiten Letras" class="form-control" placeholder="Apellido Paterno" required>
                            </div>
                       </div>
                       <div class="col-md-6">
                    
                        <div class="md-form">
                            <input type="text" id="" name="apellidomaterno" pattern="[A-Za-z]+" title="Solo se permiten Letras" class="form-control" placeholder="Apellido Materno" required>
                        </div>
                    </div>
                </div><br>
                <div class="form-row" style="margin-top: 25px;">
                    <div class="col-md-4">
                    <div class="md-form">
                        <input type="text" id="" name="primernombres" pattern="[A-Za-z]+" title="Solo se permiten Letras" class="form-control" placeholder="Primer Nombre" required>
                    </div>
                    </div>
                    
                    <div class="col-md-4">
                    <div class="md-form">
                        <input type="text" id="" name="otrosnombres" pattern="[A-Za-z]+" title="Solo se permiten Letras" class="form-control" placeholder="Otros Nombres" required>
                    </div>
                    </div>
               
                        <div class="col-md-4">
                            <div class="md-form">
                                <select class="form-control" name="sexo"  required>
                                    <option ><--Seleccione Sexo--></option>
                                        <option >FEMENINO</option>
                                        <option >MASCULINO</option>
                                </select>
                            </div>
                       </div>
                    </div><br>
                    <div class="form-row" style="margin-top: 25px;">
                       <div class="col-md-3">
                        <label for="">Fecha Nacimiento</label>
                    </div>
                    
                       <div class="col-md-3">
                        <div class="md-form">
                            <div class="md-form">
                                <input type="date" name="fechanacimiento" class="form-control" required>
                            </div>
                        </div>
                    </div>
               
                    <div class="col-md-6">
                        <div class="md-form">
                            <select class="form-control select2 select2-hidden accessible selectpicker"  data-select2-id="1" tabindex="-1" aria hidden="true" name="iddepartamento" id="" data-live-search="true" required>
                                <option  option value="" selected  ><--Seleccione Departamento--></option>
                                   @php
                                       $paises=DB::table('departamentos')->get();
                                   @endphp
                                   @foreach ($paises as $index)
                                       <option value="{{$index->iddepartamento}}">{{$index->nombrede}}</option>
                                   @endforeach
                            </select>
                        </div>
                    </div>
           
                    </div><br>
                    <div class="form-row" style="margin-top: 25px;">
                        <div class="col-md-6">
                            <div class="md-form">
                                <input type="text" id="" name="escala"  maxlength="1" class="form-control" pattern="[A-Za-z]+" title="Solo se permiten Letras" placeholder="Escala" required>
                            </div>
                        
                        </div>
                        <div class="col-md-6">
                            <div class="md-form">
                                <input type="text" id="" name="anioingreso" minlength="4" maxlength="4"  pattern="[0-9]+" title="Solo se permiten números" class="form-control" placeholder="Año ingreso" required>
                            </div>
                        </div>
                </div><br>

                <div style="text-align: center">
                  <button type="submit" style="width: 370px;margin-top: 20px;" class="btn btn-primary">Registrar</button>
                </div>
                        </form><br>
                        

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
                     <li><a href="{{URL::to('/sitio')}}">Inicio</a></li>
                    
                     
                      <li><a href="{{URL::to('/ficha')}}">Alumnos</a></li>
                     
                     
                      <li><a href="{{URL::to('/curso')}}">Cursos</a></li>
                     
                     
                     
                      <li><a href="{{URL::to('/matricula')}}">Matriculas</a></li>
                     
                    </ul>
                  </div>

                   <div class="mu-single-sidebar"style="background-color:#F3C6AE;border-radius: 5px;" >
                    <h4 style="text-align: center;font-size: 18px;"><b >Listado de Alumnos</b></h4>
                     <ul class="mu-sidebar-catg mu-sidebar-archives" style="text-align: center">
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#fullHeightModalRight" ">
                        Buscar Alumno...
                      </button>
                      
                      <div class="modal fade right" id="fullHeightModalRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                      
                        <div class="modal-dialog modal-full-height modal-lg" role="document" >
                      
                      
                          <div class="modal-content" >
                            <div class="modal-header"style="background-color:#3C4A54;text-align: center">
                              <h4 class="modal-title w-100" id="myModalLabel" style="color: white;font-size: 19px;"><b>Listado de Alumnos</b></h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div  class="modal-body">
                            
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
                                    <td> <a href="{{action('FichaController@edit', $alumno->idalumno)}}" title="Seleccionar Alumno" class="btn btn-primary" ><b>👁</b></a></td>
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
                     $limite=DB::table('alumnos')->orderby('idalumno','desc')->limit('3')->get();
                 @endphp
                 @if($limite->count())
                 @foreach ($limite as $item)
                      <div class="media">
                        <div class="media-body">
                          <a  href="{{action('FichaController@edit', $item->idalumno)}}" title="Seleccionar" ><li style="font-size: 14px;">{{$item->apellidopaterno}} {{$item->apellidomaterno}} {{$item->primernombres}}</li></a>                                        
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
              <div class="row" >
                <div class="col-md-10">
                  <div class="mu-related-item">
                <h3><b>¡Nuestros Alumnos!</b></h3>
                <div class="mu-related-item-area">
                  <div id="mu-related-item-slide">
                    @php
                    $alumnos=DB::table('alumnos')->get();
                @endphp
                @if($alumnos->count())  
                @foreach ($alumnos as $alumno)    
                    <div class="col-md-6">
                      <div class="mu-latest-course-single" style="background-color: #E4EEE8">
                        <figure class="mu-latest-course-img">
                          <a  href="{{action('FichaController@edit', $alumno->idalumno)}}" title="Seleccionar" ><img alt="img" src="/img/10.png" height="200px" width=""></a>
                          <figcaption class="mu-latest-course-imgcaption">
                            <a href="{{action('FichaController@edit', $alumno->idalumno)}}" title="Seleccionar" ><b>{{$alumno->apellidopaterno}} {{$alumno->apellidomaterno}} {{$alumno->primernombres}} {{$alumno->otrosnombres}}</b></a>
                            <span>Codigo: <b>{{$alumno->codeducando}}</b></span>
                          </figcaption>
                        </figure>
                        <div class="mu-latest-course-single-content">
                          <h5><b>Dni: </b>{{$alumno->dni}}</h5>
                          <h5> <b>Fecha de Nacimiento: </b>{{$alumno->fechanacimiento}}</h5>
                          <h5> <b>Año de Ingreso: </b>{{$alumno->anioingreso}}</h5>
                          <p><form action="{{action('FichaController@destroy', $alumno->idalumno)}}" class="eliminar" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE"> 
                            <button type="submit" class="btn btn-danger" style="width: 100px;margin-left: 290px;">Eliminar</button>
                          </form></p>
                        </div>
                      </div>
                    
                    </div>
                    @endforeach
                       @else
                       <div class="alert alert-info" role="alert" style="text-align: center">
                        <b style="font-size: 18px;">¡No hay Alumnos Registrados!</b>
                      </div>
                     @endif  
                  </div>
                </div>
              </div>
                </div>
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

@if(session('borrar') =='ok')
<script>
Swal.fire(
  '¡Alumno Eliminado!',
   'El Alumno se eliminó correctamente.',
   'success'
   )
 </script>
@endif


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

$('.eliminar').submit(function(e){
    e.preventDefault();

    Swal.fire({
  title: '¿Estás Seguro?',
  text: "¡Este Alumno se borrará difinitivamente!",
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
    //LUGAR NACIMIENTO
    $(document).ready(function(){
     $('#pais').on('change',function(){
        var id_pais =$(this).val();
      if($.trim(id_pais)!=''){
          $.get('mosdepartamento',{idpais:id_pais},function(mosdepartamento) {
            $('#departamento').empty();
           $('#departamento').append("<option   value='' ><--Seleccione Departamento--></option>");
            $.each(mosdepartamento,function(index,value){
             $('#departamento').append("<option value='"+index+"'>"+value+"</option>");
           })
         });
       }
     });
   });

   $(document).ready(function(){
     $('#departamento').on('change',function(){
        var id_departamento =$(this).val();
      if($.trim(id_departamento)!=''){
          $.get('mosprovincia',{iddepartamento:id_departamento},function(mosprovincia) {
            $('#provincia').empty();
           $('#provincia').append("<option value=''><--Seleccione Provincia--></option>");
            $.each(mosprovincia,function(idprovincia,value){
             $('#provincia').append("<option value='"+idprovincia+"'>"+value+"</option>");
           })
         });
       }
     });
   });

   $(document).ready(function(){
     $('#provincia').on('change',function(){
        var id_provincia =$(this).val();
      if($.trim(id_provincia)!=''){
          $.get('mosdistrito',{idprovincia:id_provincia},function(mosdistrito) {
            $('#distrito').empty();
           $('#distrito').append("<option value=''><--Seleccione Distrito--></option>");
            $.each(mosdistrito,function(iddistrito,value){
             $('#distrito').append("<option value='"+iddistrito+"'>"+value+"</option>");
           })
         });
       }
     });
   });

   //UBICACION ALUMNO

   $(document).ready(function(){
     $('#departamentos').on('change',function(){
        var id_departamento =$(this).val();
      if($.trim(id_departamento)!=''){
          $.get('ubicacionprovincia',{iddepartamento:id_departamento},function(ubicacionprovincia) {
            $('#provincias').empty();
           $('#provincias').append("<option value=''><--Seleccione Provincia--></option>");
            $.each(ubicacionprovincia,function(item,value){
             $('#provincias').append("<option value='"+item+"'>"+value+"</option>");
           })
         });
       }
     });
   });

   $(document).ready(function(){
     $('#provincias').on('change',function(){
        var id_provincia =$(this).val();
      if($.trim(id_provincia)!=''){
          $.get('ubicaciondistrito',{idprovincia:id_provincia},function(ubicaciondistrito) {
            $('#distritos').empty();
           $('#distritos').append("<option value=''><--Seleccione Distrito--></option>");
            $.each(ubicaciondistrito,function(iddistrito,value){
             $('#distritos').append("<option value='"+iddistrito+"'>"+value+"</option>");
           })
         });
       }
     });
   });

</script>
@stop