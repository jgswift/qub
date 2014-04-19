<?php
namespace qub\Driver {
    class Delayed extends Base {
        /**
         * List of transformations
         * @var \SplObjectStorage 
         */
        private $collection;
        
        /**
         * Performs driver initialization
         * @param \qub\System $system
         */
        public function initialize(\qub\System $system) {
            parent::initialize($system);
            $this->collection = new \SplObjectStorage();
        }

        /**
         * Attachs ask transformation to local list of transformations
         * @param object $subject
         * @param string $name
         */
        public function ask($subject,$name) {
            $this->collection->attach(new \qub\Transform\Ask($subject,$name));
        }
        
        /**
         * Attachs tell transformation to local list of transformations
         * @param object $subject
         * @param string $name
         * @param array $arguments
         */
        public function tell($subject,$name,$arguments = []) {
            $this->collection->attach(new \qub\Transform\Tell($subject,$name,$arguments));
        }
        
        /**
         * Attachs translate transformation to local list of transformations
         * @param object $subject
         * @param string $name
         * @param array $arguments
         */
        public function translate($subject,$name,$arguments = []) {
            $this->collection->attach(new \qub\Transform\Translate($subject,$name,$arguments));
        }
        
        /**
         * Performs driver transformations
         */
        public function run() {
            foreach($this->collection as $transform) {
                if(is_callable($transform)) {
                    $this->transform($transform);
                }
            }
        }
    }
}