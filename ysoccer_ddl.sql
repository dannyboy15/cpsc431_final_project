--All basic info is in
--Needs to be added: RegExp for email and passwords
--					enum type for roles
--					more insert statements
--Needs discussing: whether or not adult and userAcct should be linked by foreign key or separate table
drop   database if exists     YSoccerDB;
create database if not exists YSoccerDB;


drop user if exists 'phpWebEngine';
grant select, insert, delete, update, execute on YSoccerDB.* to 'phpWebEngine' identified by 'withheld';



use CSPS_431_HW3;

CREATE TABLE UserAcct
( ID            INTEGER UNSIGNED  NOT NULL    AUTO_INCREMENT  PRIMARY KEY,
  Email		    VARCHAR(150)	  NOT NULL,
  Password      VARCHAR(15)       NOT NULL,
  --role should be enum?
  Role          VARCHAR(250),
  AdultID       INTEGER UNSIGNED,
  
  FOREIGN KEY (AdultId) REFERENCES Adult(ID) ON DELETE CASCADE

  -- Need reg exp for email & password
--  CHECK (ZipCode REGEXP '(?!0{5})(?!9{5})\\d{5}(-(?!0{4})(?!9{4})\\d{4})?'),
);

INSERT INTO UserAcct VALUES
('1', 'janesmith45@gmail.com', 'password123', 'Coach','101');


CREATE TABLE Adult
( ID            INTEGER UNSIGNED  NOT NULL    AUTO_INCREMENT  PRIMARY KEY,
  Name_First    VARCHAR(100),
  Name_Last     VARCHAR(150)      NOT NULL,
  Email			VARCHAR(150)      NOT NULL,
  Phone			CHAR (7),		--7 or 10?
  Street        VARCHAR(250),
  City          VARCHAR(100),
  State         VARCHAR(100),
  ZipCode       CHAR(10),

  --Need regexp for email and phone
  -- Zip code rules:
  --   5 digits, not all are zero and not all are nine, 
  --   optionally followed by a hyphen and 4 digits, not all are zero and not all are nine.
  CHECK (ZipCode REGEXP '(?!0{5})(?!9{5})\\d{5}(-(?!0{4})(?!9{4})\\d{4})?'),
  
);
INSERT INTO UserAcct VALUES
('101', 'Jane', 'Smith', 'janesmith45@gmail','7145556262', '2569 Apple St.', 'Fullerton', 'CA', '92831');

CREATE TABLE Child
( ID            INTEGER UNSIGNED  NOT NULL    AUTO_INCREMENT  PRIMARY KEY,
  AdultId		INTEGER UNSIGNED  NOT NULL,
  Name_First    VARCHAR(100),
  Name_Last     VARCHAR(150)      NOT NULL,
  Position[]		VARCHAR(150),
  Goals			INTEGER,
  
  FOREIGN KEY (AdultId) REFERENCES Adult(ID) ON DELETE CASCADE
);


CREATE TABLE Matches
( ID            INTEGER UNSIGNED  NOT NULL    AUTO_INCREMENT  PRIMARY KEY,
  Opponent      VARCHAR(200)      NOT NULL,
  Location      VARCHAR(200)      NOT NULL,
  Street        VARCHAR(250),
  City          VARCHAR(100),
  State         VARCHAR(100),
  Country       VARCHAR(100),
  ZipCode       CHAR(10),
  Score         INTEGER UNSIGNED,
  TeamRank      INTEGER UNSIGNED,
  PlayerID[]    INTEGER UNSIGNED,
  CoachID[]     INTEGER UNSIGNED,

  -- Zip code rules:
  --   5 digits, not all are zero and not all are nine, 
  --   optionally followed by a hyphen and 4 digits, not all are zero and not all are nine.
  CHECK (ZipCode REGEXP '(?!0{5})(?!9{5})\\d{5}(-(?!0{4})(?!9{4})\\d{4})?')
);

CREATE TABLE Practice
( ID            INTEGER UNSIGNED  NOT NULL    AUTO_INCREMENT  PRIMARY KEY,
  CoachID[]     INTEGER UNSIGNED  NOT NULL,
  Location      VARCHAR(250)      NOT NULL,
  Street        VARCHAR(250),
  City          VARCHAR(100),
  State         VARCHAR(100),
  Country       VARCHAR(100),
  ZipCode       CHAR(10),
  StartTime     TIME,
  PDate         DATE,
  
  FOREIGN KEY (CoachID) REFERENCES Adult(ID) ON DELETE CASCADE

  -- Zip code rules:
  --   5 digits, not all are zero and not all are nine, 
  --   optionally followed by a hyphen and 4 digits, not all are zero and not all are nine.
  CHECK (ZipCode REGEXP '(?!0{5})(?!9{5})\\d{5}(-(?!0{4})(?!9{4})\\d{4})?')

  CREATE TABLE SnackSignup
( ID            INTEGER UNSIGNED  NOT NULL    AUTO_INCREMENT  PRIMARY KEY,
  AdultID     INTEGER UNSIGNED  NOT NULL,
  Description   VARCHAR(500)      NOT NULL,

  FOREIGN KEY (AdultID) REFERENCES Adult(ID) ON DELETE CASCADE
);

  CREATE TABLE Carpool
( ID            INTEGER UNSIGNED  NOT NULL    AUTO_INCREMENT  PRIMARY KEY,
  AdultID[]     INTEGER UNSIGNED  NOT NULL,
  Description   VARCHAR(500)      NOT NULL,

  FOREIGN KEY (AdultID) REFERENCES Adult(ID) ON DELETE CASCADE
);
  
