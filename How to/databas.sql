/*  Skapar tabellen users och gör så att Email måste vara uniqe for the user*/
CREATE TABLE Users (
    userID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Username varchar(30) NOT NULL,
    Email varchar(100) UNIQUE,
    pwd varchar(255)
);

/*  Skapar tabellen msg kopplar ihop så att userID måste vara ett värde som finns i columnen ID i tabellen users*/
CREATE TABLE Msg (
    msgID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Content varchar(8000) NOT NULL,
    userID int NOT NULL,
    Datum datetime,
    CONSTRAINT fk_Users FOREIGN KEY (userID) REFERENCES Users(ID)
);


/* Lägger till en user som heter Joel, har en mail och ett lösenord */
INSERT INTO users (Email, Username, pwd)
VALUES ('hej@hej.com', 'Joel', 'Passwords123');

/* Lägger till ett meddelande med datum och vilken användare som skrev det; user med ID: 1*/
INSERT INTO msg (Content, Datum, userID)
VALUES ('Hej, här kommer ett meddelande!', '2022-11-09 10:02:16', 1);