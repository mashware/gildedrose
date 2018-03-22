<?php

namespace Kata\Strategy;

use Kata\Item;

/**
 * Class DefaultStrategy
 * @package Kata\Strategy
 */
class DefaultStrategy implements QualityStrategy
{
    /**
     * @param Item $item
     * @return int
     */
    public function execute(Item $item): int
    {
        $quality = $this->isSellInZero($item) ? $item->quality - 2 : $item->quality - 1;

        return max($quality, self::SELL_IN_MIN);
    }

    /**
     * @param Item $item
     * @return bool
     */
    private function isSellInZero(Item $item)
    {
        return $item->sell_in === 0;
    }
}