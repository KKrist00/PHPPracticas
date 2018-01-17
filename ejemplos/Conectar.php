<!DOCTYPE html>
<html>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";
$tabla = "users";

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM $tabla";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row

    while ($row = $result->fetch_assoc()) {

      echo"<ul>";


    ?>

        <input type='hidden' name='id' value='".$row["id"]."'>

   <input type='submit' value='Eliminar'></center></td><td></ul></table>

        <?php

        if (isset($_POST["id"])) {

            $id = $_POST["id"];

            $consulta = "DELETE FROM users WHERE id=$id";

        }

    }
}

    $conn->close();
?>

</body>
</html>