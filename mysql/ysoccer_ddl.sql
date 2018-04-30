-- Create the Database
DROP   DATABASE IF EXISTS     YSoccerDB;
CREATE DATABASE IF NOT EXISTS YSoccerDB;

-- Create the users
DROP USER IF EXISTS 'observer';
DROP USER IF EXISTS 'user';
DROP USER IF EXISTS 'manager';
DROP USER IF EXISTS 'admin';
GRANT SELECT, INSERT, DELETE, UPDATE, EXECUTE ON YSoccerDB.* TO 'admin' IDENTIFIED BY 'withheld';
GRANT SELECT, INSERT, DELETE, UPDATE, EXECUTE ON YSoccerDB.* TO 'manager' IDENTIFIED BY 'withheld';
GRANT SELECT, INSERT, DELETE, UPDATE, EXECUTE ON YSoccerDB.* TO 'user' IDENTIFIED BY 'withheld';
GRANT SELECT, EXECUTE ON YSoccerDB.* TO 'observer' IDENTIFIED BY 'withheld';


USE YSoccerDB;

CREATE TABLE Adult
( ID            INTEGER UNSIGNED  NOT NULL    AUTO_INCREMENT  PRIMARY KEY,
  Name_First    VARCHAR(100),
  Name_Last     VARCHAR(150)      NOT NULL,
  Email			    VARCHAR(150)      NOT NULL,
  Phone			    CHAR (10),
  Street        VARCHAR(250),
  City          VARCHAR(100),
  State         VARCHAR(100),
  ZipCode       CHAR(10)

  -- TODO regexp for email, phone, zipcode
  -- Zip code rules:
  --   5 digits, not all are zero and not all are nine,
  --   optionally followed by a hyphen and 4 digits, not all are zero and not all are nine.
  -- CHECK (ZipCode REGEXP '(?!0{5})(?!9{5})\\d{5}(-(?!0{4})(?!9{4})\\d{4})?')
);

CREATE TABLE UserAcct
( ID          INTEGER UNSIGNED  NOT NULL    AUTO_INCREMENT  PRIMARY KEY,
  Email		    VARCHAR(150)	    NOT NULL,
  Password    VARCHAR(50)       NOT NULL,
  Role        ENUM ('observer', 'user', 'manager', 'admin'),
  AdultID     INTEGER UNSIGNED,

  FOREIGN KEY (AdultID) REFERENCES Adult(ID) ON DELETE CASCADE

  -- TODO reg exp for email & password
  --  CHECK (ZipCode REGEXP '(?!0{5})(?!9{5})\\d{5}(-(?!0{4})(?!9{4})\\d{4})?'),
);

CREATE TABLE Child
( ID          INTEGER UNSIGNED  NOT NULL    AUTO_INCREMENT  PRIMARY KEY,
  AdultId		  INTEGER UNSIGNED  NOT NULL,
  Name_First  VARCHAR(100),
  Name_Last   VARCHAR(150)      NOT NULL,
  Position		VARCHAR(150),
  Goals			  INTEGER,

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
  PlayerID    INTEGER UNSIGNED,
  CoachID     INTEGER UNSIGNED

  -- TODO reg zipcode
  -- Zip code rules:
  --   5 digits, not all are zero and not all are nine,
  --   optionally followed by a hyphen and 4 digits, not all are zero and not all are nine.
  -- CHECK (ZipCode REGEXP '(?!0{5})(?!9{5})\\d{5}(-(?!0{4})(?!9{4})\\d{4})?')
);

CREATE TABLE Practice
( ID          INTEGER UNSIGNED  NOT NULL    AUTO_INCREMENT  PRIMARY KEY,
  CoachID     INTEGER UNSIGNED  NOT NULL,
  Location    VARCHAR(250)      NOT NULL,
  Street      VARCHAR(250),
  City        VARCHAR(100),
  State       VARCHAR(100),
  Country     VARCHAR(100),
  ZipCode     CHAR(10),
  StartTime   TIME,
  PDate       DATE,

  FOREIGN KEY (CoachID) REFERENCES Adult(ID) ON DELETE CASCADE

  -- TODO reg exp zipcode
  -- Zip code rules:
  --   5 digits, not all are zero and not all are nine,
  --   optionally followed by a hyphen and 4 digits, not all are zero and not all are nine.
  -- CHECK (ZipCode REGEXP '(?!0{5})(?!9{5})\\d{5}(-(?!0{4})(?!9{4})\\d{4})?')
);

CREATE TABLE SnackSignup
( ID            INTEGER UNSIGNED  NOT NULL    AUTO_INCREMENT  PRIMARY KEY,
  AdultID       INTEGER UNSIGNED  NOT NULL,
  Description   VARCHAR(500)      NOT NULL,

  FOREIGN KEY (AdultID) REFERENCES Adult(ID) ON DELETE CASCADE
);

CREATE TABLE Carpool
( ID            INTEGER UNSIGNED  NOT NULL    AUTO_INCREMENT  PRIMARY KEY,
  AdultID       INTEGER UNSIGNED  NOT NULL,
  Description   VARCHAR(500)      NOT NULL,

  FOREIGN KEY (AdultID) REFERENCES Adult(ID) ON DELETE CASCADE
);
