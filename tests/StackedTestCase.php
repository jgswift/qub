<?php
namespace qub\Tests {
    abstract class StackedTestCase extends qubTestCase {
        function setUp() {
            parent::setUp();
            
            $this->system = new \qub\System(new \qub\Driver\Stacked());
        }
    }
}