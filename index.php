<?php include 'base/conexion.php'; ?>
<?php $conexion = new conexion();
 /*$sql = "SELECT * FROM `proyectos`";
 $datos = $conexion->consultar($sql);*/
 $proyectos= $conexion->consultar("SELECT * FROM `proyectos` where activo = 1");?>
<!doctype html>
<html lang="en">
    
    <head>
        <title> Portfolio - Fernando Burruso </title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Porfolio perfonal de Fernando Burruso" />
        <meta name="developer" content="Fernando Burruso">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- FAV AND ICONS   -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        
        <!-- Google Font-->
        <link href="http://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="assets/icons/font-awesome-4.7.0/css/font-awesome.min.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/plugins/css/bootstrap.min.css">
        <!-- Animate CSS-->
        <link rel="stylesheet" href="assets/plugins/css/animate.css">
        <!-- Owl Carousel CSS-->
        <link rel="stylesheet" href="assets/plugins/css/owl.css">
        <!-- Fancybox-->
        <link rel="stylesheet" href="assets/plugins/css/jquery.fancybox.min.css">
        <!-- Custom CSS-->
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
              
    </head>
    <body class="dark-vertion black-bg">
        <!-- Start Loader -->
        <div class="section-loader">
            <div class="loader">
                <div></div>
                <div></div> 
            </div>
        </div>
        <!-- End Loader -->
        
        <!--
        ===================
           NAVIGATION
        ===================
        -->
        <header class="black-bg mh-header mh-fixed-nav nav-scroll mh-xs-mobile-nav wow fadeInUp" id="mh-header">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-expand-lg mh-nav nav-btn">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon icon"></span>
                        </button>
                    
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#mh-home">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#mh-about">Sobre Mí</a>
                                </li>                            
                                <li class="nav-item">
                                   <a class="nav-link" href="#mh-experience">Experiencia</a>
                                </li>                                
                                <li class="nav-item">
                                    <a class="nav-link" href="#mh-portfolio">Proyectos</a>
                                </li>                               
                                <li class="nav-item">
                                   <a class="nav-link" href="#mh-contact">Contacto</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        
        <!--
        ===================
            HOME 
        ===================
        -->
        <section class="mh-home" id="mh-home">
            <div class="home-ovimg">
                <div class="container">
                    <div class="row xs-column-reverse section-separator vertical-middle-content home-padding">
                        <div class="col-sm-6">
                            <div class="mh-header-info">
                                <div class="mh-promo wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.1s">
                                    <span>Hola, yo soy</span>
                                </div>
                                
                                <h2 class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">Fernando Burruso</h2>
                                <h5 class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">Programador Sr. Visual Basic 6</h4>
                                <h5 class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">Programador Jr. Full Stack</h4>
                                <h5 class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">DBA Oracle</h4>
                                
                                <ul>
                                    <li class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s"><i class="fa fa-envelope"></i><a href="mailto:burrusof@gmail.com">burrusof@gmail.com</a></li>
                                    <li class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s"><i class="fa fa-phone"></i><a href="callto:">11 34 06 30 58</a></li>
                                </ul>
                                
                                <ul class="social-icon wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.7s">
                                    <li><a href="https://www.facebook.com/FerBurruso" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/FerBurruso" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://github.com/FerBurruso" target="_blank"><i class="fa fa-github"></i></a></li>
                                </ul>
                            </div>
                        </div>                       
                    </div>
                </div>
            </div>
        </section>   
        
        <!--
        ==================
            ABOUT
        =================
        -->
        <section class="mh-about" id="mh-about">
            <div class="container">
                <div class="row section-separator">
                    <div class="col-sm-12 col-md-6">
                        <div class="mh-about-img shadow-2 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">
                            <img src="assets/images/ab-img.png" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="mh-about-inner">
                            <h2 class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.1s">Sobre mí</h2>
                            <p class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">Hola, soy Fernando Burruso. Programador Visual Basic y PL-SQL con más de 15 años de experiencia. Estoy dando mis primeros pasos como Desarrollador Web.</p>
                            <div class="mh-about-tag wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                                <ul>
                                    <li><span>HTML</span></li>
                                    <li><span>CSS</span></li>
                                    <li><span>PHP</span></li>
                                    <li><span>Javascript</span></li>
                                    <li><span>Visual Basic 6.0</span></li>
                                    <li><span>PL-SQL</span></li>
                                    <li><span>Java</span></li>
                                    <li><span>C</span></li>
                                    <li><span>Pascal</span></li>
                                    <li><span>Smalltalk</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!--
        ===================
           SERVICE
        ===================
        -->
        <section class="mh-service">
            <div class="container">
                <div class="row section-separator">
                    <div class="col-sm-12 text-center section-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <h2>Servicios</h2>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="mh-service-item shadow-1 dark-bg wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                            <i class="fa fa-bullseye purple-color"></i>
                            <h3>Diseño Web</h3>
                            <p>
                                Sitios Webs personalizados para tus exigencias.
                                Potencia tu negocio con una Web profesional, con diseño responsive para todos los dispositivos.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="mh-service-item shadow-1 dark-bg wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s">
                            <i class="fa fa-code iron-color"></i>
                            <h3>Desarrollo Web</h3>
                            <p>
                                Desarrollo de aplicaciones web soluciones sólidas y robustas. 
                                La mejor solución para tu negocio con las últimas tecnologías.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="mh-service-item shadow-1 dark-bg wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.7s">
                            <i class="fa fa-object-ungroup sky-color"></i>
                            <h3>Desarrollo de Sistemas Desktop</h3>
                            <p>
                                Más de 15 años de experiencia en diseño, desarrollo y mantenimiento de sistemas Desktop.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>       
        
  
        <!--
        ===================
           EXPERIENCES
        ===================
        -->
        <section class="mh-experince" id="mh-experience">
            <div class="bolor-overlay">
                <div class="container">
                    <div class="row section-separator">
                        <div class="col-sm-12 col-md-6">
                            <div class="mh-education">
                                 <h3 class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">Educación</h3>
                                <div class="mh-education-deatils">
                                    <!-- Education Institutes-->
                                    <div class="mh-education-item dark-bg wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                                        <h4>Ingeniería en Sistemas <a href="#">Universidad Tecnológica Nacional</a></h4>
                                        <div class="mh-eduyear">2005-2012</div>
                                        <p>Cursados todas las materias de los primeros 4 años. Sin finalizar. </p>
                                    </div>                                
                                    <!-- Education Institutes-->
                                    <div class="mh-education-item dark-bg wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s">
                                        <h4>Carrera DBA ORACLE <a href="#">Education IT</a></h4>
                                        <div class="mh-eduyear">2012</div>
                                        <p> Linux Shell Scripting. Linux Administrator. Desarrallo en PL-SQL. Oracle Tuning Database. Oracle Database Administrator  </p>
                                    </div>                                
                                    <!-- Education Institutes-->
                                    <div class="mh-education-item dark-bg wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.6s">
                                        <h4>Desarrollador Full Stack <a href="#">Codo a Codo</a></h4>
                                        <div class="mh-eduyear">2022</div>
                                        <p> Desarrollo de sitios Web con HTML, CSS y JS. Base de datos MySql. Desarrollo en PHP </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mh-work">
                                 <h3>Experiencia laboral</h3>
                                <div class="mh-experience-deatils">
                                    <!-- Education Institutes-->
                                    <div class="mh-work-item dark-bg wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">
                                        <h4>Desarrollador VB 6.0 / PL-SQL <a href="https://www.surcoseguros.com.ar/" target="_blank">Surco Seguros S.A.</a></h4>
                                        <div class="mh-eduyear">2007-Actualidad</div>
                                        <span>Tareas :</span>
                                        <ul class="work-responsibility">
                                            <li><i class="fa fa-circle"></i>Desarrollador en VB 6.0 y PL-SQL de requerimientos de negocios</li>
                                            <li><i class="fa fa-circle"></i>Creación y modificación de reportes mediante Crystal Reports</li>
                                            <li><i class="fa fa-circle"></i>Creación de tablas, store procedures, functions, vistas</li>
                                            <li><i class="fa fa-circle"></i>Optimización de la performance de procesos en pl-sql, accesos a vistas, creación de índices</li>
                                            <li><i class="fa fa-circle"></i>Automatización de comunicación con sistemas externos</li>
                                        </ul>
                                    </div>                                
                                    <!-- Education Institutes-->
                                    <div class="mh-work-item dark-bg wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.6s">
                                        <h4>Responsable de Sistemas <a href="https://www.sanoybueno.com.ar/" target="_blank">Sano y Bueno Catering S.A.</a></h4>
                                        <div class="mh-eduyear">2015-2017</div>
                                        <span>Tareas :</span>
                                        <ul class="work-responsibility">
                                            <li><i class="fa fa-circle"></i>Soporte técnico a Usuarios</li>
                                            <li><i class="fa fa-circle"></i>Soporte técnico y mantenimiento de la red</li>
                                        </ul>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!--
        ===================
           PORTFOLIO
        ===================
        -->
        <section class="mh-portfolio" id="mh-portfolio">
            <div class="container">
                <div class="row section-separator">
                    <div class="section-title col-sm-12 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.1s">
                        <h3>Proyectos</h3>
                    </div>
                    <div class="part col-sm-12">                      
                        <div class="mh-project-gallery col-sm-12 wow fadeInUp" id="project-gallery" data-wow-duration="0.8s" data-wow-delay="0.5s">
                            <div class="portfolioContainer row">
                            <?php #leemos proyectos 1 por 1
                            foreach($proyectos as $proyecto){ ?>
                                <div class="grid-item col-md-4 col-sm-6 col-xs-12 user-interface">
                                    <figure>
                                        <img src="http://drive.google.com/uc?export=view&id=<?php echo $proyecto['imagen'];?>" alt="">
                                        <figcaption class="fig-caption">
                                            <i class="fa fa-search"></i>
                                            <h5 class="title"><?php echo $proyecto['nombre'];?></h5>
                                            <span class="sub-title"><?php echo $proyecto['descripcion'];?></span>
                                            <a data-fancybox data-src=<?php echo $proyecto['direccion'];?>></a>
                                        </figcaption>
                                    </figure>
                                </div>
                            <?php } ?>
                            </div> <!-- End: .grid .project-gallery -->
                        </div> <!-- End: .grid .project-gallery -->
                    </div> <!-- End: .part -->
                </div> <!-- End: .row -->
            </div>            
        </section>
        

        <!--
        ===================
           FOOTER 1
        ===================
        -->
        <footer class="mh-footer" id="mh-contact">
            <div class="image-bg">
                <div class="container">
                    <div class="row section-separator">
                        <div class="col-sm-12 section-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                            <h3>Contactame</h3>
                        </div>
                        
                        <div class="col-sm-12 col-md-12 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                            <form id="contactForm" class="single-form quate-form wow fadeInUp" data-toggle="validator">
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <input name="name" class="contact-name form-control" id="name" type="text" placeholder="Nombre" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input name="name" class="contact-email form-control" id="L_name" type="text" placeholder="Apellido" required>
                                    </div>
                                    <div class="col-sm-12">
                                        <input name="name" class="contact-subject form-control" id="email" type="email" placeholder="Email" required>
                                    </div>
                                    <div class="col-sm-12">
                                        <textarea class="contact-message" id="message" rows="6" placeholder="Dejanos tu mensaje" required></textarea>
                                    </div>
                                    <!-- Subject Button -->
                                    <div class="btn-form col-sm-12">
                                        <button type="submit" class="btn btn-fill btn-block" id="form-submit">Enviar mensaje</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-12 mh-copyright wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="social-icon">
                                        <li><a href="https://www.facebook.com/FerBurruso" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="https://twitter.com/FerBurruso" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="https://github.com/FerBurruso" target="_blank"><i class="fa fa-github"></i></a></li>        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>     
    
    <!--
    ==============
    * JS Files *
    ==============
    -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <!-- jQuery -->
    <script src="assets/plugins/js/jquery.min.js"></script>
    <!-- popper -->
    <script src="assets/plugins/js/popper.min.js"></script>
    <!-- bootstrap -->
    <script src="assets/plugins/js/bootstrap.min.js"></script>
    <!-- owl carousel -->
    <script src="assets/plugins/js/owl.carousel.js"></script>
    <!-- validator -->
    <script src="assets/plugins/js/validator.min.js"></script>
    <!-- wow -->
    <script src="assets/plugins/js/wow.min.js"></script>
    <!-- mixin js-->
    <script src="assets/plugins/js/jquery.mixitup.min.js"></script>
    <!-- circle progress-->
    <script src="assets/plugins/js/circle-progress.js"></script>
    <!-- jquery nav -->
    <script src="assets/plugins/js/jquery.nav.js"></script>
    <!-- Fancybox js-->
    <script src="assets/plugins/js/jquery.fancybox.min.js"></script>
    <!-- isotope js-->
    <script src="assets/plugins/js/isotope.pkgd.js"></script>
    <script src="assets/plugins/js/packery-mode.pkgd.js"></script>
    
    <script src="assets/js/custom-scripts.js"></script>
    
    </div>
    </div>
</body>

</html>