<?php

namespace Tests\Unit\GameDomain\Rule\Mocks;

use GameDomain\Rule\AbstractRulesSet;

/**
 * Test RulesSet
 */
final class TestRulesSet extends AbstractRulesSet
{
    /**
     * {@inheritDoc}
     */
    protected function loadRules()
    {
        $this->add(new TestRule());
    }
}
