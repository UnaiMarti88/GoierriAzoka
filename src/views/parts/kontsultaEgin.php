<?php
require_once(APP_DIR . '/src/php/connect.php');

$sql = "SELECT * FROM goierriAzoka.erabiltzaileak WHERE id = 2";

if ($result = $conn->query($sql)) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="course">';
            echo '<p>' . $row["izena"] . " - " . $row["laburbildura"] . '</p>';
            echo '<a href="#">' . $row["email"] . '</a>';
            echo '</div>';
        }
    } else {
        echo 'No se encontraron elementos en la base de datos.';
    }

    $result->free(); // Liberar el conjunto de resultados
} else {
    echo 'Error en la consulta: ' . $conn->error;
}

$conn->close(); // Cerrar la conexión
