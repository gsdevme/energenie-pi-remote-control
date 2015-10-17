<?php

namespace Energenie;

class SocketFactory
{
    /**
     * @param int $number
     * @param int $on
     * @param int $off
     * @return Socket
     */
    public function create($number, $on, $off)
    {
        $socket = new Socket();
        $socket->setNumber($number);
        $socket->setOff($off);
        $socket->setOn($on);

        return $socket;
    }
}
