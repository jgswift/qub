<?php
namespace qub\Tests\Delayed {
    class RepresenterTest extends \qub\Tests\DelayedTestCase {
        function testExplicitTell() {
            $representer = new \qub\Tests\Mock\UserRepresenter;
            
            $this->system->tell($representer,'setName',['name']);
            
            $this->system->run();
            
            $value = $representer->getName();
            
            $this->assertEquals('name',$value);
        }
        
        function testImplicitTell() {
            $representer = $this->system->mediate(new \qub\Tests\Mock\UserRepresenter);
            
            $this->assertInstanceOf('qub\Mediator',$representer);
            
            $representer->setName = 'name';
            
            $this->system->run();
            
            $value = $representer->getSubject()->getName();
            
            $this->assertEquals('name',$value);
        }
    }
}