<?php
    use Framework\DomainObject;

    class Course implements DomainObject {
        private $courseName;
        private $courseDescription;
        private $courseImage;
        private $facultyDeptName;
        private $instructorName;

        function __construct($cn, $cd, $ci, $fdn, $in) {
            $this->courseName = $cn;
            $this->courseDescription = $cd;
            $this->courseImage = $ci;
            $this->facultyDeptName = $fdn;
            $this->instructorName = $in;
        }

        public function getCourseName() {
            return $this->courseName;
        }

        public function getCourseDescription() {
            return $this->courseDescription;
        }

        public function getCourseImage() {
            return $this->courseImage;
        }

        public function getFacultyDeptName() {
            return $this->facultyDeptName;
        }

        public function getInstructorName() {
            return $this->instructorName;
        }
    }

?>