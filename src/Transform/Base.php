<?php
namespace qub\Transform {
    abstract class Base implements \qub\Transform {
        
        /**
         * Transform target property
         * @var string
         */
        protected $name;
        
        /**
         * Transform target object
         * @var object
         */
        protected $subject;
        
        /**
         * Default constructor for base transformation
         * @param object $subject
         * @param string $name
         */
        function __construct($subject, $name) {
            $this->name = $name;
            $this->subject = $subject;
        }
        
        /**
         * Retrieve target property
         * @return string
         */
        function getName() {
            return $this->name;
        }
        
        /**
         * Retrieve target object
         * @return object
         */
        function getSubject() {
            return $this->subject;
        }
        
        /**
         * Perform transformation in subclass
         */
        abstract function __invoke();
    }
}