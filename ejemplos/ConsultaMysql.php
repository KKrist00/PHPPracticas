<section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
    <div class="my-auto">
        <h2 class="mb-0">Consulta a la tabla Usuarios</h2>
        </br>
        </br>

        <div class="subheading mb-5">

            <?php
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
            $conn->close();
            ?>
        </div>

    </div>
</section>

