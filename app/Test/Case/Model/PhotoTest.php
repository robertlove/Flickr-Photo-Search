<?php
/* Photo Test cases generated on: 2011-07-16 13:13:07 : 1310821987*/
App::uses('Photo', 'Model');

/**
 * Photo Test Case
 *
 */
class PhotoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.photo');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Photo = ClassRegistry::init('Photo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Photo);
		ClassRegistry::flush();

		parent::tearDown();
	}

/**
 * testGetInfo method
 *
 * @return void
 */
	public function testGetInfo() {

	}

/**
 * testSearch method
 *
 * @return void
 */
	public function testSearch() {

	}

}
