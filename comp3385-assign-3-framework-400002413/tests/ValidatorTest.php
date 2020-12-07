<?php
    require "../autoloader.php";
    use Framework\Validator;
    use PHPUnit\Framework\TestCase;

    class ValidatorTest extends TestCase{

        public function testValidatorIsValid(){
            $validator = new Validator();
            $this->assertInstanceOf('Framework\Validator', $validator);
        }
        
        public function testEmailIsValid(){
            $validator = new Validator();
            $this->assertEquals(true, $validator->emailIsValid("test@gmail.com"));
        }
    }
?>