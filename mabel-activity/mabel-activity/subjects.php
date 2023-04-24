<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBJECTS</title>
</head>
<body>
<?php include_once "menu.php"; ?>
    <form action="subjects/add-subjects.php" method="post">
        <h1>ENTER SUBJECT DETAILS</h1>
        <label for="">
            ENTER SUBJECT CODE:
            <input type="text" name="code" required>
        </label><br>
        <label for="">
            ENTER SUBJECT DESCRIPTION:
            <input type="text" name="description" required>
        </label><br>
        <label for="">
            YEAR LEVEL: 
            <select name="year" id="">
                <option value="1st year">1ST YEAR</option>
                <option value="2nd year">2ND YEAR</option>
                <option value="3rd year">3RD YEAR</option>
                <option value="4th year">4TH YEAR</option>
            </select>
        </label><br>
        <label for="">
            COURSE: 
            <select name="course" id="">
                <option value="BSIT">BSIT</option>
                <option value="BSED">BSED</option>
                <option value="BSBA">BSBA</option>
                <option value="BEED">BEED</option>
            </select>
        </label><br>
        <label for="">
            SEMESTER: 
            <select name="semester" id="">
                <option value="1ST">1ST</option>
                <option value="2ND">2ND</option>
            </select>
        </label><hr>
        <button type="submit" name="add_subjects">ADD SUBJECTS</button>
    </form>  
    <br>
    <div>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>SUBJECT CODE</th>
                    <th>SUBJECT DESCRIPTION</th>
                    <th>YEAR</th>
                    <th>COURSE</th>
                    <th>SEMESTER</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
    <?php   
        include 'connection.php';
            $sql = "SELECT * FROM subjects";
            $result = $conn->query($sql);
            $number = 1;
            if ($result->num_rows > 0)  {
            while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <th><?= $number++; ?></th>
                    <th><?= $row["code"]; ?></th>
                    <th><?= $row["description"];?></th>
                    <th><?= $row["year"]; ?></th>
                    <th><?= $row["course"]; ?></th>
                    <th><?= $row["semester"]; ?></th>
                            <th>
                                <a href="subjects/edit-subjects.php?id=<?= $row["id"]?>&code=<?=$row["code"]?>&description=<?=$row["description"]?>&year=<?=$row["year"]?>&course=<?=$row["course"]?>&semester=<?=$row["semester"]?>"><button>EDIT</button></a>
                                <a href="subjects/delete-subjects.php?id=<?= $row["id"] ?>"><button>DELETE</button></a>
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