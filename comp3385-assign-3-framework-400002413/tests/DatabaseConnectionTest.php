<?php
    require "../autoloader.php";
    use Framework\DatabaseConnection;
    use PHPUnit\Framework\TestCase;

    class DatabaseConnectionTest extends TestCase{

        public function testDatabaseConnectionIsValid(){
            echo "After you start your web server to run this test";
            $moocConnection = new MOOCConnection();
            $this->assertInstanceOf('Framework\DatabaseConnection', $moocConnection);
        }
        
        public function testCreateConnection(){
            echo "After you start your web server to run this test";
            $moocConnection = new MOOCConnection();
            $this->assertInstanceOf('PDO', $moocConnection->createConnection());
        }
    }
?>