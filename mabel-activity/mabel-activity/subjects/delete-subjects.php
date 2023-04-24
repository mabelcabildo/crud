<?php

    require_once "../connection.php";
    if(isset($_POST))
    {
        $id = $_GET['id'];

        $sql = "DELETE FROM subjects WHERE id =  $id ";
        $result = $conn->query($sql);

        if($result)
        {
            header("Location: ../subjects.php");
        }else
        {
            die("opss! There's a problem!!");
        }
    }