<?php
namespace qub\Tests {
    abstract class QueuedTestCase extends qubTestCase {
        function setUp() {
            parent::setUp();
            
            $this->system = new \qub\System(new \qub\Driver\Queued());
        }
    }
}