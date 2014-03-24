<?php

namespace Tests\Unit\GameDomain\Rule\Mocks;

use GameDomain\Exceptions\IrrelevantRuleException;
use GameDomain\Round\Step\Answer;
use GameDomain\Rule\AbstractRule;

/**
 * Test Rule
 */
final class TestRule extends AbstractRule
{
    /**
     * {@inheritDoc}
     */
    public function generateValidAnswer($number)
    {
        if (0 < $number) {
            return new Answer($number);
        }

        throw new IrrelevantRuleException();
    }
}
