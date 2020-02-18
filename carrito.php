<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
     <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <style>
            .jumbotron{
                background-color: #f5f5f5;
                opacity: 0.8;
            }
            body {
                 background-size: 100%;
               
              }
             
            
        </style>
    </head>
    <body background="imagenes/coche.jpg" margin="100">
        
        <?php
             session_start();
            
             $precioTotal1080 = ($_POST['cantidad1080'] * $_COOKIE['precio1080']);
             $precioTotal1080ti = ($_POST['cantidad1080ti'] * $_COOKIE['precio1080ti']);
             $precioTotal2080ti = ($_POST['cantidad2080ti'] * $_COOKIE['precio2080ti']);
             $preciototal = $precioTotal1080 + $precioTotal1080ti + $precioTotal2080ti;
             
        ?>
         <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Bienvenido al carrito <?php echo $_SESSION['name'];?>!</h1>
             
            </div>
          </div>
        
        <div id="pagina" class="container-fluid">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                <br>  <br>  <br>  <br>
            <div class="jumbotron">
                <h1 class="display-4">Su selección de productos:</h1>
               
                <hr class="my-4">
                <div class="form-group">
                
                
                    
                  <div class="form-group" >
                      <label>Usted quiere comprar <?php echo $_POST['cantidad1080']?> GTX 1080 por un precio total de <?php echo $precioTotal1080 ?>$</label>
                      <br>
                      <img src="imagenes/1080.jpg">
                  </div>
                    <br>
                    <br>
                    <div class="form-group" >
                      <label>Usted quiere comprar <?php echo $_POST['cantidad1080ti']?> GTX 1080ti por un precio total de <?php echo $precioTotal1080ti ?>$</label>
                      <br>
                      <img src="imagenes/1080ti.jpg">  
                  </div>
                    <br>
                    <br>
                    <div class="form-group" >
                      <label>Usted quiere comprar <?php echo $_POST['cantidad2080ti']?> GTX 2080ti por un precio total de <?php echo $precioTotal2080ti ?>$</label>
                      <br>
                      <img src="imagenes/2080ti.jpg">
                  </div>
                    <br>
                    <br>
                    <div class="form-group" >
                      <label>El total de su compra asciende a <?php echo $preciototal?>$</label>
                  </div>
                    
                  
                  
                  
               
              
            
              </div>
             <script src="js/bootstrap.min.js" type="text/javascript"></script>
             <script src="js/jquery-1.12.0.min.js" type="text/javascript"></script>
    </body>
</html>