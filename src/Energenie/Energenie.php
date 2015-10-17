<?php

namespace Energenie;

use PhpGpio\Gpio;
use PhpGpio\GpioInterface;

class Energenie
{
    private $pins;
    private $repository;

    /**
     * @param SocketRepository $repository
     */
    public function __construct(SocketRepository $repository)
    {
        $this->pins       = [11, 15, 16, 13];
        $this->repository = $repository;
    }

    /**
     * @param Instruction $instruction
     */
    public function doInstruction(Instruction $instruction)
    {
        $socket = $this->repository->findByNumber($instruction->getSocketNumber());

        if (!$socket instanceof SocketInterface) {
            throw new \RuntimeException(sprintf('Unable to do operation for socket %s', $instruction->getSocketNumber()));
        }

        $values     = ($instruction->getOperation() === Instruction::TURN_OFF) ? $socket->getOff() : $socket->getOn();
        $operations = array_combine($this->pins, str_split(strrev($values), 1));

        $gpio = new Gpio();

        $this->doSetup($gpio);

        foreach ($operations as $pin => $value) {
            $gpio->output((int)$pin, (bool)$value);
        }

        $this->doModulator($gpio);

        $gpio->unexportAll();
    }

    private function doSetup(Gpio $gpio)
    {
        foreach ($this->pins as $pin) {
            $gpio->setup($pin, GpioInterface::DIRECTION_OUT);
        }

        $gpio->setup(18, GpioInterface::DIRECTION_OUT);
        $gpio->setup(18, GpioInterface::DIRECTION_OUT);

        $gpio->output(22, GpioInterface::IO_VALUE_OFF);
        $gpio->output(18, GpioInterface::IO_VALUE_OFF);

        foreach ($this->pins as $pin) {
            $gpio->output($pin, GpioInterface::IO_VALUE_OFF);
        }
    }

    private function doModulator(Gpio $gpio)
    {
        usleep(100);
        $gpio->output(22, true);
        usleep(250);
        $gpio->output(22, false);
    }
}