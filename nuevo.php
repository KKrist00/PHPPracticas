<html>

<head>
    <title>inserci&acuteo;n de datos.</title>
    <META name='robot' content='noindex, nofollow'>
</head>

<body>

<?php
// Actualizamos en funcion del id que recibimos

$id = $_POST['id'];
$titulo = $_POST['titles'];
$desc = $_POST['posts'];
$fecha = date("Y-m-d H:i:s");

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

$sql= "INSERT INTO ".$tabla." (id, title,post,created_at,updated_at) VALUES('$id','$titulo','$desc','$fecha','$fecha')";

$result = $conn->query($sql);

if($result){

    echo "<p>Los datos han sido actualizados con exito.</p> 
        
        <p><a href='javascript:history.go(-1)'>VOLVER ATRÁS</a></p> 
        
        <p><a href='javascript:history.go(-2)'>INICIO</a></p> 
        ";

} else {

    echo "<p>Los datos no han sido actualizados.</p> 
        
        <p><a href='javascript:history.go(-1)'>VOLVER ATRÁS</a></p> 
        
        <p><a href='javascript:history.go(-2)'>INICIO</a></p> 
        ";
}

$conn->close();

?>

</body>

</html>
