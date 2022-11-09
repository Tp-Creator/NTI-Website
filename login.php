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
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    

<h1>Hej! DU måste logga in!</h1>

<fieldset>
    <form name="login" method="post" onsubmit="return loginValidation()">

        Email: <br/> 
        <input class="normal" name="email"> <br/>

        Password: <br/> 
        <input class="normal" name="pwd"> <br/>

        <input type="submit" id="submit">

</form>
</fieldset>


</body>
</html>