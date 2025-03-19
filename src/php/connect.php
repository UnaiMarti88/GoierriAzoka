<?php

function getEnvVariables()
{
    $env = parse_ini_file(APP_DIR . '/.env');

    $servername = $env["SERVER_NAME"];
    $dbName = $env["DB_NAME"];
    $username = $env["USERNAME"];
    $password = $env["PASSWORD"];

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
    return $conn;
}

function getZikloak()
{
    $envArray = getEnvVariables();

    $servername = $envArray[0];
    $dbName = $envArray[1];
    $username = $envArray[2];
    $password = $envArray[3];

    $conn = new mysqli($servername, $username, $password, $dbName);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM " . $dbName . ".zikloak ORDER BY laburbildura ASC";
    $result = $conn->query($sql);

    return $result;
}
function getZikloa($id)
{
    $envArray = getEnvVariables();

    $servername = $envArray[0];
    $dbName = $envArray[1];
    $username = $envArray[2];
    $password = $envArray[3];

    $conn = new mysqli($servername, $username, $password, $dbName);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM " . $dbName . ".zikloak WHERE id=".$id." ORDER BY laburbildura ASC";

    $result = $conn->query($sql);

    return $result;
}

function getUserIdByEmail($email)
{

    $envArray = getEnvVariables();

    $servername = $envArray[0];
    $dbName = $envArray[1];
    $username = $envArray[2];
    $password = $envArray[3];

    $conn = new mysqli($servername, $username, $password, $dbName);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $uname = getUsernameFromEmail($email);

    $sql = "SELECT id FROM " . $dbName . ".erabiltzaileak WHERE email='".$uname."';";

    $result = $conn->query($sql);

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

    $envArray = getEnvVariables();

    $servername = $envArray[0];
    $dbName = $envArray[1];
    $username = $envArray[2];
    $password = $envArray[3];

    $conn = new mysqli($servername, $username, $password, $dbName);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "SELECT id FROM " . $dbName . ".balorazioa WHERE ziklo_id='".$courseId."' AND erabiltzaile_id='".$userId."';";

    $result = $conn->query($sql);

    $conn->close();

    if ($result->num_rows > 0) {
        return true;
    }

    return false;

}


function checkIfAnswerIsCorrect($answeredOption, $courseId){

    $envArray = getEnvVariables();

    $servername = $envArray[0];
    $dbName = $envArray[1];
    $username = $envArray[2];
    $password = $envArray[3];

    $conn = new mysqli($servername, $username, $password, $dbName);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "SELECT erantzun_zuzena FROM " . $dbName . ".zikloak WHERE id='".$courseId."';";

    $result = $conn->query($sql);

    $conn->close();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $answeredOption == $row["erantzun_zuzena"] ? 1 : 0;
    }

    return 0;

}
function saveAnswerInDb($courseId, $userId, $valoration, $answerIsCorrect, $valid, $teacher){

    $envArray = getEnvVariables();

    $servername = $envArray[0];
    $dbName = $envArray[1];
    $username = $envArray[2];
    $password = $envArray[3];

    $conn = new mysqli($servername, $username, $password, $dbName);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "INSERT INTO balorazioa (id, ziklo_id, erabiltzaile_id, balorazioa, zuzen_erantzun, valid, teacher) VALUES (NULL, '".$courseId."','".$userId."','".$valoration."','".$answerIsCorrect."','".$valid."','".$teacher."')";

    $result = $conn->query($sql);

    $conn->close();

    return true;

}

function insertUserInDb($email){

    $envArray = getEnvVariables();

    $servername = $envArray[0];
    $dbName = $envArray[1];
    $username = $envArray[2];
    $password = $envArray[3];

    $conn = new mysqli($servername, $username, $password, $dbName);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $uname = getUsernameFromEmail($email);

    $sql = "INSERT INTO erabiltzaileak (email) VALUES ('".$uname."')";

    $result = $conn->query($sql);

    $conn->close();

    return getUserIdByEmail($email);

}


?>
