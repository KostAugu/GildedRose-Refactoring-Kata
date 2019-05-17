<?php

namespace App\Model;

class GildedRose
{

    private $items;

    function __construct($items)
    {
        $this->items = $items;
    }

    function update_quality()
    {
        foreach ($this->items as $item) {
            $product = ProductsFactory::create($item);
            $product->changeQuality();
            $product->changeSellIn();
        }
    }
}