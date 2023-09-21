DROP DATABASE IF EXISTS SoCalHikes;
CREATE DATABASE SoCalHikes;
USE SoCalHikes;

-- This is the basic trail table, this will hold the main information regarding each specific trail.
DROP TABLE IF EXISTS TRAILS;
CREATE TABLE TRAILS (
	trailID int(5) serial default value,
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
	userID int(10) serial default value,
    username varchar(15) NOT NULL,
    birth_date date NOT NULL,
    sch_score int(5) DEFAULT 0,
    trail_count int(3) DEFAULT 0,
    PRIMARY KEY (UserID)
   
    
);

DROP TABLE IF EXISTS COMPLETED_TRAILS;
CREATE TABLE COMPLETED_TRAILS (
	userID int(10) NOT NULL,
    trailID int(5) NOT NULL,
    favorited boolean,
    PRIMARY KEY (userID, trailID),
	foreign key (userID) references USERS (userID),
    foreign key (trailID) references TRAILS (trailID)
    
);
    
DROP TABLE IF EXISTS DESIRED_TRAILS;
CREATE TABLE DESIRED_TRAILS (
	userID int(10) NOT NULL,
    trailID int(5) NOT NULL,
	PRIMARY KEY (userID, trailID),
	foreign key (userID) references USERS (userID),
    foreign key (trailID) references TRAILS (trailID)
    
);


DROP TABLE IF EXISTS FEATURE_LIST;
CREATE TABLE FEATURE_LIST(
	featureID int(3) serial default value,
	feature_Name varchar(25) UNIQUE NOT NULL,
    PRIMARY KEY (featureID)
   
);

DROP TABLE IF EXISTS TRAIL_FEATURES;
CREATE TABLE TRAIL_FEATURES (
    featureID int(3),
    trailID int(5),
    PRIMARY KEY (featureID, trailID),
    foreign key (trailID) references TRAILS (trailID),
    foreign key (featureID) references FEATURE_LIST (featureID)
);
 
											
-- This trigger will update the sch_score of the user as they mark a hike as completed
-- CREATE TRIGGER sch_score_UPDATE AFTER UPDATE ON COMPLETED_TRAILS
-- FOR EACH ROW BEGIN

-- UPDATE USERS
--		-- SET trail_count = COUNT(COMPLETED_TRAILS) UNION ALL COUNT(USERS)
        -- WHERE userID = USERS.userID;
        
	-- WHERE
	-- NEW.USERS.completed_trails = TRAILS.trailID;
-- END;





-- This would be Trail Data, our database would be live with information like this already, and expanding with time and additions
INSERT INTO TRAILS (trail_name, zipcode, city, start_lat, start_long, end_lat, end_long, completion_time, difficulty)
VALUES ('CSUF Arboretum Loop', 92831, 'Fullerton', 33.88801, -117.88519, NULL, NULL, 35, 1),
		('San Gabriel River Trail', 91702, 'Azusa', 34.15984, -117.90826, 33.74234, -118.11418, 670, 3),
        ('Pacific Electric Trail', 91730, 'Rancho Cucamonga', 34.09514, -117.70402, 33.88801, -117.88519, 117, 2),
        ('Fullerton Loop', 92831, 'Fullerton', 33.88033, -117.92604, NULL, NULL, 247, 3),
        ('Santiago Creek Trail', 92706, 'Santa Ana', 33.77311, -117.86322, 33.7963, -117.76095, 195, 2),
        ('San Diego Creek Trail', 92602, 'Irvine', 33.64507, -117.87047, 33.67258, -117.78789, 140, 1);
	
-- This data is a list of the various trail features
INSERT INTO FEATURE_LIST (feature_Name)
VALUES ('Unpaved'), ('Partially Paved'), ('Paved'), ('View'), ('Dog Friendly'), ('Waterfall'), ('Bikeable'), ('Coastal'), ('Pond'), ('River'), ('Lake'), ('Public Bathrooms'), ('Kid Friendly'), ('Wheelchair Friendly');

-- This insert is marking trails as having certain features, in accordance with our index
INSERT INTO TRAIL_FEATURES(trailID, featureID)
 VALUES (1, 2), (1, 5), (1, 6), (1, 11), (1, 14), (1, 13), (1, 12),
		(2, 7), (2, 4), (2, 3),
        (3, 2), (3, 5), (3, 13), (3, 10),
        (4, 2), (4, 9), (4, 7),(4, 4),
        (5, 2), (5, 8),(5, 13), (5, 14), (5, 10), (5, 4),
        (6, 3), (6, 7), (6, 1), (6, 12), (6, 10), (6, 4), (6, 9);



