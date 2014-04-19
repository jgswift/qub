<?php
namespace qub\Mediator {
    class ArrayAccess extends Base implements \ArrayAccess {
        /**
         * offsetGet magic defaults to ask transformation
         * @param string $name
         * @return mixed
         */
        public function offsetGet($name) {
            return $this->system->ask($this->subject,$name);
        }
        
        /**
         * offsetSet magic defaults to tell transformation
         * @param string $name
         * @param object $value
         */
        public function offsetSet($name, $value) {
            return $this->system->tell($this->subject,$name,[$value]);
        }
        
        /**
         * offsetExists magic defaults to ask with a boolean check
         * @param string $name
         * @return boolean
         */
        public function offsetExists($name) {
            $value = $this->system->ask($this->subject,$name);
            return !empty($value);
        }
        
        /**
         * offsetUnset magic defaults to tell with null transformation
         * @param string $name
         */
        public function offsetUnset($name) {
            $this->system->tell($this->subject,$name,[null]);
        }
    }
}
