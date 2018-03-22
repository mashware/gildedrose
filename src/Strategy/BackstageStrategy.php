<?php
namespace Kata\Strategy;


use Kata\Item;

class BackstageStrategy implements QualityStrategy
{

    /**
     * @param Item $item
     * @return int
     */
    public function execute(Item $item): int
    {
        if ($this->isGreaterThanEleven($item)) {
            $quality = $item->quality + 1;
        } else if ($this->betweenTenAndSix($item)) {
            $quality = $item->quality + 2;
        } else if ($this->betweenFiveAndOne($item)) {
            $quality = $item->quality + 3;
        } else {
            $quality = 0;
        }

        return min($quality, self::SELL_IN_MAX);
    }

    /**
     * @param Item $item
     * @return bool
     */
    public function isGreaterThanEleven(Item $item): bool
    {
        return $item->sell_in > 10;
    }

    /**
     * @param Item $item
     * @return bool
     */
    public function betweenTenAndSix(Item $item): bool
    {
        return $item->sell_in <= 10 and $item->sell_in > 5;
    }

    /**
     * @param Item $item
     * @return bool
     */
    public function betweenFiveAndOne(Item $item): bool
    {
        return $item->sell_in <= 5 and $item->sell_in > 0;
    }
}
