CREATE DATABASE card_came;
USE card_game;
CREATE TABLE cards
(
 id int NOT NULL AUTO_INCREMENT,
 PRIMARY KEY(id),
 CardName varchar(20),
 Strength int,
 Defense int,
 Owning int,
 Skills varchar(50)
); 


INSERT INTO cards (CardName,Strength,Defense,Owning,Skills) VALUES ('Card A',10,20,3,'Recover 150 points of vitality, Attack twice');
INSERT INTO cards (CardName,Strength,Defense,Owning,Skills) VALUES ('Card B',20,20,1,'Call a Monster');
INSERT INTO cards (CardName,Strength,Defense,Owning) VALUES ('Card C',30,30,5);
INSERT INTO cards (CardName,Strength,Defense,Owning,Skills) VALUES ('Card D',40,40,4,'Investigates enemy''s weakpoint');
INSERT INTO cards (CardName,Strength,Defense,Owning) VALUES ('Card E',40,50,7);
INSERT INTO cards (CardName,Strength,Defense,Owning,Skills) VALUES ('Card F',45,10,1,'Call a rescue');
INSERT INTO cards (CardName,Strength,Defense,Owning) VALUES ('Card G',35,20,2);
INSERT INTO cards (CardName,Strength,Defense,Owning) VALUES ('Card H',25,30,6);
INSERT INTO cards (CardName,Strength,Defense,Owning,Skills) VALUES ('Card I',15,40,4,'Enhance strength');
INSERT INTO cards (CardName,Strength,Defense,Owning,Skills) VALUES ('Card J',5,50,8,'Make Silence');


