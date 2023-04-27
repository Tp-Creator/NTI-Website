/*          Oleksandr Semashov TE21 - Ukrainian Defender        */

timmer = 0 //Timmer för cooldown
gamestate = 0 //Startskärm

// Vet inte varför detta behövde deffinieras men det gjorde det...
totalWidth = window.innerWidth
totalHeight = window.innerHeight

var bStart =    {x: totalWidth/2-75,    y: totalHeight/2+50,  b:150, h:65, c:"grey"}
var bInst =     {x: totalWidth/2-100,   y: totalHeight/2+120, b:200, h:65, c:"grey"}
var bEasy =     {x: totalWidth/2-160,   y: totalHeight/2+190, b:100, h:40, c:"grey"}
var bNormal =   {x: totalWidth/2-50,    y: totalHeight/2+190, b:100, h:40, c:"grey"}
var bHard =     {x: totalWidth/2+60,    y: totalHeight/2+190, b:100, h:40, c:"grey"}
var bPA =       {x: totalWidth/2-125,   y: totalHeight/2+210, b:250, h:50, c:"grey"}

/*          Points          */
var score = 0
var highscore = 0

/*          Player som ska spela         */
var player = {x: totalWidth/2, y: totalHeight-180, b: 125, h: 100} 

/*          Levels          */
var level = 0

function easy(){
    rectangle(bEasy.x-5, bEasy.y-5, bEasy.b+10, bEasy.h+10, "yellow")
    
}

function normal(){
    rectangle(bNormal.x-5, bNormal.y-5, bNormal.b+10, bNormal.h+10, "blue")
}

function hard(){
    rectangle(bHard.x-5, bHard.y-5, bHard.b+10, bHard.h+10, "red")
}

/*          Skapar en array för motsåndarna         */
var enemys = [] 
for(cols = 0; cols <=4; cols++){ //Den del gör att det är 5 motståndare i 3 rader
    for(rad = 0; rad <=2; rad++){
        enemys.push(new Enemy(10+200*cols, 10+90*rad))
    }
}
/*          En konstrukt för motsåndarna            */
function Enemy(x, y, b, h, evx, nv, evx, nvx, hvx){ 
    this.x = x
    this.y = y
    this.b = 150
    this.h = 100

    /*          vx står för Hastighet(velocity)         */
    this.evx = 5 //easy
    this.nvx = 7 //normal
    this.hvx = 9 //hard

    this.drawEnemy = function(){ //en functionen som ritar mina motståndare
        picture(this.x, this.y, "/public/games/games/defenderOfUkraine/rhelicopter.png", this.b, this.h)
    }

    this.moveEnemy = function(){ //en functionen som gör röreslen för mina motståndarna
        if(level == 1){
            this.x += this.evx
        }
        if(level == 2){
            this.x += this.nvx
        }
        if(level == 3){
            this.x += this.hvx
        }
        if(this.x > totalWidth || this.x < 0-150 ){ //om motståndaren träffar väggen, då byter de till en rad ner och ändrar riktning
            this.y += 50
            if(level == 1){
                this.evx *= -1
            }
            if(level == 2){
                this.nvx *= -1
            }
            if(level == 3){
                this.hvx *= -1
            }
            
        }
    }
    
    this.hitWall = function(){ //en functionen som besktiver vad ska hända när motståndaren träffar hinder
        if(this.y > totalHeight/2+80){
            gamestate = 3
        }
    }
}

/*          En tom array för skotten            */
var shots = [] 
var shot = new Shot(player.x + player.b/2-15, player.y) //skapar en variabel för att filla i arrayen med koordinaterna av player

/*          En konstrukt för skotten            */
function Shot(x, y, b, h, d){ 
    this.x = x
    this.y = y
    this.b = 30 
    this.h = 25 

    this.d = 20 //distance

    this.s = 10

    this.drawShot = function(){ //den del ritar skotten 
        picture(this.x, this.y, "/public/games/games/defenderOfUkraine/bullet.png", this.b, this.h)
    }
    this.follow = function() { //den del gör att skotten kommer vara separata efter att du har skjutit(tryckt på space)
        this.x = player.x + player.b/2-15
    }
    this.fire = function(){ //den del gör att skotten rör sig uppåt med något(bättre med hastighet nära 20) hastighet efter du har tryckt space
        this.y -= 20
    }
    this.check = function(index){ //denna del ser till att när kulan träffar fienden så försvinner han
        for (var i=0; i<enemys.length; i++) {
            if(level == 1){
                this.d = 30
                this.s = 10
            }
            if(level == 2){
                this.d = 20
                this.s = 20
            }
            if(level == 3){
                this.d = 15
                this.s = 30
            }
            if (distance(this.x+this.b/2, this.y, enemys[i].x+enemys[i].b/2, enemys[i].y+enemys[i].h/2) < this.d){
                enemys.splice(i, 1)
                shots.splice(index, i)
                
                picture(this.x-this.b, this.y, "/public/games/games/defenderOfUkraine/boom.png", 100, 100) 
                score += this.s
                if(enemys.length == 0){
                    gamestate = 2
                }
            }
        }
    }
}

