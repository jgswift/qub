<?php
namespace qub\Tests\Immediate {
    class DoerTest extends \qub\Tests\ImmediateTestCase {
        function testExplicitTell() {
            $doer = new \qub\Tests\Mock\EmailSystemDoer;
            
            $success = $this->system->tell($doer,'send',['msg']);
            
            $this->assertEquals(true,$success);
        }

        function testImplicitTell() {
            $doer = $this->system->mediate(new \qub\Tests\Mock\EmailSystemDoer);
            
            $this->assertInstanceOf('qub\Mediator',$doer);
            
            $success = $doer->send('msg');
            
            $this->assertEquals(true,$success);
        }
    }
}