<?php
namespace qub\Tests\Queued {
    class StateTest extends \qub\Tests\QueuedTestCase {
        function testMemoryStateTransfer() {
            $maker = new \qub\Tests\Mock\UserFactoryMaker;
            
            $this->system->ask($maker,'getUser');
            $this->system->ask($maker,'getUser');
            
            $this->system->run();
            
            $this->assertEquals(2,count($this->system->getState()));
        }
    }
}