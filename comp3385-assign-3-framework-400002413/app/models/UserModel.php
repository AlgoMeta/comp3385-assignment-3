<?php
    use Framework\Model;
    use Framework\SessionManager;
    
    class UserModel extends Model{
        public function makeConnection():void {
            $moocConnection = new MOOCConnection();
            $this->databaseConnection = $moocConnection->createConnection();
        }

        public function findAll():array {
            $stmt = $this->databaseConnection->prepare("SELECT * FROM users");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }

        public function findRecord(string $id):array {
            $sql = "SELECT * FROM users  WHERE email = '".$id."'";
            $stmt = $this->databaseConnection->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }

        public function register($name, $email, $password):void {
            $this->databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO users (name, email, password) VALUES ('".$name."', '".$email."', '".$password."')";
            $stmt = $this->databaseConnection->prepare($sql);
            $stmt->execute();
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
            $stmt = $this->databaseConnection->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }
    }
?>

