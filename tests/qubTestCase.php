<?php
namespace qub\Tests {
    /**
    * Base qio test case class
    * Class qioTestCase
    * @package qio
    */
    abstract class qubTestCase extends \PHPUnit_Framework_TestCase {
        
        protected $system;
        
        /**
        * Perform setUp tasks
        */
        protected function setUp()
        {
        }

        /**
         * Perform clean up / tear down tasks
         */
        protected function tearDown()
        {
        }
    }
}