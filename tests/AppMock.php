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

class AppMock extends \Framework\MVC\App
{
    public function __construct(Config $config)
    {
        $_SERVER['SERVER_PROTOCOL'] = 'HTTP/1.1';
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['HTTP_HOST'] = 'localhost:8080';
        $_SERVER['REQUEST_URI'] = '/contact';
        parent::__construct($config);
    }

    public function prepareRoutes(string $instance = 'default') : void
    {
        parent::prepareRoutes($instance);
    }

    public function makeResponseBodyPart($response) : string
    {
        return parent::makeResponseBodyPart($response);
    }

    public function loadHelpers() : void
    {
        parent::loadHelpers();
    }

    public static function setConfigProperty(?Config $config) : void
    {
        static::$config = $config;
    }
}
