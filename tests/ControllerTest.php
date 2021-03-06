<?php
/*
 * This file is part of The Framework MVC Library.
 *
 * (c) Natan Felles <natanfelles@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Tests\MVC;

use Framework\Config\Config;
use Framework\MVC\Controller;
use Framework\MVC\Model;
use PHPUnit\Framework\TestCase;
use Tests\MVC\AppMock as App;

/**
 * Class ControllerTest.
 *
 * @runTestsInSeparateProcesses
 */
final class ControllerTest extends TestCase
{
    protected ControllerMock $controller;

    protected function setUp() : void
    {
        (new App(new Config(__DIR__ . '/configs')));
        $this->controller = new ControllerMock();
    }

    public function testConstruct() : void
    {
        self::assertInstanceOf(Controller::class, $this->controller);
    }

    public function testModelInstance() : void
    {
        self::assertInstanceOf(Model::class, $this->controller->model);
    }

    public function testValidate() : void
    {
        $rules = [
            'foo' => 'minLength:5',
        ];
        self::assertArrayHasKey('foo', $this->controller->validate($rules, []));
        self::assertSame([
            'foo' => 'The foo field requires 5 or more characters in length.',
        ], $this->controller->validate($rules, ['foo' => '1234']));
        self::assertSame([], $this->controller->validate($rules, ['foo' => '12345']));
        self::assertSame([
            'foo' => 'The Foo field requires 5 or more characters in length.',
        ], $this->controller->validate($rules, [], ['foo' => 'Foo']));
    }
}
