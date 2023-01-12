
<?php
    // Was displaying all of the users and thier ID in table and had a create new user form
    // That was able to add new users to the old database

    //Can still be used to see how we can use php and HTML toghether when we want to
    // display data from the db


    //Includes the connection to the database
    include_once 'includes/dbh.inc.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    
<?php
    //SQL anrop
    $sql = "SELECT * FROM users;";
    
    //Hämtar resultat från databasen med hjälp av conn(ection) och sql koden
    $result = mysqli_query($conn, $sql);

    //Kollar hur många rader outputen gav
    $numOfRows = mysqli_num_rows($result);

    ?> <table> <?php

    // Skapar en array som vi loopar över och har outputen i. assoc(iative) array
    while ($row = mysqli_fetch_assoc($result)) {
    
        //Skriver ut nicknamet från arrayn row
        ?>
            <tr>
                <td>
                    <p>
                    <?php echo $row['nickname']; ?>
                    </p>
                </td>

                <td>
                    <p>
                    <?php echo $row['id']; ?>
                    </p>
                </td>
                <td>
                    <button onclick="alert('<?php echo $row['id']; ?>');" >delete</button>
                    
                    <script>
                    //Skickar med variabeln id=2 till filen deleteUser.php                
                    //deleteUser.php?id=2
                    
                        //I filen kör man denna kod för att hämta ut variabelns värde.
                      //  $_GET['id']
                      //  För att tabort användaren med id:t från variablen
                      //  mysqli_query($conn, "DELETE FROM 'users' WHERE 'users'.'id' = " . $_GET['id']);

                    </script>

                </td>
            </tr> 
        <?php
    }

    ?> 
        
    </table> 
    <fieldset>
        <form action="createNewUser.php" method="post">
            Nickname: <br/> 
            <input class="normal" name="nickname"> <br/>

            Email: <br/> 
            <input class="normal" name="email"> <br/>

            Password: <br/> 
            <input class="normal" name="pwd"> <br/>

            About me: <br/> 
            <textarea type="textarea" name="bio" rows=5 cols=32> </textarea> <br/>

            <input type="submit" id="submit">

        </form>
        </fieldset>
    <?php

?>


</body>
</html>
