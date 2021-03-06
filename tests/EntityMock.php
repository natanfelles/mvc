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

use Framework\Date\Date;
use Framework\MVC\Entity;

/**
 * Class EntityMock.
 *
 * @property int    $id
 * @property string $data
 * @property Date   $datetime
 * @property Date   $createdAt
 * @property Date   $updatedAt
 * @property string $settings
 */
class EntityMock extends Entity
{
    protected $id;
    protected $data;
    protected $datetime;
    protected $createdAt;
    protected $updatedAt;
    protected $settings;

    public function setId($id) : void
    {
        $this->id = (int) $id;
    }

    public function getData() : string
    {
        return (string) $this->data;
    }

    public function setDatetime($datetime) : void
    {
        $this->datetime = $this->fromDateTime($datetime);
    }

    public function setSettings($settings) : void
    {
        $this->settings = $this->fromJSON($settings);
    }

    public function getDataAsScalar() : string
    {
        return (string) $this->data;
    }
}
