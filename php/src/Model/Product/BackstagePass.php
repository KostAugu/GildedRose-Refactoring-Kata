<?php


namespace App\Model\Product;


use App\Model\Item;

class BackstagePass extends Product
{
    protected $name = "Backstage passes to a TAFKAL80ETC concert";

    public function __construct(Item $item)
    {
        parent::__construct($item);

    }
}