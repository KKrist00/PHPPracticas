<!DOCTYPE html>
<html>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #1d2124;
        text-align: left;
        padding: 12px;
    }

    tr:nth-child(even) {
        background-color: #ffc107;
    }
</style>

        <h2 class="mb-0">Consulta Usuarios</h2>

    </br>

<body>

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

         echo "Conexion Error !!!";

} else {
                echo "Conexion Correcta !!!";
            }
            $conn->close();
            ?>


</body>

</html>