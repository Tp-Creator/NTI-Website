//  Joel Jägerskogh - 2Tetris

/*

    Detta är min retake av tetris.
    Den fungerar bäst i fullskärms läge då den inte alltid kan anpassa all text eller storlek på skrämen efter skärmstorleken.
    men om man behöver ändra storlek på spelplanen eller dimentioner på spelplanen kan man bara ändra på konstanterna i objektet
    map. map.pS kan med fördel ändras för att få en bättre storlek på spelet om den är för stor eller för liten.
    Spelet korrigeras utefter de variablerna.

    I koden förekommer främst kommentarer på svenska men även på engelska.
    Detta beror på att jag helt enkelt fått feeling ibland och bytt språk för att låta mer "professionell"...
    Och jag tycker inte att det är så fel för att det blir mer proffsigt när man kommenterar på engelska.
    (Tycker dock inte att det är värt att ändra språk eftersom kommenteringen är till för att du som läser detta ska förstå vad koden gör.

    Jag har inte hunit kommentera så mycket som jag skulle behövt... Men har försökt täcka många viktiga förändringar.
    Speciellt settings blev dåligt täckt. Det jag gör är att hela tiden hålla koll på vad som är markerat och sedan utifrån det avgöra vilka knappar man kan trycka på för att få saker att hända.

    Hoppas du trots detta lite halvfärdiga spel finner glädje i att spela det

*/

//     //  Visar keycode på de tangenter man trycker på
// keyboard.verbose = true


//  Variabler

    //  Den här variabeln är en globalvariabel som ändrar hur snabbt vi loopar över vad som skall ske.
    //  Den säger hur många ggr per sek som vi ska köra loopen function update()
updatesPerSecond = 60

    //  Gamestate är en variabel som styr vilken del av spelet vi är i, en siffra för en sida (ex. menu, pause, the game, osv...)
gamestate = 0
// window.onload(

    //  En variabel gjord för att hålla koll på var man är i menyerna och inställningarna se gamestate 0 och 5. Hade kunnat göras på bättre sätt men detta fungerar fint också.
menustate = {main: 0, setting:1, inner: {col: 0, row:0}}



    //  This is a variable used for temporary counting för ready set go innan spelet börjar
counter = 0

    //  En variabel som används i gamestate 0 för att flytta på selectorn (skulle satt ihop den med menustate, men hann inte)
let menuY


    //  Objekt med alla inställningar
settings = {    gamemode: 0,
                playerCount: 1,
                mapW: 10,               //  Map dimentions 10x20 default
                mapH: 20,               //  Map dimentions
                pixelS: 30,              //  PixelSize (dimentionerna för varje ruta i spelet)
                pKeys: []
            }

    //  Lista med default keys för de första tre spelarna. För att om man vill mappa om tangenterna ska man kunna återställa och så vidare... (hann inte få key bindings att fungera)
defaultKeys = [
                    { rotate: 87, left: 65, down: 83, right: 68, funk: 69 },        //  w, a, s, d och e
                    { rotate: 85, left: 72, down: 74, right: 75, funk: 73 },        //  u, h, j, k och i
                    { rotate: 38, left: 37, down: 40, right: 39, funk: 16 }         //  Pilknapparna + funk: shift
                ]


//////////////////////////////////////////////////
    //  Arrayn med alla pixlar som skall ritas ut (har formatet som följer).
    //  Det blir därav naturligt att tänka att det blir som rader och kolumner

    /*
    mapArray = [    ["", "", "", "", ""]
                    ["", "red", "red", "red", "red"],
                    ["", "", "", "", ""],
                    ["", "", "", "", ""],
                    ["green", "green", "red", "", ""],
                    ["green", "green", "red", "blue", ""]
                ]
    */
//////////////////////////////////////////////////


    //  Shapes som finns i spelet
    //  De bygger på en x*x stor array med arrayer i för att det senare skall bli enklare att loopa
    //  (man kan då loopa lika långa rader för höjden som för bredden, och det blir enklare att rotera)
    //  De innehåller även en figurens egen färg i objektet d (data), är objekt för att man kanske vill lägga till mer data i senare version av spelet

allShapes = [
            [
                ["x", "x"],
                ["x", "x"],
                d = {c: "#ffff00"}
            ],
            [
                [" ", "x", " "],
                ["x", "x", "x"],
                [" ", " ", " "],
                d = {c: "#800080"}
            ],
            [
                [" ", " ", "x"],
                ["x", "x", "x"],
                [" ", " ", " "],
                d = {c: "#ff7f00"}
            ],
            [
                ["x", " ", " "],
                ["x", "x", "x"],
                [" ", " ", " "],
                d = {c: "#0000ff"}
            ],
            [
                [" ", " ", " ", " "],
                ["x", "x", "x", "x"],
                [" ", " ", " ", " "],
                [" ", " ", " ", " "],
                d = {c: "#00ffff"}
            ],
            [
                [" ", "x", "x"],
                ["x", "x", " "],
                [" ", " ", " "],
                d = {c: "#00ff00"}
            ],
            [
                ["x", "x", " "],
                [" ", "x", "x"],
                [" ", " ", " "],
                d = {c: "#ff0000"}
            ]/*,                    Ett test med figur som inte finns i vanliga tetris.
                                    Fungerade, men ska inte vara med i orginal spelet.
            [
                ["x", " ", "x", "x"],
                ["x", " ", "x", " "],
                ["x", "x", " ", " "],
                ["x", "x", "x", "x"],
                d = {c: "pink"}
            ]*/]



//  -----------------------------------------------------------------------------
//  Konstruktorer:
//  -----------------------------------------------------------------------------

/*  Konstruktorn Map

    Denna konstruktor skapa upp en hel spelplan utan players. Den innehåller metoder för att hantera sitt koordinautsystem och rita ut sig själv. Kolla rader, och håller sina egna poäng
    Hanterar helt enkelt allt som har med en specifik map att göra.
    Den uppdaterar även sina egna players 

*/

