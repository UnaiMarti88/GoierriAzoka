<?php

$env = parse_ini_file(__DIR__ . '/../../../.env');

$APP_DIR = $env["APP_DIR"];

require_once($_SERVER["DOCUMENT_ROOT"] . $APP_DIR . '/src/views/parts/layouts/layoutTop.php'); //Aplikazioaren karpeta edozein lekutatik atzitzeko.

require_once(APP_DIR . '/src/views/parts/sidebar.php');

require_once(APP_DIR . '/src/views/parts/header.php');

?>  
    <center>
        <div id="resultadoConsulta">
            <h3>Hau da irabazlea:</h3>
        </div>
    
    
    <?php
    require_once(APP_DIR . '/src/php/connect.php');

    $conn = getConnection();
        
    $sql3 = "SELECT * FROM balorazioa WHERE zuzen_erantzun = 1 AND valid = 1 and teacher=0 ORDER BY RAND() LIMIT 1;";
    $result2 = $conn->query($sql3); //Nonbaitetik ekartzen badezu toki horretan close egin da aurrretik sartu teamsen
    
    if ($result2) {
        $row2 = $result2->fetch_assoc();

        $erabiltzaile_id = $row2['erabiltzaile_id'];

        $sql2 = "SELECT * FROM goierriAzoka.erabiltzaileak WHERE id =" . $erabiltzaile_id . "";

        if ($result = $conn->query($sql2)) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="course">';
                    echo '<a> ' . $row["email"] . '@goierrieskola.eus</a>';

                    echo '</div>';
                }
            } else {
                echo 'No se encontraron elementos en la base de datos.';
            }  

            $result->free(); // Liberar el conjunto de resultados
        } else {
            echo 'Error en la consulta: ' . $conn->error;
        }
    }
    


    // Cerrar la conexión
    $conn->close();
    ?>
    </center>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
require_once(APP_DIR . '/src//views/parts/layouts/layoutBottom.php');

?>