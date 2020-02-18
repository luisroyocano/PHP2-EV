<?php
session_start();

$usuario = $_POST['username'];
$password1 = $_POST['password'];
require('configuracion.php');
function conectaBBDD(){
    
    $conexion_mysql = new mysqli($servidor, $usuario_mysql, $clave_mysql, $bd);
    $conexion_mysql -> query("SET NAMES UTF8");
    return $conexion_mysql;
}
$con = mysqli_connect($servidor, $usuario_mysql, $clave_mysql, $bd);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if ( $usuario == '' && $password1 =='' ) {
	// Could not get the data that should have been sent.
	//die ('Rellena el usuario y la contraseña');
    echo 'introduce usuario y contraseña';
}
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
    
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $password);
            $stmt->fetch();
            // Account exists, now we verify the password.
            // Note: remember to use password_hash in your registration file to store the hashed passwords.
           // ESTA ES LA FOMRA FINAL CON LA PASSWORD ENCRIPTADA:
            //usuario: prueba2 contraseña: 1234
             if (password_verify($_POST['password'], $password)) {
                //if ($_POST['password'] == $password) {
                    // Verification success! User has loggedin!
                    // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
                    session_regenerate_id();
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['name'] = $_POST['username'];
                    $_SESSION['id'] = $id;
                    echo 'Bienvenido ' . $_SESSION['name'] . '!';
                    header('Location: pag_principal.php');
	} else if($usuario != '') {
		echo 'Contraseña incorrecta!';
	}
        } else if($usuario != ''){
                echo 'Nombre de usuario incorrecto!';
        }
	$stmt->close();
}else
     {
    echo 'HOLA K ASE';
    echo "Falló la preparación: (" . $con->errno . ") " . $con->error;
}


?>
