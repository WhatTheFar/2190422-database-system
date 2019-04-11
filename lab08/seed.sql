CREATE TABLE IF NOT EXISTS `faculty_insurance` (
`ref_id` char(16) NOT NULL primary key,
`ins_plan` varchar(50) NOT NULL,
`credit_limit` decimal(10,2) DEFAULT NULL,
`duedate` date DEFAULT NULL,
`s_timestamp` datetime DEFAULT NULL,
`status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET= utf8mb4;

INSERT INTO faculty_insurance (ref_id, ins_plan, credit_limit, duedate, s_timestamp,status)
SELECT pid,'initial value by system',40000,DATE_ADD(SYSDATE(), INTERVAL 4 YEAR),SYSDATE(),'A' FROM Professor;
INSERT INTO faculty_insurance (ref_id,ins_plan, credit_limit,duedate,s_timestamp,status)
SELECT student_id,'initial value by system',20000,DATE_ADD(SYSDATE(), INTERVAL 4 YEAR),SYSDATE(),'A' FROM Student;

CREATE TRIGGER new_student_added
AFTER INSERT ON Student
FOR EACH ROW
	INSERT INTO faculty_insurance (ref_id,ins_plan, credit_limit,duedate,s_timestamp,status)
	VALUES (new.student_id,"Group Insurance for Student",100000,DATE_ADD(SYSDATE(),INTERVAL 4 YEAR),SYSDATE(),'A');

INSERT INTO Student (student_id,name,year,email)
VALUES ('5971452321','Somechai Rakchad', '1','Somechai@yahoo.com');

DELIMITER $$
CREATE FUNCTION CONCATSTUDENT(student_ID varchar(15), lname varchar(30))
RETURNS varchar(50) DETERMINISTIC
BEGIN
	DECLARE fullname varchar(50);
	SET fullname = CONCAT(CONCAT(student_ID,' '),lname);
	RETURN fullname;
END$$
DELIMITER ;

SELECT CONCATSTUDENT('5971463821','Honda Fukumika') as CONCAT_ID_NAME_RESULT;

SELECT student_id,CONCATSTUDENT(student_id,name) as CONCAT_ID_NAME_RESULT,email From Student;

ALTER TABLE Student ADD COLUMN student_status char(1);

CREATE TABLE IF NOT EXISTS system_log (
`id` int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`user_log` varchar(50) default NULL,
`remark` varchar(100) default NULL,
`timestamp` datetime default NULL);

DELIMITER $$
CREATE PROCEDURE Proc_flag_student()
DETERMINISTIC
BEGIN
	if(SELECT student_id FROM Takes where grade='F')>0 THEN
		CREATE TEMPORARY TABLE IF NOT EXISTS TMP_STUDENT(SID varchar(16));
		TRUNCATE TABLE TMP_STUDENT;
        
		INSERT INTO TMP_STUDENT (SID) SELECT DISTINCT student_id FROM Takes WHERE grade='F';
		UPDATE faculty_insurance SET status='N' WHERE ref_id in (SELECT SID FROM TMP_STUDENT);
		UPDATE Student SET student_status='P' WHERE student_id in (SELECT SID FROM TMP_STUDENT);
        
		INSERT INTO system_log (user_log, remark, timestamp)
		SELECT SID, 'get F', SYSDATE() FROM TMP_STUDENT;
		SELECT * from Student WHERE student_id in (SELECT SID FROM TMP_STUDENT);
	ELSE
		SELECT ' F grade is empty';
	END IF;
END$$
DELIMITER ;

UPDATE Takes SET grade='F' WHERE student_id=55748896 AND cid=201002;

CALL Proc_flag_student()
