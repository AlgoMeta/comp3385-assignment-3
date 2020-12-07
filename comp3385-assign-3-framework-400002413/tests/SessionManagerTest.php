<?php
    require "../autoloader.php";
    use Framework\SessionManager;
    use PHPUnit\Framework\TestCase;

    class SessionManagerTest extends TestCase{

        public function testSessionIsValid(){
            $tmpSession = new SessionManager();
            $this->assertInstanceOf('Framework\SessionManager', $tmpSession);
        }

        public function testCreate(){
            SessionManager::create();
            $this->assertEquals(PHP_SESSION_ACTIVE, true);
        }
    }
?>