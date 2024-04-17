<?php 
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "feedback";
    $conn = "";

    if($conn = mysqli_connect($hostname, $username, $password, $database)) {
        echo "<script>console.log( 'Connect Successfully.' );</script>";
    } else {
        echo "<script>console.log( 'Connect error.' );</script>";        
    }

    $class = $_REQUEST['class'];
    $feedback = mysqli_real_escape_string($conn, $_REQUEST['feedback']);

    var_dump($feedback);

    $query = "INSERT INTO feedbackutenti (classe, commento) VALUES ('$class', '$feedback')";
    if(mysqli_query($conn, $query)) {
        header("Location: feedback.php?err=1");
        die();
    } else {
        header("Location: feedback.php?err=2");
        die();
    }
?>