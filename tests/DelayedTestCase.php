<?php
namespace qub\Tests {
    abstract class DelayedTestCase extends qubTestCase {
        function setUp() {
            parent::setUp();
            
            $this->system = new \qub\System(new \qub\Driver\Delayed());
        }
    }
}