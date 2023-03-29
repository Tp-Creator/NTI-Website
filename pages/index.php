<?php 

    //  Includes php elements
    include_once('includes/HTMLElements/general.elements.php');
    include_once('includes/HTMLElements/forum.elements.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>We're GradeLess</title>
    <!-- random style links -->
    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <link rel="stylesheet" href="/public/style/commonStyle.css">
    <link rel="stylesheet" href="/public/style/indexStyle.css">

        <!-- Navigationbar  -->
        <nav>
        <?php echo drawNavbar() ?>
        </nav>

</head>
<body>

    <!-- first slide -->
    <div class="hero-text">
        <h1 class="hero-header">Gradeless</h1>
        <!-- <p class="other-text">Välkomna till Gradeless. Gradeless är en webbsida som är menad för dig som är elev och är trött på schoolsoft. Vi garanterar våra användare en säkrare och snabbare  informationshantering i jämförelse med schoolsoft. Vi kommer att informera våra läsare om det nyaste, scheman, prov och en möjlighet att chatta med våra fantastiska lärare. Men samtidigt kan man ha lite kul såklart med våra memes och games som regelbundet uppdateras.</p> -->
        <p class="other-text">Welcome to Gradeless, the site created by students for students.  </p>
    </div>
    

    <!-- second slide -->
    <div class="hero-image2">
        <h1>Forum</h1>
        <div class="hero-text2">
            <!-- <p>bla bla bla forum vad är d blablabla, Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit expedita autem magni quas dolor accusamus id nemo possimus illo, cupiditate laborum itaque omnis sed assumenda incidunt ad architecto nam? Explicabo!</p> -->
            <!-- <p>Gradeless erbjuder ett revilutionär teknologi som kallas ett "forum". Vart du som elev kan ställa frågor för andra elver om kurser, läxor och allmän information.</p> -->
            <p>Gradeless has invented the cool technology of a so-called "forum", where you as a student can ask other students for information about your courses and studies.</p>
            <br>
            <p>Se forumet <a href=""> HÄR</a></p>
        </div>
    </div>

    <!-- third slide -->
    <div class="hero-image3">
        <h1>News</h1>
        <div class="hero-text3">
            <!-- <p>bla bla bla News vad är d, vad ska det innehålla... blablabla, Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit expedita autem magni quas dolor accusamus id nemo possimus illo, cupiditate laborum itaque omnis sed assumenda incidunt ad architecto nam? Explicabo!</p> -->
            <p>Here you can browse news about your school, a perfect place to keep yourself informed</p>
            <p>Läs mer <a href="">HÄR</a></p>
        </div>
        
    </div>

    <!-- fourth slide -->
    <div class="hero-image4">
        <h1>Memes och spel</h1>
        <div class="hero-text4">
            <!-- <p>bla bla bla News vad är d, vad ska det innehålla... blablabla, Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit expedita autem magni quas dolor accusamus id nemo possimus illo, cupiditate laborum itaque omnis sed assumenda incidunt ad architecto nam? Explicabo!</p> -->
            <p>Name something that students love more than being depressed and stressed over schoolwork? Videogames and Memes, of course!</p>
            <p>Here you can post your own created games and memes for others to enjoy!</p>
            <br>
            <p>Gå direkt till sidan<a href=""> HÄR</a></p>
        </div>
    </div>

    <!-- footer -->
    <div class="footer" id="contact">        
        <div class="contact">
            <h1>kontakt</h1>
            <p>Email: </p>
            <p>telefon-nummer:</p>
        </div>
        <div class="about">
            <h1>Om oss</h1>
            <p>Sedan 2022</p>
            <p>Gjord av: </p>
        </div>
        <div class="kommentar">
            <h1>kommentar</h1>
            <!--denna form är för att få fram en funktion där tittaren själv kan skriva ett medelande och submitta det, input type står om det 
                ska vara en kommentarsruta eller en submit-knapp för vad för sorts ruta det ska vara, name för vad den ska heta, placeholder för vad som ska stå i rutan, sedan input type för -->
            <form>
                <label for="kommentar">Ge gärna feedback för webbsidans utveckling:</label><br>
                <input type="text" name="kommentar" placeholder="Otroligt bra" ><br>
                <input type="submit" value="Submit">
              </form>
        </div>


    </div>

</body>
</html>