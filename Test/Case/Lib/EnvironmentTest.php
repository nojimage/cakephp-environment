<?php
/**
 * Environment Test
 *
 * for CakePHP 2.0+
 * PHP version 5.2+
 *
 * Copyright 2014, ELASTIC Consultants Inc. (http://elasticconsultants.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @version    1.0
 * @author     nojimage <nojima at elasticconsultants.com>
 * @copyright  2014, ELASTIC Consultants Inc.
 * @link       http://elasticconsultants.com
 * @since      Environment 1.0
 * @license    MIT License (http://www.opensource.org/licenses/mit-license.php)
 **/
App::uses('Environment', 'Environment.Lib');

/**
 * Test class for Environment.
 */
class EnvironmentTest extends CakeTestCase {

	protected $_class;

	protected $_env;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	public function setUp() {
		$this->_env = Configure::read('env');
		Configure::delete('env');

		$testAppPath = dirname(dirname(dirname(__FILE__))) . DS . 'test_app' . DS;

		$class = $this->getMockClass('Environment', array('getConfigDir'));
		$class::staticExpects($this->any())
			->method('getConfigDir')
			->will($this->returnValue($testAppPath . 'Config' . DS));
		$this->_class = $class;
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	public function tearDown() {
		unset($this->_class);
		Configure::write('env', $this->_env);
		Configure::delete('EnvironmentTest');
	}

	public function testLoad() {
		$class = $this->_class;
		$class::load(array('development', 'test', 'production'));
		$this->assertEquals('test', $class::getEnv());
		$this->assertEquals('test bootstrap value', Configure::read('EnvironmentTest'));
	}

	public function testLoadNonEnv() {
		$class = $this->_class;
		$class::load();
		$this->assertEquals('development', $class::getEnv());
		$this->assertEquals(null, Configure::read('EnvironmentTest'));
	}

	public function testReadEnvFile() {
		$class = $this->_class;
		Configure::write('env', 'test');
		$class::readEnvFile('test.php');
		$this->assertEquals('test value', Configure::read('EnvironmentTest'));
	}

	public function testGetEnv() {
		Configure::write('env', 'test');
		$this->assertEquals('test', Environment::getEnv());
	}

	public function testGetEnvDir() {
		$this->assertEquals(APP . 'Config/env/', Environment::getEnvDir());
	}

	public function testGetConfigDir() {
		$this->assertEquals(APP . 'Config/', Environment::getConfigDir());
	}

}
