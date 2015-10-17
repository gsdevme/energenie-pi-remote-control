<?php

namespace Energenie;

class Gpio
{
    private $supported;

    public function __construct()
    {
        $this->supported = [17, 22, 23, 24, 25, 27];
    }

    /**
     * @param $pin
     * @param $value
     */
    public function write($pin, $value)
    {
        if (!in_array($value, [0, 1])) {
            throw new \RuntimeException(sprintf('You must only write zero or one'));
        }

        if (!in_array($pin, $this->supported)) {
            throw new \RuntimeException(sprintf('Only pins %s are supported for write', implode(', ', $this->supported)));
        }

        $command = sprintf('gpio -g write %u %u', (int)$pin, (int)$value);

        printf('%s%s', $command, PHP_EOL);

        exec($command);
    }
}
