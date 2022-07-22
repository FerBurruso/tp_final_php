<?php include 'base/conexion.php'; 
include 'api_google/vendor/autoload.php';
putenv('GOOGLE_APPLICATION_CREDENTIALS=api_google/portfolio-357107-8e5c312175e3.json');
?>
<?php $conexion = new conexion();
 $proyectos= $conexion->consultar("SELECT * FROM `proyectos`");?>
 <?php ob_start(); #esto evita los errores de envios de headers
set_error_handler("var_dump");
session_start(); #inicializamos variables de sesion
 #si esta logueado lo dejo trabajar y sino lo mando al login de nuevo 
 if ( isset( $_SESSION['usuario'] )!='Admin'){
    header("location:base/login.php");
    die();
} ?>
<?php if($_POST){#si hay envio de datos, los inserto en la base de datos  

$nombre_proyecto = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$direccion = $_POST['direccion'];
$errores = "";

/*manejo de imagenes local*/ 
#nombre de la imagen
/*
$imagen = $_FILES['archivo']['name'];
#tenemos que guardar la imagen en una carpeta 
$imagen_temporal=$_FILES['archivo']['tmp_name'];
#creamos una variable fecha para concatenar al nombre de la imagen, para que cada imagen sea distinta y no se pisen 
$fecha = new DateTime();
$imagen= $fecha->getTimestamp()."_".$imagen;
move_uploaded_file($imagen_temporal,"imagenes/".$imagen);


*/

/*manejo de imagenes de google*/

$cliente= new Google_Client();
$cliente->useApplicationDefaultCredentials();
$cliente->setScopes(['https://www.googleapis.com/auth/drive.file']);

try{
    $servicio = new Google_Service_Drive($cliente);
    $imagen_temporal=$_FILES['archivo']['tmp_name'];

    $archivo = new Google_Service_Drive_DriveFile();
    $archivo->setName($_FILES['archivo']['name']);
    $archivo->setParents(array('1L_QlewsJ5YUWY_V1d6xNapMUaJFN-0v4'));
    $archivo->setDescription('Imagen del proyecto $nombre_proyecto');
    $archivo->setMimeType($_FILES['archivo']['type']);

    $archivo_drive = $servicio->files->create(
        $archivo,
        array(
            'data' => file_get_contents($imagen_temporal),
            'mimeType' => $_FILES['archivo']['type'],
            'uploadType' => 'media'
        )
    );

    $imagen = $archivo_drive->getId();
}
catch(Exception $e){
    $errores = $e->getMessage();
}

#creo una instancia(objeto) de la clase de conexion
$conexion = new conexion();
$sql="INSERT INTO `proyectos` (`nombre`, `imagen`, `descripcion`, `direccion`, `activo`, `errores`) VALUES ('$nombre_proyecto' , '$imagen', '$descripcion', '$direccion', '1', '$errores')";
$id_proyecto = $conexion->ejecutar($sql);
 header("Location:index_admin.php");
 die();

}

#si nos envian por url, get 
if($_GET){

    #ademas de borrar de la base , tenemos que borrar la foto de la carpeta imagenes
   if(isset($_GET['borrar'])){
        $id = $_GET['borrar'];
        $conexion = new conexion();

        #recuperamos la imagen de la base antes de borrar 
        $imagen = $conexion->consultar("select imagen FROM  `proyectos` where id=".$id);
        #la borramos de la carpeta 
        /*unlink("imagenes/".$imagen[0]['imagen']);*/

        $cliente= new Google_Client();
        $cliente->useApplicationDefaultCredentials();
        $cliente->setScopes(['https://www.googleapis.com/auth/drive.file']);
        
        $servicio = new Google_Service_Drive($cliente);
        $servicio->files->delete($imagen[0]['imagen']);

            
        #borramos el registro de la base 
        $sql ="DELETE FROM `proyectos` WHERE `proyectos`.`id` =".$id; 
        $id_proyecto = $conexion->ejecutar($sql);
         #para que no intente borrar muchas veces
         header("Location:index_admin.php");
         die();
    }

    if(isset($_GET['cambiarEstado'])){
        $id = $_GET['cambiarEstado'];
        $conexion = new conexion();
     
        #cambiamos el estado del proyecto
        $sql ="UPDATE `proyectos` SET activo =  if(activo=1,0,1) WHERE `proyectos`.`id` =".$id; 
        $id_proyecto = $conexion->ejecutar($sql);
         #para que no intente borrar muchas veces
         header("Location:index_admin.php");
         die();
    }

   if(isset($_GET['modificar'])){
        $id = $_GET['modificar'];
        header("Location:modificar.php?modificar=".$id);
        die();
    }
 } 
  #vamos a consultar para llenar la tabla 
  $conexion = new conexion();
  $proyectos= $conexion->consultar("SELECT * FROM `proyectos`");