function Map(x, y, p, mapArray){
    this.x = x                                                      //  Mapens x-position på skärmen (övre vänstra hörnet)
    this.y = y                                                      //  Mapens y-position på skärmen (övre vänstra hörnet)
    this.width = (settings.mapW+2)*settings.pixelS                  //  Mapens bredd i pixlar
    this.height = (settings.mapH+2)*settings.pixelS                 //  Mapens höjd i pixlar

    this.players = p                                                //  Array med alla players som spelar i den här map:en

    this.data = {pts: 0, lvl: 1, fallDelay: 1000}                   //  Data för mapen innehåller poäng, level, och fallspeed på bitarna
    this.nextFall = Date.now() + this.data.fallDelay                //  Håller tidpunkten för nästa fall av bitarna i map:en
    this.mapArray = mapArray                                        //  Arrayn med alla bitar sparade

    this.gamestate = 1                                              //  Säger vilken del av spelet vi är (1: i spel, 0: gameover, 2: pause)

    this.lastCrapMap = 0                                            //  ID:t på map:en man senast lagt till rader i (i versus mode (gamemode 1))

    this.counter = 0                                                //  En variabel vars syfte är att stega upp till värden för att få en effekt se this.update()

    
            // Ersätter global drawPixel()
    this.drawPixel = function(x, y, color){
            //  Ritar ut just pixeln på rätt rad och rätt kolumn
            //  Utgår ifrån this.x och this.y som hjälper till att centrera planen
            //  settings.pixelS är storleken av varje pixel som multipliceras med vilken pixel vi är på i arrayen (cols resp. row)
            //  Storleken är settings.pixelS -1 för att det skall finnas en pixel mellan så att baksidan syns igenom mellan rutorna (pixlarna)
        rectangle(this.x + settings.pixelS * x, this.y + settings.pixelS * y, settings.pixelS - 1, settings.pixelS - 1, color)
    }


            //  Ersätter global drawGame()
    this.draw = function(){
                        //  Ritar en grå rektangel bakom mappen så att det blir som ljusa linjer mellan all "pixlar" (rutor)
                        //  Blir senare rutnätet bakom planen
                rectangle(this.x, this.y, this.width-1, this.height-1, "grey")

        for (row = 0; row < this.mapArray.length; row++){  //  Loopar över alla rader i arrayen

                    //  mapArray[row].length ger längen på den raden av spel planen
            for(col = 0; col < this.mapArray[row].length; col++) {    //  Loopar över all kolumner i varje rad

                        /*  Kontrollerar om elementet (pixeln) är tom,
                            och sätter isåfall fägern till svart ("" = "black" efter detta) */
                if(this.mapArray[row][col] == "") {
                    color = "black"
                } else {
                        //  Annars skrivs färgen som finns där ut istället.
                    color = this.mapArray[row][col]
                }
                        //  Ritar på skärmen med drawPixel funktionen.
                this.drawPixel(col, row, color)
            }
        }
    }

        //  Loopar över alla spelare i map:en och ritar ut dem på rätt plats
    this.drawPlayers = function(){
        for(plr = 0; plr < this.players.length; plr++){
            p = players[this.players[plr]]
            p.draw()
        }
    }

        //  Updaterar hela map:en och dess bitar efter vilket gamestate vi är i
    this.update = function(){
            //  Draws the map och scoreboarden
        this.draw()
        this.drawScoreboard()

        switch(this.gamestate){

                //  Gameover
            case 0:
                    //  Ritar ut alla players och lägger en genomskinlig svart bakrgrund ovanpå och ger allternativ för spelaren beroende på gamemode
                this.drawPlayers()
                rectangle(this.x-1, this.y-1, this.width+settings.pixelS*4+1, this.height+1, "#000000D9")
                text(this.x+100, this.y+100, 25, "Gameover", "white")

                    //  Separate, man kan få köra om precis som man vill
                if(settings.gamemode == 0){
                text(this.x+28, this.y+200, 20, "Press your rotation", "white")
                text(this.x+90, this.y+235, 20, "key to play", "white")

                    for(key = 0; key < this.players.length; key++){
                        if(keyboard[players[this.players[key]].keys.rotate]){
                            this.reNew()
                            this.gamestate = 3
                        }
                    }

                        //  Versus alla spelare måste vänta på varandra
                } else if (settings.gamemode == 1){
                    text(this.x+80, this.y+200, 20, "Wait until the", "white")
                    text(this.x+90, this.y+235, 20, "Game is over", "white")
                }
            break

                //  In game
            case 1:
                this.fallPlayers()

                for(plr = 0; plr < this.players.length; plr++) {
                    p = players[this.players[plr]]

                            //  Uppdaterar input och rörelser samt ritar ut figuren
                    p.update()
                    p.draw()

                                //  Ersätter nextFigure()
                            //  Kollar om figuren är nere på botten     Och att map:en inte nått gameover status
                    if(p.done == true && this.gamemode != true) {
                            //  Skapa en ny figur till spelaren och ge lite poäng och sånt
                        p.reNew()
                        
                        delRows = this.checkRows()

                        if(settings.gamemode == 1){
                            doCrapRows(p, delRows)
                        }
                    }
                        // När vi kör separate gamemode kan man få använda pause och det vi gör här är att kolla om några av spelarna i map:en trycker på sin funktion key. Då hamnar map:en i Pause
                    if(keyboard[players[this.players[plr]].keys.funk] && settings.gamemode == 0){
                        this.gamestate = 2
                    }
                }

            break

                //  Pause
            case 2:
                this.drawPlayers()
                rectangle(this.x-1, this.y-1, this.width+settings.pixelS*4+1, this.height+1, "#000000D9")
                text(this.x+115, this.y+100, 25, "Paused", "white")
                text(this.x+28, this.y+200, 20, "Press your rotation", "white")
                text(this.x+28, this.y+235, 20, "key to Continue", "white")

                text(this.x+28, this.y+300, 20, "Press down", "white")
                text(this.x+28, this.y+335, 20, "to Restart", "white")

                for(key = 0; key < this.players.length; key++){
                        if(keyboard[players[this.players[key]].keys.rotate]){
                                //  Trycker man rotate så går vi tillbaka till spelet genom countdown
                            this.gamestate = 3
                        }

                        if(keyboard[players[this.players[key]].keys.down]){
                                //  Om man trycker ned så startar vi om spelet direkt
                            this.reNew()
                            this.gamestate = 1
                        }
                    }

            break

                //  Timer before the start up of the map, after a pause
            case 3:
                
                this.drawPlayers()
                rectangle(this.x-1, this.y-1, this.width+settings.pixelS*4+1, this.height+1, "#000000D9")

                this.counter++

                        //  Countdown inför själva spelet.
                        //  Kollar hur mycket counter/updatesPerSecond är och tar en text per värde.
                        //  counter/updatesPerSecond ger en per sekund
                if(this.counter/updatesPerSecond > 3) {
                        //  hoppar till spelet igen
                    this.gamestate = 1

                        //  Nollställer räknaren till nästa gång den skall visas
                    this.counter = 0

                } else if(this.counter/updatesPerSecond > 2) {
                    text(this.x+this.width/2-45, this.y+this.height/2-20, 40, "GO!", "white")

                } else if(this.counter/updatesPerSecond > 1) {
                    text(this.x+this.width/2-50, this.y+this.height/2-20, 40, "Set", "white")

                } else {
                    text(this.x+this.width/2-80, this.y+this.height/2-20, 40, "Ready?", "white")
                }

            break

        }
    }

            //  Ersätter global checkRows()
            //  En funktion för att kolla om det finns några hela rader som skall tas bort och gör det, om så är fallet.
    this.checkRows = function(){
        rowsDeleted = 0

                //  Börjar på 1 och slutar med -1 för att vi inte ska ta kanten högst upp eller längst ned
                //  Loopar över alla rader innuti ramen av mapArray
        for(row = 1; row < this.mapArray.length-1; row++){
            rowIsFull = true
                    //  Kollar om någon alla rutor på raden är full
                    //  Om inte returnerar den false och fortsätter loopa
            for(col = 0; col < this.mapArray[0].length-1; col++) {
                if(this.mapArray[row][col] == ""){
                    rowIsFull = false
                }
            }
                    //  Om en rad är full (vilket bara inträffar om ingen av rutorna var "")
                    //  Tar vi bort den raden och flyttar ned alla rader ovan den borttagna raden.
            if(rowIsFull == true){
                rowsDeleted++

                        //  Flyttar varje rad som är ovanför raden som är full ned (och skriver över raden som är full)
                        //  Detta är en optimering som gör att vi inte behöver sudda ut raden ovan. Istället skriver vi bara över den direkt
                        //  abRow står för AboveRow, alltså alla rader som är ovanför raden vi har att göra med.
                        //  Sedan gör vi ngt kul, vi loopar över alla rader baklänges tills vi kommer till den andra raden (index 1)
                        //  Och säger att varje rad skall flyttas ned ett steg, "pixel för pixel"
                        //  Jag kör loopen baklänges för att det är mer effektivt för just den här saken
                        //  då det annars blir krongligt att hålla koll på de värden man håller på att skriva över en rad ner (för de vill man ju spara till att flytta ned de med...)
                for(abRow = row; abRow > 1; abRow--){
                    for(col = 1; col < this.mapArray[abRow].length-1; col ++) {
                        this.mapArray[abRow][col] = this.mapArray[abRow-1][col]
                    }
                }
            }
        }
                //  Om spelaren gjort en tetris, dela ut 200 extra poäng
            if(rowsDeleted >= 4){
                this.scoreUp(200)
            }
        
                //  Ökar antalet poäng med 100 (när en rad tagits bort)
            this.scoreUp(100*rowsDeleted)

        //  Returnerar hur många rader som blev borttagna
        return rowsDeleted
    }

            //  Ersätter global scoreBoard()
            /// Scoreboard funktioner
        //  Har bara till uppgift att öka antalet poäng och kolla om nästa level skall gås till
    this.scoreUp = function(points){

        this.data.pts += points
        
            //  kollar om nuvarande leveln är mindre än nuvarande poängen/500
            //  (att jag delar med 500 gör att man måste uppnå 500 till för varje level)
        if(this.data.lvl < this.data.pts/500){
            this.data.lvl++
            changeFallSpeeds()
        }

    }

            //  Ersätter global drawScoreBoard()
            //  Denna funktion ritar ut rutan med poäng medan man spelar
    this.drawScoreboard = function() {
        
            //  Vi har dessa variabler som är beroende av pixelsize för att kunna skala om map:arna och låta scoreboarden göra detsamma
        posX = this.x + this.width + settings.pixelS/2
        fontS = settings.pixelS/2                       //  Fontsize för scoreboarden
        margin = settings.pixelS/3                      //  Marginaler för olika saker i scoreboarden
        lineBr = settings.pixelS/6*5                    //  Hur stor en linebreak är i scoreboraden


        posY = this.y                               //   Höjden på mappen, scoreboarden blir då i höjd med mappen
        w = settings.pixelS*3.5                     //   Bredden på rutan
        h = settings.pixelS*8                       //   Höjden på rutan

            // Gör en ram runt om poängen
        rectangle(posX, posY, w, h, "grey")
        rectangle(posX+1, posY+1, w-2, h-2, "black")

                //  Poäng utskrivning
            text(posX+margin, posY+lineBr, fontS, "Score:", "white")
            text(posX+margin, posY+lineBr*2, fontS, this.data.pts, "white")

                //  Level utskrivning
            text(posX+margin, posY+lineBr*4, fontS, "Level:", "white")
            text(posX+margin, posY+lineBr*5, fontS, this.data.lvl, "white")
            
                //  Fallspeed utskrivning
            text(posX+margin, posY+lineBr*7, fontS, "Speed:", "white")
            text(posX+margin, posY+lineBr*8, fontS, floor(this.data.fallDelay), "white")
    }

            //  Funktion för att kolla om det är dags att flytta ned alla spelare och gör isåfall det.
            //  Vi använder oss av Date.now() som ger oss tiden i millisekunder sedan 1980 eller ngt, och sedan jämför vi med en tid vi satt att då ska vi flytta ned biten.
    this.fallPlayers = function(){
            //  Kontrollerar om det har gått en "tick" i ngn av map:arna och flyttar isåfall ned alla bitarna i den map:en
        if(this.nextFall <= Date.now()) {
                //  Loopar över alla spelare
            for(i = 0; i < this.players.length; i++) {
                    //  Förkortar playerns "address"
                p = players[this.players[i]]

                    //  Kollar om vi kan flytta ned och gör isåfall det
                if(p.checkNext(0)) {
                    p.y++

                } else {
                        //  Annars vet vi att den har nått botten av mappen och då säger vi att den är helt klar
                    p.done = true
                }
                
            }
                    //  Sätter nästa fall till tiden nu + hur lång fall delay vi har i map:en
            this.nextFall = Date.now() + this.data.fallDelay
        }
    }

        //  Ändrar fall delayn när den anropas
    this.setFallDelay = function(ms){
        this.data.fallDelay = ms
    }

            //  Lägger till skräp rader längst ned i map:en
    this.addCrapRow = function(num=0){
        mapWidth = this.mapArray[0].length

        //  Loopa över alla rader ovan ifrån och flyttar upp dem ett steg
        //  Om raden högst upp har bitar i sig: Lose!

            //  Börjar på 1 och slutar med -1 för att vi inte ska ta kanten högst upp eller längst ned
            //  Loopar över alla rader innuti ramen av mapArray

        for(col = 1; col < mapWidth-1; col++){
            if(this.mapArray[1][col] != ""){
                    //  Om en av rutorna högst upp har en bit i sig förlorar man per automatik när golvet slår i taket
                // gamestate = 3       //  Gameover
                this.gamestate = 0  //  Gameover

                if(settings.gamemode == 1){
                    result.push(players[this.players[0]].map)       //  Lägger in vilken map som förlorade nyss
                }
            }        
        }

                //  Kollar om någon alla rutor på raden är full
                //  Om inte returnerar den false och fortsätter loopa
        for(row = 2; row < this.mapArray.length-1; row++){
            
            for(col = 1; col < mapWidth-1; col++) {
                        //  Låter rutan över bli den vi är på nu
                this.mapArray[row-1][col] = this.mapArray[row][col]
            }                    
        }

        //  Slumpa fram en array med bitar och färger och lägg den längst ned

        totHoles = random(2, ceil(mapWidth/4))
        holesDone = 0
        crapRow = []
        
        for(col = 0; col < mapWidth-2; col++){

                    //  Om antalet rader kvar att skapa är mindre än antalet rader kvar som ska ha hål, gör hål
                    //  Om vi inte har gjort så många hål vi vill ha, kör random om vi ska göra ett
            if(totHoles - holesDone > mapWidth - crapRow.length - 2 || (holesDone < totHoles && random(2) == 1)){
                crapRow[col] = ""
                holesDone++
                    //  Hoppar till nästa itteration av for-loopen
                continue
            }
                    //  Om vi inte ska skapa en tom ruta så skapar vi en med färg i istället
            randomShape = allShapes[random(0, allShapes.length-1)]
            randomColor = randomShape[randomShape.length-1].c
            crapRow[col] = randomColor


        }

                //  Loopar över sista raden och lägger in den slumpade raden längst ned
        for(col = 1; col < mapWidth-1; col++){
            this.mapArray[this.mapArray.length-2][col] = crapRow[col]
        }


    }

            //  Uppdaterar senaste map:en man lagt skräp i efter att man tagit bort egna rader
    this.updateLCM = function(last){
        this.lastCrapMap = last
    }

            //  Clearar den här map:en från bitar och återställer alla spelare i den. En omstart helt enkelt
    this.reNew = function(){
        this.data = {pts: 0, lvl: 1, fallDelay: 1000}                   //  Data för mapen innehåller poäng, level, och fallspeed på bitarna
        this.nextFall = Date.now() + this.data.fallDelay                //  Håller tidpunkten för nästa fall av bitarna i map:en
        this.mapArray = createMapArray(settings.mapW, settings.mapH)    //  Arrayn med alla bitar sparade
        this.gamestate = 1                                              //  Säger vilken del av spelet vi är (1: i spel, 0: gameover, 2: pause)

        for(pl = 0; pl < this.players.length; pl++){
            players[this.players[pl]].newFigure()
        }
    }
}

