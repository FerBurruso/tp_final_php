<?php include 'base/conexion.php';
ob_start(); #esto evita los errores de envios de headers
set_error_handler("var_dump");
session_start(); #inicializamos variables de sesion
#si esta logueado lo dejo trabajar y sino lo mando al login de nuevo 
if ( isset( $_SESSION['usuario'] )!='Admin'){
   header("location:base/login.php");
   die();
} if($_GET){
    if(isset($_GET['modificar'])){
        $id = $_GET['modificar'];
       
        $_SESSION['id_proyecto'] = $id;
        #vamos a consultar para llenar la tabla 
        $conexion = new conexion();
        $proyecto= $conexion->consultar("SELECT * FROM `proyectos` where id=".$id);
     
    }
}

if($_POST){
    $id = $_SESSION['id_proyecto'];
    #debemos recuperar la imagen actual y borrarla del servidor para lugar pisar con la nueva imagen en el server y en la base de datos
    #recuperamos la imagen de la base antes de borrar
    $conexion = new conexion(); 
    #levantamos los datos del formulario
    $nombre_proyecto = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $direccion= $_POST['direccion'];
   
    /*manejo de la imagen*/ 
    #nombre de la imagen
    $imagen = $_FILES['archivo']['name'];

    if ($imagen == "") { 
        /*si no seleccionó ninguna imagen no actualizo*/
        $sql = "UPDATE `proyectos` SET `nombre` = '$nombre_proyecto', `descripcion` = '$descripcion', `direccion` = '$direccion' WHERE `proyectos`.`id` = '$id';";

    }
    else
    {
        $imagen = $conexion->consultar("select imagen FROM  `proyectos` where id=".$id);
        #la borramos de la carpeta 
        unlink("imagenes/".$imagen[0]['imagen']);
        #tenemos que guardar la imagen en una carpeta 
        $imagen_temporal=$_FILES['archivo']['tmp_name'];
        #creamos una variable fecha para concatenar al nombre de la imagen, para que cada imagen sea distinta y no se pisen 
        $fecha = new DateTime();
        $imagen= $fecha->getTimestamp()."_".$imagen;
        move_uploaded_file($imagen_temporal,"imagenes/".$imagen);
        #creo una instancia(objeto) de la clase de conexion
        $sql = "UPDATE `proyectos` SET `nombre` = '$nombre_proyecto' , `imagen` = '$imagen', `descripcion` = '$descripcion', `direccion` = '$direccion' WHERE `proyectos`.`id` = '$id';";
    }

    $id_proyecto = $conexion->ejecutar($sql);

    header("location:index.php");
    die();
}

?>

<!doctype html>
<html lang="es">
    
    <head>
        <title> MODIFCAR PROYECTO - Fernando Burruso </title>
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
        <?php #leemos proyectos 1 por 1
          foreach($proyecto as $fila){ ?>
           <!--modificacion de proyectos -->
        <div class="container">
            <div class="row section-separator">               
                <div class="col-sm-12 col-md-12 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                <div class="col-sm-12 section-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <h1>MODIFICACIÓN DE PROYECTOS</h1>
                </div> 
                <form action="modificar.php" method="post" enctype="multipart/form-data" id="alta" class="single-form quate-form wow fadeInUp" data-toggle="validator">
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="row">
                            <div class="col-md-2 col-sm-0">
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label for="nombre">Nombre:</label>
                                <input name="nombre" class="contact-name form-control" id="nombre" type="text" placeholder="Nombre del proyecto" value="<?php echo $fila['nombre']; ?>" required>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label for="nombre">Descripcion</label>
                                <input name="descripcion" class="contact-name form-control" id="descripcion" type="text" placeholder="Descripción del proyecto" value="<?php echo $fila['descripcion']; ?>" required>
                            </div>
                        </div>
                        <div class="row">                        
                            <div class="col-md-2 col-sm-0">
                            </div>
                            <div class="col-md-8 col-sm-12">
                                <label for="nombre">Sitio</label>
                                <input name="direccion" class="contact-name form-control" id="direccion" type="text" placeholder="Sitio web del proyecto" value="<?php echo $fila['direccion']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">                        
                            <div class="col-md-2 col-sm-0">
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <label for="archivo">Imagen:</label>
                            </div>                                
                            <div class="col-md-6 col-sm-4">
                                <input class="boton_imagen" type="file" name ="archivo" id="archivo">
                            </div>
                        </div>
                        <div class="row">
                            <!-- Subject Button -->
                            <div class="col-md-2 col-sm-0">
                            </div>
                            <div class="btn-form col-md-8 col-sm-12">
                                <button type="submit" class="btn btn-fill btn-block" id="form-submit">Modificar proyecto</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>  
        <!-- fin modificacion de proyectos -->
        <?php #cerramos la llave del foreach
                        } ?>
   
    </body>
</html>


