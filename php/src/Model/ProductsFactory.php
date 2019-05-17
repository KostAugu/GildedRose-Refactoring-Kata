<?php


namespace App\Model;


use App\Model\Product\AgedBrie;
use App\Model\Product\BackstagePass;
use App\Model\Product\Conjured;
use App\Model\Product\Product;
use App\Model\Product\Sulfuras;

class ProductsFactory
{
    public static function create(Item $item)
    {
        switch ($item->name) {
            case 'Aged Brie':
                return new AgedBrie($item);
            case 'Backstage passes to a TAFKAL80ETC concert':
                return new BackstagePass($item);
            case 'Sulfuras, Hand of Ragnaros':
                return new Sulfuras($item);
            case 'Conjured Mana Cake':
                return new Conjured($item);
            default:
                return new Product($item);
        }
    }
}