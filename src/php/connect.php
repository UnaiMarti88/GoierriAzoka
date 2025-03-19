<?php

function getEnvVariables()
{
    // Asignar el resultado de parse_ini_file a la variable $env
    $env = parse_ini_file('C:/xampp/htdocs/ML/GoierriAzoka/.env');

    // Verificar si parse_ini_file falló al leer el archivo
    if ($env === false) {
        die("Error al cargar el archivo .env");
    }

    // Asignar las variables de entorno
    $servername = $env["SERVER_NAME"] ?? null;
    $dbName = $env["DB_NAME"] ?? null;
    $username = $env["USERNAME"] ?? null;
    $password = $env["PASSWORD"] ?? null;

    // Verificar si faltan algunas variables
    if (!$servername || !$dbName || !$username || !$password) {
        die("Faltan variables de entorno en el archivo .env");
    }

    return [
        $servername,
        $dbName,
        $username,
        $password
    ];
}


function getConnection(){
    
    $envArray = getEnvVariables();

    $servername = $envArray[0];
    $dbName = $envArray[1];
    $username = $envArray[2];
    $password = $envArray[3];

    $conn = new mysqli($servername, $username, $password, $dbName);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    return $conn;
}

function getZikloak()
{
    $conn = getConnection();

    $sql = "SELECT * FROM `8.entrega`.zikloak ORDER BY laburbildura ASC";
    $result = $conn->query($sql);

    if (!$result) {
        die("Error en la consulta: " . $conn->error);
    }

    return $result;
}

function getZikloa($id)
{
    $conn = getConnection();

    $sql = "SELECT * FROM `8.entrega`.zikloak WHERE id=".$id." ORDER BY laburbildura ASC";
    $result = $conn->query($sql);

    if (!$result) {
        die("Error en la consulta: " . $conn->error);
    }

    return $result;
}

function getUserIdByEmail($email)
{
    $conn = getConnection();

    $uname = getUsernameFromEmail($email);

    $sql = "SELECT id FROM `8.entrega`.erabiltzaileak WHERE email='".$uname."';";
    $result = $conn->query($sql);

    if (!$result) {
        die("Error en la consulta: " . $conn->error);
    }

    $conn->close();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["id"];
    }

    return null;
}

function getUsernameFromEmail($email){
    $regexp = '/@/';
    $split = preg_split($regexp, $email);
    return $split[0];
}

function checkIfAlreadyHasAnsweredCourse($courseId, $userId){

    $conn = getConnection();

    $sql = "SELECT id FROM `8.entrega`.balorazioa WHERE ziklo_id='".$courseId."' AND erabiltzaile_id='".$userId."';";
    $result = $conn->query($sql);

    if (!$result) {
        die("Error en la consulta: " . $conn->error);
    }

    $conn->close();

    if ($result->num_rows > 0) {
        return true;
    }

    return false;
}

function checkIfAnswerIsCorrect($answeredOption, $courseId){

    $conn = getConnection();

    $sql = "SELECT erantzun_zuzena FROM `8.entrega`.zikloak WHERE id='".$courseId."';";
    $result = $conn->query($sql);

    if (!$result) {
        die("Error en la consulta: " . $conn->error);
    }

    $conn->close();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $answeredOption == $row["erantzun_zuzena"] ? 1 : 0;
    }

    return 0;
}

function saveAnswerInDb($courseId, $userId, $valoration, $answerIsCorrect, $valid, $teacher){

    $conn = getConnection();

    $sql = "INSERT INTO `8.entrega`.balorazioa (id, ziklo_id, erabiltzaile_id, balorazioa, zuzen_erantzun, valid, teacher) VALUES (NULL, '".$courseId."','".$userId."','".$valoration."','".$answerIsCorrect."','".$valid."','".$teacher."')";
    $result = $conn->query($sql);

    if (!$result) {
        die("Error en la consulta: " . $conn->error);
    }

    $conn->close();

    return true;
}

function insertUserInDb($email){

    $conn = getConnection();

    $uname = getUsernameFromEmail($email);

    $sql = "INSERT INTO `8.entrega`.erabiltzaileak (email) VALUES ('".$uname."')";
    $result = $conn->query($sql);

    if (!$result) {
        die("Error en la consulta: " . $conn->error);
    }

    $conn->close();

    return getUserIdByEmail($email);
}

?>