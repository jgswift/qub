<?php
namespace qub {
    /**
     * interface Driver
     */
    interface Driver {
        /**
         * Performs system initialization
         */
        function initialize(System $system);
        
        /**
         * Retrieves driver system
         */
        function getSystem();
        
        /**
         * Adds or performs ask transformation
         */
        function ask($subject,$name);
        
        /**
         * Adds or performs tell transformation
         */
        function tell($subject,$name,$arguments = []);
        
        /**
         * Adds or performs translate transformation
         */
        function translate($subject,$name,$arguments = []);
        
        /**
         * Performs all stored transformations and puts results in system state
         */
        function run();
    }
}