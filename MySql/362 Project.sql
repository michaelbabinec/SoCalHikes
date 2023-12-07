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
    -- start_lat decimal(8, 6) NOT NULL,
    -- start_long decimal(9, 6) NOT NULL,
    -- end_lat decimal (8, 6),
    -- end_long decimal (9, 6),
    difficulty int(1) ,
    completion_time int(4),
    maplink varchar(500),
    PRIMARY KEY (trailID)

);
ALTER TABLE TRAILS ADD CONSTRAINT Max_Difficulty CHECK (difficulty <= 3);
    
DROP TABLE IF EXISTS USERS;
CREATE TABLE USERS (
	userID int(10) serial default value,
    username varchar(15) NOT NULL UNIQUE,
    passwrd varchar(60) NOT NULL,
    birthday date NOT NULL,
    sch_score int(5) DEFAULT 0,
    trail_count int(3) DEFAULT 0,
    PRIMARY KEY (UserID)
   
    
);

DROP TABLE IF EXISTS COMPLETED_TRAILS;
CREATE TABLE COMPLETED_TRAILS (
	userID int(10) NOT NULL,
    trailID int(5) NOT NULL,
    -- favorited boolean,
    -- rating int(1),
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

CREATE TRIGGER sch_score_INSERT AFTER INSERT ON COMPLETED_TRAILS FOR EACH ROW
UPDATE users
set sch_score = sch_score + (SELECT difficulty FROM TRAILS WHERE trailID = new.trailID),
	trail_count = trail_count + 1
where userID = NEW.userID;

CREATE TRIGGER sch_score_DELETE AFTER DELETE ON COMPLETED_TRAILS FOR EACH ROW
UPDATE users
set sch_score = sch_score - (SELECT difficulty FROM TRAILS WHERE trailID = OLD.trailID),
	trail_count = trail_count - 1
where userID = OLD.userID;

-- This is an index of all trailID their trail_Name and city
DROP VIEW IF EXISTS Trail_Index;
CREATE VIEW Trail_Index AS SELECT trailID, trail_Name, city FROM TRAILS;

-- DROP VIEW IF EXISTS User_Index;
-- CREATE VIEW User_Index AS SELECT u.userID, u.username, u.trail_count, u.sch_score, (SELECT trail_name WHERE favorited = 1) as favorite_trails
-- FROM USERS u LEFT JOIN COMPLETED_TRAILS ct ON u.userid = ct.userID
-- LEFT JOIN TRAILS t ON ct.trailID = t.trailID;

-- This index maintains which featureID corresponds to which feature
DROP VIEW IF EXISTS Feature_Index;
CREATE VIEW Feature_Index AS SELECT featureID, feature_Name FROM FEATURE_LIST;

-- This index produces which trails have which features
DROP VIEW IF EXISTS Trail_Feature_Index;
CREATE VIEW Trail_Feature_Index AS SELECT TRAILS.trail_Name, FEATURE_LIST.feature_Name
FROM TRAILS LEFT JOIN TRAIL_FEATURES ON TRAIL_FEATURES.trailID = TRAILS.trailID
LEFT JOIN FEATURE_LIST ON TRAIL_FEATURES.featureID = FEATURE_LIST.featureID;

-- This is a view of all the various trails a user has completed, with trail_Name, and if they've favorited a completed trail
-- DROP VIEW IF EXISTS User_Completes;
-- CREATE VIEW User_Completes AS SELECT USERS.userID, USERS.username, COMPLETED_TRAILS.trailID, COMPLETED_TRAILS.favorited, TRAILS.trail_Name, TRAILS.difficulty 
-- FROM USERS RIGHT JOIN COMPLETED_TRAILS ON USERS.userID = COMPLETED_TRAILS.userID
-- LEFT JOIN TRAILS ON TRAILS.trailID = COMPLETED_TRAILS.trailID;


-- This allows us to display all the users that have completed a given trail
-- DROP VIEW IF EXISTS Who_Hiked;
-- CREATE VIEW Who_Hiked AS SELECT trail_Name, username
-- FROM User_Completes;



 
											

-- This would be Trail Data, our database would be live with information like this already, and expanding with time and additions
INSERT INTO TRAILS (trail_name, zipcode, city, completion_time, difficulty, maplink)
VALUES ('Juanita Cooke Trail', 92835, 'Fullerton', 35, 1, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d413.982844372198!2d-117.93354448835375!3d33.89318833433608!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dd2a7c78f654c7%3A0xbeb704b16283f1bc!2sJuanita%20Cooke%20Trail!5e0!3m2!1sen!2sus!4v1701943492952!5m2!1sen!2sus'),
		('Summit Ridge', 91765, 'Diamond Bar', 670, 1, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3307.700028775943!2d-117.80206330168596!3d34.00023796891883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c32ceee957c39b%3A0xe00b712f476219fe!2sSummitridge%20Trail!5e0!3m2!1sen!2sus!4v1701943651326!5m2!1sen!2sus'),
        ('Anaheim Coves Trail', 92806, 'Anaheim', 117, 2, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1657.0601265098974!2d-117.86697049292066!3d33.835009316752654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dcd794050bd60f%3A0x701ed2565fb86daa!2sAnaheim%20Coves%20Lincoln%20Trailhead!5e0!3m2!1sen!2sus!4v1701943734851!5m2!1sen!2sus'),
        ('Madrugada Trail', 91709, 'Chino Hills', 247, 3, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1653.7667537214256!2d-117.7522120350236!3d34.00451410030114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c32db867d352a7%3A0xc373a14b2af0f61c!2sMadrugada%20Trail!5e0!3m2!1sen!2sus!4v1701943838177!5m2!1sen!2sus'),
        ('Rimcrest Trail', 92886, 'Yorba Linda', 195, 2, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6622.6802118643745!2d-117.79204014758201!3d33.906645228690344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dcd23395c9a555%3A0xea1444cea4d31590!2sRimcrest%20Trail%20Head!5e0!3m2!1sen!2sus!4v1701943937065!5m2!1sen!2sus'),
        ('San Diego Creek Trail', 92602, 'Irvine', 140, 1, NULL),
        ('Hidden Valley Trail', 92277, 'Twentynine Palms', 24, 1, NULL);
	
-- This data is a list of the various trail features
INSERT INTO FEATURE_LIST (feature_Name)
VALUES ('Unpaved'), ('Partially Paved'), ('Paved'), ('View'), ('Dog Friendly'), ('Waterfall'), ('Bikeable'), ('Coastal'), ('Pond'), ('River'), 
	('Lake'), ('Public Bathrooms'), ('Kid Friendly'), ('Wheelchair Friendly'), ('Hike'), ('Walkable'), ('Paid Access'), ('No Dogs'), ('Historic'), ('Wildlife'),
    ('Rocky'),('National Park'),('National Forest'),('Public Land'), ('City Route'), ('Campground'), ('Local Flora'), ('Birdwatching'), ('Stroller Friendly'), ('Road Biking'),
    ('Running'), ('No shade'), ('Mountain Biking'), ('Forest');

-- This insert is marking trails as having certain features, in accordance with our index
INSERT INTO TRAIL_FEATURES(trailID, featureID)
 VALUES (1, 2), (1, 13), (1, 16), (1, 11), (1, 4), (1, 27), (1, 28), (1, 20), (1, 18),
		(2, 5), (2, 14), (2, 13), (2, 15), (2, 16), (2, 28), (2, 8), (2, 3), (2, 10), (2, 4), (2, 27), (2, 20), (2, 29), (2, 30),
        (3, 3), (3, 5), (3, 13), (3, 14), (3, 29), (3, 30), (3, 16), (3, 28), (3, 31), (3, 4), (3, 27), (3, 32),
        (4, 5), (4, 14), (4, 13),(4, 29), (4, 15), (4, 33), (4, 16), (4, 28), (4, 31), (4, 34), (4, 11), (4, 2), (4, 10), (4, 4), (4, 27), (4, 20),
        (5, 14), (5, 13),(5, 29), (5, 33), (5, 30), (5, 16), (5, 28), (5, 31), (5, 5), (5, 34), (5, 11), (5, 2), (5, 10), (5, 4), (5, 27), (5, 20),
        (6, 5), (6, 14), (6, 29), (6, 13), (6, 30), (6, 16), (6, 31), (6, 34), (6, 3), (6, 10), (6, 4), (6, 20),
        (7, 13), (7, 15), (7, 16), (7, 4), (7, 27), (7, 20), (7, 21), (7, 19), (7, 17), (7, 18), (7, 22), (7, 1);



-- This is dummy data, as users should be created in app
INSERT INTO USERS (username, passwrd, birthday)
VALUES ('Enterprise', '1234567890', '2005-12-20'),
		('Defiant','1234567890', '2000-08-06'),
        ('Voyager', '1234567890', '1993-10-15'),
        ('Titan', '1234567890', '1984-07-18'),
        ('Cerritos', '1234567890', '1965-12-23'),
        ('1', '1', '1965-12-23');
        
INSERT INTO COMPLETED_TRAILS(userID, trailID)
VALUES (1, 1), (1, 2), (1, 3), (1, 4), (1, 5), (1, 6),
		(2, 4),(2, 5),(2, 2), (2, 6),
        (3, 3), (3, 6),
        (4, 1),(4, 3), (4, 6),
        (5, 1),(5, 2),(5, 5), (5, 4), (5, 6);

INSERT INTO DESIRED_TRAILS(userID, trailID)
VALUES (2, 3),
        (3, 4), (3, 2), (3, 5),
        (4, 5),(4, 4),
        (5, 3);
         
         
        
        
        
        
         
        

-- These selects exist just to show off the data for demonstration, or reference with the indexes
SELECT* FROM Trail_Index;

SELECT* FROM Feature_Index ORDER BY featureID;

SELECT* FROM Trail_Feature_Index ORDER BY trail_Name;

-- SELECT* FROM User_Completes ORDER BY userID; 

-- SELECT* FROM Who_Hiked ORDER BY trail_Name;

-- SELECT* FROM User_Index GROUP BY userID;

SELECT* FROM Users ORDER BY sch_score DESC;

        
        
        

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

    
    
    
    