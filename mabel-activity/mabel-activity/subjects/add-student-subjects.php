<?php

    require_once "../connection.php";
    $student_id = $_POST['student_id'];

    foreach ($_POST['subject_id'] as $subject ) {

        $sql = "INSERT INTO student_subjects (student_id, subject_id) VALUES($student_id, $subject)";
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
   
  