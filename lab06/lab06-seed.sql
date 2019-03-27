CREATE DATABASE REGISTRATION_DB;

DROP TABLE IF EXISTS `Course`;
CREATE TABLE Course (
  cid varchar(8) NOT NULL,
  title varchar(256) NOT NULL,
  dept_name varchar(256) NOT NULL,
  credits int(11) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES Course WRITE;
INSERT INTO Course VALUES ('101001','Physics','Science',3),('101002','Mathematics','Science',3),('201001','Programming','Computer Engineering',2),('201002','Database Systems','Computer Engineering',3),('301001','Software Engineering','Computer Engineering',3);
UNLOCK TABLES;

DROP TABLE IF EXISTS `Professor`;
CREATE TABLE Professor (
  pid varchar(8) NOT NULL,
  pname varchar(256) NOT NULL,
  salary int(11) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES Professor WRITE;
INSERT INTO Professor VALUES ('001','Michael',35000),('002','Simon',40000),('003','William',25000),('004','Ken',40000),('005','Steve',50000);
UNLOCK TABLES;

DROP TABLE IF EXISTS `Section`;
CREATE TABLE Section (
  cid varchar(8) NOT NULL,
  sect_id varchar(8) NOT NULL,
  semester varchar(16) NOT NULL,
  year year(4) NOT NULL,
  building varchar(256) NOT NULL,
  room varchar(16) NOT NULL,
  timeslot_id varchar(8) NOT NULL,
  PRIMARY KEY (`cid`,`sect_id`,`semester`,`year`),
  CONSTRAINT Section_ibfk_1 FOREIGN KEY (`cid`) REFERENCES Course (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES Section WRITE;
INSERT INTO Section VALUES ('101001','1','1',2015,'SCI 03','512','1'),('101002','1','1',2015,'SCI 28','418','2'),('101002','2','1',2015,'SCI 28','317','3'),('201001','1','Summer',2015,'Eng 3','305','3'),('201001','2','Summer',2015,'Eng 3','405','3'),('201001','3','Summer',2015,'Eng 3','309','1'),('201002','1','2',2015,'Eng 100','405','2'),('301001','1','2',2015,'Eng 3','309','2'),('301001','2','2',2015,'Eng 3','305','1');
UNLOCK TABLES;

DROP TABLE IF EXISTS `Student`;
CREATE TABLE Student (
  student_id varchar(16) NOT NULL,
  name varchar(256) NOT NULL,
  year int(11) NOT NULL,
  email varchar(256) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES Student WRITE;
INSERT INTO Student VALUES ('55489317','Zinnia',3,'55489317@student.chula.ac.th'),('55748896','Tulip',3,'55748896@student.chula.ac.th'),('56717931','Rose',2,'56717931@student.chula.ac.th'),('56756421','Orchid',2,'56756421@student.chula.ac.th'),('57712358','Lotus',1,'57712358@student.chula.ac.th'),('57723547','Jasmine',1,'57723547@student.chula.ac.th');
UNLOCK TABLES;

DROP TABLE IF EXISTS `Takes`;
CREATE TABLE Takes (
  student_id varchar(16) NOT NULL,
  cid varchar(8) NOT NULL,
  sect_id varchar(8) NOT NULL,
  semester varchar(16) NOT NULL,
  year year(4) NOT NULL,
  grade varchar(8) NOT NULL,
  PRIMARY KEY (`student_id`,`cid`,`sect_id`,`semester`,`year`),
  KEY cid (`cid`,`sect_id`,`semester`,`year`),
  CONSTRAINT Takes_ibfk_1 FOREIGN KEY (`student_id`) REFERENCES Student (`student_id`),
  CONSTRAINT Takes_ibfk_2 FOREIGN KEY (`cid`, `sect_id`, `semester`, `year`) REFERENCES Section (`cid`, `sect_id`, `semester`, `year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES Takes WRITE;
INSERT INTO Takes VALUES ('55489317','301001','2','2',2015,'C'),('55748896','201002','1','2',2015,'A'),('56717931','201001','3','Summer',2015,'B'),('56756421','201001','1','Summer',2015,'A'),('57712358','101001','1','1',2015,'A'),('57712358','101002','2','1',2015,'B'),('57723547','101001','1','1',2015,'A'),('57723547','101002','1','1',2015,'B+');
UNLOCK TABLES;

DROP TABLE IF EXISTS `Teaches`;
CREATE TABLE Teaches (
  pid varchar(8) NOT NULL,
  cid varchar(8) NOT NULL,
  sect_id varchar(8) NOT NULL,
  semester varchar(16) NOT NULL,
  year year(4) NOT NULL,
  PRIMARY KEY (`pid`,`cid`,`sect_id`,`semester`,`year`),
  KEY cid (`cid`,`sect_id`,`semester`,`year`),
  CONSTRAINT Teaches_ibfk_1 FOREIGN KEY (`pid`) REFERENCES Professor (`pid`),
  CONSTRAINT Teaches_ibfk_2 FOREIGN KEY (`cid`, `sect_id`, `semester`, `year`) REFERENCES Section (`cid`, `sect_id`, `semester`, `year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES Teaches WRITE;
INSERT INTO Teaches VALUES ('001','101001','1','1',2015),('002','101002','1','1',2015),('002','101002','2','1',2015),('003','201001','1','Summer',2015),('003','201001','2','Summer',2015),('003','201001','3','Summer',2015),('004','201002','1','2',2015),('005','301001','1','2',2015),('005','301001','2','2',2015);
UNLOCK TABLES;