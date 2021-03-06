<?php
require "functions.php";
if (isLoggedIn()) {
    //get all the required variables from POST request.
    $dbname = $_POST["dbname"];
    if ($dbname == "pageDB") $dbname = pagesDB; //this is so I don't have to put the actual db name into the js
    $tableName = $_POST["tableName"];
    $column = $_POST["column"];
    $value = $_POST["value"];
    $id = $_POST["id"];
    $content = $_POST["content"];
    $mysqli = new mysqli(servername, username, password, $dbname); // connect to database
    if (mysqli_connect_errno()) { //if error occurs
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    if ($stmt = $mysqli->prepare("set define off; Begin UPDATE $tableName SET $column = ? WHERE $id = $value; End;")) {  // this is a prepared statement that prevents from SQL injection issues, and also allows me to have whatever symbols I want in my articles
        $stmt->bind_param("s", $content); // binds content to the query where there are ?s the "s" tells it that it's a string. for multiple values just add more.. for three string variables make it bind_params("sss", v1, v2, v3)
        $stmt->execute();
        $stmt->fetch();
        $stmt->close();
    }
    echo "Page Edited!";
    $mysqli->close();
}
?>
