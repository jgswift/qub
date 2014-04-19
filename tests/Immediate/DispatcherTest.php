<?php
namespace qub\Tests\Immediate {
    class DispatcherTest extends \qub\Tests\ImmediateTestCase {
        function testExplicitTranslate() {
            $dispatcher = new \qub\Tests\Mock\ControllerDispatcher;
            
            $html = $this->system->translate($dispatcher,'index');
            
            $this->assertEquals('html',$html);
        }

        function testImplicitTranslate() {
            $dispatcher = $this->system->mediate(new \qub\Tests\Mock\ControllerDispatcher);
            
            $this->assertInstanceOf('qub\Mediator',$dispatcher);
            
            $html = $dispatcher('index');
            
            $this->assertEquals('html',$html);
        }
    }
}