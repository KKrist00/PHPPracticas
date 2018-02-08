<section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
    <div class="my-auto">
        <h1 class="mb-0">Consulta con subtotales

        </h1>
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

            $sql = "SELECT c.category_name cat , b.title titulo , b.price precio
                       FROM books b inner join categories c  
                       on b.category_id = c.category_id 
                       ORDER BY b.category_id";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $rows=array();

                // output data of each row

                echo "<table>";
                $cat_ant="";
                $subtotal=0;
                $total=0;
                $contador=0;
                $primeraVez=true;

                while ($row = $result->fetch_assoc()) {

                    $rows[] =$row;
                    if ($primeraVez) {

                        $primeraVez = false;
                        $cat_ant = $row['cat'];
                    }

                    if (($row['cat'] != $cat_ant) ){

                        $cat_ant = $row['cat'];
                        echo " <tr><td colspan='2'>subtotal </td><td>".$subtotal."</td></tr>";
                        $total+=$subtotal;
                        $subtotal=0;
                    }

                    //$primeraVez=false;
                    echo "<tr><td>".$row['cat']."</td><td>".$row['titulo']."</td><td>".$row['precio']."</td></tr>" ;
                    $subtotal += (float)$row['precio'];
                }

                echo " <tr><td colspan='2'>subtotal </td><td>".$subtotal."</td></tr>";
                $total+=$subtotal;
                echo " <tr><td colspan='2'>total </td><td>".$total."</td></tr>";
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