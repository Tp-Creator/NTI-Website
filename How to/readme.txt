2022-11-12

För att få projektet att snurra måste man:
    skapa en ny databas i phpMyAdmin som heter "nti_db"
    gå in till SQL tolken och kopiera in och köra koden som finns i databas.sql

    Sen ska allt fungera som det ska när man kör koden!


Här kommer en kort sammanfattning om hur projektet ser ut så här långt:

Huvud mappen innehåller:
    index.php
    login.php
    style.css
    How to
    includes
    Old-fredrik


index.php är tom just nu och kan fyllas med allt vad vi vill ha där senare
    bl.a. en navbar med en länk till forumet som är nästa steg

login.php är en sida där man kan logga in och som skapar en session med servern
    så att man förblir inloggad.

style.css är vad du tror att det är


"How to" mappen innehåller den här filen (readme.txt) och databas.sql
    databas.sql innehåller SQL kod som skapar upp två tabeller, en för meddelanden och en för användare
    Men bara den för användare används just nu.


"includes" mappen innehåller två filer:
    En som skapar en anslutning till databasen samt har ett par olika funktioner som gör databas anrop (dbh.inc.php)
    En som, när den anropas, kollar om användaren har en session (är inloggad) och ser till så att användaren i annat fall skickas till inloggningen (loginCheck.php)


"Old-Fredrik" mappen innehåller två gamla filer som förut var index.php samt en fil som skapade användare.
De, speciellt indexOld.php, kan vara bra att använda som material om man undrar hur man kan använda php och HTML tillsammans.

