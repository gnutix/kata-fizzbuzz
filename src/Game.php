<?php

namespace FizzBuzz;

/**
 * Game
 */
final class Game
{
    /** @var int */
    protected $start;

    /** @var int */
    protected $rounds;

    /**
     * @param int $start
     * @param int $rounds
     */
    public function __construct($start = 1, $rounds = 100)
    {
        $this->start = $start;
        $this->rounds = $rounds;
    }

    /**
     * @return int
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return int
     */
    public function getRounds()
    {
        return $this->rounds;
    }
}
