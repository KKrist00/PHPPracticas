

    <?php

    function datos(){

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

            $sql = "SELECT * FROM $tabla";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                $row = $result->fetch_assoc();

                echo "<table border =1>";

                echo "<thead>";

                foreach ($row as $k => $v)

                    echo  "<th>".$k ."</th>" ;

                echo "</thead>";

                do {
                    echo  "<tr>";

                    foreach ($row as $k => $v)

                        echo  "<td>".$v ."</td>" ;

                    echo  "</tr>";

                }

                while ($row = $result->fetch_assoc());

                echo "</table>";

            } else {
                echo "No hay registros";
            }
    }
            $conn->close();
            ?>