/*  Kontstruktorn Player:

    Player motsvarar förra versionen av Figure och håller nu koll på fler saker än innan nämligen vilka keys som den använder sig av. detta göra att vi inte skapar ett helt nytt objekt när vi vill ha en ny bit
    Utan vi ändrar bara på variablerna här i så att vi får en ny bit. 

*/

function Player(spawnMap=0, keys){                                         //  argumentet shape är en av figurerna som finns i arrayen allShapes
    this.map = spawnMap                                              //  Int for what map the shape should be rendered in

    this.keyDownTime = {left: 0, down: 0, rotate: 0, right: 0}  //  Detta är cooldown variabler för förflyttning och rotation, så att de inte roterar eller förflyttar sig för snabbt när man håller in en tangent.

    this.done = false                                           //  Variabel som håller koll på om biten har landat eller inte. false betyder att den inte landat.

    
    this.keys = keys                         // this.keys = { down: 83, left: 65, right: 68, rotate: 87 }   //  ASCII för S, A, D och W. Detta gör att vi kan skicka in till spelaren vilka keys den ska läsa av
    
            //  Funktion för att skapa en ny figur
    this.newFigure = function() {
        tempFig = allShapes[ random(0, allShapes.length-1) ]            //  Slumpar ut en ny shape

        this.color = tempFig[tempFig.length-1].c                        //  Sparar ned figurens specifika färg
        this.shape = tempFig.slice(0, -1)                             //  Sparar ned shapen i objektet (och struntar i färgen (därav splice(0, -1) som tar alla element utom det sista)), så att den blir global innom objektet.
        this.dim   = this.shape[0].length                           //  Ger längden på första raden av figuren (eftersom den är en kvadrat ger det vilka dimentioner figuren har (x*x))

        positionCorrection = ceil(this.shape[0].length/2)-1     //  Detta är en korregering av positionen x så att biten spawnas i mitten, eller till vänster om mitten (berående på figurens dimentioner)
        this.x = ceil(settings.mapW/2) - positionCorrection     //  Figurens x koordinaut, beräknad från mitten av mappen

        this.y = 1                                              //  Figurens y koordinaut, börjar på 1 vilket är nästan längst upp
    }


    this.newFigure()


            //  Detta är funktionen som kollar ifall man tryckt på tangenterna i spelet
    this.update = function() {

                //  Om biten fallit klart så har den och då får man inte längre flytta på den
        if(this.done == true){
            return
        }
            //  move left, right, down och rotate

            //  Först kollar vi om tangenten för den specifika händelsen är nedtryckt

            //  Sedan kollar vi ifall cooldownen (keydowntime.key)%x = 0
            //  Det gör så att när man håller in tangenten så flyttar den bara biten var x:te gång loopen kör
            //  (så att den inte förflyttas alldeles för snabbt)

            //  checkNext tar argumentet vilken rörelse som skall kontrolleras (int mellan 0 och 3)
            //  utan argument ger om bitens nuvarande position fungerar

            //  Sedan ökar vi keydowntime.key med 1, om tangenten är nedtryckt
            //  Annars, om man inte trycker in tangenten, nollställer vi keydowntime.key.

            //  MOVE LEFT
        if(keyboard[this.keys.left]) {
            if(this.keyDownTime.left%4 == 0) {
                if(this.checkNext(2)){
                    this.x--
                }
            }
            this.keyDownTime.left++
        } else if(!keyboard.left){
            this.keyDownTime.left = 0
        }
    /////////////////////////////////////

                //  MOVE RIGHT
        if(keyboard[this.keys.right]) {
            if(this.keyDownTime.right%4 == 0) {
                if(this.checkNext(1)){
                    this.x++
                }
            }

            this.keyDownTime.right++
        } else if(!keyboard.right){
            this.keyDownTime.right = 0
        }
    /////////////////////////////////////

                //  MOVE DOWN
        if(keyboard[this.keys.down]) {
            if(this.keyDownTime.down%4 == 0) {
                if(this.checkNext(0)){
                    this.y++
                } else {
                        //  När det här händer så vet vi att den har nått botten av mappen
                    this.done = true
                }
            }

            this.keyDownTime.down++
        } else if(!keyboard.down) {
            this.keyDownTime.down = 0
        }
    /////////////////////////////////////

                // ROTATE
        if(keyboard[this.keys.rotate]) {
            if(this.keyDownTime.rotate%8 == 0){
                if(this.checkNext(3)){
                    this.shape = this.rotate()
                }
            }
            this.keyDownTime.rotate++

        } else if(!keyboard.rotate){
            this.keyDownTime.rotate = 0
        }
        /////////////////////////////////////

    }

    this.rotate = function(){
                //  Temporär array för figuren innan vi returnerar en vriden figur
        var tempFig = []

                //  Lägger in så många rader i arrayen som det fanns i original shapen
                //  Fick en bugg att det inte fungerade när jag satte tempFig till this.shape
                //  Därför lägger jag istället till tomma arrayer
        for(i = 0; i < this.dim; i++){
            tempFig.push([])
        }
                //  Loopar över varje rad och kolumn i figur arrayen
        for(y = 0; y < this.dim; y++) {
            for(x = 0; x < this.dim; x++) {
                        //  Dim är en mer än sista värdet i figurens array, eftersom arrayen börjar räkna med 0 och .length från 1
                        //  för att rotera ett steg åt vänster tar man figurens längd (dim) - x-värdet
                        //  och för x värdet sätter man förra y värdet, (En mycket enkel formel, som jag provat mig fram till för hand på papper,
                        //  och fungerar för alla kvadratiska figurer (kanske även för andra figer med (om man gör om funktionen för att klara av det.)))
                tempFig[this.dim-x-1][y] = this.shape[y][x]
            }
        }
                //  Returnerar den roterade figuren
        return tempFig
    }

                //  checkNext tar argumentet vilken rörelse som skall kontrolleras (int mellan 0 och 3)
                //  utan argument ger om bitens nuvarande position fungerar
    this.checkNext = function(what) {

        tempFig = this.shape
        addX = 0
        addY = 0
                    //  Down
        if       (what == 0) {
            addY = 1
                    //  Right
        } else if(what == 1){
            addX = 1
                    //  Left
        } else if(what == 2) {
            addX = -1
                    //  Rotate left
        } else if(what == 3) {
                //  Gör att figuren vi kollar på blir en roterad version av figuren
            tempFig = this.rotate()
        }
                    //  Vi kollar helt enkelt om figuren krockar med ngt om den flyttas till (vänster, höger, nedåt eller blivit roterad)
        for(r = 0; r < this.dim; r++) {
            for(c = 0; c < this.dim; c++) {
                if(tempFig[r][c] == "x" && theMaps[this.map].mapArray[this.y+r+addY][this.x+c+addX] != "") {
                            //  Om någon del krockar returnerar funktionen false, annars true.
                    return false
                }
            }
        }
        return true
    }

            //  Ritar ut figuren ovanpå koordinautsystemet, utifrån koordinautsystemet.
    this.draw = function() {

                //  Loopar över figurens arrayer och skriver ut varje ruta med ett "x" i, i figurens egna färg.
        for(r = 0; r < this.dim; r++) {
            for(c = 0; c < this.dim; c++) {
                if(this.shape[r][c] == "x") {
                    theMaps[this.map].drawPixel(this.x+c, this.y+r, this.color)
                }
            }
        }
    }

            //  När biten landat anropas den här funktionen som skriver in figurens position och färger i mapArrayen
            //  och blir en del av spelplanen, som ritas ut automatiskt med spelplanen.
    this.drawToMap = function() {

        for(r = 0; r < this.dim; r++) {
            for(c = 0; c < this.dim; c++) {
                if(this.shape[r][c] == "x") {
                    theMaps[this.map].mapArray[this.y+r][this.x+c] = this.color
                }
            }
        }

    }
    
        //  Ersätter newFigure() och en bit av updateFigures
        //  Skriver in den gamla figuren i den egna map:en och skapar sedan en ny figur.
        //  Ger poäng om den nya figuren in spawnats i en redan existerande bit och säger till map:en att kontrollera rader
    this.reNew = function() {

        ////////// fullbordar biten och kollar efter hela rader //////////
                    //  Skriver in den gamla figuren i mapArrayen
                    //  (eftersom den måste finnas kvar och för att den inte längre behöver ittereras)
            this.drawToMap()

                    //  Kollar om det finns några hela rader
                    //  Detta är det enda tillfället att göra det på eftersom det då kan ha tillkommit en ny rad när man nyss har placerat en bit
            // theMaps[this.map].checkRows()

            this.done = false

        //////////                                              //////////


        //////////  Skapar ny bit och kollar om man förlorat    //////////
                    //  slumpar ny bit och reset:ar figurens koordinauter så att den börjar om på rätt position
            this.newFigure()                


                    //  Kollar om den nya figuren (innan den har flyttat sig), har spawnats i en gammal figur
                    //  Om så är fallet, så har man förlorat. gamestate 3 är game over
            if(this.checkNext() == false) {
                // gamestate = 3
                theMaps[this.map].gamestate = 0 //  gameover i map:en

                if(settings.gamemode == 1){
                    result.push(this.map)           //  Skriver in i result vilken map som nyss förlorade
                }

                    //  Bryter loopen-satsen så att man inte får poäng om man förlorat
                return
            }
            
                    //  Ökar antalet poäng med 10 om man lyckas placera en figur
            theMaps[this.map].scoreUp(10)

        //////////                                              //////////


    }

}





