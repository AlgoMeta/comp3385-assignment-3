<?php
    use Framework\Mapper;
    use Framework\User;

	class UserMapper extends Mapper{
        public function find($id): DomainObject {
            $sql = "SELECT * FROM users  WHERE email = '".$id."'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $res = $stmt->fetchAll();
            $user = new User($res[0]["name"], $res[0]["email"], $res[0]["password"]);
            return $user;
        }

        public function findAll(): array {
            $stmt = $this->pdo->prepare("SELECT * FROM users");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }

        public function findCourses():array {
            SessionManager::create();
            $user = $_SESSION['user'];
            $sql = "SELECT DISTINCT courses.course_name, faculty_department.faculty_dept_name, courses.course_image, instructors.instructor_name 
            FROM faculty_department 
            INNER JOIN faculty_dept_courses ON faculty_department.faculty_dept_id= faculty_dept_courses.faculty_dept_id 
            INNER JOIN courses ON faculty_dept_courses.course_id = courses.course_id 
            INNER JOIN course_instructor ON courses.course_id = course_instructor.course_id 
            INNER JOIN instructors ON course_instructor.instructor_id = instructors.instructor_id 
            INNER JOIN user_courses ON courses.course_id = user_courses.course_id 
            INNER JOIN users ON user_courses.email = users.email WHERE user_courses.email = '".$user."'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }
        
		public function insert(DomainObject $obj): void {
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO users (name, email, password) VALUES ('".$obj->getName()."', '".$obj->getEmail()."', '".$obj->getPassword()."')";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }

		public function update(DomainObject $object): void {

        }

		public function select($id): DomainObject {
            return new User("", "", "");
        }
	}
?>