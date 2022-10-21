
<?php
    //Includes the connection to the database
    include_once 'includes/dbh.inc.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
    //SQL anrop
    $sql = "SELECT * FROM users;";
    
    //Hämtar resultat från databasen med hjälp av conn(ection) och sql koden
    $result = mysqli_qurey($conn, $sql);

    //Kollar hur många rader outputen gav
    $resultCheck = mysqli_num_rows($result);

    //Kollar om antalet rader är fler än 0
    if ($resultCheck > 0) {

        // Skapar en array som vi loopar över och har outputen i
        while ($row = mysqli_fetch_assoc($result)) {
        
            //Skriver ut nicknamet från arrayn row
            echo $row['nickname'];
        }
    }
?>


</body>
</html>