//  -----------------------------------------------------------------------------
//  Functioner
//  -----------------------------------------------------------------------------

        //  Funktion som centrerar text perfekt
        //  Så jag frågade min lillebror hur man skulle kunna göra för att centrera text.
        //  Efter lite Googlande så hittade han ett sätt och skrev kod för att göra det.
        //  Som jag har förstått det hämtar vi canvas elementet och säger att vi vill arbeta i 2D, eftersom vår canvas är i 2D redan.
        //  Sedam sparar vi ned den alignment på texten som vi har (alltså till vänster)
        //  Sedan sätter vi text align till center alltså att texten ska skrivas ut så att texten centreras
        //  Vi skriver ut den text vi vill med text-funktionen koda.nu gjort till oss
        //  Och ändrar tillbaka textAlign tilldefault 
function centerText(x, y, size, content, color) {
    ctx = canvas.getContext("2d")
    tempAlign = ctx.textAlign
    ctx.textAlign = "center"
    text(x, y, size, content, color)
    ctx.textAlign = tempAlign
}


    //  Ritar en "knapp" efter argumenten. Ger den ingen funktionalitet, utan den ritas bara ut
    //  Om Ritar basically två eller fyta rektanglar så att det ser ut som en eller två ramar
    //  Och skriver sedan in content innuti
    //  Om ID == selceted kommer vi att rita en röd ram runt knappen för att visa att den är markerad (alltså vald)
