<?php

require_once '../src/gilded_rose.php';

class GildedRoseTest extends \PHPUnit\Framework\TestCase {

    function testFoo() {
        $items = array(new Item("foo", 0, 0));
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals("foo", $items[0]->name);
    }

}
