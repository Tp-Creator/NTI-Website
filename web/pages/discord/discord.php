<?php
require_once('includes/dbh.func/general/dbh.inc.php');
require_once('includes/dbh.func/account/dbh.usr.php');


console_log($_SERVER);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Discord</title>
</head>
<body>

    <style>

        * {
            padding: 0;
            margin: 0;
        }

        .content{
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            background-color: rgb(30, 30, 30);
        }

        h1 {
            margin: 30px;
            color: white;
        }

        h3{
            position: relative;
            top:0;
            left:0;
            cursor: pointer;
            padding: 20px;
            border-radius: 20px;
            /* border: 2px solid pink; */
            background-color: pink;
            color: black;
            max-width: 80%;
            margin-bottom: 30px;
            transition: all .1s;
        }

        h3:hover{
            position: relative;
            top: -5;
            left: -5;
            box-shadow: 5px 5px red;
        }

        h3:active{
            top:-2;
            left:-2;
            box-shadow: 2px 2px red;
            background-color: rgb(255, 134, 154);
        }

        .copied{
            display: none;
            padding: 15px;
            border-radius: 15px;
            border: 2px solid green;
            color: green;
        }




    </style>
    

    <div class="content">
        <h1>Copy and Enter this into your <span style="background-color: rgb(200, 104, 114);padding:5px;">private chat</span> with SkolBotYes:</h1>
        <h3 title="Copy">class login <?php echo /*$_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] .*/ $_SERVER['QUERY_STRING']; ?></h3>
        <p class="copied">Copied!</p>
        <!-- <button id="btn" title="Copy Above Command">Copy Command</button> -->
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function(){
            
            let command = document.getElementsByTagName('h3')[0]
            let copied =document.getElementsByClassName('copied')[0]
            // button = document.getElementById('btn')
    
            console.log(command)
            console.log(copied.style.display)
            // copied.style.display = "block";
            // console.log(button)

            command.addEventListener('click', function(){
                // Copy the text inside the text field
                navigator.clipboard.writeText(command.innerHTML);
                copied.style.display = "block";
                time = new Date();
                console.log(time);


                // alert("Copied");
            
            })


        });


    </script>

</body>
</html>