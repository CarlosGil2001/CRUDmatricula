@extends('plantilla.educacion')

@section('educacion')

<body>

  <section id="mu-page-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-page-breadcrumb-area">
            <h2>Cursos  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#centralModalSm" style="font-size: 17px;">
              Agregar <b>+</b>
            </button>
            
            <div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-md" role="document">
            
                <div class="modal-content">
                  <div class="modal-header bg-dark" style="background-color:#3C4A54;">
                  <h4 class="modal-title w-100 bg-dark" id="myModalLabel" style="color: white;font-size: 20px;"> <b>Registrar Curso</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" style="color: white">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body" >
                    <form action="{{route('curso.store')}}" method="post" class="registrar">
                      @csrf
                    <div class="form-row">
                      <div class="col-3">
                          <div class="md-form">
                          <label for="materialRegisterFormFirstName" style="color: black;font-size: 16px;float: left;" >Codigo</label>
                              <input type="text" id="materialRegisterFormFirstName" id="codcurso" minlength="4" maxlength="4" pattern="[A-Za-z0-9]+" title="Solo se permiten Letras y Números" name="codcurso" class="form-control  @error('codcurso') is-invalid @enderror"  placeholder="Codigo de Curso" required>
                              @error('datos2')
                              <div class="alert alert-danger" role="alert">
                                <li> {{$message}}</li>
                               </div> 
                            @enderror
                            </div>
                      </div>
                      <div class="col-9 ">
                          <div class="md-form">
                              <label for="materialRegisterFormLastName"style="color: black;font-size: 16px;float: left;">Curso</label>
                              <input type="text" id="materialRegisterFormLastName" name="nombrecu" class="form-control"   placeholder="Ingrese Curso" required>
                          </div>
                      </div>
                  </div>
                  <div class="form-row">
                    <div class="col-6">
                      <div>
                        <label for="select"style="color: black;font-size: 16px;float: left;">Nivel</label>
                        <select class="form-control" name="idnivel" id="nivel" required>
                            <option ><--Seleccione Nivel Educativo--></option>
                            @php
                                $nivel = DB::table('nivels')->get();
                            @endphp
                            
                            @foreach($nivel as $index)
                                <option value="{{$index->idnivel}}">{{$index->nombreni}}</option>
                            @endforeach
                        </select>
                   </div>
                  
                    </div>
      
                    <div class="col-6 ">
                   
                    </div>
                </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary btn-sm" >Registrar</button>
                  </div>
                </form> 
                </div>
              </div>
            </div>
      </h2>
            <ol class="breadcrumb">
             <li><a href="#">SistemasPE</a> </li>
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
              
               <div class="col-md-9">
                @include('custom.mensaje')
                <form class="form-inline my-6 my-lg-6" style="float: right" >
                  <input name="buscarpor" id="" class="form-control mr-sm-2" style="width: 81%;" type="search" placeholder="Buscar curso" aria-label="Search" value="{{$buscarpor}}">
                    <button class="btn btn-dark my-2 my-sm-2" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                  </form><br><br>
                 <div class="mu-course-container"  >
                
                   <div class="row"  id="resultados">
                   
                  @if($cursos->count())
                  @foreach ($cursos as $curso)
                     <div class="col-md-6 col-md-6">
                     <div class="mu-latest-course-single" >
                       <figure class="mu-latest-course-img"  >
                         <a href="{{action('CursoController@edit', $curso->idcurso)}}"title="Seleccionar Curso" ><img src="/edu/assets/img/curso.jpg" alt="img"></a>
                         <figcaption class="mu-latest-course-imgcaption" >
                           <a  href="{{action('CursoController@edit', $curso->idcurso)}}" title="Seleccionar" ><b>{{$curso->nombrecu}}</b></a>
                           <span>{{$curso->codcurso}}</span>
                         </figcaption>
                       </figure>
                       <div class="mu-latest-course-single-content">
                         <h4><a href=""><b>{{$curso->nombreni}}</b></a></h4>
                        
                         <div class="mu-latest-course-single-contbottom">
                         
                           <a class="btn btn-primary" style="width: 110px;" href="{{action('CursoController@edit', $curso->idcurso)}}" class="editar" >Editar <i class="fas fa-edit"></i></a>
                           
                         
                           <span class="mu-course-price" href=""><form action="{{action('CursoController@destroy', $curso->idcurso)}}" class="eliminar" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE"> 
                            <button type="submit" class="btn btn-danger" style="width: 110px;">Eliminar <i class="fas fa-times-circle"></i></button>
                          </form></span>
                          
                         </div>
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
                    {{$cursos->links()}} 
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
                    <h4 style="text-align: center;font-size: 19px;"><b >Listado de Cursos</b></h4>
                     <ul class="mu-sidebar-catg mu-sidebar-archives" style="text-align: center">
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#fullHeightModalRight" style="width: 150px;">
                        Buscar Curso...
                      </button>
                    
                      <div class="modal fade right" id="fullHeightModalRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                      
                        <div class="modal-dialog modal-full-height modal-lg" role="document" style="">
                      
                      
                          <div class="modal-content" >
                            <div class="modal-header"style="background-color:#3C4A54;">
                              <h4 class="modal-title w-100" id="myModalLabel" style="color: white;font-size: 19px;text-align: center;"><b>Listado de Cursos</b></h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              
                                <table id="cursos" class="table table-striped table-bordered" >
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
                                     
                                      <a href="{{action('CursoController@edit', $curso->idcurso)}}" title="Seleccionar Curso" class="btn btn-primary"><b>👁</b></a></td>
                                    <td>
                                     
                                      <form action="{{action('CursoController@destroy', $curso->idcurso)}}" class="eliminar" title="Eliminar Curso" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE"> 
                                        <button type="submit" class="btn btn-danger" style="width: 50px;"><b>X</b></button>
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
                          <a  href="{{action('CursoController@edit', $item->idcurso)}}" title="Seleccionar"><li style="font-size: 14px;" ><b>{{$item->codcurso}}</b>-{{$item->nombrecu}}</li></a>                     
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
                   

                   <!-- end single sidebar -->
                 </aside>
                 <!-- / end sidebar -->
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="mu-related-item">
                <h3><b>¡Niveles Educativos!</b></h3>
                <div class="mu-related-item-area">
                  <div id="mu-related-item-slide">
                    @php
                    $niveles=DB::table('nivels')->get();
                @endphp
                @if($niveles->count())
                @foreach ($niveles as $item)
                    <div class="col-md-6">
                    
                      <div class="mu-latest-course-single">
                        <figure class="mu-latest-course-img">
                          <a @can('haveaccess','nivel.index') href="{{URL::to('/nivel')}}" title="Ir a Niveles" @endcan><img alt="img" src="/img/inicial.jpg" height="180px;"></a>
                          <figcaption class="mu-latest-course-imgcaption">
                            <a @can('haveaccess','nivel.index') href="{{URL::to('/nivel')}}" title="Ir a Niveles"  @endcan><b>{{$item->nombreni}}</b></a>
                            <span><b>2020</b></span>
                          </figcaption>
                        </figure>
                      </div>
                     
                    </div>
                    @endforeach
                    @else
                    <div class="alert alert-info" role="alert" style="text-align: center">
                     <b style="font-size: 18px;">¡No hay Niveles Programados!</b>
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
      </div>
    </div>
  </section>
  
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script> 
  
