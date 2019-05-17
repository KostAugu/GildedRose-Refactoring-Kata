<?php

use PHPUnit\Framework\TestCase;
use App\Model\GildedRose;
use App\Model\Item;

class GildedRoseTest extends TestCase
{

    function testFoo()
    {
        $items = array(new Item("foo", 0, 0));
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals("foo", $items[0]->name);
    }

    /*
     * Standard product
     */
    public function testStandardProductUpdate()
    {
        $item = [new Item('Elixir of the Mongoose', 10, 10)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, 9);
        $this->assertEquals($item[0]->quality, 9);
    }

    public function testStandardProductUpdateWhenSellInNegative()
    {
        $item = [new Item('Elixir of the Mongoose', -6, 10)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, -7);
        $this->assertEquals($item[0]->quality, 8);
    }

    public function testStandardProductUpdateWhenSellInEnds()
    {
        $item = [new Item('Elixir of the Mongoose', 0, 10)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, -1);
        $this->assertEquals($item[0]->quality, 8);
    }

    public function testStandardProductUpdateWhenQualityZero()
    {
        $item = [new Item('Elixir of the Mongoose', 5, 0)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, 4);
        $this->assertEquals($item[0]->quality, 0);
    }

    public function testStandardProductUpdateWhenQualityZeroAndSellInNegative()
    {
        $item = [new Item('Elixir of the Mongoose', -5, 0)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, -6);
        $this->assertEquals($item[0]->quality, 0);
    }

    /*
     * Aged Brie
     */
    public function testAgedBrieUpdate()
    {
        $item = [new Item('Aged Brie', 10, 10)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, 9);
        $this->assertEquals($item[0]->quality, 11);
    }

    public function testAgedBrieUpdateWhenSellInNegative()
    {
        $item = [new Item('Aged Brie', -5, 10)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, -6);
        $this->assertEquals($item[0]->quality, 12);
    }

    public function testAgedBrieUpdateWhenSellInEnds()
    {
        $item = [new Item('Aged Brie', 0, 10)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, -1);
        $this->assertEquals($item[0]->quality, 12);
    }

    public function testAgedBrieUpdateWhenQualityMaximum()
    {
        $item = [new Item('Aged Brie', 10, 50)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, 9);
        $this->assertEquals($item[0]->quality, 50);
    }

    public function testAgedBrieUpdateWhenQualityMaximumAndSellInNegative()
    {
        $item = [new Item('Aged Brie', -5, 50)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, -6);
        $this->assertEquals($item[0]->quality, 50);
    }

    /*
     * Sulfuras, Hand of Ragnaros
     */
    public function testSulfurasUpdate()
    {
        $item = [new Item('Sulfuras, Hand of Ragnaros', 10, 80)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, 10);
        $this->assertEquals($item[0]->quality, 80);
    }

    public function testSulfurasUpdateWhenSellInNegative()
    {
        $item = [new Item('Sulfuras, Hand of Ragnaros', -6, 80)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, -6);
        $this->assertEquals($item[0]->quality, 80);
    }

    /*
     * Backstage passes to a TAFKAL80ETC concert
     */

    public function testBackstagePassesUpdate()
    {
        $item = [new Item('Backstage passes to a TAFKAL80ETC concert', 15, 15)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, 14);
        $this->assertEquals($item[0]->quality, 16);
    }

    public function testBackstagePassesUpdateWhenSellInLessThanTen()
    {
        $item = [new Item('Backstage passes to a TAFKAL80ETC concert', 10, 15)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, 9);
        $this->assertEquals($item[0]->quality, 17);
    }

    public function testBackstagePassesUpdateWhenSellInLessThanFive()
    {
        $item = [new Item('Backstage passes to a TAFKAL80ETC concert', 5, 15)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, 4);
        $this->assertEquals($item[0]->quality, 18);
    }

    public function testBackstagePassesUpdateWhenSellInLessThanSix()
    {
        $item = [new Item('Backstage passes to a TAFKAL80ETC concert', 6, 15)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, 5);
        $this->assertEquals($item[0]->quality, 17);
    }

    public function testBackstagePassesUpdateWhenSellInNegative()
    {
        $item = [new Item('Backstage passes to a TAFKAL80ETC concert', 0, 15)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, -1);
        $this->assertEquals($item[0]->quality, 0);
    }

    public function testBackstagePassesUpdateWhenSellInNegativeAndQualityZero()
    {
        $item = [new Item('Backstage passes to a TAFKAL80ETC concert', -5, 0)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, -6);
        $this->assertEquals($item[0]->quality, 0);
    }

    public function testBackstagePassesUpdateWhenQualityMaximum()
    {
        $item = [new Item('Backstage passes to a TAFKAL80ETC concert', 15, 50)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, 14);
        $this->assertEquals($item[0]->quality, 50);
    }

    public function testBackstagePassesUpdateWhenSellInLessThanFiveAndQualityMaximum()
    {
        $item = [new Item('Backstage passes to a TAFKAL80ETC concert', 4, 50)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, 3);
        $this->assertEquals($item[0]->quality, 50);
    }

    public function testBackstagePassesUpdateWhenSellInLessThanTenAndQualityMaximum()
    {
        $item = [new Item('Backstage passes to a TAFKAL80ETC concert', 9, 50)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, 8);
        $this->assertEquals($item[0]->quality, 50);
    }

    /*
    * Conjured product
    */
    public function testConjuredProductUpdate()
    {
        $item = [new Item('Conjured Mana Cake', 10, 10)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, 9);
        $this->assertEquals($item[0]->quality, 8);
    }

    public function testConjuredProductUpdateWhenSellInNegative()
    {
        $item = [new Item('Conjured Mana Cake', -6, 10)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, -7);
        $this->assertEquals($item[0]->quality, 6);
    }

    public function testConjuredProductUpdateWhenSellInEnds()
    {
        $item = [new Item('Conjured Mana Cake', 0, 10)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, -1);
        $this->assertEquals($item[0]->quality, 6);
    }

    public function testConjuredProductUpdateWhenQualityZero()
    {
        $item = [new Item('Conjured Mana Cake', 5, 0)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, 4);
        $this->assertEquals($item[0]->quality, 0);
    }

    public function testConjuredProductUpdateWhenQualityZeroAndSellInNegative()
    {
        $item = [new Item('Conjured Mana Cake', -5, 0)];
        $gildedRose = new GildedRose($item);
        $gildedRose->update_quality();
        $this->assertEquals($item[0]->sell_in, -6);
        $this->assertEquals($item[0]->quality, 0);
    }
}
