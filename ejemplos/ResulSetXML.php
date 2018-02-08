<section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
    <div class="my-auto">
        <h1 class="mb-0">Consulta a la tabla libros

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
            $sql = "SELECT * FROM books ORDER BY category_id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $rows = array();
                // output data of each row
                echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                    echo "<li> ";
                    foreach ($row as $k => $v)
                        echo $k . "=>" . $v.", ";
                    echo "</li> ";
                }
                echo "</ul>";
                //var_dump($rows);
                //echo json_encode($rows);
            } else {
                echo "No hay registros";
            }
            $conn->close();
            ?>
        </div>


    </div>
</section>