CREATE TABLE Band(
NameOfBand VARCHAR(50) NOT NULL PRIMARY KEY,
MoreAboutTheBand VARCHAR(250)
); 
CREATE TABLE Concerts (
ConcertID INT NOT NULL PRIMARY KEY,
NameOfConcert VARCHAR(50) NOT NULL,
NameOfBand VARCHAR(50) NOT NULL,
CONSTRAINT FK_Band FOREIGN KEY (NameOfBand)
      REFERENCES Band(NameOfBand) ON DELETE CASCADE,
DateofConcert DATE NOT NULL
);
CREATE TABLE TypeOfMusic(
TypeOfMusicID int  AUTO_INCREMENT,
NameOfBand VARCHAR(50) NOT NULL,
Genre VARCHAR(50) NOT NULL,
PRIMARY KEY (TypeOfMusicID)
);
alter table typeofmusic
add foreign key(NameOfBand) references Band(NameOfBand) ON DELETE CASCADE;
CREATE TABLE Members(
MemberID INT NOT NULL AUTO_INCREMENT,
NameOfBand VARCHAR(50) NOT NULL,
Name VARCHAR(70) NOT NULL,
Occupation VARCHAR(200) NOT NULL,
PRIMARY KEY(MemberID)
);
alter table Members
add foreign key(NameOfBand) references Band(NameOfBand) on delete cascade;
CREATE TABLE Place(
PlaceID INT NOT NULL AUTO_INCREMENT,
ConcertID INT NOT NULL,
Country VARCHAR(50) NOT NULL,
City VARCHAR(50) NOT NULL,
PRMARY KEY(PlaceID)
);
alter table place
add foreign key(ConcertID) references Concerts(ConcertID) on delete cascade;
CREATE TABLE Tickets(
TicketsID INT NOT NULL AUTO_INCREMENT,
ConcertID INT NOT NULL,
NumberOfTickets INT NOT NULL,
Price INT NOT NULL,
PRIMARY KEY(TicketsID)
);
alter table Tickets
add foreign key(ConcertID) references Concerts(ConcertID) on cascade delete;



