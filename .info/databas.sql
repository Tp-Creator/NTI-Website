/*  Skapar tabellen users och gör så att Email måste vara uniqe for the user*/
-- CREATE TABLE users (
--     UserID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
--     Username varchar(30) NOT NULL,
--     Email varchar(100) UNIQUE,
--     pwd varchar(255)
-- );

CREATE TABLE users (
    UserID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Email varchar(100) NOT NULL UNIQUE,
    Username varchar(50) NOT NULL,
    FirstName varchar(50),
    LastName varchar(50),
    Rank int
);


/*  Skapar tabellen msg kopplar ihop så att userID måste vara ett värde som finns i columnen ID i tabellen users*/
-- CREATE TABLE msg (
--     msgID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
--     Content varchar(8000) NOT NULL,
--     UserID int NOT NULL,
--     dt datetime,
--     CONSTRAINT fk_Users FOREIGN KEY (userID) REFERENCES Users(userID)
-- );

/*  Skapar tabellen readMsgs som innehåller ID på users och id:t på de meddelanden som usern läst*/
-- CREATE TABLE readMsgs (
--     readMsgsID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
--     userID int NOT NULL,
--     msgID int NOT NULL,
--     CONSTRAINT fk_Users_to_readMsgs FOREIGN KEY (userID) REFERENCES Users(userID),
--     CONSTRAINT fk_Msg_to_readMsgs FOREIGN KEY (msgID) REFERENCES Msg(msgID)
-- );

/* Skapar en tabell course som har id, namn och färg (! OLD !) */
-- CREATE TABLE course (
--     CourseID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
--     CourseName varchar(255),
--     CourseColor varchar(8)
-- );

/* Skapar en tabell course som har id, namn och färg */
CREATE TABLE course (
    CourseID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    CourseName varchar(255),
    CourseCode varchar(10)
);

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




/* Lägger till en user som heter Joel, har en mail och ett lösenord */
INSERT INTO users (Email, Username, FirstName, LastName, Rank)
VALUES ('kirillyasniy@gmail.com', 'Vertushka', 'Kirill', 'Yasniy', 1);

/* Lägger till en user som heter Joel, har en mail och ett lösenord */
INSERT INTO users (Email, Username, FirstName, LastName, Rank)
VALUES ('hej@hej.com', 'Jolle43', 'Joel', 'Jägerskogh', 4);

/* Lägger till en user som heter Niklas, har en mail och ett lösenord */
INSERT INTO users (Email, Username, FirstName, LastName, Rank)
VALUES ('hej@hejj.com', 'Magistern', 'Niklas', 'Hellström', 3);


-- /* Lägger till ett meddelande med datum och vilken användare som skrev det; user med ID: 1*/
-- INSERT INTO msg (Content, dt, userID)
-- VALUES ('Hej, här kommer ett meddelande!', '2022-11-09 10:02:16', 1);

/* Lägger till en kurs Programering 1  och färgen Orange  (! OLD !)*/
-- INSERT INTO course (CourseName, CourseColor)
-- VALUES ('Programering 1', '#FF7D00');

/* Lägger till tre olika kurser och Kurskoder som kommer användas som ID:n */
INSERT INTO course (CourseName, CourseCode)
VALUES ('Programering 1', 'PRRPRR');

INSERT INTO course (CourseName, CourseCode)
VALUES ('Webbutveckling 1', 'WEBUTV1');

INSERT INTO course (CourseName, CourseCode)
VALUES ('Engelska 6', 'ENGENG6');


/* Lägger till en fråga i databasen */
INSERT INTO forum_question (CourseID, UserID, Title, Content, dt, Upvote)
VALUES (1, 2, 'Hur gör man en webbsida i Javascript?', 'Jag har precis börjat 2:an och har kommit på att jag vill göra en webbsida. Jag tänker mig att den ska använda sig av php och en databas, men har inga förkunskaper. Hur gör man egentligen?', 1674747246925, 12345);

/* Lägger till ett svar på frågan ovan i databasen */
INSERT INTO forum_answer (QuestionID, UserID, Content, dt, Upvote)
VALUES (1, 3, 'Boom tjackalack! Den bästa lösningen är att Googla. Annars kan ni fråga mig ;)', 1674747246925, 4);

/* Lägger till en kommentar till svaret ovan */
INSERT INTO forum_answer (QuestionID, UserID, CommentID, Content, dt, Upvote)
VALUES (1, 2, 1, 'Tack så mycket för hjälpen Nicklas! Förresten har du någon server som står och skräpar? Skulle behöva en för att sjösätta webbsidan ;)', 1674747246925, 1);