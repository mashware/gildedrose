<?php
namespace Kata\Strategy;
use Kata\Item;

/**
 * Class DecreasesTwoStrategy
 * @package Kata\Strategy
 */
class DecreasesTwoStrategy implements QualityStrategy
{
    public function execute(Item $item): int
    {
        return max($item->quality - 2, self::SELL_IN_MIN);
    }
}