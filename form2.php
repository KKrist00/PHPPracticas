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
            <td colspan='2'><h3 align='center'>Actualice los datos que considere,si el Id esta vacio, lo puede crear</h3></td> 
        </tr> 
        <tr> 
            <td colspan='2'>En los campos del formulario puede ver los valores.</td> 
        </tr> 
        <form method='POST' action='actualiza.php'> 
        <tr> 
            <td width='50%'>&nbsp;</td> 
            <td width='50%'>&nbsp;</td> 
        </tr> 
        <tr> 
            <td width='50%'><p align='center'><b>Titulo: </b></td> 
            <td width='50%'><p align='center'><input type='text' name='title' size='20' value='" . $row['title'] . "'></td> 
        </tr> 
        <tr> 
            <td width='50%'><p align='center'><b>Descripcion:</b></td> 
            <td width='50%'><p align='center'><input type='text' name='post' size='20' value='" . $row['post'] . "'></td> 
        </tr> 
        <tr> 
            <td width='50%'>&nbsp;</td> 
            <td width='50%'>&nbsp;</td> 
        </tr> 
        <input type='hidden' name='id' value='$id'> 
        <tr> 
            <td width='100%' colspan='2'> 
            <p align='center'> 
            <input type='submit' value='Actualizar datos' name='B1'></td>
            <td><a href='javascript:history.go(-1)'>VOLVER_ATRÁS</a></td>
        </tr>
        </form> 
    </table> 
</div> 
";
    }
        }else {

        echo " 

 <p>El Id no pertenece a nadie introduzca los datos para crearlo</p></br>
        
<div align='center'> 
    <table border='0' width='600' style='font-family: Verdana; font-size: 8pt' id='table1'> 
        <tr> 
            <td colspan='2'><h3 align='center'>Cree los datos que necesite...</h3></td> 
        </tr> 
        <tr> 
            <td colspan='2'>En los campos del formulario puede introducir los valores.</td> 
        </tr> 
        <form method='POST' action='nuevo.php'> 
        <tr> 
            <td width='50%'>&nbsp;</td> 
            <td width='50%'>&nbsp;</td> 
        </tr> 
        <tr> 
            <td width='50%'><p align='center'><b>Titulo: </b></td> 
           <td width='50%'><p align='center'><input type='text' name='titles' size='20'></td>
        </tr> 
        <tr> 
            <td width='50%'><p align='center'><b>Descripcion:</b></td> 
            <td width='50%'><p align='center'><input type='text' name='posts' size='20'></td> 
        </tr> 
        <tr> 
            <td width='50%'>&nbsp;</td> 
            <td width='50%'>&nbsp;</td> 
        </tr> 
        <input type='hidden' name='id' value='$id'> 
        <tr> 
            <td width='100%' colspan='2'> 
            <p align='center'> 
            <input type='submit' value='Nuevos datos' name='B2'></td>
            <td><a href='javascript:history.go(-1)'>VOLVER_ATRÁS</a></td>
        </tr>
        </form> 
    </table> 
</div> 
</body>
</html>
";

}
$conn->close();
?>
