<?php
namespace Kata;

use Kata\Strategy\AgedBrieStrategy;
use Kata\Strategy\BackstageStrategy;
use Kata\Strategy\DecreasesTwoStrategy;
use Kata\Strategy\DefaultStrategy;
use Kata\Strategy\NullableStrategy;

class GildedRose {

    /**
     * @var array|Item[]
     */
    private $items;

    /**
     * GildedRose constructor.
     * @param array|Item[] $items
     */
    function __construct($items) {
        $this->items = $items;
    }

    /**
     * @return void
     */
    public function update_quality()
    {
        foreach ($this->items as $item) {
            switch ($item->name) {
                case 'Aged Brie':
                    $item->quality = (new AgedBrieStrategy())->execute($item);
                    break;
                case 'Sulfuras, Hand of Ragnaros':
                    $item->quality = (new NullableStrategy())->execute($item);
                    break;
                case 'Backstage passes to a TAFKAL80ETC concert':
                    $item->quality = (new BackstageStrategy())->execute($item);
                    break;
                case 'Conjure':
                    $item->quality = (new DecreasesTwoStrategy())->execute($item);
                    break;
                default:
                    $item->quality = (new DefaultStrategy())->execute($item);
                    break;
            }
        }
    }
}
