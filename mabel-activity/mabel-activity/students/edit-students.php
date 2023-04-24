<?php

    require_once "../connection.php";

    if(isset($_POST['edit_student']))
    {
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $year = $_POST['year'];
        $course = $_POST['course'];
        $semester = $_POST['semester'];

   
        $sql = "UPDATE students SET firstname = '$firstname', lastname = '$lastname', gender = '$gender', year = '$year', course = '$course', semester = '$semester'
        WHERE id =  $id";
        $result = $conn->query($sql);
        if($result)
        {
            header("Location: ../students.php");
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
    <title>STUDENTS</title>
</head>
<body>

    <div id="menu" style="text-align: center; background-color: #ddd; padding: 30px;  border: 1px solid #ddd; margin-bottom: 30px;">
        <style>
        #menu a {
            margin: 34px;
        }
        </style>
        |
        <a href="../">HOME</a> |
        <a href="../students.php">STUDENTS</a> |
        <a href="../subjects.php">SUBJECTS</a> |
    </div>

    <form action="edit-students.php" method="post">
        <h1>ENTER STUDENT DETAILS</h1>
        <label for="">
            ENTER FIRST NAME:
            <input type="hidden" name="id" value="<?= $_GET['id']?>" required>
            <input type="text" name="firstname" value="<?= $_GET['firstname']?>" required>
        </label><br>
        <label for="">
            ENTER LAST NAME:
            <input type="text" name="lastname" value="<?= $_GET['lastname']?>" required>
        </label><br>
        <div>
            <label for="">GENDER: </label>
            <label for=""> <input type="radio" name="gender" id="" checked  <?php if($_GET['gender'] == 'Male') echo 'checked';?> Value="MALE">MALE</label>
            <label for=""> <input type="radio" name="gender" id="" <?php if($_GET['gender'] == 'Female') echo 'checked'; ?> Value="FEMALE">FEMALE</label>
        </div>
        <label for="">
            YEAR LEVEL: 
            <select name="year" id="">
                <option <?php if($_GET['year'] == '1ST YEAR'){ echo 'selected';} ?> value="1ST YEAR">1ST YEAR</option>
                <option <?php if($_GET['year'] == '2ND YEAR'){ echo 'selected';} ?> value="2ND YEAR">2ND YEAR</option>
                <option <?php if($_GET['year'] == '3RD YEAR'){ echo 'selected';} ?> value="3RD YEAR">3RD YEAR</option>
                <option <?php if($_GET['year'] == '4TH YEAR'){ echo 'selected';} ?> value="4TH YEAR">4TH YEAR</option>
            </select>
        </label><br>
        <label for="">
            COURSE: 
            <select name="course" id="">
                <option <?php if($_GET['course'] == 'BSIT'){ echo 'selected';} ?> value="BSIT">BSIT</option>
                <option <?php if($_GET['course'] == 'BSED'){ echo 'selected';} ?> value="BSED">BSED</option>
                <option <?php if($_GET['course'] == 'BSBA'){ echo 'selected';} ?> value="BSBA">BSBA</option>
                <option <?php if($_GET['course'] == 'BEED'){ echo 'selected';} ?> value="BEED">BEED</option>
            </select>
        </label><br>
        <label for="">
            SEMESTER: 
            <select name="semester" id="">
                <option <?php if($_GET['semester'] == '1ST'){ echo 'selected';} ?> value="1ST">1ST</option>
                <option <?php if($_GET['semester'] == '2ND'){ echo 'selected';} ?> value="2ND">2ND</option>
            </select>
        </label>
        <hr> <br>
        <button type="submit" name="edit_student">UPDATE</button>
        <br>
    </form>

    <br>
</body>
</html>