-- This is dummy data, as users should be created in app
INSERT INTO USERS (username, birth_date)
VALUES ('Enterprise', '2005-12-20'),
		('Defiant', '2000-08-06'),
        ('Voyager', '1993-10-15'),
        ('Titan', '1984-07-18'),
        ('Cerritos', '1965-12-23');
        
INSERT INTO COMPLETED_TRAILS(userID, trailID, favorited)
VALUES (1, 1, NULL), (1, 2, 1), (1, 3, 1), (1, 4, 1), (1, 5, NULL), (1, 6, NULL),
		(2, 4, NULL),(2, 5, NULL),(2, 2, 1), (2, 6, 1),
        (3, 3, 1), (3, 6, NULL),
        (4, 1, NULL),(4, 3, NULL), (4, 6, NULL),
        (5, 1, NULL),(5, 2, 1),(5, 5, NULL), (5, 4, NULL), (5, 6, 1);

INSERT INTO DESIRED_TRAILS(userID, trailID)
VALUES (2, 3),
        (3, 4), (3, 2), (3, 5),
        (4, 5),(4, 4),
        (5, 3);
         
         
        
        
        
        
         
        

-- This is an index of all trailID their trail_Name and city
DROP VIEW IF EXISTS Trail_Index;
CREATE VIEW Trail_Index AS SELECT trailID, trail_Name, city FROM TRAILS;
SELECT* FROM Trail_Index;

-- This index maintains which featureID corresponds to which feature
DROP VIEW IF EXISTS Feature_Index;
CREATE VIEW Feature_Index AS SELECT featureID, feature_Name FROM FEATURE_LIST;
SELECT* FROM Feature_Index ORDER BY featureID;

-- This index produces which trails have which features
DROP VIEW IF EXISTS Trail_Feature_Index;
CREATE VIEW Trail_Feature_Index AS SELECT TRAILS.trail_Name, FEATURE_LIST.feature_Name
FROM TRAILS LEFT JOIN TRAIL_FEATURES ON TRAIL_FEATURES.trailID = TRAILS.trailID
LEFT JOIN FEATURE_LIST ON TRAIL_FEATURES.featureID = FEATURE_LIST.featureID;
SELECT* FROM Trail_Feature_Index ORDER BY trail_Name;

-- This is a view of all the various trails a user has completed, with trail_Name, and if they've favorited a completed trail
DROP VIEW IF EXISTS User_Completes;
CREATE VIEW User_Completes AS SELECT USERS.userID, USERS.username, COMPLETED_TRAILS.trailID, TRAILS.trail_Name, COMPLETED_TRAILS.favorited
FROM USERS RIGHT JOIN COMPLETED_TRAILS ON USERS.userID = COMPLETED_TRAILS.userID
LEFT JOIN TRAILS ON TRAILS.trailID = COMPLETED_TRAILS.trailID;
SELECT* FROM User_Completes ORDER BY userID; 

-- This allows us to display all the users that have completed a given trail
DROP VIEW IF EXISTS Who_Hiked;
CREATE VIEW Who_Hiked AS SELECT trail_Name, username
FROM User_Completes;
SELECT* FROM Who_Hiked ORDER BY trail_Name;
        
        
        

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
CREATE TABLE COMPLETED_BACKUP LIKE COMPLETED_TRAILS;
INSERT INTO COMPLETED_BACKUP
SELECT* FROM COMPLETED_TRAILS;

DROP TABLE IF EXISTS DESIRED_BACKUP;
CREATE TABLE DESIRED_BACKUP LIKE DESIRED_TRAILS;
INSERT INTO DESIRED_BACKUP
SELECT* FROM DESIRED_TRAILS;

DROP TABLE IF EXISTS FEATLIST_BACKUP;
CREATE TABLE FEATLIST_BACKUP LIKE FEATURE_LIST;
INSERT INTO FEATLIST_BACKUP
SELECT* FROM FEATURE_LIST;

DROP TABLE IF EXISTS TRAILFEAT_BACKUP;
CREATE TABLE TRAILFEAT_BACKUP LIKE TRAIL_FEATURES;
INSERT INTO TRAILFEAT_BACKUP
SELECT* FROM TRAIL_FEATURES;

    
    
    
    