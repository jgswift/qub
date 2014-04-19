<?php
namespace qub\Mediator {
    abstract class Base implements \qub\Mediator {
        
        /**
         * The system handling mediation
         * @var \qub\System
         */
        protected $system;
        
        /**
         * The subject being mediated
         * @var object 
         */
        protected $subject;
        
        /**
         * Default constructor for mediator
         * @param \qub\System $system
         * @param object $subject
         * @throws \InvalidArgumentException
         */
        public function __construct(\qub\System $system,$subject) {
            $this->system = $system;
            if(is_object($subject)) {
                $this->subject = $subject;
            } else {
                throw new \InvalidArgumentException;
            }
        }
        
        /**
         * Retrieve mediator subject
         * @return object
         */
        public function getSubject() {
            return $this->subject;
        }
        
        /**
         * Retrieves mediator system
         * @return \qub\System
         */
        public function getSystem() {
            return $this->system;
        }
        
                
        /**
         * call magic defaults to ask OR tell transformation 
         * depending on whether arguments are provided
         * @param string $name
         * @param array $arguments
         * @return mixed
         */
        public function __call($name, $arguments=[]) {
            if(count($arguments) === 0) {
                return $this->system->ask($this->subject,$name);
            } else {
                return $this->system->tell($this->subject,$name,$arguments);
            }
        }
        
        /**
         * invoke magic defaults to translate transformation
         * @param string $name
         * @param array $arguments
         * @return mixed
         */
        public function __invoke($name, $arguments=[]) {
            return $this->system->translate($this->subject,$name,$arguments);
        }
    }
}