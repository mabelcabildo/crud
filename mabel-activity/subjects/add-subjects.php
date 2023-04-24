<?php

    require_once "../connection.php";

    if(isset($_POST['add_subjects']))
    {
        $code = $_POST['code'];
        $description = $_POST['description'];
        $year= $_POST['year'];
        $course = $_POST['course'];
        $semester = $_POST['semester'];

        $sql = "INSERT INTO subjects(code, description, year, course, semester)
        VALUES('$code', '$description', '$year', '$course', '$semester')";
        $result = $conn->query($sql);

        if($result)
        {
            header("Location: ../subjects.php");
        }else
        {
            die("opss! There's a problem!!");
        }
    }

  