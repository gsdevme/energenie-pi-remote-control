<?php

namespace Energenie;

class SocketRegistry implements \IteratorAggregate, \Countable
{
    private $registry;
    private $iterator;

    /**
     * @param SocketFactory $factory
     */
    public function __construct(SocketFactory $factory)
    {
        // socket 1
        $this->registry[] = $factory->create(1, 1111, 0111);

        // socket 2
        $this->registry[] = $factory->create(1, 1110, 0110);
    }

    /**
     * @inheritdoc
     */
    public function getIterator()
    {
        if (!$this->iterator instanceof \ArrayIterator) {
            $this->iterator = new \ArrayIterator($this->registry);
        }

        return $this->iterator;
    }

    /**
     * @inheritdoc
     */
    public function count()
    {
        return iterator_count($this->getIterator());
    }
}
