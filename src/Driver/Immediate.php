<?php
namespace qub\Driver {
    class Immediate extends Base {       
        /**
         * Attachs ask transformation to local list of transformations
         * @param object $subject
         * @param string $name
         */
        public function ask($subject,$name) {
            $ask = new \qub\Transform\Ask($subject,$name);
            
            return $ask();
        }
        
        /**
         * Attachs tell transformation to local list of transformations
         * @param object $subject
         * @param string $name
         * @param array $arguments
         */
        public function tell($subject,$name,$arguments = []) {
            $tell = new \qub\Transform\Tell($subject,$name,$arguments);
            
            return $tell();
        }
        
        /**
         * Attachs translate transformation to local list of transformations
         * @param object $subject
         * @param string $name
         * @param array $arguments
         */
        public function translate($subject,$name,$arguments = []) {
            $translate = new \qub\Transform\Translate($subject,$name,$arguments);
            
            return $translate();
        }
        
        /**
         * Performs driver transformations
         */
        public function run() {}
    }
}