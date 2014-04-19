<?php
namespace qub\Transform {
    class Ask extends Base {
        
        /**
         * Performs ask transformation on subject
         * @return mixed
         */
        function __invoke() {
            $name = $this->name;
            $subject = $this->subject;
            
            if(method_exists($subject,$name)) {
                return call_user_func([$subject,$name]);
            } elseif(isset($subject->$name)) {
                return $subject->$name;
            }
        }
    }
}