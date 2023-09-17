DROP DATABASE IF EXISTS SoCalHikes;
CREATE DATABASE SoCalHikes;
USE SoCalHikes;

-- This is the basic trail table, this will hold the main information regarding each specific trail.
DROP TABLE IF EXISTS TRAILS;
CREATE TABLE TRAILS (
	trailID int(5) serial default value UNIQUE,
    trail_name varchar(50) NOT NULL,
    zipcode int(5) NOT NULL,
    city varchar(35) NOT NULL,
    start_lat decimal(8, 6) NOT NULL,
    start_long decimal(9, 6) NOT NULL,
    end_lat decimal (8, 6),
    end_long decimal (9, 6),
    difficulty int(1) ,
    completion_time int(4), 
    PRIMARY KEY (trailID)

);
ALTER TABLE TRAILS ADD CONSTRAINT Max_Difficulty CHECK (difficulty <= 3);
    
DROP TABLE IF EXISTS USERS;
CREATE TABLE USERS (
	userID int(10) NOT NULL UNIQUE,
    username varchar(15) NOT NULL,
    birth_date date NOT NULL,
    sch_score int(5) DEFAULT 0,
    trails_completed int(3) DEFAULT 0,
    PRIMARY KEY (UserID)
   
    
);

DROP TABLE IF EXISTS COMPLETED_TRAILS;
CREATE TABLE COMPLETED_TRIALS (
	userID int(10) NOT NULL,
    trailID int(5) NOT NULL,
    favorited boolean,
    PRIMARY KEY (userID, trailID),
	foreign key (userID) references USERS (userID),
    foreign key (trailID) references TRAILS (trailID)
    
);
    
DROP TABLE IF EXISTS DESIRED_TRAILS;
CREATE TABLE DESIRED_TRIALS (
	userID int(10) NOT NULL,
    trailID int(5) NOT NULL,
	PRIMARY KEY (userID, trailID),
	foreign key (userID) references USERS (userID),
    foreign key (trailID) references TRAILS (trailID)
    
);



-- This trigger will update the sch_score of the user as they mark a hike as completed
CREATE TRIGGER sch_score_UPDATE AFTER INSERT ON completed_trails for each row
 UPDATE USERS 
		SET sch_score = sch_score + TRAILS.diffculty
	WHERE
		NEW.USERS.completed_trails = TRAILS.trailID;

-- This trigger should run when a u
CREATE TRIGGER trail_completed AFTER INSERT ON USERS.completed_trails for each row


INSERT INTO TRAILS (trail_name, zipcode, city, start_lat, start_long, end_lat, end_long, completion_time, difficulty)
VALUES ('CSUF Arboretum Loop', 92831, 'Fullerton', 33.88801, -117.88519, NULL, NULL, 35, 1),
		('San Gabriel River Trail', 91702, 'Azusa', 34.15984, -117.90826, 33.74234, -118.11418, 670, 3),
        ('Pacific Electric Trail', 91730, 'Rancho Cucamonga', 34.09514, -117.70402, 33.88801, -117.88519, 117, 2),
        ('Fullerton Loop', 92831, 'Fullerton', 33.88043, -117.88519, NULL, NULL, 35, 1),
        ('CSUF Arboretum', 92831, 'Fullerton', 33.88801, -117.88519, 33.88801, -117.88519, 35, 2),
        ('CSUF Arboretum', 92831, 'Fullerton', 33.88801, -117.88519, 33.88801, -117.88519, 35, 3);
       


INSERT INTO USERS (userid, username, birth_date, completed_trails, desired_trails)
VALUES (1234567891,'Enterprise', '2005-12-20', NULL, NULL),
		(1234567892,'Defiant', '2000-08-06', NULL, NULL),
        (1234567893,'Voyager', '1993-10-15', NULL, NULL),
        (1234567894,'Titan', '1984-07-18', NULL, NULL),
        (1234567895,'Yorktown', '1965-12-23', NULL, NULL);
        
        
        
        
        

-- This begins all the database backup, storing the current state of each table as a separate copy
DROP TABLE IF EXISTS USERS_BACKUP;
CREATE TABLE USERS_BACKUP LIKE USERS;
INSERT INTO USERS_BACKUP
SELECT* FROM USERS;

DROP TABLE IF EXISTS TRAILS_BACKUP;
CREATE TABLE TRAILS_BACKUP LIKE TRAILS;
INSERT INTO TRAILS_BACKUP
SELECT* FROM TRAILS;

DROP TABLE IF EXISTS COMPLETED_BACKUP;
CREATE TABLE COMPLETED_BACKUP LIKE COMPLETED_TRIALS;
INSERT INTO COMPLETED_BACKUP
SELECT* FROM COMPLETED_TRAILS;

DROP TABLE IF EXISTS DESIRED_BACKUP;
CREATE TABLE DESIRED_BACKUP LIKE DESIRED_TRIALS;
INSERT INTO DESIRED_BACKUP
SELECT* FROM DESIRED_TRAILS;

    
    
    
    