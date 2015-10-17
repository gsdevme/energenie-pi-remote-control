<?php

namespace Energenie;

interface SocketInterface
{
    /**
     * @return int
     */
    public function getNumber();

    /**
     * @return int
     */
    public function getOn();

    /**
     * @return int
     */
    public function getOff();
}
