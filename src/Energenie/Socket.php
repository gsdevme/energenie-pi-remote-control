<?php

namespace Energenie;

class Socket implements SocketInterface
{
    /** @var int */
    private $number;

    /** @var int */
    private $on;

    /** @var int */
    private $off;

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return int
     */
    public function getOn()
    {
        return $this->on;
    }

    /**
     * @param int $on
     */
    public function setOn($on)
    {
        $this->on = $on;
    }

    /**
     * @return int
     */
    public function getOff()
    {
        return $this->off;
    }

    /**
     * @param int $off
     */
    public function setOff($off)
    {
        $this->off = $off;
    }
}
