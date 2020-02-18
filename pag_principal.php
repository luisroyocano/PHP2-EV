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
             
             setcookie("precio1080",450); 
             setcookie("precio1080ti",650); 
             setcookie("precio2080ti",900); 
        ?>
         <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Bienvenido <?php echo $_SESSION['name'];?>!</h1>
             
            </div>
          </div>
        
        <div id="pagina" class="container-fluid">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                <br>  <br>  <br>  <br>
            <div class="jumbotron">
                <h1 class="display-4">Seleccione:</h1>
               
                <hr class="my-4">
                <div class="form-group">
                
                
                    <form action="carrito.php" method="post">
                  <div class="form-group" >
                      <label>GTX 1080</label>
                      <br>
                      <img src="imagenes/1080.jpg">
                      <br>
                      <label><?php echo $_COOKIE['precio1080'] ?>$</label>
                     
                     <input type="number" class="form-control" placeholder="¿Cuántas Quieres?" id="username" name="cantidad1080">
                  </div>
                    <br>
                    <br>
                    <div class="form-group" >
                      <label>GTX 1080ti</label>
                      <br>
                      <img src="imagenes/1080ti.jpg">
                      <br>
                      <label><?php echo $_COOKIE['precio1080ti'] ?>$</label>
                     
                     <input type="number" class="form-control" placeholder="¿Cuántas Quieres?" id="username" name="cantidad1080ti">
                  </div>
                    <br>
                    <br>
                    <div class="form-group" >
                      <label>GTX 2080ti</label>
                      <br>
                      <img src="imagenes/2080ti.jpg">
                      <br>
                      <label><?php echo $_COOKIE['precio2080ti'] ?>$</label>
                     
                     <input type="number" class="form-control" placeholder="¿Cuántas Quieres?" id="username" name="cantidad2080ti">
                  </div>
                  
                  <button type="submit" class="btn btn-black" id="entrar">Añadir al carrito</button>
                  
               </form>
              
            
              </div>
             <script src="js/bootstrap.min.js" type="text/javascript"></script>
             <script src="js/jquery-1.12.0.min.js" type="text/javascript"></script>
    </body>
</html>
