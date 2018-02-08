
<html>

<head>
    <title>Borrado.</title>
    <META name='robot' content='noindex, nofollow'>
</head>

<body>

<?php
// Actualizamos en funcion del id que recibimos

$id = $_POST['id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";
$tabla = "cruds";

// Crear conexion

$conn = new mysqli($servername, $username, $password, $dbname);
// Chequear conexion

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql= "DELETE from $tabla where id='".$id."'";;

$result = $conn->query($sql);

        if($result){

            echo "<p>Los datos han sido Borrados con exito.</p> 
        
        <p><a href='javascript:history.go(-1)'>VOLVER ATRÁS</a></p> 
        
        <p><a href='javascript:history.go(-2)'>INICIO</a></p> 
        ";

        } else {

            echo "<p>Los datos no han sido borrados.</p> 
        
        <p><a href='javascript:history.go(-1)'>VOLVER ATRÁS</a></p> 
        
        <p><a href='javascript:history.go(-2)'>INICIO</a></p> 
        ";
        }

$conn->close();

?>

</body>

</html>