function botton(x, y, width, content, textSize, ID, selected){

    if(selected == ID){
        rectangle(x-3, y-3, width+6, textSize+40+6, "red")
        rectangle(x-2, y-2, width+4, textSize+40+4, "black")
    }

    rectangle(x, y, width, textSize+40, "white")
    rectangle(x+1, y+1, width-2, textSize+40-2, "black")


    centerText(x+width/2, y+textSize+17, textSize, content, "white")
    
}


        //  Funktion som just nu bara delar ut rätt tangenter till rätt spelare
        //  Den var även tänkt att hålla koll på egna keybinds när man byter spelare men jag hann inte så långt.
        //  Det vi gör här är att ta våra default keys som är ordnade efter vänster till höger på spelplanen.
        //  Sedan kollar vi om vi redan har några existerande bindings som en player eventuellet har gjort (som då ligger i settings.pKeys)
        //  Och sätter tempKeys till detta. (vi mergar på så vis ihop default keys med redan satta keys och låter de redan satta vara prioriterade)
        //  Sedan loopar vi över hur många spelare vi har och sätter utifrån det de nya keys:en
        //  i defaultKeys har vi satt att sista elementet är pilknapparna. I enspelarläget vill vi då att den enda spelaren ska ha de knapparna
        //  Vi får det här problemet eftersom vi vill prioritera olika knappar vid olika många spelare och samtidigt vill ha specifika keys för specifika map:ar så att den map:en längst till vänster får de vänstraste keys:en osv...
function mapKeysToPlayers(){
    tempKeys = defaultKeys

    switch(settings.pKeys.length){
        case 1:
            tempKeys[2] = settings.pKeys[0]
        break
        case 2:
            tempKeys[2] = settings.pKeys[1]
            tempKeys[0] = settings.pKeys[0]
        break
        case 3:
            tempKeys[2] = settings.pKeys[2]
            tempKeys[0] = settings.pKeys[0]
            tempKeys[1] = settings.pKeys[1]
        break
    }

    settings.pKeys = []

    switch(settings.playerCount){
        case 1:
            settings.pKeys[0] = tempKeys[2]
        break
        case 2:
            settings.pKeys[1] = tempKeys[2]
            settings.pKeys[0] = tempKeys[0]
        break
        case 3:
            settings.pKeys[2] = tempKeys[2]
            settings.pKeys[1] = tempKeys[1]
            settings.pKeys[0] = tempKeys[0]
        break
    }
}

        //  Ersätter reDoMapArray() och lite annan kod i gamestate 1 och mer...
        //  skapar upp map:ar och players efter settings
function prepareGame() {

        //  Skapar upp arrayer för spelarna och spelplanerna som skall finnas
    players = []
    theMaps = []


        //  array där ordningen de förlorar skrivs in
    result = []

        //  Gameover screen     -- Variabel för att animera text i gameover reset:as och skapas
    yPos = -50      // Texten börjar utanför skärmen

    mapKeysToPlayers()

            //  Senare: 5+5[antalplayers]     (Om vi skulle göra co-op maps)


            //  Sätter positionerna på mapen efter lite tänkande:
                // Formel för utrymme mellan boards:

                // mapWidth
                // howMany
                // totalWidth

                // (mapWidth + scoreBoardWidth) * howMany = minSpace

                // minSpace*pixelSize = spaceNeeded

                // totalWidth - spaceNeeded = spaceLeft

                // spaceLeft/howMany+1 = spaceBetween

                // posX1 = spaceBetween

                // posX2 = spaceBetween * 2 + mapWidth+scoreBoardWidth

        totalMapWidth = ((settings.mapW+2) * settings.pixelS) + settings.pixelS*4       //  Mappens bredd
        emptySpaceBetween = (totalWidth - totalMapWidth * settings.playerCount) / (settings.playerCount+1)      //  Tomrummet mellan maparna i flerspelare så att det blir jämt fördelat

    switch(settings.gamemode) {
            //Ensamstående  -  (finns flera spelare)
        case 0:
        case 1:
            for(i = 0; i < settings.playerCount; i++) {
                players[i] = new Player(i, settings.pKeys[i]) 

                    //  Skapa mapArray
                tempMapArray = createMapArray(settings.mapW, settings.mapH)         //  Skapar en mapArray
            
                xPos = (emptySpaceBetween * (i + 1)) + (totalMapWidth * i)          //  Ger positionen i x-led (emtptySpace en mellan varje plan) och sedan lägger vi på i antal spelplans bredder (första ggn är i = 0)
                yPos = totalHeight/2-(settings.mapH+2)/2*settings.pixelS            //  Ger positionen i y-led (tar halva skärmens höjd och subtraherar med halva spelplanens höjd)

                playerIDs = i                                                       //  Vi kommer alltid att ha bara en spelare per bana i de här gamestaten

                theMaps[i] = new Map(xPos, yPos, [playerIDs], tempMapArray)                      //  Skapar en ny map med pos, vilken player som är i (bara en för att gamemodsen ser ut så. Den är i en lista för tanken är att det lätt ska gå att uppgradera till flera spelare per map.) och den nya mapArrayen till mapen
            }

        break

            //  Var till en tanke med co-op spel, men hann inte så långt...
        case 2:

        break
    }

}

        //  Den här funktionen skapar en array med arrayer i som sparar alla bitar. Bredd och höjd utifrån map.width och map.height
function createMapArray(width, height){

    tempMapArray = []

        //  Creates the array of the map with help of the settings.mapW and settings.mapH variables
        //  settings.mapH+2 är för att settings.mapH är antalet rutor inuti och därav läggs det till 2 för kanterna
    for (row = 0; row < height+2; row++) {
        tempMapArray.push([])
        for (cols = 0; cols < width+2; cols++) {
                    //  Gäller för alla kanter, för att färga dem grå
            if (row == 0 || row == height+1 || cols == 0 || cols == width+1) {
                tempMapArray[row].push("#5E5E5E")   //  En typ av grå färg som blir spelets borders
            } else {
                tempMapArray[row].push("")          //  "" kommer senare att tolkas som "black"
            }
        }
    }

    return tempMapArray

}


        //  Ritar bara ut alla map:ar och deras bitar utan att uppdatera dem. (Används bara i pause för alla spelare samtidigt)
