<?php
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

    $sql = "SELECT * FROM $tabla where id ='$id' ";

    $result = $conn->query($sql);

if($result -> num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        echo "
<html>
<body> 

<div align='center'> 
    <table border='0' width='600' style='font-family: Verdana; font-size: 8pt' id='table1'> 
        <tr> 
            <td colspan='2'><h3 align='center'>Borres los datos de la tabla</h3></td> 
        </tr> 
        <tr> 
            <td colspan='2'>En los campos del formulario puede ver los valores.</td> 
        </tr> 
        <form method='POST' action='borrar.php'> 
        <tr> 
            <td width='50%'>&nbsp;</td> 
            <td width='50%'>&nbsp;</td> 
        </tr> 
        <tr> 
            <td width='50%'><p align='center'><b>Titulo: </b></td> 
            <td width='50%'><p align='center'><input type='text' name='title' size='20' value='" . $row['title'] . "'  readonly='readonly'></td> 
        </tr> 
        <tr> 
            <td width='50%'><p align='center'><b>Descripcion:</b></td> 
            <td width='50%'><p align='center'><input type='text' name='post' size='20' value='" . $row['post'] . "' readonly='readonly'></td> 
        </tr> 
        <tr> 
            <td width='50%'>&nbsp;</td> 
            <td width='50%'>&nbsp;</td> 
        </tr> 
        <input type='hidden' name='id' value='$id'> 
        <tr> 
            <td width='100%' colspan='2'> 
            <p align='center'> 
            <input type='submit' value='Borrar Datos' name='B1'></td>
            <td><a href='javascript:history.go(-1)'>VOLVER_ATRÁS</a></td>
        </tr>
        </form> 
    </table> 
</div> 
";
    }
        }else {

        echo " 

 <p>El id que busca no pertenece a nadie</p></br>
  <td><a href='javascript:history.go(-1)'>VOLVER_ATRÁS</a></td>

</div> 
</body>
</html>
";

}
$conn->close();
?>
