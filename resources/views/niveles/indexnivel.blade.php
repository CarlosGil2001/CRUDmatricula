@extends('plantilla.educacion')
@section('educacion')


    <section id="mu-page-breadcrumb">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="mu-page-breadcrumb-area">
                <h2>Niveles Educativos</h2>
                <ol class="breadcrumb">
                 <li><a href="#">SistemasPE</a></li>
                 @php
                 $contar=DB::table('nivels')->select('idnivel')->count();
                 @endphp            
                 <li class="active">Niveles Programados <b style="font-size: 20px;">{{$contar}}</b></li>
                  
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
                      @include('custom.mensaje')
                       <div class="row">
                         <div class="col-md-6 col-md-6">
                          
                          <div class="">
                            
                            <figure class="mu-latest-course-img">
                              <a href="#"><img src="/img/nivel.jpg" width="100%" alt="img"></a>
                             
                              <hr style="border:solid 2px;color:#466282;background-color: #466282">
                              <figcaption class="mu-latest-course-imgcaption">
                                <h5><b style="font-size: 20px;">Registrar Nivel</b></h5>
                              </figcaption>
                            </figure>
                            
                            <form action="{{route('nivel.store')}}" method="post">
                              @csrf
                            <div class="mu-latest-course-single-content">
                              <input type="text" class="form-control" name="nombreni" pattern="[A-Za-z]+" title="Solo se permiten Letras (1 palabra)" placeholder="Ingresar Nivel" required>
                            </div><br>
                            <div class="mu-latest-course-single-content">
                            <button type="submit" class="btn btn-primary" style="width: 200px;float: right;" title="Registrar">Registrar</button>
                            </div><br><br>
                            <hr style="border:solid 2px;color:#466282;background-color: #466282">
                          </form>
                         
                          </div>
      
                          </div>
                          <div class="col-md-6 col-md-6">
                            <div class="mu-latest-course-single">
                              <figure class="mu-latest-course-img">
                                <a href="#"><img src="/img/res.jpg" alt="img"></a>
                              </figure>
                            </div>
                            </div>
                          
                          <div class="col-md-12 col-md-12">
                            <div class="row" >

                              <form class="form-inline my-6 my-lg-6" style="float: right" >
                                <input name="buscarpor" id="" class="form-control mr-sm-2" style="width: 81%;" type="search" placeholder="Buscar Nivel" aria-label="Search" value="{{$buscarpor}}">
                                  <button class="btn btn-dark my-2 my-sm-2" type="submit">
                                    <i class="fas fa-search"></i>
                                  </button>
                                </form>

                              <h3><b>¡Niveles Programados!</b></h3>
                              @if($niveles->count())
                              @foreach ($niveles as $nivel)
                              <div class="col-md-6">
    
                                <div class="mu-latest-course-single">
                                  
                                  <figure class="mu-latest-course-img">
                                    <a   @can('haveaccess','nivel.edit') href="{{action('NivelController@edit',$nivel->idnivel)}}" title="Seleccionar" @endcan><img alt="img" src="/img/img.jpg" height="180px;"></a>
                                    <figcaption class="mu-latest-course-imgcaption">
                                      <a  @can('haveaccess','nivel.edit') href="{{action('NivelController@edit',$nivel->idnivel)}}" title="Seleccionar" @endcan><b>{{$nivel->nombreni}}</b></a>
                                      <span><b>2020</b></span>
                                    </figcaption>
                                  </figure>                               
                                  <div class="mu-latest-course-single-content">
                                    <div class="row">
                                      <div class="col-md-6">
                                       
                                        <a href="{{action('NivelController@edit',$nivel->idnivel)}}" style="float: left;width: 130px;" title="Seleccionar" class="btn btn-primary">Editar <i class="fas fa-edit"></i></a>
                                        
                                      </div>
                                      <div class="col-md-6">
                                       
                                        <a href=""><form action="{{action('NivelController@destroy',$nivel->idnivel)}}" method="POST" class="eliminar">
                                          @csrf
                                          @method('DELETE')
                                          <button class="btn btn-danger" style="float: right;width: 130px;" title="Eliminar">Eliminar <i class="fas fa-times-circle"></i></button>
                                        </form></a>
                                      </div>
                                    </div>

                                  </div>
                                  
                                </div>

                              </div>
                              @endforeach
                              @else
                              <div class="alert alert-warning" role="alert" style="text-align: center">
                               <b style="font-size: 15px;">¡No hay Niveles Programados!</b> 
                             </div>
                            @endif 
                            </div>
                            {{$niveles->links()}}
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

                      <div class="mu-single-sidebar"style="background-color:#F3C6AE;border-radius: 5px;">
                        <h4 style="text-align: center;font-size: 16px;"><b >Listado de Niveles</b></h4>
                        <ul class="mu-sidebar-catg mu-sidebar-archives" style="text-align: center">
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#fullHeightModalRight" >
                        Buscar Nivel...
                      </button>
                    
                      <div class="modal fade right" id="fullHeightModalRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                      
                        <div class="modal-dialog modal-full-height modal-lg" role="document" >
                  
                          <div class="modal-content" >
                            <div class="modal-header"style="background-color:#3C4A54;text_align:center">
                              <h4 class="modal-title w-100" id="myModalLabel" style="color: white;font-size: 19px;"><b>Listado de Niveles</b></h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              
                                <table id="niveles" class="table table-striped table-bordered" >
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">CODIGO</th>
                                    <th scope="col">NIVEL PROGRAMADO</th>
                                    <th scope="col">VER</th>
                                    <th scope="col">ELIMINAR</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @php 
                                  $niv=DB::table('nivels')->get();
                                  @endphp
                                      
                                      @foreach ($niv as $item)
                                    <tr>
                                    <th >{{$item->idnivel}}</th>
                                    <td>{{$item->nombreni}}</td>
                                    <td>
                                     
                                      <a href="{{action('NivelController@edit', $item->idnivel)}}" title="Seleccionar" class="btn btn-primary"><b>👁</b></a></td>
                                    <td>
                                      
                                      <form action="{{action('NivelController@destroy', $item->idnivel)}}" class="eliminar" title="Eliminar" method="post">
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
                        </ul>
                      </div>
      
                       <div class="mu-single-sidebar" style="background-color:#F3C6AE;border-radius: 5px;">
                        <h4 style="text-align: center;font-size: 16px;"><b >Niveles Programados Recientemente</b></h4>
                        <div class="mu-sidebar-popular-courses">
                         @php
                         $limite=DB::table('nivels')->limit('3')->orderby('idnivel','desc')->get();
                     @endphp
                     @if($limite->count())
                     @foreach ($limite as $item)
                          <div class="media">
                            <div class="media-body">
                              <a  href="{{action('NivelController@edit',$item->idnivel)}}" title="Seleccionar" ><li style="font-size: 14px;"><b>{{$item->idnivel}}</b>- {{$item->nombreni}}</li></a>                     
                            </div>
                          </div>
                          @endforeach
                          @else
                          <div class="alert alert-warning" role="alert" style="text-align: center">
                           <b style="font-size: 15px;">¡No hay Niveles Programados Recientemente!</b> 
                         </div>
                        @endif 
                        </div>
                      </div>

                      <div class="mu-single-sidebar"style="background-color:#F3C6AE;border-radius: 5px;" >
                        <h4 style="text-align: center"><b >Programaciones</b></h4>
                         <ul class="mu-sidebar-catg mu-sidebar-archives">
                           @php
                               $niveles=DB::table('nivels')->select('idnivel')->count();
                
                           @endphp
                           <li><a href="#" style="color: black">Niveles: {{$niveles}}</a></li>
                         </ul>
                       </div>

                     </aside>
                  </div>
                </div>
      
              </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      @stop

      @section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script> 

@if(session('editar') =='ok')
<script>
Swal.fire(
  '¡Nivel Educativo Actualizado!',
   'El Nivel se actualizó correctamente.',
   'success'
   )
 </script>
 @endif

@if(session('borrar') =='ok')
<script>
Swal.fire(
  '¡Nivel Educativo Eliminado!',
   'El nivel se eliminó correctamente.',
   'success'
   )
 </script>
@endif

  <script>
      $(document).ready(function() {
      $('#niveles').DataTable({
        "language": {
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "No hay ningún nivel registrado",
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
  text: "¡Se borrarán todas las entidades relacionadas!",
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