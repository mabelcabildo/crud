<?php

    require_once "../connection.php";

    if(isset($_POST['edit_subjects']))
    {
        $id = $_GET['id'];
        $code = $_POST['code'];
        $description = $_POST['description'];
        $year = $_POST['year'];
        $course = $_POST['course'];
        $semester = $_POST['semester'];
        
        $sql = "UPDATE subjects SET code = '$code', description = '$description',  year = '$year', course = '$course', semester = '$semester'
        WHERE id =  $id";

        
        $result = $conn->query($sql);

        if($result)
        {
            header("Location: ../subjects.php");
        }else
        {
            die("opss! There's a problem!!");
        }
    }

?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBJECTS</title>
</head>
<body>
    <div id="menu" style="text-align: center; background-color: #ddd; padding: 30px;  border: 1px solid #ddd; margin-bottom: 30px;">
        <style>
        #menu a {
            margin: 35px;
        }
        </style>
        |
        <a href="../">HOME</a> |
        <a href="../students.php">STUDENTS</a> |
        <a href="../subjects.php">SUBJECTS</a> |
    </div>
    <form action="" method="post">

        <h1>ENTER SUBJECT DETAILS</h1>
        <label for="">
            ENTER SUBJECT CODE:
            <input type="text" name="code" value="<?= $_GET['code']?>" required>
        </label><br><br>
        <label for="">
            ENTER SUBJECT DESCRIPTION:
            <input type="text" name="description" value="<?= $_GET['description']?>" required>
        </label><br><br>
        <label for="">
            YEAR LEVEL: 
            <select name="year" id="">
                <option <?php if($_GET['year'] == '1ST YEAR'){ echo 'selected';} ?> value="1ST YEAR">1ST YEAR</option>
                <option <?php if($_GET['year'] == '2ND YEAR'){ echo 'selected';} ?> value="2ND YEAR">2ND YEAR</option>
                <option <?php if($_GET['year'] == '3RD YEAR'){ echo 'selected';} ?> value="3RD YEAR">3RD YEAR</option>
                <option <?php if($_GET['year'] == '4TH YEAR'){ echo 'selected';} ?> value="4TH YEAR">4TH YEAR</option>
            </select>
        </label><br> <br>
        <label for="">
            COURSE: 
            <select name="course" id="">
                <option <?php if($_GET['course'] == 'BSIT'){ echo 'selected';} ?> value="BSIT">BSIT</option>
                <option <?php if($_GET['course'] == 'BSED'){ echo 'selected';} ?> value="BSED">BSED</option>
                <option <?php if($_GET['course'] == 'BSBA'){ echo 'selected';} ?> value="BSBA">BSBA</option>
                <option <?php if($_GET['course'] == 'BEED'){ echo 'selected';} ?> value="BEED">BEED</option>
            </select>
        </label><br> <br>
        <label for="">
            SEMESTER: 
            <select name="semester" id="">
                <option <?php if($_GET['semester'] == '1ST'){ echo 'selected';} ?> value="1ST">1ST</option>
                <option <?php if($_GET['semester'] == '2ND'){ echo 'selected';} ?> value="2ND">2ND</option>
            </select>
        </label><hr>
        <button type="submit" name="edit_subjects">Submit</button>
    </form>   

    <br>
</body>
</html>

<a href="../subjects.php">BACK</a>