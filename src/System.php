<?php
namespace qub {
    class System implements \IteratorAggregate {
        /**
         * individual system driver
         * @var Driver 
         */
        protected $driver;
        
        /**
         * List of state results from ask and translate transformations
         * @var \qub\State
         */
        protected $state;
        
        /**
         * Default system constructor
         * Initializes system using given driver
         * @param \qub\Driver $driver
         */
        function __construct(Driver $driver, State $state = null) {
            $this->driver = $driver;
            if(is_null($state)) {
                $this->state = new \ArrayObject;
            }
            $driver->initialize($this);
        }
        
        /**
         * Retrieves system state
         * @return array
         */
        public function getState() {
            return $this->state;
        }
        
        /**
         * Checks if system state is empty
         * @return boolean
         */
        public function hasState() {
            return !empty($this->state);
        }
        
        /**
         * Enables iteration over state using system object
         * @return \ArrayIterator
         */
        public function getIterator() {
            return new \ArrayIterator($this->state);
        }

        /**
         * Alias for driver ask
         * @param object $subject
         * @param string $name
         * @return mixed
         */
        public function ask($subject,$name) {
            return $this->driver->ask($subject,$name);
        }
        
        /**
         * Alias for driver tell
         * @param object $subject
         * @param string $name
         * @param array $arguments
         */
        public function tell($subject,$name,$arguments = []) {
            return $this->driver->tell($subject,$name,$arguments);
        }
        
        /**
         * Alias for driver translate
         * @param object $subject
         * @param string $name
         * @param array $arguments
         * @return mixed
         */
        public function translate($subject,$name,$arguments = []) {
            return $this->driver->translate($subject,$name,$arguments);
        }
        
        /**
         * Wraps subject with mediator
         * @param object $subject
         * @return \qub\Mediator
         */
        public function mediate($subject) {           
            return new Mediator\Object($this,$subject);
        }
        
        /**
         * Helper function to ensure state cleared
         */
        private function clearState() {
            if($this->state instanceof \ArrayObject) {
                $this->state->exchangeArray([]);
            } else {
                $keys = array_keys($this->state);
                foreach($keys as $k) {
                    unset($this->state[$k]);
                }
            }
        }
        
        /**
         * Alias for driver run
         */
        public function run() {
            $this->clearState();
            
            return $this->driver->run();
        }
    }
}