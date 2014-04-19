<?php
namespace qub\Tests {
    abstract class ImmediateTestCase extends qubTestCase {
        function setUp() {
            parent::setUp();
            
            $this->system = new \qub\System(new \qub\Driver\Immediate());
        }
    }
}