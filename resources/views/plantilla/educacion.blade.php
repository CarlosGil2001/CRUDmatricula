<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>SistemaPE</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/edu/assets/img/favicon.ico" type="image/x-icon">

    <!-- Font awesome -->
    <link href="/edu/assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="/edu/assets/css/bootstrap.css" rel="stylesheet">   
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="/edu/assets/css/slick.css">          
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="/edu/assets/css/jquery.fancybox.css" type="text/css" media="screen" /> 
    <!-- Theme color -->
    <link id="switcher" href="/edu/assets/css/theme-color/default-theme.css" rel="stylesheet">          

    <!-- Main style sheet -->
    <link href="/edu/assets/css/style.css" rel="stylesheet"> 
    <link href="/css/css/estilos.css" rel="stylesheet">   
    <link rel="stylesheet" href="/css/estilos.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet"> 
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <!-- Google Fonts -->
    
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700' rel='stylesheet' type='text/css'>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('estilos')
  </head>
  <body> 

  <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>      
    </a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header  -->
  <header id="mu-header">
    
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-header-area">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-left">
                  <div class="mu-top-email">
                    <i class="fa fa-envelope"></i>
                   
                    <span>education@edu.pe</span>
                  </div>
                  <div class="mu-top-phone">
                    <i class="fa fa-phone">011 - 4545</i>
                    <span></span>
                  </div>
                </div>
              </div>
              <div></div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-right">
                  <nav>
                    <ul class="mu-top-social-nav">
                      <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                      <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                      <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                      <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                      <li><a href="#"><span class="fa fa-youtube"></span></a></li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End header  -->
  <!-- Start menu -->
  <section id="mu-menu" >
    <nav class="navbar navbar-default" role="navigation">  
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <a class="navbar-brand" href=""><i class="fa fa-university"></i><span></span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li class="active"><a href="">Bienvenida</a></li>
            <li class=""><a href="">Inicio</a></li>    
            

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Programación<span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{URL::to('/nivel')}}">Niveles</a></li>
              </ul>
            </li>


            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cursos <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">

                <li><a href="{{URL::to('/curso')}}">Cursos Educativos</a></li>
          
              </ul>
               
            </li>



            <li class="dropdown">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Alumnos<span class="fa fa-angle-down"></span></a>

              <ul class="dropdown-menu" role="menu">

                <li><a href="{{URL::to('/ficha')}}">Ficha</a></li>    
         
              </ul>
            </li>  


            <li class="dropdown">
              
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Proceso<span class="fa fa-angle-down"></span></a>
             
              <ul class="dropdown-menu" role="menu">

                <li><a href="{{URL::to('/matricula')}}">Matriculas</a></li>

                           
              </ul>
            </li>  
             
            
          

            
           
      
           <button class="switch" id="switch" style="margin-top: 20px;">
              <span><i class="fas fa-sun"></i></span>
              <span><i class="fas fa-moon"></i></span>
            </button>
          </ul> 
      </div>  
    </nav>
    
  </section>
<div></div>
 @yield('educacion')

  <!-- Start footer -->
  <footer id="mu-footer">
    <!-- start footer top -->
    <div class="mu-footer-top">
      <div class="container">
        <div class="mu-footer-top-area">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>Informacion</h4>
                <ul>

                  <li><a href="{{URL::to('/curso')}}">Cursos</a></li>
                
                  <li><a href="{{URL::to('/ficha')}}">Alumnos</a></li>

                  <li><a href="{{URL::to('/matricula')}}">Alumnos Matriculados</a></li>

                  <li><a href="{{URL::to('/sitio')}}">Inicio</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>Ayuda al Estudiante</h4>
                <ul>
                  <li><a href="">Empezar</a></li>
                  <li><a href="#">Mis Preguntas</a></li>
                  <li><a href="">Descargar Archivos</a></li>
                  <li><a href="">Ultimo Curso</a></li>
                  <li><a href="">Noticias Academicas</a></li>                  
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>Carta de noticias</h4>
                <p>Obtenga las últimas actualizaciones, noticias y ofertas académicas.</p>
                <form class="mu-subscribe-form">
                  <input type="email" placeholder="Escribe tu Email">
                  <button class="mu-subscribe-btn" type="submit">Suscribete!</button>
                </form>               
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>Contacto</h4>
                <address>
           
                  <p>Location: Lima</p>
                  <p>Telefono:  011 - 4545</p>
                  <p>Email: education@edu.pe </p>
                </address>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end footer top -->
    <!-- start footer bottom -->
    <div class="mu-footer-bottom">
      <div class="container">
        <div class="mu-footer-bottom-area">
          <p>&copy; All Right Reserved. Designed by <a href="http://www.markups.io/" rel="nofollow">MarkUps.io</a></p>
        </div>
      </div>
    </div>
  </footer>

  
  <!-- jQuery library -->
  <script src="/edu/assets/js/jquery.min.js"></script> 
  
  <script src="/edu/assets/js/bootstrap.js"></script>   
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  @yield('script')
  <script type="text/javascript" src="/edu/assets/js/slick.js"></script>
  <script type="text/javascript" src="/edu/assets/js/waypoints.js"></script>
  <script type="text/javascript" src="/edu/assets/js/jquery.counterup.js"></script>  
  <script type="text/javascript" src="/edu/assets/js/jquery.mixitup.js"></script>      
  <script type="text/javascript" src="/edu/assets/js/jquery.fancybox.pack.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="/js/main.js"></script>

  <script src="/edu/assets/js/custom.js"></script> 

  </body>
</html>