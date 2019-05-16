<?php

use PHPUnit\Framework\TestCase;
use App\Model\GildedRose;
use App\Model\Item;

class GildedRoseTest extends TestCase {

    function testFoo()
    {
        $items = array(new Item("foo", 0, 0));
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals("foo", $items[0]->name);
    }

    /*Normal product*/
    public function testNormalProductUpdate()
    {
        $item = [new Item('Elixir of the Mongoose', 10, 10)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, 9);
        $this->assertEquals($item[0]->quality, 9);
    }

    public function testNormalProductUpdateWhenSellInNegative()
    {
        $item = [new Item('Elixir of the Mongoose', -6, 10)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, -7);
        $this->assertEquals($item[0]->quality, 8);
    }

    public function testNormalProductUpdateWhenSellInEnds()
    {
        $item = [new Item('Elixir of the Mongoose', 0, 10)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, -1);
        $this->assertEquals($item[0]->quality, 8);
    }

    public function testNormalProductUpdateWhenQualityZero()
    {
        $item = [new Item('Elixir of the Mongoose', 5, 0)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, 4);
        $this->assertEquals($item[0]->quality, 0);
    }

    public function testNormalProductUpdateWhenQualityZeroAndSellInNegative()
    {
        $item = [new Item('Elixir of the Mongoose', -5, 0)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, -6);
        $this->assertEquals($item[0]->quality, 0);
    }
}
