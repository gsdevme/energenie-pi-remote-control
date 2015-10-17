<?php

namespace Energenie;

class Instruction
{
    const TURN_ON = 1;
    const TURN_OFF = 2;

    private $socketNumber;
    private $operation;

    /**
     * @param int $socketNumber
     * @param int $operation
     */
    public function __construct($socketNumber, $operation = self::TURN_OFF)
    {
        if (!in_array($socketNumber, [1,2,3,4])) {
            throw new \InvalidArgumentException(sprintf('The board only supports 4 sockets at a time'));
        }

        $this->socketNumber = $socketNumber;

        if (!in_array($operation, [self::TURN_ON, self::TURN_OFF])) {
            throw new \InvalidArgumentException(sprintf('Unknown Operation'));
        }

        $this->operation = $operation;
    }

    /**
     * @return int
     */
    public function getSocketNumber()
    {
        return $this->socketNumber;
    }

    /**
     * @return int
     */
    public function getOperation()
    {
        return $this->operation;
    }
}
