<?php
namespace qub {
    interface Transform {
        /**
         * Default constructor signature must allow for a subject and parameter name
         */
        function __construct($subject, $name);
        
        /**
         * Retrieve target property or method
         */
        function getName();
        
        /**
         * Retrieve target object
         */
        function getSubject();
        
        /**
         * Performs transformation
         */
        function __invoke();
    }
}