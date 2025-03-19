<?php

require_once(APP_DIR . '/src/php/connect.php');

function getAllCourses()
{
    $conn = getConnection();
    $allCoursesSql = "select *
from zikloak z 
order by z.id asc;";
    $allCoursesResult = $conn->query($allCoursesSql);
    $conn->close();
    return $allCoursesResult;
}
function getAllAnswers()
{
    //Soilik baliozkoak direnak kontatuko dira
    $conn = getConnection();

    $sql = "select z.id as id, count(b.id) as dataColumn
    from zikloak z 
    inner join balorazioa b on z.id = b.ziklo_id 
    where b.valid = 1
    group by z.id
    order by z.id asc;";

    $result = $conn->query($sql);
    $array = fromQueryToArrayByZiklo($result, "dataColumn");
    $conn->close();
    return $array;

}
function getStudentAnswersArray()
{
    //Soilik baliozkoak direnak kontatuko dira
    $conn = getConnection();

    $sql = "select z.id as id, count(b.id) as dataColumn
    from zikloak z 
    inner join balorazioa b on z.id = b.ziklo_id 
    where b.valid = 1 and teacher = 0
    group by z.id
    order by z.id asc;";

    $result = $conn->query($sql);
    $array = fromQueryToArrayByZiklo($result, "dataColumn");
    $conn->close();
    return $array;

}
function getTeacherAnswersArray()
{
    //Soilik baliozkoak direnak kontatuko dira
    $conn = getConnection();

    $sql = "select z.id as id, count(b.id) as dataColumn
    from zikloak z 
    inner join balorazioa b on z.id = b.ziklo_id 
    where b.valid = 1 and teacher = 1
    group by z.id
    order by z.id asc;";

    $result = $conn->query($sql);
    $array = fromQueryToArrayByZiklo($result, "dataColumn");
    $conn->close();
    return $array;

}
function getCorrectAnswersArray()
{
    //Soilik baliozkoak direnak kontatuko dira
    $conn = getConnection();

    $correctAnswersSql = "select z.id as id, count(b.id) as correctAnswers
    from zikloak z 
    inner join balorazioa b on z.id = b.ziklo_id 
    where b.zuzen_erantzun = 1 and b.valid = 1
    group by z.id
    order by z.id asc;";

    $correctAnswersResult = $conn->query($correctAnswersSql);
    $correctAnswersArray = fromQueryToArrayByZiklo($correctAnswersResult, "correctAnswers");
    $conn->close();
    return $correctAnswersArray;
}

function getWrongAnswersArray()
{
    //Soilik baliozkoak direnak kontatuko dira
    $conn = getConnection();

    $sql = "select z.id as id, count(b.id) as data
    from zikloak z 
    inner join balorazioa b on z.id = b.ziklo_id 
    where b.zuzen_erantzun = 0 and b.valid = 1
    group by z.id
    order by z.id asc;";

    $result = $conn->query($sql);
    $array = fromQueryToArrayByZiklo($result, "data");
    $conn->close();
    return $array;
}
function getSumOfValoration()
{
    //Soilik baliozkoak direnak kontatuko dira
    $conn = getConnection();

    $sql = "select z.id as id, sum(b.balorazioa) as data
    from zikloak z 
    inner join balorazioa b on z.id = b.ziklo_id 
    where b.valid = 1
    group by z.id
    order by z.id asc;";

    $result = $conn->query($sql);
    $array = fromQueryToArrayByZiklo($result, "data");
    $conn->close();
    return $array;
}
function  getInvalidAnswers()
{
    $conn = getConnection();

    $sql = "select z.id as id, count(b.id) as data
    from zikloak z 
    inner join balorazioa b on z.id = b.ziklo_id 
    where b.valid = 0
    group by z.id
    order by z.id asc;";

    $result = $conn->query($sql);
    $array = fromQueryToArrayByZiklo($result, "data");
    $conn->close();
    return $array;
}


function fromQueryToArrayByZiklo($result, $valueColumn)
{
    $array = [];
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $array[$row["id"]] = $row[$valueColumn];
    }
    return $array;
}

