<?php
namespace qub\Transform {
    class Tell extends Base {
        /**
         * List of arguments provided to tell transformation
         * @var array 
         */
        protected $arguments;
        
        /**
         * Default constructor for tell transformation
         * @param object $subject
         * @param string $name
         * @param array $arguments
         */
        function __construct($subject,$name,$arguments = []) {
            parent::__construct($subject,$name);
            $this->arguments = $arguments;
        }
        
        /**
         * Retrieves tell arguments
         * @return array
         */
        function getArguments() {
            return $this->arguments;
        }
        
        /**
         * Performs tell transformation
         * @return mixed
         */
        function __invoke() {
            $name = $this->name;
            $subject = $this->subject;
            $arguments = $this->arguments;
            
            if(method_exists($subject,$name)) {
                return call_user_func_array([$subject,$name],$arguments);
            } elseif(property_exists($subject,$name) && sizeof($arguments) === 1) {
                return $subject->$name = array_shift($arguments);
            }
        }
    }
}