function drawGameOnly() {
        //  Loopar över alla spelplaner och skriver ut planerna samt deras scoreboards
    for(i = 0; i < theMaps.length; i++) {
        theMaps[i].draw()
        theMaps[i].drawScoreboard()
    }

        //  Loopar över alla spelare och ritar ut dem
    for(i = 0; i < players.length;  i++) {
        players[i].draw()
    }
}


    //  Ersätter nextFigure()
    //  Uppdaterar spelet utifrån gamemodet som är satt.
function updateGame() {

        gameovers = 0   //  Variabel som håller koll på antalet gameovers för att se om alla är ute, för då vill vi gå till riktig gameover respektive alla utom en gameover i Versus
    for(maps = 0; maps < theMaps.length; maps++) {
                
        theMaps[maps].update()

                //  Räknar antal döda
        if(theMaps[maps].gamestate == 0) {
            gameovers++
        }

    }
                //  Om det är versus och alla utom en är döda så måste en vinnare koras i gameover
    if(settings.gamemode == 1 && gameovers >= theMaps.length-1){
        gamestate = 3   //  Gameover när alla utom en av spelarna är döda

            //  Om vi är i gamemode 1 kommer alla map:ar utom den som vann att hamna i listan över gameover map:ar. Vi lägger in den sist för att kora den till vinnare.
        for(map = 0; map < theMaps.length; map++){
            inResult = false
            for(res = 0; res < result.length; res++){
                if(result[res] == map){
                    inResult = true
                }
            }

            if(inResult == false){
                result.push(map)
            }
        }
    }

        //  Om alla förlorat i separate skicka dem till gameover
    if(settings.gamemode == 0 && gameovers >= theMaps.length){
        gamestate = 3
    }

}


        //  Funktion för att ändra fallspeed beroende på vilket gamemode vi kör
function changeFallSpeeds(){
    switch(settings.gamemode){

            //  Separate alla får fallspeeden som de själva förtjänat med sin level
        case 0:
            for(i = 0; i < theMaps.length; i++){
                lvl = theMaps[i].data.lvl-1

                theMaps[i].setFallDelay(1000-lvl*50)
            }

        break

                //  Versus      ger fall speed till alla andra än en själv och delar upp den jämt så att om jag alla map:ar påverkas av de andras levlar utom sin egen
        case 1:
            for(var i = 0; i < theMaps.length; i++){
                var lvl = 0
                var count = 0
                for(var others = 0; others < theMaps.length; others++){
                    if(others != i){
                        lvl += theMaps[others].data.lvl-1
                        count++
                    }
                }
                lvl = lvl/count     //  Genomsnitts level

                theMaps[i].setFallDelay(1000*0.9**lvl)
            }
        break
    }
}

        //  Funktion som loopar över map:ar och ger dem delRows antal skräp rader
function doCrapRows(player, delRows){

    if(delRows > 1) {
        crapMap = theMaps[player.map].lastCrapMap       //  Senaste map vi skräpat ned och den map vi nu kommer att börja med
        numOfP = players.length-1                       //  Antal spelare som finns

            //  Om man gör en tetris får man skräpa motståndaren med en extra rad!
        if(delRows == 4){
            delRows = 5
        }
                //  Loopar över antalet rader som tagits bort
        for(rows = 0; rows < delRows; rows++){

                    //  Kollar så att nästa map vi ska lägga till en rad på existerar
            if(crapMap > numOfP){
                crapMap = 0
            }
                    //  Kollar så att map:en vi ska lägga till en rad i inte är den egna map:en
            if(crapMap == player.map){
                crapMap++                
                        //  Kollar igen ifall map:en vi ska lägga bitar i är en existerande map
                if(crapMap > numOfP){
                    crapMap = 0
                }
            }

                    //  Lägger till en rad i den map vi ska
            theMaps[crapMap].addCrapRow()
                    //  Ökar crapMap med 1
            crapMap++
        }

        theMaps[player.map].updateLCM(crapMap)
    }

}


/////////////////////////////////////////////
//  Where things happen (spel loopen)
/////////////////////////////////////////////

