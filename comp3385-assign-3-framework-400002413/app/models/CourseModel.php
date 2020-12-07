<?php
    use Framework\Model;
    
    class CourseModel extends Model {

        public function makeConnection():void {
            $moocConnection = new MOOCConnection();
            $this->databaseConnection = $moocConnection->createConnection();
        }

        public function findAll():array {
            $stmt = $this->databaseConnection->prepare("SELECT * FROM courses");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }

        public function findRecord(string $id):array {
            $sql = "SELECT courses.course_name, courses.course_description, courses.course_image, instructors.instructor_name 
                FROM courses 
                INNER JOIN course_instructor ON courses.course_id = course_instructor.course_id 
                INNER JOIN instructors ON course_instructor.instructor_id = instructors.instructor_id 
                WHERE courses.course_id = '".$id."'";
            $stmt = $this->databaseConnection->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }

        public function findMostPopular():array {
            $sql = "SELECT courses.course_name, courses.course_description, courses.course_image, instructors.instructor_name 
                FROM courses 
                INNER JOIN course_instructor ON courses.course_id = course_instructor.course_id 
                INNER JOIN instructors ON course_instructor.instructor_id = instructors.instructor_id 
                ORDER BY courses.course_access_count DESC
                LIMIT 8";
            $stmt = $this->databaseConnection->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }

        public function findLearnerRecommended():array {
            $sql = "SELECT courses.course_name, courses.course_description, courses.course_image, instructors.instructor_name 
                FROM courses 
                INNER JOIN course_instructor ON courses.course_id = course_instructor.course_id 
                INNER JOIN instructors ON course_instructor.instructor_id = instructors.instructor_id 
                ORDER BY courses.course_recommendation_count DESC
                LIMIT 8";
            $stmt = $this->databaseConnection->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }

        public function findCourses():array {
            $sql = "SELECT DISTINCT courses.course_name, faculty_department.faculty_dept_name, courses.course_image, instructors.instructor_name 
            FROM faculty_department 
            INNER JOIN faculty_dept_courses ON faculty_department.faculty_dept_id= faculty_dept_courses.faculty_dept_id 
            INNER JOIN courses ON faculty_dept_courses.course_id = courses.course_id 
            INNER JOIN course_instructor ON courses.course_id = course_instructor.course_id 
            INNER JOIN instructors ON course_instructor.instructor_id = instructors.instructor_id";
            $stmt = $this->databaseConnection->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }
    }
?>