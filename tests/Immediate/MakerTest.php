<?php
namespace qub\Tests\Immediate {
    class MakerTest extends \qub\Tests\ImmediateTestCase {
        function testExplicitAsk() {
            $maker = new \qub\Tests\Mock\UserFactoryMaker;
            
            $user = $this->system->ask($maker,'getUser');
            
            $this->assertInstanceOf('qub\Tests\Mock\UserRepresenter',$user);
        }

        function testImplicitAsk() {
            $maker = $this->system->mediate(new \qub\Tests\Mock\UserFactoryMaker);
            
            $this->assertInstanceOf('qub\Mediator',$maker);
            
            $user = $maker->getUser();
            
            $this->assertInstanceOf('qub\Tests\Mock\UserRepresenter',$user);
        }
    }
}