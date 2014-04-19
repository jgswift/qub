<?php
namespace qub\Tests\Immediate {
    class RepresenterTest extends \qub\Tests\ImmediateTestCase {
        function testExplicitAsk() {
            $representer = new \qub\Tests\Mock\UserRepresenter;
            
            $value = $this->system->ask($representer,'isAdmin');
            
            $this->assertEquals(false,$value);
        }
        
        function testExplicitTell() {
            $representer = new \qub\Tests\Mock\UserRepresenter;
            
            $this->system->tell($representer,'setName',['name']);
            
            $value = $this->system->ask($representer,'getName');
            
            $this->assertEquals('name',$value);
        }
        
        function testImplicitAsk() {
            $representer = $this->system->mediate(new \qub\Tests\Mock\UserRepresenter);
            
            $this->assertInstanceOf('qub\Mediator',$representer);
            
            $value = $representer->isAdmin;
            
            $this->assertEquals(false,$value);
        }
        
        function testImplicitTell() {
            $representer = $this->system->mediate(new \qub\Tests\Mock\UserRepresenter);
            
            $this->assertInstanceOf('qub\Mediator',$representer);
            
            $representer->setName = 'name';
            
            $value = $representer->getName;
            
            $this->assertEquals('name',$value);
        }
    }
}