</body>
</html>


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

@if(session('editar') =='ok')
<script>
Swal.fire(
  '¡Curso Actualizado!',
   'El curso se actualizó correctamente.',
   'success'
   )
 </script>
@endif
@if(session()->has('datos'))
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
  @if(session('datos2')=='ya existe')
  <script>
    Swal.fire({
  position: 'center',
  icon: 'error',
  title: '¡El curso ya existe!',
  showConfirmButton: false,
  timer: 1500
    })
  </script>
  @endif

  <script>


    //window.addEventListener('load',function(){
   //     document.getElementById("texto").addEventListener("keyup", () => {
    //            fetch(`/cursos/buscador?texto=${document.getElementById("texto").value}`,{ method:'get' }
     //           .then(response  =>  response.text() )
    //            .then(html      =>  {   document.getElementById("resultados").innerHTML = html  })
    //        
    //    })
   // }); 


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

$('.registrar').submit(function(re){
 re.preventDefault();
//  Swal.fire({
 //position: 'center',
 // icon: 'success',
 // title: '¡Se registró correctamente!',
 // showConfirmButton: false,
 // timer: 1500
////})
this.submit();
});


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
   
    $(document).ready(function(){
     $('#nivel').on('change',function(){
        var id_nivel =$(this).val();
      if($.trim(id_nivel)!=''){
          $.get('grados',{idnivel:id_nivel},function(grados) {
            $('#grado').empty();
           $('#grado').append("<option value=''><--Seleccione Grado--></option>");
            $.each(grados,function(index,value){
             $('#grado').append("<option value='"+index+"'>"+value+"</option>");
           })
         });
       }
     });
   });

  </script>
@stop