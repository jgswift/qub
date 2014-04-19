<?php
namespace qub\Transform {
    class Translate extends Base {
        /**
         * List of arguments provided to tell transformation
         * @var array 
         */
        protected $arguments;
        
        /**
         * Default constructor for translate transformation
         * @param object $subject
         * @param string $name
         * @param array $arguments
         */
        function __construct($subject,$name,$arguments = []) {
            parent::__construct($subject,$name);
            $this->arguments = $arguments;
        }
        
        /**
         * Retrieves translate arguments
         * @return array
         */
        function getArguments() {
            return $this->arguments;
        }
        
        /**
         * Performs translate transformation
         * @return mixed
         */
        function __invoke() {
            $name = $this->name;
            $subject = $this->subject;
            $arguments = $this->arguments;
            
            if(method_exists($subject,$name)) {
                return call_user_func_array([$subject,$name],$arguments);
            } 
        }
    }
}