?>


<!doctype html>
<html lang="en">
    
    <head>
        <title> ADMINISTRADOR PORTFOLIO - Fernando Burruso </title>
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
        <link rel="stylesheet" href="assets/css/responsive.css">
        <link rel="stylesheet" href="assets/css/styles.css">
              
    </head>
    <body class="dark-vertion black-bg">
        <!-- Start Loader -->
        <div class="section-loader">
            <div class="loader">
                <div></div>
                <div></div> 
            </div>
        </div>
      
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
                                    <a class="nav-link" href="#mh-alta">Alta</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#mh-modificacion">Modificación</a>
                                </li>                            
                                <li class="nav-item">
                                   <a class="nav-link" href="base/cerrar.php">Cerrar Sesión de usuario: <span><?php echo $_SESSION['usuario']; ?></span>  </a>                                    
                                </li>                                
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>

   
        
        <!--alta de proyectos -->
        <div class="container">
            <div class="row section-separator">
                <div class="col-sm-12 section-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <h1>GESTIÓN DE PROYECTOS</h1>
                </div> 
                <div id="mh-alta" class="col-sm-12 section-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <h3>Alta de proyecto</h3>
                </div>                
                <div class="col-sm-12 col-md-12 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                    <form action="index_admin.php" method="post" enctype="multipart/form-data" id="alta" class="single-form quate-form wow fadeInUp" data-toggle="validator">
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="row">
                            <div class="col-md-2 col-sm-0">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <input name="nombre" class="contact-name form-control" id="nombre" type="text" placeholder="Nombre del proyecto" required>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <input name="descripcion" class="contact-name form-control" id="descripcion" type="text" placeholder="Descripción del proyecto" required>
                            </div>
                        </div>
                        <div class="row">                        
                            <div class="col-md-2 col-sm-0">
                            </div>
                            <div class="col-md-8 col-sm-12">
                                <input name="direccion" class="contact-name form-control" id="direccion" type="text" placeholder="Sitio web del proyecto" required>
                            </div>
                        </div>
                        <div class="row mb-3">                        
                            <div class="col-md-2 col-sm-0">
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <label for="archivo">Imagen:</label>
                            </div>                                
                            <div class="col-md-6 col-sm-4">
                                <input required class="boton_imagen" type="file" name ="archivo" id="archivo">
                            </div>
                        </div>
                        <div class="row">
                            <!-- Subject Button -->
                            <div class="col-md-2 col-sm-0">
                            </div>
                            <div class="btn-form col-md-8 col-sm-12">
                                <button type="submit" class="btn btn-fill btn-block" id="form-submit">Cargar proyecto</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>  
        <!-- fin alta de proyectos -->

        <!-- modificacion proyectos -->        
        <div class="row d-flex justify-content-center mb-5">
            <div id="mh-modificacion" class="col-sm-12 section-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                <h3>Modificacion de proyecto</h3>
            </div> 
            <div class="col-md-10 col-sm-6">                
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                            <th>Cambiar Estado</th>
                            <th>Eliminar</th>
                            <th>Modificar</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php #leemos proyectos 1 por 1
                        foreach($proyectos as $proyecto){ ?>
                    
                        <tr >
                            <!--<td scope="row"><?php #echo $proyecto['id'];?></td> -->
                            <td><?php echo $proyecto['nombre'];?></td>                            
                            <td> <img width="200" src="http://drive.google.com/uc?export=view&id=<?php echo $proyecto['imagen'];?>" alt="">  </td>
                            <td class="texto"><?php echo $proyecto['descripcion'];?></td>
                            <td class="texto"><?php if ($proyecto['activo']) { echo 'Activo'; } else {echo 'Inactivo';}?></td>
                            <td><a name="cambiarEstado" id="estado" class="btn btn-info" href="?cambiarEstado=<?php echo $proyecto['id'];?>">Cambiar<br>Estado</a></td>
                            <td><a name="eliminar" id="eliminar" class="btn btn-danger" href="?borrar=<?php echo $proyecto['id'];?>">Eliminar</a></td>
                            <td><a name="modificar" id="modificar" class="btn btn-warning" href="?modificar=<?php echo $proyecto['id'];?>">Modificar</a></td>
                        </tr>

                        <?php #cerramos la llave del foreach
                        } ?>
                    </tbody>
                </table>
            </div><!--cierra el col-->  
        </div>
        <!-- fin modificacion proyectos -->


        
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

</body>

</html>