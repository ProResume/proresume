CREATE TABLE Users
(
	UserId int auto_increment NOT NULL,
    FirstName varchar(30) NOT NULL,
    LastName varchar(30) NOT NULL,
    City varchar(100),
    State varchar(2) NOT NULL,
    Country varchar(3) NOT NULL,
    Email varchar(100) NOT NULL,
    Pw varchar(100) NOT NULL,
    WebLink varchar(100),
    AltEmail varchar(100),
    AltPhone varchar(100),
    Obj varchar(140),
    Statement varchar(500),
    PRIMARY KEY (UserId)
);

CREATE TABLE EducationInfo
(
	EduId int auto_increment NOT NULL,
    UserId int NOT NULL,
    PRIMARY KEY (EduId),
    FOREIGN KEY (UserId) REFERENCES Users(UserId)
);

CREATE TABLE ExperienceInfo
(
	ExpId int auto_increment NOT NULL,
    UserId int NOT NULL,
    PRIMARY KEY (ExpId),
    FOREIGN KEY (UserId) REFERENCES Users(UserId)
);

CREATE TABLE SkillsInfo
(
	SkillId int auto_increment NOT NULL,
    UserId int NOT NULL,
    PRIMARY KEY (SkillId),
    FOREIGN KEY (UserId) REFERENCES Users(UserId)
);

CREATE TABLE ProjectsInfo
(
	ProjId int auto_increment NOT NULL,
    UserId int NOT NULL,
    PRIMARY KEY (ProjId),
    FOREIGN KEY (UserId) REFERENCES Users(UserId)
);

CREATE TABLE InterestsInfo
(
	InterestId int auto_increment NOT NULL,
    UserId int NOT NULL,
    PRIMARY KEY (InterestId),
    FOREIGN KEY (UserId) REFERENCES Users(UserId)
);

CREATE TABLE VolunteerInfo
(
	VolunteerId int auto_increment NOT NULL,
    UserId int NOT NULL,
    PRIMARY KEY (VolunteerId),
    FOREIGN KEY (UserId) REFERENCES Users(UserId)
);


CREATE TABLE AwardsInfo
(
	AwardId int auto_increment NOT NULL,
    UserId int NOT NULL,
    PRIMARY KEY (AwardId),
    FOREIGN KEY (UserId) REFERENCES Users(UserId)
);




