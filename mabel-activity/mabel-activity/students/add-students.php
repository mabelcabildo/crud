<?php

    require_once "../connection.php";

    if(isset($_POST['add_student']))
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $year = $_POST['year'];
        $course = $_POST['course'];
        $semester = $_POST['semester'];

        $sql = "INSERT INTO students(firstname, lastname, gender, year, course, semester)
        VALUES('$firstname', '$lastname', '$gender', '$year', '$course', '$semester')";
        $result = $conn->query($sql);

        if($result)
        {
            header("Location: ../students.php");
        }else
        {
            die("opss! There's a problem!!");
        }
    }