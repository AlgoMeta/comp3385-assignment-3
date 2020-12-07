<?php
	namespace Framework;
	
	class State {
		protected $data;

		function __construct() {
			$this->data;
		}

		public function setData($val) {
            $this->data = $val;
        }

		public function getData() {
			return $this->data;
		}
	}

?>