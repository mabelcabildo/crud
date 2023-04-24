<?php

    require_once "../connection.php";
    $student_id = $_POST['student_id'];

    foreach ($_POST['subject_id'] as $subject ) {

        $sql = "DELETE FROM student_subjects WHERE student_id =  $student_id AND subject_id ='$subject' ";
        $result = $conn->query($sql);

    }
    if($result)
    {
        header("Location: ../students.php");
    }else
    {
        die("opss! There's a problem!!");
    }
    

    ?>