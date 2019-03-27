-- 4.1
SELECT * FROM Course JOIN Section ON Course.cid = Section.cid
WHERE Section.semester = '2' AND Section.year = 2015;

-- 4.2
SELECT * FROM Professor JOIN Teaches ON Teaches.pid = Professor.pid
WHERE Teaches.semester = 'Summer' AND Teaches.year = 2015;

-- 4.3
SELECT * FROM Professor WHERE Professor.salary = (SELECT MAX(HigestSalaryProfessor.salary)
FROM Professor AS HigestSalaryProfessor);

-- 4.4
SELECT Section.building, Section.room, Section.timeslot_id
FROM Course JOIN Section ON Section.cid = Course.cid
WHERE Section.semester = '1' AND Section.year = 2015;

-- 4.5
SELECT * FROM Student WHERE Student.year = '2';