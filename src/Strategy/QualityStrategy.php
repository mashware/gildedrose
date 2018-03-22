<?php
namespace Kata\Strategy;

use Kata\Item;

/**
 * Interface QualityStrategy
 * @package Kata\Strategy
 */
interface QualityStrategy
{
    const SELL_IN_MAX = 50;
    const SELL_IN_MIN = 0;
    /**
     * @param Item $item
     * @return int
     */
    public function execute(Item $item): int;
}
