/*  Skapar tabellen users och gör så att Email måste vara uniqe for the user*/
--  CREATE TABLE users (
--      UserID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
--      Username varchar(30) NOT NULL,
--      Email varchar(100) UNIQUE,
--      pwd varchar(255)
--  );

CREATE TABLE users (
    UserID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Email varchar(100) NOT NULL UNIQUE,
    Username varchar(50) NOT NULL,
    FirstName varchar(50),
    LastName varchar(50),
    Rank int
);


/*  Skapar tabellen msg kopplar ihop så att userID måste vara ett värde som finns i columnen ID i tabellen users*/
--  CREATE TABLE msg (
--      msgID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
--      Content varchar(8000) NOT NULL,
--      UserID int NOT NULL,
--      dt datetime,
--      CONSTRAINT fk_Users FOREIGN KEY (userID) REFERENCES Users(userID)
--  );

/*  Skapar tabellen readMsgs som innehåller ID på users och id:t på de meddelanden som usern läst*/
--  CREATE TABLE readMsgs (
--      readMsgsID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
--      userID int NOT NULL,
--      msgID int NOT NULL,
--      CONSTRAINT fk_Users_to_readMsgs FOREIGN KEY (userID) REFERENCES Users(userID),
--      CONSTRAINT fk_Msg_to_readMsgs FOREIGN KEY (msgID) REFERENCES Msg(msgID)
--  );

/* Skapar en tabell course som har id, namn och färg (! OLD !) */
--  CREATE TABLE course (
--      CourseID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
--      CourseName varchar(255),
--      CourseColor varchar(8)
--  );

/* Skapar en tabell course som har id, namn och färg */
CREATE TABLE course (
    CourseID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    SubjectID int /*NOT NULL*/,
    CourseName varchar(255),
    CourseCode varchar(10)
);


/* Skapar en tabell lessons som har id, namn och färg */
CREATE TABLE lesson (
    ID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    courseID int NOT NULL,
    classID int NOT NULL,
    roomID int,
    start DATETIME NOT NULL,
    end DATETIME NOT NULL,
    repeated int
);



/* Skapar en tabell class som har id, namn och färg */
CREATE TABLE class (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    className varchar(8),
    grade int
);

CREATE TABLE room (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(16)
);

--  Ska användas för att inte behöva separera ex. alla svenska kurserna på forumet utan de får vara samma
-- CREATE TABLE subject (
--     SubjectID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
--     SubjectName varchar(255),
--     TeacherID int NOT NULL
-- );


CREATE TABLE forum_question (
    QuestionID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    CourseID int NOT NULL,
    UserID int NOT NULL,
    Title varchar(80),
    Content varchar(1000),
    dt bigint,
    Upvote int
);

CREATE TABLE forum_answer (
    AnswerID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    QuestionID int NOT NULL,
    CommentID int,
    UserID int NOT NULL,
    Content varchar(1000),
    dt bigint,
    Upvote int
);

-- För matsedel
CREATE TABLE food_menu (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    dt date NOT NULL,
    food varchar(64),
    vegFood varchar(64),
    CO2 float, 
    vegCO2 float 
);

INSERT INTO food_menu (dt, food, vegFood, CO2, vegCO2)
VALUES ('2023-04-21', 'Köttbullar och potatis puré', 'Vegobullar', 0.94, 0.34);

INSERT INTO food_menu (dt, food, vegFood, CO2, vegCO2)
VALUES ('2023-04-19', 'Pannkakor', 'Pannkakor', 0.45, 0.45);

INSERT INTO food_menu (dt, food, vegFood, CO2, vegCO2)
VALUES ('2023-04-24', 'Oxpytt med rödbetor', 'Vegetarisk pytt med garbanzobönor serveras med rödbetor', 0.62, 0);

INSERT INTO food_menu (dt, food, vegFood, CO2, vegCO2)
VALUES ('2023-04-25', 'Pastasås med skinka samt pasta', 'Pastasås med blomkål och smörbönor serveras med pasta', 0.62, 0);

INSERT INTO food_menu (dt, food, vegFood, CO2, vegCO2)
VALUES ('2023-04-26', 'Panerad fisk med kokt potatis och kall citronsås', 'Morotsbiff med kokt potatis och kall citronsås', 0.6, 0.23);

INSERT INTO food_menu (dt, food, vegFood, CO2, vegCO2)
VALUES ('2023-04-27', 'Het sojafärsgryta med chili serveras med ris', 'Het sojafärsgryta med chili serveras med ris', 0.19, 0.19);

