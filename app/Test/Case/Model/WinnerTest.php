<?php
App::uses('Winner', 'Model');

/**
 * Winner Test Case
 *
 */
class WinnerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.winner'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Winner = ClassRegistry::init('Winner');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Winner);

		parent::tearDown();
	}

}
