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
    InstitutionName varchar(100),
    YearStarted year,
    YearEnded year,
    Major varchar(100),
    SecondMajor varchar(100),
    Minor varchar(100),
    SecondMinor varchar(100),
    PRIMARY KEY (EduId),
    FOREIGN KEY (UserId) REFERENCES Users(UserId)
);

CREATE TABLE ExperienceInfo
(
	ExpId int auto_increment NOT NULL,
    UserId int NOT NULL,
	CompanyName varchar(100),
    YearStarted year,
    YearEnded year,
    JobRole varchar(100),
    JobDescript varchar(250),
    PRIMARY KEY (ExpId),
    FOREIGN KEY (UserId) REFERENCES Users(UserId)
);

CREATE TABLE SkillsInfo
(
	SkillId int auto_increment NOT NULL,
    UserId int NOT NULL,
    Skill varchar(50),
    Proficiency ENUM('1','2','3','4','5'),
    PRIMARY KEY (SkillId),
    FOREIGN KEY (UserId) REFERENCES Users(UserId)
);

CREATE TABLE ProjectsInfo
(
	ProjId int auto_increment NOT NULL,
    UserId int NOT NULL,
	OrganizationName varchar(100),
    YearStarted year,
    YearEnded year,
    JobRole varchar(100),
    JobDescript varchar(250),
    PRIMARY KEY (ProjId),
    FOREIGN KEY (UserId) REFERENCES Users(UserId)
);

CREATE TABLE InterestsInfo
(
	InterestId int auto_increment NOT NULL,
    UserId int NOT NULL,
    Interest varchar(50),
    PRIMARY KEY (InterestId),
    FOREIGN KEY (UserId) REFERENCES Users(UserId)
);

CREATE TABLE VolunteerInfo
(
	VolunteerId int auto_increment NOT NULL,
    UserId int NOT NULL,
	OrganizationName varchar(100),
    YearStarted year,
    YearEnded year,
    JobRole varchar(100),
    JobDescript varchar(250),
    PRIMARY KEY (VolunteerId),
    FOREIGN KEY (UserId) REFERENCES Users(UserId)
);


CREATE TABLE AwardsInfo
(
	AwardId int auto_increment NOT NULL,
    UserId int NOT NULL,
	AdministerName varchar(100),
    YearReceived year,
	AwardName varchar(100),
    AwardDescript varchar(250),
    PRIMARY KEY (AwardId),
    FOREIGN KEY (UserId) REFERENCES Users(UserId)
);

CREATE TABLE ResumeTypes
(
	UserId int NOT NULL,
	ResumeType ENUM('business','engineer','nonprofit','design','custom') NOT NULL,
    ResumeId int NOT NULL,
    PRIMARY KEY (ResumeType),
    FOREIGN KEY (UserId) REFERENCES Users(UserId),
    FOREIGN KEY (ResumeId) REFERENCES Resumes(ResumeId)
);

CREATE TABLE Resumes
(
	ResumeId int auto_increment NOT NULL,
    UserId int NOT NULL,
    ResumeType ENUM('business','engineer','nonprofit','design','custom') NOT NULL,
    Header int,
    Footer int,
    Top int,
    TopLeft int,
    TopRight int,
    Middle int,
	MiddleLeft int,
    MiddleRight int,
    Bottom int,
	BottomLeft int,
    BottomRight int,
    PRIMARY KEY (ResumeId),
    FOREIGN KEY (ResumeType) REFERENCES ResumeTypes(ResumeType),
    FOREIGN KEY (UserId) REFERENCES Users(UserId)
);

CREATE TABLE Items
(
	ItemId int auto_increment NOT NULL,
    PRIMARY KEY (ItemId)
);


