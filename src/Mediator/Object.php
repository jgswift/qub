<?php
namespace qub\Mediator {
    class Object extends Base {
        /**
         * get magic defaults to ask transformation
         * @param string $name
         * @return mixed
         */
        function __get($name) {
            return $this->system->ask($this->subject,$name);
        }
        
        /**
         * set magic defaults to tell transformation
         * @param string $name
         * @param object $value
         */
        function __set($name, $value) {
            return $this->system->tell($this->subject,$name,[$value]);
        }
        
        /**
         * isset magic defaults to ask with a boolean check
         * @param string $name
         * @return boolean
         */
        function __isset($name) {
            $value = $this->system->ask($this->subject,$name);
            return !empty($value);
        }
        
        /**
         * unset magic defaults to tell with null transformation
         * @param string $name
         */
        function __unset($name) {
            $this->system->tell($this->subject,$name,[null]);
        }
    }
}
