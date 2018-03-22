<?php
namespace Kata\Strategy;
use Kata\Item;

/**
 * Class AgedBrieStrategy
 * @package Kata\Strategy
 */
class AgedBrieStrategy implements QualityStrategy
{
    /**
     * @inheritdoc
     */
    public function execute(Item $item): int
    {
        return min($item->quality + 1, self::SELL_IN_MAX);
    }
}
