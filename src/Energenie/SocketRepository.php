<?php

namespace Energenie;

class SocketRepository
{
    /** @var SocketRegistry */
    private $registry;

    /**
     * @param SocketRegistry $registry
     */
    public function __construct(SocketRegistry $registry)
    {
        $this->registry = $registry;
    }

    /**
     * @param $number
     * @return SocketInterface|null
     */
    public function findByNumber($number)
    {
        /** @var SocketInterface $socket */
        foreach ($this->registry as $socket) {
            if ($socket->getNumber() === $number) {
                return $socket;
            }
        }

        return null;
    }
}