function update() {
    fill("black")

    switch(gamestate){
            //  Spel meny med enkla instruktioner för att kunna spela spelet
        case 0:

                //  Variabel för att alla bokstäver ska vara relativa till ett värde, man måste inte ändra alla värden när texten skall flyttas
            menuX = totalWidth/2-160

                //  Snyggt skrivet 2Tetris
            text(menuX, totalHeight/2-250, 100, "2", "white");
            text(menuX+60, totalHeight/2-250, 80, "T", "#ffff00");
            text(menuX+100, totalHeight/2-250, 80, "E", "red");
            text(menuX+140, totalHeight/2-250, 80, "T", "#ff7f00");
            text(menuX+180, totalHeight/2-250, 80, "R", "#0000ff");
            text(menuX+210, totalHeight/2-250, 80, "I", "#00ffff");
            text(menuX+240, totalHeight/2-250, 80, "S", "#00ff00");

                //  En counter delay som gör att knapptryck inte går instant utan man måste vänta 100 millisekunder sedan senaste knapptrycket
            if(counter <= Date.now()-100){
                switch(menustate.main){
                        //  Play vald
                    case 0:
                            //  Flytta rutan som markerar till viss position i y-led
                        menuY = totalHeight/2-145
                        
                            //  De här sakerna går att göra när vi markerat den här rutan
                            //  Flytta ned cursorn
                        if(keyboard.down || keyboard.s){
                            menustate.main++
                            counter = Date.now()

                                //  Trycka enter och starta spelet
                        } else if(keyboard.enter){
                            gamestate = 1
                            counter = 0
                        }

                    break
                        //  Instruktioner vald
                    case 1:
                            //  Flytta rutan som markerar till viss position i y-led
                        menuY = totalHeight/2-33
                        
                        //  De här sakerna går att göra när vi markerat den här rutan
                            //  Flytta ned cursorn
                        if(keyboard.down || keyboard.s){
                            menustate.main++
                            counter = Date.now()

                            //  Flytta upp cursorn
                        } else if(keyboard.up || keyboard.w){
                            menustate.main--
                            counter = Date.now()

                            //  Trycka enter för att gå in i Instructions
                        } else if(keyboard.enter){
                            gamestate = 6
                            counter = Date.now()

                        }

                    break
                        //  Settings vald
                    case 2:
                        //  Flytta rutan som markerar till viss position i y-led
                        menuY = totalHeight/2+88
                        
                        //  De här sakerna går att göra när vi markerat den här rutan
                            //  Flytta uppåt cursorn
                        if(keyboard.up || keyboard.w){
                            menustate.main--
                            counter = Date.now()

                            //  Trycka enter för att gå in i Settings
                        } else if(keyboard.enter){
                            gamestate = 5
                            counter = Date.now()
                            menustate.setting = 1

                        }
                        
                    break
                }
            }

                    //Ritar cursor rutan för att visa vad som är markerat
            rectangle(totalWidth/2-250, menuY, 500, 100, "white")
            rectangle(totalWidth/2-249, menuY+1, 500-2, 100-2, "black")

                //  Skriver ut de olika alternativen centrerat
            centerText(totalWidth/2, totalHeight/2-80, 45, "Play", "white")
            centerText(totalWidth/2, totalHeight/2+30, 40, "Instructions", "red")
            centerText(totalWidth/2, totalHeight/2+150, 40, "Settings", "#ffff00")

        break



            //  Countdown inför spelets start
        case 1:

                //  Counter används för att skriva ut rätt text på skärmen vid rätt tidpunkt
            counter++

                    //  Kort info om att hoppa över countdownen
            text(totalWidth/2-160, totalHeight/2+200, 15, '(Press "space" to skip)', "white")
            centerText(60, 40, 20, "ESC", "white")
            centerText(60, 70, 15, "(Quit)", "white")


                    //  Countdown inför själva spelet.
                    //  Kollar hur mycket counter/updatesPerSecond är och tar en text per värde.
                    //  counter/updatesPerSecond ger en per sekund
            if(counter/updatesPerSecond > 3 || keyboard.space) {
                gamestate = 2
                
                    //  Förbereder genom att skapa upp spelare med varsina bitar och skapa upp map:ar till spelarna
                prepareGame()

                    //  Nollställer räknaren till nästa gång den skall visas
                counter = 0

            } else if(counter/updatesPerSecond > 2) {
                text(totalWidth/2-80, totalHeight/2-30, 60, "GO!", "white")

            } else if(counter/updatesPerSecond > 1) {
                text(totalWidth/2-100, totalHeight/2-30, 60, "Set", "white")

            } else {
                text(totalWidth/2-150, totalHeight/2-30, 60, "Ready?", "white")
            }

            if(keyboard.esc){
                gamestate = 0
            }

        break




            // The actuall game!
        case 2:

                //  Uppdaterar bitens position utifrån knapptryck och flyttar ned biten om det gått ett tick i map:en
            updateGame()

            //     //  Ritar ut spelplanerna, deras scoreboards och de aktiva bitarna
            // drawGameOnly()

                //  Skriver ut uppe till höger att man kan trycka ESC för att pausa
            centerText(60, 40, 20, "ESC", "white")
            centerText(60, 70, 15, "(Pause)", "white")

                //  En pause sida om man trycker på esc
            if(keyboard.esc) {
                gamestate = 4
            }

        break




            //  Gameover        ////////////////////////////////////////////////////
        case 3:

            if(yPos < 100) {
                yPos += 2
            }

                    //  Ritar ut spelplanen och alla bitar, så att de finns i bakgrunden
            drawGameOnly()
            rectangle(0, 0, totalWidth, totalHeight, "#000000E5")

            switch(settings.gamemode){
                    //  För ensamspel en spelare
                case 0:
                    text(100, yPos, 50, "Game Over!", "white")

                    for(i = 0; i < theMaps.length; i++){
                        text(100, 200 + i*75, 30, "Player "+ (i+1) +"   Score: " + theMaps[i].data.pts + "   Level: " + theMaps[i].data.lvl, "white")
                    }

                break


                    // Om det varit gamemode Versus  
                case 1:

                        
                    text(80, yPos, 50, "Game Over!", "grey")

                        //  First place
                    text(100, 250, 45, "Winner:  player " + (result[result.length-1]+1) + "  |  Score: "+ theMaps[result[result.length-1]].data.pts, "white")

                        //  Second place
                    text(100, 350, 20, "2nd:  player " + (result[result.length-2]+1) + "  |  Score: "+ theMaps[result[result.length-2]].data.pts, "white")
                    
                    if(result.length >= 3){
                        text(100, 400, 20, "3rd:  player " + (result[result.length-3]+1) + "  |  Score: "+ theMaps[result[result.length-3]].data.pts, "white")
                    }

                break
            }

            text(totalWidth/2-300, totalHeight-100, 20, 'Press "space" to go to main Menu', "white")


                //  Gå till main menu och instruktioner
            if(keyboard.space){
                gamestate = 0
            }
            ////////////////////////////////////////////////////////////    

        break
            //  Pause
        case 4:

                //  Ritar ut spelplanen med alla figurer (inklusive den aktuella) och scoreboarden
            drawGameOnly()

                    //  Lägger över en svart ruta på allt, med opacity, så att man kan se spelplanen igenom den.
                    //  Detta gör att man inte känner att man kommit långt ifrån spelet utan att man faktiskt bara har pausat.
                    //  De sista 2 tecknen i hex koden är opacityn de sex första 0:orna ger svart. (D9 = 85% svart, ger 15% opacity)
            rectangle(0, 0, totalWidth, totalHeight, "#000000D9")

                    //  Skriver ut text för var man är och vad man gör för att fortsätta spela
            centerText(totalWidth/2, totalHeight/2-200, 60, "Paused", "white")
        
            text(totalWidth/2-230, totalHeight/2-100, 20, "[Space]", "green")
            text(totalWidth/2-110, totalHeight/2-100, 20, "--> Continue playing", "white")

            text(totalWidth/2-105, totalHeight/2, 20, "[Q]", "red")
            text(totalWidth/2-50, totalHeight/2, 20, "--> Quit", "white")

                    //  Skickar dig en tillbaka till spelet
            if(keyboard.space) {
                gamestate = 2
                    //  Exit to menu
            } else if(keyboard.q){
                gamestate = 0
            }

        break

            //  Settings
        case 5:
            
                //  Ritar upp basic layout
            centerText(totalWidth/2, 70, 50, "Settings", "yellow")
            centerText(60, 40, 20, "ESC", "white")
            centerText(60, 70, 15, "(Quit)", "white")
            line(100, 130, totalWidth-100, 130, 1, "white")

            switch(menustate.setting){
                    //  General 
                case 1:
                        //  Ritar ut en rectangel med vitakanter ovan på linjen för att visa att vi markerat General
                    rectangle(totalWidth/2-340, 85, 192, 45, "white")
                    rectangle(totalWidth/2-339, 86, 190, 60, "black")

                        //  Skriver hur många spelar vi valt att spela med
                    text(150, 200, 30, "Amount of players: " + settings.playerCount, "white")

                    //  På olika platser i settings får man trycka på olika knappar. Och när man trycker på enter så väljer man den saken
                    //  Hinner inte kommentera bättre... :(

                    if(counter <= Date.now()-100){

                        if((keyboard.right || keyboard.d)){

                            switch(menustate.inner.row){
                                case 0:
                                    if(menustate.inner.col < 2){
                                        menustate.inner.col++
                                        counter = Date.now()
                                    }
                                case 1:
                                    if(menustate.inner.col < 1 && settings.playerCount != 1){
                                        menustate.inner.col++
                                        counter = Date.now()
                                    }
                                break
                            }
                        }    

                        if((keyboard.left || keyboard.a) && menustate.inner.col > 0){
                            menustate.inner.col--
                            counter = Date.now()
                        }

                        if((keyboard.up || keyboard.w) && menustate.inner.row > 0){
                            menustate.inner.row--
                            menustate.inner.col = 0
                            counter = Date.now()
                        }

                        if((keyboard.down || keyboard.s) && menustate.inner.row < 1){
                            menustate.inner.row++
                            menustate.inner.col = 0
                            counter = Date.now()
                        }

                        if(keyboard.enter){
                            switch(menustate.inner.row){
                                case 0:
                                    settings.playerCount = menustate.inner.col+1
                                    if(settings.playerCount == 1){
                                        settings.gamemode = 0    
                                    } 

                                    if(settings.playerCount >= 3){
                                        settings.pixelS = 25
                                    } else {
                                        settings.pixelS = 30
                                    }

                                    mapKeysToPlayers()

                                break
                                case 1:
                                    settings.gamemode = menustate.inner.col
                                break
                            }
                        }
                    }

                        //  Ritar ut knappar med menustate.inner för att avgöra om man står på knappen eller ej
                    botton(150, 250, 80, "1", 30, 0, menustate.inner.col + menustate.inner.row*10)
                    botton(250, 250, 80, "2", 30, 1, menustate.inner.col + menustate.inner.row*10)
                    botton(350, 250, 80, "3", 30, 2, menustate.inner.col + menustate.inner.row*10)

                    gamemodeNames = ["Separate", "Versus"]

                    text(150, 450, 30, "Gamemode: " + gamemodeNames[settings.gamemode], "white")

                    botton(150, 500, 230, "Separate", 30, 10, menustate.inner.col + menustate.inner.row*10)
                    if(settings.playerCount != 1){
                        botton(400, 500, 180, "Versus", 30, 11, menustate.inner.col + menustate.inner.row*10)
                    } else {
                        text(400, 520, 20, "Versus Disabled!", "red")
                        text(420, 550, 15, "Is not available while", "grey")
                        text(420, 570, 15, "Amount of players = 1", "grey")
                    }

                        //  Om man är på gamemodes dyker det även upp en förklaring till de olika
                    if(menustate.inner.row == 1 && menustate.inner.col == 0){
                        text(totalWidth/2+50, 200, 25, "Separate gamemode", "white")
                        text(totalWidth/2+50, 250, 15, "All the games are separate from each other;", "white")
                        text(totalWidth/2+50, 280, 15, "They will not affect each other.", "white")
                        text(totalWidth/2+50, 320, 15, "The Goal is to gain as many points as possible.", "white")
                        line(totalWidth/2, 200, totalWidth/2, totalHeight-100)
                        
                    } else if(menustate.inner.row == 1 && menustate.inner.col == 1){
                        text(totalWidth/2+50, 200, 25, "Versus gamemode", "white")
                        text(totalWidth/2+50, 250, 15, "You play against each other;", "white")
                        text(totalWidth/2+50, 280, 15, " When you delete rows, the other players", "white")
                        text(totalWidth/2+50, 310, 15, " might get an extra bonus surprise... ;D", "white")
                        text(totalWidth/2+50, 350, 15, " Also, when you level up, the other players'", "white")
                        text(totalWidth/2+50, 380, 15, " fall speeds will increase; not yours", "white")
                        text(totalWidth/2+50, 420, 15, " The Goal is to be the last survivor.", "white")
                        line(totalWidth/2, 200, totalWidth/2, totalHeight-100)
                    }

                break
                    //  Keybinds
                case 2:

                    //  Hade inte tid att slutföra detta...    

                    rectangle(totalWidth/2-100, 85, 212, 45, "white")
                    rectangle(totalWidth/2-99, 86, 210, 60, "black")
                    
                    centerText(totalWidth/2, totalHeight/2-100, 30, "Comming soon...", "white")

                    // centerText(350, 200, 20, "rotate", "white")
                    // centerText(470, 200, 20, "left", "white")
                    // centerText(590, 200, 20, "right", "white")
                    // centerText(710, 200, 20, "down", "white")
                    // centerText(880, 200, 20, "pause", "white")

                    

                    // for(i = 0; i < settings.playerCount; i++){
                    //     text(100, 100*(i+1)+185, 20, "Player " + (i+1), "white")

                    //     botton(300, 100*(i+1)+150, 100, keyboard.names[settings.pKeys[i].rotate] , 20, 0+i*10, menustate.inner.col + menustate.inner.row*10)
                    //     botton(420, 100*(i+1)+150, 100, keyboard.names[settings.pKeys[i].left] , 20, 1+i*10, menustate.inner.col + menustate.inner.row*10)
                    //     botton(540, 100*(i+1)+150, 100, keyboard.names[settings.pKeys[i].right] , 20, 2+i*10, menustate.inner.col + menustate.inner.row*10)
                    //     botton(660, 100*(i+1)+150, 100, keyboard.names[settings.pKeys[i].down] , 20, 3+i*10, menustate.inner.col + menustate.inner.row*10)
                    //     botton(830, 100*(i+1)+150, 100, keyboard.names[settings.pKeys[i].funk] , 20, 4+i*10, menustate.inner.col + menustate.inner.row*10)
                        
                    // }

                    // text(1000, 285, 20, "(Left on the screen)", "grey")
                    // text(1000, 485, 20, "(Right on the screen)", "grey")

                    // if(counter <= Date.now()-100){

                    //     if((keyboard.right || keyboard.d) && menustate.inner.col < 4){
                    //         menustate.inner.col++
                    //         counter = Date.now()
                    //     }    

                    //     if((keyboard.left || keyboard.a) && menustate.inner.col > 0){
                    //         menustate.inner.col--
                    //         counter = Date.now()
                    //     }

                    //     if((keyboard.up || keyboard.w) && menustate.inner.row > 0){
                    //         menustate.inner.row--
                    //         counter = Date.now()
                    //     }

                    //     if((keyboard.down || keyboard.s) && menustate.inner.row < 2){
                    //         menustate.inner.row++
                    //         counter = Date.now()
                    //     }

                    //     if(keyboard.enter){
                    //         settings.playerCount = menustate.inner.col+1
                    //         if(settings.playerCount == 1){
                    //             settings.gamemode = 0    
                    //         } 

                    //         if(settings.playerCount >= 3){
                    //             settings.pixelS = 25
                    //         } else {
                    //             settings.pixelS = 30
                    //         }

                    //         mapKeysToPlayers()
                    //     }
                    // }

                    // if(counter <= Date.now()-100){
                    //     if((keyboard.right || keyboard.d) && menustate.inner < 1){
                    //         menustate.inner++
                    //         counter = Date.now()
                    //     } else if((keyboard.left || keyboard.a) && menustate.inner > 0){
                    //         menustate.inner--
                    //         counter = Date.now()
                    //     } else if(keyboard.enter){
                    //         settings.gamemode = menustate.inner
                    //     }
                    // }

                break
                    //  Credit
                case 3:
                        //  Ruta som visar att Credit är vald
                    rectangle(totalWidth/2+150, 85, 192, 45, "white")
                    rectangle(totalWidth/2+151, 86, 190, 60, "black")

                    centerText(totalWidth/2, totalHeight/2-100, 50, "Not Me", "white")
            }

            centerText(totalWidth/2, 115, 20, "General(1)     KeyBinds(2)     Credit(3)", "white")
            // text(400, 115, 20, "Gamemode(2)")
            // text(650, 115, 20, "KeyBinds(3)")


                //  Loopar över alla siffertangener man kan trycka på och väljer på så vis vilken sida man ska gå till. Om man trycker på esc går man till menyn igen
            if(counter <= Date.now()-100){
                if(keyboard.one){
                    menustate.setting = 1
                    menustate.inner.col = 0
                    menustate.inner.row = 0

                } else if(keyboard.two){
                    menustate.setting = 2
                    menustate.inner.col = 0
                    menustate.inner.row = 0
                    mapKeysToPlayers()

                } else if(keyboard.three){
                    menustate.setting = 3
                    menustate.inner.col = 0
                    menustate.inner.row = 0

                } else if(keyboard.esc){
                    gamestate = 0
                    menustate.inner.col = 0
                    menustate.inner.row = 0

                }
            }
        break

            //  Instructions
        case 6:
            centerText(totalWidth/2, 100, 50, "Instructions", "red")
            centerText(60, 40, 20, "ESC", "white")
            centerText(60, 70, 15, "(Quit)", "white")
            line(100, 130, totalWidth-100, 130, 1, "white")

            text(150, 200, 20, "The Goal of the game is the same as in the original Tetris;", "white")
            text(150, 230, 20, "   Clear rows and get as many points as possible.", "white")
            
            text(150, 280, 20, "To steer your figures in 1 player:", "white")
            text(150, 310, 20, "   The arrow keys and shift, to pause your map only", "white")
            
            text(150, 360, 20, "To steer your figures in 2 player:", "white")
            text(150, 390, 20, "   The arrow keys and shift, to pause your map only", "white")
            text(150, 420, 20, "   A, S, D, W and E, to pause your map only", "white")
            
            text(150, 470, 20, "To steer your figures in 3 player:", "white")
            text(150, 500, 20, "   The arrow keys and shift, to pause your map only", "white")
            text(150, 530, 20, "   A, S, D, W and E, to pause your map only", "white")
            text(150, 560, 20, "   U, H, J, K and I, to pause your map only", "white")
            
            text(150, 610, 15, "OBS! Pausing your map is only available in seperate gamemode.", "red")
            text(150, 630, 15, "   Otherwise use ESC, to pause the whole game", "red")
            text(150, 660, 15, "   ESC is also used to quit most pages. If you see the ESC up in the corner, you can use it!", "red")
            

                //  Esc för meny
            if(counter <= Date.now()-100){
                if(keyboard.esc){
                    gamestate = 0
                }
            }
        break
    }

}