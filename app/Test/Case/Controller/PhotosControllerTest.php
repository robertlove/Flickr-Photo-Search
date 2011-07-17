<?php
/* PhotosController Test cases generated on: 2011-07-16 13:43:33 : 1310823813*/
App::uses('PhotosController', 'Controller');

/**
 * TestPhotosController 
 *
 */
class TestPhotosController extends PhotosController {
/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

/**
 * PhotosController Test Case
 *
 */
class PhotosControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.photo', 'app.photos.search');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->PhotosController = new TestPhotosController();
		$this->Photos->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PhotosController);
		ClassRegistry::flush();

		parent::tearDown();
	}

}
