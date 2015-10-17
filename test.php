<?php

require 'vendor/autoload.php';

$factory = new \Energenie\SocketFactory();
$registry = new \Energenie\SocketRegistry($factory);
$repository = new \Energenie\SocketRepository($registry);

$energeine = new \Energenie\Energenie($repository);

$instruction = new \Energenie\Instruction(1, \Energenie\Instruction::TURN_ON);

$energeine->doInstruction($instruction);
