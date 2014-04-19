<?php
namespace qub {
    interface Mediator {
        /**
         * Default constructor for mediator
         */
        public function __construct(System $system,$subject);
        
        /**
         * Retrieve mediation target
         */
        public function getSubject();
        
        /**
         * Retrieve mediation system
         */
        public function getSystem();
    }
}