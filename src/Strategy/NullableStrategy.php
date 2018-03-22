<?php
namespace Kata\Strategy;

use Kata\Item;

class NullableStrategy implements QualityStrategy
{
    /**
     * @inheritdoc
     */
    public function execute(Item $item): int
    {
        return $item->quality;
    }
}