INSERT INTO food_menu (dt, food, vegFood, CO2, vegCO2)
VALUES ('2023-04-28', 'Nötfärsbiff med rostad potatis samt BBQsås', 'Vegetarisk schnitzel serveras med rostad potatis och bbq sås', 0.78, 0.24);



INSERT INTO food_menu (dt, food, vegFood, CO2, vegCO2)
VALUES ('2023-05-01', 'The Gradeless team wishes you a nice weekend/holiday', 'The Gradeless team wishes you a nice weekend/holiday', 0, 0);

INSERT INTO food_menu (dt, food, vegFood, CO2, vegCO2)
VALUES ('2023-05-02', 'Oxjärpar med kokt potatis och gräddsås', 'Vegan köttbullar med potatis och gräddsås', 2.06, 0.03);

INSERT INTO food_menu (dt, food, vegFood, CO2, vegCO2)
VALUES ('2023-05-03', 'Tomatsoppa serveras med mjukt bröd', 'Tomatsoppa serveras med mjukt bröd', 0.2, 0.2);

INSERT INTO food_menu (dt, food, vegFood, CO2, vegCO2)
VALUES ('2023-05-04', 'Grillkorv med hemlagat potatismos och gurkmajonnäs', 'Vegetarisk korv med potatismos och gurkmajonnäs', 0.54, 0.35);

INSERT INTO food_menu (dt, food, vegFood, CO2, vegCO2)
VALUES ('2023-05-05', 'Tacoröra serveras med ris och kall vitlökssås', 'Tacoröra på sojafärs serveras med ris och kall vitlökssås', 1.32, 0.14);



INSERT INTO food_menu (dt, food, vegFood, CO2, vegCO2)
VALUES ('2023-05-08', 'Korvstroganoff med ris', 'Kikärtsstroganoff serveras med ris', 0.46, 0.24);

INSERT INTO food_menu (dt, food, vegFood, CO2, vegCO2)
VALUES ('2023-05-09', 'Sprödbakad fisk med kokt potatis samt kall gräslökssås', 'Grönsaksbiff med kokt potatis och kall gräslökssås', 0.44, 0.12);

INSERT INTO food_menu (dt, food, vegFood, CO2, vegCO2)
VALUES ('2023-05-10', 'Köttbullar och makaroner och ketchup', 'Falafel med makaroner', 0.44, 0.14);

INSERT INTO food_menu (dt, food, vegFood, CO2, vegCO2)
VALUES ('2023-05-11', 'Kyckling med annans och curry serveras med ris', 'Garbanzobönor med ananas och curry serveras med ris', 0.41, 0.09);

INSERT INTO food_menu (dt, food, vegFood, CO2, vegCO2)
VALUES ('2023-05-12', 'Grekisk pastagratäng med oliver, tomat och salladsost', 'Tacoröra på sojafärs serveras med ris och kall vitlökssås', 0.3, 0.3);

-- CREATE TABLE food_Calendar (
--     DayID

--     WeekNumber
-- );



/* Lägger till en user som heter Joel, har en mail och ett lösenord */
INSERT INTO users (Email, Username, FirstName, LastName, Rank)
VALUES ('kirillyasniy@gmail.com', 'Vertushka', 'Kirill', 'Yasniy', 1);

/* Lägger till en user som heter Joel, har en mail och ett lösenord */
INSERT INTO users (Email, Username, FirstName, LastName, Rank)
VALUES ('hej@hej.com', 'Jolle43', 'Joel', 'Jägerskogh', 4);

/* Lägger till en user som heter Niklas, har en mail och ett lösenord */
INSERT INTO users (Email, Username, FirstName, LastName, Rank)
VALUES ('hej@hejj.com', 'Magistern', 'Niklas', 'Hellström', 3);



-- Skapar Subject
-- INSERT INTO subject (SubjectName, UserID)
-- VALUES ('Programering 1', 3);

-- INSERT INTO subject (SubjectName, UserID)
-- VALUES ('Tillämpad', 3);

-- INSERT INTO subject (SubjectName, UserID)
-- VALUES ('Programering 1', 3);


--  /* Lägger till ett meddelande med datum och vilken användare som skrev det; user med ID: 1*/
--  INSERT INTO msg (Content, dt, userID)
--  VALUES ('Hej, här kommer ett meddelande!', '2022-11-09 10:02:16', 1);

