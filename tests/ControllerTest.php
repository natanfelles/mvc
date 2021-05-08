<?php namespace Tests\MVC;

use Framework\MVC\Config;
use Framework\MVC\Controller;
use PHPUnit\Framework\TestCase;
use Tests\MVC\AppMock as App;

/**
 * Class ControllerTest.
 *
 * @runTestsInSeparateProcesses
 */
class ControllerTest extends TestCase
{
	protected ControllerMock $controller;

	protected function setUp() : void
	{
		App::init(new Config(__DIR__ . '/configs'));
		$this->controller = new ControllerMock();
	}

	public function testConstruct()
	{
		$this->assertInstanceOf(Controller::class, $this->controller);
	}

	public function testValidate()
	{
		$rules = [
			'foo' => 'minLength:5',
		];
		$this->assertArrayHasKey('foo', $this->controller->validate($rules, []));
		$this->assertArrayHasKey('foo', $this->controller->validate($rules, ['foo' => '1234']));
		$this->assertEquals([], $this->controller->validate($rules, ['foo' => '12345']));
	}
}
