<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENTS</title>
</head>
<body>
<?php include_once "menu.php"; ?>
    <div>
    STUDENT: <?= $_GET['firstname'] . " " . $_GET['lastname']?> <br>
    YEAR LEVEL: <?= $_GET['year']?> <br>
    COURSE: <?= $_GET['course']?> <br>
    SEMESTER: <?= $_GET['semester']?> <br>
    CURRENT SUBJECTS: <br>
    <form action="subjects/delete-student-subjects.php" method="post">
        <br>
    <table border="1">
    <thead>
    <tr>
    <th>#</th>
    <th>SUBJECT CODE</th>
    <th>SUBJECT DESCRIPTION</th>
    </tr>
    </thead>
    <tbody>

    <?php
        include 'connection.php';
        $id  = $_GET['id'];
        $firstname  = $_GET['firstname'];
        $lastname  = $_GET['lastname'];
        $gender  = $_GET['gender'];
        $year  = $_GET['year'];
        $course  = $_GET['course'];
        $semester  = $_GET['semester'];
        $sql = "SELECT subjects.* FROM student_subjects LEFT JOIN subjects ON student_subjects.subject_id = subjects.id WHERE student_id = '$id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <tr>
                <input type="hidden" name="student_id" value="<?php echo $id ?>" >
                <th><input type="checkbox" name="subject_id[]" value="<?php echo $row['id'] ?> "></th>
                <th><?= $row["code"] ?></th>
                <th><?= $row["description"] ?></th>
                </tr>   
        <?php
            }
        }else{ ?>

            <h2 style='color: red;'>No results found.</h2>
        <?php
        }       
    ?>





    </tbody>
    </table>
    <br>
    
    <button>DELETE CHECKED SUBJECTS</button>

    </form>
    <br>
    <hr>
    <br>
    AVAILABLE SUBJECTS: 
    <br><br>
    <form action="add-student-subjects.php" method="post" >
    <table border="1">
    <thead>
    <tr>
    <th>#</th>
    <th>SUBJECT CODE</th>
    <th>SUBJECT DESCRIPTION</th>
    </tr>
    </thead>
    <tbody>


    <?php
        include 'connection.php';
        $id  = $_GET['id'];
        $year  = $_GET['year'];
        $course  = $_GET['course'];
        $semester  = $_GET['semester'];

        $sql = "SELECT * FROM subjects 
        WHERE year = '$year' && course = '$course' 
        && semester = '$semester' AND id 
        NOT IN (SELECT subject_id FROM student_subjects WHERE student_id = '$id')";
        $result = $conn->query($sql);

        if (mysqli_num_rows($result) > 0) 
        {
            while ($row = $result->fetch_assoc()) { ?>
                
                <tr>
                <input type="hidden" name="student_id" value="<?php echo $id ?>" >
                <th><input type="checkbox" name="subject_id[]"  value="<?php echo $row['id']; ?>"></th>
                
                <th><?= $row["code"] ?></th>
                <th><?= $row["description"] ?></th>
                </tr>   
            <?php
            }
        }else{ ?>

            <h2>NO RECORD FOUND</h2>

        <?php
        }       
    ?>
    



    </tbody>
 
    </table>

    <br><br>
    
    <button>ADD CHECKED SUBJECTS</button>
    </form>
    </div>
</body>
</html>