/*          Function för att starta om spelet           */
function resetData(){ 
    /*          Startar om players koordinater till mitten av skärmen           */
    player.x = totalWidth/2
    player.y = totalHeight-200

    
    score = 0 //reset the score for player

    /*          Starta om skotten och motståndarna          */
    enemys = [] //rensar motståndarna(array) och startar om den i gamestate 1
    for(cols = 0; cols <=4; cols++){
    for(rad = 0; rad <=2; rad++){
        enemys.push(new Enemy(10+200*cols, 10+90*rad))
    }
}
    shots = [] //rensar skotten(array) och startar om den i gamestate 1
    for(i=0; i<shots.length; i++){ 
        shots.push(new Shot(player.x + player.b/2-15, player.y))

    }
}

/*          Rörelse och vägg            */
function movement(){
    player.lx = 5

    if(level == 1){
        player.lx = 5
    }
    if(level == 2){
        player.lx = 3
    }
    if(level == 3){
        player.lx = 2
    }
    if(keyboard.left || keyboard.a) {player.x -= player.lx}
    if(keyboard.right || keyboard.d) {player.x += player.lx}

    /*          Vägg för player         */
    if(player.x < 0){  
        player.x = 1
    } 
    if(player.x > totalWidth - player.b){
        player.x = totalWidth - player.b
    }
}

function points(){ //function that save the score
    if(score > highscore){
                highscore = score
            }
    rectangle(130, totalHeight-120, 200, 80, "black")
        text(150, totalHeight-100, 15, "Score:"+score, "white")
        text(150, totalHeight-50, 15, "High Scire:"+highscore, "white")
}



