DROP DATABASE IF EXISTS SoCalHikes;
CREATE DATABASE SoCalHikes;
USE SoCalHikes;

DROP TABLE IF EXISTS TRAILS;
CREATE TABLE TRAILS (
	trailID int(5) NOT NULL,
    trail_name varchar(50) NOT NULL,
    zipcode int(5) NOT NULL,
    city varchar(35) NOT NULL,
    start_lat decimal(8, 6),
    start_long decimal(9, 6),
    end_lat decimal (8, 6),
    end_long decimal (9, 6),
    
    difficulty int(1),
    completion_time int(4), 
    PRIMARY KEY (trailID)

);
    

DROP TABLE IF EXISTS USERS;
CREATE TABLE USERS (
	userID int(10) NOT NULL,
    username varchar(15) NOT NULL,
    birth_date date NOT NULL,
    completed_trails int(5),
    desired_trails int(5),
    PRIMARY KEY (UserID),
    foreign key (completed_trails) references TRAILS (trailID),
    foreign key (desired_trails) references TRAILS (trailID)
    
);

INSERT INTO TRAILS ( trailID, trail_name, zipcode, city, start_lat, start_long, end_lat, end_long, completion_time, difficulty)
VALUES (00001, 'CSUF Arboretum', 92831, 'Fullerton', 33.88801, -117.88519, 33.88801, -117.88519, 35, 1),
		(00002, 'CSUF Arboretum', 92831, 'Fullerton', 33.88801, -117.88519, 33.88801, -117.88519, 35, NULL),
        (00003, 'CSUF Arboretum', 92831, 'Fullerton', 33.88801, -117.88519, 33.88801, -117.88519, 35, NULL),
        (00004, 'CSUF Arboretum', 92831, 'Fullerton', 33.88801, -117.88519, 33.88801, -117.88519, 35, NULL),
        (00005, 'CSUF Arboretum', 92831, 'Fullerton', 33.88801, -117.88519, 33.88801, -117.88519, 35, NULL),
        (00006, 'CSUF Arboretum', 92831, 'Fullerton', 33.88801, -117.88519, 33.88801, -117.88519, 35, NULL),
        (00007, 'CSUF Arboretum', 92831, 'Fullerton', 33.88801, -117.88519, 33.88801, -117.88519, 35, NULL),
        (00008, 'CSUF Arboretum', 92831, 'Fullerton', 33.88801, -117.88519, 33.88801, -117.88519, 35, NULL),
        (00009, 'CSUF Arboretum', 92831, 'Fullerton', 33.88801, -117.88519, 33.88801, -117.88519, 35, NULL),
        (00010, 'CSUF Arboretum', 92831, 'Fullerton', 33.88801, -117.88519, 33.88801, -117.88519, 35, NULL);




-- This begins all the database backup, storing the current state of each table as a separate copy
DROP TABLE IF EXISTS USERS_BACKUP;
CREATE TABLE USERS_BACKUP LIKE USERS;
INSERT INTO USERS_BACKUP
SELECT* FROM USERS;

DROP TABLE IF EXISTS TRAILS_BACKUP;
CREATE TABLE TRAILS_BACKUP LIKE TRAILS;
INSERT INTO TRAILS_BACKUP
SELECT* FROM TRAILS;
    
    
    
    