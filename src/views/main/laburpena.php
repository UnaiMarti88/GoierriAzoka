<?php

$env = parse_ini_file(__DIR__ . '/../../../.env');

$APP_DIR = $env["APP_DIR"];

require_once($_SERVER["DOCUMENT_ROOT"] . $APP_DIR . '/src/views/parts/layouts/layoutTop.php'); //Aplikazioaren karpeta edozein lekutatik atzitzeko.

require_once(APP_DIR . '/src/views/parts/sidebar.php');

require_once(APP_DIR . '/src/views/parts/header.php');

?>
<div class="laburpenaDiv">
<table>
    <tr>
        <th>Kurtsoa</th>
        <th>Erantzun kop.</th>
        <th>Ikasleak</th>
        <th>Irakasleak</th>
        <th>Erantzun zuzen kop.</th>
        <th>Erantzun oker kop.</th>
        <th>Balorazio batazbestekoa (5etik)</th>
        <th>Baliogabekoak</th>
    </tr>
    <?php

    
    require_once("./laburpena/functions.php");

    $allCoursesResult = getAllCourses();

    //Erantzun kopurua
    $allAnswersArray = getAllAnswers();

    //Ikasle erantzun kopurua
    $studentAnswersArray = getStudentAnswersArray();

    //Irakasle erantzun kopurua
    $teacherAnswersArray = getTeacherAnswersArray();

    //Erantzun zuzen kopurua
    $correctAnswersArray = getCorrectAnswersArray();

    //Erantzun oker kopurua
    $wrongAnswersArray = getWrongAnswersArray();

    //Balorazio guztien batura
    $sumOfValorations = getSumOfValoration();

    //Baliogabeko erantzunak
    $invalidAnswers = getInvalidAnswers();

    while($allCoursesRow = $allCoursesResult->fetch_array(MYSQLI_ASSOC))
    {
        $i = $allCoursesRow["id"];
        $valoration = 0;
        if(isset($allAnswersArray[$i]) && isset($sumOfValorations[$i])){
            $valoration = round($sumOfValorations[$i]/$allAnswersArray[$i], 2);
        }

        echo "<tr>";
        echo "<td>";
        echo $allCoursesRow["izena"];
        echo "</td>";
        echo "<td>";
        echo isset($allAnswersArray[$i]) ? $allAnswersArray[$i] : "0";
        echo "</td>";
        echo "<td>";
        echo isset($studentAnswersArray[$i]) ? $studentAnswersArray[$i] : "0";
        echo "</td>";
        echo "<td>";
        echo isset($teacherAnswersArray[$i]) ? $teacherAnswersArray[$i] : "0";
        echo "</td>";
        echo "<td>";
        echo isset($correctAnswersArray[$i]) ? $correctAnswersArray[$i] : "0";
        echo "</td>";
        echo "<td>";
        echo isset($wrongAnswersArray[$i]) ? $wrongAnswersArray[$i] : "0";
        echo "</td>";
        echo "<td>";
        echo $valoration;
        echo "</td>";
        echo "<td>";
        echo isset($invalidAnswers[$i]) ? $invalidAnswers[$i] : "0";
        echo "</td>";
        echo "</tr>";
    }


    ?>

</table>
    
    </div>

<?php


require_once(APP_DIR . '/src//views/parts/layouts/layoutBottom.php');

?>