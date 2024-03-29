    //переменная для отслеживания состояния игры, нужная, по сути, только для выигрыша на последнем ходе для предотвращения двойного реузультата
    //по типу "ничья, победили зеленые"
    var gameState = 0;
        //переменная для отслеживания длительности игры по ходам: каждый ход добавляет единицу, позволяя делать проверки в цикле
        var step = 0;
        //одна ячейка заднего фона
        var box = {
            s: 60,
            c: "red"
        };
        //массив "технической" информации про ячейки: состояние и координаты. Изменится при проверках, по умолчанию все - null
        var boxState = [{},{},{},{},{},{},{},{},{}];
        //Прямоугольнички для отрисовки полей клеток
        var field = {
            ws: 10,
            hs: 60,
            c: "black"
        }
        //крестик (квадратик в данном случае для упрощения, в итоговом проекте это в любом случае будет объект, состоящий из одной фигуры)
        var krestik = {
            ws: 40,
            wh: 40,
            c: "green"
        }

        var nolik = {
            r: 20,
            w: 5,
            c: "yellow"
        }
        //функция, отрисовывающая само поле: ячейки заднего фона + границы ячеек. По сути, здесь всегда будет центр экрана, в юнити задастся при
        //построении сцены, так что для упрощения забиваем.
        function drawField(x,y){
            save();
            translate(x,y);
            for(i = 0; i < 180; i+=60){
                for(a = 0; a < 180; a +=60){
                    rectangle(i, a, box.s, box.s, box.c);
                    if(i>0){
                        rectangle(i-5, a, field.ws, field.hs, field.c);
                    }
                    if(a>0){
                        rectangle(i, a-5, field.hs, field.ws, field.c);
                    }
                }
            }
            restore();
        }
        //функция отрисовки крестика (квадратика. Нужно передавать координаты!)
        function drawKrestik(x, y){  
            rectangle(x, y, krestik.ws, krestik.wh, krestik.c)   
        }

        function drawNolik(x,y){
            ring(x, y, nolik.r, nolik.w, nolik.c);
        }


    function update(){
        //рисуем само поле
        drawField(totalWidth/2-90, totalHeight/2-90);
        
        //..........ПРОВЕРКА НА НАЖАТИЕ В ОПРЕДЕЛЕННУЮ ЯЧЕЙКУ..........

        //общее для 1 строчки (т.к. одинаковый y)
        if(step%2 == 0 || step == 0){
        if(mouse.y > totalHeight/2-90 && mouse.y < totalHeight/2-35 && mouse.left){
            //левая верхняя ячейка (условие крестика. Проверка на: координаты по x, нажатие ЛКМ, состояние)
        if(mouse.x > totalWidth/2-90 && mouse.x < totalWidth/2-35 && boxState[0].state == null){
            //меняем состояние ячейки: занято крестиком + координаты постановки крестика    
            boxState[0] = {
                    state: 1,
                    x: totalWidth/2-80,
                    y: totalHeight/2-80
                };
            step++;
            } 
        
            //средняя верхняя ячейка
        if(mouse.x > totalWidth/2-30 && mouse.x < totalWidth/2+30 && boxState[1].state == null){
            boxState[1] = {
                state: 1,
                x: totalWidth/2-20,
                y: totalHeight/2-80
            }
            step++;
        }
        //правая верхняя ячейка
        if(mouse.x > totalWidth/2+35 && mouse.x < totalWidth/2+90 && boxState[2].state == null){
            boxState[2] = {
                state: 1,
                x: totalWidth/2+40,
                y: totalHeight/2-80
            }
            step++;
        }
        }  

        //СТРОЧКА 2
        if(mouse.y > totalHeight/2-30 && mouse.y < totalHeight/2+30 && mouse.left){
            //левая верхняя ячейка (условие крестика. Проверка на: координаты по x, нажатие ЛКМ, состояние)
        if(mouse.x > totalWidth/2-90 && mouse.x < totalWidth/2-35 && boxState[3].state == null){
            //меняем состояние ячейки: занято крестиком + координаты постановки крестика    
            boxState[3] = {
                    state: 1,
                    x: totalWidth/2-80,
                    y: totalHeight/2-20
                };
            step++;
            } 
        
            //средняя верхняя ячейка
        if(mouse.x > totalWidth/2-30 && mouse.x < totalWidth/2+30 && boxState[4].state == null){
            boxState[4] = {
                state: 1,
                x: totalWidth/2-20,
                y: totalHeight/2-20
            }
            step++;
        }
        //правая верхняя ячейка
        if(mouse.x > totalWidth/2+35 && mouse.x < totalWidth/2+90 && boxState[5].state == null){
            boxState[5] = {
                state: 1,
                x: totalWidth/2+40,
                y: totalHeight/2-20
            }
            step++;
        }
    }

        //СТРОЧКА 3
        if(mouse.y > totalHeight/2+30 && mouse.y < totalHeight/2+90 && mouse.left){
            //левая верхняя ячейка (условие крестика. Проверка на: координаты по x, нажатие ЛКМ, состояние)
        if(mouse.x > totalWidth/2-90 && mouse.x < totalWidth/2-35 && boxState[6].state == null){
            //меняем состояние ячейки: занято крестиком + координаты постановки крестика    
            boxState[6] = {
                    state: 1,
                    x: totalWidth/2-80,
                    y: totalHeight/2+40
                };
            step++;
            } 
        
            //средняя верхняя ячейка
        if(mouse.x > totalWidth/2-30 && mouse.x < totalWidth/2+30 && boxState[7].state == null){
            boxState[7] = {
                state: 1,
                x: totalWidth/2-20,
                y: totalHeight/2+40
            }
            step++;
        }
        //правая верхняя ячейка
        if(mouse.x > totalWidth/2+35 && mouse.x < totalWidth/2+90 && boxState[8].state == null){
            boxState[8] = {
                state: 1,
                x: totalWidth/2+40,
                y: totalHeight/2+40
            }
            step++;
        }
    }
    }


    //..........ПРОВЕРКА НА НАЖАТИЕ ДЛЯ НОЛИКА..........

    //общее для 1 строчки (т.к. одинаковый y)
    if(step%2 > 0){
    if(mouse.y > totalHeight/2-90 && mouse.y < totalHeight/2-35 && mouse.left){
            //левая верхняя ячейка (условие крестика. Проверка на: координаты по x, нажатие ЛКМ, состояние)
        if(mouse.x > totalWidth/2-90 && mouse.x < totalWidth/2-35 && boxState[0].state == null){
            //меняем состояние ячейки: занято крестиком + координаты постановки крестика    
            boxState[0] = {
                    state: 2,
                    x: totalWidth/2-80,
                    y: totalHeight/2-80
                };
            step++;
            } 
        
            //средняя верхняя ячейка
        if(mouse.x > totalWidth/2-30 && mouse.x < totalWidth/2+30 && boxState[1].state == null){
            boxState[1] = {
                state: 2,
                x: totalWidth/2-20,
                y: totalHeight/2-80
            }
            step++;
        }
        //правая верхняя ячейка
        if(mouse.x > totalWidth/2+35 && mouse.x < totalWidth/2+90 && boxState[2].state == null){
            boxState[2] = {
                state: 2,
                x: totalWidth/2+40,
                y: totalHeight/2-80
            }
            step++;
        }
        }  

        //СТРОЧКА 2
        if(mouse.y > totalHeight/2-30 && mouse.y < totalHeight/2+30 && mouse.left){
            //левая верхняя ячейка (условие крестика. Проверка на: координаты по x, нажатие ЛКМ, состояние)
        if(mouse.x > totalWidth/2-90 && mouse.x < totalWidth/2-35 && boxState[3].state == null){
            //меняем состояние ячейки: занято крестиком + координаты постановки крестика    
            boxState[3] = {
                    state: 2,
                    x: totalWidth/2-80,
                    y: totalHeight/2-20
                };
            step++;
            } 
        
            //средняя верхняя ячейка
        if(mouse.x > totalWidth/2-30 && mouse.x < totalWidth/2+30 && boxState[4].state == null){
            boxState[4] = {
                state: 2,
                x: totalWidth/2-20,
                y: totalHeight/2-20
            }
            step++;
        }
        //правая верхняя ячейка
        if(mouse.x > totalWidth/2+35 && mouse.x < totalWidth/2+90 && boxState[5].state == null){
            boxState[5] = {
                state: 2,
                x: totalWidth/2+40,
                y: totalHeight/2-20
            }
            step++;
        }
    }

        //СТРОЧКА 3
        if(mouse.y > totalHeight/2+30 && mouse.y < totalHeight/2+90 && mouse.left){
            //левая верхняя ячейка (условие крестика. Проверка на: координаты по x, нажатие ЛКМ, состояние)
        if(mouse.x > totalWidth/2-90 && mouse.x < totalWidth/2-35 && boxState[6].state == null){
            //меняем состояние ячейки: занято крестиком + координаты постановки крестика    
            boxState[6] = {
                    state: 2,
                    x: totalWidth/2-80,
                    y: totalHeight/2+40
                };
            step++;
            } 
        
            //средняя верхняя ячейка
        if(mouse.x > totalWidth/2-30 && mouse.x < totalWidth/2+30 && boxState[7].state == null){
            boxState[7] = {
                state: 2,
                x: totalWidth/2-20,
                y: totalHeight/2+40
            }
            step++;
        }
        //правая верхняя ячейка
        if(mouse.x > totalWidth/2+35 && mouse.x < totalWidth/2+90 && boxState[8].state == null){
            boxState[8] = {
                state: 2,
                x: totalWidth/2+40,
                y: totalHeight/2+40
            }
            step++;
        }
    }
    }


    //..........ПРОВЕРКА НА СОСТОЯНИЕ КАЖДОЙ ЯЧЕЙКИ И ОТРИСОВКА СООТВЕТСТВУЮЩИХ ФИГУР..........

    for(i = 0; i < boxState.length; i++){
        if(boxState[i].state == 1){
            drawKrestik(boxState[i].x, boxState[i].y);
        }
        if(boxState[i].state == 2){
            drawNolik(boxState[i].x+nolik.r, boxState[i].y+nolik.r);
        }
    }


    //..........ПРОВЕРКА НА ВЫИГРЫШ ДЛЯ КВАДРАТИКА..........
    for(i = 0; i < boxState.length; i++){
        if(i == 0 || i == 3 || i == 6){
            if(boxState[i].state+boxState[i+1].state+boxState[i+2].state == 3){
                    text(totalWidth/3, totalHeight/4, 30, "Green is winner!", "black");
                    stopUpdate();
                    gameState = 1;
                }
    }
    if(i == 2 || i == 1 || i == 0){
            if(boxState[i].state+boxState[i+3].state+boxState[i+6].state == 3){
                text(totalWidth/3, totalHeight/4, 30, "Green is winner!", "black");
                stopUpdate();
                gameState = 1;
            }
        }

    if(i == 0){
        if(boxState[i].state+boxState[i+4].state+boxState[i+8].state == 3){
            text(totalWidth/3, totalHeight/4, 30, "Green is winner!", "black");
                stopUpdate();
                gameState = 1;
        }
    }

    if(i == 2){
        if(boxState[i].state+boxState[i+2].state+boxState[i+4].state == 3){
            text(totalWidth/3, totalHeight/4, 30, "Green is winner!", "black");
                stopUpdate();
                gameState = 1;
        }
    }
}



//..........ПРОВЕРКА НА ВЫИГРЫШ ДЛЯ НОЛИКА..........
    for(i = 0; i < boxState.length; i++){
        if(i == 0 || i == 3 || i == 6){
            if(boxState[i].state+boxState[i+1].state+boxState[i+2].state == 6){
                    text(totalWidth/3, totalHeight/4, 30, "Yellow is winner!", "black");
                    stopUpdate();
                    gameState = 1;
                }
    }
    if(i == 2 || i == 1 || i == 0){
            if(boxState[i].state+boxState[i+3].state+boxState[i+6].state == 6){
                text(totalWidth/3, totalHeight/4, 30, "Yellow is winner!", "black");
                stopUpdate();
                gameState = 1;
            }
        }

    if(i == 0){
        if(boxState[i].state+boxState[i+4].state+boxState[i+8].state == 6){
            text(totalWidth/3, totalHeight/4, 30, "Yellow is winner!", "black");
                stopUpdate();
                gameState = 1;
        }
    }

    if(i == 2){
        if(boxState[i].state+boxState[i+2].state+boxState[i+4].state == 6){
            text(totalWidth/3, totalHeight/4, 30, "Yellow is winner!", "black");
                stopUpdate();
                gameState = 1;
        }
    }
}
    if(step == 9 && gameState == 0){
        text(totalWidth/3, totalHeight/4, 30, "There is no winner!", "black");
            stopUpdate();
    }
}