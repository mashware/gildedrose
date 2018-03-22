<?php

namespace Kata\Tests;

use Kata\Item;
use Kata\GildedRose;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    /**
     * @test
     */
    public function given_an_item_with_a_quality_and_being_on_sell_in_when_update_quality_then_reduce_the_quality_one_unit()
    {
        $quality = 10;
        $items = array(new Item("foo", 1, $quality));
        $gildedRose = new GildedRose($items);

        $gildedRose->update_quality();

        $this->assertEquals($quality - 1, $items[0]->quality);
    }

    //Cuando la fecha de venta a pasado,
    // la calidad degrada al doble de velocidad.
    /**
     * @test
     */
    public function given_an_item_with_a_quality_when_update_quality_the_sale_date_has_passed_then_the_quality_is_reduced_to_twice_as_much_velicity()
    {
        $quality = 10;
        $items = array(new Item("foo", 0, $quality));
        $gildedRose = new GildedRose($items);

        $gildedRose->update_quality();

        $this->assertEquals($quality - 2, $items[0]->quality);
    }

    /**
     * @test
     */
    public function given_an_item_with_a_quality_zero_when_update_quality_then_the_quality_the_quality_should_not_be_negative()
    {
        $quality = 0;
        $items = array(new Item("foo", 1, $quality));
        $gildedRose = new GildedRose($items);

        $gildedRose->update_quality();

        $this->assertEquals($quality, $items[0]->quality);
    }

    /**
     * @test
     */
    public function given_item_aged_brie_when_update_quality_then_increment_quality_one()
    {
        $quality = 10;
        $items = array(new Item("Aged Brie", 1, $quality));
        $gildedRose = new GildedRose($items);

        $gildedRose->update_quality();

        $this->assertEquals($quality + 1, $items[0]->quality);
    }

    /**
     * @test
     */
    public function given_an_item_with_a_quality_fifty_when_update_quality_then_the_quality_does_not_vary()
    {
        $quality = 50;
        $items = array(new Item("Aged Brie", 3, $quality));
        $gildedRose = new GildedRose($items);

        $gildedRose->update_quality();

        $this->assertEquals($quality, $items[0]->quality);
    }

    /**
     * @test
     */
    public function given_item_sulfuras_when_update_quality_then_the_quality_does_not_vary()
    {
        $quality = 10;
        $items = array(new Item("Sulfuras, Hand of Ragnaros", 1, $quality));
        $gildedRose = new GildedRose($items);

        $gildedRose->update_quality();

        $this->assertEquals($quality, $items[0]->quality);
    }

    /**
     * @test
     */
    public function given_item_sulfuras_when_update_quality_then_the_sell_in_does_not_vary()
    {
        $sellIn = 3;
        $items = array(new Item("Sulfuras, Hand of Ragnaros", $sellIn, 10));
        $gildedRose = new GildedRose($items);

        $gildedRose->update_quality();

        $this->assertEquals($sellIn, $items[0]->sell_in);
    }

    /**
     * @test
     */
    public function given_item_backstage_and_sell_in_is_eleven_when_update_quality_then_the_quality_increases_one()
    {
        $quality = 3;
        $items = array(new Item("Backstage passes to a TAFKAL80ETC concert", 11, $quality));
        $gildedRose = new GildedRose($items);

        $gildedRose->update_quality();

        $this->assertEquals($quality+1, $items[0]->quality);
    }

    /**
     * @test
     */
    public function given_item_backstage_and_sell_in_is_ten_or_less_but_greater_than_five_when_update_quality_then_the_quality_increases_in_two()
    {
        $quality = 3;
        $items = array(new Item("Backstage passes to a TAFKAL80ETC concert", 10, $quality));
        $gildedRose = new GildedRose($items);

        $gildedRose->update_quality();

        $this->assertEquals($quality + 2, $items[0]->quality);
    }

    /**
     * @test
     */
    public function given_item_backstage_and_sell_in_is_five_or_less_but_greater_than_five_when_update_quality_then_the_quality_increases_in_three()
    {
        $quality = 3;
        $items = array(new Item("Backstage passes to a TAFKAL80ETC concert", 5, $quality));
        $gildedRose = new GildedRose($items);

        $gildedRose->update_quality();

        $this->assertEquals($quality + 3, $items[0]->quality);
    }

    /**
     * @test
     */
    public function given_item_backstage_and_sell_in_is_zero_when_update_quality_then_the_quality_is_zero()
    {
        $items = array(new Item("Backstage passes to a TAFKAL80ETC concert", 0, 3));
        $gildedRose = new GildedRose($items);

        $gildedRose->update_quality();

        $this->assertEquals(0, $items[0]->quality);
    }

    /**
     * @test
     */
    public function given_item_conjure_when_update_quality_then_the_quality_decrease_two()
    {
        $quality = 3;
        $items = array(new Item("Conjure", 5, $quality));
        $gildedRose = new GildedRose($items);

        $gildedRose->update_quality();

        $this->assertEquals($quality-2, $items[0]->quality);
    }

    /**
     * @test
     */
    public function given_item_when_ask_for_name_then_give_name()
    {
        $items = array(new Item("foo", 0, 0));
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals("foo", $items[0]->name);
    }
}
