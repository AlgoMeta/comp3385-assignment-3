<?php
    use Framework\Model;
    
    class StreamModel extends Model {

        public function makeConnection():void {
            $moocConnection = new MOOCConnection();
            $this->databaseConnection = $moocConnection->createConnection();
        }

        public function findAll():array {
            $stmt = $this->databaseConnection->prepare("SELECT * FROM streams");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }

        public function findRecord(string $id):array {
            $sql = "SELECT * FROM streams WHERE stream_id = '".$id."'";
            $stmt = $this->databaseConnection->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }

        public function findStreams():array {
            $sql = "SELECT streams.stream_name,streams.stream_image, instructors.instructor_name 
                    FROM streams 
                    INNER JOIN stream_instructor ON streams.stream_id = stream_instructor.stream_id 
                    INNER JOIN instructors ON stream_instructor.instructor_id = instructors.instructor_id 
                    ORDER BY streams.stream_name DESC
                    LIMIT 8";
            $stmt = $this->databaseConnection->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }
    }
?>