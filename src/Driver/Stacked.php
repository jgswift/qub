<?php
namespace qub\Driver {
    class Stacked extends Base {        
        /**
         * List of transformations
         * @var \SplObjectStorage 
         */
        private $stack;
        
        /**
         * Performs driver initialization
         * @param \qub\System $system
         */
        public function initialize(\qub\System $system) {
            parent::initialize($system);
            $this->stack = new \SplStack();
        }

        /**
         * Pushes ask transformation to local stack of transformations
         * @param object $subject
         * @param string $name
         */
        public function ask($subject,$name) {
            $this->stack->push(new \qub\Transform\Ask($subject,$name));
        }
        
        /**
         * Pushes tell transformation to local stack of transformations
         * @param object $subject
         * @param string $name
         * @param array $arguments
         */
        public function tell($subject,$name,$arguments = []) {
            $this->stack->push(new \qub\Transform\Tell($subject,$name,$arguments));
        }
        
        /**
         * Pushes translate transformation to local stack of transformations
         * @param object $subject
         * @param string $name
         * @param array $arguments
         */
        public function translate($subject,$name,$arguments = []) {
            $this->stack->push(new \qub\Transform\Translate($subject,$name,$arguments));
        }
        
        /**
         * Performs driver transformations
         */
        public function run() {
            foreach($this->stack as $transform) {
                if(is_callable($transform)) {
                    $this->transform($transform);
                }
            }
        }
    }
}