<section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
    <div class="my-auto">

        <h2 class="mb-0">Consulta con subtotales Alumnos </h2>

        <div class="subheading mb-5">


            <?php

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "shop";

            // Create connection

            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT g.id , g.nombre, a.nombre name, a.fecha
                       FROM grupos g inner join alumnos a  
                       on g.id = a.id_grupo 
                       ORDER BY g.id";

            $result = $conn->query($sql);

            function edad($fechanan) {

                $fecha = new DateTime($fechanan['fecha']);
                $tiempo = new DateTime();
                $ahora = $tiempo->diff($fecha)->y;
                return $ahora;
            }

            if ($result->num_rows > 0) {
                $rows=array();

                // output data of each row

                echo "<table border = 4>";
                $cat_ant="";
                $subtotal=0;
                $total=0;
                $contador=0;
                $primeraVez=true;
                $media = 0.0;

                while ($row = $result->fetch_assoc()) {

                    $rows[] =$row;
                    if ($primeraVez) {

                        $primeraVez = false;
                        $cat_ant = $row['nombre'];
                    }

                    if (($row['nombre'] != $cat_ant) ){

                        $cat_ant = $row['nombre'];
                        echo " <tr><td colspan='5'><td>subtotal </td><td>".$subtotal."</td></tr>";
                        $total+=$subtotal;
                        $subtotal=0;
                        $contador++;

                    }

                    //$primeraVez=false;
                    echo "<tr><td colspan='2'>".$row['name']."</td><td colspan= '2'>".edad($row)."</td><td colspan= '2'>".$row['nombre']."</td></tr>" ;
                    $subtotal += (int)edad($row);

                }

                echo " <tr><td colspan='5'><td>subtotal </td><td>".$subtotal."</td></tr>";
                $total+=$subtotal;
                echo " <tr><td colspan='6'>total </td><td>".$total."</td></tr>";
                $media = (float)$subtotal /(float)$contador ;
                echo " <tr><td colspan='6'>Media </td><td>".$media."</td></tr>";
                echo "</table>";

                $rows1=ksort($rows);

                // var_dump($rows1);
                //echo json_encode($rows);

            } else {

                echo "No hay registros";
            }

            $conn->close();
            ?>
            
        </div>


    </div>
</section>