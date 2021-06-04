insert into Band
values ('Nothing But Thieves','Nothing But Thieves are an English alternative rock band, formed in 2012 in Southend-on-Sea, Essex.');
insert into Band
values ('The Killers','The Killers are an American rock band formed in Las Vegas in 2001.');
insert into Band
values ('Twenty One Pilots','21P is an American musical duo from Columbus, Ohio. The band was formed in 2009 by lead vocalist Tyler Joseph along with Nick Thomas and Chris Salih, both of whom left in 2011.');
insert into Band
values ('Kings of Leon','Kings of Leon is an American rock band that formed in Nashville, Tennessee, in 1999.');
insert into Band
values('Black Eyed Peas','Originally an alternative hip hop group, they subsequently changed their musical sound to pop and dance-pop music.');
insert into Band
values ('The Rolling Stones','The Rolling Stones are an English rock band formed in London in 1962.');
select * from Band;
insert into Concerts
values (1000,'NBT Tour','Nothing But Thieves','2020-08-20');
insert into Concerts
values (1001,'NBT Tour','Nothing But Thieves','2020-10-10');
insert into Concerts
values (1002,'NBT Tour','Nothing But Thieves','2021-02-07');
insert into Concerts
values (1003,'The Killers take the world','The Killers','2020-06-22');
insert into Concerts
values (1004,'21P','Twenty One Pilots','2020-08-15');
insert into Concerts
values (1005,'21p','Twenty One Pilots','2020-09-20');
insert into Concerts
values (1006,'Around the world','Kings of Leon','2020-11-10');
insert into Concerts
values (1007,'Around the world','Kings of Leon','2021-03-12');
insert into Concerts
values (1008,'The Killers take the world','The Killers','2020-07-22');
insert into Concerts
values (1009,'E.N.D Tour','Black Eyed Peas','2020-07-17');
insert into Concerts
values (1010,'E.N.D Tour','Black Eyed Peas','2020-08-22');
insert into Concerts
values (1011,'E.N.D Tour','Black Eyed Peas','2020-10-08');
insert into Concerts
values (1012,'Stones','The Rolling Stones','2020-06-20');
insert into Concerts
values (1013,'Stones','The Rolling Stones','2020-10-15');
insert into Concerts
values (1014,'Stones','The Rolling Stones','2021-01-22');
insert into TypeOfMusic
values (1,'Nothing But Thieves','alternative rock');
insert into TypeOfMusic
values (2,'The Rolling Stones','rock');
insert into TypeOfMusic
values (3,'Black Eyed Peas','pop');
insert into TypeOfMusic
values (4,'Twenty One Pilots','alternative hip hop');
insert into TypeOfMusic
values (5,'The Killers','indie rock');
select * from TypeOfMusic;
insert into tickets
values (1,1000,1200,100);
insert into tickets
values (2,1001,10000,50);
insert into tickets
values (3,1002,10000,55);
insert into tickets
values (4,1003,8000,20);
insert into tickets
values (5,1004,50000,70);
insert into tickets
values (6,1005,50000,70);
insert into tickets
values (7,1006,100000,40);
insert into tickets
values (8,1007,90000,50);
insert into tickets
values (9,1008,10000,50);
insert into tickets
values (10,1009,100000,20);
insert into tickets
values (11,1010,100500,20);
insert into tickets
values (12,1011,100000,20);
insert into tickets
values (13,1012,500000,30);
insert into tickets
values (14,1013,120000,50);
insert into tickets
values (15,1014,200000,50);
select * from Tickets;
insert into members
values (1,'Nothing But Thieves','Conor Mason','lead vocalist, guitarist');
insert into members
values (2,'Nothing But Thieves','Joe Langridge-Brown','guitarist, backing vocalist');
insert into members 
values (3,'Nothing But Thieves','Dominic Craik','guitarist, backing vocalist');
insert into members
values (4,'Nothing But Thieves','Philip Blake','gass guitarist');
insert into members
values (5,'Nothing But Thieves','James Price','drummer');
insert into members
values (6,'The Rolling Stones','Mick Jagger','lead and backing vocalist,rhythm guitarist');
insert into members
values (7,'The Rolling Stones','Keith Richards','lead and rhythm guitarist, backing and lead vocalist' );
insert into members
values (8,'The Rolling Stones','Charlie Watts','drummer, backing vocalist' );
insert into members
values (9,'The Rolling Stones','Ronnie Wood','lead and rhythm guitarist, bass guitarist, backing vocalist' );
insert into members
values (10,'Twenty One Pilots','Tyler Joseph','lead vocalist, bass guitarist, guitarist' );
insert into members
values (11,'Twenty One Pilots','Josh Dun','drummer' );
insert into members
values (12,'Black Eyed Peas','Will-i-am','vocalist, bass guitarist' );
insert into members
values (13,'Black Eyed Peas','Apl.de.ap','vocalist, drummer' );
insert into members
values (14,'Black Eyed Peas','Taboo','vocalist, guitarist, DJ' );
insert into members
values (15,'Black Eyed Peas','J Rey Soul','vocalist' );
insert into members
values (16,'The Killers','Brandon Flowers','vocalist, synthesizer' );
insert into members
values (17,'The Killers','Dave Keuning','lead guitarist, backing vocalist' );
insert into members
values (18,'The Killers','Mark Stoermer','bassist, backing vocalist, rhythm guitarist' );
insert into members
values (19,'The Killers','Ronnie Vannucci','drummer, percussion, rhythm guitarist' );
select * from members;
insert into place
values (1,1000,'Romania','Cluj Napoca');
insert into place
values (2,1001,'England','London');
insert into place
values (3,1002,'Holland','Amsterdam');
insert into place
values (4,1003,'Romania','Bucuresti');
insert into place
values (5,1004,'England','London');
insert into place
values (6,1005,'England','Brighton');
insert into place
values (7,1006,'Poland','Warsaw');
insert into place
values (8,1007,'Japan','Tokyo');
insert into place
values (9,1008,'France','Paris');
insert into place
values (10,1009,'United States','New York');
insert into place
values (11,1010,'England','London');
insert into place
values (12,1011,'Germany','Frankfurt');
insert into place
values (13,1012,'Denmark','Copenhagen');
insert into place
values (14,1013,'Singapore','Singapore');
insert into place
values (15,1014,'China','Beijing');

select * from place;