function update(){
    clearScreen()
    switch(gamestate){ 
        /*          Startskärm           */
        case 0:
            picture(0, 0, "/public/games/games/defenderOfUkraine/land.png", totalWidth, totalHeight)

            /*          Buttons         */
            if(mouse.x>bStart.x && mouse.x<bStart.x+150 && mouse.y>bStart.y && mouse.y<bStart.y+65 && mouse.left){
                clearScreen()
                gamestate = 1  
            }

            if(mouse.x>bInst.x && mouse.x<bInst.x+150 && mouse.y>bInst.y && mouse.y<bInst.y+65 && mouse.left){
                clearScreen()
                gamestate = "Instructions"
            }

            if(mouse.x>bEasy.x && mouse.x<bEasy.x+100 && mouse.y>bEasy.y && mouse.y<bEasy.y+40 && mouse.left){
                level = 1
            }
                if(level == 1){
                    easy()
                }

            if(mouse.x>bNormal.x && mouse.x<bNormal.x+100 && mouse.y>bNormal.y && mouse.y<bNormal.y+40 && mouse.left){
                level = 2
            }
                if(level == 2){
                        normal()
                    }

            if(mouse.x>bHard.x && mouse.x<bHard.x+100 && mouse.y>bHard.y && mouse.y<bHard.y+40 && mouse.left){
                level = 3
            }
                if(level == 3){
                        hard()
                    }
                    
            /*          Play            */
            rectangle(bStart.x, bStart.y, bStart.b, bStart.h, bStart.c)
                text(bStart.x+42.5, bStart.y+40, 20, "Play", "white")
            /*          Settings            */
            rectangle(bInst.x, bInst.y, bInst.b, bInst.h, bInst.c)
                text(bInst.x+4, bInst.y+40, 20, "Instructions", "white")
            /*          Easy            */
            rectangle(bEasy.x, bEasy.y, bEasy.b, bEasy.h, bEasy.c) 
                text(bEasy.x+17.5, bEasy.y+30, 20, "Easy", "yellow")
            /*          Normal            */
            rectangle(bNormal.x, bNormal.y, bNormal.b, bNormal.h, bNormal.c) 
                text(bNormal.x+2.5, bNormal.y+30, 20, "Normal", "blue")
            /*          Hard            */
            rectangle(bHard.x, bHard.y, bHard.b, bHard.h, bHard.c)
                text(bHard.x+20, bHard.y+30, 20, "Hard", "red")
        break

        /*          Spelet börjas           */
        case 1:
            picture(0, 0, "/public/games/games/defenderOfUkraine/landP.png", totalWidth, totalHeight)
            text(100, totalHeight-30, 20, "Score:"+score, "white")
            text(totalWidth-300, totalHeight-30, 25, "Restart: R", "white")
            if(keyboard.r){
                clearScreen()
                resetData()
                gamestate = 0
            }

            if(level == 0){
                rectangle(totalWidth/2+300, 80, 260, 160, "black")
                    text(totalWidth/2+310, 100, 15, "You didn't choose", "white")
                    text(totalWidth/2+310, 130, 15, "a difficulty level,", "white")
                    text(totalWidth/2+310, 160, 15, "this is a test groud,", "white")
                    text(totalWidth/2+310, 190, 15, "when you're done,", "white")
                    text(totalWidth/2+310, 220, 15, "press R", "white")

            }

            movement() //ropar på function movment
            
            picture(player.x, player.y, "/public/games/games/defenderOfUkraine/utank.png", player.b, player.h)

            /*          Hinder för motståndarna         */
            //line(0, totalHeight/2+150, totalWidth, totalHeight/2+150, 5, "yellow")

            //ropar på konstuktorn shot
            shot.follow() 

            /*          Ammunition omladdning           */
            if (timmer>0) {timmer--} //!timer --> om det är noll, då kör! 
            if(keyboard.space && !timmer){ //det gör att spelaren kan trycka på space och skjuta
                if(level == 0 || level == 1){
                    timmer = 10
                }
                if(level == 2 || level == 3){
                    timmer = 20
                } 
                shots.push(new Shot(player.x + player.b/2-15, player.y))
            }

            /*          En loop som ropar på allafunctioner med skotten         */
            for (var i=0; i<shots.length; i++){ //den raden gör array för skotten att man kan skjuta och det skapar en ny skottvarje gång 
                shots[i].drawShot() //den del ritar skotten
                shots[i].fire() //den del är rörelse för skotten
                shots[i].check(i) //den del ser till att skotten träffar motståndaren 
            }

            /*          En loop som ropar på alla functioner med motståndarna           */
            for(i = 0; i < enemys.length; i++){  
                enemys[i].drawEnemy() //ritat motståndarna
                enemys[i].hitWall() //ser till om de träffar hinder
                enemys[i].moveEnemy()
            }

            /*          TEST            */
            
            if(keyboard.o){ 
                gamestate = 2
            }

            if(keyboard.l){ 
                gamestate = 3
            }

            break

        case "Instructions":
            clearScreen()
            picture(0, 0, "/public/games/games/defenderOfUkraine/settings.png", totalWidth, totalHeight)

            /*          27 is escape            */
            if(keyboard[27]){
                clearScreen()
                gamestate = 0
            }
            
            
            break   

        /*          GameOver, spelaren vinner          */
        case 2:
            clearScreen()
            picture(0, 0, "/public/games/games/defenderOfUkraine/win.png", 1536, 714)
            
            points()

                /*          Play Again            */
                rectangle(bPA.x, bPA.y, bPA.b, bPA.h, bPA.c)
                text(bPA.x+45, bPA.y+32.5, 20, "Play Again", "white")
            
            if(mouse.x>bPA.x && mouse.x<bPA.x+150 && mouse.y>bPA.y && mouse.y<bPA.y+65 && mouse.left){
                clearScreen()
                resetData()
                gamestate = 0
            }

            break

        /*          GameOver, spelaren förlurar         */
        case 3: 
            clearScreen()
            picture(0, 0, "/public/games/games/defenderOfUkraine/lose.png", totalWidth, totalHeight)
            picture(totalWidth-500, totalHeight-300, "/public/games/games/defenderOfUkraine/lose.webp", 360, 245)

            rectangle(totalWidth/2-200, totalHeight/2+125, 425, 70, "black")
                text(totalWidth/2-175, totalHeight/2+170, 25, "Game over, you lose", "white")

            points()
        
            rectangle(bPA.x, bPA.y, bPA.b, bPA.h, bPA.c)
                text(bPA.x+45, bPA.y+32.5, 20, "Play Again", "white")
            
            if(mouse.x>bPA.x && mouse.x<bPA.x+150 && mouse.y>bPA.y && mouse.y<bPA.y+65 && mouse.left){
                clearScreen()
                resetData()
                gamestate = 0
            }
        break
    }
}