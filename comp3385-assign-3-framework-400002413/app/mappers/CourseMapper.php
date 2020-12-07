<?php
    use Framework\Mapper;
    use Framework\Course;

	class CourseMapper extends Mapper {

        public function find($id): DomainObject {
            $sql = "SELECT courses.course_name, courses.course_description, courses.course_image, instructors.instructor_name 
                FROM courses 
                INNER JOIN course_instructor ON courses.course_id = course_instructor.course_id 
                INNER JOIN instructors ON course_instructor.instructor_id = instructors.instructor_id 
                WHERE courses.course_id = '".$id."'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $res = $stmt->fetchAll();
            $course = new Course($res[0]["course_name"], $res[0]["course_description"], $res[0]["course_image"], "", $res[0]["instructor_name"]);
            return $course;
        }

        public function findAll(): array {
            $stmt = $this->pdo->prepare("SELECT * FROM courses");
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
            $stmt = $this->pdo->prepare($sql);
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
            $stmt = $this->pdo->prepare($sql);
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
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }

		public function insert(DomainObject $obj): void {

        }

		public function update(DomainObject $object): void {

        }

		public function select($id): DomainObject {
            return new Course("", "", "", "", "");
        }
	}
?>