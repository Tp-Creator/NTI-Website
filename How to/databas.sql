CREATE TABLE Users (
    ID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    FirstName varchar(30) NOT NULL,
    Email varchar(100) UNIQUE,
    pwd varchar(255)
);

CREATE TABLE Msg (
    ID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Content varchar(8000) NOT NULL,
    userID int NOT NULL,
    Datum datetime,
    CONSTRAINT fk_Users FOREIGN KEY (userID) REFERENCES Users(ID)
);



INSERT INTO users (Email, FirstName, pwd)
VALUES ('hej@hej.com', 'Joel', 'Passwords123');

INSERT INTO msg (Content, Datum, userID)
VALUES ('Hej, här kommer ett meddelande!', '2022-11-09 10:02:16', 1);