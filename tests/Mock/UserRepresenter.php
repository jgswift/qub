<?php
namespace qub\Tests\Mock {
    class UserRepresenter {
        private $name;
        
        function getName() {
            return $this->name;
        }
        
        function setName($name) {
            return $this->name = $name;
        }
        
        function isAdmin() {
            return false;
        }
    }
}