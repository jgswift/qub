<?php
namespace qub\Driver {
    class Queued extends Base {       
        /**
         * Queue of transformations
         * @var \SplObjectStorage 
         */
        private $queue;
        
        /**
         * Performs driver initialization
         * @param \qub\System $system
         */
        public function initialize(\qub\System $system) {
            parent::initialize($system);
            $this->queue = new \SplQueue();
        }

        /**
         * Queues ask transformation to local queue of transformations
         * @param object $subject
         * @param string $name
         */
        public function ask($subject,$name) {
            $this->queue->enqueue(new \qub\Transform\Ask($subject,$name));
        }
        
        /**
         * Queues tell transformation to local queue of transformations
         * @param object $subject
         * @param string $name
         * @param array $arguments
         */
        public function tell($subject,$name,$arguments = []) {
            $this->queue->enqueue(new \qub\Transform\Tell($subject,$name,$arguments));
        }
        
        /**
         * Queues translate transformation to local queue of transformations
         * @param object $subject
         * @param string $name
         * @param array $arguments
         */
        public function translate($subject,$name,$arguments = []) {
            $this->queue->enqueue(new \qub\Transform\Translate($subject,$name,$arguments));
        }
        
        /**
         * Performs driver transformations
         */
        public function run() {
            foreach($this->queue as $transform) {
                if(is_callable($transform)) {
                    $this->transform($transform);
                }
            }
        }
    }
}