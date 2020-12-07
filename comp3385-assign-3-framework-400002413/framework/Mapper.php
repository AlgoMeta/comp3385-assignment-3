<?php
    namespace Framework;

	abstract class Mapper {
        protected $pdo;
        
		public function __construct() {
			$moocConnection = new MOOCConnection();
			$this->pdo = $moocConnection->createConnection();
		}

        abstract public function find($id): DomainObject;
        abstract public function findAll(): array;
		abstract public function insert(DomainObject $obj): void;
		abstract public function update(DomainObject $object): void;
		abstract public function select($id): DomainObject;
	}
?>