/* Lägger till en kurs Programering 1  och färgen Orange  (! OLD !)*/
--  INSERT INTO course (CourseName, CourseColor)
--  VALUES ('Programering 1', '#FF7D00');

/* Lägger till tre olika kurser och Kurskoder som kommer användas som ID:n */

-- Skapar TE21 som en klass som är 2:a året på gymnasiet
INSERT INTO class (className, grade)
VALUES ('TE22', 1);
INSERT INTO class (className, grade)
VALUES ('TE21', 2);
INSERT INTO class (className, grade)
VALUES ('TE20', 3);
INSERT INTO class (className, grade)
VALUES ('IT22', 1);
INSERT INTO class (className, grade)
VALUES ('IT21', 2);
INSERT INTO class (className, grade)
VALUES ('IT20', 3);

INSERT INTO room (name)
VALUES ('105');

-- Skapar programmering 1 på onsdagar kl 10:05-11:10
-- INSERT INTO lesson (courseID, classID, roomID, starts, ends, repeated)
-- VALUES (1, 1, 1, 1680509100000, 1680513000000, 2); -- 1: dayly 2: weekly, 3: monthly, 4: termin 5: yearly

-- Skapar programmering 1 på onsdagar kl 10:05-11:10
INSERT INTO lesson (courseID, classID, roomID, start, end, repeated)
VALUES (1, 1, 1, '2023-04-05 13:00:00', '2023-04-05 14:15:00', 2);  -- 1: dayly 2: weekly, 3: monthly, 4: termin 5: yearly
INSERT INTO lesson (courseID, classID, roomID, start, end, repeated)
VALUES (1, 1, 1, '2023-04-06 13:00:00', '2023-04-06 14:15:00', 2);  -- 1: dayly 2: weekly, 3: monthly, 4: termin 5: yearly
INSERT INTO lesson (courseID, classID, roomID, start, end, repeated)
VALUES (1, 1, 1, '2023-04-07 13:00:00', '2023-04-07 14:15:00', 2);  -- 1: dayly 2: weekly, 3: monthly, 4: termin 5: yearly



--  Programmering
INSERT INTO course (CourseName, CourseCode)
VALUES ('Programering', 'PRRPRR');


--  Webb...
INSERT INTO course (CourseName, CourseCode)
VALUES ('Webbutveckling', 'WEUWEB');


-- Engelska
INSERT INTO course (CourseName, CourseCode)
VALUES ('Engelska', 'ENGENG');


-- Svenska
INSERT INTO course (CourseName, CourseCode)
VALUES ('Svenska', 'SVESVE');


-- Fysik
INSERT INTO course (CourseName, CourseCode)
VALUES ('Fysik', 'FYSFYS');


-- Matematik
INSERT INTO course (CourseName, CourseCode)
VALUES ('Matematik', 'MATMAT');


-- Data
INSERT INTO course (CourseName, CourseCode)
VALUES ('Dator och nätverksteknik', 'DAODAC0');


-- Teknik
INSERT INTO course (CourseName, CourseCode)
VALUES ('Teknik', 'TEKTEK01');


-- Kemi
INSERT INTO course (CourseName, CourseCode)
VALUES ('Kemi', 'KEMKEM01');


-- Övrigt
INSERT INTO course (CourseName, CourseCode)
VALUES ('Mentorstid', 'BAVARDER0');

















/* Lägger till en fråga i databasen */
INSERT INTO forum_question (CourseID, UserID, Title, Content, dt, Upvote)
VALUES (1, 2, 'Hur gör man en webbsida i Javascript?', 'Jag har precis börjat 2:an och har kommit på att jag vill göra en webbsida. Jag tänker mig att den ska använda sig av php och en databas, men har inga förkunskaper. Hur gör man egentligen?', 1674747246925, 12345);

/* Lägger till ett svar på frågan ovan i databasen */
INSERT INTO forum_answer (QuestionID, UserID, Content, dt, Upvote)
VALUES (1, 3, 'Boom tjackalack! Den bästa lösningen är att Googla. Annars kan ni fråga mig ;)', 1674747246925, 4);

/* Lägger till en kommentar till svaret ovan */
INSERT INTO forum_answer (QuestionID, UserID, CommentID, Content, dt, Upvote)
VALUES (1, 2, 1, 'Tack så mycket för hjälpen Nicklas! Förresten har du någon server som står och skräpar? Skulle behöva en för att sjösätta webbsidan ;)', 1674747246925, 1);