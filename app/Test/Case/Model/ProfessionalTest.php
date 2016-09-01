<?php
App::uses('Professional', 'Model');

/**
 * Professional Test Case
 */
class ProfessionalTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.professional',
		'app.user',
		'app.type',
		'app.board'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Professional = ClassRegistry::init('Professional');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Professional);

		parent::tearDown();
	}

}
