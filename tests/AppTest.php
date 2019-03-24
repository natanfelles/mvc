<?php namespace Tests\MVC;

use Framework\HTTP\Request;
use Framework\HTTP\Response;
use Framework\MVC\App;
use Framework\Routing\Router;
use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
	/**
	 * @var App
	 */
	protected $app;

	public function setup()
	{
		$this->app = new App([
			'database' => [
				'default' => [
				],
			],
		]);
	}

	public function testConfigs()
	{
		$this->assertEquals([
			'database' => [
				'default' => [
				],
			],
		], $this->app->getConfigs());
		$this->assertEquals([], $this->app->getConfig('database'));
		$this->assertNull($this->app->getConfig('database', 'other'));
		$this->app->setConfig('foo', ['bar', 'baz']);
		$this->assertEquals(['bar', 'baz'], $this->app->getConfig('foo'));
		$this->app->setConfig('foo', ['replaced']);
		$this->assertEquals(['replaced'], $this->app->getConfig('foo'));
		$this->app->addConfig('foo', ['added']);
		$this->assertEquals(['replaced', 'added'], $this->app->getConfig('foo'));
		$this->app->addConfig('database', ['password' => 'foo'], 'other');
		$this->assertEquals(['password' => 'foo'], $this->app->getConfig('database', 'other'));
	}

	public function testServicesInstances()
	{
		//$this->assertInstanceOf(Request::class, $this->app->getRequest());
		//$this->assertInstanceOf(Response::class, $this->app->getResponse());
		$this->assertInstanceOf(Router::class, $this->app->getRouter());
	}
}
