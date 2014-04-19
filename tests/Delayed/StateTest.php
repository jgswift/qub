<?php
namespace qub\Tests\Delayed {
    class StateTest extends \qub\Tests\DelayedTestCase {
        function testMemoryStateTransfer() {
            $maker = new \qub\Tests\Mock\UserFactoryMaker;
            
            $this->system->ask($maker,'getUser');
            $this->system->ask($maker,'getUser');
            
            $this->system->run();
            
            $this->assertEquals(2,count($this->system->getState()));
        }
    }
}