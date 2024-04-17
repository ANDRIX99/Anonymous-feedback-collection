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

    function printFeedback($conn) {
        $row = "";
        $query = "SELECT * FROM feedbackutenti ORDER BY 'datapubblicazione' DESC";
        if($row = mysqli_query($conn, $query)) {
            echo "<script>console.log( 'Query succefull.' );</script>";
        } else {
            echo "<script>console.log( 'Query error.' );</script>";
        }

        if(mysqli_num_rows($row) > 0) {
            while($line = mysqli_fetch_assoc($row)) {
                //var_dump($line);
                echo "
                    <div class='feedback-card'>
                        <p> ".  $line['classe'] . " </p>
                        <p id='feedback-text'> ".  $line['commento'] . " </p>
                    </div>
                ";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>anonimous feedback system</title>
        <style><?php include "style.css"; ?></style>
    </head>
    <body>
        <div class="form-container">
            <form method="GET" action="uptodb.php">
                <input type="number" name="class" min="1" max="5" placeholder="class" />
                <input type="text" name="feedback" placeholder="feedback" maxlength="255" />
                <input type="submit" />
            </form>
        </div>
        <div class="container">
            <?php printFeedback($conn); ?>
        </div>
    </body>
</html>