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
    <form action="students/add-students.php" method="post">
        <h1>ENTER STUDENT DETAILS</h1>
        <label for="">
            ENTER FIRST NAME:
            <input type="text" name="firstname" required>
        </label><br> <br>
        <label for="">
            ENTER LAST NAME:
            <input type="text" name="lastname" required>
        </label><br> <br>
        <div>
            <label for="">Male <input type="radio" name="gender" id=""  value="Male"></label>
            <label for="">Female <input type="radio" name="gender" id="" value="Female"></label>
        </div> <br>
        <label for="">
            YEAR LEVEL: 
            <select name="year" id="">
                <option value="1ST YEAR">1ST YEAR</option>
                <option value="2ND YEAR">2ND YEAR</option>
                <option value="3RD YEAR">3RD YEAR</option>
                <option value="4TH YEAR">4TH YEAR</option>
            </select>
        </label><br> <br>
        <label for="">
            COURSE: 
            <select name="course" id="">
                <option value="BSIT">BSIT</option>
                <option value="BSED">BSED</option>
                <option value="BSBA">BSBA</option>
                <option value="BEED">BEED</option>
            </select>
        </label><br> <br>
        <label for="">
            SEMESTER: 
            <select name="semester" id="">
                <option value="1ST">1ST</option>
                <option value="2ND">2ND</option>
            </select>
        </label>
        <hr> <br> <br>
        <button type="submit" name="add_student">Submit</button>
        <br>
    </form>

    <br>
    <div>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>STUDENT NAME</th>
                    <th>GENDER</th>
                    <th>YEAR</th>
                    <th>COURSE</th>
                    <th>SEMESTER</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
    <?php   
        include 'connection.php';
            $sql = "SELECT * FROM students";
            $result = $conn->query($sql);
            $number = 1;

            if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <th><?= $row["id"] ?></th>
                    <th><?= $row["firstname"] . " " . $row["lastname"] ?></th>
                    <th><?= $row["gender"] ?></th>
                    <th><?= $row["year"] ?></th>
                    <th><?= $row["course"] ?></th>
                    <th><?= $row["semester"] ?></th>
                    <th>
                        <a href="students/edit-students.php?id=<?= $row["id"]?>&firstname=<?=$row["firstname"]?>&lastname=<?=$row["lastname"]?>&gender=<?=$row["gender"]?>&year=<?=$row["year"]?>&course=<?=$row["course"]?>&semester=<?=$row["semester"]?>"><button>EDIT</button></a>
                        <a href="students/delete-students.php?id=<?= $row["id"] ?>"><button>DELETE</button></a>
                        <a href="student-subjects.php?id=<?= $row["id"]?>&firstname=<?=$row["firstname"]?>&lastname=<?=$row["lastname"]?>&gender=<?=$row["gender"]?>&year=<?=$row["year"]?>&course=<?=$row["course"]?>&semester=<?=$row["semester"]?>"><button>ADD SUBJECTS</button></a>
                            </th>
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
</div>
</body>
</html>