<?php
    use Framework\DomainObject;

    class Stream implements DomainObject {
        private $streamName;
        private $streamImage;
        private $instructorName;

        function __construct($snm, $sim, $in) {
            $this->streamName = $snm;
            $this->streamImage = $sim;
            $this->instructorName = $in;
        }

        public function getStreamName() {
            return $this->streamName;
        }

        public function getStreamImage() {
            return $this->streamImage;
        }

        public function getInstructorName() {
            return $this->instructorName;
        }
    }
?>