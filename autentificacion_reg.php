<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require('configuracion.php');
            function conectaBBDD(){

                $conexion_mysql = new mysqli($servidor, $usuario_mysql, $clave_mysql, $bd);
                $conexion_mysql -> query("SET NAMES UTF8");
                return $conexion_mysql;
            }

            $con = mysqli_connect($servidor, $usuario_mysql, $clave_mysql, $bd);
            if ( mysqli_connect_errno() ) {
            
                die ('Fallo al conectar a MySQL: ' . mysqli_connect_error());
            }
            
            if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
                    
                    die ('Complete el formulario de registro');
            }
            
            if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
                   
                    die ('Complete el formulario de registro');
            }
            
            if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
                    
                    $stmt->bind_param('s', $_POST['username']);
                    $stmt->execute();
                    $stmt->store_result();
                    
                    if ($stmt->num_rows > 0) {
                            
                            echo 'Este usuario ya existe, porfavor elija otro';
                    } else {
                           
                    }
                    $stmt->close();
            } else {
                    
                    echo 'No se pudo realizar el rigstro!';
            }
            //$con->close();
            if ($stmt = $con->prepare('INSERT INTO accounts (username, password, email) VALUES (?, ?, ?)')) {
                // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $stmt->bind_param('sss', $_POST['username'], $password, $_POST['email']);
                $stmt->execute();
                echo 'El usuario ha sido registrado correctamente';
            } else {
                    
                    echo 'No se pudo realizar el registro';
            }
?>
        
    </body>
</html>