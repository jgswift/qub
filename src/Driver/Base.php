<?php
namespace qub\Driver {
    abstract class Base implements \qub\Driver {
        /**
         * Local driver system
         * @var \qub\System
         */
        protected $system;
        
        /**
         * Retrieves system currently maintaining driver state
         */
        public function getSystem() {
            return $this->system;
        }
        
        /**
         * Base driver initialization
         * @param \qub\System $system
         */
        public function initialize(\qub\System $system) {
            $this->system = $system;
        }
        
        /**
         * Helper method to perform transformation and update system state
         * @param \qub\Transform $transform
         * @param array $state
         */
        protected function transform(\qub\Transform $transform) {
            $value = $transform();
            
                if($transform instanceof \qub\Transform\Ask ||
                   $transform instanceof \qub\Transform\Translate) {
                   $this->system->getState()[] = $value;
                } 
        }
    }
}