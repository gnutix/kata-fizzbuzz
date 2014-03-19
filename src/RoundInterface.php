<?php

namespace FizzBuzz;

/**
 * Round Interface
 */
interface RoundInterface
{
    /**
     * Start the round
     *
     * @return \FizzBuzz\Collections\RoundResult
     */
    public function play();
}
