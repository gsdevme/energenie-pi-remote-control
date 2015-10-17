<?php

namespace Energenie;

class Energenie
{
    private $pins;
    private $repository;
    private $gpio;

    /**
     * @param SocketRepository $repository
     */
    public function __construct(SocketRepository $repository)
    {
        $this->pins       = [17, 22, 23, 27];
        $this->repository = $repository;
        $this->gpio = new Gpio();
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

        foreach ($operations as $pin => $value) {
            $pin = (int)$pin;
            $value = (int)$value;

            $this->gpio->write($pin, $value);
        }

        $this->doModulator();
    }
    private function doModulator()
    {
        usleep(100);
        $this->gpio->write(25, 1);
        usleep(250);
        $this->gpio->write(25, 0);
    }
}
