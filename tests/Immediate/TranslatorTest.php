<?php
namespace qub\Tests\Immediate {
    class TranslaterTest extends \qub\Tests\ImmediateTestCase {
        function testExplicitTranslate() {
            $user = new \qub\Tests\Mock\UserRepresenter;
            $translator = new \qub\Tests\Mock\UserViewTranslator;
            
            $html = $this->system->translate($translator,'render',[$user]);
            
            $this->assertEquals('html',$html);
        }

        function testImplicitAsk() {
            $user = new \qub\Tests\Mock\UserRepresenter;
            $translator = $this->system->mediate(new \qub\Tests\Mock\UserViewTranslator);
            
            $this->assertInstanceOf('qub\Mediator',$translator);
            
            $html = $translator('render',[$user]);
            
            $this->assertEquals('html',$html);
        }
    }
}